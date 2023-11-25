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

$stations=$_SESSION["stations"];

$temp=0;
while ($temp<$_SESSION["ns"]) 
{
	if($_POST["s1".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','AC1','".$_POST["s1".$temp]."','".$_POST["f1".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s2".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','AC2','".$_POST["s2".$temp]."','".$_POST["f2".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s3".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','AC3','".$_POST["s3".$temp]."','".$_POST["f3".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s4".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','CC','".$_POST["s4".$temp]."','".$_POST["f4".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s5".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','EC','".$_POST["s5".$temp]."','".$_POST["f5".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s6".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','SL','".$_POST["s6".$temp]."','".$_POST["f6".$temp]."')";
	$flag=($conn->query($sql));
	}

	$temp+=1;
}

if ($flag === TRUE) {
    echo "New seat arrangement added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/Admin.php\">Go Back to Admin Menu</a> ";

?>
</body>
</html>