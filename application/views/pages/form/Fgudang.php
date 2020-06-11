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
            <div class="modal fade modal-primary" id="Igudang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <!-- modal-dialog -->
              <div class="modal-dialog">
                <!-- modal-content -->
                <div class="modal-content">
                   <div class="modal-header">
                      
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myModalLabel">Upload To Gudang File</h4>
                      
                    </div>
                    <div class="modal-body">
                    <?=  form_open_multipart('dashboard/addGudang') ?>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Judul File</label>
                          <input class="form-control" name="judul" placeholder="Judul File..." autofocus="autofocus">
                        </div>
                      
                        <div class="form-group">
                          <label for="exampleInputEmail1">Pilih File</label>
                          <input id="uploadFile"  class="form-control" placeholder="Pilih File..." disabled="disabled">
                          <span class="input-group-btn">
                            <div class="fileUpload btn btn-outline pull-right">
                            <span>Upload</span>
                            <input id="uploadBtn" type="file" class="upload" name="gudang[]" multiple="multiple"  />
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