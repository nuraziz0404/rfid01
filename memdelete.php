<?php
$id = $_GET['id'];

$dbname = "freedbtech_rfid";
$conn = mysqli_connect("freedb.tech", "freedbtech_nganu", "[qwaszx]", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$t = "admin";
$f = "id";

$sql = "DELETE FROM $t WHERE $f = $id";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: memlist.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error deleting record";
}
?>