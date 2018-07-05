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
      $a=$_POST['password'];
      $b=$_POST['level'];


      $cek = mysqli_query($con, "SELECT * FROM login_kadin WHERE NIP='$x' ");
      $ceklagi=mysqli_num_rows($cek);

      $cek2 = mysqli_query($con, "SELECT * FROM data_kadin WHERE NIP='$x' ");
      $ceklagi2 =mysqli_num_rows($cek2);

      $cek2 = mysqli_query($con, "SELECT * FROM login_pns WHERE NIP='$x' ");
      $ceklagi2 =mysqli_num_rows($cek2);

       if($ceklagi2=0){
       header("location: akun_tambah_kadin.php?akun_tambah_kadin=gagal2");
       }else {

          if($ceklagi<1){
          $tambah=mysqli_query($con, "INSERT INTO login_kadin (NIP,password,level) VALUES ('$x','$a','$b')");
            header("location:akun_kadin.php");
            exit();
             }else
              header("location: akun_tambah_kadin.php?akun_tambah_kadin=gagal");
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
          <i class="fa fa-table"></i>Akun Kepala Dinas </div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:70px;"></td>
<h3>Buat Akun Kepala Dinas</h3><br>
<form action="akun_tambah_kadin.php"  method="post">
<td>
    <div class="form-group">
      <label >NIP:</label>
      <input type="text" name="NIP" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input type="text" name="password" class="form-control" style="width:300px;">
    </div> 
    <div class="form-group">
       <input type="hidden" name="level" value="kadin" class="form-control" style="width:300px;">
      <label >Level Log in = Kepala Dinas</label>
    </div>
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>

  </td>
  <?php
          if (isset($_GET["akun_tambah_kadin"])){
              if ($_GET["akun_tambah_kadin"] == 'gagal'){
                echo "<p id='gagal'>Akun sudah ada</p>";
              }
            }
          if (isset($_GET["akun_tambah_kadin"])){
              if ($_GET["akun_tambah_kadin"] == 'gagal2'){
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
