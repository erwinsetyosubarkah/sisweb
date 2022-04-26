const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalArtikelLabel').html('Tambah Artikel');
            $('#btn-modalArtikel').html('Tambah');
            getKategori();

        });

        $('.batal-artikel').on('click', function () {
            clearURL($('#gambar_sampul'));
        });


        $('#gambar_sampul').change(function () {
            readURL(this);
        });

        $('#btn-modalArtikel').on('click', function (e) {
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
                url: "admin/artikel/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 4, 5, 6],
                "orderable": false,
            }, { "targets": [0, 2, 3, 4, 5, 6], "className": 'text-center' }]
        });

    });
});

function getKategori() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/artikel/getKategori',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#kategori').html(responsdata);
        }
    });
}

function clearURL(input) {
    var txt = '<img src="" alt="" style="height: 80px;" id="img_gambar_sampul">';
    $('.gambar-sampul-prev').html(txt);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_gambar_sampul').attr('src', '');
        }

        reader.readAsDataURL(input.files[0]);
    }
    $('#form-artikel').trigger('reset');
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_gambar_sampul').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


function tambah() {

    // ambil data dari elemen html
    const judul_artikel = $('#judul_artikel').val();
    const id_kategori_artikel = $('#kategori').val();
    const status_artikel = $('#status_artikel').val();
    const gambar_sampul = $('#gambar_sampul').prop('files')[0];
    const isi_artikel = CKEDITOR.instances['isi_artikel'].getData();
    const tgl_upload = $('#tgl_upload').val();
    const id_author = $('#id_author').val();
    const level_author = $('#level_author').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('judul_artikel', judul_artikel);
    data.append('id_kategori_artikel', id_kategori_artikel);
    data.append('status_artikel', status_artikel);
    data.append('isi_artikel', isi_artikel);
    data.append('gambar_sampul', gambar_sampul);
    data.append('tgl_upload', tgl_upload);
    data.append('id_author', id_author);
    data.append('level_author', level_author);


    let arr_field = [judul_artikel, isi_artikel];
    let arr_name = ["Judul Artikel", "Isi Artikel"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/artikel/tambah',
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
            $('#form-artikel').trigger('reset');
            clearURL($('#gambar_sampul'));
            // tutup modal
            $('#modalArtikel').modal('hide');

            CKEDITOR.instances['isi_artikel'].setData('');

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
function btnModalUbah(id_artikel) {
    getKategori();
    $('#modalArtikelLabel').html('Ubah Artikel');
    $('#btn-modalArtikel').html('Ubah');

    let data = new FormData();
    data.append('id_artikel', id_artikel);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/artikel/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_artikel').val(responsdata.id_artikel);
            $('#judul_artikel').val(responsdata.judul_artikel);
            $('#kategori').val(responsdata.id_kategori_artikel).trigger('change');
            $('#status_artikel').val(responsdata.status_artikel).trigger('change');
            $('#gambar_sampul_lama').val(responsdata.gambar_sampul);
            $('#img_gambar_sampul').attr('src', baseurl + 'assets/img/gambar/images/' + responsdata.gambar_sampul);
            $('#tgl_upload').val(responsdata.tgl_upload);
            $('#id_author').val(responsdata.id_author);
            $('#level_author').val(responsdata.level_author);

            CKEDITOR.instances['isi_artikel'].setData(responsdata.isi_artikel);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_artikel = $('#id_artikel').val();
    const judul_artikel = $('#judul_artikel').val();
    const id_kategori_artikel = $('#kategori').val();
    const status_artikel = $('#status_artikel').val();
    const gambar_sampul_lama = $('#gambar_sampul_lama').val();
    const gambar_sampul = $('#gambar_sampul').prop('files')[0];
    const isi_artikel = CKEDITOR.instances['isi_artikel'].getData();
    const tgl_upload = $('#tgl_upload').val();
    const id_author = $('#id_author').val();
    const level_author = $('#level_author').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_artikel', id_artikel);
    data.append('judul_artikel', judul_artikel);
    data.append('id_kategori_artikel', id_kategori_artikel);
    data.append('status_artikel', status_artikel);
    data.append('isi_artikel', isi_artikel);
    data.append('gambar_sampul_lama', gambar_sampul_lama);
    data.append('gambar_sampul', gambar_sampul);
    data.append('tgl_upload', tgl_upload);
    data.append('id_author', id_author);
    data.append('level_author', level_author);


    let arr_field = [judul_artikel, isi_artikel];
    let arr_name = ["Judul Artikel", "Isi Artikel"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/artikel/ubah',
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
            clearURL($('#gambar_sampul'));
            // tutup modal
            $('#modalArtikel').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_artikel) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_artikel)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_artikel) {
    let data = new FormData();
    data.append('id_artikel', id_artikel);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/artikel/hapus',
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