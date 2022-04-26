const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {



        $('#btn-tambahModal').on('click', function () {
            $('#modalSiswaLabel').html('Tambah Siswa');
            $('#btn-modalSiswa').html('Tambah');
            getKelas();

        });

        $('.batal-siswa').on('click', function () {
            clearURL($('#foto_siswa'));
        });


        $('#foto_siswa').change(function () {
            readURL(this);
        });

        $('#btn-modalSiswa').on('click', function (e) {
            e.preventDefault();

            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });




        dataTable = $('#dataTable').DataTable({
            "language": {
                "url": baseurl + "assets/sbadmin/vendor/datatables/Indonesian.json",
                "sEmptyTable": "Tidak ada data di database"
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                url: "admin/siswa/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 7, 10],
                "orderable": false,
            }, { "targets": [0, 1, 2, 4, 5, 6, 7, 8, 9, 10], "className": 'text-center' }]
        });


        $('#btn-import').on('click', function (e) {
            e.preventDefault();
            let import_data = $('#import_data').prop('files')[0];

            // simpan data dalam bentuk object dengan nama data
            let data = new FormData();
            data.append('import_data', import_data);

            $.ajax({
                //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
                url: 'admin/siswa/importData',
                type: 'POST',
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'JSON',
                success: function (responsdata) {
                    alertData(responsdata.status, responsdata.title, responsdata.pesan);
                    $('#import_data').val('');

                    //refresh table
                    dataTable.ajax.reload();
                }
            });

        });


    });

});


function getKelas() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/siswa/getKelas',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#kelas').html(responsdata);
        }
    });
}



function clearURL(input) {
    var txt = '<img src="" alt="" style="height: 80px;" id="img_foto_siswa">';
    $('.foto-prev').html(txt);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto_siswa').attr('src', '');
        }

        reader.readAsDataURL(input.files[0]);
    }
    $('#form-siswa').trigger('reset');
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto_siswa').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}





function tambah() {

    // ambil data dari elemen html
    const nis_siswa = $('#nis_siswa').val();
    const nisn_siswa = $('#nisn_siswa').val();
    const nama_siswa = $('#nama_siswa').val();
    const jenis_kelamin_siswa = $('#jenis_kelamin_siswa').val();
    const tempat_lahir_siswa = $('#tempat_lahir_siswa').val();
    const tanggal_lahir_siswa = $('#tanggal_lahir_siswa').val();
    const agama_siswa = $('#agama_siswa').val();
    const kebutuhan_khusus_siswa = $('#kebutuhan_khusus_siswa').val();
    const alamat_jalan_siswa = $('#alamat_jalan_siswa').val();
    const rt_siswa = $('#rt_siswa').val();
    const rw_siswa = $('#rw_siswa').val();
    const nama_dusun_siswa = $('#nama_dusun_siswa').val();
    const desa_kelurahan_siswa = $('#desa_kelurahan_siswa').val();
    const kecamatan_siswa = $('#kecamatan_siswa').val();
    const kabupaten_kota_siswa = $('#kabupaten_kota_siswa').val();
    const provinsi_siswa = $('#provinsi_siswa').val();
    const kode_pos_siswa = $('#kode_pos_siswa').val();
    const jenis_tinggal_siswa = $('#jenis_tinggal_siswa').val();
    const alat_transportasi_siswa = $('#alat_transportasi_siswa').val();
    const email_siswa = $('#email_siswa').val();
    const no_telp_siswa = $('#no_telp_siswa').val();
    const skhun_siswa = $('#skhun_siswa').val();
    const id_kelas = $('#kelas').val();
    const kewarganegaraan_siswa = $('#kewarganegaraan_siswa').val();
    const jabatan_tambahan = $('#jabatan_tambahan').val();
    const level = $('#level').val();
    const foto_siswa = $('#foto_siswa').prop('files')[0];
    const nama_ayah_siswa = $('#nama_ayah_siswa').val();
    const tahun_lahir_ayah_siswa = $('#tahun_lahir_ayah_siswa').val();
    const pendidikan_ayah_siswa = $('#pendidikan_ayah_siswa').val();
    const pekerjaan_ayah_siswa = $('#pekerjaan_ayah_siswa').val();
    const penghasilan_ayah_siswa = $('#penghasilan_ayah_siswa').val();
    const kebutuhan_khusus_ayah_siswa = $('#kebutuhan_khusus_ayah_siswa').val();
    const no_telp_ayah_siswa = $('#no_telp_ayah_siswa').val();
    const nama_ibu_siswa = $('#nama_ibu_siswa').val();
    const tahun_lahir_ibu_siswa = $('#tahun_lahir_ibu_siswa').val();
    const pendidikan_ibu_siswa = $('#pendidikan_ibu_siswa').val();
    const pekerjaan_ibu_siswa = $('#pekerjaan_ibu_siswa').val();
    const penghasilan_ibu_siswa = $('#penghasilan_ibu_siswa').val();
    const kebutuhan_khusus_ibu_siswa = $('#kebutuhan_khusus_ibu_siswa').val();
    const no_telp_ibu_siswa = $('#no_telp_ibu_siswa').val();
    const nama_wali_siswa = $('#nama_wali_siswa').val();
    const tahun_lahir_wali_siswa = $('#tahun_lahir_wali_siswa').val();
    const pendidikan_wali_siswa = $('#pendidikan_wali_siswa').val();
    const pekerjaan_wali_siswa = $('#pekerjaan_wali_siswa').val();
    const penghasilan_wali_siswa = $('#penghasilan_wali_siswa').val();
    const no_telp_wali_siswa = $('#no_telp_wali_siswa').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('nis_siswa', nis_siswa);
    data.append('nisn_siswa', nisn_siswa);
    data.append('nama_siswa', nama_siswa);
    data.append('jenis_kelamin_siswa', jenis_kelamin_siswa);
    data.append('tempat_lahir_siswa', tempat_lahir_siswa);
    data.append('tanggal_lahir_siswa', tanggal_lahir_siswa);
    data.append('agama_siswa', agama_siswa);
    data.append('kebutuhan_khusus_siswa', kebutuhan_khusus_siswa);
    data.append('alamat_jalan_siswa', alamat_jalan_siswa);
    data.append('rt_siswa', rt_siswa);
    data.append('rw_siswa', rw_siswa);
    data.append('nama_dusun_siswa', nama_dusun_siswa);
    data.append('desa_kelurahan_siswa', desa_kelurahan_siswa);
    data.append('kecamatan_siswa', kecamatan_siswa);
    data.append('kabupaten_kota_siswa', kabupaten_kota_siswa);
    data.append('provinsi_siswa', provinsi_siswa);
    data.append('kode_pos_siswa', kode_pos_siswa);
    data.append('jenis_tinggal_siswa', jenis_tinggal_siswa);
    data.append('alat_transportasi_siswa', alat_transportasi_siswa);
    data.append('email_siswa', email_siswa);
    data.append('no_telp_siswa', no_telp_siswa);
    data.append('skhun_siswa', skhun_siswa);
    data.append('id_kelas', id_kelas);
    data.append('kewarganegaraan_siswa', kewarganegaraan_siswa);
    data.append('jabatan_tambahan', jabatan_tambahan);
    data.append('level', level);
    data.append('foto_siswa', foto_siswa);
    data.append('nama_ayah_siswa', nama_ayah_siswa);
    data.append('tahun_lahir_ayah_siswa', tahun_lahir_ayah_siswa);
    data.append('pendidikan_ayah_siswa', pendidikan_ayah_siswa);
    data.append('pekerjaan_ayah_siswa', pekerjaan_ayah_siswa);
    data.append('penghasilan_ayah_siswa', penghasilan_ayah_siswa);
    data.append('kebutuhan_khusus_ayah_siswa', kebutuhan_khusus_ayah_siswa);
    data.append('no_telp_ayah_siswa', no_telp_ayah_siswa);
    data.append('nama_ibu_siswa', nama_ibu_siswa);
    data.append('tahun_lahir_ibu_siswa', tahun_lahir_ibu_siswa);
    data.append('pendidikan_ibu_siswa', pendidikan_ibu_siswa);
    data.append('pekerjaan_ibu_siswa', pekerjaan_ibu_siswa);
    data.append('penghasilan_ibu_siswa', penghasilan_ibu_siswa);
    data.append('kebutuhan_khusus_ibu_siswa', kebutuhan_khusus_ibu_siswa);
    data.append('no_telp_ibu_siswa', no_telp_ibu_siswa);
    data.append('nama_wali_siswa', nama_wali_siswa);
    data.append('tahun_lahir_wali_siswa', tahun_lahir_wali_siswa);
    data.append('pendidikan_wali_siswa', pendidikan_wali_siswa);
    data.append('pekerjaan_wali_siswa', pekerjaan_wali_siswa);
    data.append('penghasilan_wali_siswa', penghasilan_wali_siswa);
    data.append('no_telp_wali_siswa', no_telp_wali_siswa);

    let arr_field = [nis_siswa, nama_siswa];
    let arr_name = ["NIS", "Nama"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/siswa/tambah',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);
            //reset isi form
            clearURL($('#foto_siswa'));
            // tutup modal
            $('#modalSiswa').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function cekValidasiForm(data, name) {
    let pesan_validasi = '';
    let feedback = '';
    for (var i = 0; i < data.length; i++) {
        if (data[i] == '') {
            pesan_validasi = 'Data ' + name[i] + ' tidak boleh kosong.';
        }
    }

    if (pesan_validasi != '') {
        alertData('error', 'Validasi Gagal...!', pesan_validasi);
        feedback = 'gagal';
    }
    return feedback;

}


//fungsi untuk mengeset value pada modal ubah
function btnModalUbah(level, id_siswa, nis_siswa) {
    getKelas();
    $('#modalSiswaLabel').html('Ubah Siswa');
    $('#btn-modalSiswa').html('Ubah');

    let data = new FormData();
    data.append('level', level);
    data.append('id_siswa', id_siswa);
    data.append('nis_siswa', nis_siswa);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/siswa/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_siswa').val(responsdata.id_siswa);
            $('#nis_siswa').val(responsdata.nis_siswa);
            $('#nis_siswa_lama').val(responsdata.nis_siswa);
            $('#nisn_siswa').val(responsdata.nisn_siswa);
            $('#nama_siswa').val(responsdata.nama_siswa);
            $('#jenis_kelamin_siswa').val(responsdata.jenis_kelamin_siswa).trigger();
            $('#tempat_lahir_siswa').val(responsdata.tempat_lahir_siswa);
            $('#tanggal_lahir_siswa').val(responsdata.tanggal_lahir_siswa);
            $('#agama_siswa').val(responsdata.agama_siswa);
            $('#kebutuhan_khusus_siswa').val(responsdata.kebutuhan_khusus_siswa);
            $('#alamat_jalan_siswa').val(responsdata.alamat_jalan_siswa);
            $('#rt_siswa').val(responsdata.rt_siswa);
            $('#rw_siswa').val(responsdata.rw_siswa);
            $('#nama_dusun_siswa').val(responsdata.nama_dusun_siswa);
            $('#desa_kelurahan_siswa').val(responsdata.desa_kelurahan_siswa);
            $('#kecamatan_siswa').val(responsdata.kecamatan_siswa);
            $('#kabupaten_kota_siswa').val(responsdata.kabupaten_kota_siswa);
            $('#provinsi_siswa').val(responsdata.provinsi_siswa);
            $('#kode_pos_siswa').val(responsdata.kode_pos_siswa);
            $('#jenis_tinggal_siswa').val(responsdata.jenis_tinggal_siswa);
            $('#alat_transportasi_siswa').val(responsdata.alat_transportasi_siswa);
            $('#email_siswa').val(responsdata.email_siswa);
            $('#no_telp_siswa').val(responsdata.no_telp_siswa);
            $('#skhun_siswa').val(responsdata.skhun_siswa);
            $('#kelas').val(responsdata.id_kelas).trigger();
            $('#kewarganegaraan_siswa').val(responsdata.kewarganegaraan_siswa);
            $('#jabatan_tambahan').val(responsdata.jabatan_tambahan);
            $('#level').val(responsdata.level);
            $('#foto_siswa_lama').val(responsdata.foto_siswa);
            $('#img_foto_siswa').attr('src').val(responsdata.baseurl + 'assets/img/foto/' + responsdata.foto_siswa);
            $('#nama_ayah_siswa').val(responsdata.nama_ayah_siswa);
            $('#tahun_lahir_ayah_siswa').val(responsdata.tahun_lahir_ayah_siswa);
            $('#pendidikan_ayah_siswa').val(responsdata.pendidikan_ayah_siswa);
            $('#pekerjaan_ayah_siswa').val(responsdata.pekerjaan_ayah_siswa);
            $('#penghasilan_ayah_siswa').val(responsdata.penghasilan_ayah_siswa);
            $('#kebutuhan_khusus_ayah_siswa').val(responsdata.kebutuhan_khusus_ayah_siswa);
            $('#no_telp_ayah_siswa').val(responsdata.no_telp_ayah_siswa);
            $('#nama_ibu_siswa').val(responsdata.nama_ibu_siswa);
            $('#tahun_lahir_ibu_siswa').val(responsdata.tahun_lahir_ibu_siswa);
            $('#pendidikan_ibu_siswa').val(responsdata.pendidikan_ibu_siswa);
            $('#pekerjaan_ibu_siswa').val(responsdata.pekerjaan_ibu_siswa);
            $('#penghasilan_ibu_siswa').val(responsdata.penghasilan_ibu_siswa);
            $('#kebutuhan_khusus_ibu_siswa').val(responsdata.kebutuhan_khusus_ibu_siswa);
            $('#no_telp_ibu_siswa').val(responsdata.no_telp_ibu_siswa);
            $('#nama_wali_siswa').val(responsdata.nama_wali_siswa);
            $('#tahun_lahir_wali_siswa').val(responsdata.tahun_lahir_wali_siswa);
            $('#pendidikan_wali_siswa').val(responsdata.pendidikan_wali_siswa);
            $('#pekerjaan_wali_siswa').val(responsdata.pekerjaan_wali_siswa);
            $('#penghasilan_wali_siswa').val(responsdata.penghasilan_wali_siswa);
            $('#no_telp_wali_siswa').val(responsdata.no_telp_wali_siswa);
        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_siswa = $('#id_siswa').val();
    const nis_siswa = $('#nis_siswa').val();
    const nis_siswa_lama = $('#nis_siswa_lama').val();
    const nisn_siswa = $('#nisn_siswa').val();
    const nama_siswa = $('#nama_siswa').val();
    const jenis_kelamin_siswa = $('#jenis_kelamin_siswa').val();
    const tempat_lahir_siswa = $('#tempat_lahir_siswa').val();
    const tanggal_lahir_siswa = $('#tanggal_lahir_siswa').val();
    const agama_siswa = $('#agama_siswa').val();
    const kebutuhan_khusus_siswa = $('#kebutuhan_khusus_siswa').val();
    const alamat_jalan_siswa = $('#alamat_jalan_siswa').val();
    const rt_siswa = $('#rt_siswa').val();
    const rw_siswa = $('#rw_siswa').val();
    const nama_dusun_siswa = $('#nama_dusun_siswa').val();
    const desa_kelurahan_siswa = $('#desa_kelurahan_siswa').val();
    const kecamatan_siswa = $('#kecamatan_siswa').val();
    const kabupaten_kota_siswa = $('#kabupaten_kota_siswa').val();
    const provinsi_siswa = $('#provinsi_siswa').val();
    const kode_pos_siswa = $('#kode_pos_siswa').val();
    const jenis_tinggal_siswa = $('#jenis_tinggal_siswa').val();
    const alat_transportasi_siswa = $('#alat_transportasi_siswa').val();
    const email_siswa = $('#email_siswa').val();
    const no_telp_siswa = $('#no_telp_siswa').val();
    const skhun_siswa = $('#skhun_siswa').val();
    const id_kelas = $('#kelas').val();
    const kewarganegaraan_siswa = $('#kewarganegaraan_siswa').val();
    const jabatan_tambahan = $('#jabatan_tambahan').val();
    const level = $('#level').val();
    const foto_siswa_lama = $('#foto_siswa_lama').val();
    const foto_siswa = $('#foto_siswa').prop('files')[0];
    const nama_ayah_siswa = $('#nama_ayah_siswa').val();
    const tahun_lahir_ayah_siswa = $('#tahun_lahir_ayah_siswa').val();
    const pendidikan_ayah_siswa = $('#pendidikan_ayah_siswa').val();
    const pekerjaan_ayah_siswa = $('#pekerjaan_ayah_siswa').val();
    const penghasilan_ayah_siswa = $('#penghasilan_ayah_siswa').val();
    const kebutuhan_khusus_ayah_siswa = $('#kebutuhan_khusus_ayah_siswa').val();
    const no_telp_ayah_siswa = $('#no_telp_ayah_siswa').val();
    const nama_ibu_siswa = $('#nama_ibu_siswa').val();
    const tahun_lahir_ibu_siswa = $('#tahun_lahir_ibu_siswa').val();
    const pendidikan_ibu_siswa = $('#pendidikan_ibu_siswa').val();
    const pekerjaan_ibu_siswa = $('#pekerjaan_ibu_siswa').val();
    const penghasilan_ibu_siswa = $('#penghasilan_ibu_siswa').val();
    const kebutuhan_khusus_ibu_siswa = $('#kebutuhan_khusus_ibu_siswa').val();
    const no_telp_ibu_siswa = $('#no_telp_ibu_siswa').val();
    const nama_wali_siswa = $('#nama_wali_siswa').val();
    const tahun_lahir_wali_siswa = $('#tahun_lahir_wali_siswa').val();
    const pendidikan_wali_siswa = $('#pendidikan_wali_siswa').val();
    const pekerjaan_wali_siswa = $('#pekerjaan_wali_siswa').val();
    const penghasilan_wali_siswa = $('#penghasilan_wali_siswa').val();
    const no_telp_wali_siswa = $('#no_telp_wali_siswa').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_siswa', id_siswa);
    data.append('nis_siswa', nis_siswa);
    data.append('nis_siswa_lama', nis_siswa_lama);
    data.append('nisn_siswa', nisn_siswa);
    data.append('nama_siswa', nama_siswa);
    data.append('jenis_kelamin_siswa', jenis_kelamin_siswa);
    data.append('tempat_lahir_siswa', tempat_lahir_siswa);
    data.append('tanggal_lahir_siswa', tanggal_lahir_siswa);
    data.append('agama_siswa', agama_siswa);
    data.append('kebutuhan_khusus_siswa', kebutuhan_khusus_siswa);
    data.append('alamat_jalan_siswa', alamat_jalan_siswa);
    data.append('rt_siswa', rt_siswa);
    data.append('rw_siswa', rw_siswa);
    data.append('nama_dusun_siswa', nama_dusun_siswa);
    data.append('desa_kelurahan_siswa', desa_kelurahan_siswa);
    data.append('kecamatan_siswa', kecamatan_siswa);
    data.append('kabupaten_kota_siswa', kabupaten_kota_siswa);
    data.append('provinsi_siswa', provinsi_siswa);
    data.append('kode_pos_siswa', kode_pos_siswa);
    data.append('jenis_tinggal_siswa', jenis_tinggal_siswa);
    data.append('alat_transportasi_siswa', alat_transportasi_siswa);
    data.append('email_siswa', email_siswa);
    data.append('no_telp_siswa', no_telp_siswa);
    data.append('skhun_siswa', skhun_siswa);
    data.append('id_kelas', id_kelas);
    data.append('kewarganegaraan_siswa', kewarganegaraan_siswa);
    data.append('jabatan_tambahan', jabatan_tambahan);
    data.append('level', level);
    data.append('foto_siswa_lama', foto_siswa_lama);
    data.append('foto_siswa', foto_siswa);
    data.append('nama_ayah_siswa', nama_ayah_siswa);
    data.append('tahun_lahir_ayah_siswa', tahun_lahir_ayah_siswa);
    data.append('pendidikan_ayah_siswa', pendidikan_ayah_siswa);
    data.append('pekerjaan_ayah_siswa', pekerjaan_ayah_siswa);
    data.append('penghasilan_ayah_siswa', penghasilan_ayah_siswa);
    data.append('kebutuhan_khusus_ayah_siswa', kebutuhan_khusus_ayah_siswa);
    data.append('no_telp_ayah_siswa', no_telp_ayah_siswa);
    data.append('nama_ibu_siswa', nama_ibu_siswa);
    data.append('tahun_lahir_ibu_siswa', tahun_lahir_ibu_siswa);
    data.append('pendidikan_ibu_siswa', pendidikan_ibu_siswa);
    data.append('pekerjaan_ibu_siswa', pekerjaan_ibu_siswa);
    data.append('penghasilan_ibu_siswa', penghasilan_ibu_siswa);
    data.append('kebutuhan_khusus_ibu_siswa', kebutuhan_khusus_ibu_siswa);
    data.append('no_telp_ibu_siswa', no_telp_ibu_siswa);
    data.append('nama_wali_siswa', nama_wali_siswa);
    data.append('tahun_lahir_wali_siswa', tahun_lahir_wali_siswa);
    data.append('pendidikan_wali_siswa', pendidikan_wali_siswa);
    data.append('pekerjaan_wali_siswa', pekerjaan_wali_siswa);
    data.append('penghasilan_wali_siswa', penghasilan_wali_siswa);
    data.append('no_telp_wali_siswa', no_telp_wali_siswa);

    let arr_field = [nis_siswa, nama_siswa];
    let arr_name = ["NIS", "Nama"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/siswa/ubah',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);
            //reset isi form
            clearURL($('#foto_siswa'));
            // tutup modal
            $('#modalSiswa').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}

function btnModalHapus(level, id_siswa, nis_siswa) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(level, id_siswa, nis_siswa)

        } else {
            // NO

        }
    });
}

function aksiHapus(level, id_siswa, nis_siswa) {
    let data = new FormData();
    data.append('level', level);
    data.append('id_siswa', id_siswa);
    data.append('nis_siswa', nis_siswa);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/siswa/hapus',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);

            //refresh table
            dataTable.ajax.reload();
        }
    });
}

function btnResetPassword(level, id_siswa, nis_siswa) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan mereset password akun ini?';
    let textBtn = 'Ya, Reset...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiResetPassword(level, id_siswa, nis_siswa)

        } else {
            // NO

        }
    });


}

function aksiResetPassword(level, id_siswa, nis_siswa) {
    var data = new FormData();
    data.append('level', level);
    data.append('id_siswa', id_siswa);
    data.append('nis_siswa', nis_siswa);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/siswa/resetPassword',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);

        }
    });
}

function btnDetail(level, id_siswa, nis_siswa) {
    $('#modalDetailSiswaLabel').html('Detail Siswa');
    var data = new FormData();
    data.append('level', level);
    data.append('id_siswa', id_siswa);
    data.append('nik_siswa', nis_siswa);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/siswa/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#img_foto_siswa2').attr('src', baseurl + 'assets/img/foto/' + responsdata.foto_siswa);
            $('#head_nama_siswa2').html(responsdata.nama_siswa);
            $('#nis_siswa2').html(responsdata.nis_siswa);
            $('#nisn_siswa2').html(responsdata.nisn_siswa);
            $('#nama_siswa2').html(responsdata.nama_siswa);
            $('#jenis_kelamin_siswa2').html(responsdata.jenis_kelamin_siswa);
            $('#tempat_lahir_siswa2').html(responsdata.tempat_lahir_siswa);
            $('#tanggal_lahir_siswa2').html(responsdata.tanggal_lahir_siswa);
            $('#agama_siswa2').html(responsdata.agama_siswa);
            $('#kebutuhan_khusus_siswa2').html(responsdata.kebutuhan_khusus_siswa);
            $('#alamat_jalan_siswa2').html(responsdata.alamat_jalan_siswa);
            $('#rt_siswa2').html(responsdata.rt_siswa);
            $('#rw_siswa2').html(responsdata.rw_siswa);
            $('#nama_dusun_siswa2').html(responsdata.nama_dusun_siswa);
            $('#desa_kelurahan_siswa2').html(responsdata.desa_kelurahan_siswa);
            $('#kecamatan_siswa2').html(responsdata.kecamatan_siswa);
            $('#kabupaten_kota_siswa2').html(responsdata.kabupaten_kota_siswa);
            $('#provinsi_siswa2').html(responsdata.provinsi_siswa);
            $('#kode_pos_siswa2').html(responsdata.kode_pos_siswa);
            $('#jenis_tinggal_siswa2').html(responsdata.jenis_tinggal_siswa);
            $('#alat_transportasi_siswa2').html(responsdata.alat_transportasi_siswa);
            $('#email_siswa2').html(responsdata.email_siswa);
            $('#no_telp_siswa2').html(responsdata.no_telp_siswa);
            $('#skhun_siswa2').html(responsdata.skhun_siswa);
            $('#kelas2').html(responsdata.kelas);
            $('#kewarganegaraan_siswa2').html(responsdata.kewarganegaraan_siswa);
            $('#tgl_login2').html(responsdata.tgl_login);
            $('#nama_ayah_siswa2').html(responsdata.nama_ayah_siswa);
            $('#tahun_lahir_ayah_siswa2').html(responsdata.tahun_lahir_ayah_siswa);
            $('#pendidikan_ayah_siswa2').html(responsdata.pendidikan_ayah_siswa);
            $('#pekerjaan_ayah_siswa2').html(responsdata.pekerjaan_ayah_siswa);
            $('#penghasilan_ayah_siswa2').html(responsdata.penghasilan_ayah_siswa);
            $('#kebutuhan_khusus_ayah_siswa2').html(responsdata.kebutuhan_khusus_ayah_siswa);
            $('#no_telp_ayah_siswa2').html(responsdata.no_telp_ayah_siswa);
            $('#nama_ibu_siswa2').html(responsdata.nama_ibu_siswa);
            $('#tahun_lahir_ibu_siswa2').html(responsdata.tahun_lahir_ibu_siswa);
            $('#pendidikan_ibu_siswa2').html(responsdata.pendidikan_ibu_siswa);
            $('#pekerjaan_ibu_siswa2').html(responsdata.pekerjaan_ibu_siswa);
            $('#penghasilan_ibu_siswa2').html(responsdata.penghasilan_ibu_siswa);
            $('#kebutuhan_khusus_ibu_siswa2').html(responsdata.kebutuhan_khusus_ibu_siswa);
            $('#no_telp_ibu_siswa2').html(responsdata.no_telp_ibu_siswa);
            $('#nama_wali_siswa2').html(responsdata.nama_wali_siswa);
            $('#tahun_lahir_wali_siswa2').html(responsdata.tahun_lahir_wali_siswa);
            $('#pendidikan_wali_siswa2').html(responsdata.pendidikan_wali_siswa);
            $('#pekerjaan_wali_siswa2').html(responsdata.pekerjaan_wali_siswa);
            $('#penghasilan_wali_siswa2').html(responsdata.penghasilan_wali_siswa);
            $('#no_telp_wali_siswa2').html(responsdata.no_telp_wali_siswa);
        }
    });

}