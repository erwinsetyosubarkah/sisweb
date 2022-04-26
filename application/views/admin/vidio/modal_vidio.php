<!-- Modal -->
<div class="modal fade" id="modalVidio" tabindex="-1" role="dialog" aria-labelledby="modalVidioLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalVidioLabel">Judul Modal</h5>
        <button type="button" class="close batal-vidio" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-vidio">
            <input type="hidden" id="id_vidio" name="id_vidio">
            <?php $tgl=date('Y-m-d'); ?>
            <input type="hidden" id="tgl_upload_vidio" name="tgl_upload_vidio" value="<?= $tgl; ?>">
            <input type="hidden" id="id_author_vidio" name="id_author_vidio" value="<?= $_SESSION['user']['id_grup_pengguna']; ?>">
            <input type="hidden" id="level_author_vidio" name="level_author_vidio" value="<?= $_SESSION['user']['level']; ?>">
            <div class="form-group">
                <label for="judul_vidio">Judul Vidio <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="judul_vidio" name="judul_vidio" class="form-control">
            </div>           
            <div class="form-group">
                <label for="url_vidio">URL Vidio <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="url" id="url_vidio" name="url_vidio" class="form-control" placeholder="Contoh => https://www.youtube.com/watch?v=4-gUrHMNa2Y">
            </div>           

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-vidio" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalVidio">Simpan</button>
      </div>
    </div>
  </div>
</div>


