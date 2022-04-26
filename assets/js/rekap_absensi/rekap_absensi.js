const baseurl = document.getElementById('baseurl').value;
let dataTable;

window.addEventListener('load', function () {
    $(document).ready(function () {

        let id_kelas = $('#id_kelas').val();
        let id_agenda_mengajar = $('#id_agenda_mengajar').val();


        dataTable = $('#dataTable').DataTable({
            "language": {
                "url": baseurl + "assets/sbadmin/vendor/datatables/Indonesian.json",
                "sEmptyTable": "Tidak ada data di database"
            },
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "admin/rekap_absensi/queryAllSiswaKelas",
                "method": "POST",
                "data": function (data) {
                    // Read values

                    var id_kelas = $('#id_kelas').val();
                    var id_mata_pelajaran = $('#id_mata_pelajaran').val();

                    // Append to data
                    data.id_kelas = id_kelas;
                    data.id_mata_pelajaran = id_mata_pelajaran;

                }
            },
            "columnDefs": [{
                "targets": [0, 5, 6, 7, 8, 9, 10],
                "orderable": false,
            }, { "targets": [0, 1, 2, 4, 5, 6, 7, 8, 9, 10], "className": 'text-center' }]
        });





    });
});








