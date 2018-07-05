<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_kadin']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<?php
include ('nav_kadin.php');
?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- kotak profil -->
      <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-table"></i> Profil</div>
        <div class="card-body">
           <ol class="breadcrumb">

    <?php
     include ('koneksi.php');
     $tes= $_SESSION['NIP'];
   
     $query=mysqli_query($con,"SELECT * from data_pns where NIP ='$tes' ");
     $data=mysqli_fetch_array($query);

     $query2=mysqli_query($con,"SELECT posisi from data_kadin where NIP ='$tes' ");
     $data2=mysqli_fetch_array($query2);



     ?>
     <div><h4>Profil Saya</h4></div>
     <table style='height:400px;'>
      <tr><td class='w-25'>NIP</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data['NIP']?></td></tr>
      <tr><td class='w-25'>Nama</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data['nama']?></td></tr>
      <tr><td class='w-25'>Jenis Kelamin</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data['jk']?></td></tr>
      <tr><td class='w-25'>Pangkat Golongan</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data['pangkat_golongan']?></td></tr>
      <tr><td class='w-25'>Jabatan Eselon</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data['jabatan_eselon']?></td></tr>
      <tr><td class='w-25'>Masa Kerja</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data['masa_kerja']?>&nbsp;tahun</td></tr>
      <tr><td class='w-25'>Sisa Cuti Tahunan</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data['jatah_tahunan']?>&nbsp;hari kerja</td></tr>
      <tr><td class='w-25'>Unit Kerja</td><td>:</td><td class='w-75'>&nbsp;<?php echo $data2['posisi']?>&nbsp;</td></tr>
     </table>
          </ol>
        </div>
        </div>
     </div>
    <!-- end -->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © 2018 Diskominfo Jabar | RHM</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>

</html>

