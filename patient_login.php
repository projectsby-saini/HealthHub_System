<?php
include('connection.php'); // Include the connection file
session_start(); // Start the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Your CSS styles */
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Patient Login</h2>
        <form action="" method="POST">
            <input type="text" name="un" placeholder="Username" required>
            <input type="password" name="ps" placeholder="Password" required>
            <button type="submit" name="sub">Login</button>
        </form>

        <?php
        if (isset($_POST['sub'])) {
            $un = $_POST['un'];
            $ps = $_POST['ps'];

            // Using prepared statements to prevent SQL injection
            $stmt = $db->prepare("SELECT * FROM patient WHERE uname = :uname AND pass = :pass");
            $stmt->bindParam(':uname', $un);
            $stmt->bindParam(':pass', $ps);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_OBJ);

            if ($user) {
                $_SESSION['un'] = $un;
                header("Location: register.php");
                exit(); // Make sure to exit after redirection
            } else {
                echo "<script>alert('Wrong User');</script>";
            }
        }
        ?>
    </div>
</body>

</html>
