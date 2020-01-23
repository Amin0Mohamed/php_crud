<?php
include 'db.php';
$conn = new DB();
session_start();

if(isset($_GET['id']))
{
    $success = $conn->delete($_GET['id']);
    $_SESSION['success']=$success;
    header('Location: home.php');
}
?>

