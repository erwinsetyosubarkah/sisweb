window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#simpan').on('click', function (e) {
            e.preventDefault();
            // ambil data dari ckeditor
            const sejarah = CKEDITOR.instances['sejarah'].getData();

            // simpan data dalam bentuk object dengan nama data
            var data = new FormData();
            data.append('sejarah', sejarah);


            //jalankan ajax
            $.ajax({
                //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
                url: 'admin/sejarah/ubah',
                type: 'POST',
                enctype: 'multipart/form-data',
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'JSON',
                success: function (responsdata) {
                    alertData(responsdata.status, responsdata.title, responsdata.pesan);

                }
            });
        });

        query();

    });
});

function query() {
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/sejarah/query',
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            CKEDITOR.instances['sejarah'].setData(responsdata.sejarah);

        }
    })
}