<?php
$time=$description=$patient_id=$doctor_id="";

$insert ="";
$error = "";

if (isset($_POST["submit"])) {
    $time = $_REQUEST["time"];
    $description = $_REQUEST["description"];
    $doctor_id = $_REQUEST["doctor_id"];
    $temp = getPatientIdandName();//also will echo the patient name
    $patient_id = $temp[0];
    $connection = new db();
    $conobj = $connection->OpenCon();

    $insert = $connection->insertAppointment($conobj, "appointment", $time, $description, $patient_id, $doctor_id);

    if($insert == true)
        $insert = "inserted successfully";
    else{
        echo $conobj->error;
    }

    $connection->CloseCon($conobj);
}
?>