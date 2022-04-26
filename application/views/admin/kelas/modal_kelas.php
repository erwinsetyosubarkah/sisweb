<!-- Modal -->
<div class="modal fade" id="modalKelas" tabindex="-1" role="dialog" aria-labelledby="modalKelasLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalKelasLabel">Judul Modal</h5>
        <button type="button" class="close batal-kelas" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-kelas">
            <input type="hidden" id="id_kelas" name="id_kelas">            
            
            <div class="form-group">
                <label for="id_tingkat">Tingkat</label>
                <select id="id_tingkat" name="id_tingkat" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="id_ruangan">Ruangan</label>
                <select id="id_ruangan" name="id_ruangan" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="id_guru">Wali Kelas</label>
                <select id="id_guru" name="id_guru" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="kelas" name="kelas" class="form-control">               
            </div>
            

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-kelas" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalKelas">Simpan</button>
      </div>
    </div>
  </div>
</div>





