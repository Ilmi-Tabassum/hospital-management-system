<?php
include('../model/db.php');
$patient_id="";

$insert ="";
$error = "";

if (isset($_POST["submit"])) {
    $patient_id = $_REQUEST["patient_id"];
//    echo $patient_id;
    $connection = new db();
    $conobj = $connection->OpenCon();
    $temp = $connection->deletePatient($conobj, $patient_id);
    $connection->CloseCon($conobj);
    header("Location: ../view/admin-records.php");
}
else echo "not working";

?>