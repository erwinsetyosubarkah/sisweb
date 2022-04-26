



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-4">

              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                  <h4 class="m-0 font-weight-bold text-white">Struktur</h4>
                </div>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <div class="toolbar-container"></div>
                        <div class="content-container">
                            <textarea name="struktur" id="struktur" class="form-control ckeditor"><?= $tentang_sekolah['struktur']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <button id="simpan" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                </div>
              </div>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <script type="text/javascript" src="<?=base_url('assets/js/struktur/struktur.js')?>"></script>
     

     

 