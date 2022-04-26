const baseurl = document.getElementById('baseurl').value;
let dataTable;

window.addEventListener('load', function () {
    $(document).ready(function () {


        $('#btn-tambahModal').on('click', function () {
            getKompetensiDasarByMapel();
            $('#modalAgendaMengajarLabel').html('Tambah Agenda Mengajar');
            $('#btn-modalAgendaMengajar').html('Tambah');

        });



        $('#btn-modalAgendaMengajar').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

        });


        $('.batal-agenda-mengajar').on('click', function () {
            $('#form-agenda-mengajar').trigger('reset');
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

        $('#hari_agenda_mengajar2').on('change', function () {
            //refresh table
            dataTable.draw();
        });

        $('#id_mata_pelajaran').on('change', function () {
            getKompetensiDasarByMapel();

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
                "url": "admin/agenda_mengajar/queryAll",
                "method": "POST",
                "data": function (data) {
                    // Read values
                    var id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
                    var id_semester = $('#id_semester').val();
                    var id_kelas = $('#id_kelas').val();
                    var hari_agenda_mengajar = $('#hari_agenda_mengajar2').val();

                    // Append to data
                    data.id_tahun_pelajaran = id_tahun_pelajaran;
                    data.id_semester = id_semester;
                    data.id_kelas = id_kelas;
                    data.hari_agenda_mengajar = hari_agenda_mengajar;

                }

            },
            "columnDefs": [{
                "targets": [0, 10],
                "orderable": false,
            }, { "targets": [0, 1, 2, 3, 4, 5, 6, 9, 10], "className": 'text-center' }]
        });

    });
});




function getKompetensiDasarByMapel() {
    const id_mata_pelajaran = $('#id_mata_pelajaran').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_mata_pelajaran', id_mata_pelajaran);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/agenda_mengajar/getKompetensiDasarByMapel',
        type: 'POST',
        processData: false,
        contentType: false,
        cache: false,
        data: data,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_kompetensi_dasar').html(responsdata);
        }
    });
}



function tambah() {

    // ambil data dari elemen html
    const id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
    const id_semester = $('#id_semester').val();
    const id_kelas = $('#id_kelas').val();
    const id_kompetensi_dasar = $('#id_kompetensi_dasar').val();
    const id_mata_pelajaran = $('#id_mata_pelajaran').val();
    const hari_agenda_mengajar = $('#hari_agenda_mengajar').val();
    const tanggal_agenda_mengajar = $('#tanggal_agenda_mengajar').val();
    const pertemuan_ke_agenda_mengajar = $('#pertemuan_ke_agenda_mengajar').val();
    const materi_agenda_mengajar = $('#materi_agenda_mengajar').val();
    const keterangan_agenda_mengajar = $('#keterangan_agenda_mengajar').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_tahun_pelajaran', id_tahun_pelajaran);
    data.append('id_semester', id_semester);
    data.append('id_kelas', id_kelas);
    data.append('id_kompetensi_dasar', id_kompetensi_dasar);
    data.append('id_mata_pelajaran', id_mata_pelajaran);
    data.append('hari_agenda_mengajar', hari_agenda_mengajar);
    data.append('tanggal_agenda_mengajar', tanggal_agenda_mengajar);
    data.append('pertemuan_ke_agenda_mengajar', pertemuan_ke_agenda_mengajar);
    data.append('materi_agenda_mengajar', materi_agenda_mengajar);
    data.append('keterangan_agenda_mengajar', keterangan_agenda_mengajar);

    let arr_field = [id_mata_pelajaran, id_kompetensi_dasar, tanggal_agenda_mengajar, pertemuan_ke_agenda_mengajar, keterangan_agenda_mengajar];
    let arr_name = ["Mata Pelajaran", "Kompetensi Dasar", "Tanggal", "Pertemuan Ke", "Keterangan"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/agenda_mengajar/tambah',
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
            $('#form-agenda-mengajar').trigger('reset');

            // tutup modal
            $('#modalAgendaMengajar').modal('hide');

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
function btnModalUbah(id_agenda_mengajar) {
    getKompetensiDasarByMapel();
    $('#modalAgendaMengajarLabel').html('Ubah Agenda Mengajar');
    $('#btn-modalAgendaMengajar').html('Ubah');

    let data = new FormData();
    data.append('id_agenda_mengajar', id_agenda_mengajar);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/agenda_mengajar/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_agenda_mengajar').val(responsdata.id_agenda_mengajar);
            $('#id_mata_pelajaran').val(responsdata.id_mata_pelajaran).trigger('change');
            $('#id_kompetensi_dasar').val(responsdata.id_kompetensi_dasar).trigger('change');
            $('#hari_agenda_mengajar').val(responsdata.hari_agenda_mengajar).trigger('change');
            $('#tanggal_agenda_mengajar').val(responsdata.tanggal_agenda_mengajar);
            $('#pertemuan_ke_agenda_mengajar').val(responsdata.pertemuan_ke_agenda_mengajar);
            $('#materi_agenda_mengajar').val(responsdata.materi_agenda_mengajar);
            $('#keterangan_agenda_mengajar').val(responsdata.keterangan_agenda_mengajar).trigger('change');

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_agenda_mengajar = $('#id_agenda_mengajar').val();
    const id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
    const id_semester = $('#id_semester').val();
    const id_kelas = $('#id_kelas').val();
    const id_kompetensi_dasar = $('#id_kompetensi_dasar').val();
    const hari_agenda_mengajar = $('#hari_agenda_mengajar').val();
    const tanggal_agenda_mengajar = $('#tanggal_agenda_mengajar').val();
    const pertemuan_ke_agenda_mengajar = $('#pertemuan_ke_agenda_mengajar').val();
    const materi_agenda_mengajar = $('#materi_agenda_mengajar').val();
    const keterangan_agenda_mengajar = $('#keterangan_agenda_mengajar').val();

    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_agenda_mengajar', id_agenda_mengajar);
    data.append('id_tahun_pelajaran', id_tahun_pelajaran);
    data.append('id_semester', id_semester);
    data.append('id_kelas', id_kelas);
    data.append('id_kompetensi_dasar', id_kompetensi_dasar);
    data.append('hari_agenda_mengajar', hari_agenda_mengajar);
    data.append('tanggal_agenda_mengajar', tanggal_agenda_mengajar);
    data.append('pertemuan_ke_agenda_mengajar', pertemuan_ke_agenda_mengajar);
    data.append('materi_agenda_mengajar', materi_agenda_mengajar);
    data.append('keterangan_agenda_mengajar', keterangan_agenda_mengajar);

    let arr_field = [id_mata_pelajaran, id_kompetensi_dasar, tanggal_agenda_mengajar, pertemuan_ke_agenda_mengajar, keterangan_agenda_mengajar];
    let arr_name = ["Mata Pelajaran", "Kompetensi Dasar", "Tanggal", "Pertemuan Ke", "Keterangan"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/agenda_mengajar/ubah',
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
            $('#form-agenda-mengajar').trigger('reset');
            // tutup modal
            $('#modalAgendaMengajar').modal('hide');

            //refresh table
            dataTable.ajax.reload();
            dataTable.draw();
        }
    });
}


function btnModalHapus(id_agenda_mengajar) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_agenda_mengajar)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_agenda_mengajar) {
    let data = new FormData();
    data.append('id_agenda_mengajar', id_agenda_mengajar);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/agenda_mengajar/hapus',
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