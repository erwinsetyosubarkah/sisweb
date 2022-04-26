<!-- Modal -->
<div class="modal fade" id="modalRentangNilai" tabindex="-1" role="dialog" aria-labelledby="modalRentangNilaiLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalRentangNilaiLabel">Judul Modal</h5>
        <button type="button" class="close batal-rentang-nilai" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-rentang-nilai">
            <input type="hidden" id="id_rentang_nilai" name="id_rentang_nilai">
            <div class="form-group">
                <label for="dari_rentang_nilai">Dari <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="number" id="dari_rentang_nilai" name="dari_rentang_nilai" class="form-control">
            </div>
            <div class="form-group">
                <label for="sampai_rentang_nilai">Sampai <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="number" id="sampai_rentang_nilai" name="sampai_rentang_nilai" class="form-control">
            </div>
            <div class="form-group">
                <label for="predikat_rentang_nilai">Predikat <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="predikat_rentang_nilai" name="predikat_rentang_nilai" class="form-control">
            </div>
            <div class="form-group">
                <label for="keterangan_rentang_nilai">Keterangan <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="keterangan_rentang_nilai" name="keterangan_rentang_nilai" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-rentang-nilai" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalRentangNilai">Simpan</button>
      </div>
    </div>
  </div>
</div>


