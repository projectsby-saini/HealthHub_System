<?php
session_start();

include('connection.php');

try {
    // Prepare SQL statement to fetch appointments with patient details
    $query = $db->query("SELECT a.patient_id, a.department, a.doctor_name, a.date, a.time, p.name, p.dob, p.gender, p.blood_group, p.email, p.mobile, p.address, p.insurance
                         FROM appointments a
                         JOIN patients p ON a.patient_id = p.id");
    $appointments = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointments</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 90%;
            max-width: 1700px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .contact {
            display: flex;
            justify-content: space-between;
        }

        .contact div {
            margin-right: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Appointments</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Patient Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Blood Group</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Insurance</th>
                        <th>Department</th>
                        <th>Doctor Name</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($appointment['patient_id']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['name']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['dob']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['gender']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['blood_group']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['email']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['mobile']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['address']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['insurance']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['department']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['doctor_name']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['date']); ?></td>
                        <td><?php echo htmlspecialchars($appointment['time']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
