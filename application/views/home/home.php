<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content=""/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

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
                <a href="<?php echo site_url("log_off/index/u"); ?>">
                    <button class="am-btn am-btn-default am-topbar-btn am-btn-sm"><span class="am-icon-pencil"></span>注销
                    </button>
                </a>
            </div>
        </div>
    </div>
</header>
<!--banner-->
<div class="banner">
    <div class="am-g am-container">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
            <div data-am-widget="slider" class="am-slider am-slider-c1" data-am-slider='{"directionNav":false}'>
                <ul class="am-slides">
                    <?php $num = count($hot_activity);
                    for ($count = 0; $count < $num; $count++) : ?>
                        <li>
                            <a href="<?php echo site_url("activity_detail/index/" . $hot_activity[$count]["id"]); ?>">
                                <img src="<?php echo base_url($hot_activity[$count]['poster']); ?>">
                                <div class="am-slider-desc"><?php echo $hot_activity[$count]['name']; ?></div>
                            </a>

                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<!--news-->
<div class="am-g am-container newatype">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-4">
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default">
            <h2 class="am-titlebar-title ">
                热门活动
            </h2>
            <nav class="am-titlebar-nav">
                <a href="#more">more &raquo;</a>
            </nav>
        </div>
        <!--<div data-am-widget="list_news" class="am-list-news am-list-news-default right-bg"
             data-am-scrollspy="{animation:'fade'}">
            <ul class="am-list">
                <?php /*foreach ($recommended_activity as $single_activity) : */?>
                    <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-left">
                        <div class="am-u-sm-4 am-list-thumb">
                            <a href="<?php /*echo site_url("activity_detail/index/" . $single_activity["id"]); */?>">
                                <img src="<?php /*echo base_url($single_activity['poster']); */?>" class="face"</a>
                        </div>
                        <div class=" am-u-sm-8 am-list-main">
                            <h3 class="am-list-item-hd"><a
                                        href="<?php /*echo site_url("activity_detail/index/" . $single_activity["id"]); */?>"><?php /*echo $single_activity["name"]; */?></a>
                            </h3>

                            <div class="am-list-item-text"><?php /*echo $single_activity["brief"]; */?></div>
                        </div>
                    </li>
                    <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                <?php /*endforeach; */?>
            </ul>
        </div>-->

        <ul class="am-gallery am-avg-sm-1
  am-avg-md-1 am-avg-lg-1 am-gallery-default" data-am-gallery="{ pureview: true }">
            <?php foreach ($recommended_activity as $single_activity) : ?>
            <li>
                <div class="am-gallery-item">
                    <a href="<?php echo site_url("activity_detail/index/" . $single_activity["id"]); ?>" class="">
                        <img src="<?php echo base_url($single_activity['poster']); ?>" alt="远方 有一个地方 那里种有我们的梦想"/>
                        <h3 class="am-gallery-title"><?php echo $single_activity["name"]; ?></h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr"><?php echo $single_activity["place"]; ?></div>
                            <div class="am-fl"><?php echo substr($single_activity["activity_start"],0,10); ?></div>
                        </div>
                    </a>
                </div>
            </li>
            <?php endforeach; ?>
            <li>
                <div class="am-gallery-item">
                    <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                        <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="某天 也许会相遇 相遇在这个好地方"/>
                        <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr">北京</div>
                            <div class="am-fl">2016/11/11</div>
                        </div>
                    </a>
                </div>
            </li>
            <li>
                <div class="am-gallery-item">
                    <a href="http://s.amazeui.org/media/i/demos/bing-2.jpg" class="">
                        <img src="http://s.amazeui.org/media/i/demos/bing-2.jpg" alt="某天 也许会相遇 相遇在这个好地方"/>
                        <h3 class="am-gallery-title">某天 也许会相遇 相遇在这个好地方</h3>
                        <div class="am-gallery-desc">
                            <div class="am-fr">北京</div>
                            <div class="am-fl">2016/11/11</div>
                        </div>
                    </a>
                </div>
            </li>
        </ul>

    </div>
</div>

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
</body>
</html>