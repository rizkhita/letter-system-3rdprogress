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
      $x=$_POST['NIP'];
      $b=$_POST['posisi'];

      $cek2 = mysqli_query($con, "SELECT * FROM data_pns WHERE NIP='$x' ");
      $ceklagi2 =mysqli_num_rows($cek2);

    
          if($ceklagi2>0){
          $edit=mysqli_query($con, "UPDATE data_kadin SET NIP='$x' where id='$id'");
            header("location:data_kadin.php");
            exit();
             }else
              header("location: update_kadin.php?update_kadin=gagal");
          }
                   

      

      // if($edit){ 
      //   header("location:data_kadin.php");
      //         // echo "<script> window.location = 'data_kadin.php'; </script>";
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
          <i class="fa fa-table"></i> Data Kepala Dinas </div>
        <div class="card-body">
          </div>
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di kadin-area(kadin).php
          $id = $_GET['id'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM data_kadin WHERE id = '$id'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Data Kepala Dinas</h3><br>
<form action="update_kadin.php?id=<?php echo $id; ?>" name="updatedata" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id']; ?>" type="hidden" name="id" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NIP:</label>
      <input value="<?php echo $data['NIP']; ?>" type="text" name="NIP" class="form-control"  style="width:300px;">
    </div>
    <label >Posisi : <?php echo $data['posisi']; ?></label>
    </div>
    <br>
      <?php

  }

  ?>
    <?php
    if (isset($_GET["update_kadin"])){
              if ($_GET["update_kadin"] == 'gagal'){
                echo "<p id='gagal'>Update Gagal,NIP yang dimasukan salah</p>";
              }
            }


  ?>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">SUBMIT</button>
  </td>
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
