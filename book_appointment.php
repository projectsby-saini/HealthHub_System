<?php
session_start();
include('connection.php'); // Ensure this file path is correct

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Insert patient registration data into the database
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $insurance = $_POST['insurance'];

    try {
        // Insert patient details
        $query = $db->prepare("INSERT INTO patients (name, dob, gender, blood_group, email, mobile, address, insurance) VALUES (:name, :dob, :gender, :blood_group, :email, :mobile, :address, :insurance)");
        $query->bindValue(':name', $name);
        $query->bindValue(':dob', $dob);
        $query->bindValue(':gender', $gender);
        $query->bindValue(':blood_group', $blood_group);
        $query->bindValue(':email', $email);
        $query->bindValue(':mobile', $mobile);
        $query->bindValue(':address', $address);
        $query->bindValue(':insurance', $insurance);
        
        if ($query->execute()) {
            // Get the last inserted patient ID
            $patient_id = $db->lastInsertId();
            
            // Insert appointment details
            $department = $_POST['department'];
            $doctor_name = $_POST['doctor_name'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            
            $query = $db->prepare("INSERT INTO appointments (patient_id, department, doctor_name, date, time) VALUES (:patient_id, :department, :doctor_name, :date, :time)");
            $query->bindValue(':patient_id', $patient_id);
            $query->bindValue(':department', $department);
            $query->bindValue(':doctor_name', $doctor_name);
            $query->bindValue(':date', $date);
            $query->bindValue(':time', $time);
            
            if ($query->execute()) {
                echo "<script>alert('Patient registered and appointment booked successfully');</script>";
            } else {
                echo "<script>alert('Failed to book appointment');</script>";
            }
        } else {
            echo "<script>alert('Registration Failed');</script>";
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
    <title>Admin Book Appointment</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }
        .container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .container input, .container select, .container textarea, .container button {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .container button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        .container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Admin Book Appointment</h2>
        <form action="" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Name" required>
            
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>
            
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            
            <label for="blood_group">Blood Group:</label>
            <input type="text" id="blood_group" name="blood_group" placeholder="Blood Group" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>
            
            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" placeholder="Mobile" required>
            
            <label for="address">Address:</label>
            <textarea id="address" name="address" placeholder="Address" required></textarea>
            
            <label for="insurance">Insurance:</label>
            <input type="text" id="insurance" name="insurance" placeholder="Insurance" required>
            
            <label for="department">Department:</label>
            <input type="text" id="department" name="department" placeholder="Department" required>
            
            <label for="doctor_name">Doctor Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" placeholder="Doctor Name" required>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
            
            <button type="submit">Book Appointment</button>
        </form>
    </div>
</body>
</html>

