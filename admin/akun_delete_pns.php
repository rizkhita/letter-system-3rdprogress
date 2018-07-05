<?php 
include 'koneksi.php';
$id_pns= $_GET['id_pns'];
mysqli_query($con,"DELETE FROM login_pns WHERE id_pns='$id_pns'")or die(mysqli_error());
 
header("location:akun_pns.php?pesan=hapus");
exit();
?>