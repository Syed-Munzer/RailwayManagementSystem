<html>
<head>
    <title>Insert Stations</title>
    <link rel="stylesheet" href="form_table.css" type="text/css">
</head>
<body style=" background-image: url(Images/adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

$cdquery = "SELECT id, sname FROM station";
$cdresult = mysqli_query($conn, $cdquery);

echo "<table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Station</th>
                <th></th>
                <th></th>
            </tr>
        </thead>";

while ($cdrow = mysqli_fetch_array($cdresult)) {
    $cdId = $cdrow['id'];
    $cdTitle = $cdrow['sname'];

    echo "<tr>
            <td>$cdId</td>
            <td>$cdTitle</td>
            <td><a href=\"http://localhost/railway/Change_st.php?id=$cdId\"><button>Edit</button></a></td>
            <td><a href=\"http://localhost/railway/Remove_st.php?id=$cdId\"><button>Delete</button></a></td>
          </tr>";
}

echo "</table>";

?>
<br>
<span><form action="insert_into_station.php" method="post">
Add Station : <input type="text" name="sname" placeholder=" New Station" required>
<input type="submit" value="Add"></span>
<?php
echo "<br><br> <a href=\"http://localhost/railway/Admin.php\">Go Back to Admin Menu</a> ";
?>
</body>
</html>
