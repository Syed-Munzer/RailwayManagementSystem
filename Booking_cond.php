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
<body style=" background-image: url(Images/pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    color: white" >


<?php 

session_start();

require "db.php";

$pname=$_POST["pname"];
$page=$_POST["page"];
$pgender=$_POST["pgender"];

$tno=$_SESSION["tno"];
$doj=$_SESSION["doj"];
$sp=$_SESSION["sp"];
$dp=$_SESSION["dp"];
$class=$_SESSION["class"];
//echo "$tno $doj $class";

$query=" SELECT fare FROM classseats WHERE trainno='".$tno."' AND class='".$class."' AND doj='".$doj."' AND sp='".$sp."' AND dp='".$dp."'  ";
$result=mysqli_query($conn,$query) or die(mysql_error());

$row=mysqli_fetch_array($result);
$fare=$row[0];
//echo "$fare";
$tempfare=0;
$temp=0;

for($i=0;$i<$_SESSION["nos"];$i++) 
{
 if($page[$i]>=18)
 {
  $temp++;
  $tempfare+=$fare;
 }
 else if($page[$i]<18)
  $tempfare+=0.5*$fare;
 else if($page[$i]>=60)
  $tempfare+=0.5*$fare;
}
//echo "   $tempfare";

if($temp==0)
{
 echo "<br><br>Atleast one adult must accompany!!!";
 echo "<br><br><a href=\"http://localhost/railway/Info.php\">Back to Enquiry</a> <br>";
 die();
}

echo "Total fare is Rs.".$tempfare."/-";

$sql = "INSERT INTO resv(id,trainno,sp,dp,doj,tfare,class,nos) VALUES ('".$_SESSION["id"]."','".$_SESSION["tno"]."','".$_SESSION["sp"]."','".$_SESSION["dp"]."','".$_SESSION["doj"]."','".$tempfare."','".$_SESSION["class"]."','".$_SESSION["nos"]."' )";

if ($conn->query($sql) === TRUE) 
{
 echo "<br><br>Reservation Successful";
} 

$tid=$_SESSION["id"];
$ttno=$_SESSION["tno"];
$tdoj=$_SESSION["doj"];

$query=" Select pnr from resv where id='".$tid."' AND trainno='".$ttno."' AND doj='".$tdoj."' ";
$result=mysqli_query($conn,$query) or die(mysql_error());

//echo "HI,here's your ticket details";
//print_r($result);

$row=mysqli_fetch_array($result);
$rpnr=$row['pnr'];
//echo " $rpnr ";

$tpname=$_POST['pname'];
//$ntpname = count($_REQUEST['pname']);
$tpage=$_POST["page"];
$tpgender=$_POST["pgender"];

for($i=0;$i<$_SESSION["nos"];$i++) 
{
$sql = "INSERT INTO pd(pnr,pname,page,pgender) VALUES  ('".$rpnr."','".$tpname[$i]."','".$tpage[$i]."','".$tpgender[$i]."')";

if ($conn->query($sql) === TRUE) 
{
 echo "<br><br>Passenger details added!!!";
} 
else 
{
 echo "<br><br>Error: " . $conn->error;
}

//echo "Enter Passanger Name: <input type='text' name='pname[]' required> ";
//echo "Enter Passanger Age: <input type='text' name='page[]' required>";
//echo "Enter Passanger Gender: <input type='text' name='pgender[]' required> <br> ";
}

echo "<br><br><a href=\"http://localhost/railway/index.htm\">Go Back</a> <br>";

$conn->close(); 
?>

</body>
</html>
