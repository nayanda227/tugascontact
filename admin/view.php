<?php
include('../koneksi/koneksi.php');
session_start();

// Check if ID is provided in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query to fetch the specific entry by ID
    $sql = "SELECT * FROM contact WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No record found";
        exit;
    }
} else {
    echo "Invalid ID";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact</title>
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Content Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3 class="mb-0">View Contact - <?php echo htmlspecialchars($row['name']); ?></h3>
                    <a href="admin.php" class="btn btn-primary">Back to Admin Panel</a>
                </div>
                <table class="table">
                    <tr>
                        <th>Name:</th>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                    </tr>
                    <tr>
                        <th>NIM:</th>
                        <td><?php echo htmlspecialchars($row['nim']); ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                    </tr>
                    <tr>
                        <th>Class:</th>
                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                    </tr>
                    <tr>
                        <th>Gender:</th>
                        <td><?php echo htmlspecialchars($row['gender']); ?></td>
                    </tr>
                    <tr>
                        <th>Suggestion:</th>
                        <td><?php echo htmlspecialchars($row['suggestion']); ?></td>
                    </tr>
                    <tr>
                        <th>Created At:</th>
                        <td><?php echo htmlspecialchars($row['reg_date']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- Content End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>

<?php
$stmt->close();
$conn->close();
?>
