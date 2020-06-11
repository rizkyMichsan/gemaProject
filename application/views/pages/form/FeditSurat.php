<!-- modal ganti email -->
  <div class="modal fade modal-primary" id="editsurat" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Update Data
        </div>
        <div class="modal-body">
         
        <div class="form1">
              <div class="form-group">
                <label for="exampleInputEmail1">Nama Acara</label>
                <input class="form-control" name="Nsurat" placeholder="Enter ..." >
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Ruangan</label>
                <input class="form-control" name="Nsurat" placeholder="Enter ..." >
              </div>
                        
              <div class="form-group">
                <label for="exampleInputEmail1">Tanggal Surat</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="Tabsen" class="form-control pull-right" id="datepicker">
                </div>        
              </div>

      </div>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-outline pull-right" value="Save">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>                   
        </div>
        
      </div>
    </div>
  </div>
  <script>
  function myFunction() {
    document.getElementById("shared").select();
}
</script>