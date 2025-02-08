<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit;
}
?>
<?php include "./src/layout/head.php"; ?>
<?php include "./src/layout/nav.php"; ?>
<?php
include "./src/db/connection.php";

$id = $_GET['id'];
$sql = "SELECT * FROM student WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
?>

<div class="container-fluid">
<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == 'success') {
        echo '<div class="alert alert-success text-center" role="alert">Student Passed successfully!</div>';
    } elseif ($_GET['status'] == 'error') {
        echo '<div class="alert alert-danger text-center" role="alert">Error: ' . htmlspecialchars($_GET['message']) . '</div>';
    }
}
?>

<div class="card col-md-8 m-auto">
  <div class="card-header">
    Student Profile
  </div>
  <div class="card-body text-center">
    <!-- Profile Image -->
    <div class="mb-3">
        <img src='./asset/uploads/<?php echo htmlspecialchars($student['profile_pic']); ?>' 
             width='150' height='150' 
             class='rounded-circle shadow-lg border border-3 border-primary'>
    </div>

    <!-- Student Name -->
    <h2 class="fw-bold text-primary"><?php echo htmlspecialchars($student['name']); ?></h2>

    <!-- Student Details -->
    <h5 class="text-muted"><i class="fa fa-envelope"></i> <?php echo htmlspecialchars($student['email']); ?></h5>
    <h5 class="text-muted"><i class="fa fa-phone"></i> <?php echo htmlspecialchars($student['mobile']); ?></h5>
    <h5 class="text-muted"><i class="fa fa-map-marker-alt"></i> <?php echo htmlspecialchars($student['address']); ?></h5>

    <!-- Pass Status or Button -->
    <div class="mt-3">
        <?php if ($student['pass'] == 1): ?>
            <span class='badge bg-success fs-5 px-3 py-2'><i class="fa fa-check-circle"></i> Passed</span>
        <?php else: ?>
            <a href='./src/student/passStudent.php?id=<?php echo $student['id']; ?>' 
               class='btn btn-info btn-lg text-white'>
               <i class="fa fa-check"></i> Pass
            </a>
        <?php endif; ?>
    </div>
</div>

</div>

</div>
    
</body>
</html>