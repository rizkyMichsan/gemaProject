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
              <span><button class="btn btn-primary float-right col-lg-3 col-md-3 col-sm-12" id="inputUser"><i class="icofont icofont-user-alt-3"></i>Input User</button></span>

            </div>
            <div class="card-block">
              <div class="dt-responsive table-responsive">
                <table id="new-cons" class="table table-striped table-bordered nowrap">
                  <thead>
                    <tr>

                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Jabatan</th>
                      <th>Email</th>
                      <th>Terakhir Login</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th style="width: 60px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody> <?php
                          $s = 1;

                          foreach ($list->result_array() as $data) :
                            $id = str_replace(array('+', '/', '='), array('-', 'RiFs', '_'), $this->encryption->encrypt($data['id']));
                          ?>

                      <tr>
                        <td><?php echo $s; ?> </td>
                        <td><?php echo $data['first_name'] . " " . $data['last_name']; ?></td>
                        <td><?php echo $data['company']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo date('d/M/Y H:i:s', $data['last_login']); ?></td>

                        <td><?php
                            $role = $this->Mhome->getrole($data['id']);
                            foreach ($role->result_array() as $role) :
                              echo $role['description'];
                            endforeach;
                            ?>

                        </td>
                        <td><?php echo $stats = ($data['active'] > 0 ? "Pegawai" : "Non Pegawai"); ?></td>
                        <td>
                          <button class="btn btn-primary dropdown-toggle btn-outline-primary btn-sm waves-effect waves-light" type="button" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"></button>
                          <div class="dropdown-menu" aria-labelledby="dropdown-2" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">

                            <a class="dropdown-item waves-light waves-effect" href="#" onclick="reset('<?= $id ?>')">Reset Password</a>
                            <a class="dropdown-item waves-light waves-effect" href="#" onclick="edit_Us('<?= $id ?>')">Edit User</a>
                            <a class="dropdown-item waves-light waves-effect" href="#" onclick="hapus_us('<?= $id ?>')">Hapus</a>
                          </div>
                        </td>
                      </tr>

                    <?php
                            $s++;
                          endforeach; ?>
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