



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                  <h4 class="m-0 font-weight-bold text-white">Kompetensi Dasar</h4>
                </div>
                <div class="card-body overflow-scroll">
                    <div class="row">
                      <div class="col-lg-3 pt-4">
                        <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalKompetensiDasar"  id="btn-tambahModal"><i class="fas fa-fw fa-plus"></i> Tambah Kompetensi Dasar</a>
                      </div>
                      <div class="col-lg-2 form-group">                        
                        <label for="id_tingkat">Tingkat</label>
                        <select name="id_tingkat" id="id_tingkat" class="form-control"></select>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 90px;">No</th>
                              <th>Mata Pelajaran</th>
                              <th>Kode Kompetensi Dasar</th>
                              <th>Jenis Kompetensi Dasar</th>
                              <th>Kompetensi Dasar</th>
                              <th>Aksi</th>
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
        <?php include "modal_kompetensi_dasar.php"; ?>

        <script type="text/javascript" src="<?=base_url('assets/js/kompetensi_dasar/kompetensi_dasar.js')?>"></script>
     

     

 