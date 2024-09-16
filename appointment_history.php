<?php
// Start session
session_start();

// Check if the patient is logged in
if (!isset($_SESSION['patient_id'])) {
    header("Location: patient_login.php");
    exit;
}

// Include the connection file
include('connection.php');

// Fetch the patient ID from session
$patient_id = $_SESSION['patient_id'];

try {
    $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Prepare SQL statement to fetch appointment history
    $query = $db->prepare("SELECT * FROM appointments WHERE patient_id = :patient_id ORDER BY appointment_date DESC");
    $query->bindValue(':patient_id', $patient_id);
    $query->execute();

    // Fetch all appointments
    $appointments = $query->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment History</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .history-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .history-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .history-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .history-container th, .history-container td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .history-container th {
            background-color: #f9f9f9;
        }

        .history-container tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="history-container">
        <h2>Appointment History</h2>
        <?php if (count($appointments) > 0): ?>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Doctor</th>
                    <th>Reason</th>
                </tr>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($appointment['appointment_date']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['reason']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No appointment history found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
