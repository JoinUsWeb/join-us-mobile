<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>查找活动</title>

    <!--360 browser -->
    <meta name="renderer" content="webkit">
    <meta name="author" content="wos">
    <!-- Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="<?php echo base_url("images/i/app.png"); ?>">
    <!--Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url("images/i/app.png"); ?>">
    <!--Win8 or 10 -->
    <meta name="msapplication-TileImage" content="<?php echo base_url("images/i/app.png"); ?>">
    <meta name="msapplication-TileColor" content="#e1652f">

    <link rel="icon" type="image/png" href="<?php echo base_url("images/i/favicon.png"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/amazeui.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("css/public.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("css/searching.css"); ?>">

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="<?php echo base_url(" assets/js/amazeui.ie8polyfill.min.js"); ?>"></script>
    <![endif]-->
    <script src="<?php echo base_url("assets/js/amazeui.min.js"); ?>"></script>
    <script src="<?php echo base_url("js/public.js"); ?>"></script>
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

<div id="cattit">
    <ul class="am-avg-sm-1 am-avg-md-2 am-avg-lg-2">
        <li><h3>兴趣板块：运动健身</h3></li>
    </ul>
</div>
<div class="star am-container mcenter" id="num1"><span>兴趣标签</span></div>

<div class="searching_nav" id="num0">
    <ul>
        <?php $index = 1;
        foreach ($activity_in_second_label as $second_label_item): ?>
            <li><a href="#num<?php echo $index; ?>"><?php echo $second_label_item['name']; ?></a></li>
            <?php $index++; endforeach; ?>
    </ul>
</div>

<div class="clear"></div>

<?php $index = 1;
foreach ($activity_in_second_label as $second_label_item): ?>
    <div class="star am-container mcenter" id="num<?php echo $index; ?>">
        <span><?php echo $second_label_item['name']; ?></span>
    </div>
    <? if (empty($second_label_item['activity'])): ?>
        <div class="am-container am-text-center">
            <?php echo "该标签下还没有活动哦，快来创建吧~" ?>
        </div>
    <?php else: ?>
        <div class="am-container">
            <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-3 am-gallery-default"
                data-am-gallery="{ pureview: true }">
                <?php foreach ($second_label_item['activity'] as $activity_item): ?>
                    <li>
                        <div class="am-gallery-item">
                            <a href="<?php echo site_url('activity_detail/index/' . $activity_item['id']) ?>" class="">
                                <img src="<?php echo base_url($activity_item['poster']) ?>" alt="远方 有一个地方 那里种有我们的梦想"/>
                                <h3 class="am-gallery-title"><?php echo $activity_item['name'] ?></h3>
                                <div class="am-gallery-desc">活动时间：<?php echo $activity_item['activity_start'] ?></div>
                            </a>
                            <div class="events-btn">
                                <button type="button" class="am-btn am-btn-primary"
                                        onclick="window.location.href = '<?php echo site_url('activity_detail/index/' . $activity_item['id']) ?>'">
                                    点击报名
                                </button>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>

            </ul>
            <div class="am-fr"></div>
            <button type="button" class="am-btn am-btn-default am-btn-block" style="margin: 20px 0">更多活动</button>

        </div>
    <?php endif; ?>
    <?php $index++;
endforeach; ?>

<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
    <a href="#top" title="回到顶部">
        <span class="am-gotop-title">回到顶部</span>
        <i class="am-gotop-icon am-icon-chevron-up"></i>
    </a>
</div>

<footer>
    <div style="text-align: center">
        <p>Copyright © JoinUs Web. All rights reserved.</p>
    </div>
</footer>
</body>
</html>