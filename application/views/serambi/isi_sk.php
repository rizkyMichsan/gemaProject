
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Search Mail">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <?php for ($i = 0; $i < count($deptlist); ++$i) { ?>
                  <tr style="background-color: ">
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"  ><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="#" title="Input" data-toggle="modal" data-target="#Dispo">  <?php echo $deptlist[$i]->agenda_no; ?></a></td>
                    <td class="mailbox-subject"><b><?php echo $deptlist[$i]->agenda_dari; ?></b> (<?php echo $deptlist[$i]->agenda_no_surat; ?>) <br/><br/> <?php echo $deptlist[$i]->agenda_tentang; ?>
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date" width="10%"><?php echo relativeTime($deptlist[$i]->agenda_tgl_terima); ?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                  <?=$page+1?>-<?=$lastPage?>/<?=$total?> 
                  <div class="btn-group">
                     <?php echo $pagination; ?>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.Left col -->
        
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <div class="col-md-6">
          <div class="box box-primary">
            
          </div>
        </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
      