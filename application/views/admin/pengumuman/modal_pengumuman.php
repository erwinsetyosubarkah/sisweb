<!-- Modal -->
<div class="modal fade" id="modalPengumuman" tabindex="-1" role="dialog" aria-labelledby="modalPengumumanLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalPengumumanLabel">Judul Modal</h5>
        <button type="button" class="close batal-pengumuman" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-pengumuman">
            <input type="hidden" id="id_pengumuman" name="id_pengumuman">            
            <?php $tgl=date('Y-m-d'); ?>
            <input type="hidden" id="tgl_upload" name="tgl_upload" value="<?= $tgl; ?>">
            <input type="hidden" id="id_author" name="id_author" value="<?= $_SESSION['user']['id_grup_pengguna']; ?>">
            <input type="hidden" id="level_author" name="level_author" value="<?= $_SESSION['user']['level']; ?>">
            <div class="form-group">
                <label for="judul_pengumuman">Judul <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="judul_pengumuman" name="judul_pengumuman" class="form-control">
            </div>
            
           

            <div class="form-group">
                <textarea name="isi_pengumuman" id="isi_pengumuman" class="form-control ckeditor"></textarea>                        
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-pengumuman" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalPengumuman">Simpan</button>
      </div>
    </div>
  </div>
</div>





