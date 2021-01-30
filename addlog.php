<?php
    include 'connect.php';
    $cardid = $_GET['cardid'];
    $time = time();
	
    $stmt = $conn->prepare("INSERT INTO `tbllogs`(`cardid`, `logdate`) VALUES (:card, :dt)");
    $stmt->bindParam(":card", $cardid);
    $stmt->bindParam(":dt", $time);
	$stmt->execute();
	

	$dbname = "freedbtech_rfid";
	$conn = mysqli_connect("freedb.tech", "freedbtech_nganu", "[qwaszx]", $dbname);
	$result = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$cardid'");
	$row = mysqli_num_rows($result);
	if($row > 0){
	    echo "authenticated";
	}else{
		echo "success";
    }
?>