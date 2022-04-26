const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalGedungLabel').html('Tambah Gedung');
            $('#btn-modalGedung').html('Tambah');

        });


        $('#btn-modalGedung').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });


        $('.batal-gedung').on('click', function () {
            $('#form-gedung').trigger('reset');
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
                url: "admin/gedung/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 7],
                "orderable": false,
            }, { "targets": [0, 1, 2, 3, 4, 5, 6, 7], "className": 'text-center' }]
        });


    });
});


function tambah() {

    // ambil data dari elemen html
    const nama_gedung = $('#nama_gedung').val();
    const jumlah_lantai_gedung = $('#jumlah_lantai_gedung').val();
    const panjang_gedung = $('#panjang_gedung').val();
    const tinggi_gedung = $('#tinggi_gedung').val();
    const lebar_gedung = $('#lebar_gedung').val();
    const keterangan_gedung = $('#keterangan_gedung').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('nama_gedung', nama_gedung);
    data.append('jumlah_lantai_gedung', jumlah_lantai_gedung);
    data.append('panjang_gedung', panjang_gedung);
    data.append('tinggi_gedung', tinggi_gedung);
    data.append('lebar_gedung', lebar_gedung);
    data.append('keterangan_gedung', keterangan_gedung);

    let arr_field = [nama_gedung];
    let arr_name = ["Nama Gedung"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/gedung/tambah',
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
            $('#form-gedung').trigger('reset');
            // tutup modal
            $('#modalGedung').modal('hide');

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
function btnModalUbah(id_gedung) {
    $('#modalGedungLabel').html('Ubah Gedung');
    $('#btn-modalGedung').html('Ubah');

    let data = new FormData();
    data.append('id_gedung', id_gedung);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/gedung/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_gedung').val(responsdata.id_gedung);
            $('#nama_gedung').val(responsdata.nama_gedung);
            $('#jumlah_lantai_gedung').val(responsdata.jumlah_lantai_gedung);
            $('#panjang_gedung').val(responsdata.panjang_gedung);
            $('#tinggi_gedung').val(responsdata.tinggi_gedung);
            $('#lebar_gedung').val(responsdata.lebar_gedung);
            $('#keterangan_gedung').val(responsdata.keterangan_gedung);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_gedung = $('#id_gedung').val();
    const nama_gedung = $('#nama_gedung').val();
    const jumlah_lantai_gedung = $('#jumlah_lantai_gedung').val();
    const panjang_gedung = $('#panjang_gedung').val();
    const tinggi_gedung = $('#tinggi_gedung').val();
    const lebar_gedung = $('#lebar_gedung').val();
    const keterangan_gedung = $('#keterangan_gedung').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_gedung', id_gedung);
    data.append('nama_gedung', nama_gedung);
    data.append('jumlah_lantai_gedung', jumlah_lantai_gedung);
    data.append('panjang_gedung', panjang_gedung);
    data.append('tinggi_gedung', tinggi_gedung);
    data.append('lebar_gedung', lebar_gedung);
    data.append('keterangan_gedung', keterangan_gedung);


    let arr_field = [nama_gedung];
    let arr_name = ["Nama Gedung"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/gedung/ubah',
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
            $('#form-gedung').trigger('reset');
            // tutup modal
            $('#modalGedung').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_gedung) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_gedung)

        } else {
            // NO

        }
    });
}

function aksiHapus(id_gedung) {
    let data = new FormData();
    data.append('id_gedung', id_gedung);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/gedung/hapus',
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