<?php
include('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            position: relative; /* Ensure the body is a positioned container for the absolute footer */
            min-height: 100vh; /* Set minimum height to cover the viewport */
            background-color: #f2f2f2; /* Change background color */
        }

        video {
            position: fixed;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            z-index: -1;
            transform: translateX(-50%) translateY(-50%);
        }

        #full {
            position: relative;
            z-index: 1;
        }

        #inner_full {
            /* Adjust other styles as needed for your layout */
            background-color: rgba(255, 255, 255, 0.9); /* Change background color and opacity */
            padding: 20px;
            min-height: calc(100vh - 60px); /* Adjust 60px according to your footer height */
            box-sizing: border-box; /* Ensure padding is included in the height calculation */
            border-radius: 10px; /* Add border radius */
            margin: 20px; /* Add margin for spacing */
        }

        ul li {
            width: 20%;
            height: 50px;
            line-height: 50px;
            margin-left: 133px;
            margin-top: 40px; /* Adjust top margin */
            background: rgb(25, 0, 252);
            color: white;
            float: left;
            border-radius: 10px;
            list-style: none;
            text-align: center;
        }

        ul li a {
            text-decoration: none;
            color: white;
        }

        #footer {
            background-color: #333;
            color: white;
            padding: 20px;
            margin-top: 20px; /* Change margin-top to add space between content and footer */
            padding-top: 20px;
            padding-bottom: 4px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            z-index: 1;
        }

        #header {
            background-color: #333; /* Set the background color to black */
            padding: 10px; /* Add padding for better visibility */
            text-align: center;
            width: 100%;
        }

        /* Add other styles as needed for your layout */
    </style>
</head>

<body>
    <!-- Add the video tag here -->
    <video autoplay muted loop>
        <source src="./video/homevideo1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div id="full">
        <div id="inner_full">
            <div id="header">
                <h2 align="center"><a href="patient-dashboard.php" style="text-decoration: none; color: white;">Hospital Management System</a></h2>
            </div>
            <div id="body">
                <br>
                <?php
                if(!isset($_SESSION['username'])) {
                    header("Location: patient_login.php"); // Redirect to patient login page if not logged in
                    exit;
                }
                ?>
                <h1 align="center" style="text-decoration: none; font-family: 'Neuton', serif; color: #333;">Welcome, Patient!</h1>
                <p align="center" style="text-decoration: none; font-family: 'Neuton', serif; color: #333;">Manage your healthcare information</p><br>
                <ul>
                    <li><a href="appointment.php">Book Appointment</a></li> <!-- Change links and text -->
                    <li><a href="medical-history.php">Medical History</a></li>
                    <li><a href="prescriptions.php">Prescriptions</a></li>
                </ul><br><br><br><br><br>

                <ul>
                    <li><a href="bills.php">View Bills</a></li>
                    <li><a href="lab-reports.php">Lab Reports</a></li>
                    <li><a href="profile.php">Edit Profile</a></li>
                </ul>
            </div>
            <br><br><br><br><br><br><br>
        </div>
    </div>
    <div id="footer">
        <h4 align="center">© Hospital Management System by Divyansh Saini. All Rights Reserved.</h4>
        <p align="center" ><a href="logout.php"><font color="white">Logout</font></a></p>
    </div>
</body>

</html>
