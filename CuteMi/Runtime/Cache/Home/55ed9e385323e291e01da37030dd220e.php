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
                  $(this).children('div').eq(0).load('/CuteMi/index.php/Home/Product/bianli/typeid/'+typeid);

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
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-09-26 11:42:20 HTTP/1.0 GET : /CuteMi/index.php/Home/product/header.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.2339s ( Load:0.0109s Init:0.0390s Exec:0.0241s Template:0.1601s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 4.28req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,551.25 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 6 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 33</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 124</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=s5t5a1fbsa6ntg02s17008jc60</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\index.php ( 0.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\ThinkPHP.php ( 4.63 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Think.class.php ( 12.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage.class.php ( 1.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.54 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Mode\common.php ( 2.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Common\functions.php ( 47.80 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Hook.class.php ( 4.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\App.class.php ( 13.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Route.class.php ( 13.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Controller.class.php ( 10.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\View.class.php ( 7.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\BuildLiteBehavior.class.php ( 3.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\convention.php ( 11.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Common\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Lang\zh-cn.php ( 2.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\debug.php ( 1.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php ( 4.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\CommonController.class.php ( 1.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Model.class.php ( 59.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db.class.php ( 32.66 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db\Driver\Mysql.class.php ( 10.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template.class.php ( 28.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.49 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Runtime\Cache\Home\8015ea4988fbe1d7605adcd5381a2be0.php ( 2.94 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 0.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.25 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\BuildLiteBehavior [ RunTime:0.000011s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.000056s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCacheBehavior [ RunTime:0.000534s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.000573s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplaceBehavior [ RunTime:0.000039s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000083s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplateBehavior [ RunTime:0.094673s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.094724s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCacheBehavior [ RunTime:0.052094s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.052138s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[2] Invalid argument supplied for foreach() H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php 第 56 行.</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_close` [ RunTime:0.004545s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_close` WHERE ( close_id = '1' ) LIMIT 1   [ RunTime:0.000300s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_type` [ RunTime:0.003658s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_type` WHERE ( pid = 0 )  [ RunTime:0.000292s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_attach_type` [ RunTime:0.005236s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_attach_type` WHERE ( pid = 0 )  [ RunTime:0.000289s ]</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw==" /></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.2339s </div><img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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"></div>
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




<div class="page-main channel buyphone-channel">
    <div class="container breadcrumbs"> 
        <a  href="/CuteMi/index.php/Home/index/index">首页</a><span class="sep"> 
    <div class="container channel-nav">
    <ul class="clearfix">
  <!------------------------------ 该类下所有商品名称 -------------------------->
    <?php if(is_array($res3)): foreach($res3 as $key=>$res3): ?><li>
            <a  href="/CuteMi/index.php/Home/goodsdetail/index?id=<?php echo ($res3["gid"]); ?>" target="_blank"><?php echo ($res3["gname"]); ?></a>
        </li><?php endforeach; endif; ?>
  <!------------------------------ 该类下所有商品名称结束 --------------------------> 
  </ul>
  </div>
    <div class="channel-focus"> 
            <img src="/CuteMi/Public/Events/<?php echo ($pic0); ?>" height="460" width="1226" style="display:block">
            <img src="/CuteMi/Public/Events/<?php echo ($pic1); ?>" height="460" width="1226" style="display:none">
            <img src="/CuteMi/Public/Events/<?php echo ($pic2); ?>" height="460" width="1226" style="display:none">
            <img src="/CuteMi/Public/Events/<?php echo ($pic3); ?>" height="460" width="1226" style="display:none">             
    </div>
    <div class="container channel-list">
 <ul class="row clearfix">


 <!----------------------------------------- 产品展示 ------------------------------------------>
        <?php if(is_array($res2)): foreach($res2 as $key=>$goods): ?><li class="span10">
                <div class="channel-list-img">
                    <a href="/CuteMi/index.php/Home/goodsdetail?gid=<?php echo ($goods["gid"]); ?>" target="_blank">
                        <img width="600" height="380" src="/CuteMi/Public/Uploads/<?php echo ($goods["pic"]); ?>" alt="小米手机5">
                    </a>
                </div>
                <div class="channel-list-con clearfix">
                    <dl class="channel-list-des">
                        <dt>
                            <?php echo ($goods["gname"]); ?> <b><?php echo ($goods["price"]); ?></b><span>元起</span>
                        </dt>
                        <dd>
                           <?php echo ($goods["keywords"]); ?>                  
                        </dd>
                    </dl>
                    <p class="channel-list-btn">
                        <a href="/CuteMi/index.php/Home/goodsdetail/?gid=<?php echo ($goods["gid"]); ?>" class="btn btn-line-primary">立即购买</a>
                    </p>
                </div>
            </li><?php endforeach; endif; ?>
<!------------------------------------------- 产品展示结束 ------------------------------------------>               
        </ul>
    </div>
    <div class="channel-tips">
        <div class="section container">
            <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-877bf67af7470716', '//www.mi.com/service/safe/', 'pcpid']);" data-stat-id="877bf67af7470716" href="http://www.mi.com/service/safe/" target="_blank">
                <img src="/CuteMi/Public/home/images/phone-section-01.png">
            </a>
        </div>
        <div class="section container">
            <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-0661297565d05771', '//www.mi.com/mimobile/', 'pcpid']);" data-stat-id="0661297565d05771" href="http://www.mi.com/mimobile/" target="_blank">
                <img src="/CuteMi/Public/home/images/mi-mobile.jpg" alt="" style="display:block">
            </a>
        </div>
        <div class="section container"> 
            <img src="/CuteMi/Public/home/images/phone-section-02.png">
            <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-66243771d24bdec7', '//heyue.mi.com/', 'pcpid']);" data-stat-id="66243771d24bdec7" href="http://heyue.mi.com/" target="_blank" style="position:absolute;display:block;width:305px;height:350px;bottom:99px;left:274px;"></a>
            <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-7d6025c8e251baf8', '//www.mi.com/service/exchange#installment', 'pcpid']);" data-stat-id="7d6025c8e251baf8" href="http://www.mi.com/service/exchange#installment" target="_blank" style="position:absolute;display:block;width:305px;height:350px;bottom:99px;right:274px;"></a>
        </div>
        <div class="section container">
            <img src="/CuteMi/Public/home/images/phone-section-04.jpg">
        </div>
        <div class="container channel-acces">
            <dl class="channel-acces-des">
                <dt>搭配更多智能硬件产品</dt>
                <dd>
                    以小米手机为中心，控制智能硬件产品，轻松享受智能生活带来的方便和舒适。<br>
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-54b50a3a426a5f63', '//list.mi.com/26', 'pcpid']);" data-stat-id="54b50a3a426a5f63" href="http://list.mi.com/26" target="_blank">查看更多智能硬件产品 <i class="iconfont"></i></a>
                </dd>
            </dl>
            <ul class="channel-acces-list clearfix">
                                <li>
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-9c9b01e5e4843825', '//item.mi.com/1161200006.html', 'pcpid']);" data-stat-id="9c9b01e5e4843825" href="http://item.mi.com/1161200006.html" target="_blank">
                        <img src="/CuteMi/Public/home/images/T1obJvBghv1RXrhCrK220x220.jpg" alt="小米活塞耳机 基础版">
                    </a>
                    <dl>
                        <dt><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-b8a93380e5317b15', '//item.mi.com/1161200006.html', 'pcpid']);" data-stat-id="b8a93380e5317b15" href="http://item.mi.com/1161200006.html" target="_blank">小米活塞耳机 基础版</a></dt>
                        <dd><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-e872a9440cd383be', '//item.mi.com/1161200006.html', 'pcpid']);" data-stat-id="e872a9440cd383be" href="http://item.mi.com/1161200006.html" target="_blank">新鲜绽放，5 色可选</a></dd>
                        <dd class="price">29元</dd>
                    </dl>
                </li>
                                <li>
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-5da5a84628b49d84', '//www.mi.com/huosai/', 'pcpid']);" data-stat-id="5da5a84628b49d84" href="http://www.mi.com/huosai/" target="_blank">
                        <img src="/CuteMi/Public/home/images/T1o0h_B5VT1RXrhCrK220x220.jpg" alt="小米活塞耳机标准版">
                    </a>
                    <dl>
                        <dt><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-3c9510d2abfb1338', '//www.mi.com/huosai/', 'pcpid']);" data-stat-id="3c9510d2abfb1338" href="http://www.mi.com/huosai/" target="_blank">小米活塞耳机标准版</a></dt>
                        <dd><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-0fc1a0a4fe5f9e9b', '//www.mi.com/huosai/', 'pcpid']);" data-stat-id="0fc1a0a4fe5f9e9b" href="http://www.mi.com/huosai/" target="_blank">音质优化专利，金属复合振膜技术</a></dd>
                        <dd class="price">69元</dd>
                    </dl>
                </li>
                                <li class="no-border">
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-3dbb273e6e038825', '//www.mi.com/bluetooth-headset/', 'pcpid']);" data-stat-id="3dbb273e6e038825" href="http://www.mi.com/bluetooth-headset/" target="_blank">
                        <img src="/CuteMi/Public/home/images/T190DvB4dv1RXrhCrK220x220.jpg" alt="小米蓝牙耳机">
                    </a>
                    <dl>
                        <dt><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-579cc1906e2989ef', '//www.mi.com/bluetooth-headset/', 'pcpid']);" data-stat-id="579cc1906e2989ef" href="http://www.mi.com/bluetooth-headset/" target="_blank">小米蓝牙耳机</a></dt>
                        <dd><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-be7f1a94a39e5a0d', '//www.mi.com/bluetooth-headset/', 'pcpid']);" data-stat-id="be7f1a94a39e5a0d" href="http://www.mi.com/bluetooth-headset/" target="_blank">6.5克轻巧，蓝牙4.1高清通话音质</a></dd>
                        <dd class="price">79元</dd>
                    </dl>
                </li>
                                <li>
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-c2832b3faebd3d88', '//item.mi.com/1154300037.html', 'pcpid']);" data-stat-id="c2832b3faebd3d88" href="http://item.mi.com/1154300037.html" target="_blank">
                        <img src="/CuteMi/Public/home/images/T1Tfd_BjAv1RXrhCrK220x220.jpg" alt="小钢炮蓝牙音箱2">
                    </a>
                    <dl>
                        <dt><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-1ebe14fec6365bfc', '//item.mi.com/1154300037.html', 'pcpid']);" data-stat-id="1ebe14fec6365bfc" href="http://item.mi.com/1154300037.html" target="_blank">小钢炮蓝牙音箱2</a></dt>
                        <dd><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-96081f1f28e9d134', '//item.mi.com/1154300037.html', 'pcpid']);" data-stat-id="96081f1f28e9d134" href="http://item.mi.com/1154300037.html" target="_blank">极简设计，声声动听的桌上艺术品</a></dd>
                        <dd class="price">129元</dd>
                    </dl>
                </li>
                                <li>
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-292860b24c4642e2', '//item.mi.com/1161200012.html', 'pcpid']);" data-stat-id="292860b24c4642e2" href="http://item.mi.com/1161200012.html" target="_blank">
                        <img src="/CuteMi/Public/home/images/T1vFEjBbWT1RXrhCrK220x220.jpg" alt="小米USB充电器（4口）">
                    </a>
                    <dl>
                        <dt><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-1f8e6bbf8b4ae2e8', '//item.mi.com/1161200012.html', 'pcpid']);" data-stat-id="1f8e6bbf8b4ae2e8" href="http://item.mi.com/1161200012.html" target="_blank">小米USB充电器（4口）</a></dt>
                        <dd><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-5e052e4274cc2259', '//item.mi.com/1161200012.html', 'pcpid']);" data-stat-id="5e052e4274cc2259" href="http://item.mi.com/1161200012.html" target="_blank">4个USB接口，2A快充，轻巧便携</a></dd>
                        <dd class="price">69元</dd>
                    </dl>
                </li>
                                <li class="no-border">
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-d8a683b32fdf20f4', '//www.mi.com/dianyuan10000/', 'pcpid']);" data-stat-id="d8a683b32fdf20f4" href="http://www.mi.com/dianyuan10000/" target="_blank">
                        <img src="/CuteMi/Public/home/images/T1ggWQBybT1RXrhCrK220x220.jpg" alt="小米移动电源10000mAh">
                    </a>
                    <dl>
                        <dt><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-de7e719f6891f071', '//www.mi.com/dianyuan10000/', 'pcpid']);" data-stat-id="de7e719f6891f071" href="http://www.mi.com/dianyuan10000/" target="_blank">小米移动电源10000mAh</a></dt>
                        <dd><a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-2b7e9477a7368800', '//www.mi.com/dianyuan10000/', 'pcpid']);" data-stat-id="2b7e9477a7368800" href="http://www.mi.com/dianyuan10000/" target="_blank">高密度进口电芯，仅名片大小</a></dd>
                        <dd class="price">69元</dd>
                    </dl>
                </li>
                 
                
            </ul>
        </div>
        <div class="container channel-mihone">
            <div class="channel-mihone-des">
                <dl>
                    <dt>小米之家及官方授权维修网点</dt>
                    <dd>
                        欢迎来小米之家解决你遇到的问题，了解最新的小米官方产品最全面的产品信息，还有很多好玩的活动等你来访。<br>
                        你还可以前往小米授权维修网点解决售后问题，520家网点让服务随时在身边。
                    </dd>
                </dl>
                <p>
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-92bb525974bcde0e', '//www.mi.com/c/xiaomizhijia/', 'pcpid']);" data-stat-id="92bb525974bcde0e" href="http://www.mi.com/c/xiaomizhijia/" class="btn btn-large btn-line-primary">小米之家</a>
                    <a onclick="_msq.push(['trackEvent', '8076ed7ffc35f6db-a684b74699138aae', '//www.mi.com/c/service/poststation/', 'pcpid']);" data-stat-id="a684b74699138aae" href="http://www.mi.com/c/service/poststation/" class="btn btn-large btn-line-primary">官方维修网点</a>
                </p>
            </div>
        </div>
    </div>
</div>


<script type="text/JavaScript">
      $(function(){


        //轮播图
        setInterval(fun,1000);
        var num=0;
        function fun(){
           $(".channel-focus img").css("display","none").eq(num).css("display","block");
           num++;
           if(num>3){
             num=0;
           }
       }
     

      });
</script>
</body></html>