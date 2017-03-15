<html>
    <head>
        <title>Halaman admin</title>
        <link rel="stylesheet" href="<?php echo base_url('asset/css/style_admin.css'); ?>">
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/js/jquery-3.1.0.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>asset/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function ()
            {
                $(".isi_add_admin").hide();
                $(".main_title_add_admin").click(function ()
                {
                    $(".isi_add_admin").slideToggle("slow");
                });
            }
            );
        </script>
        <script type="text/javascript">
            tinyMCE.init({
                // General options
                mode: "textareas"
                
            });
        </script>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <div class="top">
                    <div class="tanggal">
                        <?php
                        $hari = array("Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu");
                        $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                        echo $hari[date("w")] . ", " . date("j") . " " . $bulan[date("n")] . " " . date("Y");
                        ?>
                    </div>
                    <div class="selamat">
                        <?php echo "Selamat Datang : " . $username; ?>
                    </div>
                    <div class="bersihkan"></div>
                </div>

                <div class="menus">
                    <ul>
                        <li><a href="<?php echo base_url(); ?>adminweb/c_home">Home</a></li>
                        <li><a href="#">Siswa</a></li>
                        <li><a href="<?php echo base_url(); ?>adminweb/c_admin">Admin</a></li>
                        <li><a href="<?php echo base_url(); ?>adminweb/c_berita_terbaru">Berita Terbaru</a></li>
                        <li><?php echo anchor_popup(base_url(), "Lihat web"); ?></li>
                        <li><?php echo anchor('adminweb/c_home/logout', 'Keluar', '') ?></li>
                    </ul>
                    <div class="bersihkan"></div>
                </div>
            </div>
