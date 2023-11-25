<html>
    <head>
        <title>Admin Login</title>
        <link rel="stylesheet" href="style_admin_login.css" type="text/css">
    </head>
<body style=" background-image: url(Images/adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
<div align="center">     
<?php 
session_start();

if (isset($_POST["uid"]) && $_POST["uid"] == 'admin' && isset($_POST["password"]) && $_POST["password"] == 'admin') {
    $_SESSION["Admin"] = true;
}

if (isset($_SESSION["Admin"]) && $_SESSION["Admin"] == true) {
    echo "<br><a href=\"http://localhost/railway/Add_st2.php\"> Show All Stations </a><br>";
    echo "<br><a href=\"http://localhost/railway/All_trains.php\"> Show All Trains </a><br>";
    echo "<br><a href=\"http://localhost/railway/All_users.php\"> Show All Users </a><br>";
    echo "<br><a href=\"http://localhost/railway/Add_train1.php\"> Enter New Train </a><br>";
    echo "<br><a href=\"http://localhost/railway/Add_seat1.php\"> Enter Train Schedule </a><br>";
    echo "<br><a href=\"http://localhost/railway/Book_done.php\"> View all booked tickets </a><br>";
    echo "<br><a href=\"http://localhost/railway/Cancel_done.php\"> View all cancelled tickets </a><br>";
} else {
    echo "
    <form action=\"Admin.php\" method=\"post\">
        User ID: <input type=\"text\" name=\"uid\" required><br>
        Password: <input type=\"password\" name=\"password\" required><br>
        <input type=\"submit\">
    </form>
    ";
}
?>

<br><a href="http://localhost/railway/index.htm">Go to Home Page</a>

</div>
</body>
</html>
