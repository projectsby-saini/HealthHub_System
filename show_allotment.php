<?php
session_start();
include('connection.php'); // Include your database connection file

// Fetch room allotment information from the database
try {
    $query = $db->query("SELECT * FROM room_allocation");
    $roomAllotments = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Allotment Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Room Allotment Information</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient ID</th>
                    <th>Room ID</th>
                    <th>Allocation Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($roomAllotments as $roomAllotment): ?>
                <tr>
                    <td><?php echo $roomAllotment['id']; ?></td>
                    <td><?php echo $roomAllotment['patient_id']; ?></td>
                    <td><?php echo $roomAllotment['room_id']; ?></td>
                    <td><?php echo $roomAllotment['allocation_date']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
