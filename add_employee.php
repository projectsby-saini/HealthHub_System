<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .form-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .form-container input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button {
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

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Employee</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <table></table>
            <tr>
                <td><label for="name">Name:</label></td>
            <td><input type="text" id="name" name="name" placeholder="Name" required></td>
            <tr>
                <td><label for="designation">Designation:</label></td>
            <td><select id="designation" name="designation" required>
                <option value="" selected disabled>Select Designation</option>
                <option value="Doctor">Doctor</option>
                <option value="Surgeon">Surgeon</option>
                <option value="Physician">Physician</option>
                <option value="Pharmacist">Pharmacist</option>
                <option value="Lab Technician">Lab Technician</option>
                <option value="Medical Assistant">Medical Assistant</option>
                <!-- Add more designations here -->
            </select></td>
            
            <tr>
                <td><label for="contact">Contact:</label></td>
            <td><input type="text" id="contact" name="contact" placeholder="Contact" required></td>
            
            <tr>
                <td><label for="email">Email:</label></td>
            <td><input type="email" id="email" name="email" placeholder="Email" required></td>
            
            <tr>
                <td><label for="address">Address:</label></td>
            <td><textarea id="address" name="address" placeholder="Address" required></textarea></td>
            
            <tr>
                <td><label for="dob">Date of Birth:</label></td>
            <td><input type="date" id="dob" name="dob" required></td>
            
            <tr>
                <td><label for="gender">Gender:</label></td>
            <td><select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select></td>
            
            <tr>
                <td><button type="submit">Add Employee</button></td>
                
            </table>
        </form>
    </div>

    <?php
    // Include database connection
    include('connection.php');

    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get form data
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];

        try {
            // Prepare SQL statement
            $stmt = $db->prepare("INSERT INTO employees (name, designation, contact, email, address, dob, gender) VALUES (:name, :designation, :contact, :email, :address, :dob, :gender)");

            // Bind parameters
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':designation', $designation);
            $stmt->bindParam(':contact', $contact);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':gender', $gender);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<script>alert('Employee added successfully');</script>";
            } else {
                echo "<script>alert('Failed to add employee');</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    ?>
</body>
</html>
