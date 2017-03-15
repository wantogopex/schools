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
                            email: true,
                            remote: {
                                type: 'POST',
                                url: "<?= base_url('Register/cekmail') ?>"
                            }
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
                            required: "please enter username",
                            minlength: "minimum 3 characters"
                        },
                        fullname: {
                            required: "please enter fullname",
                            minlength: "minimum 3 characters"
                        },
                        email: {
                            required: "please enter a valid email address",
                            minlength: "minimum 3 characters",
                            remote: "This email was already used for signing up."
                        },
                        password: {
                            required: "please provide a password",
                            minlength: "password at least have 8 characters",
                            maxlength: "maximum 15 characters"
                        },
                        conf_password: {
                            required: "please retype your password",
                            equalTo: "password doesn't match !"
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
                url: "<?= base_url('Register/submit') ?>",
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