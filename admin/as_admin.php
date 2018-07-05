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
<?php include ('nav_admin.php'); ?>
<!-- end -->
    <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Halaman Utama</li>
      </ol>
      <?php
      include ('koneksi.php');
      $ambil=$_SESSION['NIP'];
      $query=mysqli_query($con,"SELECT nama from data_pns where NIP='$ambil'");
      $data=mysqli_fetch_array($query);
      ?>

      <h1>Selamat Datang <?php echo $data['nama'];?>&nbsp;!</h1>
      <hr>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5"><b>CUTI TAHUNAN</b></div>
              <br>            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#exampleCutiTahunan">
              <span class="float-left">View detail</span>
              <span class="float-right" >
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-calendar"></i>
              </div>
              <div class="mr-5"><b>CUTI BESAR</b></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#exampleCutiBesar">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-ambulance"></i>
              </div>
              <div class="mr-5"><b>CUTI SAKIT</b></div>
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#exampleCutiSakit">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-heartbeat"></i>
              </div>
              <div class="mr-5"><b>CUTI MELAHIRKAN</b></div>
            </div>
           <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#exampleCutiMelahirkan">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-plane"></i>
              </div>
              <div class="mr-5"><b>CKAP</b></div>
              Cuti Karena Alasan Penting
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#exampleCutiKAP">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5"><b>CLTN</b></div>
              Cuti Di Luar<br> Tanggungan Negara
            </div>
            <a class="card-footer text-white clearfix small z-1" data-toggle="modal" data-target="#exampleCutiLTN">
              <span class="float-left">View Detail</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
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

    <!-- Bootstrap core JavaScript-->
<?php include('footer_table.php');?>
</div>
</body>

</html>
