
<?php
include('../controller/admin-controller.php');

if(isset($_SESSION['email'])){
    header("location: appointment.php");
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

    <h2>Login For Admin</h2>

    <div class="container">
        <label for="email">Email</label>
        <input type="email" placeholder="Enter Email" name="email" required>

        <label for="password">Password</label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <!-- <input name="submit" type="submit" value="LOGIN"> -->
        <button type="submit" input name="submit" type="submit" value="LOGIN">Login</button>
    </div>
    <a href="../controller/logout.php" class="button">Log Out</a>
</form>
<br>
<?php echo $error;?>
</body>
</html>
