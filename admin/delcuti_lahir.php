<?php 
include 'koneksi.php';
$id= $_GET['id_pengajuan'];
mysqli_query($con,"DELETE FROM cuti_lahir WHERE id_pengajuan='$id'")or die(mysqli_error());
 
header("location:cuti_lahir.php?pesan=hapus");
exit();
?>
