<!-- Modal -->
<div class="modal fade" id="modalArtikel" tabindex="-1" role="dialog" aria-labelledby="modalArtikelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalArtikelLabel">Judul Modal</h5>
        <button type="button" class="close batal-artikel" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-artikel">
            <input type="hidden" id="id_artikel" name="id_artikel">            
            <?php $tgl=date('Y-m-d'); ?>
            <input type="hidden" id="tgl_upload" name="tgl_upload" value="<?= $tgl; ?>">
            <input type="hidden" id="id_author" name="id_author" value="<?= $_SESSION['user']['id_grup_pengguna']; ?>">
            <input type="hidden" id="level_author" name="level_author" value="<?= $_SESSION['user']['level']; ?>">
            <div class="form-group">
                <label for="judul_artikel">Judul <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="judul_artikel" name="judul_artikel" class="form-control">
            </div>
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <select id="kategori" name="kategori" class="form-control">
                   
                </select>
            </div>
            <div class="form-group">
                <label for="status_artikel">Status</label>
                <select id="status_artikel" name="status_artikel" class="form-control">
                    <option value="Umum">Umum</option>
                    <option value="Khusus">Khusus</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="gambar_sampul">Gambar Sampul</label><br>
                <div class="gambar-sampul-prev">
                  <img src="" alt="" style="height: 80px;" id="img_gambar_sampul">
                </div>
                <input type="hidden" id="gambar_sampul_lama" name="gambar_sampul_lama">
                <input type="file" id="gambar_sampul" name="gambar_sampul" class="form-control">
            </div>

            <div class="form-group">
                <textarea name="isi_artikel" id="isi_artikel" class="form-control ckeditor"></textarea>                        
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-artikel" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalArtikel">Simpan</button>
      </div>
    </div>
  </div>
</div>





