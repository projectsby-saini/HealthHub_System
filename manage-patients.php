<?php
include('connection.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Patients</title>
    <link rel="stylesheet" href="styles.css">
    <style>.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
}

table th {
    background-color: #f2f2f2;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #e9e9e9;
}

a {
    text-decoration: none;
    color: #333;
}

a:hover {
    text-decoration: underline;
}
</style>
</head>
<body>
<div class="container">
    <h2>Manage Patients</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>John Doe</td>
                <td>35</td>
                <td>Male</td>
                <td>
                    <a href="edit-patient.php?id=1">Edit</a> | 
                    <a href="delete-patient.php?id=1">Delete</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Jane Smith</td>
                <td>28</td>
                <td>Female</td>
                <td>
                    <a href="edit-patient.php?id=2">Edit</a> | 
                    <a href="delete-patient.php?id=2">Delete</a>
                </td>
            </tr>
            <!-- Add more rows for other patients -->
        </tbody>
    </table>
</div>

</body>
</html>
