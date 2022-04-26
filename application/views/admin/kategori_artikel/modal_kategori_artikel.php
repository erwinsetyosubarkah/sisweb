<!-- Modal -->
<div class="modal fade" id="modalKategoriArtikel" tabindex="-1" role="dialog" aria-labelledby="modalKategoriArtikelLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalKategoriArtikelLabel">Judul Modal</h5>
        <button type="button" class="close batal-kategori-artikel" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-kategori-artikel">
            <input type="hidden" id="id_kategori_artikel" name="id_kategori_artikel">
            <div class="form-group">
                <label for="kategori">Kategori <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="kategori" name="kategori" class="form-control">
            </div>           

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-kategori-artikel" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalKategoriArtikel">Simpan</button>
      </div>
    </div>
  </div>
</div>


