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
      if (isset($_POST["updatedata"])){
      $id=$_GET['id'];
      $x=$_POST['kode_bidang'];
      $b=$_POST['nama'];

      // $cek2 = mysqli_query($con, "SELECT * FROM bidang WHERE kode_bidang='$x' ");
      // $ceklagi2 =mysqli_num_rows($cek2);

       $edit=mysqli_query($con, "UPDATE bidang SET kode_bidang='$x', nama='$b' where id='$id'");
            
      if($edit){
          header("location:bagian.php");
          exit();
             }else
           header("location: bagian_update.php?bagian_update=gagal");
          }
        
                   

      

      // if($edit){ 
      //   header("location:data_ppk.php");
      //         // echo "<script> window.location = 'data_ppk.php'; </script>";
      // }
    
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
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di admin-area(admin).php
          $id = $_GET['id'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM bidang WHERE id = '$id'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Data Bidang</h3><br>
<form action="bagian_update.php?id=<?php echo $id; ?>" name="updatedata" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id']; ?>" type="hidden" name="id" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Kode Bidang:</label>
      <input value="<?php echo $data['kode_bidang']; ?>" type="text" name="kode_bidang" class="form-control"  style="width:300px;">
    </div>
    <label >Nama Bidang :</label>
      <input value="<?php echo $data['nama']; ?>" type="text" name="nama" class="form-control" style="width:300px;height;">
    </div>
    <br>
      <?php

  }

  ?>

  <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">SUBMIT</button>
  </td>

  </form>
      <?php
    if (isset($_GET["bagian_update"])){
              if ($_GET["bagian_update"] == 'gagal'){
                echo "<p id='gagal'>Update Gagal,Kode sudah digunakan</p>";
              }
            }


  ?> 
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

