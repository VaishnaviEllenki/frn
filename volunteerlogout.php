<?php
session_start();
session_destroy();
header("Location: volunteerlogin.html"); // Redirect to login page
exit();
?>
