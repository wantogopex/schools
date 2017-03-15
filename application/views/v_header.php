<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Schools</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('asset/css/style.css'); ?>" type="text/css" />


<!--        <script type="text/javascript" src="<?php echo base_url('asset/js/jquery-2.2.4.min.js'); ?>"></script>-->
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        
        <script type="text/javascript" src="<?php echo base_url('asset/js/jquery.validate.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('asset/js/bootstrap.js'); ?>"></script>
        
        <script>
            $(document).ready(function () {
                $(".dropdown-toggle").dropdown();
            });
        </script>
    </head>
    <body>
        <div id="wrapper" class="container">
            <section id="top">
                <div class="tgl_email">
                    <div class="col-sm-6 tgl">
                        Jum'at, 20 Mei 2016
                    </div>
                    <div class="col-sm-6 email">
                        info@mail.com
                    </div>
                </div>
            </section>

            <section id="menus">
                <div class="col-sm-12 main_menus">
                    <div class="col-sm-4 logo">
                        <img src="asset/images/logoempat.png" />
                    </div>
                    <div class="col-sm-8 navmenu">
                        <div class="wrappernav">
                            <nav class="navbar navbar-default" role="navigation">
                                <div class="container-fluid">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li><?php echo anchor(base_url(), 'Beranda'); ?></li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Profil<span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url(); ?>c_sekolah">Sekolah</a></li>
                                                    <li><a href="<?php echo base_url(); ?>c_pengajar">Pengajar</a></li>
                                                    <li><a href="<?php echo base_url(); ?>c_fasilitas">Fasilitas</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kurikulum<span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url(); ?>c_kenaikan_kelas">Kenaikan kelas</a></li>
                                                    <li><a href="<?php echo base_url(); ?>c_jurusan">Jurusan</a></li>
                                                    <li><a href="<?php echo base_url(); ?>c_lulusan">Lulusan</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kesiswaan<span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="<?php echo base_url(); ?>c_ekstra_kurikuler">ekstra kurikuler</a></li>
                                                    <li><a href="<?php echo base_url(); ?>c_keluhan">keluhan</a></li>
                                                    <li><a href="<?php echo base_url(); ?>c_osis">OSIS</a></li>
                                                    <li><a href="<?php echo base_url(); ?>c_tata_tertib">tata tertib</a></li>
                                                </ul>
                                            </li>
                                            <li class="lg"><a href="<?php echo base_url(); ?>c_galeri">Galeri</a></li>
                                            <li class="lg"><a href="<?php echo base_url(); ?>c_kontak">Kontak</a></li>
                                        </ul>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
