<!-- Modal -->
<div class="modal fade" id="modalFoto" tabindex="-1" role="dialog" aria-labelledby="modalFotoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalFotoLabel">Judul Modal</h5>
        <button type="button" class="close batal-foto" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-foto">
            <input type="hidden" id="id_foto" name="id_foto">
            <?php $tgl=date('Y-m-d'); ?>
            <input type="hidden" id="tgl_upload_foto" name="tgl_upload_foto" value="<?= $tgl; ?>">
            <input type="hidden" id="id_author_foto" name="id_author_foto" value="<?= $_SESSION['user']['id_grup_pengguna']; ?>">
            <input type="hidden" id="level_author_foto" name="level_author_foto" value="<?= $_SESSION['user']['level']; ?>">
            <div class="form-group">
                <label for="judul_foto">Judul <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="judul_foto" name="judul_foto" class="form-control">
            </div>           
           
            <div class="form-group">
                <label for="foto">Foto</label><br>
                <div class="foto-prev">
                  <img src="" alt="" style="height: 80px;" id="img_foto">
                </div>
                <input type="hidden" id="foto_lama" name="foto_lama">
                <input type="file" id="foto" name="foto" class="form-control">
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-foto" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalFoto">Simpan</button>
      </div>
    </div>
  </div>
</div>





