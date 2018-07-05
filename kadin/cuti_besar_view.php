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
      $j=$_POST['sp_dinas'];
      $k=$_POST['sp_alasan1'];
      // $l=$_POST['sp_bkd'];
      // $m=$_POST['sp_alasan2'];

     
      $edited=mysqli_query($con, "UPDATE cuti_besar set sp_dinas='$j',sp_alasan1='$k' where id_pengajuan='$id'");

      if($edited){ 
              header("location:cuti_besar.php");
              exit();
      }else
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
          <i class="fa fa-table"></i>Pengajuan Cuti Besar</div>
        <div class="card-body">
          </div>

 <?php
         
          include ("koneksi.php");

          $id = $_GET['id_pengajuan'];

          $sql = mysqli_query($con, "SELECT * FROM cuti_besar WHERE id_pengajuan = '$id'");
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>&nbsp;&nbsp;&nbsp;Pengajuan Cuti Besar Pegawai</h3><br>
<form action="cuti_besar_view.php?id_pengajuan=<?php echo $id;?>" name="updatedata" method="post">
<td>
  <input type="hidden" name="id_pengajuan" value="<?php echo $data['id_pengajuan'];?>" class="form-control" style="width:300px;"> 
   <div class="form-group">
      <label >Tanggal Pengajuan : <?php echo $data['tgl_pengajuan'];?> </label>
      </div>        
    <div class="form-group">
      <label >NIP :  <?php echo $data['NIP_pengaju'];?>  </label>
     </div>
    <div class="form-group">
      <label >Alasan Cuti : <?php echo $data['alasan_cuti'];?></label>
      </div> 
    <div class="form-group">
      <label >Lama Cuti: <?php  echo $data['lama_cuti'];?></label>
      </div>
    <div class="form-group">
    <label >Tanggal Mulai: <?php echo $data['tgl_mulai'];?></label>
      </div>
    <div class="form-group">
     <label >Tanggal Selesai: <?php echo $data['tgl_selesai'];?></label>
      </div>
    <div class="form-group">
     <label >Alamat selama menjalani cuti: <?php echo $data['alamat'];?></label>
      </div>
    <div class="form-group">
     <label >Nomor Telepon: <?php echo $data['no_tlp'];?></label>
    </div>
     <div class="form-group">
      <label>Status Persetujuan Kepala Dinas : </label>
      <select  name="sp_dinas" style="width:230px;" class="form-control">
        <option>----Pilih Status Persetujuan----</option>
        <option class="alert alert-success" value="disetujui" <?php if($data['sp_dinas'] == 'disetujui'){ echo 'selected'; } ?>>Disetujui</option>
        <option class="alert alert-info" value="ditangguhkan" <?php if($data['sp_dinas'] == 'ditangguhkan'){ echo 'selected'; } ?>>Ditangguhkan</option>
        <option class="alert alert-warning" value="perubahan" <?php if($data['sp_dinas'] == 'perubahan'){ echo 'selected'; } ?>>Perubahan</option>
        <option class="alert alert-danger" value="tidak disetujui" <?php if($data['sp_dinas'] == 'tidak disetujui'){ echo 'selected'; } ?>>Tidak Disetujui</option>
    </select>
    </div>
    <div class="form-group">
      <label>Alasan :</label>
      <input value="<?php echo $data['sp_alasan1']; ?>" name="sp_alasan1" class="form-control"  type="text" style="width:300px;" >
    </div>
<!--     <div class="form-group">
      <label>Status Persetujuan BKD : </label>
      <select  name="sp_bkd" style="width:230px;" class="form-control">
        <option>----Pilih Status Persetujuan----</option>
        <option class="alert alert-success" value="disetujui" <?php if($data['sp_bkd'] == 'disetujui'){ echo 'selected'; } ?>>Disetujui</option>
        <option class="alert alert-info" value="ditangguhkan" <?php if($data['sp_bkd'] == 'ditangguhkan'){ echo 'selected'; } ?>>Ditangguhkan</option>
        <option class="alert alert-warning" value="perubahan" <?php if($data['sp_bkd'] == 'perubahan'){ echo 'selected'; } ?>>Perubahan</option>
        <option class="alert alert-danger" value="tidak disetujui" <?php if($data['sp_bkd'] == 'tidak disetujui'){ echo 'selected'; } ?>>Tidak Disetujui</option>
    </select>
    </div>
    <div class="form-group">
      <label>Alasan :</label>
      <input value="<?php echo $data['sp_alasan2']; ?>" name="sp_alasan2" class="form-control"  type="text" style="width:300px;" >
    </div> -->
    <?php } ?>
    <br>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-success"><i class="fa fa-fw fa-pencil-square-o"></i>&nbsp;Edit</button>
    <br><br>
  </td>
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
