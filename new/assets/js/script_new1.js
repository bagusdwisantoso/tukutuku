// console.log('OK');

$(function () {
    $('.tambahdata').on('Click', function () {
        $('#exampleModalLongTitle').html('Tambah Hewan Qurban');
        $('.button_tambah').html('Tambah');
    })

    $('.tampilmodalubah').on('click', function () {
        $('#exampleModalLongTitle').html('Edit Hewan Qurban');
        $('.button_tambah').html('Edit');
        $('.modal-body form').attr('action', 'http://localhost/Project-PPL/qurban_in/tempatdistribusi/updatehewan')

        const id_hewan = $(this).data('id'); //data('id') -> ini diambil dari data-id yang ada di HTML
        console.log(id_hewan);

        $.ajax({
            url: 'http://localhost/Project-PPL/qurban_in/tempatdistribusi/getubah',
            data: { id_hewan: id_hewan },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#namahewan').val(data[0].nama_hewan);
                // $('#pilih').val(data[0].nama_status);
                $('#id_hewan').val(data[0].id_hewan);
                // $('#id_status').val(data[0].id_status);
            }
        });
    });
});