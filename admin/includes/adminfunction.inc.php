<?php

function emptyInputLogin($adminun, $pwd)
{
    $result;
    if (empty($adminun) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}


function AdminUNExists($conn, $adminun)
{
    $sql = "SELECT * FROM Admin WHERE AdminUN = ?;";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        header("Location:../login.php?error=stmtfailed");
        exit();
    }
    $stmt->bind_param("s", $adminun);
    $stmt->execute();
    $resultData = $stmt->get_result();

    if ($row = $resultData->fetch_assoc()) {
        return $row;
    } else {
        return false;
    }
    $stmt->close();
}

function loginAdmin($conn, $adminun, $pwd)
{
    $adminExists = adminUNExists($conn, $adminun);
    if ($adminExists === false) {
        header("location:../login.php?error=loginfail");
        exit();
    }
    $pwdHashed = $adminExists['Password'];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("Location:../login.php?error=wrongpw");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["AdminUN"] = $adminExists["AdminUN"];
        $_SESSION["Name"] = $emailExists["Name"];
        

        header("Location:../index.php");
        exit();
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