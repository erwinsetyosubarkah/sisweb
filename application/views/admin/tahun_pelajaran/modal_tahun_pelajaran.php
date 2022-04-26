<!-- Modal -->
<div class="modal fade" id="modalTahunPelajaran" tabindex="-1" role="dialog" aria-labelledby="modalTahunPelajaranLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalTahunPelajaranLabel">Judul Modal</h5>
        <button type="button" class="close batal-tahun-pelajaran" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-tahun-pelajaran">
            <input type="hidden" id="id_tahun_pelajaran" name="id_tahun_pelajaran">
            <div class="form-group">
                <label for="tahun_pelajaran">Tahun Pelajaran <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="tahun_pelajaran" name="tahun_pelajaran" class="form-control">
            </div>           
            <div class="form-group">
                <label for="status_tahun_pelajaran">Status</label>                
                <select id="status_tahun_pelajaran" name="status_tahun_pelajaran" class="form-control">
                  <option value="0">Tidak Aktif</option>
                  <option value="1">Aktif</option>
                </select>
            </div>           

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-tahun-pelajaran" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalTahunPelajaran">Simpan</button>
      </div>
    </div>
  </div>
</div>


