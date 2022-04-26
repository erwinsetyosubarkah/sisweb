const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalPengumumanLabel').html('Tambah Pengumuman');
            $('#btn-modalPengumuman').html('Tambah');

        });

        $('#btn-modalPengumuman').on('click', function (e) {
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
                url: "admin/pengumuman/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 2, 4],
                "orderable": false,
            }, { "targets": [0, 1, 3, 4], "className": 'text-center' }]
        });

    });
});



function tambah() {

    // ambil data dari elemen html
    const judul_pengumuman = $('#judul_pengumuman').val();
    const isi_pengumuman = CKEDITOR.instances['isi_pengumuman'].getData();
    const tgl_upload = $('#tgl_upload').val();
    const id_author = $('#id_author').val();
    const level_author = $('#level_author').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('judul_pengumuman', judul_pengumuman);
    data.append('isi_pengumuman', isi_pengumuman);
    data.append('tgl_upload', tgl_upload);
    data.append('id_author', id_author);
    data.append('level_author', level_author);


    let arr_field = [judul_pengumuman, isi_pengumuman];
    let arr_name = ["Judul Pengumuman", "Isi Pengumuman"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/pengumuman/tambah',
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
            $('#form-pengumuman').trigger('reset');
            // tutup modal
            $('#modalPengumuman').modal('hide');

            CKEDITOR.instances['isi_pengumuman'].setData('');

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
function btnModalUbah(id_pengumuman) {
    $('#modalPengumumanLabel').html('Ubah Pengumuman');
    $('#btn-modalPengumuman').html('Ubah');

    let data = new FormData();
    data.append('id_pengumuman', id_pengumuman);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/pengumuman/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_pengumuman').val(responsdata.id_pengumuman);
            $('#judul_pengumuman').val(responsdata.judul_pengumuman);
            $('#tgl_upload').val(responsdata.tgl_upload);
            $('#id_author').val(responsdata.id_author);
            $('#level_author').val(responsdata.level_author);

            CKEDITOR.instances['isi_pengumuman'].setData(responsdata.isi_pengumuman);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_pengumuman = $('#id_pengumuman').val();
    const judul_pengumuman = $('#judul_pengumuman').val();
    const isi_pengumuman = CKEDITOR.instances['isi_pengumuman'].getData();
    const tgl_upload = $('#tgl_upload').val();
    const id_author = $('#id_author').val();
    const level_author = $('#level_author').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_pengumuman', id_pengumuman);
    data.append('judul_pengumuman', judul_pengumuman);
    data.append('isi_pengumuman', isi_pengumuman);
    data.append('tgl_upload', tgl_upload);
    data.append('id_author', id_author);
    data.append('level_author', level_author);


    let arr_field = [judul_pengumuman, isi_pengumuman];
    let arr_name = ["Judul Pengumuman", "Isi Pengumuman"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/pengumuman/ubah',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);

            // tutup modal
            $('#modalPengumuman').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_pengumuman) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_pengumuman);

        } else {
            // NO

        }
    });
}


function aksiHapus(id_pengumuman) {
    let data = new FormData();
    data.append('id_pengumuman', id_pengumuman);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/pengumuman/hapus',
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