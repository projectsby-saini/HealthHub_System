<?php
session_start();
include('connection.php');

// Check if the doctor is logged in
if (!isset($_SESSION['doctor_id'])) {
    header("Location: doctor_login.php");
    exit();
}

$doctor_id = $_SESSION['doctor_id'];

try {
    // Fetch doctor details
    $stmt = $db->prepare("SELECT * FROM experts WHERE id = :doctor_id");
    $stmt->bindParam(':doctor_id', $doctor_id);
    $stmt->execute();
    $doctor = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch appointments
    $stmt = $db->prepare("SELECT * FROM appointments WHERE doctor_id = :doctor_id");
    $stmt->bindParam(':doctor_id', $doctor_id);
    $stmt->execute();
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error_message = "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .profile-container, .appointments-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2, .appointments-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .profile-container table, .appointments-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .profile-container th, .appointments-container th,
        .profile-container td, .appointments-container td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }

        .profile-container th, .appointments-container th {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Doctor Profile</h2>
        <?php if (isset($doctor)): ?>
            <table>
                <tr>
                    <th>Doctor ID</th>
                    <td><?php echo htmlspecialchars($doctor['id']); ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo htmlspecialchars($doctor['name']); ?></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td><?php echo htmlspecialchars($doctor['department']); ?></td>
                </tr>
            </table>
        <?php else: ?>
            <p>No doctor details found.</p>
        <?php endif; ?>
    </div>

    <div class="appointments-container">
        <h2>Your Appointments</h2>
        <?php if (isset($appointments) && count($appointments) > 0): ?>
            <table>
                <tr>
                    <th>Patient ID</th>
                    <th>Patient Name</th>
                    <th>Booking Time</th>
                </tr>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($appointment['patient_id']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['patient_name']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['booking_time']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>No appointments found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
