<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sales Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #218838;
        }
        .icon {
            margin-right: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4"><i class="fa-solid fa-cart-plus"></i> Add Sales Record</h2>
    
    <?php
    include 'db.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $salesperson = $_POST["salesperson"];
        $product = $_POST["product"];
        $quantity = $_POST["quantity"];
        $sale_amount = $_POST["sale_amount"];
        $sale_date = $_POST["sale_date"];

        $stmt = $conn->prepare("INSERT INTO sales_records (salesperson_name, product, quantity, sale_amount, sale_date) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssids", $salesperson, $product, $quantity, $sale_amount, $sale_date);

        if ($stmt->execute()) {
            echo '<div class="alert alert-success"><i class="fa-solid fa-check-circle"></i> New sale record added successfully!</div>';
        } else {
            echo '<div class="alert alert-danger"><i class="fa-solid fa-exclamation-triangle"></i> Error: ' . $stmt->error . '</div>';
        }

        $stmt->close();
        $conn->close();
    }
    ?>

    <form method="POST">
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" name="salesperson" class="form-control" placeholder="Salesperson Name" required>
        </div>
        
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-box"></i></span>
            <input type="text" name="product" class="form-control" placeholder="Product" required>
        </div>
        
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-sort-numeric-up"></i></span>
            <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
        </div>
        
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="text" name="sale_amount" class="form-control" placeholder="Sale Amount" required>
        </div>
        
        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
            <input type="date" name="sale_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-custom"><i class="fa-solid fa-plus"></i> Add Sale</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
