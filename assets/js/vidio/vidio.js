const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {


        $('#btn-tambahModal').on('click', function () {
            $('#modalVidioLabel').html('Tambah Vidio');
            $('#btn-modalVidio').html('Tambah');

        });


        $('#btn-modalVidio').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-vidio').on('click', function () {
            $('#form-vidio').trigger('reset');
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
                url: "admin/vidio/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 2, 3, 6],
                "orderable": false,
            }, { "targets": [0, 2, 4, 5, 6], "className": 'text-center' }]
        });


    });
});


function tambah() {

    // ambil data dari elemen html
    const judul_vidio = $('#judul_vidio').val();
    const url_vidio = $('#url_vidio').val();
    const tgl_upload_vidio = $('#tgl_upload_vidio').val();
    const id_author_vidio = $('#id_author_vidio').val();
    const level_author_vidio = $('#level_author_vidio').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('judul_vidio', judul_vidio);
    data.append('url_vidio', url_vidio);
    data.append('tgl_upload_vidio', tgl_upload_vidio);
    data.append('id_author_vidio', id_author_vidio);
    data.append('level_author_vidio', level_author_vidio);


    let arr_field = [judul_vidio, url_vidio];
    let arr_name = ["Judul Vidio", "URL Vidio"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/vidio/tambah',
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
            $('#form-vidio').trigger('reset');
            // tutup modal
            $('#modalVidio').modal('hide');

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
function btnModalUbah(id_vidio) {
    $('#modalVidioLabel').html('Ubah Vidio');
    $('#btn-modalVidio').html('Ubah');

    let data = new FormData();
    data.append('id_vidio', id_vidio);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/vidio/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_vidio').val(responsdata.id_vidio);
            $('#judul_vidio').val(responsdata.judul_vidio);
            $('#url_vidio').val(responsdata.url_vidio);
            $('#tgl_upload_vidio').val(responsdata.tgl_upload_vidio);
            $('#id_author_vidio').val(responsdata.id_author_vidio);
            $('#level_author_vidio').val(responsdata.level_author_vidio);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_vidio = $('#id_vidio').val();
    const judul_vidio = $('#judul_vidio').val();
    const url_vidio = $('#url_vidio').val();
    const tgl_upload_vidio = $('#tgl_upload_vidio').val();
    const id_author_vidio = $('#id_author_vidio').val();
    const level_author_vidio = $('#level_author_vidio').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_vidio', id_vidio);
    data.append('judul_vidio', judul_vidio);
    data.append('url_vidio', url_vidio);
    data.append('tgl_upload_vidio', tgl_upload_vidio);
    data.append('id_author_vidio', id_author_vidio);
    data.append('level_author_vidio', level_author_vidio);


    let arr_field = [judul_vidio, url_vidio];
    let arr_name = ["Judul Vidio", "URL Vidio"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/vidio/ubah',
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
            $('#form-vidio').trigger('reset');
            // tutup modal
            $('#modalVidio').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_vidio) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_vidio)

        } else {
            // NO

        }
    });
}

function aksiHapus(id_vidio) {
    let data = new FormData();
    data.append('id_vidio', id_vidio);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/vidio/hapus',
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