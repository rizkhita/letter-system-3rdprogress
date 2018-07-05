<!DOCTYPE html>
<html lang="en">
<?php
  session_start(); 
  if(!isset($_SESSION['id_admin']) and !isset($_SESSION['NIP'])){ 
  header("location:../index.php");
  }
  include ('../head.php');
?>

  <?php
      include("koneksi.php");
      if (isset($_POST["updatedata"])){
      $id=$_GET['id'];
      $x=$_POST['NIP'];
      $a=$_POST['nama'];
      $b=$_POST['tempat_lahir'];
      $c=$_POST['tanggal_lahir'];
      $d=$_POST['jk'];
      $e=$_POST['pangkat_golongan'];
      $f=$_POST['pangkat_tmt'];
      $g=$_POST['jabatan_eselon'];
      $h=$_POST['jabatan_tmt'];
      $i=$_POST['masa_kerja'];
      $j=$_POST['nama_plj'];
      $k=$_POST['bulan_plj'];
      $l=$_POST['jam_plj'];
      $m=$_POST['nama_pendidikan'];
      $n=$_POST['jurusan'];
      $n2=$_POST['nama_sekolah'];
      $o=$_POST['tahun_lulus'];
      $p=$_POST['ijazah'];
      $q=$_POST['usia'];

      $edit=mysqli_query($con, "UPDATE data_pns SET NIP='$x',nama='$a', tempat_lahir='$b', tanggal_lahir='$c', jk='$d', pangkat_golongan='$e',pangkat_tmt='$f',jabatan_eselon='$g',jabatan_tmt='$h',masa_kerja='$i',nama_plj='j',bulan_plj='$k',jam_plj='$l',nama_pendidikan='$m',jurusan='$n',nama_sekolah='$n2',tahun_lulus='$o',ijazah='$p',usia='$q' where id='$id' ");

      if($edit){ 
              header("location:data_pns.php");
      }else
              echo "gagal";
      }
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
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          </div>
 <?php
          //koneksi ke database
          include ("koneksi.php");

          //mengambil url id di admin-area(admin).php
          $id = $_GET['id'];

          //query
          $sql = mysqli_query($con, "SELECT * FROM data_pns WHERE id = '$id'");
          // $data = mysqli_fetch_array($sql);
          while($data = mysqli_fetch_array($sql)){
  
?>

<table>
<td style="width:70px;"></td>
<h3>Edit Data Pegawai</h3><br>
<form action="update_pns.php?id=<?php echo $id; ?>" name="updatedata" method="post">
<td>
  <div class="form-group">
      <label ></label>
      <input value="<?php echo $data['id']; ?>" type="hidden" name="id" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >NIP:</label>
      <input value="<?php echo $data['NIP']; ?>" type="text" name="NIP" class="form-control"  style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama:</label>
      <input value="<?php echo $data['nama']; ?>" type="text" name="nama" class="form-control"  style="width:300px;">
    </div> 
    <div class="form-group">
      <label >Tempat Lahir:</label>
      <input value="<?php echo $data['tempat_lahir']; ?>" type="text" name="tempat_lahir" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
    <label >Tanggal Lahir:</label>
      <input value="<?php echo $data['tanggal_lahir']; ?>" type="date" name="tanggal_lahir" class="form-control" style="width:300px;height;">
    </div>
    <div class="form-group">
      <label >Jenis Kelamin:</label>
      <select name="jk" style="width=300px;" class="form-control" >
        <option value="Pria" <?php if($data['jk'] == 'Pria'){ echo 'selected'; } ?>>Pria</option>
        <option value="Wanita" <?php if($data['jk'] == 'Wanita'){ echo 'selected'; } ?>>Wanita</option>
    </select>
  </div>
   <div class="form-group">
      <label >Pangkat Golongan:</label>
      <input value="<?php echo $data['pangkat_golongan']; ?>" type="text" name="pangkat_golongan" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Pangkat TMT:</label>
      <input value="<?php echo $data['pangkat_tmt']; ?>" type="date" name="pangkat_tmt" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Jabatan eselon:</label>
      <input value="<?php echo $data['jabatan_eselon']; ?>" type="text" name="jabatan_eselon" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Jabatan TMT:</label>
      <input value="<?php echo $data['jabatan_tmt']; ?>" type="date" name="jabatan_tmt" class="form-control" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Masa Kerja:</label>
      <input value="<?php echo $data['masa_kerja']; ?>" type="number" name="masa_kerja" class="form-control" style="width:300px;">
    </div>
  <br>
</td>
<td style="width:70px;"></td>
<td>
    <div class="form-group">
      <label >Nama PLJ:</label>
      <input  value="<?php echo $data['nama_plj']; ?>" name="nama_plj" class="form-control"  type="text" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Bulan PLJ:</label>
      <input  value="<?php echo $data['bulan_plj']; ?>" name="bulan_plj" class="form-control"  type="number" style="width:300px;" >
    </div>
    <div class="form-group">
      <label >Jam PLJ:</label>
      <input value="<?php echo $data['jam_plj']; ?>" name="jam_plj" class="form-control"  type="number" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Nama pendidikan:</label>
      <input value="<?php echo $data['nama_pendidikan']; ?>" name="nama_pendidikan" class="form-control"  type="text" style="width:300px;" >
    </div>
    <div class="form-group">
      <label >Jurusan:</label>
      <input value="<?php echo $data['jurusan']; ?>" name="jurusan" class="form-control"  type="text" style="width:300px;">
    </div>
        <div class="form-group">
      <label >Nama Sekolah:</label>
      <input value="<?php echo $data['nama_sekolah']; ?>" name="nama_sekolah" class="form-control"  type="text" style="width:300px;">
    </div>
    <div class="form-group">
      <label >Tahun Lulus:</label>
      <input value="<?php echo $data['tahun_lulus']; ?>" name="tahun_lulus" class="form-control"  type="number" style="width:300px;" >
    </div>
    <div class="form-group">
      <label >Ijazah:</label>
      <input value="<?php echo $data['ijazah']; ?>" name="ijazah" class="form-control"  type="text" style="width:300px;" >
    </div>
        <div class="form-group">
      <label >Usia:</label>
      <input value="<?php echo $data['usia']; ?>" name="usia" class="form-control"  type="number" style="width:300px;" >
    </div>
    <br>
      <?php
  }
  ?>
    <button style="width:150px;text-align:center;" type="submit" value="simpan" name="updatedata" class="btn btn-primary">SUBMIT</button>
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
          <small>Copyright © Your Website 2018</small>
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
