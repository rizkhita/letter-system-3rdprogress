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
      if (isset($_POST["updatedataku"])){
      $id_kadin=$_GET['id_kadin'];
      $x=$_POST['NIP'];
      $a=$_POST['password'];
      // $b=$_POST['level'];

      $edited=mysqli_query($con, "UPDATE login_kadin SET NIP='$x',password='$a' where id_kadin='$id_kadin'");

      if($edited){ 
        header("location:akun_kadin.php");
        exit();
              
      }else{
        echo "gagal";
      }
    }
    ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include ('nav_admin.php'); ?>

 
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>Akun Kepala Dinas</div>
        <div class="card-body">
          </div>
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di kadin-area(kadin).php
          $id_kadin = $_GET['id_kadin'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM login_kadin WHERE id_kadin = '$id_kadin'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Akun Kepala Dinas</h3><br>
<form action="akun_update_kadin.php?id_kadin=<?php echo $id_kadin; ?>" name="updatedataku" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id_kadin']; ?>" type="hidden" name="id_kadin" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NIP:</label>
      <input value="<?php echo $data['NIP']; ?>" type="text" name="NIP" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input value="<?php echo $data['password']; ?>" type="password" name="password" class="form-control"  style="width:300px;">
    </div> 
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['level']; ?>" type="hidden" name="level" class="form-control"  style="width:300px;">
    </div>
      <?php
  }
  ?>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedataku" class="btn btn-primary">SUBMIT</button>
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
