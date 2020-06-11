<style type="text/css">
  
  input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
<!-- pop up upload file -->
            <div class="modal fade modal-success" id="Ilaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <!-- modal-dialog -->
              <div class="modal-dialog">
                <!-- modal-content -->
                <div class="modal-content">
                   <div class="modal-header">
                      
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Tindak Lanjut Disposisi</h4>
                      
                    </div>
                    <div class="modal-body">
                    <?=  form_open_multipart('Msurat/uploadLaporan') ?>
                        <div class="form-group">
                          
                          <input type="hidden" class="form-control" name="agenda_id" id="agenda_id">
                          <input type="hidden" class="form-control" name="agenda_no" id="agenda_no">
                        </div>
                      <div class="form-group">
                          <label for="exampleInputEmail1"> Apakah Disposisi ini sudah selesai dikerjakan?</label>
                          <label><input type="checkbox" name="status" value="1" > YA</label>
                          
                        </div>
                        <div class="form-group" id="uploadLap">
                          <label for="exampleInputEmail1">Upload Laporan</label>
                          <input id="uploadFile"  class="form-control" placeholder="Pilih File..." disabled="disabled">
                          <span class="input-group-btn">
                            <div class="fileUpload btn btn-outline pull-right">
                            <span>Upload</span>
                            <input id="uploadBtn" type="file" class="upload" name="file"   />
                          </div>
                          <script>
                            document.getElementById("uploadBtn").onchange = function () 
                            {
                                document.getElementById("uploadFile").value = this.value;
                            };
                          </script>
                          </span>
                          
                        </div>
                      
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-outline pull-right" value="Save">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>                   
                    </div>
                    <?=  form_close() ?>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- end pop up upload file -->