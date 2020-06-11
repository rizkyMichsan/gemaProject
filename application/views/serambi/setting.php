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
                <div class="page-body" id="page-setting">
                    <div class="row">
                        <!-- user start -->
                        <div class="col-xl-12 col-md-12">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-3 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25">
                                                <img src="<?= base_url() ?>assets\assets\images\<?= logo() ?>" class="img-radius" alt="User-Profile-Image">
                                            </div>
                                            <h6 class="f-w-600"><?= title() ?></h6>
                                            <p><?= description() ?></p>
                                            <a href="#" class="text-white" id="edit_setting"><i class="feather icon-edit m-t-10 f-16"></i></a>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">

                                        <div class="card-block">

                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information
                                                <div class="float-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="feather icon-maximize full-card"></i></li>
                                                    </ul>
                                                </div>
                                            </h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Email</p>
                                                    <h6 class="text-muted f-w-400"><?= email() ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Phone</p>
                                                    <h6 class="text-muted f-w-400"><?= telp() ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Meta Keyword</p>
                                                    <h6 class="text-muted f-w-400"><?= keywords() ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">URL</p>
                                                    <h6 class="text-muted f-w-400"><?= url() ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Sosial Media</p>
                                                    <?php $s = explode(",", sosmed()); ?>
                                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                        <li><a href="<?= $s[0] ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook"><i class="feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                        <li><a href="<?= $s[1] ?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter"><i class="feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram"><i class="feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Verifikasi google</p>
                                                    <h6 class="text-muted f-w-400"><?= verification() ?></h6>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>