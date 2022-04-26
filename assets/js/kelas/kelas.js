const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalKelasLabel').html('Tambah Kelas');
            $('#btn-modalKelas').html('Tambah');
            getTingkat();
            getGuru();
            getRuangan();

        });


        $('#btn-modalKelas').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-kelas').on('click', function () {
            $('#form-kelas').trigger('reset');
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
                url: "admin/kelas/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 8],
                "orderable": false,
            }, { "targets": [0, 1, 2, 3, 5, 6, 7, 8], "className": 'text-center' }]
        });

    });
});

function getGuru() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kelas/getGuru',
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
function getRuangan() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kelas/getRuangan',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_ruangan').html(responsdata);
        }
    });
}
function getTingkat() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kelas/getTingkat',
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
    const id_tingkat = $('#id_tingkat').val();
    const id_ruangan = $('#id_ruangan').val();
    const id_guru = $('#id_guru').val();
    const kelas = $('#kelas').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_tingkat', id_tingkat);
    data.append('id_ruangan', id_ruangan);
    data.append('id_guru', id_guru);
    data.append('kelas', kelas);

    let arr_field = [kelas];
    let arr_name = ["Kelas"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kelas/tambah',
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
            $('#form-kelas').trigger('reset');

            // tutup modal
            $('#modalKelas').modal('hide');

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
function btnModalUbah(id_kelas) {
    getTingkat();
    getGuru();
    getRuangan();
    $('#modalKelasLabel').html('Ubah Kelas');
    $('#btn-modalKelas').html('Ubah');

    let data = new FormData();
    data.append('id_kelas', id_kelas);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kelas/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_kelas').val(responsdata.id_kelas);
            $('#id_tingkat').val(responsdata.id_tingkat).trigger('change');
            $('#id_ruangan').val(responsdata.id_ruangan).trigger('change');
            $('#id_guru').val(responsdata.id_guru).trigger('change');
            $('#kelas').val(responsdata.kelas);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_kelas = $('#id_kelas').val();
    const id_tingkat = $('#id_tingkat').val();
    const id_ruangan = $('#id_ruangan').val();
    const id_guru = $('#id_guru').val();
    const kelas = $('#kelas').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_kelas', id_kelas);
    data.append('id_tingkat', id_tingkat);
    data.append('id_ruangan', id_ruangan);
    data.append('id_guru', id_guru);
    data.append('kelas', kelas);

    let arr_field = [kelas];
    let arr_name = ["Kelas"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kelas/ubah',
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
            $('#form-kelas').trigger('reset');
            // tutup modal
            $('#modalKelas').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_kelas) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_kelas)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_kelas) {
    let data = new FormData();
    data.append('id_kelas', id_kelas);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/kelas/hapus',
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