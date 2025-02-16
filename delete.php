<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM sales_records WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect back with success message
        header("Location: update.php?status=deleted");
    } else {
        // Redirect back with error message
        header("Location: update.php?status=error");
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: update.php?status=invalid");
    exit();
}
?>
