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
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\j-pro\js\jquery.ui.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\j-pro\js\jquery.maskedinput.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\j-pro\js\jquery.j-pro.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\bower_components\sweetalert\js\sweetalert.min.js"></script>

<!-- Date-dropper js -->
<script type="text/javascript" src="<?= base_url() ?>assets\bower_components\datedropper\js\datedropper.min.js"></script>
<!-- Page specific script -->
<script>
  $(document).ready(function() {

    var newcs = $('#new-cons').DataTable();
    new $.fn.dataTable.Responsive(newcs);

    $("#dropper-default").dateDropper({
        dropWidth: 200,
        dropPrimaryColor: "#1abc9c",
        dropBorder: "1px solid #1abc9c",
        format: 'd/m/Y'
      }),

      $('#inputKsurat').on('click', function() {
        $('#Iksurat').modal('show');
        $('#Iksurat').find('.modal-title').html('Input Surat Keluar');
      });

    $('#Iksurat').on('hidden.bs.modal', function() {
      $('#Iksurat').find('#id').val(0);
      $('#Iksurat').find('#Nsurat').val('');
      $('#Iksurat').find('#dropper-default').val('');
      $('#Iksurat').find('#Isurat').val('');
      $('#Iksurat').find('#jenis').val('');
      $('#Iksurat').find('#file1_input').val('');
      $('#Iksurat').find('#file1_hidden').val('');
    })
  });

  function edit(id) {

    $.ajax({

      type: 'get',
      url: '<?php echo base_url() ?>Ksurat/getData/' + id,
      async: false,
      dataType: 'json',
      success: function(data) {
        var d = new Date(data[0].tanggal);
        $('#Iksurat').modal('show');
        $('#Iksurat').find('.modal-title').html('Ubah Surat ' + data[0].no_memo);
        $('#Iksurat').find('#id').val(data[0].id_memo);
        $('#Iksurat').find('#Nsurat').val(data[0].no_memo);
        $('#Iksurat').find('#dropper-default').val(d.getDate() + '/' + d.getMonth() + '/' + d.getFullYear());
        $('#Iksurat').find('#Isurat').val(data[0].judul);
        $('#Iksurat').find('#jenis').val(data[0].kategori);
        $('#Iksurat').find('#file1_input').val(data[0].file);
        $('#Iksurat').find('#file1_hidden').val(data[0].file);
      }
    });
    return false;
  };

  function hapus(id) {
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
            url: '<?php echo base_url() ?>Ksurat/delete/' + id,
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
</script>