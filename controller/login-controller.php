<?php
include('../model/db.php');
session_start();

$error="";

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Email does not exist or Password is invalid";
    } else {
        $email = $_POST['email'];
        echo $email;
        $password = $_POST['password'];
        $role = $_POST['role'];
        echo $role;
        $connection = new db();
        $conobj = $connection->OpenCon();
        if ($role == "doctor")
        {
            $userQuery = $connection->loginChecker($conobj, "doctordata", $email, $password);
        }
        elseif ($role == "patient")
        {
            $userQuery = $connection->loginChecker($conobj, "patientdata", $email, $password);
        }
        elseif ($role == "pharmacist")
        {
            $userQuery = $connection->loginChecker($conobj, "pharmacistdata", $email, $password);
        }
        elseif ($role == "admin")
        {
            $userQuery = $connection->loginChecker($conobj, "admindata", $email, $password);
        }
        else{
            echo "role not found";
        }

        if ($userQuery->num_rows > 0) {

            $_SESSION['email'] = $_POST['email'];
            $_SESSION['password'] = $_POST['password'];
        } else {
            $error = "Email does not exist or Password is invalid";
        }
        $connection->CloseCon($conobj);

    }
}
?>