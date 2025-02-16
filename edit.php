<?php
include 'db.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Fetch record for the given ID
    $stmt = $conn->prepare("SELECT * FROM sales_records WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("<div class='alert alert-danger text-center'>Invalid Sale ID!</div>");
    }
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $salesperson = $_POST["salesperson"];
    $product = $_POST["product"];
    $quantity = $_POST["quantity"];
    $sale_amount = $_POST["sale_amount"];
    $sale_date = $_POST["sale_date"];

    $stmt = $conn->prepare("UPDATE sales_records SET salesperson_name = ?, product = ?, quantity = ?, sale_amount = ?, sale_date = ? WHERE id = ?");
    $stmt->bind_param("ssidsi", $salesperson, $product, $quantity, $sale_amount, $sale_date, $id);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success text-center'><i class='fa-solid fa-check-circle'></i> Sale record updated successfully!</div>";
    } else {
        echo "<div class='alert alert-danger text-center'><i class='fa-solid fa-exclamation-triangle'></i> Error: " . $stmt->error . "</div>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sale Record</title>
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
    <h2 class="text-center mb-4"><i class="fa-solid fa-edit"></i> Edit Sale Record</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
            <input type="text" name="salesperson" class="form-control" value="<?php echo $row['salesperson_name']; ?>" required>
        </div>

        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-box"></i></span>
            <input type="text" name="product" class="form-control" value="<?php echo $row['product']; ?>" required>
        </div>

        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-sort-numeric-up"></i></span>
            <input type="number" name="quantity" class="form-control" value="<?php echo $row['quantity']; ?>" required>
        </div>

        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-dollar-sign"></i></span>
            <input type="text" name="sale_amount" class="form-control" value="<?php echo $row['sale_amount']; ?>" required>
        </div>

        <div class="input-group">
            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
            <input type="date" name="sale_date" class="form-control" value="<?php echo $row['sale_date']; ?>" required>
        </div>

        <button type="submit" class="btn btn-custom"><i class="fa-solid fa-save"></i> Save Changes</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
