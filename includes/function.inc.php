<?php
function emptyInputSignup($fname, $email, $pwd, $repassword)
{
    $result;
    if (empty($fname) || empty($email) || empty($pwd) || empty($repassword)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passwordMatch($pwd, $repassword)
{
    $result;
    if ($pwd !== $repassword) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function emailExists($conn, $email)
{
    $sql = "SELECT * FROM Users WHERE email = ?;";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultData = $stmt->get_result();

    if ($row = $resultData->fetch_assoc()) {
        return $row;
    } else {
        return false;
    }
    $stmt->close();
}

function createUser($conn, $fname, $lname, $dob, $gender, $email, $pwd, $address, $city, $postalcode)
{
    $sql = "INSERT INTO Users(FirstName, LastName, DOB, Gender, Email, Password, Address, City, PostalCode) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header("Location:../signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $stmt->bind_param("sssssssss", $fname, $lname, $dob, $gender, $email, $hashedPwd, $address, $city, $postalcode);
    $stmt->execute();
    $stmt->close();
    header("Location:../login.php?error=none");
    exit();
}

function emptyInputLogin($email, $pwd)
{
    $result;
    if (empty($email) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($conn, $email, $pwd)
{
    $emailExists = emailExists($conn, $email);
    if ($emailExists === false) {
        header("location:../signup.php?error=loginfail");
        exit();
    }
    $pwdHashed = $emailExists['Password'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location:../signup.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["email"] = $emailExists["Email"];
        $_SESSION["uid"] = $emailExists["UserID"];
        $_SESSION["fname"] = $emailExists["FirstName"];
        

        header("Location:../index.php");
        exit();
    }
}

function productrating($rate){
    if ($rate == 5){
        echo "⭐⭐⭐⭐⭐  😍";
    }elseif ($rate == 4){
        echo "⭐⭐⭐⭐  😊";
    }elseif ($rate == 3){
        echo "⭐⭐⭐  🙂";
    }elseif ($rate == 2){
        echo "⭐⭐  😐";
    }elseif ($rate == 1){
        echo "⭐  😑";
    }
}

function gendercheck($conn,$userrid){

    $gendersql = "SELECT Gender FROM Users WHERE UserID = '$userrid'";
    $genderres = $conn->query($gendersql);

    if ($genderres->num_rows> 0)
        {
            while($row = $genderres->fetch_assoc())
            {
              $gen=$row["Gender"];
            }
    
        }
        else
        {
        echo "images/user.png";
        }
    
    
    if ($gen == "Male"){
        echo "images/male.png";
    }elseif ($gen == "Female"){
        echo "images/female.png";
    }
    

}


