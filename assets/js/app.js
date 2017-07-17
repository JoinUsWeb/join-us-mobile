// The following function will be executed with jQuery as an argument
(function ($) {
    'use strict';

    $(function () {
        var $fullText = $('.admin-fullText');
        $('#admin-fullscreen').on('click', function () {
            $.AMUI.fullscreen.toggle();
        });

        $(document).on($.AMUI.fullscreen.raw.fullscreenchange, function () {
            $fullText.text($.AMUI.fullscreen.isFullscreen ? '退出全屏' : '开启全屏');
        });


        var getWindowHeight = $(window).height(),
            myappLoginBg = $('.myapp-login-bg');
        myappLoginBg.css('min-height', getWindowHeight + 'px');

        var url = window.document.location.href;
        var index_php_pos = url.indexOf("index.php");

        var root = function () {
            return url.substr(0, index_php_pos + 9);
        }();

        var page_name = function () {
            return url.substr(index_php_pos + 10, url.length);
        }();

        if (page_name.includes("login") || page_name.includes("register")) {
            $("#form_register").validator({
                validate: function (validity) {
                    var $field = $(validity.field);
                    // Check E-mail is unique
                    if ($field.is("#r-email") && !validity.valueMissing && !validity.typeMismatch) {
                        return $.ajax({
                            url: root + "/separated_info/register_info_check/email",
                            type: 'POST',
                            async: false,
                            data: {
                                '_email': $field.val()
                            }
                        }).then(function (info) {
                            if (info === "true") {
                                validity.email_unique = true;
                                validity.valid = true;
                                console.log("Email: " + info);
                            }
                            else {
                                validity.email_unique = false;
                                validity.valid = false;
                                // 显示错误提示
                                console.log("Email: " + info);
                            }
                            return validity;
                        }, function () {
                            validity.valid = false;
                            return validity;
                        });
                    } else if ($field.is("#r-nickname") && !validity.valueMissing) {
                        // Check nick-name is not all blank
                        validity.valid = ($field.val().trim().length !== 0);
                        if (validity.valid === true) {
                            // Check nickname is unique
                            return $.ajax({
                                url: root + "/separated_info/register_info_check/nickname",
                                type: 'POST',
                                async: false,
                                data: {
                                    '_nickName': $field.val()
                                }
                            }).then(function (info) {
                                if (info === "true") {
                                    validity.nickname_unique = true;
                                    validity.valid = true;
                                    console.log("NickN: " + info);
                                }
                                else {
                                    validity.nickname_unique = true;
                                    validity.valid = false;
                                    // 显示错误提示
                                    console.log("NickN: " + info);
                                }
                                return validity;
                            }, function () {
                                validity.valid = false;
                                return validity;
                            });
                        }
                        return validity;
                    }
                },
                submit: function () {
                    var formValidity = this.isFormValid();
                    $.when(formValidity).then(function () {
                        $("#r-password").val(CryptoJS.MD5($("#r-password").val()));
                        console.log("Submit: true");
                        return true;
                    }, function () {
                        console.log("Submit: false");
                        return false;
                    });
                }
            });
            $("#form_login").validator({
                submit: function () {
                    if (this.isFormValid() === true) {
                        $("#password").val(CryptoJS.MD5($("#password").val()));
                        return true;
                    }
                    return false;
                }
            });
        }
    });
})(jQuery);
