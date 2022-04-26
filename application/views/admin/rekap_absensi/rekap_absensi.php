
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">                  
                  <h4 class="m-0 font-weight-bold text-white mb-4">Rekap Presensi</h4>                  
                </div>
                <div class="card-body overflow-scroll"> 
                  
                  <table class="table">                     
                    <div class="form-group">
                      <tr>
                        <td  width="200"><label>Kelas</label></td>
                        <td>
                          <input type="text" readonly="readonly" value="<?= $kelas1['kelas']; ?>" class="form-control">                            
                        </td>
                      </tr>
                      <tr>
                        <td><label>Mata Pelajaran</label></td>
                        <td>
                          <input type="hidden" id="id_kelas" value="<?= $kelas1['id_kelas']; ?>">
                          <input type="hidden" id="id_mata_pelajaran" value="<?= $mata_pelajaran1['id_mata_pelajaran']; ?>">
                          
                          <input type="text" readonly="readonly" value="<?= $mata_pelajaran1['tingkat']; ?> - <?= $mata_pelajaran1['mata_pelajaran']; ?>" class="form-control">  
                        </td>
                      </tr>
                      <tr>
                        <td><label>Guru</label></td>
                        <td>
                          <input type="text" readonly="readonly" value="<?= $mata_pelajaran1['nama_guru']; ?>" class="form-control">  
                        </td>
                      </tr>
                    
                    </div>
                  </table>
                                    
                    <div class="table-responsive">
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 20px;">No</th>
                              <th>NIS</th>                                                        
                              <th>NISN</th>                                                      
                              <th>Nama Siswa</th>                                                        
                              <th>Jenis Kelamin</th>                                                        
                              <th>Pertemuan</th> 
                              <th>Hadir</th> 
                              <th>Sakit</th> 
                              <th>Ijin</th> 
                              <th>Alpa</th> 
                              <th>% Kehadiran</th> 
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




        <script type="text/javascript" src="<?=base_url('assets/js/rekap_absensi/rekap_absensi.js')?>"></script>
     

     

 