<?php 
include 'koneksi.php';
$id_ppk= $_GET['id_ppk'];
mysqli_query($con,"DELETE FROM login_ppk WHERE id_ppk='$id_ppk'")or die(mysqli_error());
 
header("location:akun_ppk.php?pesan=hapus");
exit();
?>