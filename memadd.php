<?php
$id = $_POST['id'];
$nm = $_POST['name'];

$dbname = "freedbtech_rfid";
$conn = mysqli_connect("freedb.tech", "freedbtech_nganu", "[qwaszx]", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO admin (id, name) VALUES ('$id', '$nm')";

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    header('Location: memlist.php'); //If book.php is your main page where you list your all records
    exit;
} else {
    echo "Error writing record";
}
?>