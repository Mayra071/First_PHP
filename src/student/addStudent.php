<?php

include "../db/connection.php";

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$target_dir = "../../asset/uploads/";
$profile_pic = "";

if (!empty($_FILES["profile_pic"]["name"])) {
    $file_extension = pathinfo($_FILES["profile_pic"]["name"], PATHINFO_EXTENSION);
    $safe_name = preg_replace("/[^a-zA-Z0-9]/", "_", $name);
    $file_name = $safe_name . "." . $file_extension;
    $target_file = $target_dir . $file_name;
    
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
        $profile_pic = $file_name;
    } else {
        header("Location: ../../addStudent.php?status=error&message=File upload failed");
        exit();
    }
}

$sql = "INSERT INTO student (name, email, mobile, address, city, state, zip, profile_pic) 
        VALUES ('$name', '$email', '$mobile', '$address', '$city', '$state', '$zip', '$profile_pic')";

if (mysqli_query($conn, $sql)) {
    header('Location: ../../addStudent.php?status=success');
    exit();
} else {
    header('Location: ../../addStudent.php?status=error&message=' . urlencode(mysqli_error($conn)));
    exit();
}
  
// mysqli_close($conn);