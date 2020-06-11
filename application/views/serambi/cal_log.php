
	<table id="tablelogcal" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th data-sort-ignore="false">No</th>	
				<th data-sort-ignore="false">Title</th>
				<th data-sort-ignore="false">Deskripsi</th>
				<th data-hide="phone">Event Start</th>
				<th data-hide="phone">End Event</th>
				<th data-hide="phone">By</th>
        <th data-hide="phone">Action</th>
        
                </thead>

		<tbody>
        <?php $i=1;
		if(isset($logData2)){
			foreach($logData2 as $user){?>
        <tr id="tr_<?= $user->eid?>">
          <td><?=$i?></td>
          <td><?php echo $user->title?></td>
          <td><?php echo $user->description?></td>
		  <td><?php echo $user->start?></td>
		  <td><?php echo $user->end?></td>
		   <td><?php echo $user->username?></td>
        <td>
          <a class="btn btn-block btn-default" href="<?=base_url()?>Cal/restore/<?=$user->eid?>"  title="Restore">
                <i class="fa fa-undo"></i> Restore
            </a>
            <a class="btn btn-block btn-danger" href="#"  onclick="deleteData()" data-toggle="modal" data-target="#delete" data-id="<?= $user->eid;?>"  >
                <i class="fa fa-trash"></i> Delete
            </a>

        </td>
        
        </tr>
			<?php $i++; }
			?>
			<a class="btn btn-block btn-danger" href="<?=base_url()?>Cal/emptyTrash/"  title="emptyTrash" >
                <i class="fa fa-trash"></i> Empty Recycle Bin
            </a>
			<?php
		}?>

                
		</tbody>
		
	</table>


	<script>
	$("#tablelogcal").DataTable();
	</script>