<?php 
$sql = "SELECT COUNT(*) AS total FROM student";

 $result = mysqli_query($conn, $sql);
 $total = mysqli_fetch_assoc($result)['total'];
?>
