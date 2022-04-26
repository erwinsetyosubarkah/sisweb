const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalMataPelajaranLabel').html('Tambah Mata Pelajaran');
            $('#btn-modalMataPelajaran').html('Tambah');
            getTingkat();
            getGuru();

        });


        $('#btn-modalMataPelajaran').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-mata-pelajaran').on('click', function () {
            $('#form-mata-pelajaran').trigger('reset');
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
                url: "admin/mata_pelajaran/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, { "targets": [0, 2, 3, 4, 5], "className": 'text-center' }]
        });

    });
});

function getTingkat() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/mata_pelajaran/getTingkat',
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

function getGuru() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/mata_pelajaran/getGuru',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_guru').html(responsdata);
        }
    });
}

function tambah() {

    // ambil data dari elemen html
    const mata_pelajaran = $('#mata_pelajaran').val();
    const id_tingkat = $('#id_tingkat').val();
    const id_guru = $('#id_guru').val();
    const kkm_mata_pelajaran = $('#kkm_mata_pelajaran').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('mata_pelajaran', mata_pelajaran);
    data.append('id_tingkat', id_tingkat);
    data.append('id_guru', id_guru);
    data.append('kkm_mata_pelajaran', kkm_mata_pelajaran);

    let arr_field = [mata_pelajaran, id_tingkat, id_guru, kkm_mata_pelajaran];
    let arr_name = ["Mata Pelajaran", "Tingkat", "Guru", "KKM"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/mata_pelajaran/tambah',
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
            $('#form-mata-pelajaran').trigger('reset');

            // tutup modal
            $('#modalMataPelajaran').modal('hide');

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
function btnModalUbah(id_mata_pelajaran) {
    getTingkat();
    getGuru();
    $('#modalMataPelajaranLabel').html('Ubah Mata Pelajaran');
    $('#btn-modalMataPelajaran').html('Ubah');

    let data = new FormData();
    data.append('id_mata_pelajaran', id_mata_pelajaran);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/mata_pelajaran/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_mata_pelajaran').val(responsdata.id_mata_pelajaran);
            $('#mata_pelajaran').val(responsdata.mata_pelajaran);
            $('#id_tingkat').val(responsdata.id_tingkat).trigger('change');
            $('#id_guru').val(responsdata.id_guru).trigger('change');
            $('#kkm_mata_pelajaran').val(responsdata.kkm_mata_pelajaran);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_mata_pelajaran = $('#id_mata_pelajaran').val();
    const mata_pelajaran = $('#mata_pelajaran').val();
    const id_tingkat = $('#id_tingkat').val();
    const id_guru = $('#id_guru').val();
    const kkm_mata_pelajaran = $('#kkm_mata_pelajaran').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_mata_pelajaran', id_mata_pelajaran);
    data.append('mata_pelajaran', mata_pelajaran);
    data.append('id_tingkat', id_tingkat);
    data.append('id_guru', id_guru);
    data.append('kkm_mata_pelajaran', kkm_mata_pelajaran);

    let arr_field = [mata_pelajaran, id_tingkat, id_guru, kkm_mata_pelajaran];
    let arr_name = ["Mata Pelajaran", "Tingkat", "Guru", "KKM"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/mata_pelajaran/ubah',
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
            $('#form-mata-pelajaran').trigger('reset');
            // tutup modal
            $('#modalMataPelajaran').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_mata_pelajaran) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_mata_pelajaran)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_mata_pelajaran) {
    let data = new FormData();
    data.append('id_mata_pelajaran', id_mata_pelajaran);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/mata_pelajaran/hapus',
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