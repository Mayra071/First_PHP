<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit;
}
?>

<?php 
include "./src/layout/head.php"; 
?>

<?php include "./src/layout/nav.php"; ?>
<?php include "./src/db/connection.php"; ?>
<?php include "./src/totalStudent.php"; ?>
<?php include "./src/graduated.php"; ?>
<?php include "./src/active.php"; ?>

<!-- Include FontAwesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<div class="container mt-4">
    <div class="row g-4 justify-content-center">
        <!-- Total Students Card -->
        <div class="col-md-3">
            <div class="card text-white bg-gradient-primary shadow-lg text-center p-3">
                <i class="fa fa-users fa-3x mb-2"></i>
                <h5 class="fw-bold">Total Students</h5>
                <h3><?php echo $total; ?></h3>
            </div>
        </div>
        <!-- Active Students Card -->
        <div class="col-md-3">
            <div class="card text-white bg-gradient-success shadow-lg text-center p-3">
                <i class="fa fa-user-check fa-3x mb-2"></i>
                <h5 class="fw-bold">Active Students</h5>
                <h3><?php echo $total_active; ?></h3></h3>
            </div>
        </div>
        <!-- Graduated Students Card -->
        <div class="col-md-3">
            <div class="card text-white bg-gradient-warning shadow-lg text-center p-3">
                <i class="fa fa-user-graduate fa-3x mb-2"></i>
                <h5 class="fw-bold">Graduated Students</h5>
                <h3><?php echo $total_graduate; ?></h3>
            </div>
        </div>
        
    </div>
</div>

<style>
    /* Gradient Backgrounds */
    .bg-gradient-primary { background: linear-gradient(45deg, #007bff, #00c6ff); }
    .bg-gradient-success { background: linear-gradient(45deg, #28a745, #5cd85b); }
    .bg-gradient-warning { background: linear-gradient(45deg, #ffc107, #ffdd57); }
    .bg-gradient-danger { background: linear-gradient(45deg, #dc3545, #ff6b6b); }
    
    /* Card Hover Effect */
    .card {
        border-radius: 12px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
    }
</style>

</body>
</html>
