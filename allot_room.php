<?php
session_start();
include('connection.php');

// Check if connection is successful
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch available rooms and patients
$rooms = [];
$patients = [];
try {
    // Fetch available rooms
    $stmt = $db->prepare("SELECT * FROM rooms WHERE status = 'Available'");
    $stmt->execute();
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch patients
    $stmt = $db->prepare("SELECT * FROM patients");
    $stmt->execute();
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $patient_id = $_POST['patient_id'];
    $room_id = $_POST['room_id'];
    $allocation_date = $_POST['allocation_date'];

    try {
        // Allocate room
        $stmt = $db->prepare("INSERT INTO room_allocation (patient_id, room_id, allocation_date) VALUES (:patient_id, :room_id, :allocation_date)");
        $stmt->bindValue(':patient_id', $patient_id);
        $stmt->bindValue(':room_id', $room_id);
        $stmt->bindValue(':allocation_date', $allocation_date);

        if ($stmt->execute()) {
            // Update room status to 'Occupied'
            $stmt = $db->prepare("UPDATE rooms SET status = 'Occupied' WHERE id = :room_id");
            $stmt->bindValue(':room_id', $room_id);
            $stmt->execute();

            echo "<script>alert('Room allocated successfully');</script>";
        } else {
            echo "<script>alert('Failed to allocate room');</script>";
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
    <title>Allot Room</title>
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Room Allotment</h2>
        <form action="" method="POST">
            <label for="patient_id">Patient:</label>
            <select id="patient_id" name="patient_id" required>
                <?php foreach ($patients as $patient): ?>
                    <option value="<?php echo $patient['id']; ?>"><?php echo htmlspecialchars($patient['name']); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="room_id">Room:</label>
            <select id="room_id" name="room_id" required>
                <?php foreach ($rooms as $room): ?>
                    <option value="<?php echo $room['id']; ?>"><?php echo htmlspecialchars($room['room_number'] . " - " . $room['room_type']); ?></option>
                <?php endforeach; ?>
            </select>

            <label for="allocation_date">Allocation Date:</label>
            <input type="date" id="allocation_date" name="allocation_date" required>

            <button type="submit">Allot Room</button>
        </form>
    </div>
</body>
</html>
