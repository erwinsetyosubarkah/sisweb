const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {
        getTingkat();
        $('#btn-tambahModal').on('click', function () {
            $('#modalKompetensiDasarLabel').html('Tambah Kompetensi Dasar');
            $('#btn-modalKompetensiDasar').html('Tambah');
            getMataPelajaran();

        });


        $('#btn-modalKompetensiDasar').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-kompetensi-dasar').on('click', function () {
            $('#form-kompetensi-dasar').trigger('reset');
        });

        $('#id_tingkat').on('change', function () {
            //refresh table
            dataTable.draw();
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
                "url": "admin/kompetensi_dasar/queryAll",
                "method": "POST",
                "data": function (data) {
                    // Read values
                    var id_tingkat = $('#id_tingkat').val();

                    // Append to data
                    data.id_tingkat = id_tingkat;

                }
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, { "targets": [0, 2, 3, 5], "className": 'text-center' }]
        });

    });
});

function getMataPelajaran() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kompetensi_dasar/getMataPelajaran',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_mata_pelajaran').html(responsdata);
        }
    });
}

function getTingkat() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kompetensi_dasar/getTingkat',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_tingkat').html(responsdata);
        }
    });
}

function tambah() {

    // ambil data dari elemen html
    const id_mata_pelajaran = $('#id_mata_pelajaran').val();
    const kode_kompetensi_dasar = $('#kode_kompetensi_dasar').val();
    const jenis_kompetensi_dasar = $('#jenis_kompetensi_dasar').val();
    const kompetensi_dasar = $('#kompetensi_dasar').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_mata_pelajaran', id_mata_pelajaran);
    data.append('kode_kompetensi_dasar', kode_kompetensi_dasar);
    data.append('jenis_kompetensi_dasar', jenis_kompetensi_dasar);
    data.append('kompetensi_dasar', kompetensi_dasar);

    let arr_field = [id_mata_pelajaran, kode_kompetensi_dasar, kompetensi_dasar];
    let arr_name = ["Mata Pelajaran", "Kode Kompetensi Dasar", "Kompetensi Dasar"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kompetensi_dasar/tambah',
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
            $('#form-kompetensi-dasar').trigger('reset');

            // tutup modal
            $('#modalKompetensiDasar').modal('hide');

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
function btnModalUbah(id_kompetensi_dasar) {
    getMataPelajaran();
    $('#modalKompetensiDasarLabel').html('Ubah Kompetensi Dasar');
    $('#btn-modalKompetensiDasar').html('Ubah');

    let data = new FormData();
    data.append('id_kompetensi_dasar', id_kompetensi_dasar);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kompetensi_dasar/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_kompetensi_dasar').val(responsdata.id_kompetensi_dasar);
            $('#id_mata_pelajaran').val(responsdata.id_mata_pelajaran).trigger('change');
            $('#kode_kompetensi_dasar').val(responsdata.kode_kompetensi_dasar);
            $('#jenis_kompetensi_dasar').val(responsdata.jenis_kompetensi_dasar).trigger('change');
            $('#kompetensi_dasar').val(responsdata.kompetensi_dasar);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_kompetensi_dasar = $('#id_kompetensi_dasar').val();
    const id_mata_pelajaran = $('#id_mata_pelajaran').val();
    const kode_kompetensi_dasar = $('#kode_kompetensi_dasar').val();
    const jenis_kompetensi_dasar = $('#jenis_kompetensi_dasar').val();
    const kompetensi_dasar = $('#kompetensi_dasar').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_kompetensi_dasar', id_kompetensi_dasar);
    data.append('kode_kompetensi_dasar', kode_kompetensi_dasar);
    data.append('jenis_kompetensi_dasar', jenis_kompetensi_dasar);
    data.append('kompetensi_dasar', kompetensi_dasar);

    let arr_field = [id_mata_pelajaran, kode_kompetensi_dasar, kompetensi_dasar];
    let arr_name = ["Mata Pelajaran", "Kode Kompetensi Dasar", "Kompetensi Dasar"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kompetensi_dasar/ubah',
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
            $('#form-kompetensi-dasar').trigger('reset');
            // tutup modal
            $('#modalKompetensiDasar').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_kompetensi_dasar) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_kompetensi_dasar)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_kompetensi_dasar) {
    let data = new FormData();
    data.append('id_kompetensi_dasar', id_kompetensi_dasar);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kompetensi_dasar/hapus',
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