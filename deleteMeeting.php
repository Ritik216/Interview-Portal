<?php
include 'connection.php';
$id=$_GET['id'];
$delete = "DELETE FROM meeting WHERE id=$id";
$query = mysqli_query($conn,$delete);

header('location:home.php');
?>