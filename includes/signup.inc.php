<?php
if (isset($_POST["submit"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];
    $repassword = $_POST["repassword"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $postalcode = $_POST["postalcode"];


    require_once 'config.php';
    require_once 'function.inc.php';

    $emptyInput = emptyInputSignup($fname, $email, $pwd, $repassword);
    $invalidEmail = invalidEmail($email);
    $passwordMatch = passwordMatch($pwd, $repassword);
    $emailExists = emailExists($conn, $email);

    if ($emptyInput !== false) {
        header("Location:../signup.php?error=emptyinput");
        exit();
    }
    if ($invalidEmail !== false) {
        header("Location:../signup.php?error=invalidEmail");
        exit();
    }
    if ($passwordMatch !== false) {
        header("Location:../signup.php?error=passwordnotmatch");
        exit();
    }
    if ($emailExists !== false) {
        header("Location:../signup.php?error=emailtaken");
        exit();
    }

    createUser($conn, $fname, $lname, $dob, $gender, $email, $pwd, $address, $city, $postalcode);
} else {
    header("Location:../login.php");
}
