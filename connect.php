<?php
date_default_timezone_set('Asia/Jakarta');
$servername = "freedb.tech";
$username = "freedbtech_nganu";
$password = "[qwaszx]";
$dbname = "freedbtech_rfid";
$con = mysqli_connect("freedb.tech", "freedbtech_nganu", "", $dbname);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    	echo "Connection failed: " . $e->getMessage();
    }

