<?php
// Clear
session_start();
// Unset
$_SESSION = array();

// Destroy
session_destroy();

// Redirect to home page
header('Location: index.php');
exit();
?>