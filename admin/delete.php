<?php
include('../koneksi/koneksi.php');
session_start();

// Check if ID is provided in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare the delete statement
    $sql = "DELETE FROM contact WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect to the admin panel with a success message
        header("Location: admin.php?message=Deleted successfully");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid ID";
    exit;
}

$stmt->close();
$conn->close();
?>
