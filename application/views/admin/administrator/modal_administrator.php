<!-- Modal -->
<div class="modal fade" id="modalAdministrator" tabindex="-1" role="dialog" aria-labelledby="modalAdministratorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalAdministratorLabel">Judul Modal</h5>
        <button type="button" class="close batal-administrator" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <form action="" method="post" enctype="multipart/form-data" id="form-administrator">
            <input type="hidden" id="id_administrator" name="id_administrator">
            <div class="form-group">
                <label for="nik_administrator">NIK <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="hidden" id="nik_administrator_lama" name="nik_administrator_lama" class="form-control">
                <input type="text" id="nik_administrator" name="nik_administrator" class="form-control">
            </div>
            <div class="form-group">
                <label for="nama_administrator">Nama <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                <input type="text" id="nama_administrator" name="nama_administrator" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin_administrator">Jenis Kelamin</label>
                <select id="jenis_kelamin_administrator" name="jenis_kelamin_administrator" class="form-control">
                    <option value="Laki-laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="email_administrator">Email</label>
                <input type="email" id="email_administrator" name="email_administrator" class="form-control" placeholder="contoh@email.com">
            </div>
            <div class="form-group">
                <label for="no_telp_administrator">No Telp</label>
                <input type="number" id="no_telp_administrator" name="no_telp_administrator" class="form-control" placeholder="087685xxxxx">
            </div>
            <div class="form-group">
                <label for="alamat_administrator">Alamat</label>
                <textarea id="alamat_administrator" name="alamat_administrator" class="form-control"></textarea>
            </div>
            <input type="hidden" id="jabatan_tambahan" id="jabatan_tambahan" value="">
            <input type="hidden" id="level" id="level" value="Administrator">
            <div class="form-group">
                <label for="foto_administrator">Foto</label><br>
                <div class="foto-prev">
                  <img src="" alt="" style="height: 80px;" id="img_foto_administrator">
                </div>
                <input type="hidden" id="foto_administrator_lama" name="foto_administrator_lama">
                <input type="file" id="foto_administrator" name="foto_administrator" class="form-control">
            </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-administrator" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalAdm">Simpan</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalDetailAdministrator" tabindex="-1" role="dialog" aria-labelledby="modalDetailAdministratorLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalDetailAdministratorLabel">Judul Modal</h5>
        <button type="button" class="close batal-detail-administrator" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-2">
          <div class="col-lg-4"></div>
          <div class="col-lg-4 text-center shadow-sm mt-2">
            <img src="" height="100" alt="" id="img_foto_administrator2" class="rounded">
            <h5 id="head_nama_administrator2" ></h5>
          </div>
          <div class="col-lg-4"></div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right"><strong>NIK :</strong></div>
          <div class="col-lg-6"><p id="nik_administrator2"></p></div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right"><strong>Nama :</strong></div>
          <div class="col-lg-6"><p id="nama_administrator2"></p></div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right"><strong>Jenis Kelamin :</strong></div>
          <div class="col-lg-6"><p id="jenis_kelamin_administrator2"></p></div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right"><strong>Email :</strong></div>
          <div class="col-lg-6"><p id="email_administrator2"></p></div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right"><strong>Nomor Telpon :</strong></div>
          <div class="col-lg-6"><p id="no_telp_administrator2"></p></div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right"><strong>Alamat :</strong></div>
          <div class="col-lg-6"><p id="alamat_administrator2"></p></div>
        </div>
        <div class="row">
          <div class="col-lg-6 text-right"><strong>Terakhir Login :</strong></div>
          <div class="col-lg-6"><p id="tgl_login2"></p></div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-detail-administrator" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

