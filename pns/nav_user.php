  <!-- Navigation Vertical-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="as_user.php">DISKOMINFO JABAR</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav " id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="as_user.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profil">
          <a class="nav-link" href="profil_pns.php">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Profil Saya</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Riwayat Cuti">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Edit Password">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Riwayat Cuti</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="cuti_sakit.php">Cuti Sakit</i></a>
            </li>
            <li>
              <a href="cuti_kap.php">Cuti Karena Alasan Penting</a>
            </li>
            <li>
              <a href="cuti_besar.php">Cuti Besar</a>
            </li>
            <li>
              <a href="cuti_ltn.php">Cuti Luar Tanggungan Negara </a>
            </li>
            <li>
              <a href="cuti_tahunan.php">Cuti Tahunan</a>
            </li>
    <?php
     include ('koneksi.php');
     $tes= $_SESSION['NIP'];
   
     $query=mysqli_query($con,"SELECT jk from data_pns where NIP ='$tes' ");
     $data=mysqli_fetch_array($query);
     if ($data['jk']=='Wanita') {
    ?>
      
       <li>
        <a href="cuti_lahir.php">Cuti Melahirkan</a>
       </li>

    <?php
     } else {}
    ?>
            
           <!--  <li>
              <a href="#">Lihat Semua Riwayat</a>
            </li> -->
          </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ubah Password">
          <a class="nav-link" href="password_pns">
            <i class="fa fa-fw fa-pencil-square-o"></i>
            <span class="nav-link-text">Ubah Password Saya</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>

      </ul>
    <!-- end-->

    <!-- Navigation Horizontal -->
      <ul class="navbar-nav ml-auto"> 
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="JS-Boostrap">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- end -->