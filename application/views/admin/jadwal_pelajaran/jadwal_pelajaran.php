



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">                  
                  <h4 class="m-0 font-weight-bold text-white mb-4">Jadwal Pelajaran</h4>                  
                </div>
                <div class="card-body overflow-scroll"> 
                  <div class="row mb-3">
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label for="id_tahun_pelajaran" class="mt-2">Tahun Pelajaran</label>
                        <select name="id_tahun_pelajaran" id="id_tahun_pelajaran" class="form-control">
                          <?php foreach($tahun_pelajaran as $tp): ?>
                            <option value="<?= $tp['id_tahun_pelajaran'] ?>"><?= $tp['tahun_pelajaran'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>  
                    </div>                    
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label for="id_semester" class="mt-2">Semester</label>
                        <select name="id_semester" id="id_semester" class="form-control">
                          <?php foreach($semester as $sm): ?>
                            <option value="<?= $sm['id_semester'] ?>"><?= $sm['semester'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>                  
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label for="id_kelas" class="mt-2">Kelas</label>
                        <?php if($_SESSION['user']['level'] == 'Siswa'): ?>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                          <?php foreach($kelas as $kls): ?>
                            <?php if($kls['id_kelas'] == $_SESSION['user']['id_kelas']): ?>
                              <option value="<?= $kls['id_kelas'] ?>"><?= $kls['kelas'] ?></option>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        <?php else: ?>
                        <select name="id_kelas" id="id_kelas" class="form-control">                        
                          <?php foreach($kelas as $kls): ?>
                            <option value="<?= $kls['id_kelas'] ?>"><?= $kls['kelas'] ?></option>
                          <?php endforeach; ?>
                        <?php endif; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label for="hari_jadwal_pelajaran2" class="mt-2">Hari</label>
                        <select name="hari_jadwal_pelajaran2" id="hari_jadwal_pelajaran2" class="form-control">
                          <option value="">- Semua Hari -</option>
                          <option value="Senin">Senin</option>
                          <option value="Selasa">Selasa</option>
                          <option value="Rabu">Rabu</option>
                          <option value="Kamis">Kamis</option>
                          <option value="Jumat">Jumat</option>
                          <option value="Sabtu">Sabtu</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <?php if($_SESSION['user']['level'] == 'Administrator'): ?>
                    <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalJadwalPelajaran"  id="btn-tambahModal"><i class="fas fa-fw fa-plus"></i> Tambah Jadwal Pelajaran</a>
                  <?php endif; ?>
                 
                   
                    <div class="table-responsive">
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 20px;">No</th>
                              <th>Tahun Pelajaran</th>                                                        
                              <th>Semester</th>                                                        
                              <th>Gedung</th>                                                        
                              <th>Ruangan</th>                                                        
                              <th>Kelas</th>                                                        
                              <th>Hari</th>                                                        
                              <th>Jam Ke</th>                                                        
                              <th>Mata Pelajaran</th>                                                        
                              <th>Guru</th>                                                        
                              <th>Mulai</th>                                                        
                              <th>Selesai</th> 
                              <?php if($_SESSION['user']['level'] == 'Administrator'): ?>                                                      
                                <th style="width: 150px;">Aksi</th>
                              <?php endif; ?>
                          </tr>
                        </thead>
                        
                      </table>
                    </div>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->


        <!-- modal  -->
        <?php include "modal_jadwal_pelajaran.php"; ?>

        <script type="text/javascript" src="<?=base_url('assets/js/jadwal_pelajaran/jadwal_pelajaran.js')?>"></script>
     

     

 