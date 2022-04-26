const baseurl = document.getElementById('baseurl').value;
let dataTable;

window.addEventListener('load', function () {
    $(document).ready(function () {


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


        dataTable = $('#dataTable').DataTable({
            "language": {
                "url": baseurl + "assets/sbadmin/vendor/datatables/Indonesian.json",
                "sEmptyTable": "Tidak ada data di database"
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "admin/input_nilai_extrakurikuler/queryAllSiswaKelas",
                "method": "POST",
                "data": function (data) {
                    // Read values

                    var id_kelas = $('#id_kelas').val();

                    // Append to data
                    data.id_kelas = id_kelas;

                }

            },
            "columnDefs": [{
                "targets": [0, 5, 6],
                "orderable": false,
            }, { "targets": [0, 1, 2, 4, 5, 6], "className": 'text-center' }]
        });


        $('#btn-input-nilai-extrakurikuler').click(function () {

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
            'id_tahun_pelajaran': $('#id_tahun_pelajaran').val(),
            'id_semester': $('#id_semester').val(),
            'nama_extrakurikuler': data[awal2].value,
            'nilai_extrakurikuler': data[awal3].value

        };

        awal = i * 3;
        awal2 = awal + 1;
        awal3 = awal + 2;
    }
    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/input_nilai_extrakurikuler/inputNilaiExtrakurikuler',
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




