<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Custom CSS -->
<style>
  .navbar {
    background: linear-gradient(135deg,rgb(37, 20, 65),rgb(118, 118, 118)); /* Cool Gradient */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }
  .navbar-brand {
    font-size: 1.5rem;
    font-weight: bold;
    color: #fff !important;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
  }
  .nav-link {
    color: #fff !important;
    font-weight: 500;
    transition: 0.3s ease-in-out;
  }
  .nav-link:hover {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    padding: 8px 15px;
  }
  .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.5);
  }
  .navbar-toggler-icon {
    filter: invert(1);
  }
  .btn-logout, .btn-login {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    padding: 6px 15px;
    transition: 0.3s ease-in-out;
  }
  .btn-logout:hover, .btn-login:hover {
    background: rgba(255, 255, 255, 0.4);
  }
  .logo {
    height: 50px;  /* Adjust height (smaller) */
    width: auto;   /* Maintain aspect ratio */
    border-radius: 8px; /* Optional: Adds rounded corners */
}

.logo {
    height: 40px;
    width: auto;
    transition: transform 0.3s ease-in-out;
}
.logo:hover {
    transform: scale(1.5); /* Zooms 1.5x when hovered */
}


</style>

<nav class="navbar navbar-expand-lg">
  <div class="container">
  <a class="navbar-brand" href="#">
      <img src="asset/uploads/logo1.jpg" alt="Logo" class="logo">
    </a>
    <a class="navbar-brand" href="#">S.M.S</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addStudent.php">New Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewStudent.php">View Student</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <?php if (isset($_SESSION['user_email'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="#">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-logout" href="/student/src/auth/logout.php">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link btn-login" href="/student/login.php">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
