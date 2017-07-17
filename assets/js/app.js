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
                onValid: function (validity) {
                    $(validity.field).popover("destroy");

                },
                onInValid: function (validity) {
                    var $field = $(validity.field);
                    var msg = $field.data("validationMessage") || this.getValidationMessage(validity);
                    $field.popover({
                        content: msg,
                        trigger: 'focus'
                    });
                },

                validate: function (validity) {
                    var $field = $(validity.field);
                    // Remove message
                    $field.removeAttr("data-validation-message");

                    if ($field.is("#r-email")) {
                        // Check E-mail is unique
                        if (validity.patternMismatch === true) {
                            $field.attr("data-validation-message", "邮箱格式错误！");
                        } else if (!validity.valueMissing) {
                            return $.ajax({
                                url: root + "/separated_info/register_info_check/email",
                                type: 'POST',
                                data: {
                                    '_email': $field.val()
                                }
                            }).then(function (info) {
                                if (info === "true") {
                                    validity.valid = true;
                                    console.log("Email: " + info);
                                }
                                else {
                                    validity.valid = false;
                                    // 显示错误提示
                                    $field.attr("data-validation-message", "该邮箱已经注册，请登录或者更换其他邮箱");
                                    console.log("Email: " + info);
                                }
                                return validity;
                            }, function () {
                                validity.valid = false;
                                return validity;
                            });
                        }
                    } else if ($field.is("#r-nickname") && !validity.valueMissing) {
                        // Check nick-name is not all blank
                        if ($field.val().trim().length === 0) {
                            $field.attr("data-validation-message", "昵称不可全为空格！");
                        } else {
                            // Check nickname is unique
                            return $.ajax({
                                url: root + "/separated_info/register_info_check/nickname",
                                type: 'POST',
                                data: {
                                    '_nickName': $field.val()
                                }
                            }).then(function (info) {
                                if (info === "true") {
                                    validity.valid = true;
                                    console.log("NickN: " + info);
                                }
                                else {
                                    validity.valid = false;
                                    // 显示错误提示
                                    $field.attr("data-validation-message", "昵称已被使用！");
                                    console.log("NickN: " + info);
                                }
                                return validity;
                            }, function () {
                                validity.valid = false;
                                return validity;
                            });
                        }
                    }else if ($field.is("#r-password_to_confirm") && !validity.valueMissing){
                        if (validity.patternMismatch)
                            $field.attr("data-validation-message", "两次密码不相同！");
                    }
                    return validity;
                },
                submit: function () {
                    var good = 0;
                    var formValidity = this.isFormValid();
                    if (typeof formValidity === 'boolean') return formValidity;
                    $.when(formValidity).then(function () {
                        $("#r-password").val(CryptoJS.MD5($("#r-password").val()));
                        console.log("Submit: true");
                        good = 1;
                    }, function () {
                        console.log("Submit: false");
                        good = 2;
                    });
                    return good === 1;
                }
            });
            $("#form_login").validator({
                onValid: function (validity) {
                    $(validity.field).popover("destroy");

                },
                onInValid: function (validity) {
                    var $field = $(validity.field);
                    var msg = $field.data("validationMessage") || this.getValidationMessage(validity);
                    $field.popover({
                        content: msg,
                        trigger: 'focus'
                    });
                },
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
