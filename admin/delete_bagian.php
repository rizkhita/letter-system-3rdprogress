<?php 
include 'koneksi.php';
$id= $_GET['id'];
mysqli_query($con,"DELETE FROM bidang WHERE id='$id'")or die(mysqli_error());
 
header("location:bagian.php?pesan=hapus");
exit();
?>