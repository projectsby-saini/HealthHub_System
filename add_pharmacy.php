<?php
session_start();
include('connection.php'); // Include your database connection file

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $category = $_POST['category'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $expiry_date = $_POST['expiry_date'];

    // Insert data into the database
    try {
        $query = $db->prepare("INSERT INTO inventory (category, product_name, quantity, expiry_date) VALUES (:category, :product_name, :quantity, :expiry_date)");
        $query->bindParam(':category', $category);
        $query->bindParam(':product_name', $product_name);
        $query->bindParam(':quantity', $quantity);
        $query->bindParam(':expiry_date', $expiry_date);
        
        if ($query->execute()) {
            echo "<script>alert('Item added to inventory successfully');</script>";
        } else {
            echo "<script>alert('Failed to add item to inventory');</script>";
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
    <title>Inventory Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: calc(100% - 20px);
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

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Pharmaceuticals Inventory Management</h1>
        <form action="" method="POST">
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="Medicines">Medicines</option>
                <option value="Equipment">Equipment</option>
            </select>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
            <label for="expiry_date">Expiry Date:</label>
            <input type="date" id="expiry_date" name="expiry_date" required>
            <button type="submit">Add to Inventory</button>
        </form>
    </div>
</body>
</html>
