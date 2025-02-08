<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        table.dataTable tbody tr:hover {
            background-color: #e9ecef;
        }
        .rounded-profile {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 2px solid #007bff;
        }
        .btn {
            transition: all 0.3s;
        }
        .btn-warning:hover {
            background-color: #d39e00;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
<?php include "./src/layout/nav.php"; ?>
<?php include "./src/student/getStudent.php"; ?>

<div class="container my-4">
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 'success') {
            echo '<div class="alert alert-success text-center" role="alert">Student deleted successfully!</div>';
        } elseif ($_GET['status'] == 'error') {
            echo '<div class="alert alert-danger text-center" role="alert">Error: ' . htmlspecialchars($_GET['message']) . '</div>';
        }
    }
    ?>

    <div class="card p-4">
        <div class="card-header bg-primary text-white text-center fw-bold">
            Student List
        </div>
        <div class="card-body">
            <table id="studentTable" class="table table-hover table-bordered">
                <thead class="table-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>Profile Pic</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Zip</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";

                            // Profile Picture with a default fallback
                            $profile_pic = !empty($row['profile_pic']) ? $row['profile_pic'] : 'default.jpg';
                            echo "<td><img src='./asset/uploads/$profile_pic' class='rounded-circle rounded-profile'></td>";

                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['mobile'] . "</td>";
                            echo "<td>" . $row['address'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo "<td>" . $row['state'] . "</td>";
                            echo "<td>" . $row['zip'] . "</td>";

                            // Edit & Delete Buttons with Icons
                            echo "<td>
                                    <a href='student.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>
                                        <i class='fa fa-eye'></i> View
                                    </a>
                                    <a href='./src/student/deleteStudent.php?id=" . $row['id'] . "' 
                                       class='btn btn-danger btn-sm' 
                                       onclick='return confirm(\"Are you sure you want to delete this student?\")'>
                                        <i class='fa fa-trash'></i> Delete
                                    </a>
                                </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='10' class='text-center'>No students found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- jQuery & DataTables Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {
    $('#studentTable').DataTable({
        "paging": true,
        "ordering": true,
        "info": true,
        "lengthMenu": [5, 10, 25, 50],
        "language": {
            "search": "Search Student:"
        }
    });
});
</script>

</body>
</html>
