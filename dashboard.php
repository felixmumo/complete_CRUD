<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }
        .container {
            margin-top: 20px;
        }
        .dashboard-card {
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-card i {
            font-size: 40px;
            margin-bottom: 10px;
            color: #007bff;
        }
    </style>
</head>
<body>

<!-- Top Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#"><i class="fa-solid fa-chart-line"></i> Sales Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="read.php"><i class="fa-solid fa-table"></i> View Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="update.php"><i class="fa-solid fa-pen-to-square"></i> Manage Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="create.php"><i class="fa-solid fa-plus"></i> Add Sale</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Dashboard Content -->
<div class="container">
    <h2 class="text-center mt-4"><i class="fa-solid fa-chart-bar"></i> Welcome to Sales Dashboard</h2>
    <p class="text-center">Manage sales records efficiently with the navigation above.</p>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="dashboard-card">
                <i class="fa-solid fa-table"></i>
                <h4>View Sales Records</h4>
                <p>See all sales transactions.</p>
                <a href="read.php" class="btn btn-primary">Go to Sales Data</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card">
                <i class="fa-solid fa-pen-to-square"></i>
                <h4>Manage Sales</h4>
                <p>Update or delete sales records.</p>
                <a href="update.php" class="btn btn-warning">Go to Manage Sales</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="dashboard-card">
                <i class="fa-solid fa-plus"></i>
                <h4>Add New Sale</h4>
                <p>Insert a new sales record.</p>
                <a href="create.php" class="btn btn-success">Go to Add Sale</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
