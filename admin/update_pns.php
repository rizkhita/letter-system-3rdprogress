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
      $a=$_POST['nama'];
      $d=$_POST['jk'];
      $e=$_POST['pangkat_golongan'];
      $f=$_POST['pangkat_tmt'];
      $g=$_POST['jabatan_eselon'];
      $h=$_POST['jabatan_tmt'];
      $i=$_POST['masa_kerja'];
      $j=$_POST['jatah_tahunan'];

      $edit=mysqli_query($con, "UPDATE data_pns SET NIP='$x',nama='$a', jk='$d', pangkat_golongan='$e',pangkat_tmt='$f',jabatan_eselon='$g',jabatan_tmt='$h',masa_kerja='$i',jatah_tahunan='$j' where id='$id' ");

      if($edit){ 
              header("location:data_pns.php");
              exit();
      }else
              echo "gagal";
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
          <i class="fa fa-table"></i> Data PNS Diskominfo Jabar</div>
        <div class="card-body">
          </div>
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di admin-area(admin).php
          $id = $_GET['id'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM data_pns WHERE id = '$id'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<form action="update_pns.php?id=<?php echo $id; ?>" name="updatedata" method="post">
  <td>
<h3>Edit Data PNS Diskominfo Jabar</h3>

  <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id']; ?>" type="hidden" name="id" class="form-control"  >
    </div>
    <div class="form-group">
      <label >NIP:</label>
      <input value="<?php echo $data['NIP']; ?>" type="text" name="NIP" class="form-control"  >
    </div>
    <div class="form-group">
      <label >Nama:</label>
      <input value="<?php echo $data['nama']; ?>" type="text" name="nama" class="form-control"  >
    </div> 
    <div class="form-group">
      <label >Jenis Kelamin:</label>
      <select name="jk" style="width=300px;" class="form-control" >
        <option value="Pria" <?php if($data['jk'] == 'Pria'){ echo 'selected'; } ?>>Pria</option>
        <option value="Wanita" <?php if($data['jk'] == 'Wanita'){ echo 'selected'; } ?>>Wanita</option>
    </select>
  </div>
   <div class="form-group">
      <label >Pangkat Golongan:</label>
      <input value="<?php echo $data['pangkat_golongan']; ?>" type="text" name="pangkat_golongan" class="form-control" >
    </div>
    <div class="form-group">
      <label >Pangkat TMT:</label>
      <input value="<?php echo $data['pangkat_tmt']; ?>" type="date" name="pangkat_tmt" class="form-control" >
    </div>
    <div class="form-group">
      <label >Jabatan eselon:</label>
      <input value="<?php echo $data['jabatan_eselon']; ?>" type="text" name="jabatan_eselon" class="form-control" >
    </div>
    <div class="form-group">
      <label >Jabatan TMT:</label>
      <input value="<?php echo $data['jabatan_tmt']; ?>" type="date" name="jabatan_tmt" class="form-control" >
    </div>
    <div class="form-group">
      <label >Masa Kerja:</label>
      <input value="<?php echo $data['masa_kerja']; ?>" type="number" name="masa_kerja" class="form-control" >
    </div>
    <div class="form-group">
      <label >Sisa Cuti Tahunan:</label>
      <input value="<?php echo $data['jatah_tahunan']; ?>" type="number" name="jatah_tahunan" class="form-control" >
    </div>
    <br>
      <?php
  }
  ?>
    <button style="width:150px;text-align:center;margin-bottom:20px;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">SUBMIT</button>
  </td>
  <td style="width:70px;"></td>
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
