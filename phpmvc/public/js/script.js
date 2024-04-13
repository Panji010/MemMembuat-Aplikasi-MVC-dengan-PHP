$(function() {

    $('.tampilModalUbah').on('click', function() {

        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/pabi/phpmvc/public/mahasiswa/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/pabi/phpmvc/public/mahasiswa/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data) {
                $('#nama').val(data.nama);
                $('#NIM').val(data.NIM);
                $('#email').val(data.email);
                $('#Prodi').val(data.Prodi);
                $('#id').val(data.id);
            }
        });

    });
});
