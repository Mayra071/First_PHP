<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "../db/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email) || empty($password)) {
        header("Location: ../../login.php?status=error&message=Email and Password are required.");
        exit;
    }

    // Query the database to check if the user exists
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if ($password === $user['password']) {
            // password_verify($password, $user['password'])

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            header("Location: ../../index.php");
            exit;
        } else {
            header("Location: ../../login.php?status=error&message=Invalid password.");
        }
    } else {
        header("Location: ../../login.php?status=error&message=No user found with this email.");
    }
}
?>