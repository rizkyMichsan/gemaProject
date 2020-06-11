  <?php
  $thn    = date('Y', time());
  $b    = date('m', time());
  $no = "1/Dt.7.5/" . $b . "/" . $thn;

  if ($lastId) :
    foreach ($lastId as $last) {

      $n = strlen($last['agenda_no']);
      $noo = substr($last['agenda_no'], 0, $n - 15) + 1;
      $no = $noo . "/Dt.7.5/" . $b . "/" . $thn;
    }
  endif;
  ?>

  <div class="modal fade modal-success" id="Isurat" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role=" document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">TAMBAH SURAT MASUK<br /> </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php $attributes = array('class' => 'j-pro', 'id' => 'j-pro'); ?>
        <?= form_open_multipart('Msurat/addSurat', $attributes) ?>
        <input class="form-control" type="hidden" name="agendaId" id="agendaId" value="0">
        <div class="modal-body">
          <div class="j-content">
            <div class="j-row">
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="nomor">
                    <i class="icofont icofont-layers"></i></label>
                  <input type="text" name="Nagenda" id="Nagenda" autofocus value="<?= $no ?>">
                  <span class="j-tooltip j-tooltip-right-top">No Agenda</span>
                </div>
              </div>
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="nomor">
                    <i class="icofont icofont-ui-v-card"></i></label>
                  <input type="text" name="Nsurat" id="Nsurat" placeholder="Nomor Surat">
                  <span class="j-tooltip j-tooltip-right-top">Nomor Surat</span>
                </div>
              </div>
            </div>
            <div class="j-row">
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="nomor">
                    <i class="icofont icofont-ui-calendar"></i></label>
                  <input class="dropper-default" type="text" name="Tterima" id="Tterima" placeholder="Tanggal Terima">
                  <span class="j-tooltip j-tooltip-right-top">Tanggal Terima</span>
                </div>
              </div>
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="nomor">
                    <i class="icofont icofont-calendar"></i></label>
                  <input class="dropper-default" type="text" name="Tsurat" id="Tsurat" placeholder="Tanggal Surat">
                  <span class="j-tooltip j-tooltip-right-top">Tanggal Surat</span>
                </div>
              </div>
            </div>
            <div class="j-row">
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-input j-select">
                    <select name="jDari" id="jumDari">
                      <option selected="" hidden>Asal Surat</option>
                      <option value="Internal">Internal</option>
                      <option value="External">External</option>
                    </select>
                    <i></i>
                  </label>
                  <span class="j-tooltip j-tooltip-right-top">Asal Surat</span>
                </div>
              </div>
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-input j-select">
                    <select name="asal" id="asal">

                    </select>
                    <i></i>
                  </label>
                  <input class="d-none" id="lain" type="text" name="lain" placeholder="Ketik disini...">
                </div>
              </div>
            </div>
            <div class="j-row">
              <div class="j-span12 j-unit">
                <div class="j-input">
                  <textarea placeholder="Perihal" rows="3" name="Isurat" spellcheck="false" id="Isurat"></textarea>
                  <span class="j-tooltip j-tooltip-right-top">Perihal Surat</span>
                </div>
              </div>

            </div>
            <div class="j-row">
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-input j-select">
                    <select name="tingkat" id="tingkat">
                      <option selected="" hidden>Tingkat Surat</option>
                      <option value="BIASA">Biasa</option>
                      <option value="SEGERA">Segera</option>
                      <option value="PENTING">Penting</option>
                      <option value="RAHASIA">Rahasia</option>

                    </select>
                    <i></i>
                  </label>
                  <span class="j-tooltip j-tooltip-right-top">Tingkat Surat</span>
                </div>
              </div>
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-input j-select">
                    <select name="kategori" id="kategori" onchange="pilih(kategori.value)">
                      <option selected="" hidden>Kategori</option>
                      <?php foreach ($kategori as $field) { ?>
                        <option value="<?= $field->id_kategori ?>"><?= $field->keterangan ?></option>
                      <?php } ?>
                    </select>
                    <i></i>
                  </label>
                  <span class="j-tooltip j-tooltip-right-top">Kategori</span>
                </div>
              </div>

            </div>
            <div class="j-row d-none" id="tglRapat">
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="tgl">
                    <i class="icofont icofont-ui-calendar"></i></label>
                  <input id="Tacara" type="text" name="Tacara" placeholder="Waktu Acara">
                  <span class="j-tooltip j-tooltip-right-top">Waktu Acara</span>
                </div>
              </div>
              <div class="j-span6 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="tgl">
                    <i class="icofont icofont-location-pin"></i></label>
                  <input type="text" name="lokasi" id="lokasi" placeholder="Lokasi">
                  <span class="j-tooltip j-tooltip-right-top">Lokasi</span>
                </div>
              </div>
            </div>
            <div class="j-row">
              <div class="j-input j-append-small-btn">
                <div class="j-file-button">
                  Browse
                  <input type="file" name="file" accept="application/pdf" onchange="document.getElementById('file1_input').value = this.value;">
                </div>
                <input type="text" id="file1_input" name="file1_input" readonly="" placeholder="Scan Surat">
                <span class="j-hint">Only: pdf, less 10Mb</span>
              </div>
            </div>
            <input type="hidden" name="file_hidden" id="file1_hidden" readonly="" placeholder="Scan Surat">
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Simpan">
          <button type="button" class="btn btn-default m-r-20" data-dismiss="modal">Batal</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>