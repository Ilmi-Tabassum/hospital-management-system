<h5>
<?php
include('../model/db.php');
include ('../controller/search-patient.php');
$connection = new db();
session_start();
$temp = $connection->getIdandName("patientdata","patient_id","pname");
//$temp is an array,
// which has the patient id on index 0 and patient name on index 1.
//the parameters are the table name and the column names.
$name = $temp[1];
echo "" . "Welcome," . $name . "<br>";
include('./appointment-modal.php');
?>
</h5>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div class="container">
    <div class="jumbotron">
        <div class="card">
            <h2> Doctor Appointment </h2>
        </div>
        <div class="card">
            <div class="card-body">
    <center>
        <b>Doctor Records</b>
    </center>
    <BR>
    <?php
    $connection = new db();
    $conobj=$connection->OpenCon();
    $userQuery=$connection->ShowAll($conobj,"doctordata");
    if ($userQuery->num_rows > 0) {
    echo "<table border='1'>
        <tr>
        <th>S.No</th>
        <th>Doctor Name</th>
        <th>Email </th>
        <th>Phone Number</th>
        <th>Speciality</th>
        <th>Take Appointment</th>
        </tr>";

        while($row = $userQuery->fetch_assoc()) {

            echo "<tr>";

            echo "<td>" . $row['doctor_id'] . "</td>";
            echo "<td>" . $row['dname'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['phoneno'] . "</td>";
            echo "<td>" . $row['speciality'] . "</td>";
            $doctor_id = $row['doctor_id'];//id of the doctor
            echo "<td> <a data-toggle='modal' class='open-appointmentModal' href='#appointmentModal' data-id='$doctor_id'> Click me</a> </td>";
//            echo "<td> <button type='button' class='btn btn-info btn-lg' data-toggle='modal' class='open-exampleModalLong' data-target='#exampleModalLong'  data-id='5666' </button>Appointment</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "0 results";
    }
    $connection->CloseCon($conobj);
    ?>
</div>

<br>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('.search-box input[type="text"]').on("keyup input", function(){
            /* Get input value on change */
            var inputVal = $(this).val();
            var resultDropdown = $(this).siblings(".result");
            if(inputVal.length){
                $.get("../control/search-patient.php", {term: inputVal}).done(function(data){
                    // Display the returned data in browser
                    resultDropdown.html(data);
                });
            } else{
                resultDropdown.empty();
            }
        });

        // Set search input value on click of result item
        $(document).on("click", ".result p", function(){
            $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
            $(this).parent(".result").empty();
        });
    });
</script>

<div class="search-box">
    <input type="text" autocomplete="off" placeholder="Search Doctor" /><button type='button'>Search</button>
    <div class="result"></div>
</div>
<br>
<br>
    <a href="../controller/logout.php" class="button">Log Out</a>

</body>

<!--//script for passing the doctor-id to the appointment-modal in the hidden input form-->
<!--this will be executed everytime the appointment button is being pushed -->
<script>
    $('body').on('click', '.open-appointmentModal', function() {
        var mydoctor_id = $(this).data('id');
        $("#appointmentModal #doctor_id").val( mydoctor_id );
     });
</script>
