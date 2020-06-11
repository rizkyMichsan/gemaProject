<!-- modal ganti avatar -->
     <div class="modal fade modal-success" id="avatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Ganti Avatar</h4>
	      </div>
	      <div class="modal-body">
	      <?=  form_open('login/ganti_avatar') ?>
	        <div class="input-group input-group-sm">
	                <div class="radio">
                                                <label>
                            <a href="<?=base_url()?>login/ganti_avatar/female.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/female.png" width="128px" title="peacock">
                            </a>
                            <a href="<?=base_url()?>login/ganti_avatar/male.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/male.png" width="128px" title="Arjuna">
                            </a>
                            <a href="<?=base_url()?>login/ganti_avatar/gatotkaca.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/gatotkaca.png" width="128px" title="gatotkaca">
                            </a>
                            <a href="<?=base_url()?>login/ganti_avatar/kabayan.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/kabayan.png" width="128px" title="kabayan">
                            </a>
                            <a href="<?=base_url()?>login/ganti_avatar/nunuy.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/nunuy.png" width="128px" title="nunuy">
                            </a>
                            <a href="<?=base_url()?>login/ganti_avatar/raden.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/raden.png" width="128px" title="Pak Raden">
                            </a>
                            <a href="<?=base_url()?>login/ganti_avatar/srikandi.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/srikandi.png" width="128px" title="srikandi">
                            </a>
                            <a href="<?=base_url()?>login/ganti_avatar/kirana.png" class="btn btn-default btn-line"><img src="<?=base_url()?>assets/img/kirana.png" width="128px" title="kirana">
                            </a>
                                                   
                                                </label>
                                                
                                            </div>
	              </div>
	              <?= form_close()?>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline pull-right" data-dismiss="modal">Close</button>
	        
	      </div>
	    </div>
	  </div>
	</div>
   