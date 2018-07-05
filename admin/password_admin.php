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
      $id_admin=$_GET['id_admin'];
      $a=$_POST['password'];
      $b=$_POST['password2'];

      if($a==$b){
      $edited=mysqli_query($con, "UPDATE login_admin SET password='$a' where id_admin='$id_admin'");
      header("location: password_admin.php?password_admin=done");
      }else{
       header("location: password_admin.php?password_admin=gagal"); 
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
          <i class="fa fa-table"></i>Password Saya</div>
        <div class="card-body">
          </div>
 <?php
         
include ("koneksi.php");
$id_admin=$_SESSION['id_admin'];
 
?>


<table>
<td style="width:70px;"></td>
<h3>Edit Password Saya</h3><br>
<form action="password_admin.php?id_admin=<?php echo $id_admin; ?>" name="updatedataku" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $id_admin;?>" type="hidden" name="id_admin" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Password Baru:</label>
      <input type="password" name="password" class="form-control"  style="width:300px;">
    </div> 
    <div class="form-group">
      <label >Konfirmasi Password Baru:</label>
      <input type="password" name="password2" class="form-control"  style="width:300px;">
    </div> 

    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedataku" class="btn btn-primary">SUBMIT</button>
  </td>
  <?php
          if (isset($_GET["password_admin"])){
              if ($_GET["password_admin"] == 'done'){
                echo "<p id='done'>Password berhasil diganti</p>";
              }
            }
          if (isset($_GET["password_admin"])){
              if ($_GET["password_admin"] == 'gagal'){
                echo "<p id='gagal'>Konfirmasi password gagal (tidak sesuai)</p>";
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

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <?php include('footer_table.php');?>
  </div>
</body>
    <!-- end -->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © 2018 Diskominfo Jabar</small>
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