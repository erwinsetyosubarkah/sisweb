<!-- Modal -->
<div class="modal fade" id="modalSiswa" tabindex="-1" role="dialog" aria-labelledby="modalSiswaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalSiswaLabel">Judul Modal</h5>
        <button type="button" class="close batal-siswa" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="halaman1-tab" data-toggle="tab" href="#halaman1" role="tab" aria-controls="halaman1" aria-selected="true">Siswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halaman2-tab" data-toggle="tab" href="#halaman2" role="tab" aria-controls="halaman2" aria-selected="false">Data Ayah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halaman3-tab" data-toggle="tab" href="#halaman3" role="tab" aria-controls="halaman3" aria-selected="false">Data Ibu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halaman4-tab" data-toggle="tab" href="#halaman4" role="tab" aria-controls="halaman4" aria-selected="false">Data Wali</a>
          </li>
         
        </ul>
        
        <form action="" method="post" enctype="multipart/form-data" id="form-siswa">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active pt-2" id="halaman1" role="tabpanel" aria-labelledby="halaman1-tab">
              <input type="hidden" id="id_siswa" name="id_siswa">
              <div class="form-group">
                  <label for="nis_siswa">NIS <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                  <input type="hidden" id="nis_siswa_lama" name="nis_siswa_lama" class="form-control">
                  <input type="number" id="nis_siswa" name="nis_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="nisn_siswa">NISN </label>
                  <input type="text" id="nisn_siswa" name="nisn_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="nama_siswa">Nama <span class="text-danger">*</span><sup style="color: red; font-size: 9px;">wajib diisi</sup></label>
                  <input type="text" id="nama_siswa" name="nama_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="jenis_kelamin_siswa">Jenis Kelamin</label>
                  <select id="jenis_kelamin_siswa" name="jenis_kelamin_siswa" class="form-control">
                      <option value="Laki-laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="tempat_lahir_siswa">Tempat Lahir</label>
                  <input type="text" id="tempat_lahir_siswa" name="tempat_lahir_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="tanggal_lahir_siswa">Tanggal Lahir</label>
                  <input type="date" id="tanggal_lahir_siswa" name="tanggal_lahir_siswa" class="form-control">
              </div>
              
              <div class="form-group">
                  <label for="agama_siswa">Agama</label>
                  <select id="agama_siswa" name="agama_siswa" class="form-control">
                      <option value="Islam">Islam</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Kristen Protestan">Kristen Protestan</option>
                      <option value="Kristen Katolik">Kristen Katolik</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="kebutuhan_khusus_siswa">Kebutuhan Khusus</label>
                  <select id="kebutuhan_khusus_siswa" name="kebutuhan_khusus_siswa" class="form-control">
                      <option value="">- Pilih Kebutuhan Khusus -</option>
                      <option value="Autis">Autis</option>
                      <option value="Bakat Istimewa">Bakat Istimewa</option>
                      <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                      <option value="Down Sindrome">Down Sindrome</option>
                      <option value="Hiper Aktif">Hiper Aktif</option>
                      <option value="Indigo">Indigo</option>
                      <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                      <option value="Lainnya">Lainnya</option>
                      <option value="Tidak">Tidak</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="alamat_jalan_siswa">Alamat Jalan</label>                  
                  <textarea id="alamat_jalan_siswa" name="alamat_jalan_siswa" class="form-control" cols="30" rows="2"></textarea>
              </div>              
              <div class="form-group">
                  <label for="rt_siswa">RT</label>
                  <input type="number" id="rt_siswa" name="rt_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="rw_siswa">RW</label>
                  <input type="number" id="rw_siswa" name="rw_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="nama_dusun_siswa">Nama Dusun</label>
                  <input type="text" id="nama_dusun_siswa" name="nama_dusun_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="desa_kelurahan_siswa">Desa/Kelurahan</label>
                  <input type="text" id="desa_kelurahan_siswa" name="desa_kelurahan_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kecamatan_siswa">Kecamatan</label>
                  <input type="text" id="kecamatan_siswa" name="kecamatan_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kabupaten_kota_siswa">Kabupaten/Kota</label>
                  <input type="text" id="kabupaten_kota_siswa" name="kabupaten_kota_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="provinsi_siswa">Provinsi</label>
                  <input type="text" id="provinsi_siswa" name="provinsi_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kode_pos_siswa">Kode Pos</label>
                  <input type="number" id="kode_pos_siswa" name="kode_pos_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="jenis_tinggal_siswa">Jenis Tinggal</label>
                  <select id="jenis_tinggal_siswa" name="jenis_tinggal_siswa" class="form-control">
                      <option value="">- Pilih Jenis Tinggal -</option>
                      <option value="Milik Sendiri">Milik Sendiri</option>
                      <option value="Kontrakan">Kontrakan</option>
                      <option value="Lainnya">Lainnya</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="alat_transportasi_siswa">Alat Transportasi</label>
                  <select id="alat_transportasi_siswa" name="alat_transportasi_siswa" class="form-control">
                      <option value="">- Pilih Alat Transportasi -</option>
                      <option value="Jalan Kaki">Jalan Kaki</option>
                      <option value="Kendaraan Umum">Kendaraan Umum</option>
                      <option value="Sepeda Motor">Sepeda Motor</option>
                      <option value="Sepeda">Sepeda</option>
                      <option value="Lainnya">Lainnya</option>
                  </select>
              </div>
             
              <div class="form-group">
                  <label for="email_siswa">Email</label>
                  <input type="email" id="email_siswa" name="email_siswa" class="form-control" placeholder="contoh@email.com">
              </div>
              <div class="form-group">
                  <label for="no_telp_siswa">No Telp</label>
                  <input type="number" id="no_telp_siswa" name="no_telp_siswa" class="form-control" placeholder="087685xxxxx">
              </div>
              <div class="form-group">
                  <label for="skhun_siswa">SKHUN</label>
                  <input type="text" id="skhun_siswa" name="skhun_siswa" class="form-control">
              </div>
              <div class="form-group">
                <label for="kewarganegaraan_siswa">Kewarganegaraan</label>
                <input type="text" id="kewarganegaraan_siswa" name="kewarganegaraan_siswa" class="form-control">
              </div>
              <div class="form-group">
                <label for="kelas">Kelas</label>
                <select id="kelas" name="kelas" class="form-control">
                    
                </select>
              </div>
              <input type="hidden" id="jabatan_tambahan" id="jabatan_tambahan" value="">
              <input type="hidden" id="level" id="level" value="Siswa">
              <div class="form-group">
                  <label for="foto_siswa">Foto</label><br>
                  <div class="foto-prev">
                    <img src="" alt="" style="height: 80px;" id="img_foto_siswa">
                  </div>
                  <input type="hidden" id="foto_siswa_lama" name="foto_siswa_lama">
                  <input type="file" id="foto_siswa" name="foto_siswa" class="form-control">
              </div>
            </div>
            <div class="tab-pane fade pt-2" id="halaman2" role="tabpanel" aria-labelledby="halaman2-tab">
              <div class="form-group">
                  <label for="nama_ayah_siswa">Nama Ayah</label>
                  <input type="text" id="nama_ayah_siswa" name="nama_ayah_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="tahun_lahir_ayah_siswa">Tahun Lahir Ayah</label>
                  <input type="number" id="tahun_lahir_ayah_siswa" name="tahun_lahir_ayah_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="pendidikan_ayah_siswa">Pendidikan Ayah</label>
                  <input type="text" id="pendidikan_ayah_siswa" name="pendidikan_ayah_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="pekerjaan_ayah_siswa">Pekerjaan Ayah</label>
                  <input type="text" id="pekerjaan_ayah_siswa" name="pekerjaan_ayah_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="penghasilan_ayah_siswa">Penghasilan Ayah</label>
                  <input type="number" id="penghasilan_ayah_siswa" name="penghasilan_ayah_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kebutuhan_khusus_ayah_siswa">Kebutuhan Khusus Ayah</label>
                  <select id="kebutuhan_khusus_ayah_siswa" name="kebutuhan_khusus_ayah_siswa" class="form-control">
                      <option value="">- Pilih Kebutuhan Khusus -</option>
                      <option value="Autis">Autis</option>
                      <option value="Bakat Istimewa">Bakat Istimewa</option>
                      <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                      <option value="Down Sindrome">Down Sindrome</option>
                      <option value="Hiper Aktif">Hiper Aktif</option>
                      <option value="Indigo">Indigo</option>
                      <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                      <option value="Lainnya">Lainnya</option>
                      <option value="Tidak">Tidak</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="no_telp_ayah_siswa">No Telp Ayah</label>
                  <input type="number" id="no_telp_ayah_siswa" name="no_telp_ayah_siswa" class="form-control">
              </div>
            </div>
            <div class="tab-pane fade pt-2" id="halaman3" role="tabpanel" aria-labelledby="halaman3-tab">
              <div class="form-group">
                  <label for="nama_ibu_siswa">Nama Ibu</label>
                  <input type="text" id="nama_ibu_siswa" name="nama_ibu_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="tahun_lahir_ibu_siswa">Tahun Lahir Ibu</label>
                  <input type="number" id="tahun_lahir_ibu_siswa" name="tahun_lahir_ibu_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="pendidikan_ibu_siswa">Pendidikan Ibu</label>
                  <input type="text" id="pendidikan_ibu_siswa" name="pendidikan_ibu_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="pekerjaan_ibu_siswa">Pekerjaan Ibu</label>
                  <input type="text" id="pekerjaan_ibu_siswa" name="pekerjaan_ibu_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="penghasilan_ibu_siswa">Penghasilan Ibu</label>
                  <input type="number" id="penghasilan_ibu_siswa" name="penghasilan_ibu_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="kebutuhan_khusus_ibu_siswa">Kebutuhan Khusus Ibu</label>
                  <select id="kebutuhan_khusus_ibu_siswa" name="kebutuhan_khusus_ibu_siswa" class="form-control">
                      <option value="">- Pilih Kebutuhan Khusus -</option>
                      <option value="Autis">Autis</option>
                      <option value="Bakat Istimewa">Bakat Istimewa</option>
                      <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                      <option value="Down Sindrome">Down Sindrome</option>
                      <option value="Hiper Aktif">Hiper Aktif</option>
                      <option value="Indigo">Indigo</option>
                      <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                      <option value="Lainnya">Lainnya</option>
                      <option value="Tidak">Tidak</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="no_telp_ibu_siswa">No Telp Ibu</label>
                  <input type="number" id="no_telp_ibu_siswa" name="no_telp_ibu_siswa" class="form-control">
              </div>
            </div>
            <div class="tab-pane fade pt-2" id="halaman4" role="tabpanel" aria-labelledby="halaman4-tab">
              <div class="form-group">
                  <label for="nama_wali_siswa">Nama Wali</label>
                  <input type="text" id="nama_wali_siswa" name="nama_wali_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="tahun_lahir_wali_siswa">Tahun Lahir Wali</label>
                  <input type="number" id="tahun_lahir_wali_siswa" name="tahun_lahir_wali_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="pendidikan_wali_siswa">Pendidikan Wali</label>
                  <input type="text" id="pendidikan_wali_siswa" name="pendidikan_wali_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="pekerjaan_wali_siswa">Pekerjaan Wali</label>
                  <input type="text" id="pekerjaan_wali_siswa" name="pekerjaan_wali_siswa" class="form-control">
              </div>
              <div class="form-group">
                  <label for="penghasilan_wali_siswa">Penghasilan Wali</label>
                  <input type="number" id="penghasilan_wali_siswa" name="penghasilan_wali_siswa" class="form-control">
              </div>
              
              <div class="form-group">
                  <label for="no_telp_wali_siswa">No Telp Wali</label>
                  <input type="number" id="no_telp_wali_siswa" name="no_telp_wali_siswa" class="form-control">
              </div>
            </div>
          </div>            

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-siswa" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary" id="btn-modalSiswa">Simpan</button>
      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="modalDetailSiswa" tabindex="-1" role="dialog" aria-labelledby="modalDetailSiswaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalDetailSiswaLabel">Judul Modal</h5>
        <button type="button" class="close batal-detail-siswa" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="text-white">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-2">
          <div class="col-lg-4"></div>
          <div class="col-lg-4 text-center shadow-sm mt-2">
            <img src="" height="100" alt="" id="img_foto_siswa2" class="rounded">
            <h5 id="head_nama_siswa2" ></h5>
          </div>
          <div class="col-lg-4"></div>
        </div>

        <ul class="nav nav-tabs" id="myTab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="halamandetail1-tab" data-toggle="tab" href="#halamandetail1" role="tab" aria-controls="halamandetail1" aria-selected="true">Siswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halamandetail2-tab" data-toggle="tab" href="#halamandetail2" role="tab" aria-controls="halamandetail2" aria-selected="false">Data Ayah</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halamandetail3-tab" data-toggle="tab" href="#halamandetail3" role="tab" aria-controls="halamandetail3" aria-selected="false">Data Ibu</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="halamandetail4-tab" data-toggle="tab" href="#halamandetail4" role="tab" aria-controls="halamandetail4" aria-selected="false">Data Wali</a>
          </li>
         
        </ul>
        <div class="tab-content" id="myTabContent2">
          <div class="tab-pane fade show active pt-2" id="halamandetail1" role="tabpanel" aria-labelledby="halamandetail1-tab">          
            <div class="row">
              <div class="col-lg-6 text-right"><strong>NIS :</strong></div>
              <div class="col-lg-6"><p id="nis_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>NISN :</strong></div>
              <div class="col-lg-6"><p id="nisn_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama :</strong></div>
              <div class="col-lg-6"><p id="nama_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Jenis Kelamin :</strong></div>
              <div class="col-lg-6"><p id="jenis_kelamin_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tempat Lahir :</strong></div>
              <div class="col-lg-6"><p id="tempat_lahir_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tanggal Lahir :</strong></div>
              <div class="col-lg-6"><p id="tanggal_lahir_siswa2"></p></div>
            </div>           
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Agama :</strong></div>
              <div class="col-lg-6"><p id="agama_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kebutuhan Khusus :</strong></div>
              <div class="col-lg-6"><p id="kebutuhan_khusus_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Alamat Jalan :</strong></div>
              <div class="col-lg-6"><p id="alamat_jalan_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>RT :</strong></div>
              <div class="col-lg-6"><p id="rt_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>RW :</strong></div>
              <div class="col-lg-6"><p id="rw_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama Dusun :</strong></div>
              <div class="col-lg-6"><p id="nama_dusun_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Desa/Kelurahan :</strong></div>
              <div class="col-lg-6"><p id="desa_kelurahan_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kecamatan :</strong></div>
              <div class="col-lg-6"><p id="kecamatan_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kabupaten/Kota :</strong></div>
              <div class="col-lg-6"><p id="kabupaten_kota_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Provinsi :</strong></div>
              <div class="col-lg-6"><p id="provinsi_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kode Pos :</strong></div>
              <div class="col-lg-6"><p id="kode_pos_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Jenis Tinggal :</strong></div>
              <div class="col-lg-6"><p id="jenis_tinggal_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Alat Transportasi :</strong></div>
              <div class="col-lg-6"><p id="alat_transportasi_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Email :</strong></div>
              <div class="col-lg-6"><p id="email_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nomor Telpon :</strong></div>
              <div class="col-lg-6"><p id="no_telp_siswa2"></p></div>
            </div>   
            
            <div class="row">
              <div class="col-lg-6 text-right"><strong>SKHUN :</strong></div>
              <div class="col-lg-6"><p id="skhun_siswa2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kewarganegaraan :</strong></div>
              <div class="col-lg-6"><p id="kewarganegaraan_siswa2"></p></div>
            </div>   
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kelas :</strong></div>
              <div class="col-lg-6"><p id="kelas2"></p></div>
            </div>   

            <div class="row">
              <div class="col-lg-6 text-right"><strong>Terakhir Login :</strong></div>
              <div class="col-lg-6"><p id="tgl_login2"></p></div>
            </div>
          </div>
          <div class="tab-pane fade show active pt-2" id="halamandetail2" role="tabpanel" aria-labelledby="halamandetail2-tab">
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama Ayah :</strong></div>
              <div class="col-lg-6"><p id="nama_ayah_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tahun Lahir :</strong></div>
              <div class="col-lg-6"><p id="tahun_lahir_ayah_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Pendidikan :</strong></div>
              <div class="col-lg-6"><p id="pendidikan_ayah_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Pekerjaan :</strong></div>
              <div class="col-lg-6"><p id="pekerjaan_ayah_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Penghasilan :</strong></div>
              <div class="col-lg-6"><p id="penghasilan_ayah_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kebutuhan Khusus :</strong></div>
              <div class="col-lg-6"><p id="kebutuhan_khusus_ayah_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>No Telp :</strong></div>
              <div class="col-lg-6"><p id="no_telp_ayah_siswa2"></p></div>
            </div> 
          </div>
          <div class="tab-pane fade show active pt-2" id="halamandetail3" role="tabpanel" aria-labelledby="halamandetail3-tab">
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama Ibu :</strong></div>
              <div class="col-lg-6"><p id="nama_ibu_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tahun Lahir :</strong></div>
              <div class="col-lg-6"><p id="tahun_lahir_ibu_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Pendidikan :</strong></div>
              <div class="col-lg-6"><p id="pendidikan_ibu_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Pekerjaan :</strong></div>
              <div class="col-lg-6"><p id="pekerjaan_ibu_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Penghasilan :</strong></div>
              <div class="col-lg-6"><p id="penghasilan_ibu_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Kebutuhan Khusus :</strong></div>
              <div class="col-lg-6"><p id="kebutuhan_khusus_ibu_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>No Telp :</strong></div>
              <div class="col-lg-6"><p id="no_telp_ibu_siswa2"></p></div>
            </div> 
          </div>
          <div class="tab-pane fade show active pt-2" id="halamandetail3" role="tabpanel" aria-labelledby="halamandetail3-tab">
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Nama Wali :</strong></div>
              <div class="col-lg-6"><p id="nama_wali_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Tahun Lahir :</strong></div>
              <div class="col-lg-6"><p id="tahun_lahir_wali_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Pendidikan :</strong></div>
              <div class="col-lg-6"><p id="pendidikan_wali_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Pekerjaan :</strong></div>
              <div class="col-lg-6"><p id="pekerjaan_wali_siswa2"></p></div>
            </div> 
            <div class="row">
              <div class="col-lg-6 text-right"><strong>Penghasilan :</strong></div>
              <div class="col-lg-6"><p id="penghasilan_wali_siswa2"></p></div>
            </div>
            <div class="row">
              <div class="col-lg-6 text-right"><strong>No Telp :</strong></div>
              <div class="col-lg-6"><p id="no_telp_wali_siswa2"></p></div>
            </div> 
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary batal-detail-siswa" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

