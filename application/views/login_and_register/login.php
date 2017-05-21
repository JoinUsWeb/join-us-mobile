<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>登录</title>
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
                <li class="am-active"><a href="#">首页</a></li>
                <li><a href="<?php echo site_url("search_activity/index"); ?>">查找活动</a></li>
                <li><a href="<?php echo site_url("create_activity/index"); ?>">创建活动</a></li>
                <li class="am-dropdown" data-am-dropdown>
                    <a class="am-dropdown-toggle" data-am-dropdown-toggle href="javascript:;">
                        地区 <span class="am-icon-caret-down"></span>
                    </a>
                    <ul class="am-dropdown-content">
                        <!--<li class="am-dropdown-header">案例</li>
                        <li><a href="<?php echo site_url("cases.html"); ?>">4. 全部案例</a></li>
                        <li><a href="#">1. 游戏案例</a></li>
                        <li><a href="#">2. 营销案例</a></li>-->
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
                    <form action="<?php echo site_url('register'); ?>" method="post" class="am-form">
                        <fieldset>
                            <div class="am-form-group">
                                <label for="doc-vld-name">E-mail</label>
                                <input name="_email" type="text" id="doc-vld-name" minlength="3" placeholder="Email Accounts" class="am-form-field" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-name">Nick Name</label>
                                <input name="_nickName" type="text" id="doc-vld-name" minlength="3" placeholder="User Name" class="am-form-field" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-name">Password</label>
                                <input name="_password" type="password" id="doc-vld-name" minlength="3" placeholder="User Password" class="am-form-field" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-name">Ponfirm Password</label>
                                <input name="_password2" type="password" id="doc-vld-name" minlength="3" placeholder="Confirm Password" class="am-form-field" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-name">Telephone</label>
                                <input name="_phoneNumber" type="tel" id="doc-vld-name" minlength="3" placeholder="Telephone Number" class="am-form-field" required/>
                            </div>
                            <div class="am-form-group myapp-login-treaty"><label class="am-form-label"></label><label class="am-checkbox-inline"> <input type="checkbox" value="橘子" name="docVlCb" minchecked="2" maxchecked="4" required="">已同意使用条约 </label></div>
                            <button class="myapp-login-button am-btn am-btn-secondary" type="submit">SIGN IN</button>
                        </fieldset>
                    </form>
                </div>
                <div data-tab-panel-1 class="am-tab-panel am-active">
                    <form action="<?php echo site_url('login'); ?>" method="post"  class="am-form">
                        <fieldset>
                            <div class="am-form-group">
                                <label for="doc-vld-name">E-mail</label>
                                <input name="_email" type="text" id="doc-vld-name" minlength="3" placeholder="Email Accounts" class="am-form-field" required/>
                            </div>
                            <div class="am-form-group">
                                <label for="doc-vld-name">Password</label>
                                <input name="_password" type="password" id="doc-vld-name" minlength="3" placeholder="User Password" class="am-form-field" required/>
                            </div>
                            <div class="am-form-group myapp-login-treaty"><label class="am-form-label"></label><label class="am-checkbox-inline"> <input type="checkbox" value="橘子" name="docVlCb" minchecked="2" maxchecked="4" required="">已同意使用条约 </label></div>
                            <button class="myapp-login-button am-btn am-btn-secondary" type="submit">LOGIN IN</button>
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
<script src="<?php echo base_url("assets/js/amazeui.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/app.js"); ?>"></script>
</body>
</html>