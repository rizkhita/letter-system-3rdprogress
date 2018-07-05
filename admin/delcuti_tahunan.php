<?php 
include 'koneksi.php';
$id_pengajuan= $_GET['id_pengajuan'];
mysqli_query($con,"DELETE FROM cuti_tahunan WHERE id_pengajuan='$id_pengajuan'")or die(mysqli_error());
 
header("location:cuti_tahunan.php?pesan=hapus");
exit();
?>