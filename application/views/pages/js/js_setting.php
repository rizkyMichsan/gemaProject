<script src="<?= base_url() ?>assets\bower_components\datatables.net\js\jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets\assets\pages\data-table\js\jszip.min.js"></script>
<script src="<?= base_url() ?>assets\assets\pages\data-table\js\pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets\assets\pages\data-table\js\vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets\assets\pages\data-table\extensions\responsive\js\dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets\bower_components\datatables.net-buttons\js\buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets\bower_components\datatables.net-buttons\js\buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\bower_components\sweetalert\js\sweetalert.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\j-pro\js\jquery.ui.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\j-pro\js\jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\j-pro\js\jquery.j-pro.js"></script>
<!-- Page specific script -->
<script>
    function edit_kat(id) {

        $.ajax({

            type: 'get',
            url: '<?php echo base_url() ?>setting/getKategori/' + id,
            async: false,
            dataType: 'json',
            success: function(data) {
                $('#modal_kategori').modal('show');
                $('#modal_kategori').find('.modal-title').html('Ubah Kategori');
                $('#modal_kategori').find('#idKategori').val(data[0].id_kategori);
                $('#modal_kategori').find('#a').val(data[0].keterangan);
            }
        });
        return false;
    };

    function edit_Us(id) {

        $.ajax({

            type: 'get',
            url: '<?php echo base_url() ?>setting/getUser/' + id,
            async: false,
            dataType: 'json',
            success: function(data) {
                $('#register').modal('show');
                $('#register').find('#add').addClass('d-none');
                $('#register').find('#edit').removeClass('d-none');
                $('#register').find('#reset').addClass('d-none');
                //$('#modal_kategori').find('#idKategori').val(data[0].id_kategori);
                //$('#modal_kategori').find('#a').val(data[0].keterangan);
            }
        });
        return false;
    };

    function hapus_kat(id) {
        swal({
                title: "Are you sure?",
                text: "Data akan terhapus!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({

                        type: 'get',
                        url: '<?php echo base_url() ?>setting/deleteKategori/' + id,
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            swal("Deleted!", "Data berhasil dihapus", "success");
                            location.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Data batal dihapus)", "error");
                }
            });
    }

    function hapus_us(id) {
        swal({
                title: "Are you sure?",
                text: "Data akan terhapus!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    $.ajax({

                        type: 'get',
                        url: '<?php echo base_url() ?>setting/deleteUser/' + id,
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            swal("Deleted!", "Data berhasil dihapus", "success");
                            location.reload();
                        }
                    });
                } else {
                    swal("Cancelled", "Data batal dihapus)", "error");
                }
            });
    }
    $(document).ready(function() {

        if ($('.page-body').find('#new-cons').length > 0) {
            var newcs = $('#new-cons').DataTable();
            new $.fn.dataTable.Responsive(newcs);
        }
        //show form
        $('#page-setting').find('#edit_setting').on('click', function() {

            $('#Fsetting').modal('show');
            $('#Fsetting').find('.modal-title').html('Konfigurasi Website');
        });
        $('#input').on('click', function() {
            $('#modal_kategori').modal('show');
            $('#modal_kategori').find('.modal-title').html('Tambah Kategori');
        });
        $('#inputUser').on('click', function() {
            $('#register').modal('show');
            $('#register').find('#add').removeClass('d-none');
            $('#register').find('#edit').addClass('d-none');
            $('#register').find('#reset').addClass('d-none');
        });

        //save input
        $('#save').on('click', function() {
            var data = new FormData();
            data.append('id', $('#idKategori').val());
            data.append('a', $('#a').val());
            $.ajax({
                type: 'POST',
                url: "<?= base_url('setting/addKategori') ?>",
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function() {
                    $('#id').val('0');
                    $('#a').val('');
                    $('#modal_kategori').modal('hide');
                    swal("Good job!", "Berhasil disimpan!", "success");
                    location.reload();
                }
            });
            return false;
        });
        //delete



    });
</script>