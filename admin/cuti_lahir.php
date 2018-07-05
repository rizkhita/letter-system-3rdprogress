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
          <i class="fa fa-table"></i>Daftar Pengajuan Cuti Melahirkan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <button  data-toggle="modal" data-target="#exampleCutiMelahirkan" style="margin-left:20px;" class="btn btn-primary float-sm-left" type="submit"  value="ADD"><i class="fa fa-fw fa-plane"></i>&nbsp;Buat Surat</button></a>
              <br><br>
<?php
    include ('koneksi.php');

    $query=mysqli_query($con,"SELECT cuti_lahir.id_pengajuan,data_pns.nama,cuti_lahir.NIP_pengaju,cuti_lahir.tgl_pengajuan,cuti_lahir.alasan_cuti,cuti_lahir.lama_cuti,cuti_lahir.tgl_mulai,cuti_lahir.tgl_selesai,cuti_lahir.no_tlp,cuti_lahir.sp_dinas FROM cuti_lahir inner join data_pns on cuti_lahir.NIP_pengaju=data_pns.NIP ");

    // $query=mysqli_query($con,"SELECT NIP_pengaju FROM cuti_lahir ");
    // $query2=mysqli_query($con,"SELECT nama FROM data_pns  ");
    // $data2=mysqli_fetch_array($query2);
?>

              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Tanggal Pengajuan</th>
                  <th>Alasan Cuti</th>
                  <th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                  <th>Cetak Surat Pengajuan</th>
                </tr>
              </thead>
              <tbody>
              <?php
  
              $i=0;
              while($data = mysqli_fetch_array($query)){
              $i=$i+1;
              // http://achmatim.net/2010/01/18/perintah-mysql-untuk-menampilkan-data-dari-beberapa-tabel/
              
              ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $data['NIP_pengaju']; ?></td>
                  <td><?php echo $data['nama']; ?></td> 
                  <td><?php echo $data['tgl_pengajuan'];?></td>
                  <td><?php echo $data['alasan_cuti'];?></td>
                  <td><p>&nbsp;<a href="cuti_lahir_view.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;<a href="cuti_lahir_update.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-success"><i class="fa fa-fw fa-pencil-square-o"></i></a>&nbsp;&nbsp;<a href="delcuti_lahir.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a></p></td> 
                  <td>
                  <?php  
                  if(is_null($data['sp_dinas']) or $data['sp_dinas']==''){   ?>
                     <div class="alert alert-primary" ><i class="fa fa-clock-o"></i>&nbsp;Menunggu Konfirmasi Kepala Dinas</div>
                     <?php }else if($data['sp_dinas']=='disetujui'){ ?>
                     <div class="alert alert-success" >
                      <a href="../print/print_permintaan_lahir.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" ><i class="fa fa-fw fa-print"></i>&nbsp;<b>Cetak Surat Permintaan Cuti</b></a>
                     </div>
                     <?php }else if($data['sp_dinas']=='tidak disetujui'){ ?>
                     <div class="alert alert-danger" ><i class="fa fa-close"></i>&nbsp;Pengajuan Tidak Diterima</div>
                    <?php }else{?>
                    <div class="alert alert-success" ><a href="../print/print_permintaan_lahir.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" ><i class="fa fa-fw fa-print"></i>&nbsp;<b>Cetak Surat Permintaan</b></a></div>
                    <?php }?>
                  </td>
                </tr>

                <?php
                  }
                ?>
              </tbody>
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
    <!-- Toggle Pengajuan Cuti -->
    <?php include('../peraturan_cuti.php');?>
    <!-- END -->

    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>

</html>
