<?php
include_once 'koneksi.php';
$id = $_GET['id'];
$sql = "DELETE FROM data_barang WHERE id = '{$id}'";
$result = mysqli_query($conn, $sql);
header('location: index.php');
?>