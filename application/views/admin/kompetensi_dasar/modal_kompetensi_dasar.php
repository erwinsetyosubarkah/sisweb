<!-- Modal -->
<div class="modal fade" id="modalKompetensiDasar" tabindex="-1" role="dialog" aria-labelledby="modalKompetensiDasarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalKompetensiDasarLabel">Judul Modal</h5>
        <button type="button" class="close batal-kompetensi-dasar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-kompetensi-dasar">
            <input type="hidden" id="id_kompetensi_dasar" name="id_kompetensi_dasar">            
            
            <div class="form-group">
                <label for="id_mata_pelajaran">Mata Pelajaran <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <select id="id_mata_pelajaran" name="id_mata_pelajaran" class="form-control"></select>
            </div>
            
            <div class="form-group">
                <label for="kode_kompetensi_dasar">Kode Kompetensi Dasar <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="kode_kompetensi_dasar" name="kode_kompetensi_dasar" class="form-control" placeholder="Contoh: 3.1">
            </div>
             
            <div class="form-group">
                <label for="jenis_kompetensi_dasar">Jenis Kompetensi Dasar</label>
                <select id="jenis_kompetensi_dasar" name="jenis_kompetensi_dasar" class="form-control">
                   <option value="Pengetahuan">Pengetahuan</option>
                   <option value="Keterampilan">Keterampilan</option>
                </select>
            </div>           

            <div class="form-group">
                <label for="kompetensi_dasar">Kompetensi Dasar <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <textarea name="kompetensi_dasar" id="kompetensi_dasar" class="form-control" ></textarea>                    
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-kompetensi-dasar" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalKompetensiDasar">Simpan</button>
      </div>
    </div>
  </div>
</div>





