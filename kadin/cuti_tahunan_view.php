<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_kadin']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
?>
<?php
      include("koneksi.php");
      if (isset($_POST["updatedata"])){
      $id=$_GET['id_pengajuan'];
      $c=$_POST['NIP_pengaju'];
      $v=$_POST['lama_cuti'];
      $x=$_POST['sp_kabid'];
      $y=$_POST['sp_alasan'];

               
      if($x=='disetujui' ){
                $edit=mysqli_query($con, "UPDATE cuti_tahunan SET NIP_pengaju='$c',lama_cuti='$v',sp_kabid='$x',sp_alasan='$y' where id_pengajuan='$id' ");
            
                $edit2=mysqli_query($con, "UPDATE data_pns SET jatah_tahunan=(jatah_tahunan-'$v') where NIP='$c'" );
                 header("location:cuti_tahunan.php");
                 exit();
               } 
               else if($x!='disetujui'){
                 $edit=mysqli_query($con, "UPDATE cuti_tahunan SET NIP_pengaju='$c',lama_cuti='$v',sp_kabid='$x',sp_alasan='$y' where id_pengajuan='$id' ");
            
                header("location:cuti_tahunan.php");
               }
                
               
              echo "gagal";
      }
    ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
<?php
include ('nav_kadin.php');
?>
<!-- end -->
  <div class="content-wrapper">
    <div class="container-fluid">

      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Tahunan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <br><br>
<?php
    include ('koneksi.php');
    $id=$_GET['id_pengajuan'];
  
   $query=mysqli_query($con,"SELECT data_ppk.NIP,data_ppk.kode_bidang,cuti_tahunan.id_pengajuan,data_pns.nama,cuti_tahunan.NIP_pengaju,cuti_tahunan.tgl_pengajuan,cuti_tahunan.alasan_cuti,cuti_tahunan.lama_cuti,cuti_tahunan.alamat,cuti_tahunan.tgl_mulai,cuti_tahunan.tgl_selesai,cuti_tahunan.no_tlp,cuti_tahunan.sp_kabid,cuti_tahunan.sp_alasan FROM cuti_tahunan inner join data_pns on cuti_tahunan.NIP_pengaju=data_pns.NIP inner join data_ppk on cuti_tahunan.NIP_pengaju=data_ppk.NIP where cuti_tahunan.id_pengajuan='$id'");

?>

             
                 
<?php while($data = mysqli_fetch_array($query)){ ?>
<td style="width:70px;"></td>
<h3>Pengajuan Cuti Tahunan Pegawai</h3>
<form action="cuti_tahunan_view.php?id_pengajuan=<?php echo $id; ?>" name="updatedataku" method="post">
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id_pengajuan']; ?>" type="hidden" name="id_ppk" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NIP: <?php echo $data['NIP']; ?></label>
      <input value="<?php echo $data['NIP']; ?>" type="hidden" name="NIP_pengaju" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama: <?php echo $data['nama']; ?></label>
    </div> 
    <div class="form-group">
      <label >Tanggal Pengajuan: <?php echo $data['tgl_pengajuan']; ?></label>
    </div> 
     <div class="form-group">
      <label >Lama Cuti: <?php echo $data['lama_cuti']; ?> &nbsp;hari kerja</label>
      <input value="<?php echo $data['lama_cuti']; ?>" type="hidden" name="lama_cuti" class="form-control"  style="width:300px;">
    </div> 
    <div class="form-group">
      <label >Alamat Selama Menjalankan Cuti: <?php echo $data['alamat']; ?> </label>
      <input value="<?php echo $data['lama_cuti']; ?>" type="hidden" name="lama_cuti" class="form-control"  style="width:300px;">
    </div> 
     <div class="form-group">
      <label >Tanggal Mulai: <?php echo $data['tgl_mulai']; ?></label>
    </div> 
     <div class="form-group">
      <label >Tanggal Selesai: <?php echo $data['tgl_selesai']; ?></label>
    </div> 
    <div class="form-group">
      <label>Status Persetujuan : </label>
      <select  name="sp_kabid"  class="form-control">
        <option>----Pilih Status Persetujuan----</option>
        <option class="alert alert-success" value="disetujui" <?php if($data['sp_kabid'] == 'disetujui'){ echo 'selected'; } ?>>Disetujui</option>
        <option class="alert alert-info" value="ditangguhkan" <?php if($data['sp_kabid'] == 'ditangguhkan'){ echo 'selected'; } ?>>Ditangguhkan</option>
        <option class="alert alert-warning" value="perubahan" <?php if($data['sp_kabid'] == 'perubahan'){ echo 'selected'; } ?>>Perubahan</option>
        <option class="alert alert-danger" value="tidak disetujui" <?php if($data['sp_kabid'] == 'tidak disetujui'){ echo 'selected'; } ?>>Tidak Disetujui</option>
    </select>
    </div>
    <div class="form-group">
      <label>Alasan :</label>
      <textarea name="sp_alasan" class="form-control"  type="text" rows="5"  ><?php echo $data['sp_alasan']; ?></textarea>
    </div>
      <?php
  }
  ?>

  <div class="alert alert-danger">
  <strong>PERINGATAN !</strong>
  <br>Apabila anda <strong>menyetujui</strong> pengajuan cuti ini, maka anda <strong>tidak dapat mengubah status persetujuannya kembali</strong>.
  </div>

    <button style="width:200px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">Ubah Status Persetujuan</button>
  </td>
  <td style="width:50px;"></td>
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