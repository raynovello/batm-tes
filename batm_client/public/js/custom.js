function show_password() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

$(document).ready(function() {
	// datatables
    $('table#mytable').DataTable({
        "drawCallback": function() {
            $('.delete-data').click(function (e) {
                e.preventDefault();
                var link = $(this).attr('href');

                swal({
                    title: "Are you sure?",
                    text: "WARNING! You will not be able to recover this data!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    closeOnCancel: false },
                function (isConfirm) {
                    if (isConfirm) {
                        swal("Deleted!", "Your data has been deleted.", "success");
                        window.location.href = link;
                    } else {
                        swal("Cancelled", "Your data is safe :)", "error");
                    }
                });
            });
        }
    });

    $('table#rangking').DataTable({
        "order": [9, "asc"],
        "iDisplayLength": -1,
        "paging":   false,
        "searching": false,
        "info":     false
    });

    // summernote

    $('textarea.summernote').summernote();
    $('.summernote').code('');
    $('textarea.summernote-edit').summernote();

    // Magnific Popup
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }
    });

    $('.popup-room').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        }
    });

    $('.popup-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        }
    });

    $('.popup-promotion').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
            titleSrc: function(item) {
                return item.el.attr('title');
            }
        }
    });

    // sweet alert

    $('.delete-data').click(function (e) {
        e.preventDefault();
        var link = $(this).attr('href');

        swal({
            title: "Are you sure?",
            text: "WARNING! You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            closeOnCancel: false },
        function (isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your data has been deleted.", "success");
                window.location.href = link;
            } else {
                swal("Cancelled", "Your data is safe :)", "error");
            }
        });
    });

    $('.tambah-produka').click(function() {
        swal({
            title: "Produk berhasil ditambahkan ke troli!",
            type: "success",
            showConfirmButton: false,
            allowOutsideClick: true,
            timer: 3000 }, 
            function (isConfirm) {
                if (!isConfirm) return;
                
                var id_produk    = $(this).data("id-produk");
                var nama_produk  = $(this).data("nama-produk");
                var harga_produk = $(this).data("harga-produk");
                $.ajax({
                    url: "<?php echo site_url('transaksi/tambah_produk');?>",
                    type: "POST",
                    data: {
                        id: 5
                    },
                    dataType: "html",
                    success: function () {
                        swal("Done!", "It was succesfully deleted!", "success");
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal("Error deleting!", "Please try again", "error");
                    }
                });
            });
        });

    $('#edit_stasiun').on('show.bs.modal', function(e) {
        var id_stasiun = $(e.relatedTarget).data('id-stasiun');
        $(e.currentTarget).find('input[name="id_stasiun"]').val(id_stasiun);

        var nama = $(e.relatedTarget).data('nama');
        $(e.currentTarget).find('input[name="nama"]').val(nama);

        var kategori = $(e.relatedTarget).data('kategori');
        $(e.currentTarget).find('input[name="kategori"]').val(kategori);

        var alamat = $(e.relatedTarget).data('alamat');
        $(e.currentTarget).find('textarea[name="alamat"]').val(alamat);
    });

    $('#edit_kategori').on('show.bs.modal', function(e) {
        var id_kategori = $(e.relatedTarget).data('id-kategori');
        $(e.currentTarget).find('input[name="id_kategori"]').val(id_kategori);

        var nama = $(e.relatedTarget).data('nama');
        $(e.currentTarget).find('input[name="nama"]').val(nama);

        var deskripsi = $(e.relatedTarget).data('deskripsi');
        $(e.currentTarget).find('#deskripsi').text(deskripsi);
    });

    // clockpicker
    $('.clockpicker').clockpicker();
});