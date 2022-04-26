<!-- Modal -->
<div class="modal fade" id="modalJadwalPelajaran" tabindex="-1" role="dialog" aria-labelledby="modalJadwalPelajaranLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalJadwalPelajaranLabel">Judul Modal</h5>
        <button type="button" class="close batal-jadwal-pelajaran" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-jadwal-pelajaran">
            <input type="hidden" id="id_jadwal_pelajaran" name="id_jadwal_pelajaran">
            <div class="form-group">
              <label for="hari_jadwal_pelajaran" class="mt-2">Hari</label>
              <select name="hari_jadwal_pelajaran" id="hari_jadwal_pelajaran" class="form-control">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
              </select>
            </div>
            <div class="form-group">
              <label for="jam_ke_jadwal_pelajaran" class="mt-2">Jam Ke</label>
              <select name="jam_ke_jadwal_pelajaran" id="jam_ke_jadwal_pelajaran" class="form-control">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
              </select>
            </div>
            <div class="form-group">
                <label for="id_mata_pelajaran">Mata Pelajaran <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <select id="id_mata_pelajaran" name="id_mata_pelajaran" class="form-control">
                </select>
            </div>
            <div class="form-group">
                <label for="mulai_jadwal_pelajaran">Mulai <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="time" id="mulai_jadwal_pelajaran" name="mulai_jadwal_pelajaran" class="form-control">
                </input>
            </div>
            <div class="form-group">
                <label for="selesai_jadwal_pelajaran">Selesai <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="time" id="selesai_jadwal_pelajaran" name="selesai_jadwal_pelajaran" class="form-control">
                </input>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-jadwal-pelajaran" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalJadwalPelajaran">Simpan</button>
      </div>
    </div>
  </div>
</div>


