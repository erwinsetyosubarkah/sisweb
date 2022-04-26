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
                "url": "admin/input_nilai_rapor/queryAllSiswaKelas",
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
                "targets": [0, 5, 6, 7],
                "orderable": false,
            }, { "targets": [0, 1, 2, 4, 5, 6, 7], "className": 'text-center' }]
        });


        $('#btn-input-nilai-rapor').click(function () {
            input();
        });


    });
});



function input() {
    var data = dataTable.$('input, select').serializeArray();
    var jml_baris = data.length / 3;
    var data1 = [];
    var awal = 0;
    var awal2 = 1;
    var awal3 = 2;

    for (var i = 1; i <= jml_baris; i++) {


        data1[i - 1] = {
            'id_siswa': data[awal].value,
            'id_agenda_mengajar': $('#id_agenda_mengajar').val(),
            'pengetahuan_nilai': data[awal2].value,
            'keterampilan_nilai': data[awal3].value

        };

        awal = i * 3;
        awal2 = awal + 1;
        awal3 = awal + 2;
    }
    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/input_nilai_rapor/inputNilaiRapor',
        type: 'POST',
        data: { 'nilai': data1 },
        enctype: 'multipart/form-data',
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);


            //refresh table
            dataTable.ajax.reload();
        }
    });
}




