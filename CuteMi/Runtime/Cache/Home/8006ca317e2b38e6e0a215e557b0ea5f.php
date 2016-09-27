<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xml:lang="zh-CN" lang="zh-CN"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta charset="UTF-8">
<title>购买小米手机</title>
<meta name="description" content="小米官网">
<meta name="keywords" content="小米官网">
<meta name="viewport" content="width=1226">

<link rel="stylesheet" href="/CuteMi/Public/home/css/base.css">
<link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/phone.css">
<link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/cart.min.css">
<script src="/CuteMi/Public/home/js/jquery-1.7.2.js"></script>
<!-- <link rel="stylesheet" href="/CuteMi/Public/home/css/my.css">-->
<!-- <link rel="stylesheet" href="/CuteMi/Public/home/css/list.css"> -->
<link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/goods-detail.css">
<link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/overall.css">
<link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/product-minote-overall.css">

<style type="text/css">
    *{
       margin:0;
       padding:0;
       list-style:none;
    }
    .nav-child1{
        width:600px;
        left:170px;
        top:80px;
        height:400px;
        border-left:1px solid #ccc;
        border-right:1px solid #ccc;
        border-bottom:1px solid #ccc;
        position:absolute;
        background:white;
        opacity:0.5;
        display:none;
    }
    
    .pro{
        width:120px;
        height:180px;
        border:1px solid gray;
        font-size:16px;
        text-align:center;
        margin-top:2;
        float:left;
        margin-left:5px;
        margin-bottom:10px;
     
    }

    .nav-item1 a{
        height:5px;
    }

     .nav-item a{
        height:5px;
    }

    .nav-item a:hover{
        background:white;
        color:red;

    }

    #nav a:hover{
      color:red;
    }

     #nav1 a:hover{
      color:red;
    }

     #nav2 a:hover{
      color:red;
    }

    .category-item a:hover{
       background:gray;
       font-weight:bold;
       color:black;
    }
    .user-menu li a:hover{
        color:red;
    }
</style>
</head>
<body>

<!-------------------------------- 顶部导航 ---------------------------------->
<div class="site-topbar">
    <div class="container">
        <div class="topbar-nav">
        <a href="/CuteMi/index.php/Home/index/index">小米网</a><span class="sep">|</span>
            <a href="http://www.miui.com/" target="_blank" >MIUI</a><span class="sep">|</span>
            <a href="http://www.miliao.com/" target="_blank" >米聊</a><span class="sep">|</span>
            <a href="http://game.xiaomi.com/" target="_blank">游戏</a><span class="sep">|</span>
            <a href="http://www.duokan.com/" target="_blank" >多看阅读</a><span class="sep">|</span>
            <a href="http://www.mi.com/c/appdownload/" target="_blank" >小米网移动版</a><span class="sep">|</span>
            <a href="http://static.mi.com/" target="_blank" >问题反馈</a><span class="sep">|</span>
        </div>
        <div class="topbar-cart" id="J_miniCartTrigger">
            <a class="cart-mini" id="J_miniCartBtn" href="/CuteMi/index.php/Home/cart/index" >
                <i class="iconfont"></i>购物车<span class="cart-mini-num J_cartNum">（<?php echo ($num?$num:"0"); ?>）</span>
            </a>
            <div class="cart-menu" id="J_miniCartMenu" >
              <div class="loading">
                   <?php if($_SESSION['shopcar']== null): ?><div class="loader" background="blue"></div>
                   <?php else: ?>
                       <table style="border:1px solid gray;">
                      <?php if(is_array($_SESSION['shopcar'])): foreach($_SESSION['shopcar'] as $key=>$cart): ?><div  style="border:1px solid white;">
                          <tr  style="border:1px solid gray;">
                          <div>
                            <td >
                               <a href="/CuteMi/index.php/Home/cart/index">
                               <img width="80px" height="80px" src="/CuteMi/Public/uploads/<?php echo ($cart["pic"]); ?>">
                              </a>
                            </td>
                            <td> <?php echo ($cart["gname"]); ?> </td>
                            <td> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<?php echo ($cart["price"]); ?> 元</td>
                            <td >&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;<?php echo ($cart["buynum"]); ?> 件&nbsp; &nbsp;</td>
                          </div>
                          <tr>
                      </div><?php endforeach; endif; ?>
                       </table><?php endif; ?>
              </div>
            </div>
        </div>

        <?php if($_SESSION['username']['islogin']== false): ?><div class="topbar-info" id="J_userInfo">
            <a class="link" href="/CuteMi/index.php/Home/login/index">登录</a><span class="sep">|</span><a class="link" href="/CuteMi/index.php/Home/login/register">注册</a>        
        </div>
 <!------------------------------- 登陆后的导航栏 ------------------------>
         <?php else: ?>
         <div class="topbar-info" id="J_userInfo">
            <span class="user">
                <a class="user-name" href="http://my.mi.com/portal" target="_blank">
                    <span class="name"><?php echo ($_SESSION['username']['uname']); ?></span>
                    <i class="iconfont"></i>
                </a>
                <ul class="user-menu" style="display: none;">
                    <li><a href="/CuteMi/index.php/Home/space/index" target="_blank">个人中心</a></li>
                    <li><a href="/CuteMi/index.php/Home/space/dis" target="_blank">评价晒单</a></li>
                    <li><a href="/CuteMi/index.php/Home/space/collect" target="_blank">我的喜欢</a></li>
                    <li><a href="/CuteMi/index.php/Home/Personal/index" target="_blank">小米账户</a></li>
                    <li><a href="/CuteMi/index.php/Home/login/logout">退出登录</a></li>
                </ul>
            </span>
            <span class="sep">|</span>
            <a class="link link-order" href="/CuteMi/index.php/Home/space/allbook" target="_blank">我的订单</a>
        </div><?php endif; ?>
 <!------------------------------- 登陆后的导航栏结束 ------------------------>
    </div>
</div>




    <script type="text/javascript">
        $(function(){

         //二级标题
            //鼠标移入的时候
             $(".nav-item1").mouseenter(function(){
                 var typeid = $(this).attr("typeid");
                 //console.log(typeid);
                  $(this).children('div').eq(0).css("display","block").css("opacity","0.9");
                  $(this).children('div').eq(0).load('/CuteMi/index.php/Home/Goodsdetail/bianli/typeid/'+typeid);

                   //鼠标移出的时候         
                 $(this).mouseleave(function(){
                 $(this).children('div').eq(0).css('display', 'none');
             }); 
             });   

        


        // 点击账号时候触发事件
         $(".user-name").mouseover(function(){
             $(".user-menu").css("display","block");
             //移入子标题时触发事件
             $(".user-menu").mouseover(function(){
                $(this).css({display:"block"});
             });

             // 移出子标题时触发事件
            $(".user-menu").mouseout(function(){
                $(this).css("display","none");
            })
       });
        

        // 移出账号时触发事件
          $(".user-name").mouseout(function(){
              $(".user-menu").css("display","none"); 
          });
        });

          //鼠标移入购物车时候
          $("#J_miniCartTrigger").mouseover(function(){
               $("#J_miniCartMenu").css("display","block");

               //鼠标移出购物车时候
          $(this).mouseout(function(){
               $("#J_miniCartMenu").css("display","none");
          })

          });
          

    </script>










﻿﻿﻿<div class="site-header">
    <div class="container">
        <div class="header-logo">
            <a  class="logo" href="/CuteMi/index.php/Home/index/index" title="小米官网">
                <img src="/CuteMi/Public/home/images/logo.png">
            </a>
                    </div>
        <div class="header-nav">
<!------------------------------- 导航栏部分 -------------------------------------->
            <ul class="nav-list J_navMainList clearfix">
                <li id="J_navCategory" class="nav-category">
                    <a href="" style="text-align:center;line-height:70px"><span class="text">全部商品分类</span>
                    </a>
                </li>
  <!------------------------------------------- 导航栏部分 -------------------------------->
                      <!-- 商品导航-->
                      <li class="nav-item" id="nav">
                           <a  class="link" href="/CuteMi/index.php/Home/product/index/typeid/53">
                            <span class="text">小米手机</span><span class="arrow"></span>
                          </a>
                       </li><li class="nav-item" id="nav">
                           <a  class="link" href="/CuteMi/index.php/Home/product/index/typeid/56">
                            <span class="text">红米</span><span class="arrow"></span>
                          </a>
                       </li><li class="nav-item" id="nav">
                           <a  class="link" href="/CuteMi/index.php/Home/product/index/typeid/57">
                            <span class="text">平板电脑</span><span class="arrow"></span>
                          </a>
                       </li><li class="nav-item" id="nav">
                           <a  class="link" href="/CuteMi/index.php/Home/product/index/typeid/58">
                            <span class="text">电视</span><span class="arrow"></span>
                          </a>
                       </li>
                      <!-- 附件商品导航 -->
                      <li class="nav-item" id="nav1">
                           <a  class="link" href="/CuteMi/index.php/Home/product/attproduct/attid/23">
                            <span class="text">路由器</span><span class="arrow"></span>
                          </a>
                       </li><li class="nav-item" id="nav1">
                           <a  class="link" href="/CuteMi/index.php/Home/product/attproduct/attid/31">
                            <span class="text">智能硬件</span><span class="arrow"></span>
                          </a>
                       </li><li class="nav-item" id="nav1">
                           <a  class="link" href="/CuteMi/index.php/Home/product/attproduct/attid/22">
                            <span class="text">盒子</span><span class="arrow"></span>
                          </a>
                       </li>  <!------------------------------------------- 导航栏部分结束 -------------------------------->
                   <li class="nav-item" id="nav2">
                      <a class="link" href="/CuteMi/index.php/Home/coupun/index" target="_blank" ><span class="text">优惠券</span></a>
                   </li>
                </ul>
        </div>

<!--------------------------------------- 搜索功能 ------------------------------------------>
        <div class="header-search">
            <form id="J_searchForm" class="search-form clearfix" action="/CuteMi/index.php/Home/index/search" method="get">
                <label for="search" class="hide">站内搜索</label>
                <input class="search-text" id="search" name="gname"  type="search">
                <input class="search-btn iconfont" value="" type="submit">
               
           </form>
        </div>
<!--------------------------------------- 搜索功能结束 ------------------------------------------>

    </div>
    <div id="J_navMenu" class="header-nav-menu" style="display: none;">
        <div class="container"></div>
    </div>
</div><div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
<div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
<div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
	    <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">基本</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">文件</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">流程</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">错误</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">SQL</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">调试</span>
    </div>
<div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding: 0; line-height: 24px">
		    <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-09-26 11:02:33 HTTP/1.0 GET : /CuteMi/index.php/Home/product/header.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.0480s ( Load:0.0119s Init:0.0021s Exec:0.0234s Template:0.0105s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 20.83req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,551.25 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 6 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 33</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 124</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=v57s064764mf0tsdg7en6vl3k6</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\index.php ( 0.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\ThinkPHP.php ( 4.63 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Think.class.php ( 12.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage.class.php ( 1.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.54 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Mode\common.php ( 2.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Common\functions.php ( 47.80 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Hook.class.php ( 4.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\App.class.php ( 13.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Route.class.php ( 13.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Controller.class.php ( 10.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\View.class.php ( 7.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\BuildLiteBehavior.class.php ( 3.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\convention.php ( 11.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Common\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Lang\zh-cn.php ( 2.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\debug.php ( 1.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php ( 4.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\CommonController.class.php ( 1.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Model.class.php ( 59.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db.class.php ( 32.66 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db\Driver\Mysql.class.php ( 10.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template.class.php ( 28.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.49 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Runtime\Cache\Home\8015ea4988fbe1d7605adcd5381a2be0.php ( 2.94 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 0.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.25 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\BuildLiteBehavior [ RunTime:0.000011s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.000053s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCacheBehavior [ RunTime:0.000579s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.000616s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplaceBehavior [ RunTime:0.000037s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000116s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplateBehavior [ RunTime:0.007266s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.007336s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCacheBehavior [ RunTime:0.000388s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.000417s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[2] Invalid argument supplied for foreach() H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php 第 56 行.</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_close` [ RunTime:0.004413s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_close` WHERE ( close_id = '1' ) LIMIT 1   [ RunTime:0.000273s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_type` [ RunTime:0.003680s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_type` WHERE ( pid = 0 )  [ RunTime:0.000306s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_attach_type` [ RunTime:0.004257s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_attach_type` WHERE ( pid = 0 )  [ RunTime:0.000311s ]</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw==" /></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.0480s </div><img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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"></div>
<script type="text/javascript">
(function(){
var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
var open     = document.getElementById('think_page_trace_open');
var close    = document.getElementById('think_page_trace_close').childNodes[0];
var trace    = document.getElementById('think_page_trace_tab');
var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
open.onclick = function(){
	trace.style.display = 'block';
	this.style.display = 'none';
	close.parentNode.style.display = 'block';
	history[0] = 1;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
close.onclick = function(){
	trace.style.display = 'none';
this.parentNode.style.display = 'none';
	open.style.display = 'block';
	history[0] = 0;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
for(var i = 0; i < tab_tit.length; i++){
	tab_tit[i].onclick = (function(i){
		return function(){
			for(var j = 0; j < tab_cont.length; j++){
				tab_cont[j].style.display = 'none';
				tab_tit[j].style.color = '#999';
			}
			tab_cont[i].style.display = 'block';
			tab_tit[i].style.color = '#000';
			history[1] = i;
			document.cookie = 'thinkphp_show_page_trace='+history.join('|')
		}
	})(i)
}
parseInt(history[0]) && open.click();
(tab_tit[history[1]] || tab_tit[0]).click();
})();
</script>


<div class="xm-product-box">
    <div class="hd nav-bar">
        <div class="container">
            <div class="title">
    <h2>小米Note        <small>
            <span class="sep">|</span>
                            <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-1758f2239befcf6f', '/minote/pro/', 'pcpid']);" data-stat-id="1758f2239befcf6f" href="http://www.mi.com/minote/pro/">小米Note 顶配版</a>
                <span class="sep">|</span>
                <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-79c8fad81c1ec160', '/minote/ns/', 'pcpid']);" data-stat-id="79c8fad81c1ec160" href="http://www.mi.com/minote/ns/">小米Note 女神版</a>
                    </small>
    </h2>
</div>
<div class="nav">
    <span class="nav-switch">
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-a8e083bb879be79a', '/minote/', 'pcpid']);" data-stat-id="a8e083bb879be79a" class="tab tab-active" href="http://www.mi.com/minote/">概述</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-6ece02697c125003', '/minote/features/', 'pcpid']);" data-stat-id="6ece02697c125003" class="tab" href="http://www.mi.com/minote/features/">功能</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-c7aeb08598f7a1dc', '/minote/design/', 'pcpid']);" data-stat-id="c7aeb08598f7a1dc" class="tab" href="http://www.mi.com/minote/design/">设计</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-811c84630146fb83', '/minote/camera/', 'pcpid']);" data-stat-id="811c84630146fb83" class="tab" href="http://www.mi.com/minote/camera/">相机</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-451df4fcde7cce32', '/minote/hifi/', 'pcpid']);" data-stat-id="451df4fcde7cce32" class="tab" href="http://www.mi.com/minote/hifi/">HiFi</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-ad5302bec0333f87', '/minote/miui/', 'pcpid']);" data-stat-id="ad5302bec0333f87" class="tab" href="http://www.mi.com/minote/miui/">MIUI</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-d6f83e53d5cf3dd2', '/minote/gallery/', 'pcpid']);" data-stat-id="d6f83e53d5cf3dd2" class="tab" href="http://www.mi.com/minote/gallery/">图集</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-a7dba02235781b4c', '/minote/specs/', 'pcpid']);" data-stat-id="a7dba02235781b4c" class="tab" href="http://www.mi.com/minote/specs/">参数</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-684b039e2693f5f4', '/service/safe/', 'pcpid']);" data-stat-id="684b039e2693f5f4" class="link" href="http://www.mi.com/service/safe/" target="_blank">意外保</a>
        <span class="separator">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-4e6fb4c376d030a5', 'http://bbs.xiaomi.cn/forum/detail/fid/385', 'pcpid']);" data-stat-id="4e6fb4c376d030a5" class="link J_discuzz" href="http://bbs.xiaomi.cn/forum/detail/fid/385" target="_blank">讨论区</a>
        <span class="separator J_discuzz">|</span>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-5fc287d0a6bd2a22', 'http://order.mi.com/queue/f2code', 'pcpid']);" data-stat-id="5fc287d0a6bd2a22" class="link J_linkFcode" href="http://order.mi.com/queue/f2code" target="_blank">F码通道</a>
    </span>
 




    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-85963d535f8619a5', 'http://item.mi.com/buyphone/minote', 'pcpid']);" data-stat-id="85963d535f8619a5" class="btn btn-primary btn-small J_productStockStatus" href="/CuteMi/index.php/Home/BeforeCart/index/gid/<?php echo ($goods["gid"]); ?>" target="_blank">立即购买</a>
</div>        </div>
    </div>

<div class="bd">
    <div id="overall" class="minote-overall J_visibleSectionContainer xm-visible-section-container">
        <div class="section section-intro xm-visible-section" data-offset-fix="630">
            <div class="container">
                <div class="content">
                    <!-- <h2 class="title"><?php echo ($sql[0][name]); ?></h2> -->
                    <h3 class="subtitle"><?php echo ($goods['gname']); ?></h3>
                    
                    <p class="price"><span class="num">双网通版<?php echo ($goods['price']); ?></span>元起<span class="num sep">/</span><strong><span class="num">全网通版<?php echo ($goods['price']); ?></span>元</strong></p>
                    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-4f327b23c7cf2917', 'javascript:void(0);', 'pcpid']);" data-stat-id="4f327b23c7cf2917" class="video J_modalTrigger" href="javascript:%20void(0);" data-video="XODcyMjA1MTQw"><span class="icon-intro icon-intro-video"></span>观看介绍视频</a>
                </div>
                <div style="overflow: hidden;" align='center' class="stage intro-slide J_introSlide">
                    <img  class="one" src="/CuteMi/Public/Uploads/<?php echo ($goods['pic']); ?>" alt="" height="800" width="1000">
                    <img  class="one" src="/CuteMi/Public/Uploads/<?php echo ($goods['pic1']); ?>" alt="" height="800" width="1000" style="display:none">
                    <img  class="one" src="/CuteMi/Public/Uploads/<?php echo ($goods['pic2']); ?>" alt="" height="800" width="1000" style="display:none">
                    <img  class="one" src="/CuteMi/Public/Uploads/<?php echo ($goods['pic3']); ?>" alt="" height="800" width="1000" style="display:none">
                </div>
            </div>
            
            <div class="feature-list-container">
                <ul class="feature-list clearfix">
                    <li class="left top"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/1.jpg"><?php echo ($goods['storage']); ?></li>
                    <li class="top"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/2.jpg"><?php echo ($goods['system']); ?></li>
                    <li class="top"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/3.jpg"><?php echo ($goods['screen']); ?></li>
                    <li class="top"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/4.jpg">索尼 1300 万像素光学防抖相机</li>
                    <li class="left bottom"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/7.jpg">独立 HiFi 音乐系统</li>
                    <li class="bottom"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/8.jpg">6.95mm 超薄机身</li>
                    <li class="bottom"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/6.jpg">前后双曲面玻璃</li>
                    <li class="bottom"><img class="icon-overall icon-overall-02" src="/CuteMi/Public/home/images/5.jpg"><?php echo ($goods['battery']); ?></li>
                </ul>
            </div>
        </div>
        <div class="section section-body xm-visible-section" data-offset-fix="630">
            <div class="container">
                <div class="content-design">
                    <h2 class="title">为玻璃赋予生命<br>工艺与手感，更进一步</h2>
                    <h3 class="subtitle">前后曲面玻璃&nbsp;&nbsp;/&nbsp;&nbsp;铝合金金属边框<br>6.95mm 超薄机身</h3>
                    <p class="text">为了奉上代表我们科技与工艺水准的杰出之作，工程师经历了复杂而苛刻的设计与
研发过程。不仅将每一个高性能元器件浓缩在仅有 6.95 
毫米的超薄机身内，更选择了加工难度大且昂贵，但极具生命力的曲面玻璃作为机身主要材质，并选用铝合金塑造金属边框。经过层层工艺，最终赋予小米Note
 明玉般的光芒与极佳的润泽手感。</p>
                    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-895874de22707eb6', 'http://www.mi.com/minote/design/', 'pcpid']);" data-stat-id="895874de22707eb6" class="link" href="http://www.mi.com/minote/design/" style="margin-right: 15px;">标准版设计 &gt;</a>
                    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-01d0967a8f878d81', 'http://hd.mi.com/f/zt/hd/2015031601/index.html', 'pcpid']);" data-stat-id="01d0967a8f878d81" class="link" href="http://hd.mi.com/f/zt/hd/2015031601/index.html" target="_blank" style="margin-right: 15px;">天然竹特别版 &gt;</a>
                    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-d911bdab51ec1af4', 'http://www.mi.com/minote/ns/', 'pcpid']);" data-stat-id="d911bdab51ec1af4" class="link" href="http://www.mi.com/minote/ns/" target="_blank" style="margin-right: 15px;">女神版 &gt;</a>
                    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-d490630aeb0d776b', 'http://www.mi.com/minote/pro/', 'pcpid']);" data-stat-id="d490630aeb0d776b" class="link" href="http://www.mi.com/minote/pro/" target="_blank">顶配版 &gt;</a>
                </div>
                <div class="content-performance">
                    <h2 class="title">强大性能<br>集顶尖科技于一身</h2>
                    <p class="text">小米Note 
的迷人之处不仅在于更大更薄的优雅外观，内部更蕴含了与使用体验息息相关的强劲性能。选用性能强大的旗舰级高通骁龙801 四核 2.5GHz 
处理器，配备速度极快的 3GB LPDDR3 内存，只为了不断响应你对手机的需求，更痛快地玩大型 3D 
游戏，看高清电影，在同时处理多项任务时快速切换。</p>
                    <ul class="feature-list clearfix">
                        <li class="item-std">
                            <dl class="clearfix">
                                <dt>标准版</dt>
                                <dd class="left">骁龙801<br>处理器</dd>
                                <dd>3GB<br>LPDDR3</dd>
                            </dl>
                        </li>
                        <li class="item-pro">
                            <dl class="clearfix">
                                <dt>顶配版</dt>
                                <dd class="left">骁龙810<br>处理器</dd>
                                <dd><?php echo ($goods['storage']); ?><br>LPDDR4</dd>
                            </dl>
                        </li>
                    </ul>
                    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-2744abe9917bed09', 'http://www.mi.com/minote/features/', 'pcpid']);" data-stat-id="2744abe9917bed09" class="link" href="http://www.mi.com/minote/features/">了解性能 &gt;</a>
                </div>
                <img class="product" src="/CuteMi/Public/Uploads/<?php echo ($goods['pic']); ?>" alt="" height="500" width="500">
            </div>
        </div>
        <div class="section section-screen xm-visible-section" data-offset-fix="630">
            <div class="container">
                <ul class="tab-switch clearfix J_tabSwitch">
                    <li class="tab tab-active">小米Note 顶配版</li>
                    <li class="tab">小米Note</li>
                </ul>
                <div class="tab-container clearfix">
                    <div class="tab-content tab-content-pro tab-content-active">
                        <div class="content">
                            <h2 class="title">5.7英寸 2K 超高清大屏</h2>
                            <h3 class="subtitle">与世界一流屏厂 夏普 / JDI 深度定制，36项屏幕专利</h3>
                            <p class="text">小米Note 顶配版采用 2K 超高清屏幕，分辨率为 
2560x1440，这已经超过一般 24 英寸电脑显示器的分辨率，是 1080p 分辨率的 1.7 
倍之多。为了给顶配版选择一块名副其实的顶配屏幕，我们与夏普 / JDI 
深度研发定制了这块屏幕，并且就连背光、膜材、液晶等原材料全部采用顶级供应商，同时还研发了先进的阳光屏技术、负液晶技术及高色饱技术，配备这些出色的
顶尖技术，让顶配版这块屏幕几乎成为 5.7 英寸手机屏幕的最高规格。<a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-1096037c2bccef03', 'http://www.mi.com/minote/features/', 'pcpid']);" data-stat-id="1096037c2bccef03" class="link" href="http://www.mi.com/minote/features/">了解屏幕 &gt;</a></p>
                            <ul class="feature-list clearfix">
                                <li class="first"><div class="data"><span class="num">2560x1440</span></div>全高清屏幕</li>
                                <li><div class="data"><span class="num">95%</span>NTSC</div>高色彩饱和度</li>
                                <li><div class="data"><span class="num">515</span></div>PPI</li>
                                <li><div class="data"><span class="num">1400:1</span></div>超高对比度</li>
                            </ul>
                        </div>
                        <img class="product" src="/CuteMi/Public/home/images/overall-screen.jpg" alt="" height="524" width="1968">
                    </div>
                    <div class="tab-content tab-content-std hide">
                        <div class="content">
                            <h2 class="title">5.7 英寸 夏普 / JDI 负液晶全高清屏幕</h2>
                            <h3 class="subtitle">高色彩饱和度 / 1400:1 超高对比度 / 像素级动态对比度调整</h3>
                            <p class="text">屏幕更大，表现也更出色。小米Note 使用了 5.7 
英寸 夏普 / JDI 负液晶全高清视网膜屏，将普通屏幕的对比度从 1000:1 提升至 
1400:1，当你点亮屏幕的一刻，更丰富的色彩表现力与对比度都将给你出乎意料的惊艳感。此外，小米Note 
上首次采用了“像素级动态对比度调整”技术，将屏幕的每一个像素亮度进行独立控制。现在，即使在刺眼的阳光下，你也可以享受清晰的浏览体验。<a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-1096037c2bccef03', 'http://www.mi.com/minote/features/', 'pcpid']);" data-stat-id="1096037c2bccef03" class="link" href="http://www.mi.com/minote/features/">了解屏幕 &gt;</a>
                            </p>
                            <ul class="feature-list clearfix">
                                <li class="first">
                                    <div class="data"><span class="num">1080p</span></div>
                                    全高清屏幕
                                </li>
                                <li>
                                    <div class="data"><span class="num">95%</span>NTSC</div>
                                    高色彩饱和度
                                </li>
                                <li>
                                    <div class="data"><span class="num">386</span></div>
                                    PPI
                                </li>
                                <li>
                                    <div class="data"><span class="num">1400:1</span></div>
                                    超高对比度
                                </li>
                            </ul>
                        </div>
                        <img class="product" src="/CuteMi/Public/home/images/overall-screen_002.jpg" alt="" height="524" width="1956">
                    </div>
                </div>
            </div>
        </div>
        <div class="section section-camera xm-visible-section">
          <?php echo ($goods["shell"]); ?>


        </div>
      
        <div class="section section-4g xm-visible-section">
            <div class="container">
                <div class="content">
                    <h2 class="title">4G双卡双待</h2>

                    <p class="text">小米Note 可选移动 / 联通双网通与移动 / 联通 / 电信全网通2个版本。你可以在如此优越的手机上，同时使用两个号码，无论是工作还是日常私人使用，一部小米Note 就可以满足你所有的沟通需求。</p>
                    <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-b27f85ea0a42e309', 'http://www.mi.com/minote/features/', 'pcpid']);" data-stat-id="b27f85ea0a42e309" class="link" href="http://www.mi.com/minote/features/">了解网络 &gt;</a>
                    <!--
                </div>
            </div>
        </div>
        
       
        
        <div class="section section-next">
           
        </div> --> -->
    </div>
</div>

<div id="J_modalVideo" class="modal modal-video fade hide">
    <div class="modal-header">
        <h3><a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-d9ebfc59390dd848', 'javascript:void(0);', 'pcpid']);" data-stat-id="d9ebfc59390dd848" class="J_videoSwitchTrigger" href="javascript:%20void(0);" data-video="XODcyMjA1MTQw">观看介绍视频</a><span class="sep">|</span><a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-7cf22308984b4d69', 'javascript:void(0);', 'pcpid']);" data-stat-id="7cf22308984b4d69" class="J_videoSwitchTrigger" href="javascript:%20void(0);" data-video="XODcyMTc4MTEy">观看外观视频</a></h3>
        <a onclick="_msq.push(['trackEvent', '1f81c35c2933fb67-b2460c1b7b1cf44f', '', 'pcpid']);" data-stat-id="b2460c1b7b1cf44f" type="button" data-dismiss="modal" aria-hidden="true" class="close"><i class="iconfont"></i></a>
        <h3>&nbsp;</h3>
    </div>
    <div class="modal-body"></div>
</div>
﻿﻿﻿<div class="site-footer">
    <div class="container">
        <div class="footer-service">
            <ul class="list-service clearfix">
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#repaire" target="_blank" data-stat-id="da46b3d5586757a4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-da46b3d5586757a4&#39;, &#39;//www.mi.com/service/exchange#repaire&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i>1小时快修服务</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#back" target="_blank" data-stat-id="78babcae8a619e26" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-78babcae8a619e26&#39;, &#39;//www.mi.com/service/exchange#back&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i>7天无理由退货</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#free" target="_blank" data-stat-id="d1745f68f8d2dad7" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-d1745f68f8d2dad7&#39;, &#39;//www.mi.com/service/exchange#free&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i>15天免费换货</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/service/exchange#mail" target="_blank" data-stat-id="f1b5c2451cf73123" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-f1b5c2451cf73123&#39;, &#39;//www.mi.com/service/exchange#mail&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i>满150元包邮</a></li>
                            <li><a rel="nofollow" href="http://www.mi.com/c/service/poststation/" target="_blank" data-stat-id="caf836ab93cdfd31" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-caf836ab93cdfd31&#39;, &#39;//www.mi.com/c/service/poststation/&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i>520余家售后网点</a></li>
                        </ul>
        </div>
        <div class="footer-links clearfix">
            
            <dl class="col-links col-links-first">
                <dt>帮助中心</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/help_center/guide/" target="_blank" data-stat-id="2458d0d93e3f7386" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-2458d0d93e3f7386&#39;, &#39;//www.mi.com/service/help_center/guide/&#39;, &#39;pcpid&#39;]);">购物指南</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/help_center/pay/" target="_blank" data-stat-id="2109aae4f55e7716" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-2109aae4f55e7716&#39;, &#39;//www.mi.com/service/help_center/pay/&#39;, &#39;pcpid&#39;]);">支付方式</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/help_center/delivery/" target="_blank" data-stat-id="fdf4464071458ade" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-fdf4464071458ade&#39;, &#39;//www.mi.com/service/help_center/delivery/&#39;, &#39;pcpid&#39;]);">配送方式</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>服务支持</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/service/exchange" target="_blank" data-stat-id="8e282b6f669ba990" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-8e282b6f669ba990&#39;, &#39;//www.mi.com/service/exchange&#39;, &#39;pcpid&#39;]);">售后政策</a></dd>
                
                <dd><a rel="nofollow" href="http://fuwu.mi.com/" target="_blank" data-stat-id="5f2408ab3c808aa2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-5f2408ab3c808aa2&#39;, &#39;http://fuwu.mi.com/&#39;, &#39;pcpid&#39;]);">自助服务</a></dd>
                
                <dd><a rel="nofollow" href="http://xiazai.mi.com/" target="_blank" data-stat-id="18c340c920a278a1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-18c340c920a278a1&#39;, &#39;http://xiazai.mi.com/&#39;, &#39;pcpid&#39;]);">相关下载</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>小米之家</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/c/xiaomizhijia/" target="_blank" data-stat-id="b27b566974e4aa67" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-b27b566974e4aa67&#39;, &#39;//www.mi.com/c/xiaomizhijia/&#39;, &#39;pcpid&#39;]);">小米之家</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/c/service/poststation/" target="_blank" data-stat-id="bdb16d6645c388ac" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-bdb16d6645c388ac&#39;, &#39;//www.mi.com/c/service/poststation/&#39;, &#39;pcpid&#39;]);">服务网点</a></dd>
                
                <dd><a rel="nofollow" href="http://service.order.mi.com/mihome/index" target="_blank" data-stat-id="443642eacd664bd9" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-443642eacd664bd9&#39;, &#39;http://service.order.mi.com/mihome/index&#39;, &#39;pcpid&#39;]);">预约服务</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关于小米</dt>
                
                <dd><a rel="nofollow" href="http://www.mi.com/about" target="_blank" data-stat-id="f6d386c65b1f4132" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-f6d386c65b1f4132&#39;, &#39;//www.mi.com/about&#39;, &#39;pcpid&#39;]);">了解小米</a></dd>
                
                <dd><a rel="nofollow" href="http://hr.xiaomi.com/" target="_blank" data-stat-id="4307a445f5592adb" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-4307a445f5592adb&#39;, &#39;http://hr.xiaomi.com/&#39;, &#39;pcpid&#39;]);">加入小米</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/about/contact" target="_blank" data-stat-id="6842e821365ee45d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-6842e821365ee45d&#39;, &#39;//www.mi.com/about/contact&#39;, &#39;pcpid&#39;]);">联系我们</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>关注我们</dt>
                
                <dd><a rel="nofollow" href="http://e.weibo.com/xiaomishouji" target="_blank" data-stat-id="464883aa6e799290" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-464883aa6e799290&#39;, &#39;http://e.weibo.com/xiaomishouji&#39;, &#39;pcpid&#39;]);">新浪微博</a></dd>
                
                <dd><a rel="nofollow" href="http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat" target="_blank" data-stat-id="78fdefa9dee561b5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-78fdefa9dee561b5&#39;, &#39;http://xiaoqu.qq.com/mobile/share/index.html?url=http%3A%2F%2Fxiaoqu.qq.com%2Fmobile%2Fbarindex.html%3Fwebview%3D1%26type%3D%26source%3Dindex%26_lv%3D25741%26sid%3D%26_wv%3D5123%26_bid%3D128%26%23bid%3D10525%26from%3Dwechat&#39;, &#39;pcpid&#39;]);">小米部落</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/#J_modalWeixin" data-toggle="modal" data-stat-id="47539f6570f0da90" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-47539f6570f0da90&#39;, &#39;#J_modalWeixin&#39;, &#39;pcpid&#39;]);">官方微信</a></dd>
                
            </dl>
                
            <dl class="col-links ">
                <dt>特色服务</dt>
                
                <dd><a rel="nofollow" href="http://order.mi.com/queue/f2code" target="_blank" data-stat-id="fdc16dd51892a164" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-fdc16dd51892a164&#39;, &#39;//order.mi.com/queue/f2code&#39;, &#39;pcpid&#39;]);">F 码通道</a></dd>
                
                <dd><a rel="nofollow" href="http://www.mi.com/mimobile/" target="_blank" data-stat-id="99876c8aaf8ef0a4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-99876c8aaf8ef0a4&#39;, &#39;//www.mi.com/mimobile/&#39;, &#39;pcpid&#39;]);">小米移动</a></dd>
                
                <dd><a rel="nofollow" href="http://order.mi.com/misc/checkitem" target="_blank" data-stat-id="b08be6bd51351e1a" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-b08be6bd51351e1a&#39;, &#39;//order.mi.com/misc/checkitem&#39;, &#39;pcpid&#39;]);">防伪查询</a></dd>
                
            </dl>
                
            <div class="col-contact">
                <p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a rel="nofollow" class="btn btn-line-primary btn-small" href="http://www.mi.com/service/contact" target="_blank" data-stat-id="a7642f0a3475d686" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-a7642f0a3475d686&#39;, &#39;//www.mi.com/service/contact&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i> 24小时在线客服</a>            </div>
        </div>
    </div>
</div>
<div class="site-info">
    <div class="container">
        <div class="info-text">
                        <p>小米旗下网站：
                           
                        <a href="http://www.sohu.com" >搜狐</a>
                            <span class="sep">|</span><a href="http://www.mi.com" >小米网</a>
                            <span class="sep">|</span><a href="http://www.miui.com" >MIUI</a>
                            <span class="sep">|</span><a href="http://www.duokan.com" >多看书城</a>
                            <span class="sep">|</span><a href="http://www.miwifi.com" >小米路由器</a>
                            <span class="sep">|</span><a href="http://call.mi.com" >视频电话</a>
                            <span class="sep">|</span><a href="http://blog.xiaomi.com" >小米后院</a>
                            <span class="sep">|</span><a href="http://xiaomi.tmall.com" >小米天猫店</a>
                            <span class="sep">|</span><a href="http://shop115048570.taobao.com" >小米淘宝直营店</a>
                            <span class="sep">|</span><a href="http://union.mi.com" >小米网盟</a>
                            <span class="sep">|</span><a href="http://static.mi.com/feedback/" >问题反馈</a>
                            <span class="sep">|</span>  
                        </p>
                        <p align="center">&copy;<a href="####www.mi.com/" target="_blank" title="mi.com">mi.com</a> 京ICP证110507号 京ICP备10046444号 京公网安备1101080212535号 
                            <a href="####c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank">京网文[2014]0059-0009号</a></p>
                    </div>
        <div class="info-links">
                    <a href="https://search.szfw.org/cert/l/CX20120926001783002010" target="_blank" data-stat-id="9e1604cd6612205c" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-9e1604cd6612205c&#39;, &#39;https://search.szfw.org/cert/l/CX20120926001783002010&#39;, &#39;pcpid&#39;]);"><img src="/CuteMi/Public/home/images/v-logo-2.png" alt="诚信网站"></a>
                    <a href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&ct=df&pa=461082" target="_blank" data-stat-id="3e1533699f264eac" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-3e1533699f264eac&#39;, &#39;https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&amp;ct=df&amp;pa=461082&#39;, &#39;pcpid&#39;]);"><img src="/CuteMi/Public/home/images/v-logo-1.png" alt="可信网站"></a>
                    <a href="http://www.315online.com.cn/member/315140007.html" target="_blank" data-stat-id="b085e50c7ec83104" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-b085e50c7ec83104&#39;, &#39;http://www.315online.com.cn/member/315140007.html&#39;, &#39;pcpid&#39;]);"><img src="/CuteMi/Public/home/images/v-logo-3.png" alt="网上交易保障中心"></a>
                </div>
    </div>
    <div class="slogan ir">探索黑科技，小米为发烧而生</div>
</div>
<div id="J_modalWeixin" class="modal fade modal-hide modal-weixin" data-width="480" data-height="520">
        <div class="modal-hd">
            <a class="close" data-dismiss="modal" data-stat-id="cfd3189b8a874ba4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-cfd3189b8a874ba4&#39;, &#39;&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i></a>
            <h3>小米手机官方微信二维码</h3>
        </div>
        <div class="modal-bd">
            <p style="margin: 0 0 10px;">打开微信，点击右上角的“+”，选择“扫一扫”功能，<br>对准下方二维码即可。</p>
            <img alt="" src="/CuteMi/Public/home/images/qr.png" width="375" height="375">
        </div>
    </div>
<!-- .modal-weixin END -->
<div class="modal modal-hide modal-bigtap-queue" id="J_bigtapQueue">
    <div class="modal-body">
        <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont"></i></span>
        <h3>正在排队，请稍候喔！</h3>
        <p class="queue-tip">抱歉，目前排队人数较多，导致服务器压力山大，请您耐心排队等待，<br>我们将在稍后告诉您排队结果。</p>
        <div class="queue-animate">
            <div id="J_mituWalking" class="mitu-walk"> </div>
            <div class="animate-mask animate-mask-left"></div>
            <div class="animate-mask animate-mask-right"></div>
        </div>
    </div>
</div>
<!-- .xm-dm-queue END -->
<div id="J_bigtapError" class="modal modal-hide modal-bigtap-error">
    <span class="close" data-dismiss="modal" aria-hidden="true"><i class="iconfont"></i></span>
    <div class="modal-body">
        <h3>抱歉，网络拥堵无法连接服务器</h3>
        <p class="error-tip">由于访问人数太多导致服务器压力山大，请您稍后再重试。</p>
        <p>
            <a class="btn btn-primary" id="J_bigtapRetry" data-stat-id="c148a4197491d5bd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-c148a4197491d5bd&#39;, &#39;&#39;, &#39;pcpid&#39;]);">重试</a>
        </p>
    </div>
</div>
<!-- .xm-dm-error END -->
<div id="J_modal-globalSites" class="modal fade modal-hide modal-globalSites" data-width="640">
       <div class="modal-hd">
            <a class="close" data-dismiss="modal" data-stat-id="d63900908fde14b1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-d63900908fde14b1&#39;, &#39;&#39;, &#39;pcpid&#39;]);"><i class="iconfont"></i></a>
            <h3>Select Region</h3>
        </div>
        <div class="modal-bd">
            <h3>Welcome to Mi.com</h3>
            <p class="modal-globalSites-tips">Please select your country or region</p>
            <p class="modal-globalSites-links clearfix">
                <a href="http://www.mi.com/index.html" data-stat-id="51fe807618ae85f4" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-51fe807618ae85f4&#39;, &#39;//www.mi.com/index.html&#39;, &#39;pcpid&#39;]);">Mainland China</a>
                <a href="http://www.mi.com/hk/" data-stat-id="d8e4264197de1747" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-d8e4264197de1747&#39;, &#39;http://www.mi.com/hk/&#39;, &#39;pcpid&#39;]);">Hong Kong</a>
                <a href="http://www.mi.com/tw/" data-stat-id="e7bd0f4e372c0b29" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-e7bd0f4e372c0b29&#39;, &#39;http://www.mi.com/tw/&#39;, &#39;pcpid&#39;]);">TaiWan</a>
                <a href="http://www.mi.com/sg/" data-stat-id="e9c0506f7e4e7161" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-e9c0506f7e4e7161&#39;, &#39;http://www.mi.com/sg/&#39;, &#39;pcpid&#39;]);">Singapore</a>
                <a href="http://www.mi.com/my/" data-stat-id="d6299ad30ec761a8" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-d6299ad30ec761a8&#39;, &#39;http://www.mi.com/my/&#39;, &#39;pcpid&#39;]);">Malaysia</a>
                <a href="http://www.mi.com/ph/" data-stat-id="22b601cf7b3ada84" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-22b601cf7b3ada84&#39;, &#39;http://www.mi.com/ph/&#39;, &#39;pcpid&#39;]);">Philippines</a>
                <a href="http://www.mi.com/in/" data-stat-id="441d26d4571e10dc" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-441d26d4571e10dc&#39;, &#39;http://www.mi.com/in/&#39;, &#39;pcpid&#39;]);">India</a>
                <a href="http://www.mi.com/id/" data-stat-id="88ccf9755c488ec5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-88ccf9755c488ec5&#39;, &#39;http://www.mi.com/id/&#39;, &#39;pcpid&#39;]);">Indonesia</a>
                <a href="http://br.mi.com/" data-stat-id="c41d871bf5ddcd95" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-c41d871bf5ddcd95&#39;, &#39;http://br.mi.com/&#39;, &#39;pcpid&#39;]);">Brasil</a>
                <a href="http://www.mi.com/en/" data-stat-id="4426c5dac474df5f" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-4426c5dac474df5f&#39;, &#39;http://www.mi.com/en/&#39;, &#39;pcpid&#39;]);">Global Home</a>
            </p>
        </div>
    </div>
<!-- .modal-globalSites END -->
   

<iframe id="unjcIfrm" src="/CuteMi/Public/home/images/官网未登录.html" style="width: 0px; height: 0px;"></iframe></body></html><div id="think_page_trace" style="position: fixed;bottom:0;right:0;font-size:14px;width:100%;z-index: 999999;color: #000;text-align:left;font-family:'微软雅黑';">
<div id="think_page_trace_tab" style="display: none;background:white;margin:0;height: 250px;">
<div id="think_page_trace_tab_tit" style="height:30px;padding: 6px 12px 0;border-bottom:1px solid #ececec;border-top:1px solid #ececec;font-size:16px">
	    <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">基本</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">文件</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">流程</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">错误</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">SQL</span>
        <span style="color:#000;padding-right:12px;height:30px;line-height: 30px;display:inline-block;margin-right:3px;cursor: pointer;font-weight:700">调试</span>
    </div>
<div id="think_page_trace_tab_cont" style="overflow:auto;height:212px;padding: 0; line-height: 24px">
		    <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-09-26 11:02:34 HTTP/1.0 GET : /CuteMi/index.php/home/product/footer.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.0465s ( Load:0.0108s Init:0.0021s Exec:0.0185s Template:0.0150s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 21.51req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,576.89 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 4 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 33</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 124</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=cnh9dl4u3n7eevdcqe7v0dvlh7</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\index.php ( 0.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\ThinkPHP.php ( 4.63 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Think.class.php ( 12.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage.class.php ( 1.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.54 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Mode\common.php ( 2.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Common\functions.php ( 47.80 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Hook.class.php ( 4.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\App.class.php ( 13.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Route.class.php ( 13.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Controller.class.php ( 10.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\View.class.php ( 7.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\BuildLiteBehavior.class.php ( 3.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\convention.php ( 11.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Common\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Lang\zh-cn.php ( 2.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\debug.php ( 1.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php ( 4.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\CommonController.class.php ( 1.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Model.class.php ( 59.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db.class.php ( 32.66 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db\Driver\Mysql.class.php ( 10.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template.class.php ( 28.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.49 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Runtime\Cache\Home\876f3e97bd3c8e2f432bf41e4f9dee90.php ( 16.75 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 0.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.25 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\BuildLiteBehavior [ RunTime:0.000012s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.000051s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCacheBehavior [ RunTime:0.000545s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.000583s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplaceBehavior [ RunTime:0.000167s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000206s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplateBehavior [ RunTime:0.012016s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.012066s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCacheBehavior [ RunTime:0.000372s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.000403s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_close` [ RunTime:0.004935s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_close` WHERE ( close_id = '1' ) LIMIT 1   [ RunTime:0.000231s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_flink` [ RunTime:0.003636s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_flink` WHERE ( status=1 )  [ RunTime:0.000299s ]</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw==" /></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.0465s </div><img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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"></div>
<script type="text/javascript">
(function(){
var tab_tit  = document.getElementById('think_page_trace_tab_tit').getElementsByTagName('span');
var tab_cont = document.getElementById('think_page_trace_tab_cont').getElementsByTagName('div');
var open     = document.getElementById('think_page_trace_open');
var close    = document.getElementById('think_page_trace_close').childNodes[0];
var trace    = document.getElementById('think_page_trace_tab');
var cookie   = document.cookie.match(/thinkphp_show_page_trace=(\d\|\d)/);
var history  = (cookie && typeof cookie[1] != 'undefined' && cookie[1].split('|')) || [0,0];
open.onclick = function(){
	trace.style.display = 'block';
	this.style.display = 'none';
	close.parentNode.style.display = 'block';
	history[0] = 1;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
close.onclick = function(){
	trace.style.display = 'none';
this.parentNode.style.display = 'none';
	open.style.display = 'block';
	history[0] = 0;
	document.cookie = 'thinkphp_show_page_trace='+history.join('|')
}
for(var i = 0; i < tab_tit.length; i++){
	tab_tit[i].onclick = (function(i){
		return function(){
			for(var j = 0; j < tab_cont.length; j++){
				tab_cont[j].style.display = 'none';
				tab_tit[j].style.color = '#999';
			}
			tab_cont[i].style.display = 'block';
			tab_tit[i].style.color = '#000';
			history[1] = i;
			document.cookie = 'thinkphp_show_page_trace='+history.join('|')
		}
	})(i)
}
parseInt(history[0]) && open.click();
(tab_tit[history[1]] || tab_tit[0]).click();
})();
</script>


    <script>
                $(function(){
                    //轮播图
                    mypic= setInterval(fun,1000);

                    var num=0;
                    function fun(){    
                    $('.one').css({display:"none"}).eq(num).css({display:"block",width:"700",height:"700"})
                    num++;
                    if(num>3){
                      num=0;
                    }
                }


                 // 点击账号时候触发事件
                 $(".user-name").mouseover(function(){
                     $(".user-menu").css("display","block");
                     //移入子标题时触发事件
                     $(".user-menu").mouseover(function(){
                        $(this).css({display:"block"});
                     });

                     // 移出子标题时触发事件
                    $(".user-menu").mouseout(function(){
                        $(this).css("display","none");
                    })
               });
                

                // 移出账号时触发事件
                  $(".user-name").mouseout(function(){
                      $(".user-menu").css("display","none"); 
                  });
                        })

            </script>




</body></html>