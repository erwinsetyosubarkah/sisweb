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

        $('#hari_agenda_mengajar2').on('change', function () {
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
                "url": "admin/input_nilai_rapor/queryAll",
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
                "targets": [0, 11],
                "orderable": false,
            }, { "targets": [0, 1, 2, 3, 4, 5, 6, 9, 10, 11], "className": 'text-center' }]
        });

    });
});








