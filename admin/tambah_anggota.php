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
       $a=$_POST['NIP'];


      $cek = mysqli_query($con, "SELECT * FROM data_pns WHERE NIP='$a' ");
      $ceklagi=mysqli_num_rows($cek);

      $cek2 = mysqli_query($con, "SELECT * FROM anggota_bidang WHERE NIP='$a' ");
      $ceklagi2 =mysqli_num_rows($cek2);

       if($ceklagi<1){
        header("location: tambah_anggota.php?tambah_anggota=gagal");
          }else {

          if($ceklagi2<1){
            $tambah=mysqli_query($con, "INSERT INTO anggota_bidang(kode_bidang,NIP) VALUES ('$x','$a')");
             header("location:data_anggota.php");
             exit();
             }else{
              header("location: tambah_anggota.php?tambah_anggota=gagal2");
          }
        }

}


      // include("koneksi.php");
      // if (isset($_POST["tambahdata"])){
      // $x=$_POST['kode_bidang'];
      // $a=$_POST['NIP'];

      // $cek2 = mysqli_query($con, "SELECT * FROM anggota_bidang WHERE NIP='$a' ");
      // $ceklagi2 =mysqli_num_rows($cek2);
      // $cek2 = mysqli_query($con, "SELECT * FROM anggota_bidang WHERE NIP='$a' ");
      // $ceklagi2 =mysqli_num_rows($cek2);

      
      //     if($ceklagi2<1){
      //        $tambah=mysqli_query($con, "INSERT INTO anggota_bidang(kode_bidang,NIP) VALUES ('$x','$a')");
      //        header("location:data_anggota.php");
      //        }else
      //         header("location: tambah_anggota.php?tambah_anggota=gagal");
      //        }
  
   
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
          <i class="fa fa-table"></i> Daftar Anggota Bidang</div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:70px;"></td>
<h3>Tambah Anggota Baru</h3><br>
<form action="tambah_anggota.php"  method="post">
<td>
  <!-- <input type="hidden" name="id" class="form-control" style="width:300px;"> -->
    
    <div class="form-group">
      <label >Kode Bidang:</label>
      <select type="text" name="kode_bidang" class="form-control" placeholder="pilih" style="width:300px;">
       
        <?php 
        include 'koneksi.php';
        $ambil=mysqli_query($con,'SELECT kode_bidang,nama from bidang');
        while($kobid=mysqli_fetch_array($ambil)){?>
         <option value="<?php echo $kobid['kode_bidang'];?>" selected="selected"><h1><?php echo $kobid['nama'];?></h1></option>
      <?php }
      ?>
      </select>
    </div>
    <div class="form-group">
      <label >NIP:</label>
      <input type="text" name="NIP" class="form-control" style="width:300px;">
    </div> 
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>
  </td>
<!--     <?php
    if (isset($_GET["tambah_anggota"])){
              if ($_GET["tambah_anggota"] == 'gagal'){
                echo "<p id='gagal'>Penambahan Gagal,NIP sudah ada</p>";
              }
            }


  ?> -->

  <?php

          if (isset($_GET["tambah_anggota"])){
              if ($_GET["tambah_anggota"] == 'gagal'){
                echo "<p id='gagal'>NIP salah</p>";
              }
            }
          if (isset($_GET["tambah_anggota"])){
              if ($_GET["tambah_anggota"] == 'gagal2'){
                echo "<p id='gagal'>Gagal,NIP sudah terdaftar di keanggotaan </p>";
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
