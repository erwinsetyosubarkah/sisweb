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
                "url": "admin/rekap_absensi/queryAll",
                "method": "POST",
                "data": function (data) {
                    // Read values

                    var id_kelas = $('#id_kelas').val();

                    // Append to data

                    data.id_kelas = id_kelas;

                }

            },
            "columnDefs": [{
                "targets": [0, 3],
                "orderable": false,
            }, { "targets": [0, 3], "className": 'text-center' }]
        });

    });
});








