const baseurl = document.getElementById('baseurl').value;
let dataTable;

window.addEventListener('load', function () {
    $(document).ready(function () {


        $('#btn-tambahModal').on('click', function () {
            getMataPelajaran();
            $('#modalJadwalPelajaranLabel').html('Tambah Jadwal Pelajaran');
            $('#btn-modalJadwalPelajaran').html('Tambah');

        });



        $('#btn-modalJadwalPelajaran').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });


        $('.batal-jadwal-pelajaran').on('click', function () {
            $('#form-jadwal-pelajaran').trigger('reset');
        });

        $('#id_tahun_pelajaran').on('change', function () {
            //refresh table
            dataTable.draw();
        });

        $('#id_semester').on('change', function () {
            //refresh table
            dataTable.draw();
        });

        $('#id_kelas').on('change', function () {
            //refresh table
            dataTable.draw();
        });

        $('#hari_jadwal_pelajaran2').on('change', function () {
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
                "url": "admin/jadwal_pelajaran/queryAll",
                "method": "POST",
                "data": function (data) {
                    // Read values
                    var id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
                    var id_semester = $('#id_semester').val();
                    var id_kelas = $('#id_kelas').val();
                    var hari_jadwal_pelajaran = $('#hari_jadwal_pelajaran2').val();

                    // Append to data
                    data.id_tahun_pelajaran = id_tahun_pelajaran;
                    data.id_semester = id_semester;
                    data.id_kelas = id_kelas;
                    data.hari_jadwal_pelajaran = hari_jadwal_pelajaran;

                }

            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false,
            }, { "targets": [0, 1, 2, 3, 4, 5, 6, 7, 10, 11], "className": 'text-center' }]
        });

    });
});



function getMataPelajaran() {

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/jadwal_pelajaran/getMataPelajaran',
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



function tambah() {

    // ambil data dari elemen html
    const id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
    const id_semester = $('#id_semester').val();
    const id_kelas = $('#id_kelas').val();
    const hari_jadwal_pelajaran = $('#hari_jadwal_pelajaran').val();
    const jam_ke_jadwal_pelajaran = $('#jam_ke_jadwal_pelajaran').val();
    const id_mata_pelajaran = $('#id_mata_pelajaran').val();
    const mulai_jadwal_pelajaran = $('#mulai_jadwal_pelajaran').val();
    const selesai_jadwal_pelajaran = $('#selesai_jadwal_pelajaran').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_tahun_pelajaran', id_tahun_pelajaran);
    data.append('id_semester', id_semester);
    data.append('id_kelas', id_kelas);
    data.append('hari_jadwal_pelajaran', hari_jadwal_pelajaran);
    data.append('jam_ke_jadwal_pelajaran', jam_ke_jadwal_pelajaran);
    data.append('id_mata_pelajaran', id_mata_pelajaran);
    data.append('mulai_jadwal_pelajaran', mulai_jadwal_pelajaran);
    data.append('selesai_jadwal_pelajaran', selesai_jadwal_pelajaran);

    let arr_field = [mulai_jadwal_pelajaran, selesai_jadwal_pelajaran];
    let arr_name = ["Mulai", "Selesai"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/jadwal_pelajaran/tambah',
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
            $('#form-jadwal-pelajaran').trigger('reset');

            // tutup modal
            $('#modalJadwalPelajaran').modal('hide');

            //refresh table
            dataTable.ajax.reload();
            dataTable.draw();
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
function btnModalUbah(id_jadwal_pelajaran) {
    getMataPelajaran();
    $('#modalJadwalPelajaranLabel').html('Ubah Jadwal Pelajaran');
    $('#btn-modalJadwalPelajaran').html('Ubah');

    let data = new FormData();
    data.append('id_jadwal_pelajaran', id_jadwal_pelajaran);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/jadwal_pelajaran/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_jadwal_pelajaran').val(responsdata.id_jadwal_pelajaran);
            $('#hari_jadwal_pelajaran').val(responsdata.hari_jadwal_pelajaran).trigger('change');
            $('#jam_ke_jadwal_pelajaran').val(responsdata.jam_ke_jadwal_pelajaran).trigger('change');
            $('#id_mata_pelajaran').val(responsdata.id_mata_pelajaran).trigger('change');
            $('#mulai_jadwal_pelajaran').val(responsdata.mulai_jadwal_pelajaran);
            $('#selesai_jadwal_pelajaran').val(responsdata.selesai_jadwal_pelajaran);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_jadwal_pelajaran = $('#id_jadwal_pelajaran').val();
    const id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
    const id_semester = $('#id_semester').val();
    const id_kelas = $('#id_kelas').val();
    const hari_jadwal_pelajaran = $('#hari_jadwal_pelajaran').val();
    const jam_ke_jadwal_pelajaran = $('#jam_ke_jadwal_pelajaran').val();
    const id_mata_pelajaran = $('#id_mata_pelajaran').val();
    const mulai_jadwal_pelajaran = $('#mulai_jadwal_pelajaran').val();
    const selesai_jadwal_pelajaran = $('#selesai_jadwal_pelajaran').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_jadwal_pelajaran', id_jadwal_pelajaran);
    data.append('id_tahun_pelajaran', id_tahun_pelajaran);
    data.append('id_semester', id_semester);
    data.append('id_kelas', id_kelas);
    data.append('hari_jadwal_pelajaran', hari_jadwal_pelajaran);
    data.append('jam_ke_jadwal_pelajaran', jam_ke_jadwal_pelajaran);
    data.append('id_mata_pelajaran', id_mata_pelajaran);
    data.append('mulai_jadwal_pelajaran', mulai_jadwal_pelajaran);
    data.append('selesai_jadwal_pelajaran', selesai_jadwal_pelajaran);

    let arr_field = [mulai_jadwal_pelajaran, selesai_jadwal_pelajaran];
    let arr_name = ["Mulai", "Selesai"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/jadwal_pelajaran/ubah',
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
            $('#form-jadwal-pelajaran').trigger('reset');
            // tutup modal
            $('#modalJadwalPelajaran').modal('hide');

            //refresh table
            dataTable.ajax.reload();
            dataTable.draw();
        }
    });
}


function btnModalHapus(id_jadwal_pelajaran) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_jadwal_pelajaran)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_jadwal_pelajaran) {
    let data = new FormData();
    data.append('id_jadwal_pelajaran', id_jadwal_pelajaran);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/jadwal_pelajaran/hapus',
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
            dataTable.draw();
        }
    });
}