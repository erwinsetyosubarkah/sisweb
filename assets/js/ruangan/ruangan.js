const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalRuanganLabel').html('Tambah Ruangan');
            $('#btn-modalRuangan').html('Tambah');
            getGedung();

        });


        $('#btn-modalRuangan').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-ruangan').on('click', function () {
            $('#form-ruangan').trigger('reset');
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
                url: "admin/ruangan/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 4, 5, 6],
                "orderable": false,
            }, { "targets": [0, 2, 3, 4, 5, 6], "className": 'text-center' }]
        });

    });
});

function getGedung() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/ruangan/getGedung',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#nama_gedung').html(responsdata);
        }
    });
}

function tambah() {

    // ambil data dari elemen html
    const nama_ruangan = $('#nama_ruangan').val();
    const id_gedung = $('#nama_gedung').val();
    const kapasitas_belajar_ruangan = $('#kapasitas_belajar_ruangan').val();
    const kapasitas_ujian_ruangan = $('#kapasitas_ujian_ruangan').val();
    const keterangan_ruangan = $('#keterangan_ruangan').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('nama_ruangan', nama_ruangan);
    data.append('id_gedung', id_gedung);
    data.append('kapasitas_belajar_ruangan', kapasitas_belajar_ruangan);
    data.append('kapasitas_ujian_ruangan', kapasitas_ujian_ruangan);
    data.append('keterangan_ruangan', keterangan_ruangan);

    let arr_field = [nama_ruangan];
    let arr_name = ["Nama Ruangan"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/ruangan/tambah',
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
            $('#form-ruangan').trigger('reset');

            // tutup modal
            $('#modalRuangan').modal('hide');

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
function btnModalUbah(id_ruangan) {
    getGedung();
    $('#modalRuanganLabel').html('Ubah Ruangan');
    $('#btn-modalRuangan').html('Ubah');

    let data = new FormData();
    data.append('id_ruangan', id_ruangan);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/ruangan/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_ruangan').val(responsdata.id_ruangan);
            $('#nama_ruangan').val(responsdata.nama_ruangan);
            $('#nama_gedung').val(responsdata.id_gedung).trigger('change');
            $('#kapasitas_belajar_ruangan').val(responsdata.kapasitas_belajar_ruangan);
            $('#kapasitas_ujian_ruangan').val(responsdata.kapasitas_ujian_ruangan);
            $('#keterangan_ruangan').val(responsdata.keterangan_ruangan);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_ruangan = $('#id_ruangan').val();
    const nama_ruangan = $('#nama_ruangan').val();
    const id_gedung = $('#nama_gedung').val();
    const kapasitas_belajar_ruangan = $('#kapasitas_belajar_ruangan').val();
    const kapasitas_ujian_ruangan = $('#kapasitas_ujian_ruangan').val();
    const keterangan_ruangan = $('#keterangan_ruangan').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_ruangan', id_ruangan);
    data.append('nama_ruangan', nama_ruangan);
    data.append('id_gedung', id_gedung);
    data.append('kapasitas_belajar_ruangan', kapasitas_belajar_ruangan);
    data.append('kapasitas_ujian_ruangan', kapasitas_ujian_ruangan);
    data.append('keterangan_ruangan', keterangan_ruangan);

    let arr_field = [nama_ruangan];
    let arr_name = ["Nama Ruangan"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/ruangan/ubah',
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
            $('#form-ruangan').trigger('reset');
            // tutup modal
            $('#modalRuangan').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_ruangan) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_ruangan)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_ruangan) {
    let data = new FormData();
    data.append('id_ruangan', id_ruangan);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/ruangan/hapus',
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