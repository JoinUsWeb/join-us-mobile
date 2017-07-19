<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $activity['name']?>—活动详情</title>

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
    <link rel="stylesheet" href="<?php echo base_url("assets/css/details.css"); ?>">
    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script>
    <!--<![endif]-->
    <!--[if lte IE 8 ]>
    <script src="http://libs.baidu.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="<?php echo base_url("assets/js/amazeui.ie8polyfill.min.js"); ?>"></script>
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
<div class="banner">
    <div class="am-g am-container">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-8">
            <div data-am-widget="slider" class="am-slider am-slider-c1" data-am-slider='{"directionNav":false}' >
                <ul class="am-slides">
                    <li>
                        <a href="events_show.html"><img src="<?php echo base_url($activity['poster']); ?>"></a>
                        <div class="am-slider-desc"><?php echo $activity['name']; ?></div>

                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
<div>
    <div>
        <div class="am-u-sm-12 am-u-md-0 am-u-lg-4 padding-none lrad">
            <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" id="df_title">
                <h2 class="am-titlebar-title ">
                    活动详情
                </h2>
            </div>
            <div id="hdxq">
                <table>
                    <tr>
                        <td class="title">活动主题：</td>
                        <td>奥特曼教学</td>
                    </tr>
                    <tr>
                        <td class="title">开始时间：</td>
                        <td><?php echo $activity['activity_start']; ?></td>
                    </tr>
                    <tr>
                        <td class="title">活动地点：</td>
                        <td><?php echo $activity['place']; ?></td>
                    </tr>
                    <tr>
                        <td class="title">报名人数：</td>
                        <td>已有<?php echo $activity['member_number']; ?>人报名</td>
                    </tr>
                </table>



            </div>
            <script>
                if (document.body.scrollWidth>1024){
                    var heightdiv=$('.am-slides img').height()-$('#df_title').height()-30
                    $('#hdxq').css('height',heightdiv+'px')
                }
            </script>
        </div>
    </div>
</div>

<div class="am-g am-container padding-none">
    <div class="am-u-sm-12 am-u-md-12 am-u-lg-8 ">
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" >
            <h2 class="am-titlebar-title ">
                活动介绍
            </h2>
        </div>
        <div class="inf_show">
            <p><?php echo $activity['brief']; ?></p>
        </div>
        <?php
        if ($activity['creator_id'] == $this->session->user_id) { ?>
            <form action="
                            <?php
            echo site_url('activity_detail/index/' . $activity['id']);
            ?>" method="post">
                <p class="center">
                    <button type="submit" class="am-btn am-btn-primary apply" id="apply">结束活动</button>
                </p>
            </form>
        <?php } else if ($is_joined) { ?>
            <form action="
                            <?php
            echo site_url('activity_detail/quit/' . $activity['id']);
            ?>" method="post">
                <p class="center">
                    <button type="submit" class="am-btn am-btn-primary apply" id="apply">退出活动</button>
                </p>
            </form>
        <?php } else if ($activity['member_number'] >= $activity['amount_max'])
            echo '<p>报名人数已满</p>';
        else { ?>
            <form action="
            <?php
            // 判断用户是否登陆，如果没有登录无法参加活动，跳转到到登录界面
            if (isset($this->session->user_id))
                echo site_url('activity_detail/enter/' . $activity['id']);
            else
                echo site_url('login/index');
            ?>" method="post">
                <p class="center">
                    <button type="submit" class="am-btn am-btn-primary apply" id="apply">我要报名</button>
                </p>
            </form>
        <?php } ?>
    </div>
    <div class="am-u-sm-0 am-u-md-0 am-u-lg-4 ">
        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="margin-bottom: 20px">
            <h2 class="am-titlebar-title ">
                参与用户
            </h2>
        </div>
        <div class="users">
            <ul class="am-avg-sm-5 am-avg-md-5 am-avg-lg-5 am-thumbnails">
                <li class="member_review_main">
                    <div class="member_review_person">
                        <div class="person_headphoto">
                            <a href="html/details_page.html" ><img src="../img/01.jpg" alt="" width="60px" height="60px"></a>
                        </div>
                        <div class="person_id_name">
                            <a href="html/details_page.html" ><h5>金鑫</h5></a>
                        </div>
                    </div>
                </li>
                <li class="member_review_main">
                    <div class="member_review_person">
                        <div class="person_headphoto">
                            <a href="html/details_page.html" ><img src="../img/01.jpg" alt="" width="60px" height="60px"></a>
                        </div>
                        <div class="person_id_name">
                            <a href="html/details_page.html" ><h5>金鑫</h5></a>
                        </div>
                    </div>
                </li>
                <li class="member_review_main">
                    <div class="member_review_person">
                        <div class="person_headphoto">
                            <a href="html/details_page.html" ><img src="../img/01.jpg" alt="" width="60px" height="60px"></a>
                        </div>
                        <div class="person_id_name">
                            <a href="html/details_page.html" ><h5>金鑫</h5></a>
                        </div>
                    </div>
                </li>
                <li class="member_review_main">
                    <div class="member_review_person">
                        <div class="person_headphoto">
                            <a href="html/details_page.html" ><img src="../img/01.jpg" alt="" width="60px" height="60px"></a>
                        </div>
                        <div class="person_id_name">
                            <a href="html/details_page.html" ><h5>金鑫</h5></a>
                        </div>
                    </div>
                </li>
                <li class="member_review_main">
                    <div class="member_review_person">
                        <div class="person_headphoto">
                            <a href="html/details_page.html" ><img src="../img/01.jpg" alt="" width="60px" height="60px"></a>
                        </div>
                        <div class="person_id_name">
                            <a href="html/details_page.html" ><h5>金鑫</h5></a>
                        </div>
                    </div>
                </li>
                <li class="member_review_main">
                    <div class="member_review_person">
                        <div class="person_headphoto">
                            <a href="html/details_page.html" ><img src="../img/01.jpg" alt="" width="60px" height="60px"></a>
                        </div>
                        <div class="person_id_name">
                            <a href="html/details_page.html" ><h5>金鑫</h5></a>
                        </div>
                    </div>
                </li>
                <li class="member_review_main">
                    <div class="member_review_person">
                        <div class="person_headphoto">
                            <a href="html/details_page.html" ><img src="../img/01.jpg" alt="" width="60px" height="60px"></a>
                        </div>
                        <div class="person_id_name">
                            <a href="html/details_page.html" ><h5>金鑫</h5></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div data-am-widget="titlebar" class="am-titlebar am-titlebar-default" style="margin-bottom: 20px">
            <h2 class="am-titlebar-title ">
                用户评论
            </h2>
        </div>

        <!--<ul class="am-avg-sm-2 am-avg-md-2 am-avg-lg-2 am-thumbnails">
            <li><img class="am-thumbnail" src="Temp-images/zbf.png" /></li>
            <li><img class="am-thumbnail" src="Temp-images/zbf.png" /></li>
        </ul>-->
    </div>
</div>


<div data-am-widget="gotop" class="am-gotop am-gotop-fixed" >
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
