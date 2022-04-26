<!-- Modal -->
<div class="modal fade" id="modalSlider" tabindex="-1" role="dialog" aria-labelledby="modalSliderLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalSliderLabel">Judul Modal</h5>
        <button type="button" class="close batal-slider" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-slider">
            <input type="hidden" id="id_slider" name="id_slider">
            <?php $tgl=date('Y-m-d'); ?>
            <input type="hidden" id="tgl_upload_slider" name="tgl_upload_slider" value="<?= $tgl; ?>">
            <input type="hidden" id="id_author_slider" name="id_author_slider" value="<?= $_SESSION['user']['id_grup_pengguna']; ?>">
            <input type="hidden" id="level_author_slider" name="level_author_slider" value="<?= $_SESSION['user']['level']; ?>">
            <div class="form-group">
                <label for="judul_slider">Judul <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="judul_slider" name="judul_slider" class="form-control">
            </div>           
           
            <div class="form-group">
                <label for="slider">Slider</label><br>
                <div class="slider-prev">
                  <img src="" alt="" style="height: 80px;" id="img_slider">
                </div>
                <input type="hidden" id="slider_lama" name="slider_lama">
                <input type="file" id="slider" name="slider" class="form-control">
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-slider" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalSlider">Simpan</button>
      </div>
    </div>
  </div>
</div>





