
<?php 

$sql = "SELECT COUNT(*) AS total_active FROM student WHERE pass='1' ";
$result = mysqli_query($conn, $sql);
$total_graduate = mysqli_fetch_assoc($result)['total_active'];
?>
