<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>LOGIN SCHOOLS</title>

        <link href="<?php echo base_url('asset/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('asset/css/style_admin.css'); ?>">

<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>-->
        <style>
            .bersihkan{
                clear: both;
            }

            body{
                background: #fff;
            }

            #container{
                width: 330px;
                margin: 30px auto;
                background: #ccc;
                padding: 35px 20px 20px 20px;
                border-radius: 8px;
            }

            #container .main_login{
                margin: 0;
                padding: 0;
            }

            #container .main_login .title_login{
                font-size: 30px;
                text-transform: uppercase;
                color: #000;
                font-weight: bold;
                text-align: center;
                margin: 0 0 30px 0;
            }

            #container .main_login .logo_login{
                text-align: center;
                margin: 0 0 25px 0;
            }

            #container .main_login .logo_login img{
                border-radius: 50%;
            }

            #container .main_login .content_login{
                margin: 0;
                padding: 0;
                text-align: center;
            }

            #container .main_login .content_login form{
                margin: 20px 0 0 0;
                padding: 0;
            }

            #container .main_login .content_login form table{
                width: 100%;
                margin: 0;
                padding: 0;
            }

            #container .main_login .content_login form table tr{
                width: 100%;
                margin: 0;
                padding: 0;
            }

            #container .main_login .content_login form table tr td{
                width: 100%;
                margin: 0;
                padding: 0;
                text-align: center;
            }

            #container .main_login .content_login form table tr td .input{
                border: 1px solid #fff;
                padding: 10px;
                width: 100%;
                border-radius: 3px;
                font-size: 20px;
                margin-bottom: 10px;
            }

            #container .main_login .content_login form table tr td .login{
                width: 49%;
                padding: 10px;
                margin: 10px 0;
                border-radius: 3px;
                background: #a0c3ff;
                font-weight: bold;
                font-size: 18px;
                border: 2px solid #fff;
                text-transform: capitalize;
                cursor: pointer;
            }

            #container .main_login .content_login form table tr td .login:hover{
                background: #fff;
                border: 2px solid #a0c3ff;
            }

            #container .main_login .content_login span{
                padding: 10px;
                width: 100%;
                border-radius: 3px;
                font-size: 20px;
                margin-bottom: 10px;
                color: red;
                text-align: center;
                background: #fff;
            }
        </style>

    </head>
    <body>
        <div id="container">
            <div class="main_login">
                <div class="title_login">
                    login admin
                </div>
                <div class="logo_login">
                    <img src="asset/images/login.png" />

                </div>
                <div class="content_login">
                    <?php
                    if ($this->session->flashdata('error_message') != '') {
                        echo "<span>" . $this->session->flashdata('error_message') . "</span>";
                    }
                    ?>
                    <form action="<?php echo base_url('adminweb/c_main/verifikasi'); ?>" method="post">
                        <table>
                            <tr>
                                <td><input type="text" name="username" id="username" class="input" placeholder="Username" required /></td>
                            </tr>
                            <tr>
                                <td><input type="password" name="password" id="password" class="input" placeholder="Password" required /></td>
                            </tr>
                            <tr class="button">
                                <td>
                                    <input type="submit" name="login" id="login" class="login" value="Login" />
                                    <input type="reset" name="cancel" id="cancel" class="login" value="Hapus" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="footer_login" style="text-align: center; margin: 10px 0; color: #A6B1FF; font-size: 14px;">
                    <a href="<?= base_url() ?>">Kembali Ke Website</a>
                </div>
            </div>
        </div>
    </body>
</html>