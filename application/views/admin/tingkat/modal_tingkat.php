<!-- Modal -->
<div class="modal fade" id="modalTingkat" tabindex="-1" role="dialog" aria-labelledby="modalTingkatLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalTingkatLabel">Judul Modal</h5>
        <button type="button" class="close batal-tingkat" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-tingkat">
            <input type="hidden" id="id_tingkat" name="id_tingkat">
            <div class="form-group">
                <label for="tingkat">Tingkat <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="tingkat" name="tingkat" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-tingkat" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalTingkat">Simpan</button>
      </div>
    </div>
  </div>
</div>


