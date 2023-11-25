<html>
<head>
    <title>Schedule</title>
    <link rel="stylesheet" href="style_booked.css" type="text/css">
</head>
<body style=" background-image: url(Images/adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


<?php

require "db.php";


$cdquery="SELECT * FROM train WHERE trainno='".$_GET["trainno"]."'";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Date</td></thead>
";
while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['trainno']."</td><td>".$cdrow['tname']."</td><td>".$cdrow['sp']."</td><td>".$cdrow['st']."</td><td>".$cdrow['dp']."</td><td>".$cdrow['dt']."</td><td>".$cdrow['date']."</td></tr>
";
}
echo "</table>";



$cdquery="SELECT * FROM schedule where trainno='".$_GET["trainno"]."' ";
$cdresult=mysqli_query($conn,$cdquery);
$stations=array();
$arrival=array();
$departure=array();
$i=0;
while($cdrow=mysqli_fetch_array($cdresult))
{
	$stations[$i]=$cdrow["sname"];
	$arrival[$i]=$cdrow["arrival_time"];
	$departure[$i]=$cdrow["departure_time"];
	$i+=1;
}



echo "
<table>
<thead><td>Id</td><td>Staring_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td></thead>
";
$temp=0;
while ($temp<$i-1) 
{
	echo "
<tr><td>".($temp+1)."</td><td>".$stations[$temp]."</td><td>".$departure[$temp]."</td><td>".$stations[$temp+1]."</td><td>".$arrival[$temp+1]."</td></tr>
";
$temp+=1;
}
echo "</table>";

echo " <br><a href=\"http://localhost/railway/All_trains.php\">Go Back to Train Menu</a><br> ";
echo " <br><a href=\"http://localhost/railway/Admin.php\">Go Back to Admin Menu</a> ";
?>
</body>
</html>