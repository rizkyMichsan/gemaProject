<!-- modal ganti email -->
     <div class="modal fade modal-success" id="email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Ubah Email</h4>
	      </div>
	      <div class="modal-body">
	      <?=  form_open('login/ganti_email') ?>
	        <div class="input-group input-group-sm">
	                <input type="text" autofocus="autofocus" class="form-control" name="email" value="<?=$this->session->userdata('email')?>">
	                    <span class="input-group-btn">
	                    <?=  form_submit('submit', 'Go',"class='btn btn-info btn-flat'"); ?>
	                    </span>
	              </div>
	              <?= form_close()?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
	        
	      </div>
	    </div>
	  </div>
	</div>