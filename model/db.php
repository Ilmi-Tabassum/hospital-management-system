<?php
class db{
//1
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "hospitalmanagementsystem";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
 
 return $conn;
 }

 //1
    function loginChecker($conn, $table, $email, $password)
    {
        $result = $conn->query("SELECT * FROM ".$table." WHERE email='".$email."' AND password='".$password."'");
        return $result;
    }

//2 (insert medicines in pharmacy panel)
 function InsertPharma($conn, $table, $medname, $company, $expdate, $batch)
 {
     $result =$conn->query("INSERT INTO $table (`medname`, `company`, `expdate`, `batch`) VALUES ('$medname','$company','$expdate','$batch') ");
     return $result;
}
//3 (patient signup)
function InsertPatient($conn, $table, $pname, $email, $password,  $phoneno, $address, $gender,$age, $dob){
    $result=$conn->query("INSERT INTO $table (`pname`,`email`,`password`,`phoneno`,`address`,`gender`,`age`,`dob`) VALUES ('$pname','$email','$password','$phoneno','$address','$gender','$age','$dob')");
        return $result;
    }
//4
 function ShowAll($conn,$table)
 {
$result = $conn->query("SELECT * FROM  $table");
 return $result;
 }

//5
function CloseCon($conn)
 {
 $conn -> close();
 }

//6
public function insertAppointment($conn, $table, $time, $description, $patient_id, $doctor_id){

    $result =$conn->query("INSERT INTO $table (`time`,`description`,`patient_id`, `doctor_id`) VALUES ('$time','$description','$patient_id', '$doctor_id') ");

    return $result;
}
//7
function checkExistingEmail( $table, $email){
    $query = "SELECT email FROM $table WHERE email = '$email'";
    $result = $this->OpenCon()->query($query);
    if($result ->num_rows)
    {
        return true;
    }
    else return false;
    }


}


//8
function getPatientIdandName()
{
    if (!isset($_SESSION['email'])) {
        echo 'Welcome Guest.';
    } else {
        $temp = $_SESSION['email'];
        $sql = "SELECT * FROM patientdata WHERE email = '$temp'";
        $connection = new db();
        $conobj = $connection->OpenCon();
        $result = mysqli_query($conobj, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $patient_id = $row["id"];
            $patient_name = $row["pname"];
            $nameAndId=array($patient_id, $patient_name);
        }

    }
    return $nameAndId;
}


?>