



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">                  
                  <h4 class="m-0 font-weight-bold text-white mb-4">Administrator</h4>
                </div>
                <div class="card-body overflow-scroll"> 
                  <div class="row">
                      <div class="col-lg-3">                   
                        <a href="" class="btn btn-success mb-3" data-toggle="modal" data-target="#modalAdministrator"  id="btn-tambahModal"><i class="fas fa-fw fa-plus"></i> Tambah Administrator</a>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group" style="margin-bottom:0;">
                          <form action="" method="post" enctype="multipart/form-data" id="form-import">
                            <table>
                              <tr>                                
                                <td>
                                  <input type="file" class="form-control" id="import_data" accept=".xls, .xlsx">
                                </td>
                                <td>
                                  <button type="submit" id="btn-import" class="btn btn-success">Import Excel</button>
                                </td>
                              </tr>
                            </table>
                          </form>
                        </div>
                    </div>
                    <div class="col-lg-3">
                      <a href="admin/administrator/downloadFormat" class="btn btn-success"><i class="fas fa-fw fa-file-excel"></i> Download Format Excel</a>
                    </div>
                  </div>
                    <div class="table-responsive">
                      <table class="table table-bordered nowrap" id="dataTable">
                        <thead>
                          <tr class="text-center bg-info text-white">
                              <th style="width: 90px;">No</th>
                              <th>NIK</th>
                              <th>Nama</th>
                              <th>Jenis Kelamin</th>
                              <th>Email</th>
                              <th>No Telp</th>
                              <th>Foto</th>
                              <th>Terakhir Login</th>                            
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
        <?php include "modal_administrator.php"; ?>

        <script type="text/javascript" src="<?=base_url('assets/js/administrator/administrator.js')?>"></script>
     

     

 