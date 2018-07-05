<?php 
include 'koneksi.php';
$id_kadin= $_GET['id_kadin'];
mysqli_query($con,"DELETE FROM login_kadin WHERE id_kadin='$id_kadin'")or die(mysqli_error());
 
header("location:akun_kadin.php?pesan=hapus");
exit();
?>