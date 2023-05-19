<?php
session_start();

// session set or not

if (!isset($_SESSION['id'])) { 
    header("Location:form.php");
    exit();
}
?>