
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                  <h4 class="m-0 font-weight-bold text-white">Dasbor</h4>                  
                </div>                
                <div class="card-body">
                  <!-- Content Row -->
                  <div class="row">

                    <!-- Jumlah Siswa Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <a href="#" class="card-link">
                        <div class="card border-left-primary shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Siswa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_siswa; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>

                    <!-- Jumlah Guru Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <a href="#" class="card-link">
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Guru</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_guru; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>

                    <!-- Jumlah Ekskul Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <a href="#" class="card-link">
                        <div class="card border-left-info shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Rombel</div>
                                <div class="row no-gutters align-items-center">
                                  <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $jml_kelas; ?></div>
                                  </div>
                                  <div class="col">
                                    <div class="progress progress-sm mr-2">
                                      <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-university fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>

                    <!-- Rombel Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                      <a href="#" class="card-link">
                        <div class="card border-left-warning shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Pengumuman</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jml_pengumuman; ?></div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                    </div>
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
                </div>
                <div class="card-body">
                  <?php foreach($pengumuman['dt_pengumuman'] as $pg): ?>
                        <div class="card border-left-success shadow h-100 py-2 mb-3">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h6><?= $pg['judul_pengumuman'];  ?></h6></div>
                                <div class="row">
                                  <div class="col-lg-4"><small>Dibuat: <?= date('d-m-Y', strtotime($pg['tgl_upload']));  ?></small></div>
                                </div>
                                <p><?= $pg['isi_pengumuman'];  ?></p>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                    <?php endforeach; ?>
                   
                    <?php $page = $pengumuman['page']; ?>
                    <?php $jml_page = $pengumuman['jml_page']; ?>
                    <nav aria-label="...">
                      <ul class="pagination">
                   
                      <?php if($page == 1){ ?>
                          <li class="page-item disabled">
                      <?php }else{ ?>
                          <li class="page-item">
                      <?php } ?>
                              <a href="?page=<?php echo $page - 1; ?>" class="page-link">Sebelumnya</a>
                          </li>
                          <?php for($i=1;$i <= $jml_page;$i++){ ?>
                          <?php if($i == $page){ ?>
                          <li class="page-item active">
                          <?php }else{ ?>
                          <li class="page-item">
                          <?php } ?>
                              <a href="?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                          </li>
                          <?php } ?>
                          <?php if($page == $jml_page){ ?>
                          <li class="page-item disabled">
                          <?php }else{ ?>
                          <li class="page-item">
                          <?php } ?>
                              <a href="?page=<?php echo $page + 1; ?>" class="page-link">Berikutnya</a>
                          </li>
                      </ul>
                  </nav>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

     

        <script type="text/javascript" src="<?=base_url('assets/js/beranda/beranda.js')?>"></script>

 