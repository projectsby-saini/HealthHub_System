<?php
// Check if doctor ID is provided and not empty
$showNavbar = false; // Variable to control navbar visibility

if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Include the connection file
    include('connection.php');

    // Get the doctor ID from the URL
    $doctor_id = $_GET['id'];

    try {
        // Connect to the database
        $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement to fetch doctor details
        $query = $db->prepare("SELECT * FROM experts WHERE id = :id");

        // Bind parameters
        $query->bindParam(':id', $doctor_id);

        // Execute the statement
        $query->execute();

        // Fetch the doctor details
        $doctor = $query->fetch(PDO::FETCH_ASSOC);

        // Check if doctor details are fetched successfully
        if (!$doctor) {
            // No doctor found with the provided ID
            $error_message = "No doctor found with the provided ID.";
        } else {
            $showNavbar = true; // Set to true if doctor details are found
        }
    } catch (PDOException $e) {
        // Error handling for database connection or query execution
        $error_message = "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            margin: 0;
        }

        .profile-container {
            max-width: 600px;
            margin: 20px;
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
            border: 1px solid #ccc;
            text-align: left;
        }

        .profile-container th {
            background-color: #f9f9f9;
        }

        .profile-container form {
            margin-bottom: 20px;
        }

        .profile-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .profile-container button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .profile-container button[type="submit"]:hover {
            background-color: #0056b3;
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
    </style>
</head>
<body>
    <div class="navbar" id="navbar">
        <ul>
            <li><a href="doctor_profile.php">Profile</a></li>
            <li><a href="doctor_appointment.php">Appointments</a></li>
            <li><a href="">Add Prescription</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
    <div class="profile-container">
        <h2>Doctor Profile</h2>
        <form action="" method="GET">
            <label for="doctor_id">Enter Doctor ID:</label>
            <input type="text" id="doctor_id" name="id" required>
            <button type="submit">View Profile</button>
        </form>

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
                    <th>Age</th>
                    <td><?php echo isset($doctor['age']) ? htmlspecialchars($doctor['age']) : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td><?php echo isset($doctor['gender']) ? htmlspecialchars($doctor['gender']) : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Department</th>
                    <td><?php echo htmlspecialchars($doctor['department']); ?></td>
                </tr>
                <tr>
                    <th>Experience</th>
                    <td><?php echo isset($doctor['experience']) ? htmlspecialchars($doctor['experience']) . ' years' : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Languages Spoken</th>
                    <td><?php echo isset($doctor['languages_spoken']) ? htmlspecialchars($doctor['languages_spoken']) : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Contact Details</th>
                    <td><?php echo isset($doctor['contact_details']) ? htmlspecialchars($doctor['contact_details']) : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Mobile No.</th>
                    <td><?php echo isset($doctor['mobile_no']) ? htmlspecialchars($doctor['mobile_no']) : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo isset($doctor['email']) ? htmlspecialchars($doctor['email']) : 'N/A'; ?></td>
                </tr>
                <tr>
                    <th>Schedule</th>
                    <td><?php echo isset($doctor['schedule']) ? htmlspecialchars($doctor['schedule']) : 'N/A'; ?></td>
                </tr>
            </table>
        <?php elseif (isset($error_message)): ?>
            <p><?php echo $error_message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
