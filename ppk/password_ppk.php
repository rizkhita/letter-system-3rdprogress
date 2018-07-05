<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_ppk']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  exit();
  }
  include ('../head.php');
?>

<?php
      include("koneksi.php");
      if (isset($_POST["updatedataku"])){
      $id_ppk=$_GET['id_ppk'];
      $a=$_POST['password'];
      $b=$_POST['password2'];

      if($a==$b){
      $edited=mysqli_query($con, "UPDATE login_ppk SET password='$a' where id_ppk='$id_ppk'");
      header("location: password_ppk.php?password_ppk=done");
      }else{
       header("location: password_ppk.php?password_ppk=gagal"); 
      }

    }
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include ('nav_ppk.php'); ?>
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
$id_ppk=$_SESSION['id_ppk'];
 
?>


<table>
<td style="width:70px;"></td>
<h3>Edit Password Saya</h3><br>
<form action="password_ppk.php?id_ppk=<?php echo $id_ppk; ?>" name="updatedataku" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $id_ppk;?>" type="hidden" name="id_ppk" class="form-control"  style="width:300px;">
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
          if (isset($_GET["password_ppk"])){
              if ($_GET["password_ppk"] == 'done'){
                echo "<p id='done'>Password berhasil diganti</p>";
              }
            }
          if (isset($_GET["password_ppk"])){
              if ($_GET["password_ppk"] == 'gagal'){
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
    <?php include('footer_table.php');?>
  </div>
</body>

</html>