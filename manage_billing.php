<?php
session_start();
include('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $patient_id = $_POST['patient_id'];
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $insurance = $_POST['insurance'];
    $doctor_name = $_POST['doctor_name'];
    $consultant_fees = $_POST['consultant_fees'];
    $treatment_fees = $_POST['treatment_fees'];
    $room_charge = $_POST['room_charge'];
    $payment_method = $_POST['payment_method'];

    // Perform any necessary calculations to generate the bill
    $total_amount = $consultant_fees + $treatment_fees + $room_charge;

    try {
        // Prepare SQL statement to insert the bill into the database
        $stmt = $db->prepare("INSERT INTO bills (patient_id, name, dob, gender, blood_group, email, mobile, address, insurance, doctor_name, consultant_fees, treatment_fees, room_charge, payment_method, total_amount) 
                                VALUES (:patient_id, :name, :dob, :gender, :blood_group, :email, :mobile, :address, :insurance, :doctor_name, :consultant_fees, :treatment_fees, :room_charge, :payment_method, :total_amount)");
        
        // Bind parameters
        $stmt->bindParam(':patient_id', $patient_id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':blood_group', $blood_group);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mobile', $mobile);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':insurance', $insurance);
        $stmt->bindParam(':doctor_name', $doctor_name);
        $stmt->bindParam(':consultant_fees', $consultant_fees);
        $stmt->bindParam(':treatment_fees', $treatment_fees);
        $stmt->bindParam(':room_charge', $room_charge);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':total_amount', $total_amount);

        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to bill_display.php with patient_id parameter
            header("Location: bill_display.php?patient_id=$patient_id");
            exit; // Make sure to exit after redirection
        } else {
            // Display error message if insertion fails
            echo "<script>alert('Failed to generate bill');</script>";
        }
    } catch (PDOException $e) {
        // Display user-friendly error message
        echo "<script>alert('Failed to generate bill. Please try again later.');</script>";
        // Log the detailed error for debugging
        error_log("Error: " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Bill</title>
    <style>
        /* Add your CSS styles here */
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="email"],
        input[type="tel"],
        textarea,
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: calc(100% - 20px);
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

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Generate Bill</h2>
        <form action="" method="POST">
            <!-- Patient Information -->
            <label for="patient_id">Patient ID:</label>
            <input type="text" id="patient_id" name="patient_id" required><br>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select><br>

            <label for="blood_group">Blood Group:</label>
            <input type="text" id="blood_group" name="blood_group" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="mobile">Mobile:</label>
            <input type="tel" id="mobile" name="mobile" required><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" required></textarea><br>

            <label for="insurance">Insurance:</label>
            <input type="text" id="insurance" name="insurance" required><br>

            <!-- Treatment Details -->
            <h3>Treatment Details</h3>
            <label for="doctor_name">Doctor Name:</label>
            <input type="text" id="doctor_name" name="doctor_name" required><br>

            <label for="consultant_fees">Consultant Fees:</label>
            <input type="number" id="consultant_fees" name="consultant_fees" required><br>

            <label for="treatment_fees">Treatment Fees:</label>
            <input type="number" id="treatment_fees" name="treatment_fees" required><br>

            <label for="room_charge">Room Charge:</label>
            <input type="number" id="room_charge" name="room_charge" required><br>

            <!-- Payment Method -->
            <!-- Payment Method -->
            <h3>Payment Method</h3>
            <label for="payment_method">Payment Method:</label>
            <select id="payment_method" name="payment_method" required>
                <option value="Cash">Cash</option>
                <option value="NetBanking">Net Banking</option>
                <option value="Paytm">Paytm</option>
                <option value="Gpay">GPay</option>
            </select><br>

            <button type="submit">Generate Bill</button>
        </form>
    </div>
</body>
</html>

