<?php
include "./src/db/connection.php";

$sql = "SELECT * FROM student ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>
