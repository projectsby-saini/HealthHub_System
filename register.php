<?php
// Start session (if not already started)
session_start();

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Include the connection file
    include('connection.php');

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
        $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Prepare SQL statement
        $query = $db->prepare("INSERT INTO patients (name, dob, gender, blood_group, email, mobile, address, insurance) VALUES (:name, :dob, :gender, :blood_group, :email, :mobile, :address, :insurance)");

        // Bind parameters
        $query->bindValue(':name', $name);
        $query->bindValue(':dob', $dob);
        $query->bindValue(':gender', $gender);
        $query->bindValue(':blood_group', $blood_group);
        $query->bindValue(':email', $email);
        $query->bindValue(':mobile', $mobile);
        $query->bindValue(':address', $address);
        $query->bindValue(':insurance', $insurance);

        // Execute the statement
        if ($query->execute()) {
            // Get the last inserted ID
            $last_id = $db->lastInsertId();
            // Set the patient ID in the session
            $_SESSION['patient_id'] = $last_id;
            // Redirect to patient_profile.php with the patient ID
            header("Location: patient_profile.php?id=" . $last_id);
            exit; // Ensure that script execution stops after redirection
        } else {
            echo "<script>alert('Registration Failed')</script>";
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
    <title>Patient Registration</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .registration-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .registration-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .registration-container input,
        .registration-container textarea {
            width: 150%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .registration-container select {
            width: 160%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .registration-container button {
            width: 130%;
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

        .registration-container button:hover {
            background-color: #0056b3;
        }

        /* Additional styling for select dropdown */
        .registration-container select {
            appearance: none;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        /* Additional styling for textarea */
        .registration-container textarea {
            resize: none;
            height: 100px;
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <h2>PATIENT REGISTRATION FORM</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" name="name" placeholder="Name" required></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth:</label></td>
                    <td><input type="date" id="dob" name="dob" required></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <select id="gender" name="gender" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="blood_group">Blood Group:</label></td>
                    <td><input type="text" id="blood_group" name="blood_group" placeholder="Blood Group" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td><label for="mobile">Mobile No:</label></td>
                    <td><input type="tel" id="mobile" name="mobile" placeholder="Mobile No" required></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><textarea id="address" name="address" placeholder="Address" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="insurance">Insurance Type:</label></td>
                    <td>
                        <select id="insurance" name="insurance" required>
                            <option value="Private">Private</option>
                            <option value="CGHS">CGHS</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit">Submit</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
