

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">                  
                  <h4 class="m-0 font-weight-bold text-white mb-4">Input Presensi</h4>                  
                </div>
                <div class="card-body overflow-scroll"> 
                  <div class="row mb-3">
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label class="mt-2">Tahun Pelajaran</label>
                        <input type="hidden" value="<?= $agenda_mengajar['id_agenda_mengajar']; ?>" id="id_agenda_mengajar">
                        <select id="id_tahun_pelajaran" class="form-control">
                          <option value="<?= $agenda_mengajar['id_tahun_pelajaran']; ?>"><?= $agenda_mengajar['tahun_pelajaran']; ?></option>
                        </select>                  
                      </div>  
                    </div>                    
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label class="mt-2">Semester</label>
                        <select id="id_semester" class="form-control">
                          <option value="<?= $agenda_mengajar['id_semester']; ?>"><?= $agenda_mengajar['semester']; ?></option>
                        </select>
                      </div>
                    </div>                  
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label class="mt-2">Kelas</label>
                        <select id="id_kelas" class="form-control">
                          <option value="<?= $agenda_mengajar['id_kelas']; ?>"><?= $agenda_mengajar['kelas']; ?></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-3 pl-4 pr-4">
                      <div class="form-group">
                        <label class="mt-2">Hari</label>
                        <input type="text" readonly="readonly" value="<?= $agenda_mengajar['hari_agenda_mengajar']; ?>" class="form-control">
                      </div>
                    </div>
                  </div>
                  <table class="table">                     
                    <div class="form-group">
                      <tr>
                        <td  width="200"><label>Tanggal</label></td>
                        <td>
                          <input type="text" readonly="readonly" value="<?= $agenda_mengajar['tanggal_agenda_mengajar']; ?>" class="form-control">                            
                        </td>
                      </tr>
                      <tr>
                        <td><label>Mata Pelajaran</label></td>
                        <td>
                          <input type="text" readonly="readonly" value="<?= $agenda_mengajar['tingkat']; ?> - <?= $agenda_mengajar['mata_pelajaran']; ?>" class="form-control">  
                        </td>
                      </tr>
                      <tr>
                        <td><label>Pertemuan Ke</label></td>
                        <td>
                          <input type="text" readonly="readonly" value="<?= $agenda_mengajar['pertemuan_ke_agenda_mengajar']; ?>" class="form-control">  
                        </td>
                      </tr>
                      <tr>
                        <td><label>Kompetensi Dasar</label></td>
                        <td>
                          <textarea readonly="readonly" class="form-control"><?= $agenda_mengajar['kode_kompetensi_dasar']; ?>. <?= $agenda_mengajar['kompetensi_dasar']; ?></textarea> 
                        </td>
                      </tr>
                      <tr>
                        <td><label>Materi</label></td>
                        <td>
                          <textarea readonly="readonly" class="form-control"><?= $agenda_mengajar['materi_agenda_mengajar']; ?></textarea> 
                        </td>
                      </tr>
                      <tr>
                        <td><label>Keterangan</label></td>
                        <td>
                          <input type="text" readonly="readonly" value="<?= $agenda_mengajar['keterangan_agenda_mengajar']; ?>" class="form-control">  
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
                              <th>Kehadiran</th> 
                              <th>Keterangan</th> 
                          </tr>
                        </thead>
                        
                      </table>
                    </div>
                    <button type="submit" id="btn-input-absensi" class="btn btn-primary mt-3">Simpan</button>
                    <a href="akademik-absensi-siswa" class="btn btn-secondary float-right mt-3">Kembali</a>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->




        <script type="text/javascript" src="<?=base_url('assets/js/absensi_siswa/input_absensi.js')?>"></script>
     

     

 