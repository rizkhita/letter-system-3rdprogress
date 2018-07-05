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
          <i class="fa fa-table"></i> Data Kepala Dinas</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
             <br><br>
<?php
  include ('koneksi.php');
   $query=mysqli_query($con,"SELECT data_kadin.id,data_kadin.NIP,data_pns.nama,data_kadin.posisi FROM data_kadin inner join data_pns on data_pns.NIP=data_kadin.NIP ");

// SELECT * FROM table1
// INNER JOIN table2
// ON table2.email = table1.email
// INNER JOIN table3
// ON table3.email = table2.email
?>

              <thead>
                <tr>
                  <th style="width:3px;">No.</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Posisi Jabatan</th>
                  <th>ACTION&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $i=0;
              while($data = mysqli_fetch_array($query)){
              $i=$i+1;
              ?>
                <tr>
                  <td style="width:3px;"><?php echo $i;?></td>
                  <td><?php echo $data['NIP']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $data['posisi']; ?></td>
                  <td><p>&nbsp;<a href="update_kadin.php?id=<?php echo $data['id']; ?>" class="btn btn-primary"><i class="fa fa-fw fa-pencil-square-o"></i></a>&nbsp;&nbsp;</p></td> 
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
    <?php include('footer_table.php');?>
  </div>
</body>

</html>
