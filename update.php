<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sales Records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 20px;
        }
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .table td, .table th {
            padding: 12px;
            text-align: center;
        }
        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .table tr:hover {
            background-color: #ddd;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
    <script>
        function confirmDelete(id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = "delete.php?id=" + id;
            }
        }
    </script>
</head>
<body>

<!-- Header -->
<div class="header">
    <i class="fa-solid fa-table"></i> Manage Sales Records
</div>

<div class="container">
    <h2 class="text-center mt-4"><i class="fa-solid fa-edit"></i> Update or Delete Sales Records</h2>

    <?php
    if (isset($_GET["status"])) {
        if ($_GET["status"] == "deleted") {
            echo "<div class='alert alert-success text-center'><i class='fa-solid fa-check-circle'></i> Sale record deleted successfully!</div>";
        } elseif ($_GET["status"] == "error") {
            echo "<div class='alert alert-danger text-center'><i class='fa-solid fa-exclamation-triangle'></i> Error deleting record!</div>";
        } elseif ($_GET["status"] == "invalid") {
            echo "<div class='alert alert-warning text-center'><i class='fa-solid fa-info-circle'></i> Invalid sale ID!</div>";
        }
    }
    ?>

    <?php
    // Fetch sales records
    $sql = "SELECT * FROM sales_records";
    $result = $conn->query($sql);

    if ($result->num_rows > 0): ?>
        <table class="table table-striped table-bordered mt-4">
            <thead>
                <tr>
                    <th><i class="fa-solid fa-hashtag"></i> ID</th>
                    <th><i class="fa-solid fa-user"></i> Salesperson</th>
                    <th><i class="fa-solid fa-box"></i> Product</th>
                    <th><i class="fa-solid fa-sort-numeric-up"></i> Quantity</th>
                    <th><i class="fa-solid fa-dollar-sign"></i> Sale Amount</th>
                    <th><i class="fa-solid fa-calendar"></i> Sale Date</th>
                    <th><i class="fa-solid fa-gears"></i> Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["salesperson_name"]; ?></td>
                        <td><?php echo $row["product"]; ?></td>
                        <td><?php echo $row["quantity"]; ?></td>
                        <td><?php echo $row["sale_amount"]; ?></td>
                        <td><?php echo $row["sale_date"]; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-edit btn-sm"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                            <a href="#" class="btn btn-delete btn-sm" onclick="confirmDelete(<?php echo $row['id']; ?>)">
                                <i class="fa-solid fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning text-center"><i class="fa-solid fa-exclamation-circle"></i> No sales records found!</div>
    <?php endif; ?>

    <?php $conn->close(); ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
