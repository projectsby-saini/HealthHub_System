<?php
session_start();

include('connection.php');

try {
    // Prepare SQL statements to fetch the counts and sums
    $totalUsersQuery = $db->query("SELECT COUNT(*) AS total_users FROM patients");
    $totalDoctorsQuery = $db->query("SELECT COUNT(*) AS total_doctors FROM experts");
    $totalEmployeesQuery = $db->query("SELECT COUNT(*) AS total_employees FROM employees");
    $totalAppointmentsQuery = $db->query("SELECT COUNT(*) AS total_appointments FROM appointments");
    $totalBillsQuery = $db->query("SELECT COUNT(*) AS total_bills FROM bills");
    $totalAmountQuery = $db->query("SELECT SUM(total_amount) AS total_amount FROM bills");

    // Fetch the results
    $totalUsers = $totalUsersQuery->fetch(PDO::FETCH_ASSOC)['total_users'];
    $totalDoctors = $totalDoctorsQuery->fetch(PDO::FETCH_ASSOC)['total_doctors'];
    $totalEmployees = $totalEmployeesQuery->fetch(PDO::FETCH_ASSOC)['total_employees'];
    $totalAppointments = $totalAppointmentsQuery->fetch(PDO::FETCH_ASSOC)['total_appointments'];
    $totalBills = $totalBillsQuery->fetch(PDO::FETCH_ASSOC)['total_bills'];
    $totalAmount = $totalAmountQuery->fetch(PDO::FETCH_ASSOC)['total_amount'];
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
        }

        .admin-container {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-right: 20px; /* Add space for the navbar */
        }

        .admin-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-bottom: 20px;
        }

        .dashboard-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px; /* Reduced padding */
            width: calc(33.33% - 40px); /* Three cards in a row with margin */
            text-align: center;
        }

        .dashboard-card h3 {
            margin-bottom: 20px;
            color: #007bff;
        }

        .circle {
            background-color: #007bff;
            border-radius: 50%;
            color: #fff;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 80px; /* Reduced circle size */
            height: 80px; /* Reduced circle size */
            font-size: 18px; /* Reduced font size */
            font-weight: bold;
        }

        .nav-links {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none; /* Hide the navbar by default */
            flex-direction: column;
        }

        .nav-links a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            margin-bottom: 10px;
        }

        .nav-links a:hover {
            background-color: #0056b3;
        }

        .hamburger-icon {
            display: block;
            position: fixed;
            top: 20px;
            right: 20px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 9999;
        }

        .hamburger-icon span {
            display: block;
            width: 100%;
            height: 3px;
            background-color: #007bff;
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        .hamburger-icon.open span:nth-child(1) {
            transform: translateY(8px) rotate(45deg);
        }

        .hamburger-icon.open span:nth-child(2) {
            opacity: 0;
        }

        .hamburger-icon.open span:nth-child(3) {
            transform: translateY(-8px) rotate(-45deg);
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h2>Admin Dashboard</h2>
        <div class="dashboard-container">
            <div class="dashboard-card">
                <h3>Total Users</h3>
                <div class="circle"><?php echo $totalUsers; ?></div>
            </div>
            <div class="dashboard-card">
                <h3>Total Doctors</h3>
                <div class="circle"><?php echo $totalDoctors; ?></div>
            </div>
            <div class="dashboard-card">
                <h3>Total Employees</h3>
                <div class="circle"><?php echo $totalEmployees; ?></div>
            </div>
            <div class="dashboard-card">
                <h3>Total Appointments</h3>
                <div class="circle"><?php echo $totalAppointments; ?></div>
            </div>
            <div class="dashboard-card">
                <h3>Total Bills</h3>
                <div class="circle"><?php echo $totalBills; ?></div>
            </div>
            <div class="dashboard-card">
                <h3>Total Amount</h3>
                <div class="circle"><?php echo $totalAmount; ?></div>
            </div>
        </div>
    </div>
    <div class="hamburger-icon" onclick="toggleNavbar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="nav-links" id="navbar">
        <a href="add_doctors.php">Add Doctors</a>
        <a href="update_doctors.php">Update details of doctor</a>
        <a href="display_doctors.php">Show Doctors</a>
        <a href="book_appointment.php">Book Appointments</a>
        <a href="display_appoinments.php">Show Appoinments</a>
        <a href="add_employee.php">Add Employees</a>
        <a href="display_employee.php">Show Employees</a>
        <a href="display_rooms.php">Show Rooms</a>
        <a href="allot_room.php">Rooms Allotment</a>
        <a href="show_allotment.php">Show Rooms Allotment</a>
        <a href="add_pharmacy.php">Manage Inventory</a>
        <a href="display_medicine.php">Show Medicines</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="manage_billing.php">Manage Billing</a>
        <a href="display_bills.php">Bill Records</a>
    </div>
    <script>
        function toggleNavbar() {
            var navbar = document.getElementById("navbar");
            navbar.style.display = navbar.style.display === "none" ? "flex" : "none";
            var hamburgerIcon = document.querySelector(".hamburger-icon");
            hamburgerIcon.classList.toggle("open");
        }
    </script>
</body>
</html>

