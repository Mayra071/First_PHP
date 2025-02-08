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

<div class="container mt-4">
    <?php if (isset($_GET['status'])): ?>
        <div class="alert alert-<?php echo $_GET['status'] == 'success' ? 'success' : 'danger'; ?> text-center" role="alert">
            <?php echo $_GET['status'] == 'success' ? 'Student added successfully!' : 'Error: ' . htmlspecialchars($_GET['message']); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-lg col-md-8 m-auto">
        <div class="card-header bg-primary text-white text-center">
            <h5 class="mb-0">New Student</h5>
        </div>
        <div class="card-body">
            <form class="row g-3" action="./src/student/addStudent.php" method="post" enctype="multipart/form-data">
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-6">
                    <label for="mobile" class="form-label">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                </div>
                <div class="col-6">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Apartment, studio, or floor" required>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" name="city" id="inputCity" required>
                </div>
                <div class="col-md-4">
                    <label for="inputState" class="form-label">State</label>
                   <input type="text" class="form-control" id="state" name="state" placeholder="state">
                </div>
                <div class="col-md-2">
                    <label for="inputZip" class="form-label">Zip</label>
                    <input type="text" name="zip" class="form-control" id="inputZip" required>
                </div>
                <div class="col-12">
                    <label for="profile_pic" class="form-label">Profile Picture</label>
                    <input type="file" class="form-control" name="profile_pic" id="profile_pic" accept="image/*" onchange="previewImage(event)">
                    <div class="mt-3 text-center">
                        <img id="imagePreview" class="img-thumbnail" style="max-width: 150px; display: none;">
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary btn-lg w-50">Create New</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

</body>
</html>
