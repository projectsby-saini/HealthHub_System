<?php
session_start();
include('connection.php');

// Check if the patient ID is provided
if (!isset($_GET['patient_id'])) {
    echo "Error: Patient ID is not provided";
    exit;
}

// Get the patient ID from the URL
$patient_id = $_GET['patient_id'];

try {
    // Prepare SQL statement to fetch the bill details
    $stmt = $db->prepare("SELECT * FROM bills WHERE patient_id = :patient_id");
    $stmt->bindParam(':patient_id', $patient_id);
    
    // Execute the statement
    $stmt->execute();

    // Fetch the bill details
    $bill = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if any bill details were found
    if (!$bill) {
        echo "No bill details found for patient ID: $patient_id";
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Bill</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file -->
    <style>
        /* Add additional CSS styles here */
        .bill-container {
            max-width: 800px;
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

        .bill-details {
            margin-bottom: 20px;
        }

        .bill-details label {
            font-weight: bold;
        }

        .bill-details p {
            margin: 5px 0;
        }

        .total-amount {
            text-align: right;
            font-weight: bold;
            font-size: 18px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="bill-container">
        <h2>Generated Bill</h2>
        <div class="bill-details">
            <h3>Patient Information</h3>
            <p><label>Patient ID: </label><?php echo $bill['patient_id']; ?></p>
            <p><label>Name: </label><?php echo $bill['name']; ?></p>
            <p><label>Date of Birth: </label><?php echo $bill['dob']; ?></p>
            <p><label>Gender: </label><?php echo $bill['gender']; ?></p>
            <p><label>Blood Group: </label><?php echo $bill['blood_group']; ?></p>
            <p><label>Email: </label><?php echo $bill['email']; ?></p>
            <p><label>Mobile: </label><?php echo $bill['mobile']; ?></p>
            <p><label>Address: </label><?php echo $bill['address']; ?></p>
            <p><label>Insurance: </label><?php echo $bill['insurance']; ?></p>
        </div>
        <div class="bill-details">
            <h3>Treatment Details</h3>
            <p><label>Doctor Name: </label><?php echo $bill['doctor_name']; ?></p>
            <p><label>Consultant Fees: </label><?php echo $bill['consultant_fees']; ?></p>
            <p><label>Treatment Fees: </label><?php echo $bill['treatment_fees']; ?></p>
            <p><label>Room Charge: </label><?php echo $bill['room_charge']; ?></p>
        </div>
        <div class="bill-details">
            <h3>Payment Details</h3>
            <p><label>Payment Method: </label><?php echo $bill['payment_method']; ?></p>
            <p class="total-amount">Total Amount: <?php echo $bill['total_amount']; ?></p>
        </div>
    </div>
</body>
</html>
