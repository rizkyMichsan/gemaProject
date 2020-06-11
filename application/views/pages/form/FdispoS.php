<style type="text/css">
  #target {color:#333;border:0px solid red;white-space:pre-wrap;display:block;bottom:0;font-size:18px;font-weight:normal;}
</style>
      <?php foreach($Rdispo->result_array() as $rd):
        $tglSurat=tgl_modif($rd['agenda_tgl_surat']);
        $tglTerima=tgl_in($rd['agenda_tgl_terima']);
        
    $jabatan='DIREKTUR PERTAHANAN DAN KEAMANAN';
    $judul='DIREKTORAT PERTAHANAN DAN KEAMANAN';
   
        ?> 
          <fieldset  style='width:800px;border-width:2px; border-color:black;'>
  <fieldset style='margin-left:0px; margin-bottom:0px; border-width:0px; border-color:black;'>
    <center>
          <h3><b><?PHP echo $judul; ?>
        </b></h3>
    </center>
        
  </fieldset>
       
        <?=  form_open('msurat/addDispo') ?>
       
                           

                    <input type='hidden' class='form-control' name='aid' value='<?=$rd['agenda_id']?>'  >
                     <input type='hidden' class='form-control' name='no' value='<?=$rd['agenda_no']?>'  >
                      <input type='hidden' class='form-control' name='tentang' value='<?=$rd['agenda_tentang']?>'  >
                      <table border='1' width='98%'>
                        <tr valign='middle' align='center'>
                          <td width='100%' colspan='4'>
                            <b>LEMBAR EDARAN</b>
                          </td>
                        </tr>
                        <tr valign='middle' align='center'>
                          <td ><b>NOMOR AGENDA</b></td>
                            <td ><b>TANGGAL SURAT</b></td>
                            <td ><b>DITERIMA TANGGAL</b></td>
                                                           <td ><b>TINGKAT SURAT</b></td>
                        </tr>
                        <tr valign='middle' align='center'><td ><?=$rd['agenda_no']?></td>
                                                           <td ><?=$tglSurat?></td>
                                                           <td ><?=$tglTerima?></td>
                                                           <td ><?=$rd['tingkat_surat']?></td>
                        </tr>
                        <tr valign='middle' align='center'><td ><b>DITERUSKAN KEPADA</b></td>
                                                           <td ><b>DISPOSISI</b></td>
                                                           <td colspan='2'><b>RINGKASAN</b></td>
                        </tr>
                        <tr valign='top' align='left'>
                          <td width='30%'><table border='0'>
                        <?php $no=1;$st=$this->Mhome->Rstaf();foreach($st->result_array() as $st){if($no <=9){$no='0'.$no;}?>
                        <tr><td><input name='staf[]' type='checkbox' value='<?=$st['id']?>'
                        <?php $rdt=$this->Mhome->Rdistu($st['id'],$rd['agenda_id']);
                        	foreach($rdt->result_array() as $rtd){
                            ?>checked='checked'<?php
                        	}
                          if($status=='close'){
                            echo 'disabled';
                          }
                        ?>
                        ><?php echo $no.' '.$st['first_name'].' '.$st['last_name'].'</td></tr>' ;$no++;}?>
                      </table></td>
                        <td width='40%' rowspan="5"><table border='0'>
                        <?php $noi=1;$isi=$this->Mhome->Risi();foreach($isi->result_array() as $isi):if($noi <=9){$no='0'.$noi;}?>
                        <tr><td><input name='isi[]' type='checkbox' value='<?=$isi['isi_id']?>'
                        <?php $rdti=$this->Mhome->Rdistuis($isi['isi_id'],$rd['agenda_id']);
                        	foreach($rdti->result_array() as $rti){
                        		?>checked='checked'<?php
                        	}
                          if($status=='close'){
                            echo 'disabled';
                          }
                        ?>
                        ><?php echo $noi.' '.$isi['isi_nama'].'</td></tr>' ;$noi++;endforeach;?>
                      </table></td>
                      <td colspan='2' rowspan="5" valign='top'><table border='0' >
                            <tr ><td style='border-bottom: 1px solid;'><b>No Surat: </b><?=$rd['agenda_no_surat']?> </td></tr>
                            <tr><td style='word-wrap:break-word;padding: 10px 0 10px 0;'>Dari: <?=$rd['agenda_dari']?></td></tr>
                            <tr><td style='border-bottom: 1px solid;border-top: 1px solid;'><b>Perihal:</b></td></tr>
                            <tr><td style='word-wrap:break-word;padding: 10px 0 10px 0;'><?=$rd['agenda_tentang']?></td></tr>
                            <tr><td style="padding: 10px 0 10px 0;"><?php if($rd['target_selesai']<>"0000-00-00"){
                                                            echo "<b>Deadline: </b>".tgl_modif2($rd['target_selesai']);}
                                                            else{} ?></td></tr>
                            <?php
                              if($rd['kategori']=='rapat'){
                                 $getcal = $this->Masuk->get_cal($rd['agenda_id']);
                                 foreach ($getcal as $gk ) {
                                   ?>
                                   <tr><td><?php echo '<b>Hari/Tgl : </b>'.tgl_modif2($gk['start']);?></td></tr>
                                   <tr><td><?php echo '<b>Waktu : </b>'.substr($gk['start'], 11,5);?></td></tr>
                                   <tr><td><?php echo '<b>Lokasi : </b>'.htmlentities($rd['agenda_ket']);?></td></tr>
                                  <?php
                                 }
                                
                              }
                            ?>
                           
                          </table></td>
                        </tr>
                         <tr valign='middle' align='left'>
                                                           <td  ><b>Sekretariat Direktorat HANKAM:</b>
                                                          

                                                           </td>
                        </tr>
                        <tr valign='middle' align='left'>
                                                           <td  >
                        <table border='0'>
                        <?php $no=1;
                        $sek=$this->Mhome->Rsekretaris();
                        foreach($sek->result_array() as $sek):if($no <=9){$no='0'.$no;}?>
                        <tr><td><input name='staf[]' type='checkbox' value='<?=$sek['id']?>'
                        <?php $rdt=$this->Mhome->Rdistu($sek['id'],$rd['agenda_id']);
                          foreach($rdt->result_array() as $rtd){
                            ?>checked='checked'<?php
                          }
                          if($status=='close'){
                            echo 'disabled';
                          }
                        ?>
                        ><?php echo $no.' '.$sek['first_name'].' '.$sek['last_name'].'</td></tr>' ;$no++;endforeach;?></table>

                                                           </td>
                        </tr>
                        <tr valign="middle" align="left">
                                                           <td  ><b>TATA USAHA:</b>
                                                          

                                                           </td>
                        </tr>
                        <tr valign="middle" align="left">
                                                           <td  >
                        <table border="0">
                        <?php $no=1;
                        $lai=$this->Mhome->Rlain();
                        foreach($lai->result_array() as $lai):if($no <=9){$no='0'.$no;}?>
                        <tr><td><input name="staf[]" type="checkbox" value="<?=$lai['id']?>"
                        <?php $rdt=$this->Mhome->Rdistu($lai['id'],$rd['agenda_id']);
                          foreach($rdt->result_array() as $rtd){
                            echo 'checked="checked"';
                          }
                          if($status=="close"){
                            echo 'disabled';
                          }
                        ?>
                        ><?php echo $no." ".$lai['first_name']." ".$lai['last_name']."</td></tr>" ;$no++;endforeach;?></table>

                                                           </td>
                        </tr>
                        <tr valign='middle' align='left'>
                                                           <td colspan='4' ><b>CATATAN / ARAHAN</b>
                                                           <?php if($status=='open'){?>  
                                                           	<input type='text' style='width: 65%;' name='catatan' value='<?=$rd['target']?>'  > 
                                                           <?php } 
                                                           else{
                                                           echo htmlentities($rd['target']).'<br />'; }
                                                           ?>
                                                           <br /><br />
                                                           </td>
                        </tr>
                        <tr valign='bottom' style='height:100px; '>
                      <td align='right' colspan='4'><?PHP echo $jabatan; ?><br /><br /><br /><img src="<?=base_url()?>assets/img/ttd.png" width="25%"><br /><?php $dir=$this->Mhome->Rdirektur()->row();echo $dir->first_name.' '.$dir->last_name?></td>
                  </tr>   
                      </table>
           
        <?php   form_close();endforeach; ?> 

</fieldset>
