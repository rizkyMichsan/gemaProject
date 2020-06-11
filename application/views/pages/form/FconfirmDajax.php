 <!-- modal ganti password -->
     <div class="modal fade modal-danger" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Anda Yakin Akan Menghapus File ini??</h4>
	      </div>
	      <?=  form_open($this->uri->segment(1).'/'.$delete, 'id="Fdelete"') ?>
	        <div class="input-group input-group-sm">
	            <input type="hidden"  class="form-control" id="id" name="id" value="">
	            <input type="hidden"  class="form-control" name="file" id="nf" value="">
	        </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Tidak</button>
	        <button type="button" class="btn btn-outline pull-right" onclick="SubmitDel()">Ya</button>
	        
	        <?= form_close()?>
	      </div>
	    </div>
	  </div>
	</div>