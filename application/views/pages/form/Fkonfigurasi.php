  <div class="modal fade modal-success" id="Fsetting" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel"></h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <?php $attributes = array('class' => 'j-pro', 'id' => 'j-pro'); ?>
              <?= form_open_multipart('Setting/konfig', $attributes) ?>
              <div class="modal-body">
                  <input type="hidden" name="id" id="id" value="1">
                  <div class="j-content">
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-id-card"></i></label>
                                  <input type="text" name="a" id="a" placeholder="Nama website" value="<?= title() ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Nama website</span>
                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-envelope"></i></label>
                                  <input type="text" name="b" id="b" placeholder="Email Resmi" value="<?= email() ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Email Resmi</span>

                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-web"></i></label>
                                  <input type="text" name="c" id="c" placeholder="Base URL" value="<?= url() ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Base URL</span>
                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-iphone"></i></label>
                                  <input type="text" name="d" id="d" placeholder="Nomor Telepon" value="<?= telp() ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Nomor Telepon</span>
                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-ebook"></i></label>
                                  <input type="text" name="e" id="e" placeholder="Meta Deskripsi" value="<?= description() ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Meta Deskripsi</span>

                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-favourite"></i></label>
                                  <input type="text" name="f" id="f" placeholder="Meta Keyword" value="<?= keywords() ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Meta Keyword</span>

                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-social-google-plus"></i></label>
                                  <input type="text" name="g" id="g" placeholder="Google Verification" value="<?= verification() ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Google Verification</span>

                              </div>
                          </div>
                      </div>

                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <label class="j-icon-right" for="nomor">
                                      <i class="icofont icofont-zigzag"></i></label>
                                  <input type="text" name="h" id="h" placeholder="Versi Sistem" value="<?= $konfig->versi ?>">
                                  <span class="j-tooltip j-tooltip-right-top">Versi Sistem</span>

                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-span12 j-unit">
                              <div class="j-input">
                                  <textarea placeholder="Perihal" rows="3" name="i" spellcheck="false" id="i"><?= sosmed() ?></textarea>
                                  <span class="j-tooltip j-tooltip-right-top">Sosial Media</span>
                              </div>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-input j-append-small-btn">
                              <div class="j-file-button">
                                  Browse
                                  <input type="file" name="j" onchange="document.getElementById('j_fav').value = this.value;">
                              </div>
                              <input type="text" id="j_fav" name="j_fav" readonly="" placeholder="Favicon" value="<?= $konfig->favicon ?>">
                              <span class="j-tooltip j-tooltip-right-top">Favicon</span>

                              <span class="j-hint">Only: ico, less 1Mb</span>
                          </div>
                      </div>
                      <div class="j-row">
                          <div class="j-input j-append-small-btn">
                              <div class="j-file-button">
                                  Browse
                                  <input type="file" name="k" onchange="document.getElementById('k_log').value = this.value;">
                              </div>
                              <input type="text" id="k_log" name="k_log" readonly="" placeholder="Logo" value="<?= $konfig->logo ?>">
                              <span class="j-tooltip j-tooltip-right-top">Logo</span>

                              <span class="j-hint">Only: jpg,png,ico, less 1Mb</span>
                          </div>
                      </div>
                  </div>
                  <input type="hidden" name="l" id="l" readonly="" placeholder="Scan Surat" value="<?= $konfig->favicon ?>">
                  <input type="hidden" name="m" id="m" readonly="" placeholder="Scan Surat" value="<?= $konfig->logo ?>">

              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary" value="Simpan">
                  <button type="button" class="btn btn-default m-r-20" data-dismiss="modal">Batal</button>
              </div>
              <?= form_close() ?>
          </div>
      </div>
  </div>