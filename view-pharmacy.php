<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pharmacy</title>
    <link rel="stylesheet" href="styles.css"> 
    <style>
      body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
}

p {
    padding: 10px;
    border-bottom: 1px solid #ccc;
}

p:last-child {
    border-bottom: none;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>View Pharmacy</h1>
        <!-- PHP code to fetch and display pharmacy data from the database -->
        <?php
        // Include database connection file
        include('connection.php');
        // Fetch pharmacy data from the database
        $query = "SELECT * FROM pharmacy";
        $result = mysqli_query($conn, $query);
        // Display pharmacy data
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>" . $row['pharmacy_name'] . " - " . $row['location'] . "</p>";
            }
        } else {
            echo "No pharmacies found.";
        }
        ?>
    </div>
</body>
</html>
