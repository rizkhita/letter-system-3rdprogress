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
          <i class="fa fa-table"></i>&nbsp;Riwayat Pengajuan Cuti Karena Alasan Penting</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <a  data-toggle="modal" data-target="#exampleCutiKAP"><button  name= "tambahdata" style="margin-left:20px;" class="btn btn-primary float-sm-left" type="submit"  value="ADD"><i class="fa fa-fw fa-plane"></i>&nbsp;Buat Surat</button></a>
              <br><br>
<?php
    include ('koneksi.php');

    $tes=$_SESSION['NIP'];
    $query=mysqli_query($con,"SELECT data_pns.NIP,cuti_kap.id_pengajuan,data_pns.nama,cuti_kap.NIP_pengaju,cuti_kap.tgl_pengajuan,cuti_kap.alasan_cuti,cuti_kap.lama_cuti,cuti_kap.tgl_mulai,cuti_kap.tgl_selesai,cuti_kap.no_tlp,cuti_kap.sp_kabid FROM cuti_kap inner join data_pns on cuti_kap.NIP_pengaju=data_pns.NIP where NIP_pengaju='$tes' ");

    
?>

              <thead>
                <tr>
                  <th>No.</th>
                  <th class="w-25">Tanggal Pengajuan</th>
                  <th class="w-25">Lama Cuti</th> <!-- 
                  <th>Status Persetujuan KABID </th> -->
                  <th >Lihat Detail</th>
                  <!-- copy -->
                  <th class="w-50">Surat Pengajuan Cuti</th></tr>
              </thead>
              <tbody>
              <?php
              $i=0;
               while($data = mysqli_fetch_array($query)){
              // http://achmatim.net/2010/01/18/perintah-mysql-untuk-menampilkan-data-dari-beberapa-tabel/
              $i=$i+1;
              ?>
                <tr>
                  <td><?php echo $i;?> </td>
                  <td><?php echo $data['tgl_pengajuan'];?></td>
                  <td><?php echo $data['lama_cuti']; ?>&nbsp;hari kerja</td> 
                   <!-- <td><?php if(is_null($data['sp_kabid'])){
                        ?>
                        <div class="alert alert-danger"><i class="fa fa-clock-o"></i>&nbsp;Belum Dikonfirmasi</div>                        

                      <?php }else{
                          ?>
                        <div class="alert alert-primary"><i class="fa fa-check"></i>&nbsp;<?php echo $data['sp_kabid'];?></div>                        
                      <?php }?>
                  </td> -->
                  <td><p>&nbsp;<a href="cuti_kap_view.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;<!-- <a href="akun_delete_pns.php?id_pns=<?php echo $data['id_pns']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a> --></p></td> 
                     <td>
                    <?php  if(is_null($data['sp_kabid']) or $data['sp_kabid']==''){   ?>
                     <div class="alert alert-primary" ><i class="fa fa-clock-o"></i>&nbsp;Menunggu Konfirmasi</div>
                     <?php }else if($data['sp_kabid']=='disetujui'){ ?>
                     <div class="alert alert-success" >
                      <a href="../print/print_permintaan_kap.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" ><i class="fa fa-fw fa-print"></i>&nbsp;<b>Cetak Surat Permintaan Cuti</b></a><br>
                      <a href="../print/print_sk_kap.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" ><i class="fa fa-fw fa-print"></i>&nbsp;<b>Cetak Surat Keputusan Cuti</b></a>
                     </div>
                     <?php }else if($data['sp_kabid']=='tidak disetujui'){ ?>
                     <div class="alert alert-danger" ><i class="fa fa-close"></i>&nbsp;Pengajuan Tidak Diterima</div>
                    <?php }else{?>
                    <div class="alert alert-success" ><a href="../print/print_permintaan_kap.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" ><i class="fa fa-fw fa-print"></i>&nbsp;<b>Cetak Surat</b></a></div>
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
        <!-- Cuti kap -->
    <?php include ('../peraturan_cuti.php'); ?>
    <!-- end kap -->
    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>

</html>
