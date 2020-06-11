  <div class="modal fade modal-success" id="Iksurat" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">SURAT KELUAR <br /> DIREKTORAT PERTAHANAN DAN KEAMANAN</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <?php $attributes = array('class' => 'j-pro', 'id' => 'j-pro'); ?>
        <?= form_open_multipart('Ksurat/addSurat', $attributes) ?>
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="0">
          <div class="j-content">
            <div class="j-row">
              <div class="j-span12 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="nomor">
                    <i class="icofont icofont-envelope"></i></label>
                  <input type="text" name="Nsurat" id="Nsurat" placeholder="Nomor Surat">
                </div>
              </div>
            </div>
            <div class="j-row">
              <div class="j-span12 j-unit">
                <div class="j-input">
                  <label class="j-icon-right" for="tgl">
                    <i class="icofont icofont-ui-calendar"></i></label>
                  <input id="dropper-default" data-dd-default-date="20-March-2020" type="text" name="Tsurat" placeholder="Tanggal Surat">
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
              <div class="j-span12 j-unit">
                <div class="j-input">
                  <label class="j-input j-select">
                    <select name="jenis" id="jenis">
                      <option value="" selected="" hidden>Pilih Kategori Surat</option>
                      <?php foreach ($kategori as $field) { ?>
                        <option value="<?= $field->id_kategori ?>"><?= $field->keterangan ?></option>
                      <?php } ?>
                    </select>
                </div>
              </div>
            </div>

            <div class="j-row">
              <div class="j-input j-append-small-btn">
                <div class="j-file-button">
                  Browse
                  <input type="file" name="file" onchange="document.getElementById('file1_input').value = this.value;">
                </div>
                <input type="text" id="file1_input" name="file1_input" readonly="" placeholder="Scan Surat">
                <span class="j-hint">Only: pdf, less 10Mb</span>
              </div>
            </div>
          </div>
          <input type="hidden" name="file_hidden" id="file1_hidden" readonly="" placeholder="Scan Surat">

        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-primary" value="Simpan">
          <button type="button" class="btn btn-default m-r-20" data-dismiss="modal">Batal</button>
        </div>
        <?= form_close() ?>
      </div>
    </div>
  </div>