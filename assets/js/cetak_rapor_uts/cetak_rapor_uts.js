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
                "url": "admin/cetak_rapor_uts/queryAllSiswaKelas",
                "method": "POST",
                "data": function (data) {
                    // Read values

                    var id_kelas = $('#id_kelas').val();
                    var id_tahun_pelajaran = $('#id_tahun_pelajaran').val();
                    var id_semester = $('#id_semester').val();

                    // Append to data
                    data.id_kelas = id_kelas;
                    data.id_tahun_pelajaran = id_tahun_pelajaran;
                    data.id_semester = id_semester;

                }

            },
            "columnDefs": [{
                "targets": [0, 5],
                "orderable": false,
            }, { "targets": [0, 1, 2, 4, 5], "className": 'text-center' }]
        });


    });
});








