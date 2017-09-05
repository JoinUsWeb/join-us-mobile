<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?echo $title; ?></title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="<?php echo base_url("assets/css/amazeui.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/app.css"); ?>">
</head>
<body>
<header class="am-topbar am-topbar-fixed-top wos-header">
    <div class="am-container">
        <h1 class="am-topbar-brand">
            <a href="<?php echo site_url("home"); ?>"><img src="<?php echo base_url("images/logo2.png"); ?>" alt=""></a>
        </h1>

        <button class="am-topbar-btn am-topbar-toggle am-btn am-btn-sm am-btn-warning am-show-sm-only"
                data-am-collapse="{target: '#collapse-head'}">
            <span class="am-sr-only">导航切换</span>
            <span class="am-icon-bars"></span>
        </button>

        <div class="am-collapse am-topbar-collapse" id="collapse-head">
            <ul class="am-nav am-nav-pills am-topbar-nav">
                <li class="am-active"><a href="<?php echo site_url("home"); ?>">首页</a></li>
                <li><a href="<?php echo site_url("search_activity/index"); ?>">查找活动</a></li>
                <li><a href="<?php echo site_url("create_activity/index"); ?>">创建活动</a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        地区 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <li><a href="#">上海</a></li>
                        <li><a href="#">其他</a></li>

                    </ul>
                </li>
            </ul>

            <div class="am-topbar-right">
                <a href="<?php echo site_url("register/index"); ?>"><button class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span>注册</button></a>
            </div>

            <div class="am-topbar-right">
                <a href="<?php echo site_url("login/index"); ?>"><button class="am-btn am-btn-danger am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> 登录</button></a>
            </div>
        </div>
    </div>
</header>
<div class="am-g myapp-login">
    <div class="myapp-login-bg">
        <div data-am-widget="tabs"
             class="am-tabs am-tabs-d2"
        >
            <ul class="am-tabs-nav am-cf">
                <li class=""><a href="[data-tab-panel-0]">SIGN IN</a></li>
                <li class="am-active"><a href="[data-tab-panel-1]">LOGIN IN</a></li>

            </ul>
            <div class="am-tabs-bd">
                <div data-tab-panel-0 class="am-tab-panel">
                    <form action="<?php echo site_url('register'); ?>" id="form_register" method="post" class="am-form">
                        <fieldset>
                            <div class="am-form-group">
                        <label for="r-email">E-mail</label>
                        <input type="email" name="_email" id="r-email" minlength="3" placeholder="Email Accounts" class="l-r-input" required/>
                            </div>
                            <div class="am-form-group">
                        <label for="r-nickname">Nick Name</label>
                        <input type="text" name="_nickName" id="r-nickname" minlength="3" placeholder="User Name" class="l-r-input" required/>
                            </div>
                            <div class="am-form-group">
                        <label for="r-password">Password</label>
                        <input type="password" name="_password" id="r-password" minlength="6" placeholder="User Password" class="l-r-input" required/>
                            </div>
                            <div class="am-form-group">
                        <label for="r-password_to_confirm">Confirm Password</label>
                        <input type="password" name="_password2" id="r-password_to_confirm" data-equal-to="#r-password" placeholder="Confirm Password" class="l-r-input" required/>
                            </div>
                            <div class="am-form-group">
                        <label for="r-telephone">Telephone</label>
                        <input type="tel" name="_phoneNumber" id="r-telephone" minlength="11" maxlength="11" pattern="^1((3|5|8){1}\d{1}|70)\d{8}$" placeholder="Telephone Number" class="l-r-input" required/>
                            </div>
                            <div class="am-form-group myapp-login-treaty"><label class="am-form-label"></label><label class="am-checkbox-inline"> <input type="checkbox" name="_agree" required="">已同意使用条约 </label></div>
                            <button class="myapp-login-button am-btn am-btn-secondary" id="r-submit" type="submit">SIGN IN</button>
                        </fieldset>
                    </form>
                </div>
                <div data-tab-panel-1 class="am-tab-panel am-active">
                    <form action="<?php echo site_url('login'); ?>" id="form_login" method="post" class="am-form">
                        <fieldset>
                        <?php if ($isInvalid) :?>
                        <div class="am-alert am-alert-warning"  data-am-alert>
                            <button type="button" class="am-close">&times;</button>
                            用户名或密码错误！
                        </div>
                        <?endif;?>
                            <div class="am-form-group">
                        <label for="email">E-mail</label>
                        <input type="email" name="_email" id="email" minlength="3" placeholder="Email Accounts" class="l-r-input" required/>
                            </div>
                            <div class="am-form-group">
                        <label for="password">Password</label>
                        <input type="password" name="_password" id="password" minlength="6" placeholder="User Password" class="l-r-input" required/>
                            </div>
                            <div class="am-form-group myapp-login-treaty"><label class="am-form-label"></label><label class="am-checkbox-inline"> <input type="checkbox" name="_agree" required="">已同意使用条约 </label></div>
                            <button class="myapp-login-button am-btn am-btn-secondary" id="l-submit" type="submit">LOGIN IN</button>
                        </fieldset>
                        <legend>Forgot Password?</legend>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<hr>
<footer>
    <div style="text-align: center">
        <p>Copyright © JoinUs Web. All rights reserved.</p>
    </div>
</footer>
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
<!--<![endif]-->
<!--[if lte IE 8 ]><!-->
<script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo base_url("assets/js/amazeui.ie8polyfill.min.js"); ?>"></script>
<!--<![endif]-->
<script src='https://cdn.bootcss.com/crypto-js/3.1.2/components/core-min.js' type='text/javascript'></script>
<script src='https://cdn.bootcss.com/crypto-js/3.1.2/components/md5-min.js' type='text/javascript'></script>
<script src="<?php echo base_url("assets/js/amazeui.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
</body>
</html>