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
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\advance-elements\moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\bower_components\bootstrap-datepicker\js\bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\assets\pages\advance-elements\bootstrap-datetimepicker.min.js"></script>
<!-- Date-range picker js -->
<script type="text/javascript" src="<?= base_url() ?>assets\bower_components\bootstrap-daterangepicker\js\daterangepicker.js"></script>
<script type="text/javascript" src="<?= base_url() ?>assets\bower_components\datedropper\js\datedropper.min.js"></script>

<!-- Select 2 js -->
<script type="text/javascript" src="<?= base_url() ?>assets\bower_components\select2\js\select2.full.min.js"></script>
<script src="<?= base_url() ?>assets/assets/js/autosize.js"></script>

<!-- Page specific script -->
<script>
  $(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    var newcs = $('#new-cons').DataTable();

    new $.fn.dataTable.Responsive(newcs);

    if ($('#tabDispo').hasClass('active') == true) {
      alert(true);
    }

    $('.j-pro').find(".dropper-default").dateDropper({
      dropWidth: 200,
      dropPrimaryColor: "#1abc9c",
      dropBorder: "1px solid #1abc9c",
      format: 'd/m/Y'
    });
    $('#Tacara').daterangepicker({
      timePicker: true,
      timePicker24Hour: true,
      "drops": "up",
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(3, 'hour'),
      locale: {
        format: 'DD/MM/YYYY HH:mm'
      }
    });
    $('#jumDari').on('change', function() {
      var val = $(this).val();
      $.ajax({
        type: 'get',
        url: '<?php echo base_url() ?>Msurat/getAlamat/' + val,
        async: false,
        dataType: 'json',
        success: function(data) {
          var i;
          var html = '';
          for (i = 0; i < data.length; i++) {
            no = i + 1;
            html += '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

          }
          $("#asal").html(html);
        }
      });
    });
    $('#asal').on('change', function() {
      if ($(this).val() == 'Lainnya') {
        $('#lain').removeClass('d-none');
      } else {
        $('#lain').addClass('d-none');

      }
    });

    $('#Isurat').on('hidden.bs.modal', function() {
      $('#Isurat').find('#agendaId').val(0);
      $('#Isurat').find('#Nagenda').val("");
      $('#Isurat').find('#Nsurat').val("");
      $('#Isurat').find('#Tterima').val("");
      $('#Isurat').find('#jumdari').val("");
      $('#Isurat').find('#asal').val("");
      $('#Isurat').find('#lain').val("");
      $('#Isurat').find('#lain').addClass('d-none');
      $('#Isurat').find('#tglRapat').addClass('d-none');
      $('#Isurat').find('#Isurat').val("");
      $('#Isurat').find('#tingkat').val("");
      $('#Isurat').find('#kategori').val("");
      $('#Isurat').find('#Tacara').val("");
      $('#Isurat').find('#lokasi').val("");
      $('#Isurat').find('#file1_input').val('');
      $('#Isurat').find('#file1_hidden').val('');
    });

    $('#Idisposisi').find('.close').on('click', function() {
      $('#Idisposisi').modal('hide')
    });
    $('#Idisposisi').on('hidden.bs.modal', function() {
      $('#Idisposisi').find('#embedScan').attr('src', '');
    });
    $('#Idisposisi').find('.post-bodi textarea').on('focus', function() {
      autosize($('textarea.autosize'));
      $('#Idisposisi').find('#postComment').removeClass('d-none');
      $('#Idisposisi').find('.post-futer').removeClass('d-none');
    });
    $('#Idisposisi').find('#catatan textarea').on('focus', function() {
      autosize($('textarea.autosize'));
    });

    $('input[type="file"]#file-input').change(function(e) {

      var text = "";
      for (i = 0; i < e.target.files.length; i++) {
        var fileName = e.target.files[i].name;
        text += '<div class="alert alert-primary attach_alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="icofont icofont-close-line-circled"></i></button>' + fileName + '</div>';
      }
      $(".attach_alert").remove();
      $(text).insertAfter(".file-upload-lbl");
    });
  });



  function pilih(d) {

    if (d != "6") {
      $('#tglRapat').addClass('d-none');
    } else {
      $('#tglRapat').removeClass('d-none');
    }
  }

  function edit(id) {

    $.ajax({

      type: 'get',
      url: '<?php echo base_url() ?>Msurat/getData/' + id,
      async: false,
      dataType: 'json',
      success: function(data) {
        var d = new Date(data[0].agenda_tgl_surat);
        var e = new Date(data[0].agenda_tgl_terima);
        var f = d.getMonth() + 1;
        var g = e.getMonth() + 1;

        var asal = data[0].agenda_dari.split(' - ');
        var waktu = data[0].waktu_acara.split(' - ');
        var dari = unit(asal[1]);
        $('#Isurat').modal('show');
        $('#Isurat').find('.modal-title').html('Ubah Surat ' + data[0].agenda_no);
        $('#Isurat').find('#agendaId').val(data[0].agenda_id);
        $('#Isurat').find('#Nagenda').val(data[0].agenda_no);
        $('#Isurat').find('#Nsurat').val(data[0].agenda_no_surat);
        $('#Isurat').find('#Tterima').val(e.getDate() + '/' + g + '/' + e.getFullYear());
        $('#Isurat').find('#Tsurat').val(d.getDate() + '/' + f + '/' + d.getFullYear());
        $('#Isurat').find('#jumDari').val(asal[1]);
        $('#Isurat').find('#asal').val(asal[0]);
        $('#Isurat').find('#lain').val("");
        $('#Isurat').find('#lain').addClass('d-none');
        if (data[0].kategori == 6) {
          $('#Isurat').find('#tglRapat').removeClass('d-none');
        } else {
          $('#Isurat').find('#tglRapat').addClass('d-none');
        }
        $('#Isurat').find('#Isurat').val(data[0].agenda_tentang);
        $('#Isurat').find('#tingkat').val(data[0].tingkat_surat);
        $('#Isurat').find('#kategori').val(data[0].kategori);
        //$('#Isurat').find('#Tacara').val(data[0].waktu_acara);
        $('#Isurat').find('#Tacara').data('daterangepicker').setStartDate(waktu[0]);
        $('#Isurat').find('#Tacara').data('daterangepicker').setEndDate(waktu[1]);
        $('#Isurat').find('#lokasi').val(data[0].agenda_ket);
        $('#Isurat').find('#file1_input').val(data[0].agenda_file);
        $('#Isurat').find('#file1_hidden').val(data[0].agenda_file);
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
            url: '<?php echo base_url() ?>Msurat/delete/' + id,
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

  function unit(val) {
    $.ajax({
      type: 'get',
      url: '<?php echo base_url() ?>Msurat/getAlamat/' + val,
      async: false,
      dataType: 'json',
      success: function(data) {
        var i;
        var html = '';
        for (i = 0; i < data.length; i++) {
          no = i + 1;
          html += '<option value="' + data[i].nama + '">' + data[i].nama + '</option>';

        }
        $("#asal").html(html);
      }
    });
  }

  function disposisi(id, state) {


    var show = $('#Idisposisi').hasClass('show');
    if (show == false) {
      $('#Idisposisi').modal('show');
      $(".js-example-basic-multiple").select2({
        placeholder: "Klik disini..."
      });

    }
    $('#Idisposisi').find('#tabScan').attr('onclick', "disposisi('" + id + "','scan')");
    $('#Idisposisi').find('#tabDispo').attr('onclick', "disposisi('" + id + "','disposisi')");
    if (state == 'disposisi') {
      $('#Idisposisi').find('#tabDispo').addClass('active');
      $('#Idisposisi').find('#dispo').addClass('active');
      $('#Idisposisi').find('#tabScan').removeClass('active');
      $('#Idisposisi').find('#scan').removeClass('active');
      $.ajax({
        type: 'get',
        url: '<?php echo base_url() ?>Msurat/getData/' + id,
        async: true,
        dataType: 'json',
        success: function(data) {
          var d = new Date(data[0].agenda_tgl_surat);
          var e = new Date(data[0].agenda_tgl_terima);
          var f = d.getMonth() + 1;
          var g = e.getMonth() + 1;
          var asal = data[0].agenda_dari.split(' - ');
          var html = '';
          $('#Idisposisi').find('#aid').val(id);
          $('#Idisposisi').find('#agendaId2').val(id);
          $('#Idisposisi').find('#agendaNo').html('Surat ' + data[0].agenda_no_surat);
          $('#Idisposisi').find('#agendaId').html(data[0].agenda_no);
          $('#Idisposisi').find('#agendaAsal').html('Dari: ' + asal[0]);
          $('#Idisposisi').find('#agendaIsi').html(data[0].agenda_tentang);
          $('#Idisposisi').find('#agendaFile').attr('onclick', "disposisi('" + id + "','scan')");
          if (data[0].kategori == 6) {
            var lokasi = "<i class='icofont icofont-comment text-muted'></i> <span></span>Undangan Rapat Pukul " + data[0].waktu_acara + "<br / > di " + data[0].agenda_ket + "</span>";
            $('#Idisposisi').find('#agendaKeterangan').html(lokasi);
          } else {

            $('#Idisposisi').find('#agendaKeterangan').html("");
          }
          $('#Idisposisi').find('#agendaTerima').html(e.getDate() + '/' + g + '/' + e.getFullYear());
          $('#Idisposisi').find('#agendaTgl').html(d.getDate() + '/' + f + '/' + d.getFullYear());

          if (data[1].length > 0) {
            $('#Idisposisi').find('#form_dispo').addClass('d-none');
            $('#Idisposisi').find('#komentar_dispo').removeClass('d-none');
            $('#Idisposisi').find('#dispo_ket').removeClass('d-none');
            $('#Idisposisi').find('#agendaStatus').html(data[0].tingkat_surat + ' <small> - dalam proses</small>');
          } else {
            $('#Idisposisi').find('#komentar_dispo').addClass('d-none');
            $('#Idisposisi').find('#dispo_ket').addClass('d-none');
            $('#Idisposisi').find('#form_dispo').removeClass('d-none');
            $('#Idisposisi').find('#agendaStatus').html(data[0].tingkat_surat + ' <small> - belum disposisi</small>');

          }
          for (i = 0; i < data[1].length; i++) {
            html += '<div class="media mt-3">' +
              '<div class="media-left media-middle photo-table">' +
              '<a href="#">' +
              '<img class="media-object rounded-circle" src="<?= base_url() ?>assets/assets/images/avatar-1.jpg" alt="Generic placeholder image">' +
              '</a>' +
              '</div>' +
              '<div class="media-body">' +
              '<h6 class="f-w-600">' + data[1][i].first_name + ' ' + data[1][i].last_name + '</h6>' +
              '<p>' + data[1][i].company + '</p>' +
              '</div>' +
              '</div>';
          }
          $('#Idisposisi').find('#userDispo').html(html);
          var html2 = "<ul>";
          for (i = 0; i < data[2].length; i++) {
            html2 += '<li class="mb-2"><i class="icofont icofont-stylish-right text-danger"></i>' + data[2][i].isi_nama + '</li>';
          }
          html2 += '</ul>';
          var ht = "";
          for (i = 0; i < data[3].length; i++) {
            ht += '<div class="media" >' +
              '<a class="media-left" href="#">' +
              '<img class="media-object rounded-circle m-r-20" src="<?= base_url() ?>assets/assets/images/avatar-1.jpg" alt="Generic placeholder image"></a>' +
              '<div class="media-body b-b-theme social-client-description">' +
              '<div class="chat-header">' + data[3][i].user + '<span class="text-muted float-right">' + data[3][i].time + '</span></div>' +
              '<p class="text-muted">' + data[3][i].isi_komentar + '</p>' +
              '</div></div>';
          }
          $(ht).insertBefore('#timeline_dispo');
          $('#Idisposisi').find('#userTugas').html(html2);
          $('#Idisposisi').find('#userCatatan').html("<p>" + data[0].target + "</p>");
        }
      });

    } else if (state == 'scan') {
      $('#Idisposisi').find('#tabDispo').removeClass('active');
      $('#Idisposisi').find('#dispo').removeClass('active');
      $('#Idisposisi').find('#tabScan').addClass('active');
      $('#Idisposisi').find('#scan').addClass('active');

      $.ajax({
        type: 'get',
        url: '<?php echo base_url() ?>Msurat/getFile/' + id,
        async: true,
        dataType: 'json',
        success: function(data) {
          $('#Idisposisi').find('#embedScan').attr('src', '<?php echo base_url() ?>assets/upload/surat_masuk/' + data.agenda_file);
        }
      });

    }
  }
</script>