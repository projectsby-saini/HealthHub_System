<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical History</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Medical History</h2>
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root"; // Replace with your MySQL username
        $password = ""; // Replace with your MySQL password
        $dbname = "hospital";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to fetch medical history from the database
        $sql = "SELECT * FROM medical_history";
        $result = $conn->query($sql);

        if ($result === false) {
            // Query execution failed, handle the error
            echo "Error executing query: " . $conn->error;
        } elseif ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>Date</th><th>Doctor</th><th>Diagnosis</th><th>Treatment</th></tr>";
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["date"] . "</td><td>" . $row["doctor"] . "</td><td>" . $row["diagnosis"] . "</td><td>" . $row["treatment"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No medical history found.";
        }
        $conn->close();
        ?>
    </div>
</body>

</html>
