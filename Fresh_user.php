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
<body style=" background-image: url(Images/userlogin.png);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

<?php 

require "db.php";

$pwd=$_POST["password"];
$eid=$_POST["emailid"];
$mno=$_POST["mobileno"];
$dob=$_POST["dob"];

$sql = "INSERT INTO user (password,emailid,mobileno,dob) VALUES ('".$pwd."','".$eid."','".$mno."','".$dob."')";
// echo $sql;

if ($conn->query($sql) === TRUE) 
{
 echo "Hi $eid, <a href=\"http://localhost/railway/index.htm\"> Click here </a> to browse through our website!!! " ;
} 
else 
{
 echo "Error:" . $conn->error. "<br> <a href=\"http://localhost/railway/Fresh_user.htm\">Go Back to Login</a> ";
}

$conn->close(); 
?>

</body>
</html>
