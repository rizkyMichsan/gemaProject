<div class="pcoded-content">
  <div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
      <div class="page-wrapper">
        <!-- Page-header start -->
        <div class="page-header">
          <div class="row align-items-end">
            <div class="col-lg-8">
              <div class="page-header-title">
                <div class="d-inline">
                  <h4><?= $bread_parent ?> Page</h4>
                  <span></span>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                  <li class="breadcrumb-item">
                    <a href="index-1.htm"> <i class="feather icon-<?= $icon ?>"></i> </a>
                  </li>
                  <li class="breadcrumb-item"><a href="#!"><?php if (isset($bread_child)) {
                                                              echo $bread_child;
                                                            } else {
                                                              echo '';
                                                            }  ?></a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="card">
            <div class="card-header">
              <h5></h5>
              <span><button class="btn btn-primary float-right col-lg-3 col-md-3 col-sm-12 md-trigger" data-toggle="modal" data-target="#Isurat"><i class="icofont icofont-user-alt-3"></i>Input Surat</button></span>

            </div>
            <div class="card-block">
              <div class="dt-responsive table-responsive">
                <table id="new-cons" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>
                      <th width="10%">Nomor Agenda</th>
                      <th width="5%">Tanggal Terima</th>
                      <th>Nomor Surat</th>
                      <th>Asal Surat</th>
                      <th>Perihal</th>
                      <th width="5%">Tingkat Surat</th>
                      <th width="10%">Tanggal Surat</th>
                      <th width="5%">Kategori</th>
                      <th width="5%">Undangan Rapat</th>
                      <th width="2%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($list as $field) {
                      $id = str_replace(array('+', '/', '='), array('-', 'RiFs', '_'), $this->encryption->encrypt($field->agenda_id));
                    ?>
                      <tr>
                        <td><?php echo '<a href="#" onclick="disposisi(\'' . $id . '\',\'disposisi\')">' . $field->agenda_no . '</a>'; ?></td>
                        <td><?= relativeTime($field->agenda_tgl_terima) ?></td>
                        <td><?php echo '<div style="width:200px;word-wrap: break-word; word-break: break-all; white-space: normal;">' . $field->agenda_no_surat . '</div>' ?></td>
                        <td><?php echo '<div style="width:150px;word-wrap: break-word; word-break: break-all; white-space: normal;">' . $field->agenda_dari . '</div>' ?></td>
                        <td><?php echo '<div style="width:150px;word-wrap: break-word; word-break: break-all; white-space: normal;">' . $field->agenda_tentang . '</div>' ?></td>
                        <td><?= $field->tingkat_surat ?></td>
                        <td><?php echo relativeTime($field->agenda_tgl_surat) ?></td>
                        <td><?php
                            $kat = $this->Mhome->where_row('kategori', ['id_kategori' => $field->kategori]);
                            echo $kat->keterangan;
                            ?></td>
                        <td><?php echo $field->waktu_acara . "<br />Lokasi di " . $field->agenda_ket; ?></td>
                        <td><button class="btn btn-primary dropdown-toggle btn-outline-primary btn-sm waves-effect waves-light" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
                          <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <a class="dropdown-item waves-light waves-effect" href="#">Disposisi</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item waves-light waves-effect" href="#" onclick="edit('<?= $id ?>')">Edit</a>
                            <a class="dropdown-item waves-light waves-effect" href="#" onclick="hapus('<?= $id ?>')">Hapus</a>
                          </div>
                        </td>
                      </tr>
                    <?php
                      $no++;
                    }
                    ?>

                  </tbody>

                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>