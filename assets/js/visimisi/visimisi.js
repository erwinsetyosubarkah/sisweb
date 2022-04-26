window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#simpan').on('click', function (e) {
            e.preventDefault();
            // ambil data dari ckeditor
            const visi_misi = CKEDITOR.instances['visi_misi'].getData();

            // simpan data dalam bentuk object dengan nama data
            var data = new FormData();
            data.append('visi_misi', visi_misi);


            //jalankan ajax
            $.ajax({
                //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
                url: 'admin/visimisi/ubah',
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
        url: 'admin/visimisi/query',
        type: 'POST',
        enctype: 'multipart/form-data',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            CKEDITOR.instances['visi_misi'].setData(responsdata.visi_misi);
        }
    })
}