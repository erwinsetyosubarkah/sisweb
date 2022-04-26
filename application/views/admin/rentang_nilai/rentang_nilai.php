



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">                  
                  <h4 class="m-0 font-weight-bold text-white mb-4">Rentang Nilai</h4>                  
                </div>
                <div class="card-body overflow-scroll"> 
                  <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalRentangNilai"  id="btn-tambahModal"><i class="fas fa-fw fa-plus"></i> Tambah Rentang Nilai</a>
                   
                    <div class="table-responsive">
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 20px;">No</th>
                              <th>Dari</th>                                                        
                              <th>Sampai</th>                                                        
                              <th>Predikat</th>                                                        
                              <th>Keterangan</th>                                                        
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


        <!-- modal  -->
        <?php include "modal_rentang_nilai.php"; ?>

        <script type="text/javascript" src="<?=base_url('assets/js/rentang_nilai/rentang_nilai.js')?>"></script>
     

     

 