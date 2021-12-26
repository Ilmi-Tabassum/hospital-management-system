<?php
include('../model/db.php');

$medname=$company=$expdate=$batch=$price="";

$insert ="";
$error = "";

if (isset($_POST["submit"])) {
    
    $medname = $_REQUEST["medname"];
    $company = $_REQUEST["company"];
    $expdate = $_REQUEST["expdate"];
    $batch = $_REQUEST["batch"];
 //   $price = $_REQUEST["price"];

    $connection = new db();
    $conobj = $connection->OpenCon();

    $insert = $connection->InsertPharma($conobj, "medicines", $medname, $company, $expdate, $batch);

    if($insert == true)
        $insert = "inserted successfully";
    else{
echo $conobj->error;
    }

    $connection->CloseCon($conobj);
}
?>