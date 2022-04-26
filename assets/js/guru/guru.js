const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {



        $('#btn-tambahModal').on('click', function () {
            $('#modalGuruLabel').html('Tambah Guru');
            $('#btn-modalGuru').html('Tambah');

        });

        $('.batal-guru').on('click', function () {
            clearURL($('#foto_guru'));
        });


        $('#foto_guru').change(function () {
            readURL(this);
        });

        $('#btn-modalGuru').on('click', function (e) {
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
                url: "admin/guru/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 6, 8],
                "orderable": false,
            }, { "targets": [0, 1, 3, 4, 5, 6, 7, 8], "className": 'text-center' }]
        });


        $('#btn-import').on('click', function (e) {
            e.preventDefault();
            let import_data = $('#import_data').prop('files')[0];

            // simpan data dalam bentuk object dengan nama data
            let data = new FormData();
            data.append('import_data', import_data);

            $.ajax({
                //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
                url: 'admin/guru/importData',
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



function clearURL(input) {
    var txt = '<img src="" alt="" style="height: 80px;" id="img_foto_guru">';
    $('.foto-prev').html(txt);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto_guru').attr('src', '');
        }

        reader.readAsDataURL(input.files[0]);
    }
    $('#form-guru').trigger('reset');
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto_guru').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}





function tambah() {

    // ambil data dari elemen html
    const nik_guru = $('#nik_guru').val();
    const nama_guru = $('#nama_guru').val();
    const jenis_kelamin_guru = $('#jenis_kelamin_guru').val();
    const tempat_lahir_guru = $('#tempat_lahir_guru').val();
    const tanggal_lahir_guru = $('#tanggal_lahir_guru').val();
    const nuptk_guru = $('#nuptk_guru').val();
    const status_kepegawaian_guru = $('#status_kepegawaian_guru').val();
    const jenis_ptk_guru = $('#jenis_ptk_guru').val();
    const agama_guru = $('#agama_guru').val();
    const alamat_jalan_guru = $('#alamat_jalan_guru').val();
    const rt_guru = $('#rt_guru').val();
    const rw_guru = $('#rw_guru').val();
    const nama_dusun_guru = $('#nama_dusun_guru').val();
    const desa_kelurahan_guru = $('#desa_kelurahan_guru').val();
    const kecamatan_guru = $('#kecamatan_guru').val();
    const kabupaten_kota_guru = $('#kabupaten_kota_guru').val();
    const provinsi_guru = $('#provinsi_guru').val();
    const kode_pos_guru = $('#kode_pos_guru').val();
    const email_guru = $('#email_guru').val();
    const no_telp_guru = $('#no_telp_guru').val();
    const status_keaktifan_guru = $('#status_keaktifan_guru').val();
    const sk_cpns_guru = $('#sk_cpns_guru').val();
    const tanggal_cpns_guru = $('#tanggal_cpns_guru').val();
    const sk_pengangkatan_guru = $('#sk_pengangkatan_guru').val();
    const tmt_pengangkatan_guru = $('#tmt_pengangkatan_guru').val();
    const lembaga_pengangkatan_guru = $('#lembaga_pengangkatan_guru').val();
    const golongan_guru = $('#golongan_guru').val();
    const sumber_gaji_guru = $('#sumber_gaji_guru').val();
    const nama_ibu_kandung_guru = $('#nama_ibu_kandung_guru').val();
    const status_pernikahan_guru = $('#status_pernikahan_guru').val();
    const nama_suami_istri_guru = $('#nama_suami_istri_guru').val();
    const nik_suami_istri_guru = $('#nik_suami_istri_guru').val();
    const pekerjaan_suami_istri_guru = $('#pekerjaan_suami_istri_guru').val();
    const tmt_pns_guru = $('#tmt_pns_guru').val();
    const npwp_guru = $('#npwp_guru').val();
    const kewarganegaraan_guru = $('#kewarganegaraan_guru').val();
    const jabatan_tambahan = $('#jabatan_tambahan').val();
    const level = $('#level').val();
    const foto_guru = $('#foto_guru').prop('files')[0];

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('nik_guru', nik_guru);
    data.append('nama_guru', nama_guru);
    data.append('jenis_kelamin_guru', jenis_kelamin_guru);
    data.append('tempat_lahir_guru', tempat_lahir_guru);
    data.append('tanggal_lahir_guru', tanggal_lahir_guru);
    data.append('nuptk_guru', nuptk_guru);
    data.append('status_kepegawaian_guru', status_kepegawaian_guru);
    data.append('jenis_ptk_guru', jenis_ptk_guru);
    data.append('agama_guru', agama_guru);
    data.append('alamat_jalan_guru', alamat_jalan_guru);
    data.append('rt_guru', rt_guru);
    data.append('rw_guru', rw_guru);
    data.append('nama_dusun_guru', nama_dusun_guru);
    data.append('desa_kelurahan_guru', desa_kelurahan_guru);
    data.append('kecamatan_guru', kecamatan_guru);
    data.append('kabupaten_kota_guru', kabupaten_kota_guru);
    data.append('provinsi_guru', provinsi_guru);
    data.append('kode_pos_guru', kode_pos_guru);
    data.append('email_guru', email_guru);
    data.append('no_telp_guru', no_telp_guru);
    data.append('status_keaktifan_guru', status_keaktifan_guru);
    data.append('sk_cpns_guru', sk_cpns_guru);
    data.append('tanggal_cpns_guru', tanggal_cpns_guru);
    data.append('sk_pengangkatan_guru', sk_pengangkatan_guru);
    data.append('tmt_pengangkatan_guru', tmt_pengangkatan_guru);
    data.append('lembaga_pengangkatan_guru', lembaga_pengangkatan_guru);
    data.append('golongan_guru', golongan_guru);
    data.append('sumber_gaji_guru', sumber_gaji_guru);
    data.append('nama_ibu_kandung_guru', nama_ibu_kandung_guru);
    data.append('status_pernikahan_guru', status_pernikahan_guru);
    data.append('nama_suami_istri_guru', nama_suami_istri_guru);
    data.append('nik_suami_istri_guru', nik_suami_istri_guru);
    data.append('pekerjaan_suami_istri_guru', pekerjaan_suami_istri_guru);
    data.append('tmt_pns_guru', tmt_pns_guru);
    data.append('npwp_guru', npwp_guru);
    data.append('kewarganegaraan_guru', kewarganegaraan_guru);
    data.append('jabatan_tambahan', jabatan_tambahan);
    data.append('level', level);
    data.append('foto_guru', foto_guru);

    let arr_field = [nik_guru, nama_guru];
    let arr_name = ["NIK", "Nama"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/guru/tambah',
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
            clearURL($('#foto_guru'));
            // tutup modal
            $('#modalGuru').modal('hide');

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
function btnModalUbah(level, id_guru, nik_guru) {
    $('#modalGuruLabel').html('Ubah Guru');
    $('#btn-modalGuru').html('Ubah');

    let data = new FormData();
    data.append('level', level);
    data.append('id_guru', id_guru);
    data.append('nik_guru', nik_guru);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/guru/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_guru').val(responsdata.id_guru);
            $('#nik_guru').val(responsdata.nik_guru);
            $('#nik_guru_lama').val(responsdata.nik_guru);
            $('#nama_guru').val(responsdata.nama_guru);
            $('#jenis_kelamin_guru').val(responsdata.jenis_kelamin_guru);
            $('#tempat_lahir_guru').val(responsdata.tempat_lahir_guru);
            $('#tanggal_lahir_guru').val(responsdata.tanggal_lahir_guru);
            $('#nuptk_guru').val(responsdata.nuptk_guru);
            $('#status_kepegawaian_guru').val(responsdata.status_kepegawaian_guru);
            $('#jenis_ptk_guru').val(responsdata.jenis_ptk_guru);
            $('#agama_guru').val(responsdata.agama_guru);
            $('#alamat_jalan_guru').val(responsdata.alamat_jalan_guru);
            $('#rt_guru').val(responsdata.rt_guru);
            $('#rw_guru').val(responsdata.rw_guru);
            $('#nama_dusun_guru').val(responsdata.nama_dusun_guru);
            $('#desa_kelurahan_guru').val(responsdata.desa_kelurahan_guru);
            $('#kecamatan_guru').val(responsdata.kecamatan_guru);
            $('#kabupaten_kota_guru').val(responsdata.kabupaten_kota_guru);
            $('#provinsi_guru').val(responsdata.provinsi_guru);
            $('#kode_pos_guru').val(responsdata.kode_pos_guru);
            $('#email_guru').val(responsdata.email_guru);
            $('#no_telp_guru').val(responsdata.no_telp_guru);
            $('#status_keaktifan_guru').val(responsdata.status_keaktifan_guru);
            $('#sk_cpns_guru').val(responsdata.sk_cpns_guru);
            $('#tanggal_cpns_guru').val(responsdata.tanggal_cpns_guru);
            $('#sk_pengangkatan_guru').val(responsdata.sk_pengangkatan_guru);
            $('#tmt_pengangkatan_guru').val(responsdata.tmt_pengangkatan_guru);
            $('#lembaga_pengangkatan_guru').val(responsdata.lembaga_pengangkatan_guru);
            $('#golongan_guru').val(responsdata.golongan_guru);
            $('#sumber_gaji_guru').val(responsdata.sumber_gaji_guru);
            $('#nama_ibu_kandung_guru').val(responsdata.nama_ibu_kandung_guru);
            $('#status_pernikahan_guru').val(responsdata.status_pernikahan_guru);
            $('#nama_suami_istri_guru').val(responsdata.nama_suami_istri_guru);
            $('#nik_suami_istri_guru').val(responsdata.nik_suami_istri_guru);
            $('#pekerjaan_suami_istri_guru').val(responsdata.pekerjaan_suami_istri_guru);
            $('#tmt_pns_guru').val(responsdata.tmt_pns_guru);
            $('#npwp_guru').val(responsdata.npwp_guru);
            $('#kewarganegaraan_guru').val(responsdata.kewarganegaraan_guru);
            $('#jabatan_tambahan').val(responsdata.jabatan_tambahan);
            $('#level').val(responsdata.level);
            $('#foto_guru_lama').val(responsdata.foto_guru);
            $('#img_foto_guru').attr('src', baseurl + 'assets/img/foto/' + responsdata.foto_guru);
        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_guru = $('#id_guru').val();
    const nik_guru = $('#nik_guru').val();
    const nik_guru_lama = $('#nik_guru_lama').val();
    const nama_guru = $('#nama_guru').val();
    const jenis_kelamin_guru = $('#jenis_kelamin_guru').val();
    const tempat_lahir_guru = $('#tempat_lahir_guru').val();
    const tanggal_lahir_guru = $('#tanggal_lahir_guru').val();
    const nuptk_guru = $('#nuptk_guru').val();
    const status_kepegawaian_guru = $('#status_kepegawaian_guru').val();
    const jenis_ptk_guru = $('#jenis_ptk_guru').val();
    const agama_guru = $('#agama_guru').val();
    const alamat_jalan_guru = $('#alamat_jalan_guru').val();
    const rt_guru = $('#rt_guru').val();
    const rw_guru = $('#rw_guru').val();
    const nama_dusun_guru = $('#nama_dusun_guru').val();
    const desa_kelurahan_guru = $('#desa_kelurahan_guru').val();
    const kecamatan_guru = $('#kecamatan_guru').val();
    const kabupaten_kota_guru = $('#kabupaten_kota_guru').val();
    const provinsi_guru = $('#provinsi_guru').val();
    const kode_pos_guru = $('#kode_pos_guru').val();
    const email_guru = $('#email_guru').val();
    const no_telp_guru = $('#no_telp_guru').val();
    const status_keaktifan_guru = $('#status_keaktifan_guru').val();
    const sk_cpns_guru = $('#sk_cpns_guru').val();
    const tanggal_cpns_guru = $('#tanggal_cpns_guru').val();
    const sk_pengangkatan_guru = $('#sk_pengangkatan_guru').val();
    const tmt_pengangkatan_guru = $('#tmt_pengangkatan_guru').val();
    const lembaga_pengangkatan_guru = $('#lembaga_pengangkatan_guru').val();
    const golongan_guru = $('#golongan_guru').val();
    const sumber_gaji_guru = $('#sumber_gaji_guru').val();
    const nama_ibu_kandung_guru = $('#nama_ibu_kandung_guru').val();
    const status_pernikahan_guru = $('#status_pernikahan_guru').val();
    const nama_suami_istri_guru = $('#nama_suami_istri_guru').val();
    const nik_suami_istri_guru = $('#nik_suami_istri_guru').val();
    const pekerjaan_suami_istri_guru = $('#pekerjaan_suami_istri_guru').val();
    const tmt_pns_guru = $('#tmt_pns_guru').val();
    const npwp_guru = $('#npwp_guru').val();
    const kewarganegaraan_guru = $('#kewarganegaraan_guru').val();
    const jabatan_tambahan = $('#jabatan_tambahan').val();
    const level = $('#level').val();
    const foto_guru_lama = $('#foto_guru_lama').val();
    const foto_guru = $('#foto_guru').prop('files')[0];

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_guru', id_guru);
    data.append('nik_guru', nik_guru);
    data.append('nik_guru_lama', nik_guru_lama);
    data.append('nama_guru', nama_guru);
    data.append('jenis_kelamin_guru', jenis_kelamin_guru);
    data.append('tempat_lahir_guru', tempat_lahir_guru);
    data.append('tanggal_lahir_guru', tanggal_lahir_guru);
    data.append('nuptk_guru', nuptk_guru);
    data.append('status_kepegawaian_guru', status_kepegawaian_guru);
    data.append('jenis_ptk_guru', jenis_ptk_guru);
    data.append('agama_guru', agama_guru);
    data.append('alamat_jalan_guru', alamat_jalan_guru);
    data.append('rt_guru', rt_guru);
    data.append('rw_guru', rw_guru);
    data.append('nama_dusun_guru', nama_dusun_guru);
    data.append('desa_kelurahan_guru', desa_kelurahan_guru);
    data.append('kecamatan_guru', kecamatan_guru);
    data.append('kabupaten_kota_guru', kabupaten_kota_guru);
    data.append('provinsi_guru', provinsi_guru);
    data.append('kode_pos_guru', kode_pos_guru);
    data.append('email_guru', email_guru);
    data.append('no_telp_guru', no_telp_guru);
    data.append('status_keaktifan_guru', status_keaktifan_guru);
    data.append('sk_cpns_guru', sk_cpns_guru);
    data.append('tanggal_cpns_guru', tanggal_cpns_guru);
    data.append('sk_pengangkatan_guru', sk_pengangkatan_guru);
    data.append('tmt_pengangkatan_guru', tmt_pengangkatan_guru);
    data.append('lembaga_pengangkatan_guru', lembaga_pengangkatan_guru);
    data.append('golongan_guru', golongan_guru);
    data.append('sumber_gaji_guru', sumber_gaji_guru);
    data.append('nama_ibu_kandung_guru', nama_ibu_kandung_guru);
    data.append('status_pernikahan_guru', status_pernikahan_guru);
    data.append('nama_suami_istri_guru', nama_suami_istri_guru);
    data.append('nik_suami_istri_guru', nik_suami_istri_guru);
    data.append('pekerjaan_suami_istri_guru', pekerjaan_suami_istri_guru);
    data.append('tmt_pns_guru', tmt_pns_guru);
    data.append('npwp_guru', npwp_guru);
    data.append('kewarganegaraan_guru', kewarganegaraan_guru);
    data.append('jabatan_tambahan', jabatan_tambahan);
    data.append('level', level);
    data.append('foto_guru_lama', foto_guru_lama);
    data.append('foto_guru', foto_guru);

    let arr_field = [nik_guru, nama_guru];
    let arr_name = ["NIK", "Nama"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/guru/ubah',
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
            clearURL($('#foto_guru'));
            // tutup modal
            $('#modalGuru').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}

function btnModalHapus(level, id_guru, nik_guru) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(level, id_guru, nik_guru)

        } else {
            // NO

        }
    });
}

function aksiHapus(level, id_guru, nik_guru) {
    let data = new FormData();
    data.append('level', level);
    data.append('id_guru', id_guru);
    data.append('nik_guru', nik_guru);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/guru/hapus',
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

function btnResetPassword(level, id_guru, nik_guru) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan mereset password akun ini?';
    let textBtn = 'Ya, Reset...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiResetPassword(level, id_guru, nik_guru)

        } else {
            // NO

        }
    });


}

function aksiResetPassword(level, id_guru, nik_guru) {
    var data = new FormData();
    data.append('level', level);
    data.append('id_guru', id_guru);
    data.append('nik_guru', nik_guru);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/guru/resetPassword',
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

function btnDetail(level, id_guru, nik_guru) {
    $('#modalDetailGuruLabel').html('Detail Guru');
    var data = new FormData();
    data.append('level', level);
    data.append('id_guru', id_guru);
    data.append('nik_guru', nik_guru);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/guru/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#img_foto_guru2').attr('src', baseurl + 'assets/img/foto/' + responsdata.foto_guru);
            $('#head_nama_guru2').html(responsdata.nama_guru);
            $('#nik_guru2').html(responsdata.nik_guru);
            $('#nama_guru2').html(responsdata.nama_guru);
            $('#jenis_kelamin_guru2').html(responsdata.jenis_kelamin_guru);
            $('#tempat_lahir_guru2').html(responsdata.tempat_lahir_guru);
            $('#tanggal_lahir_guru2').html(responsdata.tanggal_lahir_guru);
            $('#nuptk_guru2').html(responsdata.nuptk_guru);
            $('#status_kepegawaian_guru2').html(responsdata.status_kepegawaian_guru);
            $('#jenis_ptk_guru2').html(responsdata.jenis_ptk_guru);
            $('#agama_guru2').html(responsdata.agama_guru);
            $('#alamat_jalan_guru2').html(responsdata.alamat_jalan_guru);
            $('#rt_guru2').html(responsdata.rt_guru);
            $('#rw_guru2').html(responsdata.rw_guru);
            $('#nama_dusun_guru2').html(responsdata.nama_dusun_guru);
            $('#desa_kelurahan_guru2').html(responsdata.desa_kelurahan_guru);
            $('#kecamatan_guru2').html(responsdata.kecamatan_guru);
            $('#kabupaten_kota_guru2').html(responsdata.kabupaten_kota_guru);
            $('#provinsi_guru2').html(responsdata.provinsi_guru);
            $('#kode_pos_guru2').html(responsdata.kode_pos_guru);
            $('#email_guru2').html(responsdata.email_guru);
            $('#no_telp_guru2').html(responsdata.no_telp_guru);
            $('#status_keaktifan_guru2').html(responsdata.status_keaktifan_guru);
            $('#sk_cpns_guru2').html(responsdata.sk_cpns_guru);
            $('#tanggal_cpns_guru2').html(responsdata.tanggal_cpns_guru);
            $('#sk_pengangkatan_guru2').html(responsdata.sk_pengangkatan_guru);
            $('#tmt_pengangkatan_guru2').html(responsdata.tmt_pengangkatan_guru);
            $('#lembaga_pengangkatan_guru2').html(responsdata.lembaga_pengangkatan_guru);
            $('#golongan_guru2').html(responsdata.golongan_guru);
            $('#sumber_gaji_guru2').html(responsdata.sumber_gaji_guru);
            $('#nama_ibu_kandung_guru2').html(responsdata.nama_ibu_kandung_guru);
            $('#status_pernikahan_guru2').html(responsdata.status_pernikahan_guru);
            $('#nama_suami_istri_guru2').html(responsdata.nama_suami_istri_guru);
            $('#nik_suami_istri_guru2').html(responsdata.nik_suami_istri_guru);
            $('#pekerjaan_suami_istri_guru2').html(responsdata.pekerjaan_suami_istri_guru);
            $('#tmt_pns_guru2').html(responsdata.tmt_pns_guru);
            $('#npwp_guru2').html(responsdata.npwp_guru);
            $('#kewarganegaraan_guru2').html(responsdata.kewarganegaraan_guru);
            $('#jabatan_tambahan2').html(responsdata.jabatan_tambahan);
            $('#tgl_login2').html(responsdata.tgl_login);
        }
    });

}