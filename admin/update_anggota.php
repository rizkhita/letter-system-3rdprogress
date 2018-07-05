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
      $b=$_POST['NIP'];

      $cek2 = mysqli_query($con, "SELECT * FROM data_pns WHERE NIP='$b' ");
      $ceklagi2 =mysqli_num_rows($cek2);
      
        
      if($ceklagi2>0){
        $edit=mysqli_query($con, "UPDATE anggota_bidang SET kode_bidang='$x', NIP='$b' where id='$id'");
          header("location:data_anggota.php");
          exit();
             }else
           header("location: update_anggota.php?update_anggota=gagal");
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
          <i class="fa fa-table"></i>Data Anggota Bidang </div>
        <div class="card-body">
          </div>
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di admin-area(admin).php
          $id = $_GET['id'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM anggota_bidang WHERE id = '$id'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Data Anggota Kepegawaian</h3><br>
<form action="update_anggota.php?id=<?php echo $id; ?>" name="updatedata" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id']; ?>" type="hidden" name="id" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Kode Bidang :</label>
      <select name="kode_bidang" style="width:300px;" class="form-control">
       <?php 
        include 'koneksi.php';
        $ambil=mysqli_query($con,'SELECT kode_bidang,nama from bidang');
        while($kobid=mysqli_fetch_array($ambil)){?> 
        <option value="<?php echo $kobid['kode_bidang'];?>" <?php if($data['kode_bidang'] == $kobid['kode_bidang']){ echo 'selected'; } ?>><?php echo $kobid['nama'];?></option>
        <?php } ?>
      </select>
    </div>
    <label >NIP :</label>
      <input value="<?php echo $data['NIP']; ?>" type="text" name="NIP" class="form-control" style="width:300px;height;">
    </div>
    <br>
      <?php

  }

  ?>

    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">SUBMIT</button>
  </td>

  </form>
      <?php
    if (isset($_GET["update_anggota"])){
              if ($_GET["update_anggota"] == 'gagal'){
                echo "<p id='gagal'>Update Gagal,NIP tidak terdaftar</p>";
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
