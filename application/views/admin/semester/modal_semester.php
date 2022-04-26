<!-- Modal -->
<div class="modal fade" id="modalSemester" tabindex="-1" role="dialog" aria-labelledby="modalSemesterLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalSemesterLabel">Judul Modal</h5>
        <button type="button" class="close batal-semester" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-semester">
            <input type="hidden" id="id_semester" name="id_semester">
            <div class="form-group">
                <label for="semester">Semester <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="semester" name="semester" class="form-control">
            </div>           
            <div class="form-group">
                <label for="status_semester">Status</label>                
                <select id="status_semester" name="status_semester" class="form-control">
                  <option value="0">Tidak Aktif</option>
                  <option value="1">Aktif</option>
                </select>
            </div>           

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-semester" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalSemester">Simpan</button>
      </div>
    </div>
  </div>
</div>


