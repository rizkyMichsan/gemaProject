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
        <div class="page-body" id="page-cal">
          <div class="card">
            <div class="card-header">
              <h5>Full Calender</h5>
              <div class="card-header-right">
                <ul class="list-unstyled card-option">
                  <li><i class="feather icon-maximize full-card"></i></li>
                </ul>
              </div>
            </div>
            <div class="card-block">
              <div class="row">

                <div class="col-xl-12 col-md-12">
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>