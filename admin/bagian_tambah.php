<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_admin']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  exit();
  }
  include ('../head.php');
?>

  <?php
                   
      include("koneksi.php");
      if (isset($_POST["tambahdata"])){
      $x=$_POST['kode_bidang'];
      $a=$_POST['nama'];

      $cek2 = mysqli_query($con, "SELECT * FROM bidang WHERE kode_bidang='$x' ");
      $ceklagi2 =mysqli_num_rows($cek2);

      
          if($ceklagi2<1){
             $tambah=mysqli_query($con, "INSERT INTO bidang(kode_bidang,nama) VALUES ('$x','$a')");
             header("location:bagian.php");
             exit();
             }else
              header("location: bagian_tambah.php?bagian_tambah=gagal");
             }
           

   
    ?>


<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_admin.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Daftar Bidang</div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:70px;"></td>
<h3>Tambah Bidang Baru</h3><br>
<form action="bagian_tambah.php"  method="post">
<td>
  <!-- <input type="hidden" name="id" class="form-control" style="width:300px;"> -->
    
    <div class="form-group">
      <label >Kode Bidang:</label>
      <input type="text" name="kode_bidang" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama Bidang:</label>
      <input type="text" name="nama" class="form-control" style="width:300px;">
    </div> 
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>
  </td>
    <?php
    if (isset($_GET["bagian_tambah"])){
              if ($_GET["bagian_tambah"] == 'gagal'){
                echo "<p id='gagal'>Penambahan Gagal,Kode sudah digunakan</p>";
              }
            }


  ?>

  </form>
  </table>    
      </div>
        </div>
        <div class="card-footer small text-muted">Dinas Komunikasi dan Informatika Provinsi Jawa Barat</div>
      </div>
    </div>
    <!-- /.container-fluid-->
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
    <?php include('footer_table.php');?>
  </div>
</body>

</html>

