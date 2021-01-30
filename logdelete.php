<?php
$id = $_GET['id'];

$dbname = "freedbtech_rfid";
$conn = mysqli_connect("freedb.tech", "freedbtech_nganu", "[qwaszx]", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$t = "tbllogs";
$f = "logid";

$sql = "DELETE FROM $t WHERE $f = $id";
$ai = "ALTER TABLE $t AUTO_INCREMENT = $id";
$set = "ALTER TABLE $t DROP $f";
$reset = "ALTER TABLE $t ADD $f INT NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";

if (mysqli_query($conn, $sql) && mysqli_query($conn, $set) && mysqli_query($conn, $reset)) {
    mysqli_close($conn);
    header('Location: index.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>