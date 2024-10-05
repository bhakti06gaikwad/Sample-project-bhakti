<?php
session_start();

// Destroy the session.
session_unset();
session_destroy();

// Redirect to login or homepage after logout.
header("Location: cooltheglobal.php"); // Change 'index.php' to your login or homepage
exit();
?>
