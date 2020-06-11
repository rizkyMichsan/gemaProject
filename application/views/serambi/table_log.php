	<style type="text/css">

td {
  cursor: pointer;
}

.editor{
  display: none;
}

</style>
  <div id="barang">
    <h3><?=$memo->no_memo?></h3>
    <h4><?=$memo->judul?></h4>
	<table id="table-data" class="table table-striped">
                <thead>
                <tr>
                <th data-sort-ignore="false">No</th>	
				<th data-sort-ignore="false">Tujuan</th>
				<th data-sort-ignore="false">Penerima</th>
				<th data-hide="phone">Tanggal Terima</th>
				<th data-hide="phone"></th>
                </thead>

		<tbody id="table-body">
        <?php $i=1;
		if(isset($logData2)){
			foreach($logData2 as $user){?>
        <tr data-id='<?=$user->id?>'>
          <td><?=$i?></td>
          <td><?php echo $user->tujuan?></td>
          <td><?php 
               if ($this->ion_auth->is_admin()){
                  echo "<span class='span-nama caption' data-id='$user->id'>$user->penerima</span> <input type='text' class='field-penerima form-control editor' value='$user->penerima' data-id='$user->id' />";
                }
                else{
                  echo $user->penerima;
                }

                  ?>
          </td>
		  <td><?php 
               if ($this->ion_auth->is_admin()){
                ?>
                 <span class='span-nama caption ' data-id='<?=$user->id?>'><?php
                 if($user->tgl){
                    $tempT= explode(" ", $user->tgl);
                    //var_dump($tempT);
                   
                   $tempTgl= explode("-", $tempT[0]);
                    $jam=explode(":", $tempT[1]);
                   $value= $tempTgl[2]."/".$tempTgl[1]."/".$tempTgl[0]." ".$jam[0].":".$jam[1];
                   echo $value;
                 }
                 else{$value= date('d/m/Y h:i', time());}
                 ?></span> <input type='text' class='field-tgl form-control editor' value='<?=$value?>' data-id='<?=$user->id?>' data-inputmask='"alias": "dd/mm/yyyy"' data-mask  />
                  <?php
                }
                else{
                  echo $user->tgl;
                }

                  ?></td>
		  <td></td>
        </tr>
			<?php $i++; }
		}?>           
		</tbody>
	</table>
</div>
	<script>
	$("#tableLog").DataTable();
  //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy h:s", {"placeholder": "dd/mm/yyyy __:__", "hourFormat": "24",});
    //Datemask2 mm/dd/yyyy
    //Money Euro
    $("[data-mask]").inputmask({
      mask: "1/2/y [h:s]",
      placeholder: "dd/mm/yyyy __:__",
      alias: "datetime",
      hourFormat: "24",
      showMaskOnHover: false
    });
  $('.tglTer').datepicker({
          autoclose: true
        });
  //Update Barang
        $(function(){

$.ajaxSetup({
  type:"post",
  cache:false,
  dataType: "json"
})


$(document).on("click","td",function(){
$(this).find("span[class~='caption']").hide();
$(this).find("input[class~='editor']").fadeIn().focus();
});


$(document).on("keydown",".editor",function(e){
if(e.keyCode==13){
var target=$(e.target);
var value=target.val();
var id=target.attr("data-id");

var data={id:id,value:value,'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',};
if(target.is(".field-penerima")){
data.modul="penerima";
}else if(target.is(".field-tgl")){
data.modul="tgl";
}

$.ajax({
  data:data,
        
  url:"<?php echo base_url('Ksurat/update'); ?>",
  success: function(a){
   target.hide();
   target.siblings("span[class~='caption']").html(value).fadeIn();
  }

})

}

});



});
	</script>
  