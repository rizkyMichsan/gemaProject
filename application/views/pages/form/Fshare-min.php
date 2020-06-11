<div class="modal fade modal-primary" id="share" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Copy Link dibawah ini......</h4>
</div>
<div class="modal-body">
<?=  form_open('login/ganti_email') ?>
<div class="form-group">
<input type="text" readonly="readonly" class="form-control" name="judul" id="shared" value="http://<?=base_url()?>dashboard/gudang/">
<span class="input-group-btn">
</span>
</div>
<?= form_close()?>
</div>
<div class="modal-footer">
<button type="button" onclick="myFunction()" class="btn btn-outline pull-right">Select All</button>
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<script>function myFunction(){document.getElementById("shared").select()};</script>