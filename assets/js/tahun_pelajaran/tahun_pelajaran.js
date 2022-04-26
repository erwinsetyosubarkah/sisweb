const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalTahunPelajaranLabel').html('Tambah Tahun Pelajaran');
            $('#btn-modalTahunPelajaran').html('Tambah');

        });


        $('#btn-modalTahunPelajaran').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });


        $('.batal-tahun-pelajaran').on('click', function () {
            $('#form-tahun-pelajaran').trigger('reset');
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
                url: "admin/tahun_pelajaran/queryAll",
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
    const tahun_pelajaran = $('#tahun_pelajaran').val();
    const status_tahun_pelajaran = $('#status_tahun_pelajaran').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('tahun_pelajaran', tahun_pelajaran);
    data.append('status_tahun_pelajaran', status_tahun_pelajaran);


    let arr_field = [tahun_pelajaran];
    let arr_name = ["Tahun Pelajaran"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tahun_pelajaran/tambah',
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
            $('#form-tahun-pelajaran').trigger('reset');
            // tutup modal
            $('#modalTahunPelajaran').modal('hide');

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
function btnModalUbah(id_tahun_pelajaran) {
    $('#modalTahunPelajaranLabel').html('Ubah Tahun Pelajaran');
    $('#btn-modalTahunPelajaran').html('Ubah');

    let data = new FormData();
    data.append('id_tahun_pelajaran', id_tahun_pelajaran);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tahun_pelajaran/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_tahun_pelajaran').val(responsdata.id_tahun_pelajaran);
            $('#tahun_pelajaran').val(responsdata.tahun_pelajaran);
            $('#status_tahun_pelajaran').val(responsdata.status_tahun_pelajaran).trigger('change');

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
    const tahun_pelajaran = $('#tahun_pelajaran').val();
    const status_tahun_pelajaran = $('#status_tahun_pelajaran').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_tahun_pelajaran', id_tahun_pelajaran);
    data.append('tahun_pelajaran', tahun_pelajaran);
    data.append('status_tahun_pelajaran', status_tahun_pelajaran);


    let arr_field = [tahun_pelajaran];
    let arr_name = ["Tahun Pelajaran"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tahun_pelajaran/ubah',
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
            $('#form-tahun-pelajaran').trigger('reset');
            // tutup modal
            $('#modalTahunPelajaran').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_tahun_pelajaran) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_tahun_pelajaran)

        } else {
            // NO

        }
    });
}

function aksiHapus(id_tahun_pelajaran) {
    let data = new FormData();
    data.append('id_tahun_pelajaran', id_tahun_pelajaran);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/tahun_pelajaran/hapus',
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