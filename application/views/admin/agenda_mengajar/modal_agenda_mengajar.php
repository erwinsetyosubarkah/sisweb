<!-- Modal -->
<div class="modal fade" id="modalAgendaMengajar" tabindex="-1" role="dialog" aria-labelledby="modalAgendaMengajarLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalAgendaMengajarLabel">Judul Modal</h5>
        <button type="button" class="close batal-agenda-mengajar" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-agenda-mengajar">
            <input type="hidden" id="id_agenda_mengajar" name="id_agenda_mengajar">

            <div class="form-group">
                <label for="id_mata_pelajaran">Mata Pelajran <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <select id="id_mata_pelajaran" name="id_mata_pelajaran" class="form-control"> 
                <?php foreach ($mata_pelajaran as $mtp): ?>
                  <option value="<?= $mtp['id_mata_pelajaran']; ?>"><?= $mtp['tingkat'].' - '.$mtp['mata_pelajaran']; ?></option>  
                  <?php endforeach; ?>               
                </select>
            </div>
            <div class="form-group">
                <label for="id_kompetensi_dasar">Kompetensi Dasar <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <select id="id_kompetensi_dasar" name="id_kompetensi_dasar" class="form-control">                  
                </select>
            </div>

            <div class="form-group">
              <label for="hari_agenda_mengajar" class="mt-2">Hari</label>
              <select name="hari_agenda_mengajar" id="hari_agenda_mengajar" class="form-control">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
              </select>
            </div>
            <div class="form-group">
                <label for="tanggal_agenda_mengajar">Tanggal <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="date" id="tanggal_agenda_mengajar" name="tanggal_agenda_mengajar" class="form-control">
                </input>
            </div>
            <div class="form-group">
              <label for="pertemuan_ke_agenda_mengajar" class="mt-2">Pertemuan Ke <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
              <input type="number" name="pertemuan_ke_agenda_mengajar" id="pertemuan_ke_agenda_mengajar" class="form-control">                
            </div>
            <div class="form-group">
                <label for="materi_agenda_mengajar">Materi </label>
                <textarea id="materi_agenda_mengajar" name="materi_agenda_mengajar" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="keterangan_agenda_mengajar">Keterangan <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <select id="keterangan_agenda_mengajar" name="keterangan_agenda_mengajar" class="form-control">
                  <option value="Harian UTS">Harian UTS</option>
                  <option value="UTS">UTS</option>
                  <option value="Harian Semester">Harian Semester</option>
                  <option value="Semester">Semester</option>
                </select>
            </div>
            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-agenda-mengajar" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalAgendaMengajar">Simpan</button>
      </div>
    </div>
  </div>
</div>


