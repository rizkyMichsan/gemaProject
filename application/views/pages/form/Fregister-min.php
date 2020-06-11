<div class="modal fade modal-success" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content" id="add">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Register User</h4>
</div>
<div class="modal-body">
<?=  form_open('auth/create_user') ?>
<div class="register-box-body">
<div class="form-group has-feedback">
<label for="exampleInputEmail1">First Name</label>
<input type="text" class="form-control" placeholder="First Name" name="first_name">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Last Name</label>
<input type="text" class="form-control" placeholder="Last Name" name="last_name">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Phone</label>
<input type="text" class="form-control" placeholder="Phone" name="phone">
<span class="glyphicon glyphicon form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" placeholder="Email" name="email">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">No Urut</label>
<input type="text" class="form-control" placeholder="No Urut" name="no">
<span class="glyphicon glyphicon form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Role</label>
<select class="form-control" name="group_id" id="group_id" onchange="jabatan()">
<option>....</option>
<option value="1">Sekretaris</option>
<option value="2">Staf</option>
<option value="3">Direktur</option>
<option value="4">Kasubdit</option>
<option value="5">Lainnya</option>
</select>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Jabatan</label>
<input type="text" class="form-control" placeholder="Jabatan" name="company" id="jabat">
<span class="glyphicon glyphicon form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Password</label>
<input type="password" class="form-control" placeholder="Password" name="password" id="lam" onkeyup="$('#confirm').val($('#lam').val())">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
<div class="form-group has-feedback hidden">
<label for="exampleInputEmail1">Password Confirm</label>
<input type="password" class="form-control" placeholder="Password" name="password_confirm" id="confirm">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-outline pull-right" value="Register" name="user_submit">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
<?= form_close()?>
</div>
<div class="modal-content" id="edit">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Update User</h4>
</div>
<div class="modal-body">
<?=  form_open_multipart('auth/edit_user') ?>
<div class="register-box-body">
<div class="form-group has-feedback">
<label for="exampleInputEmail1">First Name</label>
<input type="hidden" class="form-control" placeholder="Full Name" name="stafid" id="stafid">
<input type="text" class="form-control" placeholder="First Name" name="first_name" id="fn">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Last Name</label>
<input type="text" class="form-control" placeholder="Last Name" name="last_name" id="ln">
<span class="glyphicon glyphicon-user form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Phone</label>
<input type="text" class="form-control" placeholder="Phone" name="phone" id="phone">
<span class="glyphicon glyphicon form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Email</label>
<input type="email" class="form-control" placeholder="Email" name="email" id="Uemail">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">No Urut</label>
<input type="text" class="form-control" placeholder="No Urut" name="no" id="urut">
<span class="glyphicon glyphicon form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Role</label>
<select class="form-control" name="groups" id="group_id2" onchange="jabatan2()">
<option>....</option>
<option value="1">Sekretaris</option>
<option value="2">Staf</option>
<option value="3">Direktur</option>
<option value="4">Kasubdit</option>
<option value="5">Lainnya</option>
</select>
</div>
<div class="form-group has-feedback">
<label for="exampleInputEmail1">Jabatan</label>
<input type="text" class="form-control" placeholder="Jabatan" name="company" id="jabat2">
<span class="glyphicon glyphicon form-control-feedback"></span>
</div>
<div class="form-group" id="ttd">
<label for="exampleInputEmail1">Tanda Tangan Direktur</label>
<input type="file" name="gambar" id="gambar">
</div>
</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-outline pull-right" value="Save">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
<?= form_close()?>
</div>
<div class="modal-content" id="reset">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Reset Password</h4>
</div>
<div class="modal-body">
<?=  form_open('auth/ganti_password') ?>
<div class="register-box-body">
<div class="form-group has-feedback">
<label for="exampleInputEmail1">New Password</label>
<input type="hidden" class="form-control" placeholder="Full Name" name="stafid" id="stafid2">
<input type="password" class="form-control" placeholder="New Password" name="new" id="new">
<span class="glyphicon glyphicon-lock form-control-feedback"></span>
</div>
</div>
</div>
<div class="modal-footer">
<input type="submit" class="btn btn-outline pull-right" value="Save">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
<?= form_close()?>
</div>
</div>
</div>