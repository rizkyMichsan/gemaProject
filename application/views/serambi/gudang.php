
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
          
          <div class="box" style="background:#D2D6DE">
            <div class="box-header with-border">
              <i class="fa fa-folder-open"></i>

              <h3 class="box-title">Gudang File</h3>

              <div class="box-tools pull-right" data-toggle="tooltip" title="Add item">
                <div class="btn-group" data-toggle="btn-toggle">
                  <!-- <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button> -->
                  <button type="button" data-toggle="modal" data-target="#Igudang" title="Upload File" class="btn btn-block btn-primary btn-sm"><i class="fa fa-plus-circle"> Upload File</i></button> 
                </div>
              </div>
            </div>
              
            <div class="box-body" >
                <!-- item -->
                <ul class="timeline" >
                <!-- timeline time label -->

                <!-- /.timeline-label -->
                <!-- timeline item -->
                <?php foreach($gudang->result_array() as $g) : 
                $jam=substr($g['created'], 11,5);
                $file=$this->Mhome->Rfile($g['id_gudang']);
                ?>
                <li>
                  <i class="fa fa-file bg-blue"></i>

                  <div class="timeline-item" >
                    <span class="time"><i class="fa fa-clock-o"></i> <?=$jam?></span>

                    <h3 class="timeline-header">
                      <a href="#"><?=$g['judul']?> (<i style="color:#999;font-style:normal;font-size:14px;"><?=$g['username']?></i>)</a>
                    </h3>
                    <div class="timeline-body">
                      <table border="0">
                        <tbody>
                        <?php foreach($file->result_array() as $f) : ?>
                          <tr>
                            <td width="15%">
                              <i class="fa fa-file-pdf-o"></i>
                            </td>
                            <td>
                              <!-- download -->
                              <a target="_BLANK" href="<?= base_url()?>assets/upload/gudang/<?= $f['nama_file'] ?>"><?= $f['nama_file'] ?></a>
                            </td>
                          </tr>
                    	<?php endforeach; ?>

                        </tbody>
                      </table>
                    </div>
                    <div class="timeline-footer">
                      		Diupload: <?php $tanggal1 = substr($g['created'],0,10);
                      		echo tgl_in($tanggal1);?> 
                      <br>                                            
                      <hr/>
                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#share">Share</a>
                      <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete" data-id="<?= $g['id_gudang'];?>" onclick="deleteData()"
                       >Delete</a>

                    </div>
                  </div>
                </li>
            <?php endforeach;?>
                <!-- END timeline item -->
                <!-- timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
                </ul>
                <!-- /.item -->
            </div>
            <!-- /.chat -->
          </div>
          <!-- /.box (chat box) -->

        </section>
       
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

      <script>

        function deleteData(){
                      
          $('#delete').on('show.bs.modal', function(e) {
              
              $('#id').val( $(e.relatedTarget).data('id'));
              
          });
        }

      </script>
      


