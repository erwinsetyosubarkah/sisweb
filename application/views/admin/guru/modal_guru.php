<!-- Modal -->
<div class="modal fade" id="modalGuru" tabindex="-1" role="dialog" aria-labelledby="modalGuruLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalGuruLabel">Judul Modal</h5>
        <button type="button" class="close batal-guru" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="halaman1-tab" data-toggle="tab" href="#halaman1" role="tab" aria-controls="halaman1" aria-selected="true">Halaman 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halaman2-tab" data-toggle="tab" href="#halaman2" role="tab" aria-controls="halaman2" aria-selected="false">Halaman 2</a>
          </li>
         
        </ul>
        
        <form action="" method="post" enctype="multipart/form-data" id="form-guru">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active pt-2" id="halaman1" role="tabpanel" aria-labelledby="halaman1-tab">
              <input type="hidden" id="id_guru" name="id_guru">
              <div class="form-group">
                  <label for="nik_guru">NIK <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                  <input type="hidden" id="nik_guru_lama" name="nik_guru_lama" class="form-control">
                  <input type="number" id="nik_guru" name="nik_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="nama_guru">Nama <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                  <input type="text" id="nama_guru" name="nama_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="jenis_kelamin_guru">Jenis Kelamin</label>
                  <select id="jenis_kelamin_guru" name="jenis_kelamin_guru" class="form-control">
                      <option value="Laki-laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="tempat_lahir_guru">Tempat Lahir</label>
                  <input type="text" id="tempat_lahir_guru" name="tempat_lahir_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="tanggal_lahir_guru">Tanggal Lahir</label>
                  <input type="date" id="tanggal_lahir_guru" name="tanggal_lahir_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="nuptk_guru">NUPTK</label>
                  <input type="text" id="nuptk_guru" name="nuptk_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="status_kepegawaian_guru">Status Kepegawaian</label>
                <select id="status_kepegawaian_guru" name="status_kepegawaian_guru" class="form-control">
                  <option value="">- Pilih Status Kepegawaian -</option>
                  <option value="Tenaga Honorer Sekolah">Tenaga Honorer Sekolah</option>
                  <option value="Guru Honorer Sekolah">Guru Honorer Sekolah</option>
                  <option value="PNS">PNS</option>
                  <option value="GTY/PTY">GTY/PTY</option>
                  <option value="GTT">GTT</option>
                </select>
              </div>
              <div class="form-group">
                  <label for="jenis_ptk_guru">Jenis PTK</label>
                  <select id="jenis_ptk_guru" name="jenis_ptk_guru" class="form-control">
                      <option value="">- Pilih Jenis PTK -</option>
                      <option value="Guru Mapel">Guru Mapel</option>
                      <option value="Guru BK">Guru BK</option>
                      <option value="Guru Kelas">Guru Kelas</option>
                      <option value="Tenaga Administrasi Sekolah">Tenaga Administrasi Sekolah</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="agama_guru">Agama</label>
                  <select id="agama_guru" name="agama_guru" class="form-control">
                      <option value="Islam">Islam</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Kristen Protestan">Kristen Protestan</option>
                      <option value="Kristen Katolik">Kristen Katolik</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="alamat_jalan_guru">Alamat Jalan</label>                  
                  <textarea id="alamat_jalan_guru" name="alamat_jalan_guru" class="form-control" cols="30" rows="2"></textarea>
              </div>              
              <div class="form-group">
                  <label for="rt_guru">RT</label>
                  <input type="number" id="rt_guru" name="rt_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="rw_guru">RW</label>
                  <input type="number" id="rw_guru" name="rw_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="nama_dusun_guru">Nama Dusun</label>
                  <input type="text" id="nama_dusun_guru" name="nama_dusun_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="desa_kelurahan_guru">Desa/Kelurahan</label>
                  <input type="text" id="desa_kelurahan_guru" name="desa_kelurahan_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kecamatan_guru">Kecamatan</label>
                  <input type="text" id="kecamatan_guru" name="kecamatan_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kabupaten_kota_guru">Kabupaten/Kota</label>
                  <input type="text" id="kabupaten_kota_guru" name="kabupaten_kota_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="provinsi_guru">Provinsi</label>
                  <input type="text" id="provinsi_guru" name="provinsi_guru" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kode_pos_guru">Kode Pos</label>
                  <input type="number" id="kode_pos_guru" name="kode_pos_guru" class="form-control">
              </div>
             
            </div>
            <div class="tab-pane fade pt-2" id="halaman2" role="tabpanel" aria-labelledby="halaman2-tab">
              <div class="form-group">
                  <label for="email_guru">Email</label>
                  <input type="email" id="email_guru" name="email_guru" class="form-control" placeholder="contoh@email.com">
              </div>
              <div class="form-group">
                  <label for="no_telp_guru">No Telp</label>
                  <input type="number" id="no_telp_guru" name="no_telp_guru" class="form-control" placeholder="087685xxxxx">
              </div>
              <div class="form-group">
                <label for="status_keaktifan_guru">Status Keaktifan</label>
                <select id="status_keaktifan_guru" name="status_keaktifan_guru" class="form-control">
                  <option value="Aktif">Aktif</option>
                  <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
              </div>
              <div class="form-group">
                <label for="sk_cpns_guru">SK CPNS</label>
                <input type="number" id="sk_cpns_guru" name="sk_cpns_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="tanggal_cpns_guru">Tanggal CPNS</label>
                <input type="date" id="tanggal_cpns_guru" name="tanggal_cpns_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="sk_pengangkatan_guru">SK Pengangkatan</label>
                <input type="text" id="sk_pengangkatan_guru" name="sk_pengangkatan_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="tmt_pengangkatan_guru">TMT Pengangkatan</label>
                <input type="text" id="tmt_pengangkatan_guru" name="tmt_pengangkatan_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="lembaga_pengangkatan_guru">Lembaga Pengangkatan</label>
                <input type="text" id="lembaga_pengangkatan_guru" name="lembaga_pengangkatan_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="golongan_guru">Golongan</label>
                <input type="text" id="golongan_guru" name="golongan_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="sumber_gaji_guru">Sumber Gaji</label>
                <input type="text" id="sumber_gaji_guru" name="sumber_gaji_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="nama_ibu_kandung_guru">Nama Ibu Kandung</label>
                <input type="text" id="nama_ibu_kandung_guru" name="nama_ibu_kandung_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="status_pernikahan_guru">Status Pernikahan</label>
                <select id="status_pernikahan_guru" name="status_pernikahan_guru" class="form-control">
                  <option value="">- Pilih Status Pernikahan -</option>
                  <option value="Nikah">Nikah</option>
                  <option value="Belum Nikah">Belum Nikah</option>
                </select>
              </div>
              <div class="form-group">
                <label for="nama_suami_istri_guru">Nama Suami/Istri</label>
                <input type="text" id="nama_suami_istri_guru" name="nama_suami_istri_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="nik_suami_istri_guru">NIK Suami/Istri</label>
                <input type="text" id="nik_suami_istri_guru" name="nik_suami_istri_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="pekerjaan_suami_istri_guru">Pekerjaan Suami/Istri</label>
                <input type="text" id="pekerjaan_suami_istri_guru" name="pekerjaan_suami_istri_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="tmt_pns_guru">TMT PNS</label>
                <input type="text" id="tmt_pns_guru" name="tmt_pns_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="npwp_guru">NPWP</label>
                <input type="text" id="npwp_guru" name="npwp_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="kewarganegaraan_guru">Kewarganegaraan</label>
                <input type="text" id="kewarganegaraan_guru" name="kewarganegaraan_guru" class="form-control">
              </div>
              <div class="form-group">
                <label for="jabatan_tambahan">Jabatan Tambahan</label>
                <select id="jabatan_tambahan" id="jabatan_tambahan" class="form-control">
                  <option value="">- Pilih Jabatan Tambahan -</option>
                  <option value="Waka Kurikulum">Waka Kurikulum</option>
                  <option value="Waka Kesiswaan">Waka Kesiswaan</option>
                </select>
              </div>
              <input type="hidden" id="level" id="level" value="Guru">
              <div class="form-group">
                  <label for="foto_guru">Foto</label><br>
                  <div class="foto-prev">
                    <img src="" alt="" style="height: 80px;" id="img_foto_guru">
                  </div>
                  <input type="hidden" id="foto_guru_lama" name="foto_guru_lama">
                  <input type="file" id="foto_guru" name="foto_guru" class="form-control">
              </div>
            </div>
          </div>            

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-guru" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalGuru">Simpan</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalDetailGuru" tabindex="-1" role="dialog" aria-labelledby="modalDetailGuruLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalDetailGuruLabel">Judul Modal</h5>
        <button type="button" class="close batal-detail-guru" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-2">
          <div class="col-lg-4"></div>
          <div class="col-lg-4 text-center shadow-sm mt-2">
            <img src="" height="100" alt="" id="img_foto_guru2" class="rounded">
            <h5 id="head_nama_guru2" ></h5>
          </div>
          <div class="col-lg-4"></div>
        </div>

        <ul class="nav nav-tabs" id="myTab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="halamandetail1-tab" data-toggle="tab" href="#halamandetail1" role="tab" aria-controls="halamandetail1" aria-selected="true">Halaman 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halamandetail2-tab" data-toggle="tab" href="#halamandetail2" role="tab" aria-controls="halamandetail2" aria-selected="false">Halaman 2</a>
          </li>
         
        </ul>
        <div class="tab-content" id="myTabContent2">
          <div class="tab-pane fade show active pt-2" id="halamandetail1" role="tabpanel" aria-labelledby="halamandetail1-tab">
            <div class="row">
              <div class="col-lg-6 text-right"><strong>NIK :</strong></div>
              <div class="col-lg-6"><p id="nik_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama :</strong></div>
              <div class="col-lg-6"><p id="nama_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Jenis Kelamin :</strong></div>
              <div class="col-lg-6"><p id="jenis_kelamin_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tempat Lahir :</strong></div>
              <div class="col-lg-6"><p id="tempat_lahir_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tanggal Lahir :</strong></div>
              <div class="col-lg-6"><p id="tanggal_lahir_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>NUPTK :</strong></div>
              <div class="col-lg-6"><p id="nuptk_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Status Kepegawaian :</strong></div>
              <div class="col-lg-6"><p id="status_kepegawaian_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Jenis PTK :</strong></div>
              <div class="col-lg-6"><p id="jenis_ptk_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Agama :</strong></div>
              <div class="col-lg-6"><p id="agama_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Alamat Jalan :</strong></div>
              <div class="col-lg-6"><p id="alamat_jalan_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>RT :</strong></div>
              <div class="col-lg-6"><p id="rt_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>RW :</strong></div>
              <div class="col-lg-6"><p id="rw_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama Dusun :</strong></div>
              <div class="col-lg-6"><p id="nama_dusun_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Desa/Kelurahan :</strong></div>
              <div class="col-lg-6"><p id="desa_kelurahan_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kecamatan :</strong></div>
              <div class="col-lg-6"><p id="kecamatan_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kabupaten/Kota :</strong></div>
              <div class="col-lg-6"><p id="kabupaten_kota_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Provinsi :</strong></div>
              <div class="col-lg-6"><p id="provinsi_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kode Pos :</strong></div>
              <div class="col-lg-6"><p id="kode_pos_guru2"></p></div>
            </div>
            
          </div>
          <div class="tab-pane fade show active pt-2" id="halamandetail2" role="tabpanel" aria-labelledby="halamandetail2-tab">
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Email :</strong></div>
              <div class="col-lg-6"><p id="email_guru2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nomor Telpon :</strong></div>
              <div class="col-lg-6"><p id="no_telp_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Status Keaktifan :</strong></div>
              <div class="col-lg-6"><p id="status_keaktifan_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>SK CPNS :</strong></div>
              <div class="col-lg-6"><p id="sk_cpns_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tanggal CPNS :</strong></div>
              <div class="col-lg-6"><p id="tanggal_cpns_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>SK Pengangkatan :</strong></div>
              <div class="col-lg-6"><p id="sk_pengangkatan_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>TMT Pengangkatan :</strong></div>
              <div class="col-lg-6"><p id="tmt_pengangkatan_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Lembaga Pengangkatan :</strong></div>
              <div class="col-lg-6"><p id="lembaga_pengangkatan_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Golongan :</strong></div>
              <div class="col-lg-6"><p id="golongan_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Sumber Gaji :</strong></div>
              <div class="col-lg-6"><p id="sumber_gaji_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama Ibu Kandung :</strong></div>
              <div class="col-lg-6"><p id="nama_ibu_kandung_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Status Pernikahan :</strong></div>
              <div class="col-lg-6"><p id="status_pernikahan_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama Suami/Istri :</strong></div>
              <div class="col-lg-6"><p id="nama_suami_istri_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>NIK Suami/Istri :</strong></div>
              <div class="col-lg-6"><p id="nik_suami_istri_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Pekerjaan Suami/Istri :</strong></div>
              <div class="col-lg-6"><p id="pekerjaan_suami_istri_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>TMT PNS :</strong></div>
              <div class="col-lg-6"><p id="tmt_pns_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>NPWP :</strong></div>
              <div class="col-lg-6"><p id="npwp_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kewarganegaraan :</strong></div>
              <div class="col-lg-6"><p id="kewarganegaraan_guru2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Jabatan Tambahan :</strong></div>
              <div class="col-lg-6"><p id="jabatan_tambahan2"></p></div>
            </div>   

            <div class="row">
              <div class="col-lg-6 text-right"><strong>Terakhir Login :</strong></div>
              <div class="col-lg-6"><p id="tgl_login2"></p></div>
            </div>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-detail-guru" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

