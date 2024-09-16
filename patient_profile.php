<?php
// Start session (if not already started)
session_start();

// Include the connection file
include('connection.php');

// Check if the ID is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL statement to fetch patient details
        $query = $db->prepare("SELECT * FROM patients WHERE id = :id");
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        
        // Fetch the patient data
        $patient = $query->fetch(PDO::FETCH_ASSOC);
        
        if (!$patient) {
            echo "<script>alert('Patient not found');</script>";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<script>alert('No patient ID provided');</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
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

        .profile-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .profile-container table {
            width: 100%;
            border-collapse: collapse;
        }

        .profile-container th, .profile-container td {
            padding: 10px;
            text-align: left;
        }

        .profile-container th {
            background-color: #007bff;
            color: #fff;
        }

        .profile-container tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <ul>
        <li><a href="patient_profile.php?id=<?php echo $id; ?>">Profile</a></li>
        <li><a href="appointment.php">Book Appointment</a></li>
        <li><a href="appointment_success.php">Appointment Status</a></li>
        <li><a href="update_patient.php?id=<?php echo $id; ?>">Update Details</a></li>
        <li><a href="search_doctor.php">View Doctor</a></li>
        <li><a href="appointment_history.php?id=<?php echo $id; ?>">Receipt of Payment</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="profile-container">
        <h2>PATIENT PROFILE</h2>
        <table>
            <tr>
                <th>Name</th>
                <td><?php echo htmlspecialchars($patient['name']); ?></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><?php echo htmlspecialchars($patient['dob']); ?></td>
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
                <th>Email</th>
                <td><?php echo htmlspecialchars($patient['email']); ?></td>
            </tr>
            <tr>
                <th>Mobile No</th>
                <td><?php echo htmlspecialchars($patient['mobile']); ?></td>
            </tr>
            <tr>
                <th>Address</th>
                <td><?php echo htmlspecialchars($patient['address']); ?></td>
            </tr>
            <tr>
                <th>Insurance Type</th>
                <td><?php echo htmlspecialchars($patient['insurance']); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
