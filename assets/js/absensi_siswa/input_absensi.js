const baseurl = document.getElementById('baseurl').value;
let dataTable;

window.addEventListener('load', function () {
    $(document).ready(function () {



        $('#id_kelas').on('change', function () {
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
                "url": "admin/absensi_siswa/queryAllSiswaKelas",
                "method": "POST",
                "data": function (data) {
                    // Read values

                    var id_kelas = $('#id_kelas').val();
                    var id_agenda_mengajar = $('#id_agenda_mengajar').val();

                    // Append to data
                    data.id_kelas = id_kelas;
                    data.id_agenda_mengajar = id_agenda_mengajar;

                }

            },
            "columnDefs": [{
                "targets": [0, 5, 6],
                "orderable": false,
            }, { "targets": [0, 1, 2, 4, 5, 6], "className": 'text-center' }]
        });


        $('#btn-input-absensi').click(function () {
            input();
        });




    });
});

function ubahWarna(id) {
    console.log('ok');
    let kehadiran = $('#select-' + id).val();
    if (kehadiran == "Hadir") {
        $('#select-' + id).css("background-color", "green");
        $('#select-' + id).css("color", "white");
    } else if (kehadiran == "Ijin") {
        $('#select-' + id).css("background-color", "orange");
        $('#select-' + id).css("color", "black");
    } else if (kehadiran == "Sakit") {
        $('#select-' + id).css("background-color", "yellow");
        $('#select-' + id).css("color", "black");
    } else if (kehadiran == "Alpa") {
        $('#select-' + id).css("background-color", "red");
        $('#select-' + id).css("color", "white");
    } else {
        $('#select-' + id).css("background-color", "white");
        $('#select-' + id).css("color", "black");
    }
}

function input() {
    var data = dataTable.$('input, select').serializeArray();
    var jml_baris = data.length / 2;
    var data1 = [];
    var awal = 0;
    var awal2 = 1;

    for (var i = 1; i <= jml_baris; i++) {


        data1[i - 1] = {
            'id_siswa': data[awal].value,
            'id_agenda_mengajar': $('#id_agenda_mengajar').val(),
            'kehadiran_absensi': data[awal2].value

        };

        awal = i * 2;
        awal2 = awal + 1;
    }
    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/absensi_siswa/inputAbsensi',
        type: 'POST',
        data: { 'absensi': data1 },
        enctype: 'multipart/form-data',
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);


            //refresh table
            dataTable.ajax.reload();
        }
    });
}




