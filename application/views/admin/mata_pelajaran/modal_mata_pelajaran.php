<!-- Modal -->
<div class="modal fade" id="modalMataPelajaran" tabindex="-1" role="dialog" aria-labelledby="modalMataPelajaranLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalMataPelajaranLabel">Judul Modal</h5>
        <button type="button" class="close batal-mata-pelajaran" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-mata-pelajaran">
            <input type="hidden" id="id_mata_pelajaran" name="id_mata_pelajaran">
            <div class="form-group">
                <label for="mata_pelajaran">Mata Pelajaran <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="mata_pelajaran" name="mata_pelajaran" class="form-control">
            </div>
            <div class="form-group">
                <label for="id_tingkat">Tingkat <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <select id="id_tingkat" name="id_tingkat" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="id_guru">Guru <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <select id="id_guru" name="id_guru" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="kkm_mata_pelajaran">KKM <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="kkm_mata_pelajaran" name="kkm_mata_pelajaran" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-mata-pelajaran" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalMataPelajaran">Simpan</button>
      </div>
    </div>
  </div>
</div>


