<div class="modal fade modal-success" id="Idisposisi" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title w-100" id="myModalLabel">
                    <ul class="nav nav-tabs md-tabs " role="tablist">
                        <li class="nav-item w-50">
                            <a class="nav-link " data-toggle="tab" id="tabDispo" href="#" onclick="disposisi('123','disposisi')" role="tab"><i class="icofont icofont-letter"></i>Lembar Disposisi</a>
                            <div class="slide w-50"></div>
                        </li>
                        <li class="nav-item w-50">
                            <a class="nav-link" data-toggle="tab" id="tabScan" href="#" onclick="disposisi('123','scan')" role="tab"><i class="icofont icofont-file-pdf"></i>Scan Surat</a>
                            <div class="slide w-50"></div>
                        </li>
                    </ul>
                </h4>
                <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body tab-content j-pro" id="j-pro">
                <div class="tab-pane " id="dispo" role="tabpanel">

                    <div class="container">
                        <div class="row panels-wells">
                            <div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 ">
                                <div class="panel panel-primary">
                                    <div class="panel-heading j-text-head">
                                        <div class="row">
                                            <div class="order-lg-2 col-lg-6    text-primary" id="agendaId">ID #</div>
                                            <div class="order-lg-1 f-w-600 col-lg-6 " id="agendaNo">Nomor</div>
                                        </div>
                                    </div>
                                    <div class="panel-body j-text-subhead">
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <p class="mb-2 p-2 b-b-default f-w-600" id="agendaAsal">Dari</p>
                                                <p class="pb-5 p-2 b-b-default" id="agendaIsi">Perihal</p>

                                            </div>
                                        </div>
                                        <div class="row mb-2 b-b-default">
                                            <div class="col-6 b-r-default">
                                                <p class="mb-2 p-2"><a href="#" class=" text-c-blue" id="agendaFile"><i class="icofont icofont-ui-zoom-in text-muted">

                                                        </i> Lihat File</a></p>
                                            </div>
                                            <div class="col-6">

                                                <p class="mb-2  p-2" id="agendaKeterangan">...</p>
                                            </div>
                                        </div>
                                        <div class="card-block user-box" id="komentar_dispo">
                                            <div class="p-b-20 mb-4 b-b-default">
                                                <span class="f-14"><a href="#">Komentar</a>
                                                </span>
                                            </div>

                                            <div class="media" id="timeline_dispo">
                                                <a class="media-left" href="#">
                                                    <img class="media-object rounded-circle m-r-20" src="<?= base_url() ?>assets/assets\images\user.png" alt="Generic placeholder image">
                                                </a>
                                                <div class="media-body ">
                                                    <?= form_open_multipart('Msurat/addComment') ?>
                                                    <input type="hidden" name="aid" id="agendaId2">
                                                    <div class="b-1-primary b-radius-5">
                                                        <div class="post-bodi">
                                                            <textarea class="f-13 form-control b-none autosize" name="komentar" id="komentar" rows="3" cols="10" required="" placeholder="Write something....."></textarea>

                                                        </div>
                                                        <div class="post-futer b-t-muted p-15 d-none ">
                                                            <span class="image-upload m-r-15 ">
                                                                <label for="file-input" class="file-upload-lbl mb-2 tooltip-effect-9">
                                                                    <i class="icofont icofont-attachment text-muted"></i>
                                                                </label>

                                                                <input id="file-input" type="file" name="attach[]" multiple>
                                                                <span class="tooltip-content3">You can easily navigate the city by car.</span>
                                                            </span>
                                                        </div>

                                                    </div>
                                                    <div class="text-right m-t-5">
                                                        <input type="submit" id="postComment" class="btn btn-primary waves-effect waves-light d-none" value="Kirim">
                                                    </div>
                                                    <?= form_close() ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="form_dispo">
                                        <?php $attributes = array('class' => 'j-pro ', 'id' => 'j-pro'); ?>
                                        <?= form_open('Msurat/addDisposisi', $attributes) ?>
                                        <input type="hidden" name="aid" id="aid">
                                        <div class="panel-footer j-text-subhead">
                                            <div class="row b-b-default">
                                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 ">
                                                    <p class="mb-2 p-2  f-w-600">Didisposisikan ke :</p>
                                                </div>
                                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12  mb-2" id="disposisiKe">
                                                    <select class="js-example-basic-multiple col-sm-12" name="staf[]" multiple="multiple">
                                                        <?php
                                                        $st = $this->Mhome->Rstaf2();
                                                        foreach ($st->result_array() as $st) :
                                                            echo "<option value='" . $st['id'] . "'>" . $st['first_name'] . " " . $st['last_name'] . "</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class=" row b-b-default pt-2">
                                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                                                    <p class="mb-2 p-2  f-w-600">Tugas :</p>
                                                </div>
                                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 mb-2 " id="disposisiTugas">
                                                    <select class="js-example-basic-multiple col-sm-12" name="tugas[]" multiple="multiple">
                                                        <?php
                                                        $isi = $this->Mhome->Risi();
                                                        foreach ($isi->result_array() as $isi) :
                                                            echo "<option value='" . $isi['isi_id'] . "'>" . $isi['isi_nama'] . "</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row pt-2">
                                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                                                    <p class="mb-2 p-2  f-w-600">Catatan :</p>
                                                </div>
                                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 mb-2 " id="catatan">
                                                    <textarea class="form-control autosize" placeholder="Ketik disini.." rows="3" name="catatan" spellcheck="false" id="Icatatan"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right m-t-5">
                                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Simpan">
                                        </div>
                                        <?= form_close() ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 ">
                                <div class="panel panel-primary j-text-subhead">
                                    <div class="panel-heading bg-primary" id="agendaStatus">
                                        SEGERA
                                    </div>
                                    <div class="panel-body">

                                        <div class="row b-b-default">
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12  mb-2">
                                                <p class="  text-muted">Diterima: </p>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 ">
                                                <p class="f-w-600 w-auto" id="agendaTerima">TGL</p>
                                            </div>
                                        </div>
                                        <div class="row b-b-default">
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 mb-2 mt-2">
                                                <p class="  text-muted">Tgl Surat: </p>
                                            </div>
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 mt-2">
                                                <p class="f-w-600" id="agendaTgl">TGL</p>
                                            </div>
                                        </div>
                                        <div id="dispo_ket">
                                            <div class="row b-b-default">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 mt-4">
                                                    <p class="f-w-600">Didisposisikan ke: </p>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 mt-2" id="userDispo">

                                                </div>
                                            </div>
                                            <div class="row b-b-default">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 mt-4">
                                                    <p class="f-w-600">Tugas: </p>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 mt-2" id="userTugas">

                                                </div>
                                            </div>
                                            <div class="row b-b-default">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 mt-4">
                                                    <p class="f-w-600">Catatan: </p>
                                                </div>
                                            </div>
                                            <div class="row ">
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-2 mt-2" id="userCatatan">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-pane" id="scan" role="tabpanel">
                    <div class="embed-responsive embed-responsive-21by9" style="height: 600px;">
                        <iframe class="embed-responsive-item h-100" id="embedScan" src=""></iframe>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>