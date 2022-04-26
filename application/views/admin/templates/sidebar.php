    <!-- Sidebar -->

    <?php if($_SESSION['user']['level'] == 'Siswa' || $_SESSION['user']['level'] == 'Guru' || $_SESSION['user']['level'] == 'Administrator'): ?>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url(); ?>beranda-admin">
        <div class="sidebar-brand-icon">
          <img src="<?= base_url("assets/"); ?>img/icon/<?= $pengaturan['logo']; ?>" alt="" class="logo-sidebar">
        </div>
        <?php $level = strtolower($_SESSION['user']['level']); ?>
        <div class="sidebar-brand-text mx-3"><?= $level; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dasbor -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>beranda-admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dasbor</span></a>
      </li>

            
      <?php if($_SESSION['user']['level'] == 'Administrator' || $_SESSION['user']['level'] == 'Guru'): ?>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-globe"></i>
          <span>Web</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">  
            <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-profil-admin"><i class="fas fa-fw fa-check"></i> Profil</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-sejarah-admin"><i class="fas fa-fw fa-check"></i> Sejarah</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-visi-misi-admin"><i class="fas fa-fw fa-check"></i> Visi dan Misi</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-struktur-admin"><i class="fas fa-fw fa-check"></i> Struktur</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-kategori-artikel-admin"><i class="fas fa-fw fa-check"></i> Kategori Artikel</a>
            <?php endif; ?>
            <?php if($_SESSION['user']['level'] == 'Administrator' || $_SESSION['user']['level'] == 'Guru'): ?>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-artikel-admin"><i class="fas fa-fw fa-check"></i> Artikel</a>
            <?php endif; ?>
            <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-foto-admin"><i class="fas fa-fw fa-check"></i> Foto</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-vidio-admin"><i class="fas fa-fw fa-check"></i> Vidio</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-slider-admin"><i class="fas fa-fw fa-check"></i> Slider</a>
            <?php endif; ?>
          </div>
        </div>
      </li>
      <?php endif; ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDataPengguna" aria-expanded="true" aria-controls="collapseDataPengguna">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Pengguna</span>
          </a>
          <div id="collapseDataPengguna" class="collapse" aria-labelledby="headingDataPengguna" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="<?= base_url(); ?>data-administrator"><i class="fas fa-fw fa-check"></i>
              Administrator</a>
              <a class="collapse-item" href="<?= base_url(); ?>data-guru"><i class="fas fa-fw fa-check"></i> Guru</a>
              <a class="collapse-item" href="<?= base_url(); ?>data-siswa"><i class="fas fa-fw fa-check"></i> Siswa</a>
            </div>
          </div>
        </li>
      
        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
            <i class="fas fa-fw fa-th"></i>
            <span>Master</span>
          </a>
          <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">            
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-tahun-pelajaran-admin"><i class="fas fa-fw fa-check"></i> Tahun Pelajaran</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-semester-admin"><i class="fas fa-fw fa-check"></i> Semester</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-tingkat-admin"><i class="fas fa-fw fa-check"></i> Tingkat</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-gedung-admin"><i class="fas fa-fw fa-check"></i> Gedung</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-ruangan-admin"><i class="fas fa-fw fa-check"></i> Ruangan</a>
              <a class="collapse-item" href="<?= base_url(); ?>pengaturan-kelas-admin"><i class="fas fa-fw fa-check"></i> Kelas</a>            
              
            </div>
          </div>
        </li>
      <?php endif; ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik" aria-expanded="true" aria-controls="collapseAkademik">
          <i class="fas fa-fw fa-tag"></i>
          <span>Akademik</span>
        </a>
        <div id="collapseAkademik" class="collapse" aria-labelledby="headingAkademik" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
          <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-rentang-nilai"><i class="fas fa-fw fa-check"></i> Rentang Nilai</a>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-mata-pelajaran"><i class="fas fa-fw fa-check"></i> Mata Pelajaran</a>
          <?php endif; ?>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-jadwal-pelajaran"><i class="fas fa-fw fa-check"></i> Jadwal Pelajaran</a>
          <?php if($_SESSION['user']['level'] == 'Administrator' || $_SESSION['user']['level'] == 'Guru'): ?>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-kompetensi-dasar"><i class="fas fa-fw fa-check"></i> Kompetensi Dasar</a>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-agenda-mengajar"><i class="fas fa-fw fa-check"></i> Agenda Mengajar</a>
          <?php endif; ?>
            
            
            
          </div>
        </div>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <?php if($_SESSION['user']['level'] == 'Administrator' || $_SESSION['user']['level'] == 'Guru'): ?>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbsensi" aria-expanded="true" aria-controls="collapseAbsensi">
          <i class="fas fa-fw fa-th-large"></i>
          <span>Data Presensi</span>
        </a>
        <div id="collapseAbsensi" class="collapse" aria-labelledby="headingAbsensi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="<?= base_url(); ?>akademik-absensi-siswa"><i class="fas fa-fw fa-check"></i> Presensi Siswa</a>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-rekap-absensi"><i class="fas fa-fw fa-check"></i> Rekap Presensi Siswa</a>
          </div>
        </div>
      </li>
          
      <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
      <!-- Nav Item - Tables -->
        <li class="nav-item active">
          <a class="nav-link" href="<?= base_url(); ?>akademik-pengumuman">
            <i class="fas fa-fw fa-tv"></i>
            <span>Pengumuman</span></a>
        </li>
      <?php endif; ?>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
          <i class="fas fa-fw fa-th-large"></i>
          <span>Laporan Nilai Siswa</span>
        </a>
        <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">            
            <a class="collapse-item" href="<?= base_url(); ?>akademik-input-nilai-uts"><i class="fas fa-fw fa-check"></i> Input Nilai UTS</a>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-input-nilai-rapor"><i class="fas fa-fw fa-check"></i> Input Nilai Rapor</a> 
          <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
            <a class="collapse-item" href="<?= base_url(); ?>akademik-input-nilai-extrakurikuler"><i class="fas fa-fw fa-check"></i> Input Nilai Extrakurikuler</a>          
            <a class="collapse-item" href="<?= base_url(); ?>cetak-rapor-uts"><i class="fas fa-fw fa-check"></i> Cetak Rapor UTS</a>
            <a class="collapse-item" href="<?= base_url(); ?>cetak-rapor"><i class="fas fa-fw fa-check"></i> Cetak Rapor</a>
          <?php endif; ?>
          </div>
        </div>
      </li>
      
      <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url(); ?>pengaturan-admin">
          <i class="fas fa-fw fa-cog"></i>
          <span>Pengaturan</span></a>
      </li>
      <?php endif; ?>
      <?php endif; ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <?php endif; ?>

    
