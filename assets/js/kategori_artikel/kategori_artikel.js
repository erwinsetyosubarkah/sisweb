const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {



        $('#btn-tambahModal').on('click', function () {
            $('#modalKategoriArtikelLabel').html('Tambah Kategori Artikel');
            $('#btn-modalKategoriArtikel').html('Tambah');

        });


        $('#btn-modalKategoriArtikel').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-kategori-artikel').on('click', function () {
            $('#form-kategori-artikel').trigger('reset');
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
                url: "admin/kategori_artikel/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 2],
                "orderable": false,
            }, { "targets": [0, 2], "className": 'text-center' }]
        });


    });

});



function tambah() {

    // ambil data dari elemen html
    const kategori = $('#kategori').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('kategori', kategori);


    let arr_field = [kategori];
    let arr_name = ["Kategori"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kategori_artikel/tambah',
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
            $('#form-kategori-artikel').trigger('reset');
            // tutup modal
            $('#modalKategoriArtikel').modal('hide');

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
function btnModalUbah(id_kategori_artikel) {
    $('#modalKategoriArtikelLabel').html('Ubah Kategori Artikel');
    $('#btn-modalKategoriArtikel').html('Ubah');

    let data = new FormData();
    data.append('id_kategori_artikel', id_kategori_artikel);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kategori_artikel/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_kategori_artikel').val(responsdata.id_kategori_artikel);
            $('#kategori').val(responsdata.kategori);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_kategori_artikel = $('#id_kategori_artikel').val();
    const kategori = $('#kategori').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_kategori_artikel', id_kategori_artikel);
    data.append('kategori', kategori);


    let arr_field = [kategori];
    let arr_name = ["Kategori"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kategori_artikel/ubah',
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
            $('#form-kategori-artikel').trigger('reset');
            // tutup modal
            $('#modalKategoriArtikel').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}

function btnModalHapus(id_kategori_artikel) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_kategori_artikel)

        } else {
            // NO

        }
    });
}

function aksiHapus(id_kategori_artikel) {
    let data = new FormData();
    data.append('id_kategori_artikel', id_kategori_artikel);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kategori_artikel/hapus',
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