<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescription</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Prescription</h2>
        <?php
        include('connection.php'); // Include database connection file
        
        // Check if user is logged in
        session_start();
        if(!isset($_SESSION['username'])) {
            header("Location: patient_login.php");
            exit;
        }

        // Fetch prescription data from database
        $patient_id = $_SESSION['user_id']; // Assuming the user ID is stored in session
        $query = "SELECT * FROM prescriptions WHERE patient_id = $patient_id";
        $result = mysqli_query($conn, $query);

        // Display prescription data
        if (mysqli_num_rows($result) > 0) {
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . $row['prescription_details'] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "No prescriptions found.";
        }
        ?>
    </div>
</body>
</html>
