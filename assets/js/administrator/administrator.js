const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {



        $('#btn-tambahModal').on('click', function () {
            $('#modalAdministratorLabel').html('Tambah Administrator');
            $('#btn-modalAdm').html('Tambah');

        });

        $('.batal-administrator').on('click', function () {
            clearURL($('#foto_administrator'));
        });


        $('#foto_administrator').change(function () {
            readURL(this);
        });

        $('#btn-modalAdm').on('click', function (e) {
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
                url: "admin/administrator/queryAll",
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
                url: 'admin/administrator/importData',
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
    var txt = '<img src="" alt="" style="height: 80px;" id="img_foto_administrator">';
    $('.foto-prev').html(txt);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto_administrator').attr('src', '');
        }

        reader.readAsDataURL(input.files[0]);
    }
    $('#form-administrator').trigger('reset');
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto_administrator').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}





function tambah() {

    // ambil data dari elemen html
    const nik_administrator = $('#nik_administrator').val();
    const nama_administrator = $('#nama_administrator').val();
    const jenis_kelamin_administrator = $('#jenis_kelamin_administrator').val();
    const email_administrator = $('#email_administrator').val();
    const no_telp_administrator = $('#no_telp_administrator').val();
    const alamat_administrator = $('#alamat_administrator').val();
    const jabatan_tambahan = $('#jabatan_tambahan').val();
    const level = $('#level').val();
    const foto_administrator = $('#foto_administrator').prop('files')[0];

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('nik_administrator', nik_administrator);
    data.append('nama_administrator', nama_administrator);
    data.append('jenis_kelamin_administrator', jenis_kelamin_administrator);
    data.append('email_administrator', email_administrator);
    data.append('no_telp_administrator', no_telp_administrator);
    data.append('alamat_administrator', alamat_administrator);
    data.append('jabatan_tambahan', jabatan_tambahan);
    data.append('level', level);
    data.append('foto_administrator', foto_administrator);

    let arr_field = [nik_administrator, nama_administrator];
    let arr_name = ["NIK", "Nama"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/administrator/tambah',
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
            clearURL($('#foto_administrator'));
            // tutup modal
            $('#modalAdministrator').modal('hide');

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
function btnModalUbah(level, id_administrator, nik_administrator) {
    $('#modalAdministratorLabel').html('Ubah Administrator');
    $('#btn-modalAdm').html('Ubah');

    let data = new FormData();
    data.append('level', level);
    data.append('id_administrator', id_administrator);
    data.append('nik_administrator', nik_administrator);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/administrator/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_administrator').val(responsdata.id_administrator);
            $('#nik_administrator').val(responsdata.nik_administrator);
            $('#nik_administrator_lama').val(responsdata.nik_administrator);
            $('#nama_administrator').val(responsdata.nama_administrator);
            $('#jenis_kelamin_administrator').val(responsdata.jenis_kelamin_administrator).trigger('change');
            $('#email_administrator').val(responsdata.email_administrator);
            $('#no_telp_administrator').val(responsdata.no_telp_administrator);
            $('#alamat_administrator').val(responsdata.alamat_administrator);
            $('#jabatan_tambahan').val(responsdata.jabatan_tambahan);
            $('#level').val(responsdata.level);
            $('#foto_administrator_lama').val(responsdata.foto_administrator);
            $('#img_foto_administrator').attr('src', baseurl + 'assets/img/foto/' + responsdata.foto_administrator);
        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_administrator = $('#id_administrator').val();
    const nik_administrator = $('#nik_administrator').val();
    const nik_administrator_lama = $('#nik_administrator_lama').val();
    const nama_administrator = $('#nama_administrator').val();
    const jenis_kelamin_administrator = $('#jenis_kelamin_administrator').val();
    const email_administrator = $('#email_administrator').val();
    const no_telp_administrator = $('#no_telp_administrator').val();
    const alamat_administrator = $('#alamat_administrator').val();
    const jabatan_tambahan = $('#jabatan_tambahan').val();
    const level = $('#level').val();
    const foto_administrator_lama = $('#foto_administrator_lama').val();
    const foto_administrator = $('#foto_administrator').prop('files')[0];

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_administrator', id_administrator);
    data.append('nik_administrator', nik_administrator);
    data.append('nik_administrator_lama', nik_administrator_lama);
    data.append('nama_administrator', nama_administrator);
    data.append('jenis_kelamin_administrator', jenis_kelamin_administrator);
    data.append('email_administrator', email_administrator);
    data.append('no_telp_administrator', no_telp_administrator);
    data.append('alamat_administrator', alamat_administrator);
    data.append('jabatan_tambahan', jabatan_tambahan);
    data.append('level', level);
    data.append('foto_administrator_lama', foto_administrator_lama);
    data.append('foto_administrator', foto_administrator);

    let arr_field = [nik_administrator, nama_administrator];
    let arr_name = ["NIK", "Nama"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/administrator/ubah',
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
            clearURL($('#foto_administrator'));
            // tutup modal
            $('#modalAdministrator').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}

function btnModalHapus(level, id_administrator, nik_administrator) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(level, id_administrator, nik_administrator)

        } else {
            // NO

        }
    });
}

function aksiHapus(level, id_administrator, nik_administrator) {
    let data = new FormData();
    data.append('level', level);
    data.append('id_administrator', id_administrator);
    data.append('nik_administrator', nik_administrator);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/administrator/hapus',
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

function btnResetPassword(level, id_administrator, nik_administrator) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan mereset password akun ini?';
    let textBtn = 'Ya, Reset...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiResetPassword(level, id_administrator, nik_administrator)

        } else {
            // NO

        }
    });


}

function aksiResetPassword(level, id_administrator, nik_administrator) {
    var data = new FormData();
    data.append('level', level);
    data.append('id_administrator', id_administrator);
    data.append('nik_administrator', nik_administrator);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/administrator/resetPassword',
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

function btnDetail(level, id_administrator, nik_administrator) {
    $('#modalDetailAdministratorLabel').html('Detail Administrator');
    var data = new FormData();
    data.append('level', level);
    data.append('id_administrator', id_administrator);
    data.append('nik_administrator', nik_administrator);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/administrator/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#img_foto_administrator2').attr('src', baseurl + 'assets/img/foto/' + responsdata.foto_administrator);
            $('#head_nama_administrator2').html(responsdata.nama_administrator);
            $('#nik_administrator2').html(responsdata.nik_administrator);
            $('#nama_administrator2').html(responsdata.nama_administrator);
            $('#jenis_kelamin_administrator2').html(responsdata.jenis_kelamin_administrator);
            $('#email_administrator2').html(responsdata.email_administrator);
            $('#no_telp_administrator2').html(responsdata.no_telp_administrator);
            $('#alamat_administrator2').html(responsdata.alamat_administrator);
            $('#tgl_login2').html(responsdata.tgl_login);
        }
    });

}