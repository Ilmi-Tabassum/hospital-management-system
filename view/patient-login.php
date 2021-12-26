<?php
include('../controller/login-controller.php');

if(isset($_SESSION['email'])){
    header("location: patient-panel.php");
}
?>

<head>
    <link rel="stylesheet" href="../css/style.css">
</head>

<!DOCTYPE html>
<html>
<body>

<div class="imgcontainer">
    <img src="../css/pharmacist.jpg" alt="Avatar" class="avatar">
</div>

<form action="" method="post">

    <h2>Login For Patients</h2>

    <div class="container">
        <label for="email">Email</label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <input type="hidden" name="role" id="role" value="patient"/>

        <button type="submit" input name="submit" type="submit" value="LOGIN">Login</button>
    </div>
    <div>
        <p>If you don't have an account yet, please sign up to create an account first.<p>
            <a href = "patient-signup.php" class="button"> Sign Up </a>
    </div>

</form>
<br>
<?php echo $error;?>
</body>
</html>
