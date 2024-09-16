<?php
// Include the connection file
include('connection.php');

// Initialize variables
$searchTerm = '';
$doctors = [];

// Check if the form is submitted
if (isset($_POST['search'])) {
    $searchTerm = $_POST['search_term'];

    try {
        // Database connection
        $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare SQL statement
        $query = $db->prepare("SELECT name, department, consultant_fee FROM experts WHERE name LIKE :searchTerm OR department LIKE :searchTerm");
        $query->bindValue(':searchTerm', '%' . $searchTerm . '%');
        $query->execute();
        $doctors = $query->fetchAll(PDO::FETCH_ASSOC);
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
    <title>Search Doctors</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .navbar {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: <?php echo $showNavbar ? 'block' : 'none'; ?>;
        }

        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .navbar li {
            margin-bottom: 10px;
        }

        .navbar li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }

        .navbar li a:hover {
            color: #0056b3;
        }

        .search-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .search-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .search-container form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-container input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .search-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }

        .results-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .results-table th, .results-table td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        .results-table th {
            background-color: #007bff;
            color: #fff;
        }

        .results-table tr:nth-child(even) {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
<div class="navbar">
<ul>
        <li><a href="patient_profile.php?id=<?php echo $id; ?>">Profile</a></li>
        <li><a href="appointment.php">Book Appointment</a></li>
        <li><a href="appointment_success.php">Appointment Status</a></li>
        <li><a href="update_patient.php?id=<?php echo $id; ?>">Update Details</a></li>
        <li><a href="search_doctor.php">View Doctor</a></li>
        <li><a href="appointment_history.php?id=<?php echo $id; ?>">Receipt of Payment</a></li>
        <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div class="search-container">
        <h2>VIEW DOCTORS</h2>
        <form action="" method="POST">
            <input type="text" name="search_term" placeholder="Enter doctor name or department" value="<?php echo htmlspecialchars($searchTerm); ?>" required>
            <button type="submit" name="search">Search</button>
        </form>

        <?php if (!empty($doctors)): ?>
        <table class="results-table">
            <thead>
                <tr>
                    <th>Name of the Doctor</th>
                    <th>Department</th>
                    <th>Consultant Fee</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($doctors as $doctor): ?>
                <tr>
                    <td><?php echo htmlspecialchars($doctor['name']); ?></td>
                    <td><?php echo htmlspecialchars($doctor['department']); ?></td>
                    <td><?php echo htmlspecialchars($doctor['consultant_fee']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php elseif ($searchTerm): ?>
        <p>No results found for "<?php echo htmlspecialchars($searchTerm); ?>"</p>
        <?php endif; ?>
    </div>
</body>
</html>
