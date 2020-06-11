<?php
function cek_session_akses($link, $id)
{
    $ci = &get_instance();
    $session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    if ($session == '0' and $ci->session->userdata('level') != 'admin') {
        redirect(base_url() . 'administrator/home');
    }
}
function cek_session_admin()
{
    $ci = &get_instance();
    $session = $ci->session->userdata('level');
    if ($session != 'admin') {
        redirect(base_url());
    }
}
function sensor($teks)
{
    $ci = &get_instance();
    $query = $ci->db->query("SELECT * FROM katajelek");
    foreach ($query->result_array() as $r) {
        $teks = str_replace($r['kata'], $r['ganti'], $teks);
    }
    return $teks;
}


function cetak_meta($str, $mulai, $selesai)
{
    return strip_tags(html_entity_decode(substr(str_replace('"', '', $str), $mulai, $selesai), ENT_COMPAT, 'UTF-8'));
}

function title()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT nama_website FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['nama_website'];
}

function description()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT meta_deskripsi FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['meta_deskripsi'];
}

function verification()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT verification FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['verification'];
}
function versi()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT versi FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['versi'];
}
function icon()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT favicon FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['favicon'];
}
function url()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT url FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['url'];
}
function logo()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT logo FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['logo'];
}
function telp()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT no_telp FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['no_telp'];
}
function email()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT email FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['email'];
}
function sosmed()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT facebook FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['facebook'];
}

function keywords()
{
    $ci = &get_instance();
    $title = $ci->db->query("SELECT meta_keyword FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
    return $title['meta_keyword'];
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function tgl_simpan($tgl)
{
    $tanggal = substr($tgl, 0, 2);
    $bulan = substr($tgl, 3, 2);
    $tahun = substr($tgl, 6, 4);
    return $tahun . '-' . $bulan . '-' . $tanggal;
}

function tgl_view($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    $jam = substr($tgl, 11, 5);
    return $tanggal . ' ' . $bulan . ' ' . $tahun . ', ' . $jam;
}

function tgl_grafik($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $jam = substr($tgl, 11, 5);
    return $tanggal . ' ' . $bulan . ', ' . $jam;
}

function seo_title($s)
{
    $c = array(' ');
    $d = array('-', '/', '\\', ',', '.', '#', ':', ';', '\'', '"', '[', ']', '{', '}', ')', '(', '|', '`', '~', '!', '@', '%', '$', '^', '&', '*', '=', '?', '+', '–');
    $s = str_replace($d, '', $s); // Hilangkan karakter yang telah disebutkan di array $d
    $s = strtolower(str_replace($c, '_', $s)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $s;
}
function hari_ini($hari)
{

    switch ($hari) {
        case 'Sun':
            $hari_ini = "Minggu";
            break;

        case 'Mon':
            $hari_ini = "Senin";
            break;

        case 'Tue':
            $hari_ini = "Selasa";
            break;

        case 'Wed':
            $hari_ini = "Rabu";
            break;

        case 'Thu':
            $hari_ini = "Kamis";
            break;

        case 'Fri':
            $hari_ini = "Jumat";
            break;

        case 'Sat':
            $hari_ini = "Sabtu";
            break;

        default:
            $hari_ini = "Tidak di ketahui";
            break;
    }

    return  $hari_ini;
}
function tgl_modif2($tgl)

{

    $tanggal = substr($tgl, 8, 2);

    $bulan = bulan(substr($tgl, 5, 2));

    $tahun = substr($tgl, 0, 4);
    $hari  = date("D", strtotime($tgl));
    return hari_ini($hari) . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun; //hasil akhir

}
function tgl_modif($tgl)

{

    $tanggal = substr($tgl, 0, 2);

    $bulan = bulan(substr($tgl, 2, 2));

    $tahun = substr($tgl, 4, 4);

    return $tanggal . ' ' . $bulan . ' ' . $tahun; //hasil akhir

}

function cek_terakhir($datetime, $full = false)
{
    $today = time() + 60 * 60 * 7;
    $createdday = strtotime($datetime);
    $datediff = abs($today - $createdday);
    $difftext = "";
    $years = floor($datediff / (365 * 60 * 60 * 24));
    $months = floor(($datediff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
    $days = floor(($datediff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
    $hours = floor($datediff / 3600);
    $minutes = floor($datediff / 60);
    $seconds = floor($datediff);
    $jam = substr($datetime, 11, 5);
    $namahari = hari_ini(date('l', strtotime($datetime)));
    //year checker  
    if ($difftext == "") {
        if ($years > 1)
            $difftext = tgl_view($datetime);
        elseif ($years == 1)
            $difftext = tgl_view($datetime);
    }
    //month checker  
    if ($difftext == "") {
        if ($months > 1)
            $difftext = tgl_grafik($datetime);
        elseif ($months == 1)
            $difftext = tgl_grafik($datetime);
    }
    //month checker  
    if ($difftext == "") {
        if ($days > 1 and $days < 4)
            $difftext = $namahari . ", " . $jam;
        elseif ($days == 1)
            $difftext = "Kemarin, " . $jam;
        elseif ($days > 3)
            $difftext = tgl_grafik($datetime);
    }
    //hour checker  
    if ($difftext == "") {
        if ($hours > 1)
            $difftext = $hours . " jam yang lalu";
        elseif ($hours == 1)
            $difftext = $hours . " jam yang lalu";
    }
    //minutes checker  
    if ($difftext == "") {
        if ($minutes > 1)
            $difftext = $minutes . " menit yang lalu";
        elseif ($minutes == 1)
            $difftext = $minutes . " menit yang lalu";
    }
    //seconds checker  
    if ($difftext == "") {
        if ($seconds > 1)
            $difftext = "Beberapa saat yang lalu";
        elseif ($seconds == 1)
            $difftext = "Beberapa saat yang lalu";
    }
    return $difftext;
}
