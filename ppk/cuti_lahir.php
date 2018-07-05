<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_ppk']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
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
          <i class="fa fa-table"></i>&nbsp;Daftar Pengajuan Cuti Melahirkan</div>
        <div class="card-body">
           <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><br><br>
<?php
    include ('koneksi.php');
    $tes=$_SESSION['NIP'];
    // $q=mysqli_query($con,"SELECT kode_bidang from data_ppk where NIP='$tes' ");
    // $data2=mysqli_query($q);
    // $ambilkode=$data2['kode_bidang'];
    $query=mysqli_query($con,"SELECT anggota_bidang.NIP,anggota_bidang.kode_bidang,cuti_lahir.id_pengajuan,data_pns.nama,cuti_lahir.NIP_pengaju,cuti_lahir.tgl_pengajuan,cuti_lahir.alasan_cuti,cuti_lahir.lama_cuti,cuti_lahir.tgl_mulai,cuti_lahir.tgl_selesai,cuti_lahir.no_tlp FROM cuti_lahir inner join data_pns on cuti_lahir.NIP_pengaju=data_pns.NIP inner join anggota_bidang on cuti_lahir.NIP_pengaju=anggota_bidang.NIP where anggota_bidang.kode_bidang=(SELECT kode_bidang from data_ppk where NIP='$tes' ) ");

    // $query=mysqli_query($con,"SELECT NIP_pengaju FROM cuti_lahir ");
    // $query2=mysqli_query($con,"SELECT nama FROM data_pns  ");
    // $data2=mysqli_fetch_array($query2);
?>

              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIP</th>
                  <th>Nama </th>
                  <th>Tanggal Pengajuan </th>
                  <th>Tanggal Mulai</th>
                  <th>Tangal Selesai</th>
                  <th>Lihat Detail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
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
                  <td><?php echo $data['tgl_mulai'];?></td>    
                  <td><?php echo $data['tgl_selesai'];?></td>    
                  <td><p>&nbsp;<a href="cuti_lahir_view.php?id_pengajuan=<?php echo $data['id_pengajuan']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-eye"></i></a>&nbsp;&nbsp;<!-- <a href="akun_delete_pns.php?id_pns=<?php echo $data['id_pns']; ?>" class="btn btn-danger"><i class="fa fa-fw fa-trash-o"></i></a> --></p></td> 
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
    <!-- Logout Modal-->
  <?php include ('footer_table.php'); ?>
  </div>
</body>

</html>
