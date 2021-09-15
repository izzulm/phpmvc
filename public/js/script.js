//buat JQuery
$(function() {

    //set class untuk merubah tulisan judul modal di tombol ubah
    $('.tombolTambahData').on('click', function(){
        $('#judulModal').html('Tambah Data Mahasiswa');

        //supaya value nya kosong dulu
        $('#nama').val('');
        $('#nim').val('');
        $('#email').val('');
        $('#jurusan').val('');

        //set button submit jadi tulisan ubah data
        //cari kelas pake css selector
        $('.modal-footer button[type=submit]').html('Tambah Data');
    })

    //set class untuk merubah tulisan judul modal di tombol ubah
    //JQuery cari class tampiModalUbah, onclick jalankna fungsi berikut
    $('.tampilModalUbah').on('click', function(){

        //set class untuk merubah tulisan judul modal di tombol ubah
        $('#judulModal').html('Ubah Data Mahasiswa');

        //set button submit jadi tulisan ubah data
        //cari kelas pake css selector
        $('.modal-footer button[type=submit]').html('Ubah Data');

        //set attribute di from ke method ubah
        //saat ajax sudah mendapatkan data json maka masuk ke method ubah
        $('.modal-content form').attr('action', 'http://localhost/phpmvc/public/mahasiswa/ubah');

        //saat ubah di klik, ambil data yang bernama id
        const id = $(this).data('id');

        $.ajax({
            //set url utk menjalankan conroller getubah
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            //ambil data id masukan ke var id
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                //ganti value di modal
                //cari id nama ubah data nya ngambil dari variable data json
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    });
});