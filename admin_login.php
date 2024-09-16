<?php
include('connection.php');
session_start(); // Start the session
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="login-container">
        <h2>Administrator Login</h2>
        <form action="admin_dashboard.php" method="POST">
            <input type="text" name="un" placeholder="Username" required>
            <input type="password" name="ps" placeholder="Password" required>
            <button type="submit" name="sub">Login</button>
        </form>

        <?php
                if (isset($_POST['sub'])) {
                    $un = $_POST['un'];
                    $ps = $_POST['ps'];
                    $q = $db->prepare("SELECT * FROM admin WHERE uname='$un' && pass='$ps'");
                    $q->execute();
                    $res = $q->fetchAll(PDO::FETCH_OBJ);
                    if ($res) {
                        $_SESSION['un'] = $un;
                        header("Location:admin_dashboard.php");
                    } else {
                        echo "<script>alert('Wrong User')</script>";
                    }
                }
                ?>
    </div>
</body>

</html>
