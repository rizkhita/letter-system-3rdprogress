 
  <!-- Navigation Vertical-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="as_admin.php">DISKOMINFO JABAR</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="as_admin.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Profil">
          <a class="nav-link" href="profil_admin.php">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Profil Saya </span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Matriks Kepegawaian">
          <a class="nav-link" href="data_pns.php">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Matriks Kepegawaian </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Akun Cuti">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents3" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-address-book"></i>
            <span class="nav-link-text">Akun Cuti Online </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents3">
            <li>
              <a href="akun_pns.php">Akun Pegawai </a>
            </li>
            <li>
              <a href="akun_ppk.php">Akun PPK </a>
            </li>
            <li>
              <a href="akun_kadin.php">Akun Kepala Dinas </a>
            </li>
            <li>
              <a href="akun_admin.php">Akun Administrator </a>
            </li>
          </ul>
        </li>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Data Bidang dan Anggota Bidang">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents4" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Bagian dan Sekertariat</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents4">
            <li>
              <a href="bagian.php">Daftar Bidang dan Sekertariat</a>
            </li>
            <li>
              <a href="data_ppk.php">Data Kepala Bidang</a>
            </li>
            <li>
              <a href="data_anggota.php">Data Anggota Bidang</a>
            </li>
             <li>
              <a href="data_kadin.php">Data Kepala Dinas</a>
            </li>
          </ul>
        </li>
        </li>
        
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Riwayat Cuti Pegawai">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents2" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Riwayat Cuti Pegawai</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents2">
            <li>
              <a href="cuti_sakit.php">Cuti Sakit</a>
            </li>
            <li>
              <a href="cuti_kap.php">CKAP</a>
            </li>
             <li>
              <a href="cuti_tahunan.php">Cuti Tahunan</a>
            </li>
            <li>
              <a href="cuti_lahir.php">Cuti Melahirkan</a>
            </li>
            <li>
              <a href="cuti_besar.php">Cuti Besar</a>
            </li>
            <li>
              <a href="cuti_ltn.php">CLTN</a>
            </li>
          </ul>
        </li>
      </li>

       <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Ubah Password">
          <a class="nav-link" href="password_admin.php">
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