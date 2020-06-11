<div class="modal fade modal-success" id="password" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Ganti Password</h4>
</div>
<div class="modal-body">
<?=  form_open('auth/ganti_password') ?>
<div class="input-group input-group-sm">
<input type="hidden" class="form-control" placeholder="Full Name" name="stafid" value="<?=$this->session->userdata('user_id')?>">
<input type="password" autofocus="autofocus" class="form-control" name="new" placeholder="Password baru">
<span class="input-group-btn">
<?=  form_submit('submit', 'Go',"class='btn btn-success btn-flat'"); ?>
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