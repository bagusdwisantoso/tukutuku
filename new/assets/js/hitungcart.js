function tambah_qty(id_keranjang) {
    let qty = $('#qty_' + id_keranjang).val();
    let qty_new = parseInt(qty) + 1;
    console.log('QTY 1 : ' + qty_new);
    console.log('id keranjang : ' + id_keranjang);


    $.ajax({
        url: 'http://localhost/tukutuku/dashboard/updatekeranjang',
        data: {
            id_keranjang: id_keranjang,
            qty: qty_new
        },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            print_r(data);

            // console.log('sukses update');
            let harga = data.harga;
            console.log('harga : ', +harga);
            let total_harga = (qty_new) * parseInt(harga);
            $('#total_harga_' + id_keranjang).html('Rp. ' + total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

            let grand_total_before = $('#grand').val();
            console.log('grand_total_before : ' + grand_total_before)

            let grand_total = parseInt(harga) + parseInt(grand_total_before);
            $('#grand_total').html('Rp. ' + grand_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            console.log('grand : ', grand_total);
            console.log('total_harga : ' + total_harga);
            $('#grand').val(grand_total);
        }
    });
}

function kurang_qty(id_keranjang) {
    let qty = $('#qty_' + id_keranjang).val();
    let qty_new = parseInt(qty) - 1;
    console.log('QTY 1 : ' + qty_new);
    console.log('id keranjang : ' + id_keranjang);


    $.ajax({
        url: 'http://localhost/tukutuku/dashboard/updatekeranjang',
        data: {
            id_keranjang: id_keranjang,
            qty: qty_new
        },
        method: 'post',
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // console.log('sukses update');
            let harga = data.harga;
            console.log('harga : ', +harga);
            let total_harga = (qty_new) * parseInt(harga);
            $('#total_harga_' + id_keranjang).html('Rp. ' + total_harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));

            let grand_total_before = $('#grand').val();
            console.log('grand_total_before : ' + grand_total_before)

            let grand_total = parseInt(grand_total_before) - parseInt(harga);
            $('#grand_total').html('Rp. ' + grand_total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            console.log('grand : ', grand_total);
            console.log('total_harga : ' + total_harga);
            $('#grand').val(grand_total);
        }
    });
}

// $(document).ready(function () {
//     // $('.tambahqty').click(function () {
//     //     // $('#exampleModalLongTitle').html('Tambah Hewan Qurban');
//     //     // $('.button_tambah').html('Tambah');
//     //     // alert('test');
//     //     console.log('halo');
//     //     const id_hewan = $(this).data('id_keranjang'); //data('id') -> ini diambil dari data-id yang ada di HTML
//     //     console.log(id_hewan);
//     //     $('#total_harga_5').html('Rp hehehehe');
//     // })

//     // $('.tampilmodalubah').on('click', function () {
//     //     $('#exampleModalLongTitle').html('Edit Hewan Qurban');
//     //     $('.button_tambah').html('Edit');
//     //     $('.modal-body form').attr('action', 'http://localhost/Project-PPL/qurban_in/tempatdistribusi/updatehewan')

//     //     const id_hewan = $(this).data('id'); //data('id') -> ini diambil dari data-id yang ada di HTML
//     //     console.log(id_hewan);

//     //     $.ajax({
//     //         url: 'http://localhost/Project-PPL/qurban_in/tempatdistribusi/getubah',
//     //         data: { id_hewan: id_hewan },
//     //         method: 'post',
//     //         dataType: 'json',
//     //         success: function (data) {
//     //             console.log(data);
//     //             $('#namahewan').val(data[0].nama_hewan);
//     //             // $('#pilih').val(data[0].nama_status);
//     //             $('#id_hewan').val(data[0].id_hewan);
//     //             // $('#id_status').val(data[0].id_status);
//     //         }
//     //     });
//     // });
// });