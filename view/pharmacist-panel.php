<?php
include('../model/db.php');

session_start();

if(!isset($_SESSION['email'])){
echo 'Welcome Guest.';
} else {
$sex = $_SESSION['email'];
$sql = "SELECT * FROM pharmacistdata WHERE email = '$sex'";
    $connection = new db();
        $conobj = $connection->OpenCon();


    $result = mysqli_query($conobj, $sql);
    while($row = mysqli_fetch_array($result)) {
        echo "". "Welcome," . $row["pharname"].  "<br>";
    }

}
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>HealthCare Pharma</h1>
<p style="color:blue;">Welcome to the pharmacist view </p>
<h3 style="color:red;">Stocks</h3>


<div>

    <?php $insert ?>
    <?php $error ?>

    <?php
    $connection = new db();
    $conobj=$connection->OpenCon();

    $userQuery=$connection->ShowAll($conobj,"medicines");

    if ($userQuery->num_rows > 0) {
        echo "<table border='1'>
        <tr>
        
        <th>Medicine Name</th>
        <th>Manufacturer Company</th>
        <th>Expiry Date</th>
        <th>Batch Amount</th>
        
        </tr>";
    
        while($row = $userQuery->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['medname'] . "</td>";
            echo "<td>" . $row['company'] . "</td>";
            echo "<td>" . $row['expdate'] . "</td>";
            echo "<td>" . $row['batch'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $connection->CloseCon($conobj);
    ?>
</div>
<br> </br>

<a href="pharamacist-stock.php" class="button">Edit Medicines</a>


<br> </br>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("../control/search-controller.php", {term: inputVal}).done(function(data){
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
        <input type="text" autocomplete="off" placeholder="Search Medicine" />
        <div class="result"></div>
    </div>



<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>
<br> </br>

<a href="../controller/logout.php" class="button">Log Out</a>

  </body>
</html>