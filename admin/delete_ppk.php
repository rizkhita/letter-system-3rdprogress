<?php 
include 'koneksi.php';
$id= $_GET['id'];
mysqli_query($con,"DELETE FROM data_ppk WHERE id='$id'")or die(mysqli_error());
 
header("location:data_ppk.php?pesan=hapus");
?>