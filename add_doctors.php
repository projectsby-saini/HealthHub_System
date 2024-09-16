<?php
session_start();
include('connection.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $department = $_POST['department'];
    $experience = $_POST['experience'];
    $languages_spoken = $_POST['languages_spoken'];
    $contact_details = $_POST['contact_details'];
    $mobile_no = $_POST['mobile_no'];
    $email = $_POST['email'];
    $schedule = $_POST['schedule'];
    $consultant_fee = $_POST['consultant_fee'];

    try {
        // Prepare SQL statement
        $stmt = $db->prepare("INSERT INTO experts (name, age, gender, department, experience, languages_spoken, contact_details, mobile_no, email, schedule, consultant_fee) VALUES (:name, :age, :gender, :department, :experience, :languages_spoken, :contact_details, :mobile_no, :email, :schedule, :consultant_fee)");

        // Bind parameters
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':age', $age);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':experience', $experience);
        $stmt->bindParam(':languages_spoken', $languages_spoken);
        $stmt->bindParam(':contact_details', $contact_details);
        $stmt->bindParam(':mobile_no', $mobile_no);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':schedule', $schedule);
        $stmt->bindParam(':consultant_fee', $consultant_fee);

        // Execute the statement
        if ($stmt->execute()) {
            echo "<script>alert('Doctor added successfully');</script>";
        } else {
            echo "<script>alert('Failed to add doctor');</script>";
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
    <title>Add Doctor</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #72edf2 10%, #5151e5 100%);
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-container input,
        .form-container textarea,
        .form-container select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus,
        .form-container textarea:focus,
        .form-container select:focus {
            border-color: #007bff;
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
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        .form-container textarea {
            resize: none;
            height: 100px;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Add Doctor</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" name="name" placeholder="Name" required></td>
                </tr>
                <tr>
                    <td><label for="age">Age:</label></td>
                    <td><input type="number" id="age" name="age" placeholder="Age" required></td>
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
                    <td><label for="department">Department:</label></td>
                    <td><input type="text" id="department" name="department" placeholder="Department" required></td>
                </tr>
                <tr>
                    <td><label for="experience">Experience:</label></td>
                    <td><input type="number" id="experience" name="experience" placeholder="Experience (years)" required></td>
                </tr>
                <tr>
                    <td><label for="languages_spoken">Languages Spoken:</label></td>
                    <td><input type="text" id="languages_spoken" name="languages_spoken" placeholder="Languages Spoken" required></td>
                </tr>
                <tr>
                    <td><label for="contact_details">Contact Details:</label></td>
                    <td><textarea id="contact_details" name="contact_details" placeholder="Contact Details" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="mobile_no">Mobile No:</label></td>
                    <td><input type="tel" id="mobile_no" name="mobile_no" placeholder="Mobile No" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" placeholder="Email" required></td>
                </tr>
                <tr>
                    <td><label for="schedule">Schedule:</label></td>
                    <td><textarea id="schedule" name="schedule" placeholder="Schedule" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="consultant_fee">Consultant Fee:</label></td>
                    <td><input type="number" id="consultant_fee" name="consultant_fee" placeholder="Consultant Fee" required></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Add Doctor</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
