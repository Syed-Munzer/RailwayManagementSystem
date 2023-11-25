<html>
<head>
    <title>Insert Stations</title>
    <link rel="stylesheet" href="style_admin_login.css" type="text/css">
</head>
<body style=" background-image: url(Images/adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php

require "db.php";

if (!isset($_POST["station"]) || $_POST["station"] == "") { 
    echo "
    <form action=\"edit_station.php?id=".$_GET["id"]."\" method=\"post\">
    Edit Station : <br><br>
    <input type=\"text\" name=\"station\" required>
    <input type=\"submit\">
    </form>
    ";
} else {
    $sql = "UPDATE `station` SET `sname`='".$_POST["station"]."' where id= ('".$_GET["id"]."')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Station updated successfully";
    } else {
        echo "Error:" . $conn->error;
    }
}

echo "<br> <a href=\"http://localhost/railway/Admin.php\">Go Back to Admin Menu</a> ";


$conn->close();
?>

</body>
</html>



