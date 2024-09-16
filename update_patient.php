<?php
// Start session (if not already started)
session_start();

// Include the connection file
include('connection.php');

// Check if the patient ID is set in the URL
if (isset($_GET['id'])) {
    $patient_id = $_GET['id'];

    // Fetch the current details of the patient from the database
    try {
        $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $db->prepare("SELECT * FROM patients WHERE id = :id");
        $query->bindValue(':id', $patient_id);
        $query->execute();
        $patient = $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Check if the form is submitted
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $blood_group = $_POST['blood_group'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $insurance = $_POST['insurance'];

        try {
            $query = $db->prepare("UPDATE patients SET name = :name, dob = :dob, gender = :gender, blood_group = :blood_group, email = :email, mobile = :mobile, address = :address, insurance = :insurance WHERE id = :id");

            $query->bindValue(':name', $name);
            $query->bindValue(':dob', $dob);
            $query->bindValue(':gender', $gender);
            $query->bindValue(':blood_group', $blood_group);
            $query->bindValue(':email', $email);
            $query->bindValue(':mobile', $mobile);
            $query->bindValue(':address', $address);
            $query->bindValue(':insurance', $insurance);
            $query->bindValue(':id', $patient_id);

            if ($query->execute()) {
                echo "<script>alert('Patient details updated successfully.');</script>";
            } else {
                echo "<script>alert('Update Failed');</script>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
} else {
    echo "Patient ID not provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Patient Details</title>
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

        .update-container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .update-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .update-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .update-container input,
        .update-container select,
        .update-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .update-container button {
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

        .update-container button:hover {
            background-color: #0056b3;
        }

        .update-container select {
            appearance: none;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .update-container textarea {
            resize: none;
            height: 100px;
        }
    </style>
</head>
<body>
  
    <div class="update-container">
        <h2>Update Patient Details</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type="text" id="name" name="name" value="<?php echo htmlspecialchars($patient['name']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="dob">Date of Birth:</label></td>
                    <td><input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($patient['dob']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="gender">Gender:</label></td>
                    <td>
                        <select id="gender" name="gender" required>
                            <option value="Male" <?php if ($patient['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($patient['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if ($patient['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="blood_group">Blood Group:</label></td>
                    <td><input type="text" id="blood_group" name="blood_group" value="<?php echo htmlspecialchars($patient['blood_group']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" value="<?php echo htmlspecialchars($patient['email']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="mobile">Mobile No:</label></td>
                    <td><input type="tel" id="mobile" name="mobile" value="<?php echo htmlspecialchars($patient['mobile']); ?>" required></td>
                </tr>
                <tr>
                    <td><label for="address">Address:</label></td>
                    <td><textarea id="address" name="address" required><?php echo htmlspecialchars($patient['address']); ?></textarea></td>
                </tr>
                <tr>
                    <td><label for="insurance">Insurance Type:</label></td>
                    <td>
                        <select id="insurance" name="insurance" required>
                            <option value="Private" <?php if ($patient['insurance'] == 'Private') echo 'selected'; ?>>Private</option>
                            <option value="CGHS" <?php if ($patient['insurance'] == 'CGHS') echo 'selected'; ?>>CGHS</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit">Update</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
