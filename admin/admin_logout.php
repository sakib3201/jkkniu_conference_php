<?php
ob_start();
session_start();
if (isset($_SESSION['admin_id'])) {
    session_unset();
    session_destroy();
}
header("location: ../index.php");
ob_end_flush();
