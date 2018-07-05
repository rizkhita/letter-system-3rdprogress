<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_ppk']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
?>
<?php
      include("koneksi.php");
      if (isset($_POST["updatedata"])){
      $id=$_GET['id_pengajuan'];
      $x=$_POST['sp_kabid'];
      $y=$_POST['sp_alasan'];


      $edit=mysqli_query($con, "UPDATE cuti_sakit SET sp_kabid='$x',sp_alasan='$y' where id_pengajuan='$id' ");

      if($edit){ 
              header("location:cuti_sakit.php");
              exit();
      }else
              echo "gagal";
      }
    ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_ppk.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Sakit</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <br><br>
<?php
    include ('koneksi.php');
    $id=$_GET['id_pengajuan'];
  
    $query=mysqli_query($con,"SELECT anggota_bidang.NIP,anggota_bidang.kode_bidang,cuti_sakit.id_pengajuan,data_pns.nama,cuti_sakit.NIP_pengaju,cuti_sakit.tgl_pengajuan,cuti_sakit.alasan_cuti,cuti_sakit.lama_cuti,cuti_sakit.alamat,cuti_sakit.tgl_mulai,cuti_sakit.tgl_selesai,cuti_sakit.no_tlp,cuti_sakit.sp_kabid,cuti_sakit.sp_alasan FROM cuti_sakit inner join data_pns on cuti_sakit.NIP_pengaju=data_pns.NIP inner join anggota_bidang on cuti_sakit.NIP_pengaju=anggota_bidang.NIP where cuti_sakit.id_pengajuan='$id'");

?>

             
                 
<?php while($data = mysqli_fetch_array($query)){ ?>
<td style="width:70px;"></td>
<h3>Pengajuan Cuti Sakit Pegawai</h3>
<form action="cuti_sakit_view.php?id_pengajuan=<?php echo $id; ?>" name="updatedataku" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id_pengajuan']; ?>" type="hidden" name="id_ppk" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NIP: <?php echo $data['NIP']; ?></label>
    </div>
    <div class="form-group">
      <label >Nama: <?php echo $data['nama']; ?></label>
    </div> 
    <div class="form-group">
      <label >Tanggal Pengajuan: <?php echo $data['tgl_pengajuan']; ?></label>
    </div> 
     <div class="form-group">
      <label >Lama Cuti: <?php echo $data['lama_cuti']; ?></label>
    </div> 
     <div class="form-group">
      <label >Alamat Selama Menjalankan Cuti: <?php echo $data['alamat']; ?></label>
    </div>
     <div class="form-group">
      <label >Tanggal Mulai: <?php echo $data['tgl_mulai']; ?></label>
    </div> 
     <div class="form-group">
      <label >Tanggal Selesai: <?php echo $data['tgl_selesai']; ?></label>
    </div> 
    <div class="form-group">
      <label>Status Persetujuan : </label>
      <select  name="sp_kabid" style="width:230px;" class="form-control">
        <option>----Pilih Status Persetujuan----</option>
        <option class="alert alert-success" value="disetujui" <?php if($data['sp_kabid'] == 'disetujui'){ echo 'selected'; } ?>>Disetujui</option>
        <option class="alert alert-info" value="ditangguhkan" <?php if($data['sp_kabid'] == 'ditangguhkan'){ echo 'selected'; } ?>>Ditangguhkan</option>
        <option class="alert alert-warning" value="perubahan" <?php if($data['sp_kabid'] == 'perubahan'){ echo 'selected'; } ?>>Perubahan</option>
        <option class="alert alert-danger" value="tidak disetujui" <?php if($data['sp_kabid'] == 'tidak disetujui'){ echo 'selected'; } ?>>Tidak Disetujui</option>
    </select>
    </div>
    <div class="form-group">
      <label>Alasan :</label>
      <input value="<?php echo $data['sp_alasan']; ?>" name="sp_alasan" class="form-control"  type="text" style="width:300px;" >
    </div>
      <?php
  }
  ?>
    <button style="width:200px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">Ubah Status Persetujuan</button>
  </td>
  </form>
  </table>             
    </div>
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