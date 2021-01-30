<?php 
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["action"])){
	switch ($_GET['action']) {
		case 'insertRfIdLog':
			insertRfIdLog();
		break;


		case 'showLogs':
		showLogs();

		default:

		break;

		case 'showMem':
		showMem();
		break;
	}
}


function insertRfIdLog() {
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
}

function showLogs()
{
	include 'connect.php';

	$logs = $conn->query("SELECT `tbllogs`.*, `admin`.`name` FROM `tbllogs` LEFT JOIN `admin` ON id = cardid ORDER BY logid");
	while($r = $logs->fetch()){

		echo "<tr>";
		echo "<td>".$r['logid']."</td>";
		echo "<td>".$r['name']."</td>";
		echo "<td>".$r['cardid']."</td>";
		$dateadded = date("F j, Y, g:i a", $r["logdate"]);
		echo "<td>".$dateadded."</td>";
		echo "<td><a href='logdelete.php?id=".$r['logid']."'>Delete</a></td>";
		echo "</tr>";
	}
}
function showMem()
{
	include 'connect.php';

	$mem = $conn->query("SELECT * FROM `admin`");
	while($r = $mem->fetch()){
		echo "<tr>";
		echo "<td>".$r['name']."</td>";
		echo "<td>".$r['id']."</td>";
		echo "<td><a href='memdelete.php?id=".$r['id']."'>Delete</a></td>";
		echo "</tr>";
	}
}

?>
