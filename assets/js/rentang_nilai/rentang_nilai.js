const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalRentangNilaiLabel').html('Tambah Rentang Nilai');
            $('#btn-modalRentangNilai').html('Tambah');

        });


        $('#btn-modalRentangNilai').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });

        $('.batal-rentang-nilai').on('click', function () {
            $('#form-rentang-nilai').trigger('reset');
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
                url: "admin/rentang_nilai/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, { "targets": [0, 1, 2, 3, 4, 5], "className": 'text-center' }]
        });


    });
});


function tambah() {

    // ambil data dari elemen html
    const dari_rentang_nilai = $('#dari_rentang_nilai').val();
    const sampai_rentang_nilai = $('#sampai_rentang_nilai').val();
    const predikat_rentang_nilai = $('#predikat_rentang_nilai').val();
    const keterangan_rentang_nilai = $('#keterangan_rentang_nilai').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('dari_rentang_nilai', dari_rentang_nilai);
    data.append('sampai_rentang_nilai', sampai_rentang_nilai);
    data.append('predikat_rentang_nilai', predikat_rentang_nilai);
    data.append('keterangan_rentang_nilai', keterangan_rentang_nilai);

    let arr_field = [dari_rentang_nilai, sampai_rentang_nilai, predikat_rentang_nilai, keterangan_rentang_nilai];
    let arr_name = ["Dari", "Sampai", "Predikat", "Keterangan"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/rentang_nilai/tambah',
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
            $('#form-rentang-nilai').trigger('reset');
            // tutup modal
            $('#modalRentangNilai').modal('hide');

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
function btnModalUbah(id_rentang_nilai) {
    $('#modalRentangNilaiLabel').html('Ubah Rentang Nilai');
    $('#btn-modalRentangNilai').html('Ubah');

    let data = new FormData();
    data.append('id_rentang_nilai', id_rentang_nilai);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/rentang_nilai/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_rentang_nilai').val(responsdata.id_rentang_nilai);
            $('#dari_rentang_nilai').val(responsdata.dari_rentang_nilai);
            $('#sampai_rentang_nilai').val(responsdata.sampai_rentang_nilai);
            $('#predikat_rentang_nilai').val(responsdata.predikat_rentang_nilai);
            $('#keterangan_rentang_nilai').val(responsdata.keterangan_rentang_nilai);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_rentang_nilai = $('#id_rentang_nilai').val();
    const dari_rentang_nilai = $('#dari_rentang_nilai').val();
    const sampai_rentang_nilai = $('#sampai_rentang_nilai').val();
    const predikat_rentang_nilai = $('#predikat_rentang_nilai').val();
    const keterangan_rentang_nilai = $('#keterangan_rentang_nilai').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_rentang_nilai', id_rentang_nilai);
    data.append('dari_rentang_nilai', dari_rentang_nilai);
    data.append('sampai_rentang_nilai', sampai_rentang_nilai);
    data.append('predikat_rentang_nilai', predikat_rentang_nilai);
    data.append('keterangan_rentang_nilai', keterangan_rentang_nilai);


    let arr_field = [dari_rentang_nilai, sampai_rentang_nilai, predikat_rentang_nilai, keterangan_rentang_nilai];
    let arr_name = ["Dari", "Sampai", "Predikat", "Keterangan"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/rentang_nilai/ubah',
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
            $('#form-rentang-nilai').trigger('reset');
            // tutup modal
            $('#modalRentangNilai').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function btnModalHapus(id_rentang_nilai) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_rentang_nilai)

        } else {
            // NO

        }
    });
}

function aksiHapus(id_rentang_nilai) {
    let data = new FormData();
    data.append('id_rentang_nilai', id_rentang_nilai);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/rentang_nilai/hapus',
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