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

/*require "db.php";

$sql = "INSERT INTO station(sname) VALUES ('".$_POST["sname"]."')";

if ($conn->query($sql) === TRUE) {
    echo " '".$_POST["sname"]."':New record created successfully";
} else {
    echo "Error:" . $conn->error;
}*/

require "db.php";

// Check if the form is submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'sname' key is set in the $_POST array
    if (isset($_POST["sname"])) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $sname = mysqli_real_escape_string($conn, $_POST["sname"]);

        // Build the SQL query using a prepared statement
        $sql = "INSERT INTO station(sname) VALUES ('$sname')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            echo "'$sname': New record created successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: 'sname' is not set in the form submission.";
    }
} else {
    echo "Error: Form not submitted using the POST method.";
}

echo "<br> <a href=\"http://localhost/railway/Admin.php\">Go Back to Admin Menu</a> ";

$conn->close();
?>

</body>
</html>