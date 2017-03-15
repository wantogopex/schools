
<section id="content">
    <div class="col-sm-12 main_content">
        <div class="col-sm-9 isi_content">
            <div class="col-sm-12 berita_terbaru">

                <div class="col-sm-12 title_ber_baru">

                    <div class="main_title_ber_baru">
                        kontak kami
                    </div>
                </div>
                <div class="col-sm-12 main_ber_baru">
                    <script>
                        $('document').ready(function ()
                        {

                            var captcha;

                            /* validation */
                            $("#register-form").validate({
                                ignore: ".ignore",
                                rules:
                                        {
                                            name: {
                                                required: true,
                                                minlength: 3
                                            },
                                            fullname: {
                                                required: true,
                                                minlength: 3
                                            },
                                            email: {
                                                required: true,
                                                email: true

                                            },
                                            password: {
                                                required: true,
                                                minlength: 8,
                                                maxlength: 15
                                            },
                                            conf_password: {
                                                required: true,
                                                equalTo: '#password'
                                            },
                                            hiddenRecaptcha: {
                                                required: function () {
                                                    if (grecaptcha.getResponse() === '') {
                                                        return true;
                                                    } else {
                                                        return false;
                                                    }
                                                }
                                            }
                                        },
                                messages:
                                        {
                                            name: {
                                                required: "Please enter username",
                                                minlength: "Minimum 3 characters"
                                            },
                                            fullname: {
                                                required: "Please enter fullname",
                                                minlength: "Minimum 3 characters"
                                            },
                                            email: {
                                                required: "Please enter a valid email address",
                                                minlength: "Minimum 3 characters",
                                                remote: "This email was already used for signing up."
                                            },
                                            password: {
                                                required: "Please provide a password",
                                                minlength: "Password at least have 8 characters",
                                                maxlength: "Maximum 15 characters"
                                            },
                                            conf_password: {
                                                required: "Please retype your password",
                                                equalTo: "Password doesn't match !"
                                            },
                                            hiddenRecaptcha: {
                                                required: "Verification if you are not a robot."
                                            }
                                        },
                                submitHandler: submitForm
                            });
                            /* validation */

                            /* form submit */
                            function submitForm()
                            {
                                var data = $("#register-form").serialize();

                                $.ajax({
                                    type: 'POST',
                                    url: "<?= base_url('C_register/submit') ?>",
                                    data: data,
                                    beforeSend: function () {
                                        $("#result").html("Please wait....");
                                    },
                                    success: function ()
                                    {
                                        //                    $('#name').val('');
                                        //                    $('#email').val('');
                                        //                    $('#password').val('');
                                        //                    $('#conf_password').val('');
                                        //                    
                                        $("#register-form").trigger('reset');

                                        $('#submit_button').val('Register');

                                        if (result.error) {
                                            $('#result').append('<div style="margin: 0 0 25px 0;" class="alert alert-danger"><button type="button" class="close">×</button>Registration is failed!</div>');
                                        } else {
                                            $('#result').html('<div style="margin: 0 0 25px 0;" class="alert alert-success"><button type="button" class="close">×</button>Registration is successful! Please check your email</div>');

                                        }

                                        window.setTimeout(function () {
                                            $(".alert").fadeTo(500, 0).slideUp(500, function () {

                                                $(this).remove();
                                            });
                                        }, 5000);

                                        $('.alert .close').on("click", function (e) {
                                            $(this).parent().fadeTo(500, 0).slideUp(500);

                                        });


                                    },
                                    complete: function () {
                                        grecaptcha.reset(captcha);
                                    }
                                });
                            }
                            /* form submit */

                        });
                    </script>
                    <center><div id="result"></div></center>
                    <div class="content_register">
                        <form autocomplete="off" method="post" id="register-form">
                            <table class="tabel_register">
                                <tr>
                                    <td class="jenis_name">Username</td>
                                    <td class="input_name"><input type="text" name="name" id="name" placeholder="Username" class="input_text" required /></td>
                                </tr>
                                <tr>
                                    <td class="jenis_name">Fullname</td>
                                    <td class="input_name"><input type="text" name="fullname" id="fullname" placeholder="Fullname" class="input_text" required /></td>
                                </tr>
                                <tr>
                                    <td class="jenis_name">Email</td>
                                    <td class="input_name"><input type="email" name="email" id="email" placeholder="Email" class="input_text" required /></td>
                                </tr>
                                <tr>
                                    <td class="jenis_name">Password</td>
                                    <td class="input_name"><input type="password" name="password" id="password" placeholder="Password" class="input_text" required></td>
                                </tr>
                                <tr>
                                    <td class="jenis_name">Confirm Password</td>
                                    <td class="input_name"><input type="password" name="conf_password" id="conf_password" placeholder="Confirm Password" class="input_text" required></td>
                                </tr>
                                <tr>
                                    <td class="jenis_name"></td>
                                    <td class="input_name">



                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="input_name">
                                        <input class="submit" id="submit_button" type="submit" value="Register">
                                        <input class="cancel" id="reset_button" type="reset" value="Reset">
                                    </td>
                                </tr>
                            </table>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('v_sidebar'); ?>
    </div>
</section>
