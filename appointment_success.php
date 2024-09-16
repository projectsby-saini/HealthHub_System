<?php
session_start();
include('connection.php');

// Check if patient ID is stored in session
if (!isset($_SESSION['patient_id'])) {
    die("Patient ID not found. Please log in again.");
}

$patient_id = $_SESSION['patient_id'];

try {
    $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch patient details
    $patient_query = $db->prepare("SELECT * FROM patients WHERE id = :patient_id");
    $patient_query->bindValue(':patient_id', $patient_id);
    $patient_query->execute();
    $patient = $patient_query->fetch(PDO::FETCH_ASSOC);
    
    if (!$patient) {
        die("Patient not found.");
    }

    // Fetch the latest appointment details for the patient
    $appointment_query = $db->prepare("SELECT * FROM appointments WHERE patient_id = :patient_id ORDER BY id DESC LIMIT 1");
    $appointment_query->bindValue(':patient_id', $patient_id);
    $appointment_query->execute();
    $appointment = $appointment_query->fetch(PDO::FETCH_ASSOC);

    if (!$appointment) {
        die("No appointment found for this patient.");
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Status</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: <?php echo $showNavbar ? 'block' : 'none'; ?>;
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .navbar li {
            margin-bottom: 10px;
        }

        .navbar li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .navbar li a:hover {
            color: #0056b3;
        }

        .status-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .status-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .status-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .status-container table, .status-container th, .status-container td {
            border: 1px solid #ccc;
        }

        .status-container th, .status-container td {
            padding: 10px;
            text-align: left;
        }

        .status-container th {
            background-color: #007bff;
            color: #fff;
        }

        .status-container td {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
<div class="navbar">
    <ul>
        <li><a href="patient_profile.php?id=<?php echo $id; ?>">Profile</a>
        <li><a href="appointment.php">Book Appointment</a>
        <li><a href="appointment_success.php">Appointment Status</a>
        <li><a href="update_patient.php?id=<?php echo $id; ?>">Update Details</a>
        <li><a href="search_doctor.php">View Doctor</a>
        <li><a href="appointment_history.php?id=<?php echo $id; ?>">Receipt of Payment</a>
        <li><a href="logout.php">Logout</a>
        </ul>
    </div>
    <div class="status-container">
        <h2>APPOINTMENT STATUS</h2>
        <table>
            <tr>
                <th>Patient ID</th>
                <td><?php echo htmlspecialchars($patient['id']); ?></td>
            </tr>
            <tr>
                <th>Patient Name</th>
                <td><?php echo htmlspecialchars($patient['name']); ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?php echo htmlspecialchars($patient['gender']); ?></td>
            </tr>
            <tr>
                <th>Blood Group</th>
                <td><?php echo htmlspecialchars($patient['blood_group']); ?></td>
            </tr>
            <tr>
                <th>Doctor Department</th>
                <td><?php echo htmlspecialchars($appointment['department']); ?></td>
            </tr>
            <tr>
                <th>Doctor Name</th>
                <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
            </tr>
            <tr>
                <th>Date of Appointment</th>
                <td><?php echo htmlspecialchars($appointment['date']); ?></td>
            </tr>
            <tr>
                <th>Time</th>
                <td><?php echo htmlspecialchars($appointment['time']); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
