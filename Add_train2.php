<html>
<head>
    <style>
        body {
            background-image: url(Images/userlogin.png);
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
        }

        p {
            font-size: 24px; /* Adjust the font size as needed */
            color: #3498db; /* Adjust the text color as needed */
            text-align: center;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            color: maroon;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid maroon;
            border-radius: 5px;
            background-color: transparent;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        a:hover {
            background-color: #e74c3c;
            color: white;
        }
    </style>
</head>
<body style=" background-image: url(Images/adminlogin.jpeg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

<?php
session_start();


require "db.php";

$sql = "INSERT INTO train (tname,sp,st,dp,dt,date) VALUES ('".$_SESSION["tname"]."','".$_SESSION["sp"]."','".$_SESSION["st"]."','".$_SESSION["dp"]."','".$_SESSION["dt"]."','".$_SESSION["date"]."')";

if ($conn->query($sql) === TRUE) {
    echo "New Train record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$cdquery="SELECT trainno FROM train where tname='".$_SESSION["tname"]."' AND sp='".$_SESSION["sp"]."' AND dp='".$_SESSION["dp"]."'";
$cdresult=mysqli_query($conn,$cdquery);			
$cdrow=mysqli_fetch_array($cdresult);
$trainno=$cdrow['trainno'];

$sql = "INSERT INTO schedule (trainno,sname,arrival_time,departure_time) VALUES ('".$trainno."','".$_SESSION["sp"]."','".$_SESSION["st"]."','".$_SESSION["st"]."')";
$flag=($conn->query($sql));
$temp=1;
while ($temp<=$_SESSION["ns"]) 
{
	$sql = "INSERT INTO schedule (trainno,sname,arrival_time,departure_time) VALUES ('".$trainno."','".$_POST["stn".$temp]."','".$_POST["st".$temp]."','".$_POST["dt".$temp]."')";
	$flag=($conn->query($sql));
	$temp+=1;
}
$sql = "INSERT INTO schedule (trainno,sname,arrival_time,departure_time) VALUES ('".$trainno."','".$_SESSION["dp"]."','".$_SESSION["dt"]."','".$_SESSION["dt"]."')";
$flag=($conn->query($sql));

if ($flag === TRUE) {
    echo "New schedule added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/Admin.php\">Go Back to Admin Menu</a> ";

?>
</body>
</html>