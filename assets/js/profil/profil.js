window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#simpan').on('click', function (e) {
            e.preventDefault();
            // ambil data dari ckeditor
            const profil = CKEDITOR.instances['profil'].getData();

            // simpan data dalam bentuk object dengan nama data
            var data = new FormData();
            data.append('profil', profil);


            //jalankan ajax
            $.ajax({
                //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
                url: 'admin/profil/ubah',
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
        url: 'admin/profil/query',
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            CKEDITOR.instances['profil'].setData(responsdata.profil);
        }
    })
}