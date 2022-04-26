const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalFotoLabel').html('Tambah Foto');
            $('#btn-modalFoto').html('Tambah');
            getKategori();

        });

        $('.batal-foto').on('click', function () {
            clearURL($('#foto'));
        });


        $('#foto').change(function () {
            readURL(this);
        });

        $('#btn-modalFoto').on('click', function (e) {
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
                url: "admin/foto/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 2, 5],
                "orderable": false,
            }, { "targets": [0, 2, 3, 4, 5], "className": 'text-center' }]
        });

    });
});


function clearURL(input) {
    var txt = '<img src="" alt="" style="height: 80px;" id="img_foto">';
    $('.foto-prev').html(txt);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto').attr('src', '');
        }

        reader.readAsDataURL(input.files[0]);
    }
    $('#form-foto').trigger('reset');
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_foto').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function tambah() {

    // ambil data dari elemen html
    const judul_foto = $('#judul_foto').val();
    const foto = $('#foto').prop('files')[0];
    const tgl_upload_foto = $('#tgl_upload_foto').val();
    const id_author_foto = $('#id_author_foto').val();
    const level_author_foto = $('#level_author_foto').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('judul_foto', judul_foto);
    data.append('foto', foto);
    data.append('tgl_upload_foto', tgl_upload_foto);
    data.append('id_author_foto', id_author_foto);
    data.append('level_author_foto', level_author_foto);


    let arr_field = [judul_foto];
    let arr_name = ["Judul Foto"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/foto/tambah',
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
            $('#form-foto').trigger('reset');
            clearURL($('#foto'));
            // tutup modal
            $('#modalFoto').modal('hide');

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
function btnModalUbah(id_foto) {
    $('#modalFotoLabel').html('Ubah Foto');
    $('#btn-modalFoto').html('Ubah');

    let data = new FormData();
    data.append('id_foto', id_foto);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/foto/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_foto').val(responsdata.id_foto);
            $('#judul_foto').val(responsdata.judul_foto);
            $('#foto_lama').val(responsdata.foto);
            $('#img_foto').attr('src', baseurl + 'assets/img/gambar/images/' + responsdata.foto);
            $('tgl_upload_foto').val(responsdata.tgl_upload_foto);
            $('id_author_foto').val(responsdata.id_author_foto);
            $('level_author_foto').val(responsdata.level_author_foto);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_foto = $('#id_foto').val();
    const judul_foto = $('#judul_foto').val();
    const foto_lama = $('#foto_lama').val();
    const foto = $('#foto').prop('files')[0];
    const tgl_upload_foto = $('#tgl_upload_foto').val();
    const id_author_foto = $('#id_author_foto').val();
    const level_author_foto = $('#level_author_foto').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_foto', id_foto);
    data.append('judul_foto', judul_foto);
    data.append('foto_lama', foto_lama);
    data.append('foto', foto);
    data.append('tgl_upload_foto', tgl_upload_foto);
    data.append('id_author_foto', id_author_foto);
    data.append('level_author_foto', level_author_foto);

    let arr_field = [judul_foto];
    let arr_name = ["Judul Foto"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/foto/ubah',
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
            clearURL($('#foto'));
            // tutup modal
            $('#modalFoto').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}

function btnModalHapus(id_foto) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_foto)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_foto) {
    let data = new FormData();
    data.append('id_foto', id_foto);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/foto/hapus',
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