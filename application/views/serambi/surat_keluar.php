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
              <h5>Server Side Processing</h5>
              <span><button class="btn btn-primary float-right col-lg-3 col-md-3 col-sm-12" id="inputKsurat"><i class="icofont icofont-user-alt-3"></i>Input Surat</button></span>

            </div>
            <div class="card-block">
              <div class="dt-responsive table-responsive">
                <table id="new-cons" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>

                      <th width="1%">No</th>
                      <th width="13%">Nomor Surat</th>
                      <th>Perihal</th>
                      <th width="13%">Tanggal</th>

                      <th width="13%">Kategori</th>
                      <th width="2%"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($list as $field) {
                      $id = str_replace(array('+', '/', '='), array('-', 'RiFs', '_'), $this->encryption->encrypt($field->id_memo));
                    ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?php echo '<a href="' . base_url() . 'assets/upload/surat_keluar/' . $field->file . '" target="_BLANK" title="Lihat">' . $field->no_memo . '</a>'; ?></td>
                        <td><?php echo $field->judul; ?></td>
                        <td><?= relativeTime($field->tanggal) ?></td>
                        <td><?php
                            $k = $this->Mhome->where_row('kategori', ['id_kategori' => $field->kategori]);
                            echo $k->keterangan;
                            ?></td>

                        <td><button class="btn btn-primary dropdown-toggle btn-outline-primary btn-sm waves-effect waves-light" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
                          <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

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