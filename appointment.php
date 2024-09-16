<?php
session_start();
include('connection.php');

// Check if patient ID exists in the session
if (!isset($_SESSION['patient_id'])) {
    // Redirect to login page or display an error message
    header("Location: login.php");
    exit;
}

// Check if the form is submitted
if (isset($_POST['book_appointment'])) {
    $department = $_POST['department'];
    $doctor_name = $_POST['doctor_name'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Get the patient ID from the session
    $patient_id = $_SESSION['patient_id'];

    try {
        // Initialize PDO connection
        $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error reporting

        $query = $db->prepare("INSERT INTO appointments (patient_id, department, doctor_name, date, time) VALUES (:patient_id, :department, :doctor_name, :date, :time)");
        $query->bindValue(':patient_id', $patient_id);
        $query->bindValue(':department', $department);
        $query->bindValue(':doctor_name', $doctor_name);
        $query->bindValue(':date', $date);
        $query->bindValue(':time', $time);
        
        if ($query->execute()) {
            // Redirect to a success page
            header("Location: appointment_success.php");
            exit();
        } else {
            echo "<script>alert('Failed to book appointment');</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .appointment-container {
            max-width: 500px;
            margin: 80px auto; /* Adjusted margin to center the form */
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .appointment-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .appointment-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .appointment-container select,
        .appointment-container input[type="date"],
        .appointment-container input[type="time"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .appointment-container button {
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

        .appointment-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="appointment-container">
        <h2>BOOK APPOINTMENT</h2>
        <form action="" method="POST">
            <label for="department">Select Department:</label>
            <select id="department" name="department" required>
                <option value="">Select Department</option>
                <option value="General Surgery">General Surgery</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Pediatrics">Pediatrics</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Neurology">Neurology</option>
                <option value="ENT">ENT</option>
                <option value="Orthopedics">Orthopedics</option>
                <option value="Gynecology">Gynecology</option>
                <option value="Psychiatry">Psychiatry</option>
                <!-- Add more department options as needed -->
            </select>

            <label for="doctor_name">Select Doctor Name:</label>
            <select id="doctor_name" name="doctor_name" required>
                <option value="">Select Doctor Name</option>
                <?php
                // Add doctor names based on their department
                $doctors = array(
                    "General Surgery" => "Dr. Marie Durocher",
                    "Cardiology" => "Dr. Charles",
                    "Pediatrics" => "Dr. Will Griever",
                    "Dermatology" => "Dr. Joseph William",
                    "Neurology" => "Dr. Emily Stove",
                    "ENT" => "Dr. David Anderson",
                    "Orthopedics" => "Dr. Russel",
                    "Gynecology" => "Dr. Anita Jennings",
                    "Psychiatry" => "Dr. Maria Francisca"
                    // Add more doctors as needed
                );

                foreach ($doctors as $department => $doctor_name) {
                    echo "<option value='$doctor_name'>$doctor_name ($department)</option>";
                }
                ?>
            </select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <button type="submit" name="book_appointment">Book Appointment</button>
        </form>
    </div>

    
</body>
</html>
