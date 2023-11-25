<html>
<head>
    <title>All Trains</title>
    <link rel="stylesheet" href="style_booked.css" type="text/css">
</head>
<body style=" background-image: url(Images/adminlogin.jpeg); 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";

$cdquery="SELECT * FROM train";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Date</td><td></td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['trainno']."</td><td>".$cdrow['tname']."</td><td>".$cdrow['sp']."</td><td>".$cdrow['st']."</td><td>".$cdrow['dp']."</td><td>".$cdrow['dt']."</td><td>".$cdrow['date']."</td><td><a href=\"http://localhost/railway/Train_schedule.php?trainno=".$cdrow['trainno']."\"><button>Schedule</button></a></td></tr>
";
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/Add_train1.php\"> Add New Train </a><br> ";
echo " <br><a href=\"http://localhost/railway/Admin.php\">Go Back to Admin Menu</a> ";
?>
</body>
</html>