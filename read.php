<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Data</title>
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
        .header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <i class="fa-solid fa-chart-line"></i> Sales Data
</div>

<div class="container">
    <h2 class="text-center mt-4"><i class="fa-solid fa-list"></i> Sales Records</h2>

    <?php
    include 'db.php';

    $sql = "SELECT * FROM sales_records";
    $result = $conn->query($sql);
    ?>

    <table class="table table-striped table-bordered mt-4">
        <thead>
            <tr>
                <th><i class="fa-solid fa-hashtag"></i> ID</th>
                <th><i class="fa-solid fa-user"></i> Salesperson</th>
                <th><i class="fa-solid fa-box"></i> Product</th>
                <th><i class="fa-solid fa-sort-numeric-up"></i> Quantity</th>
                <th><i class="fa-solid fa-dollar-sign"></i> Sale Amount</th>
                <th><i class="fa-solid fa-calendar"></i> Sale Date</th>
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
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php $conn->close(); ?>
</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; <?php echo date("Y"); ?> Sales Data Management | Powered by <i class="fa-solid fa-bolt"></i></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
