



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                  <h4 class="m-0 font-weight-bold text-white">Artikel</h4>
                </div>
                <div class="card-body overflow-scroll">
                    <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalArtikel"  id="btn-tambahModal"><i class="fas fa-fw fa-plus"></i> Tambah Artikel</a>
                    <div class="table-responsive">
                   
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 90px;">No</th>
                              <th>Judul</th>
                              <th>Kategori</th>
                              <th>Status</th>
                              <th>Tanggal Upload</th>
                              <th>Sampul</th>
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
        <?php include "modal_artikel.php"; ?>

        <script type="text/javascript" src="<?=base_url('assets/js/artikel/artikel.js')?>"></script>
     

     

 