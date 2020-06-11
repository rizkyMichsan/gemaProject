<div class="modal fade" id="modal_kategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="container"></div>
            <?= form_open('#') ?>
            <div class="modal-body">
                <div class="input-group input-group-sm">
                    <input type="hidden" class="form-control" id="idKategori" value='0'>
                    <input type="text" autofocus class="form-control" id="a" autocomplete="off">

                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary" id="save">Simpan</a>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>