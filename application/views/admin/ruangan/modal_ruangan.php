<!-- Modal -->
<div class="modal fade" id="modalRuangan" tabindex="-1" role="dialog" aria-labelledby="modalRuanganLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalRuanganLabel">Judul Modal</h5>
        <button type="button" class="close batal-ruangan" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-ruangan">
            <input type="hidden" id="id_ruangan" name="id_ruangan">            
            
            <div class="form-group">
                <label for="nama_ruangan">Nama Ruangan <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="nama_ruangan" name="nama_ruangan" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_gedung">Nama Gedung</label>
                <select id="nama_gedung" name="nama_gedung" class="form-control">
                   
                </select>
            </div>
            <div class="form-group">
                <label for="kapasitas_belajar_ruangan">Kapasitas Belajar</label>
                <input type="number" id="kapasitas_belajar_ruangan" name="kapasitas_belajar_ruangan" class="form-control">
            </div>
            <div class="form-group">
                <label for="kapasitas_ujian_ruangan">Kapasitas Ujian</label>
                <input type="number" id="kapasitas_ujian_ruangan" name="kapasitas_ujian_ruangan" class="form-control">
            </div>            

            <div class="form-group">
                <label for="keterangan_ruangan">Keterangan</label>
                <textarea name="keterangan_ruangan" id="keterangan_ruangan" class="form-control"></textarea>                        
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-ruangan" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalRuangan">Simpan</button>
      </div>
    </div>
  </div>
</div>





