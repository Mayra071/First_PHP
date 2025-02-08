<?php

include "../db/connection.php";

$id = $_GET['id'];
$sql = "DELETE FROM student WHERE id = '$id'";
if ($conn->query($sql) === TRUE) {
    header("Location: ../../viewStudent.php?status=success");
} else {
    header("Location: ../../viewStudent.php?status=error&message=" . $conn->error);
}