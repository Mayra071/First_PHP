<?php

include "../db/connection.php";
$sql = "UPDATE student SET pass = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_GET['id']);
$stmt->execute();
header("Location: ../../student.php?id=" . $_GET['id']."&status=success");