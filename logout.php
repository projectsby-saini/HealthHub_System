<?php
// Start session
session_start();

// Destroy all session data
session_destroy();

// Redirect to the login page
header("Location: patient_login.php");
exit;
?>
