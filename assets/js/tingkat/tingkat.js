const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalTingkatLabel').html('Tambah Tingkat');
            $('#btn-modalTingkat').html('Tambah');

        });


        $('#btn-modalTingkat').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-tingkat').on('click', function () {
            $('#form-tingkat').trigger('reset');
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
                url: "admin/tingkat/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 2],
                "orderable": false,
            }, { "targets": [0, 1, 2], "className": 'text-center' }]
        });


    });
});


function tambah() {

    // ambil data dari elemen html
    const tingkat = $('#tingkat').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('tingkat', tingkat);

    let arr_field = [tingkat];
    let arr_name = ["Tingkat"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tingkat/tambah',
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
            $('#form-tingkat').trigger('reset');
            // tutup modal
            $('#modalTingkat').modal('hide');

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
function btnModalUbah(id_tingkat) {
    $('#modalTingkatLabel').html('Ubah Tingkat');
    $('#btn-modalTingkat').html('Ubah');

    let data = new FormData();
    data.append('id_tingkat', id_tingkat);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tingkat/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_tingkat').val(responsdata.id_tingkat);
            $('#tingkat').val(responsdata.tingkat);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_tingkat = $('#id_tingkat').val();
    const tingkat = $('#tingkat').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_tingkat', id_tingkat);
    data.append('tingkat', tingkat);


    let arr_field = [tingkat];
    let arr_name = ["Tingkat"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tingkat/ubah',
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
            $('#form-tingkat').trigger('reset');
            // tutup modal
            $('#modalTingkat').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_tingkat) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_tingkat)

        } else {
            // NO

        }
    });
}

function aksiHapus(id_tingkat) {
    let data = new FormData();
    data.append('id_tingkat', id_tingkat);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tingkat/hapus',
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