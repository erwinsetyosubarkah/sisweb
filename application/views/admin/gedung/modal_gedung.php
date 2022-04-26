<!-- Modal -->
<div class="modal fade" id="modalGedung" tabindex="-1" role="dialog" aria-labelledby="modalGedungLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalGedungLabel">Judul Modal</h5>
        <button type="button" class="close batal-gedung" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-gedung">
            <input type="hidden" id="id_gedung" name="id_gedung">
            <div class="form-group">
                <label for="nama_gedung">Nama Gedung <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="nama_gedung" name="nama_gedung" class="form-control">
            </div>
            <div class="form-group">
                <label for="jumlah_lantai_gedung">Jumlah Lantai</label>
                <input type="number" id="jumlah_lantai_gedung" name="jumlah_lantai_gedung" class="form-control">
            </div>
            <div class="form-group">
                <label for="panjang_gedung">Panjang (meter)</label>
                <input type="number" id="panjang_gedung" name="panjang_gedung" class="form-control">
            </div>
            <div class="form-group">
                <label for="tinggi_gedung">Tinggi (meter)</label>
                <input type="number" id="tinggi_gedung" name="tinggi_gedung" class="form-control">
            </div>
            <div class="form-group">
                <label for="lebar_gedung">Lebar (meter)</label>
                <input type="number" id="lebar_gedung" name="lebar_gedung" class="form-control">
            </div>
            <div class="form-group">
                <label for="keterangan_gedung">Keterangan</label>
                <textarea id="keterangan_gedung" name="keterangan_gedung" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-gedung" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalGedung">Simpan</button>
      </div>
    </div>
  </div>
</div>


