const baseurl = document.getElementById('baseurl').value;
let dataTable;
window.addEventListener('load', function () {
    $(document).ready(function () {

        $('#btn-tambahModal').on('click', function () {
            $('#modalSliderLabel').html('Tambah Slider');
            $('#btn-modalSlider').html('Tambah');
            getKategori();

        });

        $('.batal-slider').on('click', function () {
            clearURL($('#slider'));
        });


        $('#slider').change(function () {
            readURL(this);
        });

        $('#btn-modalSlider').on('click', function (e) {
            e.preventDefault();
            if ($(this).html() == 'Tambah') {
                tambah();

            } else if ($(this).html() == 'Ubah') {
                ubah();
            }

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
                url: "admin/slider/queryAll",
                method: "POST"
            },
            "columnDefs": [{
                "targets": [0, 2, 5],
                "orderable": false,
            }, { "targets": [0, 2, 3, 4, 5], "className": 'text-center' }]
        });

    });
});


function clearURL(input) {
    var txt = '<img src="" alt="" style="height: 80px;" id="img_slider">';
    $('.slider-prev').html(txt);

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_slider').attr('src', '');
        }

        reader.readAsDataURL(input.files[0]);
    }
    $('#form-slider').trigger('reset');
}



function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#img_slider').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function tambah() {

    // ambil data dari elemen html
    const judul_slider = $('#judul_slider').val();
    const slider = $('#slider').prop('files')[0];
    const tgl_upload_slider = $('#tgl_upload_slider').val();
    const id_author_slider = $('#id_author_slider').val();
    const level_author_slider = $('#level_author_slider').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('judul_slider', judul_slider);
    data.append('slider', slider);
    data.append('tgl_upload_slider', tgl_upload_slider);
    data.append('id_author_slider', id_author_slider);
    data.append('level_author_slider', level_author_slider);


    let arr_field = [judul_slider];
    let arr_name = ["Judul Slider"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/slider/tambah',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);
            //reset isi form
            $('#form-slider').trigger('reset');
            clearURL($('#slider'));
            // tutup modal
            $('#modalSlider').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}


function cekValidasiForm(data, name) {
    let pesan_validasi = '';
    let feedback = '';
    for (var i = 0; i < data.length; i++) {
        if (data[i] == '') {
            pesan_validasi = 'Data ' + name[i] + ' tidak boleh kosong.';
        }
    }

    if (pesan_validasi != '') {
        alertData('error', 'Validasi Gagal...!', pesan_validasi);
        feedback = 'gagal';
    }
    return feedback;

}


//fungsi untuk mengeset value pada modal ubah
function btnModalUbah(id_slider) {
    $('#modalSliderLabel').html('Ubah Slider');
    $('#btn-modalSlider').html('Ubah');

    let data = new FormData();
    data.append('id_slider', id_slider);

    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/slider/queryById',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            $('#id_slider').val(responsdata.id_slider);
            $('#judul_slider').val(responsdata.judul_slider);
            $('#slider_lama').val(responsdata.slider);
            $('#img_slider').attr('src', baseurl + 'assets/img/gambar/images/' + responsdata.slider);
            $('tgl_upload_slider').val(responsdata.tgl_upload_slider);
            $('id_author_slider').val(responsdata.id_author_slider);
            $('level_author_slider').val(responsdata.level_author_slider);

        }
    });

}

function ubah() {

    // ambil data dari elemen html
    const id_slider = $('#id_slider').val();
    const judul_slider = $('#judul_slider').val();
    const slider_lama = $('#slider_lama').val();
    const slider = $('#slider').prop('files')[0];
    const tgl_upload_slider = $('#tgl_upload_slider').val();
    const id_author_slider = $('#id_author_slider').val();
    const level_author_slider = $('#level_author_slider').val();


    // simpan data dalam bentuk object dengan nama data
    let data = new FormData();
    data.append('id_slider', id_slider);
    data.append('judul_slider', judul_slider);
    data.append('slider_lama', slider_lama);
    data.append('slider', slider);
    data.append('tgl_upload_slider', tgl_upload_slider);
    data.append('id_author_slider', id_author_slider);
    data.append('level_author_slider', level_author_slider);

    let arr_field = [judul_slider];
    let arr_name = ["Judul Slider"];
    let hasil_cek = cekValidasiForm(arr_field, arr_name);
    if (hasil_cek == 'gagal') {
        return 'false';
    }


    //jalankan ajax
    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/slider/ubah',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);
            //reset isi form
            clearURL($('#slider'));
            // tutup modal
            $('#modalSlider').modal('hide');

            //refresh table
            dataTable.ajax.reload();
        }
    });
}

function btnModalHapus(id_slider) {
    let tipe = 'warning';
    let title = 'Konfirmasi!';
    let pesan = 'Yakin akan menghapus data ini?';
    let textBtn = 'Ya, Hapus...!';
    alertConfirm(tipe, title, pesan, textBtn, function (confirmed) {
        if (confirmed) {
            // YES
            aksiHapus(id_slider)

        } else {
            // NO

        }
    });
}


function aksiHapus(id_slider) {
    let data = new FormData();
    data.append('id_slider', id_slider);

    $.ajax({
        //Alamat url harap disesuaikan dengan lokasi script pada komputer anda
        url: 'admin/slider/hapus',
        type: 'POST',
        enctype: 'multipart/form-data',
        data: data,
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'JSON',
        success: function (responsdata) {
            alertData(responsdata.status, responsdata.title, responsdata.pesan);

            //refresh table
            dataTable.ajax.reload();
        }
    });
}