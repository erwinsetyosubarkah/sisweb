



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">                  
                  <h4 class="m-0 font-weight-bold text-white mb-4">Kategori Artikel</h4>                  
                </div>
                <div class="card-body overflow-scroll"> 
                  <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalKategoriArtikel"  id="btn-tambahModal"><i class="fas fa-fw fa-plus"></i> Tambah Kategori</a>
                   
                    <div class="table-responsive">
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 20px;">No</th>
                              <th>Kategori</th>                                                         
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
        <?php include "modal_kategori_artikel.php"; ?>

        <script type="text/javascript" src="<?=base_url('assets/js/kategori_artikel/kategori_artikel.js')?>"></script>
     

     

 