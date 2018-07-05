<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_pns']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  exit();
  }
  include ('../head.php');
?>



  <?php
      include("koneksi.php");
      if (isset($_POST["tambahdata"])){
      $x=$_POST['jenis_cuti'];
      $b=$_POST['tgl_pengajuan'];
      $c=$_POST['NIP_pengaju'];
      $d=$_POST['alasan_cuti'];
      $e=$_POST['lama_cuti'];
      $f=$_POST['tgl_mulai'];
      $g=$_POST['tgl_selesai'];
      $hi=$_POST['alamat'];
      $i=$_POST['no_tlp'];

      $tambah=mysqli_query($con, "INSERT INTO cuti_sakit (jenis_cuti,tgl_pengajuan,NIP_pengaju,alasan_cuti,lama_cuti,tgl_mulai,tgl_selesai,alamat,no_tlp) VALUES ('$x','$b','$c','$d','$e','$f','$g','$hi','$i')");

      if($tambah){ 
              header("location:cuti_sakit.php");
              exit();
      }else
              echo "gagal";
      }
    ?>



<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_user.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Sakit</div>
        <div class="card-body">
          </div>
 
<table>
<td style="width:5%;"></td>
<h3>&nbsp;&nbsp;&nbsp;Buat Pengajuan Cuti Sakit</h3><br>
<form action="formcuti_sakit.php"  method="post">
<td style="width:85%;">
  <input required type="hidden" name="jenis_cuti" value="Sakit" class="form-control" >
   <div class="form-group">
      <label >Tanggal Pengajuan :  </label>
      <input required type="date" name="tgl_pengajuan" class="form-control" >
    </div>        
    <div class="form-group">
      <!-- <label >NIP :  </label> -->
      <input required type="hidden" name="NIP_pengaju" value="<?php echo $_SESSION['NIP']; ?>" class="form-control" >
    </div>
    <div class="form-group">
      <!-- <label >Alasan Cuti :</label> --> 
      <input required rows="5" type="hidden" value="Sakit" name="alasan_cuti" class="form-control" ></input required>
    </div> 
    <div class="form-group">
      <label >Lama Cuti:</label>
      <input required type="text" name="lama_cuti" class="form-control" placeholder="...(hari/bulan/tahun)">
    </div>
    <div class="form-group">
    <label >Tanggal Mulai:</label>
      <input required type="date" name="tgl_mulai" class="form-control" >
    </div>
    <div class="form-group">
     <label >Tanggal Selesai:</label>
      <input required type="date" name="tgl_selesai" class="form-control" >
    </div>
    <div class="form-group">
     <label >Alamat selama menjalani cuti:</label>
      <textarea rows="5" type="text" name="alamat" placeholder="Contoh Penulisan Alamat : 
Jl. Pasar Barat No.51 RT.01/RW.01 Kec.Banjaran
Kab.Bandung Prov.Jawa Barat" class="form-control" ></textarea>
    </div>
    <div class="form-group">
     <label >Nomor Telepon:</label>
      <input required type="text" name="no_tlp" class="form-control" >
    </div>
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="tambahdata"class="btn btn-primary"><i class="fa fa-fw fa-plane"></i>&nbsp;Ajukan</button>
    <br><br>
  </td>
  <td style="width:10%;"> </td>
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
    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>

</html>
