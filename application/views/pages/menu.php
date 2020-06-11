<nav class="pcoded-navbar">
  <div class="pcoded-inner-navbar main-menu">
    <div class="pcoded-navigatio-lavel">Navigation</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="<?php if (strtolower($this->uri->segment(1)) == "dashboard") {  ?>active<?php } ?> ">
        <a href="<?= base_url() ?>dashboard">
          <span class="pcoded-micon"><i class="feather icon-home"></i></span>
          <span class="pcoded-mtext">Dashboard</span>
        </a>
      </li>
      <li class="<?php if (strtolower($this->uri->segment(1)) == "msurat") { ?>active<?php } ?> ">
        <a href="<?= base_url() ?>Msurat">
          <span class="pcoded-micon"><i class="feather icon-mail"></i></span>
          <span class="pcoded-mtext">Surat Masuk</span>
        </a>
      </li>
      <li class="<?php if (strtolower($this->uri->segment(1)) == "ksurat") { ?>active<?php } ?> ">
        <a href="<?= base_url() ?>Ksurat">
          <span class="pcoded-micon"><i class="feather icon-navigation-2"></i></span>
          <span class="pcoded-mtext">Surat Keluar</span>
        </a>
      </li>
      <li class="<?php if (strtolower($this->uri->segment(1)) == "drive") { ?>active<?php } ?> ">
        <a href="<?= base_url() ?>drive">
          <span class="pcoded-micon"><i class="feather icon-server"></i></span>
          <span class="pcoded-mtext">Drive Arsip</span>
        </a>
      </li>
      <li class="<?php if (strtolower($this->uri->segment(1)) == "calendar") { ?>active<?php } ?> ">
        <a href="<?= base_url() ?>Calendar">
          <span class="pcoded-micon"><i class="feather icon-calendar"></i></span>
          <span class="pcoded-mtext">Kalender</span>
        </a>
      </li>
      <li class="pcoded-hasmenu <?php if (strtolower($this->uri->segment(1)) == "setting") { ?>active pcoded-trigger<?php } ?>">
        <a href="javascript:void(0)">
          <span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i></span>
          <span class="pcoded-mtext">Setting</span>
        </a>
        <ul class="pcoded-submenu">
          <li class="<?php if (strtolower($this->uri->segment(1)) == "setting" and $this->uri->segment(2) == '') { ?>active<?php } ?>">
            <a href="<?= base_url() ?>setting">
              <span class="pcoded-mtext">Profil Unit Kerja</span>
            </a>
          </li>
          <li class="<?php if (strtolower($this->uri->segment(2)) == "kategori") { ?>active<?php } ?>">
            <a href="<?= base_url() ?>setting/kategori">
              <span class="pcoded-mtext">Kategori</span>
            </a>
          </li>
          <li class="<?php if (strtolower($this->uri->segment(2)) == "user") { ?>active<?php } ?>">
            <a href="<?= base_url() ?>setting/user">
              <span class="pcoded-mtext">User</span>
            </a>
          </li>
        </ul>
      </li>

    </ul>

  </div>
</nav>

<!-- Page-header end -->