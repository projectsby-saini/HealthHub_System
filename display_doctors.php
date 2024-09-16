<?php
session_start();

include('connection.php');

try {
    // Prepare SQL statement to fetch doctor details
    $query = $db->query("SELECT * FROM experts");
    $doctors = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors Details</title>
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
        <h2>Doctors Details</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Department</th>
                        <th>Experience</th>
                        <th>Languages Spoken</th>
                        <th>Contact Details</th>
                        <th>Mobile No</th>
                        <th>Email</th>
                        <th>Schedule</th>
                        <th>Consultant Fee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($doctors as $doctor): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($doctor['id']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['name']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['age']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['gender']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['department']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['experience']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['languages_spoken']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['contact_details']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['mobile_no']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['email']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['schedule']); ?></td>
                        <td><?php echo htmlspecialchars($doctor['consultant_fee']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
