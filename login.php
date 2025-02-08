<?php include "./src/layout/head.php"; ?>
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<body class="d-flex align-items-center min-vh-100 bg-light">
<main class="w-100 m-auto">
    <div class="card shadow-lg border-0 mx-auto" style="max-width: 400px; border-radius: 15px;">
        <div class="card-body p-4">
            <!-- Status Messages -->
            <?php
            if (isset($_GET['status'])) {
                if ($_GET['status'] == 'success') {
                    echo '<div class="alert alert-success text-center" role="alert">Student added successfully!</div>';
                } elseif ($_GET['status'] == 'error') {
                    echo '<div class="alert alert-danger text-center" role="alert">Error: ' . htmlspecialchars($_GET['message']) . '</div>';
                }
            }
            ?>

            <!-- Login Form -->
            <form action="./src/auth/login.php" method="post">
                <h2 class="text-center fw-bold text-primary mb-4">Welcome Back</h2>
                
                <div class="mb-3 position-relative">
                    <label for="email" class="form-label">Email address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                    </div>
                </div>
                
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" id="password" placeholder="••••••••" required>
                    </div>
                </div>

                <button class="btn btn-primary w-100 py-2 mt-3 fw-bold shadow-sm" type="submit">Sign In</button>
                
                <p class="text-center mt-3 text-secondary">© 2025</p>
            </form>
        </div>
    </div>
</main>

<!-- Custom Styles -->
<style>
    .input-group-text {
        background-color: #f8f9fa;
        border-right: 0;
    }
    .form-control {
        border-left: 0;
    }
    .form-control:focus {
        box-shadow: 0px 0px 8px rgba(0, 123, 255, 0.5);
        border-color: #007bff;
    }
    .btn {
        transition: all 0.3s;
    }
    .btn:hover {
        background-color: #0056b3;
    }
</style>

</body>
</html>
