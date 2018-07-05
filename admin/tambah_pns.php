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
      $a=$_POST['nama'];
      // $b=$_POST['tempat_lahir'];
      // $c=$_POST['tanggal_lahir'];
      $d=$_POST['jk'];
      $e=$_POST['pangkat_golongan'];
      $f=$_POST['pangkat_tmt'];
      $g=$_POST['jabatan_eselon'];
      $h=$_POST['jabatan_tmt'];
      $i=$_POST['masa_kerja'];
      $j=$_POST['jatah_tahunan'];


      $tambah=mysqli_query($con, "INSERT INTO data_pns (NIP,nama,jk,pangkat_golongan,pangkat_tmt,jabatan_eselon,jabatan_tmt,masa_kerja,jatah_tahunan) VALUES ('$x','$a','$d','$e','$f','$g','$h','$i','$j')");

      if($tambah){ 
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
 
<table>
<td style="width:70px;"></td>
<td>
<h3>Tambah Data PNS Baru</h3><br>
<form action="tambah_pns.php"  method="post">

    <div class="form-group">
      <label >NIP:</label>
      <input type="text" name="NIP" class="form-control" >
    </div>
    <div class="form-group">
      <label >Nama:</label>
      <input type="text" name="nama" class="form-control" >
    </div> 
    <div class="form-group">
      <label >Jenis Kelamin:</label>
      <select name="jk"  class="form-control" >
        <option value="Pria" selected="selected"><h1>Pria</h1></option>
        <option value="Wanita" selected="selected"><h1>Wanita</h1></option>
    </select>
  </div>  
   <div class="form-group">
      <label >Pangkat Golongan:</label>
      <input type="text" name="pangkat_golongan" class="form-control" >
    </div>
    <div class="form-group">
      <label >Pangkat TMT:</label>
      <input type="date" name="pangkat_tmt" class="form-control" >
    </div>
    <div class="form-group">
      <label >Jabatan eselon:</label>
      <input type="text" name="jabatan_eselon" class="form-control" >
    </div>
    <div class="form-group">
      <label >Jabatan TMT:</label>
      <input type="date" name="jabatan_tmt" class="form-control" >
    </div>
    <div class="form-group">
      <label >Masa Kerja:</label>
      <input type="number" name="masa_kerja" class="form-control" >
    <div class="form-group">
      <label >Sisa Cuti Tahunan:</label>
      <input type="number" value="13" name="jatah_tahunan" class="form-control" >
    </div>
    </div>
    <br>
    <button style="width:150px;text-align:center;margin-bottom:20px;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary">SUBMIT</button>
    <div></div>
  </td>
  <td style="width:40px;"></td>
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