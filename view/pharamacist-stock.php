<?php
include('../controller/insert-pharma.php')
?>

<!DOCTYPE html>
<html>
<body>

<head>
  <link rel="stylesheet" href="../css/style.css">
</head>

<h2>Inventory</h2>

<p>Insert new:</p>

<div class="container">
<form method="post">
    <label for="medname"><b>Medicine Name</b></label><input type="text" placeholder="Medicine Name" name="medname" required><br>
    <label for="company"><b>Company  </b></label><input type="text" placeholder="Company Name" name="company" required><br>
    <label for="expdate"><b>Expiry Date</b></label><input type="date" placeholder="date" name="expdate" required><br>
    <label for="batch"><b>Batch </b></label><input type="number" placeholder="Batch" name="batch"><br>
    <button type="submit" input name="submit" type="submit" value="Add">Add</button>
</form>
</div>

<a href="pharmacist-panel.php" class="button">Back</a>

</body>
</html>