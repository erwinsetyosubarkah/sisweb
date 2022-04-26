const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalSemesterLabel').html('Tambah Semester');
            $('#btn-modalSemester').html('Tambah');

        });


        $('#btn-modalSemester').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });


        $('.batal-semester').on('click', function () {
            $('#form-semester').trigger('reset');
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
                url: "admin/semester/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 3],
                "orderable": false,
            }, { "targets": [0, 1, 2, 3], "className": 'text-center' }]
        });


    });
});


function tambah() {

    // ambil data dari elemen html
    const semester = $('#semester').val();
    const status_semester = $('#status_semester').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('semester', semester);
    data.append('status_semester', status_semester);


    let arr_field = [semester];
    let arr_name = ["Semester"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/semester/tambah',
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
            $('#form-semester').trigger('reset');
            // tutup modal
            $('#modalSemester').modal('hide');

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
function btnModalUbah(id_semester) {
    $('#modalSemesterLabel').html('Ubah Semester');
    $('#btn-modalSemester').html('Ubah');

    let data = new FormData();
    data.append('id_semester', id_semester);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/semester/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_semester').val(responsdata.id_semester);
            $('#semester').val(responsdata.semester);
            $('#status_semester').val(responsdata.status_semester).trigger('change');

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_semester = $('#id_semester').val();
    const semester = $('#semester').val();
    const status_semester = $('#status_semester').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_semester', id_semester);
    data.append('semester', semester);
    data.append('status_semester', status_semester);


    let arr_field = [semester];
    let arr_name = ["Semester"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/semester/ubah',
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
            $('#form-semester').trigger('reset');
            // tutup modal
            $('#modalSemester').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_semester) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_semester)

        } else {
            // NO

        }
    });
}

function aksiHapus(id_semester) {
    let data = new FormData();
    data.append('id_semester', id_semester);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/semester/hapus',
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