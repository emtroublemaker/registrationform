<?php

error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$db = "login";

// Create connection
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";
$uname = mysqli_real_escape_string($conn,$_REQUEST['uname']);
$psw = mysqli_real_escape_string($conn,$_REQUEST['psw']);

?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <title>Registration Details</title>
    <!-- CSS FOR STYLING THE PAGE -->
    <form class = "final-report" action = "final.html" method="Post"></form>
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
  
        h1 {
            text-align: center;
            color: Red;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT', 
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
  
        td {
            background-color: pink;
            border: 1px solid black;
        }
  
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
  
        td {
            font-weight: lighter;
        }
    </style>
</head>
  
<body>
    <table>
    <section>
        <h1>Registered</h1>
        <!-- FOR TABLE -->
        <table>
            <tr>
                <th>Username</th>
                <th>Password</th>
            </tr>
            <?php 
                $fetch = "SELECT * from details";
                $result = $conn->query($fetch);

                if($result->num_rows>0){
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>" .$row['username']."</td><td>".$row['password']."<br>";
                         }
                        echo "</table>";
                }
                        else {
                            echo "0 results";
                        }
                        ?>
            
    </body>
</html>
