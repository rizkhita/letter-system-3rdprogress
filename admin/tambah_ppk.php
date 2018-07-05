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
      $x=$_POST['NIP'];
      $a=$_POST['kode_bidang'];

 
      $cek = mysqli_query($con, "SELECT * FROM data_ppk WHERE NIP='$x' ");
      $ceklagi=mysqli_num_rows($cek);

      $cek2 = mysqli_query($con, "SELECT * FROM data_pns WHERE NIP='$x' ");
      $ceklagi2 =mysqli_num_rows($cek2);

       if($ceklagi2<1){
        header("location: tambah_ppk.php?tambah_ppk=gagal2");
        }else {

          if($ceklagi<1){
             $tambah=mysqli_query($con, "INSERT INTO data_ppk (NIP,kode_bidang) VALUES ('$x','$a')");
             header("location:data_ppk.php");
             exit();
             }else
              header("location: tambah_ppk.php?tambah_ppk=gagal");
             }
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
          <i class="fa fa-table"></i> Data Kepala Bidang</div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:70px;"></td>
<h3>Tambah Data Kepala Bidang </h3><br>
<form action="tambah_ppk.php"  method="post">
<td>
  <!-- <input type="hidden" name="id" class="form-control" style="width:300px;"> -->
    
    <div class="form-group">
      <label >NIP:</label>
      <input req type="text" name="NIP" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Kode bagian:</label>
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
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>
  </td>
 <?php
          if (isset($_GET["tambah_ppk"])){
              if ($_GET["tambah_ppk"] == 'gagal'){
                echo "<p id='gagal'>Kabid sudah ada</p>";
              }
            }
          if (isset($_GET["tambah_ppk"])){
              if ($_GET["tambah_ppk"] == 'gagal2'){
                echo "<p id='gagal'>NIP tidak valid </p>";
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