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
          <i class="fa fa-table"></i>&nbsp;Pengajuan Cuti Luar Tanggungan Negara</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <br><br>
<?php
    include ('koneksi.php');
    $id=$_GET['id_pengajuan'];
  
    $query=mysqli_query($con,"SELECT cuti_ltn.NIP_pengaju,
      data_pns.nama,
      cuti_ltn.tgl_pengajuan,
      cuti_ltn.alasan_cuti,
      cuti_ltn.gaji_pokok,
      cuti_ltn.lama_cuti,
      cuti_ltn.alamat,
      cuti_ltn.tgl_mulai,
      cuti_ltn.tgl_selesai,
      cuti_ltn.sp_dinas,
      cuti_ltn.sp_alasan1,
      cuti_ltn.sp_bkd,
      cuti_ltn.sp_alasan2 from cuti_ltn inner join data_pns on cuti_ltn.NIP_pengaju=data_pns.NIP  where cuti_ltn.id_pengajuan='$id'");

?>

             
                 
<?php while($data = mysqli_fetch_array($query)){ ?>
<td style="width:70px;"></td>
<h3>Edit Pengajuan CLTN Pegawai</h3>
<form>
<td>
    <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id_pengajuan']; ?>" type="hidden"  class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NIP: <?php echo $data['NIP_pengaju']; ?></label>
    </div>
    <div class="form-group">
      <label >Nama: <?php echo $data['nama']; ?></label>
    </div> 
    <div class="form-group">
      <label >Tanggal Pengajuan: <?php echo $data['tgl_pengajuan']; ?></label>
    </div> 
    <div class="form-group">
      <label >Alasan: <?php echo $data['alasan_cuti']; ?></label>
    </div> 
    <div class="form-group">
      <label >Gaji Pokok: <?php echo $data['gaji_pokok']; ?></label>
    </div> 
     <div class="form-group" type="hidden">
      <label >Lama Cuti: <?php echo $data['lama_cuti']; ?>&nbsp;bulan</label>
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
      <label>Status Persetujuan Dinas:</label> 
      <?php if(is_null($data['sp_dinas'])){
                        ?>
                        <div style="width:200px;" class="alert alert-danger">Belum Dikonfirmasi</div>                        

                      <?php }else{
                          ?>
                        <div style="width:150px;" class="alert alert-primary"><?php echo $data['sp_dinas']; ?></div>                        
                      <?php }?>
    </div>
    <?php if(is_null($data['sp_alasan1'])){ ?>
    <?php }else{ ?>
    <div class="form-group">
      <label>Alasan :</label>
      <div style="width:150px;" class="alert alert-primary"><?php echo $data['sp_alasan1']; ?></div>
    </div>
      <?php }?>
    
    </div>
     <div class="form-group">
      <label>Status Persetujuan BKD:</label> 
      <?php if(is_null($data['sp_bkd'])){
                        ?>
                        <div style="width:200px;" class="alert alert-danger">Belum Dikonfirmasi</div>                        

                      <?php }else{
                          ?>
                        <div style="width:150px;" class="alert alert-primary"><?php echo $data['sp_bkd']; ?></div>                        
                      <?php }?>
    </div>
    <?php if(is_null($data['sp_alasan2'])){ ?>
    <?php }else{ ?>
    <div class="form-group">
      <label>Alasan :</label>
      <div style="width:150px;" class="alert alert-primary"><?php echo $data['sp_alasan2']; ?></div>
    </div>
      <?php }?>
        </div>
        <?php
        }
        ?>
  <br><!-- <button style="width:200px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">Ubah Status Persetujuan</button>
  --> </td>
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
