<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_kadin']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  exit();
  }
  include ('../head.php');
?>

<?php
      include("koneksi.php");
      if (isset($_POST["updatedataku"])){
      $id_kadin=$_GET['id_kadin'];
      $a=$_POST['password'];
      $b=$_POST['password2'];

      if($a==$b){
      $edited=mysqli_query($con, "UPDATE login_kadin SET password='$a' where id_kadin='$id_kadin'");
      header("location: password_kadin.php?password_kadin=done");
      }else{
       header("location: password_kadin.php?password_kadin=gagal"); 
      }

    }
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include ('nav_kadin.php'); ?>
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
$id_kadin=$_SESSION['id_kadin'];
 
?>


<table>
<td style="width:70px;"></td>
<h3>Edit Password Saya</h3><br>
<form action="password_kadin.php?id_kadin=<?php echo $id_kadin; ?>" name="updatedataku" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $id_kadin;?>" type="hidden" name="id_kadin" class="form-control"  style="width:300px;">
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
          if (isset($_GET["password_kadin"])){
              if ($_GET["password_kadin"] == 'done'){
                echo "<p id='done'>Password berhasil diganti</p>";
              }
            }
          if (isset($_GET["password_kadin"])){
              if ($_GET["password_kadin"] == 'gagal'){
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