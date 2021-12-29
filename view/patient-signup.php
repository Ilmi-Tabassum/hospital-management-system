<?php

include('../controller/patient-signup-controller.php');

?>

<head>
  <link rel="stylesheet" href="../css/style.css">
</head>

<div class="container">
    <form method="post">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    
    <label for="pname"><b>Patient Name</b></label>
    <input type="text" placeholder="Enter Username" name="pname" required>


    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Username" name="email" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label for="phoneno"><b>Phone No.</b></label>
    <input type="text" placeholder="Enter Phone no." name="phoneno" required>

    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>

    <label for="gender"> <b>Select you gender</b></label>
<select name="gender">
	<option value="none" selected>Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option>
	<option value="other">other</option>
</select>

    <label for="age"><b>Age</b></label>
    <input type="number" placeholder="Enter Age" name="age" required>

    <label for="dob"><b>Date of Birth</b></label>
    <input type="date" placeholder="Enter Date of Birth" name="dob" required>


    <button type="submit" input name="submit" type="submit" value="Add">Add</button>

    </form>
<div>
<div>
    <p>Already have an account? <a href="patient-login.php" class="button">Sign in</a></p>
</div>

