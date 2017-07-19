<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>创建活动</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="<?php echo base_url("assets/i/favicon.png"); ?>">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url("assets/i/app-icon72x72@2x.png"); ?>">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/amazeui.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/admin.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/app.css"); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/styles.css"); ?>" media="all">
</head>


<body data-type="generalComponents">

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
            <?php if (!isset($this->session->user_id)) { ?>

                <div class="am-topbar-right">
                    <a href="<?php echo site_url("register/index"); ?>"><button class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span>注册</button></a>
                </div>

                <div class="am-topbar-right">
                    <a href="<?php echo site_url("login/index"); ?>"><button class="am-btn am-btn-danger am-topbar-btn am-btn-sm"><span class="am-icon-user"></span> 登录</button></a>
                </div>
            <?php } else { ?>
                <div class="am-topbar-right">
                    <a href="<?php echo site_url("log_off/index/u"); ?>">
                        <button class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span>注销
                        </button>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</header>

<div class="tpl-page-container tpl-page-header-fixed">
    <div class="tpl-content-wrapper">


        <div class="tpl-portlet-components">

            <div class="tpl-block ">

                <div class="am-g tpl-amazeui-form">


                    <div class="am-u-sm-12 am-u-md-9">
                        <form class="am-form am-form-horizontal">
                            <div class="am-form-group">
                                <label for="hd-topic" class="am-u-sm-3 am-form-label">活动主题</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="hd-topic" placeholder="请输入活动主题">
                                    <small></small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="start-date" class="am-u-sm-3 am-form-label">开始时间</label>
                                <div class="am-u-sm-9">
                                    <div class="iDate full">
                                        <input type="text" id="start-date">
                                        <button type="button" class="addOn"></button>
                                    </div>

                                </div>

                            </div>

                            <div class="am-form-group">
                                <label for="end-date" class="am-u-sm-3 am-form-label">结束时间</label>
                                <div class="am-u-sm-9">

                                    <div class="iDate full">
                                        <input type="text" id="end-date">
                                        <button type="button" class="addOn"></button>
                                    </div>


                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="hd-place" class="am-u-sm-3 am-form-label">活动地点</label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="hd-place" placeholder="活动地址">
                                    <small></small>
                                </div>
                            </div>


                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">活动详情</label>
                                <div class="am-u-sm-9">
                                    <textarea class="" rows="5" id="user-intro" placeholder="输入活动详情"></textarea>
                                    <small>250字以内...</small>
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="button" class="am-btn am-btn-primary">创建活动</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>


<script src="<?php echo base_url("assets/js/amazeui.min.js"); ?>"></script>
<script src="<?php echo base_url("assets/js/app.js"); ?>"></script>

<script type="text/javascript" src="<?php echo base_url("assets/js/moment.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap-datetimepicker.js"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        // date time picker
        if($(".iDate.full").length>0){
            $(".iDate.full").datetimepicker({
                locale: "zh-cn",
                format: "YYYY-MM-DD a hh:mm",
                dayViewHeaderFormat: "YYYY年 MMMM"
            });
        }

    })
</script>

<footer>
    <div style="text-align: center">
        <p>Copyright © JoinUs Web. All rights reserved.</p>
    </div>
</footer>
</body>
</html