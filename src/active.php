<?php 

$sql = "SELECT COUNT(*) AS total_active FROM student WHERE pass='0' ";
$result = mysqli_query($conn, $sql);
$total_active = mysqli_fetch_assoc($result)['total_active'];
?>
