<?php
session_start();
include('connection.php');

// Initialize variables
$doctor = [
    'id' => '',
    'name' => '',
    'age' => '',
    'gender' => '',
    'department' => '',
    'experience' => '',
    'languages_spoken' => '',
    'contact_details' => '',
    'mobile_no' => '',
    'email' => '',
    'schedule' => '',
    'consultant_fee' => ''
];

// Fetch doctor details if the ID is provided
if (isset($_GET['id'])) {
    $doctor_id = $_GET['id'];
    try {
        $stmt = $conn->prepare("SELECT * FROM experts WHERE id = :id");
        $stmt->bindParam(':id', $doctor_id);
        $stmt->execute();
        $doctor = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Update doctor details when form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $doctor_id = $_POST['id'];
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
        $stmt = $conn->prepare("UPDATE experts SET name = :name, age = :age, gender = :gender, department = :department, experience = :experience, languages_spoken = :languages_spoken, contact_details = :contact_details, mobile_no = :mobile_no, email = :email, schedule = :schedule, consultant_fee = :consultant_fee WHERE id = :id");

        $stmt->bindParam(':id', $doctor_id);
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

        if ($stmt->execute()) {
            echo "<script>alert('Doctor details updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update doctor details');</script>";
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
    <title>Update Doctor</title>
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
        <h2>Update Doctor</h2>
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $doctor['id']; ?>">
            <table>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" name="name" value="<?php echo htmlspecialchars($doctor['name']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="age">Age:</label></td>
                    <td><input type="number" id="age" name="age" value="<?php echo htmlspecialchars($doctor['age']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <select id="gender" name="gender" required>
                            <option value="Male" <?php if ($doctor['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($doctor['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if ($doctor['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="department">Department:</label></td>
                    <td><input type="text" id="department" name="department" value="<?php echo htmlspecialchars($doctor['department']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="experience">Experience:</label></td>
                    <td><input type="number" id="experience" name="experience" value="<?php echo htmlspecialchars($doctor['experience']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="languages_spoken">Languages Spoken:</label></td>
                    <td><input type="text" id="languages_spoken" name="languages_spoken" value="<?php echo htmlspecialchars($doctor['languages_spoken']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="contact_details">Contact Details:</label></td>
                    <td><textarea id="contact_details" name="contact_details" required><?php echo htmlspecialchars($doctor['contact_details']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="mobile_no">Mobile No:</label></td>
                    <td><input type="tel" id="mobile_no" name="mobile_no" value="<?php echo htmlspecialchars($doctor['mobile_no']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" value="<?php echo htmlspecialchars($doctor['email']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="schedule">Schedule:</label></td>
                    <td><textarea id="schedule" name="schedule" required><?php echo htmlspecialchars($doctor['schedule']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="consultant_fee">Consultant Fee:</label></td>
                    <td><input type="number" id="consultant_fee" name="consultant_fee" value="<?php echo htmlspecialchars($doctor['consultant_fee']); ?>" required></td>
                </tr>
            </table>
            <button type="submit">Update Doctor</button>
        </form>
    </div>
</body>
</html>
