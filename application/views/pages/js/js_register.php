<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<!-- page script -->
<script>
  $(function() {
    $('#example').DataTable({
      responsive: {
        details: {
          type: 'column',
          target: 'tr'
        }
      },
      order: [0, 'asc']
    });
  });

  function deleteData() {

    $('#delete').on('show.bs.modal', function(e) {
      $('#nf').val($(e.relatedTarget).data('file'));
      $('#id').val($(e.relatedTarget).data('id'));

    });
  }

  function jabatan() {
    var i = "";
    if ($('#group_id').val() == 1) {
      i = "Sekretaris";
    } else if ($('#group_id').val() == 2) {
      i = "Staf";
    } else if ($('#group_id').val() == 3) {
      i = "Direktur";
    } else if ($('#group_id').val() == 4) {
      i = "Kasubdit";
    } else if ($('#group_id').val() == 5) {
      i = "Lainnya";
    } else {
      i = ""
    }
    $('#jabat').val(i);
  }

  function jabatan2() {
    var i = "";
    if ($('#group_id2').val() == 1) {
      i = "Sekretaris";
    } else if ($('#group_id2').val() == 2) {
      i = "Staf";
    } else if ($('#group_id2').val() == 3) {
      i = "Direktur";
    } else if ($('#group_id2').val() == 4) {
      i = "Kasubdit";
    } else if ($('#group_id2').val() == 5) {
      i = "Lainnya";
    } else {
      i = ""
    }
    $('#jabat2').val(i);
  }

  function add() {
    $('#register').modal('show');
    $('#add').removeClass('hidden');
    $('#edit').addClass('hidden');
    $('#reset').addClass('hidden');
  }

  function reset() {
    $('#add').addClass('hidden');
    $('#edit').addClass('hidden');
    $('#reset').removeClass('hidden');
    $('#register').on('show.bs.modal', function(e) {
      $('#stafid2').val($(e.relatedTarget).data('id'));

    });
  }

  function edit(i) {
    $('#register').modal('show');
    $('#edit').removeClass('hidden');
    $('#add').addClass('hidden');
    $('#reset').addClass('hidden');
    $.ajax({
      type: 'POST',
      data: {
        func: $('#aid_' + i).val(),
        '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>'
      },
      url: '<?php echo base_url(); ?>User/getUser',
      success: function(data) {
        $('#stafid').val(data[0]['id']);
        $('#fn').val(data[0]['first_name']);
        $('#ln').val(data[0]['last_name']);
        $('#phone').val(data[0]['phone']);
        $('#jabat2').val(data[0]['company']);
        if (data[0]['group_id'] == '3') {
          $('#ttd').show();
        } else {
          $('#ttd').hide();
        }
        $('#Uemail').val(data[0]['email']);
        $('#urut').val(data[0]['urut']);
        $('#group_id2').val(data[0]['group_id']);


      }
    });
  }
</script>