<?php
  $thn    = date('Y', time());
  $b    = date('m', time());
  $no="1/Dt.7.5/".$b."/".$thn;
  if($lastId):
  foreach ($lastId as $last ) {
          
          $n=strlen($last['agenda_no']);
          $noo=substr($last['agenda_no'],0,$n-15)+1;
          $no = $noo."/Dt.7.5/".$b."/".$thn;
  }endif;
  ?>
<div class="modal fade modal-success" id="Isurat" role="dialog" aria-labelledby="myLargeModalLabel">
<div class="modal-dialog modal-lg"" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">SURAT MASUK<br /> DIREKTORAT PERTAHANAN DAN KEAMANAN</h4>
</div>
<?=  form_open_multipart('Msurat/addSurat', 'id="input"') ?>
<div class="modal-body">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<label for="exampleInputEmail1">No. Agenda</label>
<input class="form-control" type="hidden" name="agendaId" id="agendaId">
<input class="form-control" type="text" name="Nagenda" id="Nagenda" value="<?=$no?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Tanggal Terima</label>
<div class="input-group date">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" name="Tterima" id="Tterima" placeholder="Click  ..." class="form-control pull-right">
</div>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Tanggal Surat</label>
<div class="input-group date">
<div class="input-group-addon">
<i class="fa fa-calendar"></i>
</div>
<input type="text" class="form-control pull-right" placeholder="Click  ..." name="Tsurat" id="datepicker">
</div>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Nomor Surat</label>
<input class="form-control" name="Nsurat" id="Nsurat" placeholder="Type here ...">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Dari</label>
<select class="form-control" name="jDari" id="jumDari">
<option>...</option>
<option value="Internal">Internal</option>
<option value="External">External</option>
</select><br />
<span id="selek"></span>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Perihal</label>
<textarea class="form-control" rows="3" name="Isurat" id="IsiSurat" placeholder="Type here ..."></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<label for="exampleInputEmail1">Ringkasan Surat</label>
<textarea class="form-control" rows="3" name="Ringsurat" id="ringSurat" placeholder="Type here ..."></textarea>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Tingkat Surat</label>
<select class="form-control" name="tingkat" id="tingkat">
<option value="BIASA">Biasa</option>
<option value="SEGERA">Segera</option>
<option value="PENTING">Penting</option>
<option value="RAHASIA">Rahasia</option>
</select>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Kategori</label>
<select class="form-control" name="kategori" id="kategori" onchange="pilih(kategori.value)">
<option>...</option>
<option value="surat">Surat/Memo Masuk</option>
<option value="rapat">Undangan Rapat</option>
</select>
<script>function pilih(a){if(a=="rapat"){$("#acara").show()}else{$("#acara").hide()}}</script>
</div>
<div class="form-group" id="acara" style="display:none">
<label for="exampleInputEmail1">Tanggal Acara</label>
<div class="input-group date form_datetime" data-date="<?=gmdate('Y-m-d H:i:s',time()+60*60*7);?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
<input class="form-control" type="text" name="Tacara" readonly placeholder="Dari">
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" name="dtp_input1" id="dtp_input1" value="" />
<br/>
<div class="input-group date form_datetime" data-date="<?=gmdate('Y-m-d H:i:s',time()+60*60*7);?>" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input2">
<input class="form-control" type="text" value="" readonly placeholder="Sampai">
<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
</div>
<input type="hidden" name="dtp_input2" id="dtp_input2" value="" />
<br/>
<label for="exampleInputEmail1">Lokasi</label>
<textarea class="form-control" rows="3" name="lokasi" id="Lokasi" placeholder="Enter ..."></textarea>
<br/>
</div>
<div class="form-group">
<label for="exampleInputFile">File (.pdf)</label>
<input type="file" name="file" id="file">
</div>
</div>
</div>
</div>
<div class="modal-footer">
<input type="submit" name="sumbit" id="submit" class="btn btn-outline pull-right" value="Save">
<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
</div>
<?=  form_close() ?>
</div>
</div>
</div>
<script>function myFunction(){document.getElementById("shared").select()};</script>