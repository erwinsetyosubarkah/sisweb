



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
                  <div class="row mb-3">
                                   
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label for="id_kelas" class="mt-2">Kelas</label>
                        <select name="id_kelas" id="id_kelas" class="form-control">
                          <?php foreach($kelas as $kls): ?>
                            <option value="<?= $kls['id_kelas'] ?>"><?= $kls['kelas'] ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>                    
                  </div>
                                    
                    <div class="table-responsive">
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 20px;">No</th>                                                                                      
                              <th>Mata Pelajaran</th>                                                     
                              <th>Guru</th>                                       
                              <th style="width: 150px;">Aksi</th>
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




        <script type="text/javascript" src="<?=base_url('assets/js/rekap_absensi/mapel_absensi.js')?>"></script>
     

     

 