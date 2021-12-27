<head>
    <link rel="stylesheet" href="../css/style.css">
</head>
<h5>
    <?php
    include('../model/db.php');
    $connection = new db();
    session_start();
    $temp = getIdandName("doctordata", "doctor_id", "dname");//$temp is an array,
    // which has the doctor id on index 0 and doctor name on index 1.
    //the parameters are the table name and the column names.
    $doctor_id = $temp[0];
//    $appointments = showAppointments($doctor_id);

    $dname = $temp[1];
    echo "" . "Welcome," . $dname . "<br>";
    $conobj=$connection->OpenCon();
    $userQuery=$connection->showAppointments($conobj, $doctor_id);
    //$userQuery is an array
    //which receives the time and description on index 0 and receives the patient information on index 1.
    $result1 = $userQuery[0]; //has time and description of the logged in doc's appointments.
    $result2 = $userQuery[1]; //has the details of the patients of those appointments.



    if ($result1->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        <th>Time of Appointment</th>
        <th>Description of the Patient</th>
        <th>Patient Details</th>
        </tr>";

    while($row = $result1->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['time'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";

        while($row = $result2->fetch_assoc()){
            echo "<td>" . $row['pname'] . "</td>";
        }
        echo "</tr>";
        }

    echo "</table>";
    }
    else
    {
        echo "No Appointments Found! Seems like you are a shitty doctor.";
    }
    ?>
</h5>
<br>
<a href="../controller/logout.php" class="button">Log Out</a>
