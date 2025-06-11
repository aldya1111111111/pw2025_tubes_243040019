<?php
session_start();
session_destroy();
header("Location: ../tubes/index.php"); 
exit();
?>
