<?php
class db
{
//1
    function OpenCon()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "hospitalmanagementsystem";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
        return $conn;
    }

    //1
    function loginChecker($conn, $table, $email, $password)
    {
        $result = $conn->query("SELECT * FROM " . $table . " WHERE email='" . $email . "' AND password='" . $password . "'");
        return $result;
    }

//2 (insert medicines in pharmacy panel)
    function InsertPharma($conn, $table, $medname, $company, $expdate, $batch)
    {
        $result = $conn->query("INSERT INTO $table (`medname`, `company`, `expdate`, `batch`) VALUES ('$medname','$company','$expdate','$batch') ");
        return $result;
    }

//3 (patient signup)
    function InsertPatient($conn, $table, $pname, $email, $password, $phoneno, $address, $gender, $age, $dob)
    {
        $result = $conn->query("INSERT INTO $table (`pname`,`email`,`password`,`phoneno`,`address`,`gender`,`age`,`dob`) VALUES ('$pname','$email','$password','$phoneno','$address','$gender','$age','$dob')");
        return $result;
    }

//4
    function ShowAll($conn, $table)
    {
        $result = $conn->query("SELECT * FROM  $table");
        return $result;
    }

//5
    function CloseCon($conn)
    {
        $conn->close();
    }

//6
    public function insertAppointment($conn, $table, $time, $description, $patient_id, $doctor_id)
    {

        $result = $conn->query("INSERT INTO $table (`time`,`description`,`patient_id`, `doctor_id`) VALUES ('$time','$description','$patient_id', '$doctor_id') ");
        return $result;
    }

//7
    function checkExistingEmail($table, $email)
    {
        $query = "SELECT email FROM $table WHERE email = '$email'";
        $result = $this->OpenCon()->query($query);
        if ($result->num_rows) {
            return true;
        } else return false;
    }

    function getIdandName($table, $id, $name)
    {
        if (!isset($_SESSION['email'])) {
            header("location: ../view/home.php"); //if someone is not logged in and tries to use the panel url then
            // not allowing him to access the panel pages.
        } else {
            $session_email = $_SESSION['email'];
            $sql = "SELECT * FROM $table WHERE email = '$session_email'";
            $connection = new db();
            $conobj = $connection->OpenCon();
            $result = mysqli_query($conobj, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $found_id = $row["$id"];
                $found_name = $row["$name"];
                $nameAndId = array($found_id, $found_name);
            }

        }
        return $nameAndId;
    }

    function showAppointments($conn, $doctor_id)
    {
        $result = $conn->query("SELECT appointment.* FROM appointment WHERE doctor_id = $doctor_id");
        //getting the appointments of the doctor by his session id.
        return $result;
    }

    function showPatientDataModal($conn, $patient_id, $doctor_id)
    {
        $result = $conn->query("SELECT patientdata.* FROM patientdata INNER JOIN appointment ON patientdata.patient_id = appointment.patient_id WHERE appointment.doctor_id = $doctor_id AND  patientdata.patient_id = $patient_id");
        //getting the ingo of the patients who took appointments from the logged in doctor
        return $result;
    }

    function deletePatient($conn, $patient_id)
    {
        $del = $conn->query("DELETE from patientdata where patient_id = $patient_id"); // delete query
        return $del;
    }
}

?>