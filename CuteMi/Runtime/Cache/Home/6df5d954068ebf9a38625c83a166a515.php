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
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-09-18 18:25:31 HTTP/1.0 GET : /CuteMi/index.php/Home/product/header.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.0635s ( Load:0.0099s Init:0.0025s Exec:0.0423s Template:0.0088s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 15.75req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,551.25 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 6 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 33</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 124</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=sheigcmi24gmagjlf3ssjssoj0</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\index.php ( 0.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\ThinkPHP.php ( 4.63 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Think.class.php ( 12.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage.class.php ( 1.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.54 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Mode\common.php ( 2.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Common\functions.php ( 47.80 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Hook.class.php ( 4.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\App.class.php ( 13.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Route.class.php ( 13.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Controller.class.php ( 10.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\View.class.php ( 7.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\BuildLiteBehavior.class.php ( 3.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\convention.php ( 11.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Common\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Lang\zh-cn.php ( 2.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\debug.php ( 1.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php ( 4.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\CommonController.class.php ( 1.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Model.class.php ( 59.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db.class.php ( 32.66 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db\Driver\Mysql.class.php ( 10.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template.class.php ( 28.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.49 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Runtime\Cache\Home\8015ea4988fbe1d7605adcd5381a2be0.php ( 2.94 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 0.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.25 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\BuildLiteBehavior [ RunTime:0.000011s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.000052s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCacheBehavior [ RunTime:0.000527s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.000566s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplaceBehavior [ RunTime:0.000036s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000077s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplateBehavior [ RunTime:0.006515s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.006565s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCacheBehavior [ RunTime:0.000276s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.000305s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[2] Invalid argument supplied for foreach() H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php 第 56 行.</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_close` [ RunTime:0.023697s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_close` WHERE ( close_id = '1' ) LIMIT 1   [ RunTime:0.000289s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_type` [ RunTime:0.003412s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_type` WHERE ( pid = 0 )  [ RunTime:0.000261s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_attach_type` [ RunTime:0.003509s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_attach_type` WHERE ( pid = 0 )  [ RunTime:0.000261s ]</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw==" /></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.0635s </div><img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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"></div>
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

<script src='/CuteMi/Public/home/js/jquery-1.7.2.js'></script>

<style type="text/css">
    .color{
        width:40px;
        height:40px;
        float:left;
        border:1px solid red;
        margin-right:5px;
        text-align:center;
        line-height:40px;

    }


</style>

<div class="breadcrumbs">
    <div class="container ">
        <a onclick="_msq.push(['trackEvent', '1863416154b69eba-b0bcd814768c68cc', '//www.mi.com/index.html', 'pcpid']);" data-stat-id="b0bcd814768c68cc" href="http://www.mi.com/index.html">首页</a><span class="sep">/</span><a onclick="_msq.push(['trackEvent', '1863416154b69eba-c41d3d0863ab0b05', '//list.mi.com/0', 'pcpid']);" data-stat-id="c41d3d0863ab0b05" href="http://list.mi.com/0">配件</a><span class="sep">/</span><a onclick="_msq.push(['trackEvent', '1863416154b69eba-deed9b2dab6de0e4', '//list.mi.com/14', 'pcpid']);" data-stat-id="deed9b2dab6de0e4" href="http://list.mi.com/14">电池</a><span class="sep">/</span><a onclick="_msq.push(['trackEvent', '1863416154b69eba-a8a5b48eadcbf894', '//item.mi.com/1154300033.html', 'pcpid']);" data-stat-id="a8a5b48eadcbf894" href="http://item.mi.com/1154300033.html"><?php echo ($goods["gname"]); ?></a>    </div>
</div>
<!-- E 面包屑 -->
<div class="goods-detail">
    <div class="goods-detail-info  clearfix J_goodsDetail">
        <div class="container">
            <div class="row">
                <div class="span13  J_mi_goodsPic_block goods-detail-left-info">
                    <div class="goods-pic-box  " id="J_mi_goodsPicBox">
                        <div class="goods-big-pic J_bigPicBlock">
                            <img src="/CuteMi/Public/Uploads/<?php echo ($goods["pic"]); ?>" class="J_goodsBigPic" id="J_BigPic">
                        </div>
                        <div class="goods-pic-loading">
                            <div class="loader loader-gray"></div>
                        </div>
                                                <div class="goods-small-pic clearfix">
                            <ul id="goodsPicList">
                                                                    <li class="current">
                                        <img src="/CuteMi/Public/Uploads/<?php echo ($goods["pic"]); ?>" >
                                    </li>
                                                                    <li class="">
                                        <img src="/CuteMi/Public/Uploads/<?php echo ($goods["pic1"]); ?>" >
                                    </li>
                                                                    <li class="">
                                        <img src="/CuteMi/Public/Uploads/<?php echo ($goods["pic2"]); ?>" >
                                    </li>
                                                                    <li class="">
                                        <img src="/CuteMi/Public/Uploads/<?php echo ($goods["pic3"]); ?>" >
                                    </li>
                                                            </ul>
                        </div>

                    </div>
                    <div class="span11 goods-batch-img-liblock J_goodsBatchImg">
                     
                    </div>
                </div>
                <div class="span7 goods-info-rightbox">
                    <div class="goods-info-leftborder"></div>
                   <dl class="goods-info-box ">
                    <dt class="goods-info-head">
                        <dl id="J_goodsInfoBlock">
                            
                            
                         <dt id="goodsName" class="goods-name"> <?php echo ($goods["gname"]); ?>    </dt>  <dd class="goods-subtitle"> 
                         <!-- <p> <?php echo ($goods["keywords"]); ?>        </p>  -->
                     </dd>    <dd class="goods-info-head-price clearfix"> <b class="J_mi_goodsPrice"><?php echo ($goods["price"]); ?></b> <i>&nbsp;元</i> <del> <span class="J_mi_marketPrice"></span> </del>  </dd>   <dd class="goods-info-head-colors clearfix"><span class="style-name co"></span> <div class="clearfix">   
                    <div class="colorli">
                        <?php if(is_array($color)): foreach($color as $key=>$col): ?><div class="color" alt="<?php echo ($col); ?>"><?php echo ($col); ?></div>
                         <!-- <a style="float:left;margin:5px" href="http://item.mi.com/1154300033.html" class="current" title="标准装"> <img width='x' height='40px'class="square" src="/CuteMi/Public/Uploads/<?php echo ($goods["pic"]); ?>"> </a>
                         <a style="float:left;margin:5px" href="http://item.mi.com/1154300033.html" class="current" title="标准装"> <img width='x' height='40px'class="square" src="/CuteMi/Public/Uploads/<?php echo ($goods["pic"]); ?>"> </a> --><?php endforeach; endif; ?>

                    </div> 
                   
     
                          </div> </dd>         
                          <dd class="goods-info-head-cart" id="goodsDetailBtnBox"> 
                            <a href="/CuteMi/index.php/Home/cart/index" id="goodsDetailAddCartBtn" class="btn shop btn-primary goods-add-cart-btn" > 
                                <i class="iconfont"></i>加入购物车 
                            </a> 
                            <a> <i class="iconfont default"></i><i class="iconfont red"></i><i class="iconfont red J_redCopy"></i></a> </dd>  <dd class="goods-info-head-userfaq"> 
                        <ul> 
                            <li class="J_scrollHref" data-href="#goodsComment" data-index="2"> <i class="iconfont"></i> 评价<b><?php echo ($count); ?></b> 

                        </ul> 
                    </dd> 
                </dl>
                    </dt>
                    
                </dl>
                </div>
            </div>

        </div>
    </div>
    <div class="full-screen-border"></div>
    <div class="goods-detail-nav" id="goodsDetail">
        <div class="container">
            <ul class="detail-list J_detailNav J_originNav">
                <li class="detail-nav">
                    <a onclick="_msq.push(['trackEvent', '1863416154b69eba-2f27371406a047cd', '', 'pcpid']);" data-stat-id="2f27371406a047cd" data-href="#goodsDesc" data-index="0" class="J_scrollHref">详情描述</a>
                </li>

                <li class="detail-nav current">
                    <a onclick="_msq.push(['trackEvent', '1863416154b69eba-bbde2caff4f4853c', '', 'pcpid']);" data-stat-id="bbde2caff4f4853c" data-href="#goodsParam" data-index="1" class="J_scrollHref">规格参数</a>
                </li>

                <li class="detail-nav">
                    <a onclick="_msq.push(['trackEvent', '1863416154b69eba-b926f71b03395c39', '', 'pcpid']);" data-stat-id="b926f71b03395c39" data-href="#goodsComment" data-index="2" class="J_scrollHref">评价晒单 <i><?php echo ($count); ?></i></a>
                </li>

                <li class="last detail-nav">
                    <a onclick="_msq.push(['trackEvent', '1863416154b69eba-fcac91be0ebfa956', '', 'pcpid']);" data-stat-id="fcac91be0ebfa956" data-href="#goodsFaq" data-index="3" class="J_scrollHref">商品提问 <i>(123)</i></a>
                </li>
            </ul>
        </div>

    </div>
    <div style="display: none;" class="goods-detail-desc J_itemBox" id="goodsDesc">
        <div class="container">
       
        </div>
    </div>
    <div style="display: block;" class="goods-detail-nav-name-block J_itemBox" id="goodsParam">
        <div class="container main-block">
            <div class="border-line"></div>
            <h2 class="nav-name">规格参数</h2>
        </div>
    </div>  
    <!--规格-->
    <div style="display: block;" class="goods-detail-param  J_itemBox">
        <div class="container">
            <ul class="param-list">
                <li class="goods-img">
                 <img src="/CuteMi/Public/home/images/T1xxVTBghv1RXrhCrK180x180.jpg" alt="">
                </li>
                <li class="goods-tech-spec">
                    <dl>
                        <dd>
                            <ul>
                                                                                                <li>
                                  包装内容：<?php echo ($goods["gname"]); ?>                                </li>
                                                                <li>
                                  产品型号：<?php echo ($goods["verson"]); ?>                                </li>
                                                                <li>
                                  电池型号：AA LR6                                </li>
                                                                <li>
                                  电池类型：碱性电池                                </li>
                                                                <li>
                                  标称电压：1.5V                                </li>
                                                                <li>
                                  颜色：<?php echo ($goods["color"]); ?>                                </li>
                                                                                                <li>
                                  商品编号：<?php echo ($goods["gid"]); ?>                               </li>
                            </ul>
                        </dd>
                    </dl>
                </li>
            </ul>
        </div>
    </div>

    <!--规格-->
    <div style="display: block;" class="goods-detail-nav-name-block J_itemBox" id="goodsComment">
        <div class="container main-block">
            <div class="border-line"></div>
            <h2 class="nav-name">评价晒单</h2>
        </div>
    </div>  
    <!--评价-->
    <div style="display: block;" class="goods-detail-comment J_itemBox hasContent" id="goodsCommentContent">
        <div style="" class="goods-detail-comment-groom" id="J_recommendComment"> <div class="container"> <ul class="main-block"> <li class="percent"> <div class="per-num"> <i>99.5</i>% </div> <div class="per-title"> 购买后满意 </div> <div class="per-amount"> <i>38982</i>名用户投票 </div> </li>  <li class="item-rainbow-1 groom-content"> <dl> <dt> <div class="groom-content-userImage"> <img src="/CuteMi/Public/home/images/aqgAhnec3kiXRt_90.jpg" alt=""> </div> <div class="groom-content-userName">刘特曼</div> <div class="groom-content-commentNum">93人有相似评价</div> </dt> <dd> <i class="iconfont"></i> 背景音乐起：今天周五天气晴/万里无云萌萌哒周五一早就收到了彩虹电池！彩色的，好像彩虹糖有木有？彩色的电池萌萌哒！还有个盒子萌萌哒！！ </dd> </dl> </li>  <li class="item-rainbow-3 groom-content"> <dl> <dt> <div class="groom-content-userImage"> <img src="/CuteMi/Public/home/images/TYBAFQp1Yh8Bey_90.jpg" alt=""> </div> <div class="groom-content-userName">jn西卡</div> <div class="groom-content-commentNum">146人有相似评价</div> </dt> <dd> <i class="iconfont"></i> 好用值得购买，小米可以发展线下开小米商店。 </dd> </dl> </li>  </ul> </div></div>

        <div style="" class="goods-detail-comment-content" id="J_commentDetailBlock">
            <div class="container">
                <div class="row">
                    <div class="span14 goods-detail-comment-list">
                        <div class="comment-order-title">
                            <div class="left-title">
                                <h3 class="comment-name">最有帮助的评价</h3>
                            </div>
                            <div class="right-title J_showImg">
                             <i class="iconfont">√</i>只显示带图评价
                            </div>
                        </div>
                        <ul class="comment-box-list" id="J_supComment"> 

                        <!-- 循环遍历评论列表 -->
                      <?php if(is_array($hf)): foreach($hf as $key=>$dis): ?><li class="item-rainbow-2 " data-id="133135206"> 
                                <div class="user-image"> 
                                    <img src="/CuteMi/Public/home/images/BfsrwjEiryut0F_90.jpg" alt=""> 
                                </div> 
                                <div class="user-emoj"> 超爱
                                    <i class="iconfont"></i> 
                                </div> 
                                <div class="user-name-info"> 
                                    <span class="user-name">  <a href="https://me.mi.com/181792786"></a>  
                                    </span> 
                                    <span class="user-time"><?php echo ($dis["addtime"]); ?></span>
                                    <span class="pro-info"></span> 
                                </div> 
                                <div class="user-hand-block"> 
                                    <a href="javascript:void(0);" data-commentid="133135206" class="J_hasHelp "> <i class="iconfont"></i>&nbsp;
                                        <span class="amount"></span>
                                    </a> <span class="separate"></span> 
                                    <a href="javascript:void(0);" data-commentid="133135206" class="J_noHelp  "> <i class="iconfont"></i>&nbsp;<span class="amount"></span>
                                    </a> 
                                </div> 
                                <dl class="ll user-comment"> 
                                    <dt class="user-comment-content J_commentContent"> <p class="content-detail"> 
                                         <a href="#"> <?php echo ($dis["comment"]); ?> </a> 
                                        </p>  
                                    </dt> 
                                    
                                    <dd class="user-comment-self-input"> 
                                        <div class="input-block"> 
                                             <input placeholder="回复楼主" class="J_commentAnswerInput" type="text" name="replay"> 
                                             <span class="hf"> 
                                                <a href="javascript:void(0);" title="1"class="huifu btn  answer-btn J_commentAnswerBtn"  >回复
                                                </a>
                                                
                                            </span>
                                            <input name="pid" type="hidden" value="<?php echo ($dis["id"]); ?>">
                                        </div> 
                                    </dd>  
                                    <dd class="user-comment-answer"> 
                                        <img class="f-image" src="/CuteMi/Public/home/images/logo.png" alt=""> <p>小哥没上班，小妹上班了怎么破？要不，凑活凑活？感谢您对小米的支持。
                                        <span class="official-name">官方回复</span> <a href="javascript:void(0);" class="J_csLike " data-commentid="133135206"> <i class="iconfont"></i>赞客服&nbsp;  <span class="amount"> 6</span>  
                                    </a></p> 
                                    </dd> 
                                    <?php if(is_array($dis["hhf"])): foreach($dis["hhf"] as $key=>$hfff): ?><dd class="xx user-comment-answer"> 
                                        <img class="f-image" src="/CuteMi/Public/home/images/jtiJ3KoJ4xJUh7.jpg" alt=""> <p><?php echo ($hfff["rep"]); ?>-<span class="answer-user-name">买后评论</span> </p> 
                                    </dd><?php endforeach; endif; ?> 
                               </dl> 
                           </li><?php endforeach; endif; ?> 


<!----------------------------------添加回复信息实现无刷新回复-------------------->  

                <script>
                    $(function(){
                             
                             $('.hf').bind('click',function(){
                                // alert('aaa');
                                var uid="<?php echo ($uid); ?>";
                                var pid=$(this).next().val();
                                console.log(pid);

                                var replay=$(this).prev().val();
                    $.get("/CuteMi/index.php/Home/goodsdetail/insert",{uid:uid,pid:pid,replay:replay},function(data){
                     if(data){
                        
                              location.reload();
                    }
                
                             });

                         })
                    });

                </script>  
                        
                    </ul>
                    </div>
                    <div class="span6 goods-detail-comment-timeline">
                        <h3 class="comment-name">最新评价</h3>
                        <ul class="comment-timeline-list" id="J_timelineComment">  <li class="purple timelineunit J_commentContent" data-id="133302009"> <h4 class="line-time">4小时前</h4> <p class="line-content"> <a href="http://order.mi.com/comment/commentDetail/comment_id/133302009" target="_blank"> 非常实惠的电池，持久性未知。 </a> </p>  <div class="line-foot"> <div class="line-left">来自于 886686307</div> <div class="line-right J_hasHelp " data-commentid="133302009"> <i class="iconfont"></i>有帮助&nbsp;&nbsp;<span class="amount">0</span> </div> </div> <div class="line-dot item-rainbow-3"></div> </li>  <li class="purple timelineunit J_commentContent" data-id="133292503"> <h4 class="line-time">4小时前</h4> <p class="line-content"> <a href="http://order.mi.com/comment/commentDetail/comment_id/133292503" target="_blank"> 以前彩虹远在天边，却是在手上紧握着，很美，轻松带回家！ </a> </p>  <div class="line-foot"> <div class="line-left">来自于 淘冰</div> <div class="line-right J_hasHelp " data-commentid="133292503"> <i class="iconfont"></i>有帮助&nbsp;&nbsp;<span class="amount">0</span> </div> </div> <div class="line-dot item-rainbow-1"></div> </li>  <li class="purple timelineunit J_commentContent" data-id="133292960"> <h4 class="line-time">4小时前</h4> <p class="line-content"> <a href="http://order.mi.com/comment/commentDetail/comment_id/133292960" target="_blank"> 还没开始用，用过再来评论 </a> </p>  <div class="line-foot"> <div class="line-left">来自于 依然舍不得1</div> <div class="line-right J_hasHelp " data-commentid="133292960"> <i class="iconfont"></i>有帮助&nbsp;&nbsp;<span class="amount">0</span> </div> </div> <div class="line-dot item-rainbow-2"></div> </li>  <li class="purple timelineunit J_commentContent" data-id="133297048"> <h4 class="line-time">4小时前</h4> <p class="line-content"> <a href="http://order.mi.com/comment/commentDetail/comment_id/133297048" target="_blank"> 真的真的真的真的真的漂亮！ </a> </p>  <div class="line-foot"> <div class="line-left">来自于 96040012</div> <div class="line-right J_hasHelp " data-commentid="133297048"> <i class="iconfont"></i>有帮助&nbsp;&nbsp;<span class="amount">0</span> </div> </div> <div class="line-dot item-rainbow-4"></div> </li>  <li class="purple timelineunit J_commentContent" data-id="133297150"> <h4 class="line-time">4小时前</h4> <p class="line-content"> <a href="http://order.mi.com/comment/commentDetail/comment_id/133297150" target="_blank"> 很漂亮，还有个盒子。。。 </a> </p>  <div class="line-foot"> <div class="line-left">来自于 yongjun20030717</div> <div class="line-right J_hasHelp " data-commentid="133297150"> <i class="iconfont"></i>有帮助&nbsp;&nbsp;<span class="amount">0</span> </div> </div> <div class="line-dot item-rainbow-6"></div> </li> </ul>
                    </div>
                    <div data-amount="38982" class="span20 goods-detail-comment-more" id="J_loadCommentMore">
                        加载更多 <i class="iconfont"></i>
                    </div>
                    <div class="span20 goods-detail-comment-more hide" id="J_loadMoreHref">
                        <a onclick="_msq.push(['trackEvent', '1863416154b69eba-25bb24aa0831a414', '//item.mi.com/comment/commentList/gid/1154300033/pid/2804', 'pcpid']);" data-stat-id="25bb24aa0831a414" target="_blank" href="http://item.mi.com/comment/commentList/gid/1154300033/pid/2804">查看更多评价</a>
                    </div>
                </div>

            </div>
            
        </div>
        <div class="loader-block">
            <div class="loader"></div>
        </div>
        <div class="goods-detail-null-content" id="J_commentTipInfo">
            <div class="container">
                <h3>暂时还没有评价</h3>
                <p>期待你分享科技带来的乐趣</p>
            </div>
        </div>

    </div>

    <!--评价-->

    <div style="display: block;" class="goods-detail-nav-name-block J_itemBox" id="goodsFaq">
        <div class="container main-block">
            <div class="border-line"></div>
            <h2 class="nav-name">商品提问</h2>
        </div>
    </div>  

    <!--商品提问-->
    <div style="display: block;" class="goods-detail-question-block J_itemBox hasContent" id="goodsFaqContent">
        <div class="container">
            <div class="question-input">
                <input placeholder="输入你的提问" class="input-block J_inputQuestion" data-can-search="true" data-pagesize="6" type="text">
                <div class="btn btn-primary question-btn J_btnQuestion">提问</div>
            </div>
            <div class="question-order J_questionOrderBlock">
                <div class="order-block">
                    <a onclick="_msq.push(['trackEvent', '1863416154b69eba-422e5161e39bf28f', 'javascript:void(0);', 'pcpid']);" data-stat-id="422e5161e39bf28f" href="javascript:void(0);" class="current J_questionHelp" data-pagesize="6">最有帮助</a>
                    <span class="sep">|</span>
                    <a onclick="_msq.push(['trackEvent', '1863416154b69eba-24e1681246710ec7', 'javascript:void(0);', 'pcpid']);" data-stat-id="24e1681246710ec7" href="javascript:void(0);" class="J_questionNew" data-pagesize="6">最新</a>
                </div>
            </div>
            <ul class="question-content" id="J_goodsQuestionBlock">  <li data-id="1254030"> <div class="left-hand float "> <div class="hand-block J_questionLike " data-id="1254030"> <i class="iconfont"></i><br> <span class="hand-number"> 33</span> </div> </div> <div class="mid-detail float "> <h3 class="question-title"><a target="_blank" href="http://item.mi.com/comment/askDetail/gid/1154300033/askid/1254030/pid/2804">怎么不出款可以充电的电池</a></h3> <div class="answer-content figcaption"> <p> 您好，感谢您的建议，这边会酌情考虑的哦，O(∩_∩)O，感谢您对小米的支持。 </p> </div> </div> <div class="right-date float"> <div class="question-title-date">2015年10月29日</div> <div class="answer-content-date">2015年10月30日</div> </div> </li>  <li data-id="1254044"> <div class="left-hand float "> <div class="hand-block J_questionLike " data-id="1254044"> <i class="iconfont"></i><br> <span class="hand-number"> 13</span> </div> </div> <div class="mid-detail float "> <h3 class="question-title"><a target="_blank" href="http://item.mi.com/comment/askDetail/gid/1154300033/askid/1254044/pid/2804">能充电吗？</a></h3> <div class="answer-content figcaption"> <p> 您好，不是充电电池哦，O(∩_∩)O，感谢您对小米的支持。 </p> </div> </div> <div class="right-date float"> <div class="question-title-date">2015年10月29日</div> <div class="answer-content-date">2015年10月30日</div> </div> </li>  <li data-id="1255350"> <div class="left-hand float "> <div class="hand-block J_questionLike " data-id="1255350"> <i class="iconfont"></i><br> <span class="hand-number"> 7</span> </div> </div> <div class="mid-detail float "> <h3 class="question-title"><a target="_blank" href="http://item.mi.com/comment/askDetail/gid/1154300033/askid/1255350/pid/2804">你好，在吗，为什么运费比电池还贵，在什么情况下可以免运费呢</a></h3> <div class="answer-content figcaption"> <p> 您好，官网下单的产品，单笔订单实际支付满150元包邮，订单实际支付金额不足150元，需按照10元/单标准支付邮费，小米电视、净水器、体重秤等产品因商品特殊性不参与满150元包邮活动。如遇活动期，资费标准以活动公告为准哦，感谢您对小米的支持~~~ </p> </div> </div> <div class="right-date float"> <div class="question-title-date">2015年10月29日</div> <div class="answer-content-date">2015年10月30日</div> </div> </li>  <li data-id="1255126"> <div class="left-hand float "> <div class="hand-block J_questionLike " data-id="1255126"> <i class="iconfont"></i><br> <span class="hand-number"> 6</span> </div> </div> <div class="mid-detail float "> <h3 class="question-title"><a target="_blank" href="http://item.mi.com/comment/askDetail/gid/1154300033/askid/1255126/pid/2804">彩虹电池适合体重秤吗</a></h3> <div class="answer-content figcaption"> <p> 您好，可以放在小米体重秤中使用的。感谢您对小米的支持，祝您购物愉快~ </p> </div> </div> <div class="right-date float"> <div class="question-title-date">2015年10月29日</div> <div class="answer-content-date">2015年10月30日</div> </div> </li>  <li data-id="1257031"> <div class="left-hand float "> <div class="hand-block J_questionLike " data-id="1257031"> <i class="iconfont"></i><br> <span class="hand-number"> 4</span> </div> </div> <div class="mid-detail float "> <h3 class="question-title"><a target="_blank" href="http://item.mi.com/comment/askDetail/gid/1154300033/askid/1257031/pid/2804">电池容量大约多少毫安？</a></h3> <div class="answer-content figcaption"> <p> 您好，碱性电池没有容量的概念，评价的标准是不同应用场景的使用时间或次数，与具体的应用场合有关。感谢您对小米的支持，祝您购物愉快~ </p> </div> </div> <div class="right-date float"> <div class="question-title-date">2015年10月31日</div> <div class="answer-content-date">2015年11月1日</div> </div> </li>  <li data-id="1255497"> <div class="left-hand float "> <div class="hand-block J_questionLike " data-id="1255497"> <i class="iconfont"></i><br> <span class="hand-number"> 3</span> </div> </div> <div class="mid-detail float "> <h3 class="question-title"><a target="_blank" href="http://item.mi.com/comment/askDetail/gid/1154300033/askid/1255497/pid/2804">什么时候出??没电了需要充吗?持续使用能使用多久??</a></h3> <div class="answer-content figcaption"> <p> 您好，目前这款电池在官网是可以随时下单购买的，暂时不支持充电使用，具体使用时间根据您的使用环境决定，感谢您对小米的支持。 </p> </div> </div> <div class="right-date float"> <div class="question-title-date">2015年10月30日</div> <div class="answer-content-date">2015年10月30日</div> </div> </li> </ul>
            <div class="question-null-content J_nullInfo">抱歉，没有找到答案，您可以点击“提问”提交此条提问给已经购买者、小米官方客服和产品经理，我们会及时回复。</div>
            <div class="loader-block">
                <div class="loader"></div>
            </div>
            <div class="goods-detail-null-content" id="J_questionTipInfo">
                <div class="container">
                    <h3>暂时还没有提问</h3>
                    <p>对商品还不太了解，问问看吧</p>
                </div>
            </div>    
            <div class="more-question">
                <a onclick="_msq.push(['trackEvent', '1863416154b69eba-dca0673d9e7bddfb', '//item.mi.com/comment/asklist/gid/1154300033/pid/2804', 'pcpid']);" data-stat-id="dca0673d9e7bddfb" href="http://item.mi.com/comment/asklist/gid/1154300033/pid/2804" target="_blank">查看全部 <span id="J_goodsQuestionAmount">123</span> 条已回答的问题 &gt;</a>
            </div>
        </div>
    </div>
    <!--商品提问-->


    <div style="display: none;" class="goods-detail-nav-name-block " id="goodsService">
        <div class="container main-block">
            <div class="border-line"></div>
            <h2 class="nav-name">售后服务与退换货流程</h2>
        </div>
    </div>  

    <!--售后服务与退换货流程-->
    <div style="display: none;" class="goods-detail-service-block">
        <div class="container">
            <div class="row">
                <div class="span8 service-day-img">
                 <img src="/CuteMi/Public/home/images/service.jpg" alt="">
                    
                </div>
                <div class="span11 service-detail-block">
                    <div class="service-detail-content" id="J_serviceCon">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--售后服务与退换货流程-->

    
    <div class="container xm-carousel-container" id="J_alsoBuyWrap" style="margin-top:100px;"><h2 class="xm-recommend-title"><span>买过该商品的人还买了</span></h2><div class="xm-recommend"><div style="height: 330px; overflow: hidden;" class="xm-carousel-wrapper"><ul style="width: 2480px; margin-left: 0px; transition: margin-left 0.5s ease 0s;" class="xm-carousel-col-5-list xm-carousel-list clearfix" data-carousel-list="true"> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-彩虹7号电池（10粒装）+stat_单品页底部.买了还买_0_1_11', '//item.mi.com/1155000010.html', 'pcpid']);" data-stat-id="彩虹7号电池（10粒装）+stat_单品页底部.买了还买_0_1_11" data-stat-aid="彩虹7号电池（10粒装）" data-stat-pid="stat_单品页底部.买了还买_0_1_11" href="http://item.mi.com/1155000010.html" data-stat-method="1_11" data-stat-index="0" data-stat-text="彩虹7号电池（10粒装）" target="_blank"> <img src="/CuteMi/Public/home/images/T178EjBjVT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T178EjBjVT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="彩虹7号电池（10粒装）"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-彩虹7号电池（10粒装）+stat_单品页底部.买了还买_0_1_11', '//item.mi.com/1155000010.html', 'pcpid']);" data-stat-id="彩虹7号电池（10粒装）+stat_单品页底部.买了还买_0_1_11" data-stat-aid="彩虹7号电池（10粒装）" data-stat-pid="stat_单品页底部.买了还买_0_1_11" href="http://item.mi.com/1155000010.html" data-stat-method="1_11" data-stat-index="0" data-stat-text="彩虹7号电池（10粒装）" target="_blank"> 彩虹7号电池（10粒装） </a> </dd> <dd class="xm-recommend-price">9.9元</dd> <dd class="xm-recommend-tips"> 1.7万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板+stat_单品页底部.买了还买_1_1_11', '//item.mi.com/1151400001.html', 'pcpid']);" data-stat-id="小米插线板+stat_单品页底部.买了还买_1_1_11" data-stat-aid="小米插线板" data-stat-pid="stat_单品页底部.买了还买_1_1_11" href="http://item.mi.com/1151400001.html" data-stat-method="1_11" data-stat-index="1" data-stat-text="小米插线板" target="_blank"> <img src="/CuteMi/Public/home/images/T1jcEgB4AT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1jcEgB4AT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米插线板"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板+stat_单品页底部.买了还买_1_1_11', '//item.mi.com/1151400001.html', 'pcpid']);" data-stat-id="小米插线板+stat_单品页底部.买了还买_1_1_11" data-stat-aid="小米插线板" data-stat-pid="stat_单品页底部.买了还买_1_1_11" href="http://item.mi.com/1151400001.html" data-stat-method="1_11" data-stat-index="1" data-stat-text="小米插线板" target="_blank"> 小米插线板 </a> </dd> <dd class="xm-recommend-price">49元</dd> <dd class="xm-recommend-tips"> 2万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米随身风扇+stat_单品页底部.买了还买_2_1_11', '//item.mi.com/1152000004.html', 'pcpid']);" data-stat-id="小米随身风扇+stat_单品页底部.买了还买_2_1_11" data-stat-aid="小米随身风扇" data-stat-pid="stat_单品页底部.买了还买_2_1_11" href="http://item.mi.com/1152000004.html" data-stat-method="1_11" data-stat-index="2" data-stat-text="小米随身风扇" target="_blank"> <img src="/CuteMi/Public/home/images/T1C1L_BmhT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1C1L_BmhT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米随身风扇"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米随身风扇+stat_单品页底部.买了还买_2_1_11', '//item.mi.com/1152000004.html', 'pcpid']);" data-stat-id="小米随身风扇+stat_单品页底部.买了还买_2_1_11" data-stat-aid="小米随身风扇" data-stat-pid="stat_单品页底部.买了还买_2_1_11" href="http://item.mi.com/1152000004.html" data-stat-method="1_11" data-stat-index="2" data-stat-text="小米随身风扇" target="_blank"> 小米随身风扇 </a> </dd> <dd class="xm-recommend-price">19.9元</dd> <dd class="xm-recommend-tips"> 6.7万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米体重秤+stat_单品页底部.买了还买_3_1_11', '//item.mi.com/1151100013.html', 'pcpid']);" data-stat-id="小米体重秤+stat_单品页底部.买了还买_3_1_11" data-stat-aid="小米体重秤" data-stat-pid="stat_单品页底部.买了还买_3_1_11" href="http://item.mi.com/1151100013.html" data-stat-method="1_11" data-stat-index="3" data-stat-text="小米体重秤" target="_blank"> <img src="/CuteMi/Public/home/images/T1sWd_B7VT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1sWd_B7VT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米体重秤"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米体重秤+stat_单品页底部.买了还买_3_1_11', '//item.mi.com/1151100013.html', 'pcpid']);" data-stat-id="小米体重秤+stat_单品页底部.买了还买_3_1_11" data-stat-aid="小米体重秤" data-stat-pid="stat_单品页底部.买了还买_3_1_11" href="http://item.mi.com/1151100013.html" data-stat-method="1_11" data-stat-index="3" data-stat-text="小米体重秤" target="_blank"> 小米体重秤 </a> </dd> <dd class="xm-recommend-price">99元</dd> <dd class="xm-recommend-tips"> 6.9万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米自拍杆+stat_单品页底部.买了还买_4_1_11', '//item.mi.com/1151500038.html', 'pcpid']);" data-stat-id="小米自拍杆+stat_单品页底部.买了还买_4_1_11" data-stat-aid="小米自拍杆" data-stat-pid="stat_单品页底部.买了还买_4_1_11" href="http://item.mi.com/1151500038.html" data-stat-method="1_11" data-stat-index="4" data-stat-text="小米自拍杆" target="_blank"> <img src="/CuteMi/Public/home/images/T1DrL_B4CT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1DrL_B4CT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米自拍杆"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米自拍杆+stat_单品页底部.买了还买_4_1_11', '//item.mi.com/1151500038.html', 'pcpid']);" data-stat-id="小米自拍杆+stat_单品页底部.买了还买_4_1_11" data-stat-aid="小米自拍杆" data-stat-pid="stat_单品页底部.买了还买_4_1_11" href="http://item.mi.com/1151500038.html" data-stat-method="1_11" data-stat-index="4" data-stat-text="小米自拍杆" target="_blank"> 小米自拍杆 </a> </dd> <dd class="xm-recommend-price">49元</dd> <dd class="xm-recommend-tips"> 6万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板5孔位+stat_单品页底部.买了还买_5_1_11', '//item.mi.com/1154500022.html', 'pcpid']);" data-stat-id="小米插线板5孔位+stat_单品页底部.买了还买_5_1_11" data-stat-aid="小米插线板5孔位" data-stat-pid="stat_单品页底部.买了还买_5_1_11" href="http://item.mi.com/1154500022.html" data-stat-method="1_11" data-stat-index="5" data-stat-text="小米插线板 5孔位" target="_blank"> <img src="/CuteMi/Public/home/images/T1RlLgBThT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1RlLgBThT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米插线板 5孔位"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板5孔位+stat_单品页底部.买了还买_5_1_11', '//item.mi.com/1154500022.html', 'pcpid']);" data-stat-id="小米插线板5孔位+stat_单品页底部.买了还买_5_1_11" data-stat-aid="小米插线板5孔位" data-stat-pid="stat_单品页底部.买了还买_5_1_11" href="http://item.mi.com/1154500022.html" data-stat-method="1_11" data-stat-index="5" data-stat-text="小米插线板 5孔位" target="_blank"> 小米插线板 5孔位 </a> </dd> <dd class="xm-recommend-price">39元</dd> <dd class="xm-recommend-tips"> 8990人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米水质TDS检测笔+stat_单品页底部.买了还买_6_1_11', '//item.mi.com/1152800035.html', 'pcpid']);" data-stat-id="小米水质TDS检测笔+stat_单品页底部.买了还买_6_1_11" data-stat-aid="小米水质TDS检测笔" data-stat-pid="stat_单品页底部.买了还买_6_1_11" href="http://item.mi.com/1152800035.html" data-stat-method="1_11" data-stat-index="6" data-stat-text="小米水质TDS检测笔" target="_blank"> <img src="/CuteMi/Public/home/images/T19OV_BgKT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T19OV_BgKT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米水质TDS检测笔"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米水质TDS检测笔+stat_单品页底部.买了还买_6_1_11', '//item.mi.com/1152800035.html', 'pcpid']);" data-stat-id="小米水质TDS检测笔+stat_单品页底部.买了还买_6_1_11" data-stat-aid="小米水质TDS检测笔" data-stat-pid="stat_单品页底部.买了还买_6_1_11" href="http://item.mi.com/1152800035.html" data-stat-method="1_11" data-stat-index="6" data-stat-text="小米水质TDS检测笔" target="_blank"> 小米水质TDS检测笔 </a> </dd> <dd class="xm-recommend-price">39元</dd> <dd class="xm-recommend-tips"> 2.3万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米车载充电器+stat_单品页底部.买了还买_7_1_11', '//item.mi.com/1154400043.html', 'pcpid']);" data-stat-id="小米车载充电器+stat_单品页底部.买了还买_7_1_11" data-stat-aid="小米车载充电器" data-stat-pid="stat_单品页底部.买了还买_7_1_11" href="http://item.mi.com/1154400043.html" data-stat-method="1_11" data-stat-index="7" data-stat-text="小米车载充电器" target="_blank"> <img src="/CuteMi/Public/home/images/T142A_BXEv1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T142A_BXEv1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米车载充电器"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米车载充电器+stat_单品页底部.买了还买_7_1_11', '//item.mi.com/1154400043.html', 'pcpid']);" data-stat-id="小米车载充电器+stat_单品页底部.买了还买_7_1_11" data-stat-aid="小米车载充电器" data-stat-pid="stat_单品页底部.买了还买_7_1_11" href="http://item.mi.com/1154400043.html" data-stat-method="1_11" data-stat-index="7" data-stat-text="小米车载充电器" target="_blank"> 小米车载充电器 </a> </dd> <dd class="xm-recommend-price">49元</dd> <dd class="xm-recommend-tips"> 1.1万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米手环炫彩腕带+stat_单品页底部.买了还买_8_1_11', '//item.mi.com/1144600001.html', 'pcpid']);" data-stat-id="小米手环炫彩腕带+stat_单品页底部.买了还买_8_1_11" data-stat-aid="小米手环炫彩腕带" data-stat-pid="stat_单品页底部.买了还买_8_1_11" href="http://item.mi.com/1144600001.html" data-stat-method="1_11" data-stat-index="8" data-stat-text="小米手环炫彩腕带" target="_blank"> <img src="/CuteMi/Public/home/images/T1C1d_B4KT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1C1d_B4KT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米手环炫彩腕带"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米手环炫彩腕带+stat_单品页底部.买了还买_8_1_11', '//item.mi.com/1144600001.html', 'pcpid']);" data-stat-id="小米手环炫彩腕带+stat_单品页底部.买了还买_8_1_11" data-stat-aid="小米手环炫彩腕带" data-stat-pid="stat_单品页底部.买了还买_8_1_11" href="http://item.mi.com/1144600001.html" data-stat-method="1_11" data-stat-index="8" data-stat-text="小米手环炫彩腕带" target="_blank"> 小米手环炫彩腕带 </a> </dd> <dd class="xm-recommend-price">19.9元</dd> <dd class="xm-recommend-tips"> 11.1万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-多彩便携USB线120cm+stat_单品页底部.买了还买_9_1_11', '//item.mi.com/1153000009.html', 'pcpid']);" data-stat-id="多彩便携USB线120cm+stat_单品页底部.买了还买_9_1_11" data-stat-aid="多彩便携USB线120cm" data-stat-pid="stat_单品页底部.买了还买_9_1_11" href="http://item.mi.com/1153000009.html" data-stat-method="1_11" data-stat-index="9" data-stat-text="多彩便携USB线 120cm" target="_blank"> <img src="/CuteMi/Public/home/images/T1b.jpg" srcset="//i1.mifile.cn/a1/T1b.K_Bj_T1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="多彩便携USB线 120cm"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-多彩便携USB线120cm+stat_单品页底部.买了还买_9_1_11', '//item.mi.com/1153000009.html', 'pcpid']);" data-stat-id="多彩便携USB线120cm+stat_单品页底部.买了还买_9_1_11" data-stat-aid="多彩便携USB线120cm" data-stat-pid="stat_单品页底部.买了还买_9_1_11" href="http://item.mi.com/1153000009.html" data-stat-method="1_11" data-stat-index="9" data-stat-text="多彩便携USB线 120cm" target="_blank"> 多彩便携USB线 120cm </a> </dd> <dd class="xm-recommend-price">19元</dd> <dd class="xm-recommend-tips"> 5.1万人好评  </dd> </dl> </li></ul></div><div class="xm-pagers-wrapper"><ul class="xm-pagers"><li class="pager pager-active"><span class="dot">1</span></li><li class="pager"><span class="dot">2</span></li></ul></div></div></div>

    <div class="container xm-carousel-container" id="J_recentGoods" style="margin-top:100px;padding-bottom:130px;"><h2 class="xm-recommend-title"><span>最近浏览的商品和相关推荐</span></h2><div class="xm-recommend"><div style="height: 330px; overflow: hidden;" class="xm-carousel-wrapper"><ul style="width: 2480px; margin-left: 0px; transition: margin-left 0.5s ease 0s;" class="xm-carousel-col-5-list xm-carousel-list clearfix" data-carousel-list="true"> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-彩虹7号电池（10粒装）+stat_单品页底部.看了还看_0_1_12', '//item.mi.com/1155000010.html', 'pcpid']);" data-stat-id="彩虹7号电池（10粒装）+stat_单品页底部.看了还看_0_1_12" data-stat-aid="彩虹7号电池（10粒装）" data-stat-pid="stat_单品页底部.看了还看_0_1_12" href="http://item.mi.com/1155000010.html" data-stat-method="1_12" data-stat-index="0" data-stat-text="彩虹7号电池（10粒装）" target="_blank"> <img src="/CuteMi/Public/home/images/T178EjBjVT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T178EjBjVT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="彩虹7号电池（10粒装）"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-彩虹7号电池（10粒装）+stat_单品页底部.看了还看_0_1_12', '//item.mi.com/1155000010.html', 'pcpid']);" data-stat-id="彩虹7号电池（10粒装）+stat_单品页底部.看了还看_0_1_12" data-stat-aid="彩虹7号电池（10粒装）" data-stat-pid="stat_单品页底部.看了还看_0_1_12" href="http://item.mi.com/1155000010.html" data-stat-method="1_12" data-stat-index="0" data-stat-text="彩虹7号电池（10粒装）" target="_blank"> 彩虹7号电池（10粒装） </a> </dd> <dd class="xm-recommend-price">9.9元</dd> <dd class="xm-recommend-tips"> 1.7万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米随身风扇+stat_单品页底部.看了还看_1_1_12', '//item.mi.com/1152000004.html', 'pcpid']);" data-stat-id="小米随身风扇+stat_单品页底部.看了还看_1_1_12" data-stat-aid="小米随身风扇" data-stat-pid="stat_单品页底部.看了还看_1_1_12" href="http://item.mi.com/1152000004.html" data-stat-method="1_12" data-stat-index="1" data-stat-text="小米随身风扇" target="_blank"> <img src="/CuteMi/Public/home/images/T1C1L_BmhT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1C1L_BmhT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米随身风扇"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米随身风扇+stat_单品页底部.看了还看_1_1_12', '//item.mi.com/1152000004.html', 'pcpid']);" data-stat-id="小米随身风扇+stat_单品页底部.看了还看_1_1_12" data-stat-aid="小米随身风扇" data-stat-pid="stat_单品页底部.看了还看_1_1_12" href="http://item.mi.com/1152000004.html" data-stat-method="1_12" data-stat-index="1" data-stat-text="小米随身风扇" target="_blank"> 小米随身风扇 </a> </dd> <dd class="xm-recommend-price">19.9元</dd> <dd class="xm-recommend-tips"> 6.7万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板5孔位+stat_单品页底部.看了还看_2_1_12', '//item.mi.com/1154500022.html', 'pcpid']);" data-stat-id="小米插线板5孔位+stat_单品页底部.看了还看_2_1_12" data-stat-aid="小米插线板5孔位" data-stat-pid="stat_单品页底部.看了还看_2_1_12" href="http://item.mi.com/1154500022.html" data-stat-method="1_12" data-stat-index="2" data-stat-text="小米插线板 5孔位" target="_blank"> <img src="/CuteMi/Public/home/images/T1RlLgBThT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1RlLgBThT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米插线板 5孔位"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板5孔位+stat_单品页底部.看了还看_2_1_12', '//item.mi.com/1154500022.html', 'pcpid']);" data-stat-id="小米插线板5孔位+stat_单品页底部.看了还看_2_1_12" data-stat-aid="小米插线板5孔位" data-stat-pid="stat_单品页底部.看了还看_2_1_12" href="http://item.mi.com/1154500022.html" data-stat-method="1_12" data-stat-index="2" data-stat-text="小米插线板 5孔位" target="_blank"> 小米插线板 5孔位 </a> </dd> <dd class="xm-recommend-price">39元</dd> <dd class="xm-recommend-tips"> 8990人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板+stat_单品页底部.看了还看_3_1_12', '//item.mi.com/1151400001.html', 'pcpid']);" data-stat-id="小米插线板+stat_单品页底部.看了还看_3_1_12" data-stat-aid="小米插线板" data-stat-pid="stat_单品页底部.看了还看_3_1_12" href="http://item.mi.com/1151400001.html" data-stat-method="1_12" data-stat-index="3" data-stat-text="小米插线板" target="_blank"> <img src="/CuteMi/Public/home/images/T1jcEgB4AT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1jcEgB4AT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米插线板"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米插线板+stat_单品页底部.看了还看_3_1_12', '//item.mi.com/1151400001.html', 'pcpid']);" data-stat-id="小米插线板+stat_单品页底部.看了还看_3_1_12" data-stat-aid="小米插线板" data-stat-pid="stat_单品页底部.看了还看_3_1_12" href="http://item.mi.com/1151400001.html" data-stat-method="1_12" data-stat-index="3" data-stat-text="小米插线板" target="_blank"> 小米插线板 </a> </dd> <dd class="xm-recommend-price">49元</dd> <dd class="xm-recommend-tips"> 2万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-指环式防滑手机支架+stat_单品页底部.看了还看_4_1_12', '//item.mi.com/1153300034.html', 'pcpid']);" data-stat-id="指环式防滑手机支架+stat_单品页底部.看了还看_4_1_12" data-stat-aid="指环式防滑手机支架" data-stat-pid="stat_单品页底部.看了还看_4_1_12" href="http://item.mi.com/1153300034.html" data-stat-method="1_12" data-stat-index="4" data-stat-text="指环式防滑手机支架" target="_blank"> <img src="/CuteMi/Public/home/images/T1COAjB7WT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1COAjB7WT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="指环式防滑手机支架"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-指环式防滑手机支架+stat_单品页底部.看了还看_4_1_12', '//item.mi.com/1153300034.html', 'pcpid']);" data-stat-id="指环式防滑手机支架+stat_单品页底部.看了还看_4_1_12" data-stat-aid="指环式防滑手机支架" data-stat-pid="stat_单品页底部.看了还看_4_1_12" href="http://item.mi.com/1153300034.html" data-stat-method="1_12" data-stat-index="4" data-stat-text="指环式防滑手机支架" target="_blank"> 指环式防滑手机支架 </a> </dd> <dd class="xm-recommend-price">12.5元</dd> <dd class="xm-recommend-tips"> 3018人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-多彩便携USB线120cm+stat_单品页底部.看了还看_5_1_12', '//item.mi.com/1153000009.html', 'pcpid']);" data-stat-id="多彩便携USB线120cm+stat_单品页底部.看了还看_5_1_12" data-stat-aid="多彩便携USB线120cm" data-stat-pid="stat_单品页底部.看了还看_5_1_12" href="http://item.mi.com/1153000009.html" data-stat-method="1_12" data-stat-index="5" data-stat-text="多彩便携USB线 120cm" target="_blank"> <img src="/CuteMi/Public/home/images/T1b.jpg" srcset="//i1.mifile.cn/a1/T1b.K_Bj_T1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="多彩便携USB线 120cm"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-多彩便携USB线120cm+stat_单品页底部.看了还看_5_1_12', '//item.mi.com/1153000009.html', 'pcpid']);" data-stat-id="多彩便携USB线120cm+stat_单品页底部.看了还看_5_1_12" data-stat-aid="多彩便携USB线120cm" data-stat-pid="stat_单品页底部.看了还看_5_1_12" href="http://item.mi.com/1153000009.html" data-stat-method="1_12" data-stat-index="5" data-stat-text="多彩便携USB线 120cm" target="_blank"> 多彩便携USB线 120cm </a> </dd> <dd class="xm-recommend-price">19元</dd> <dd class="xm-recommend-tips"> 5.1万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米自拍杆+stat_单品页底部.看了还看_6_1_12', '//item.mi.com/1151500038.html', 'pcpid']);" data-stat-id="小米自拍杆+stat_单品页底部.看了还看_6_1_12" data-stat-aid="小米自拍杆" data-stat-pid="stat_单品页底部.看了还看_6_1_12" href="http://item.mi.com/1151500038.html" data-stat-method="1_12" data-stat-index="6" data-stat-text="小米自拍杆" target="_blank"> <img src="/CuteMi/Public/home/images/T1DrL_B4CT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1DrL_B4CT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米自拍杆"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米自拍杆+stat_单品页底部.看了还看_6_1_12', '//item.mi.com/1151500038.html', 'pcpid']);" data-stat-id="小米自拍杆+stat_单品页底部.看了还看_6_1_12" data-stat-aid="小米自拍杆" data-stat-pid="stat_单品页底部.看了还看_6_1_12" href="http://item.mi.com/1151500038.html" data-stat-method="1_12" data-stat-index="6" data-stat-text="小米自拍杆" target="_blank"> 小米自拍杆 </a> </dd> <dd class="xm-recommend-price">49元</dd> <dd class="xm-recommend-tips"> 6万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米车载充电器+stat_单品页底部.看了还看_7_1_12', '//item.mi.com/1154400043.html', 'pcpid']);" data-stat-id="小米车载充电器+stat_单品页底部.看了还看_7_1_12" data-stat-aid="小米车载充电器" data-stat-pid="stat_单品页底部.看了还看_7_1_12" href="http://item.mi.com/1154400043.html" data-stat-method="1_12" data-stat-index="7" data-stat-text="小米车载充电器" target="_blank"> <img src="/CuteMi/Public/home/images/T142A_BXEv1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T142A_BXEv1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米车载充电器"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米车载充电器+stat_单品页底部.看了还看_7_1_12', '//item.mi.com/1154400043.html', 'pcpid']);" data-stat-id="小米车载充电器+stat_单品页底部.看了还看_7_1_12" data-stat-aid="小米车载充电器" data-stat-pid="stat_单品页底部.看了还看_7_1_12" href="http://item.mi.com/1154400043.html" data-stat-method="1_12" data-stat-index="7" data-stat-text="小米车载充电器" target="_blank"> 小米车载充电器 </a> </dd> <dd class="xm-recommend-price">49元</dd> <dd class="xm-recommend-tips"> 1.1万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米百变随身杯+stat_单品页底部.看了还看_8_1_12', '//item.mi.com/1134900287.html', 'pcpid']);" data-stat-id="小米百变随身杯+stat_单品页底部.看了还看_8_1_12" data-stat-aid="小米百变随身杯" data-stat-pid="stat_单品页底部.看了还看_8_1_12" href="http://item.mi.com/1134900287.html" data-stat-method="1_12" data-stat-index="8" data-stat-text="小米百变随身杯" target="_blank"> <img src="/CuteMi/Public/home/images/T1izKTBvdv1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T1izKTBvdv1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="小米百变随身杯"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-小米百变随身杯+stat_单品页底部.看了还看_8_1_12', '//item.mi.com/1134900287.html', 'pcpid']);" data-stat-id="小米百变随身杯+stat_单品页底部.看了还看_8_1_12" data-stat-aid="小米百变随身杯" data-stat-pid="stat_单品页底部.看了还看_8_1_12" href="http://item.mi.com/1134900287.html" data-stat-method="1_12" data-stat-index="8" data-stat-text="小米百变随身杯" target="_blank"> 小米百变随身杯 </a> </dd> <dd class="xm-recommend-price">39元</dd> <dd class="xm-recommend-tips"> 1.2万人好评  </dd> </dl> </li> <li class="J_xm-recommend-list"> <dl> <dt> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-YeelightLED智能灯泡+stat_单品页底部.看了还看_9_1_12', '//item.mi.com/1154300013.html', 'pcpid']);" data-stat-id="YeelightLED智能灯泡+stat_单品页底部.看了还看_9_1_12" data-stat-aid="YeelightLED智能灯泡" data-stat-pid="stat_单品页底部.看了还看_9_1_12" href="http://item.mi.com/1154300013.html" data-stat-method="1_12" data-stat-index="9" data-stat-text="Yeelight LED智能灯泡" target="_blank"> <img src="/CuteMi/Public/home/images/T159dgBjDT1RXrhCrK.jpg" srcset="//i1.mifile.cn/a1/T159dgBjDT1RXrhCrK.jpg?width=280&amp;height=280 2x" alt="Yeelight LED智能灯泡"> </a> </dt> <dd class="xm-recommend-name"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-YeelightLED智能灯泡+stat_单品页底部.看了还看_9_1_12', '//item.mi.com/1154300013.html', 'pcpid']);" data-stat-id="YeelightLED智能灯泡+stat_单品页底部.看了还看_9_1_12" data-stat-aid="YeelightLED智能灯泡" data-stat-pid="stat_单品页底部.看了还看_9_1_12" href="http://item.mi.com/1154300013.html" data-stat-method="1_12" data-stat-index="9" data-stat-text="Yeelight LED智能灯泡" target="_blank"> Yeelight LED智能灯泡 </a> </dd> <dd class="xm-recommend-price">59元</dd> <dd class="xm-recommend-tips"> 5554人好评  </dd> </dl> </li></ul></div><div class="xm-pagers-wrapper"><ul class="xm-pagers"><li class="pager pager-active"><span class="dot">1</span></li><li class="pager"><span class="dot">2</span></li></ul></div></div></div>
</div>
<!-- 跟随 导航 -->
<div style="top: 821px;" class="goods-sub-bar" id="goodsSubBar">
     
 <div class="container"> <div class="row"> <div class="span4"> <dl class="goods-sub-bar-info clearfix"> <dt> <img src="/CuteMi/Public/home/images/T1xxVTBghv1RXrhCrK68x68.jpg"> </dt> <dd> <strong>彩虹5号电池（10粒装） 标准装</strong> <p> <em><span class="J_mi_goodsPrice">9.9</span>元</em> <del><span class="J_mi_marketPrice"></span></del> </p> </dd> </dl> </div> <div class="span12"> <div class="goods-desc-menu" id="goodsSubMenu"> <ul class="detail-list J_pro_related_btns  J_detailNav"> <li class=""> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-3685f39a5a525288', '', 'pcpid']);" data-stat-id="3685f39a5a525288" data-href="#goodsDesc" data-index="0" class="J_scrollHref">详情描述</a> </li> <li class="current"> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-184521cfe28ee951', '', 'pcpid']);" data-stat-id="184521cfe28ee951" data-href="#goodsParam" data-index="1" class="J_scrollHref">规格参数</a> </li> <li class=""> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-cce54c9e36691990', '', 'pcpid']);" data-stat-id="cce54c9e36691990" data-href="#goodsComment" data-index="2" class="J_scrollHref">评价晒单 <i>(3.8万)</i></a> </li> <li> <a onclick="_msq.push(['trackEvent', '1863416154b69eba-b441fadfed99b457', '', 'pcpid']);" data-stat-id="b441fadfed99b457" data-href="#goodsFaq" data-index="3" class="J_scrollHref">商品提问 <i>(123)</i></a> </li> </ul> </div> </div> <div class="span4"> <div class="fr" id="goodsSubBarBtnBox">  <a  href="http://cart.mi.com/cart/add/2154300020" class="btn btn-primary goods-add-cart-btn" id="goodsSubBarAddCartBtn" > <i class="iconfont"></i>加入购物车</a>  </div> </div> </div> </div></div>
<div id="J_modalVideo" class="modal modal-video fade modal-hide">
    <div class="modal-hd">
        <h3 class="title">视频播放</h3>
        <a onclick="_msq.push(['trackEvent', '1863416154b69eba-3a64db2379771210', 'javascript:void(0);', 'pcpid']);" data-stat-id="3a64db2379771210" class="close" data-dismiss="modal" href="javascript:%20void(0);"><i class="iconfont"></i></a>
    </div>
    <div class="modal-bd">
        <div class="loading"><div class="loader"></div></div>
    </div>
</div>
<!--单品图片，放大的浮层-->
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
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-09-18 18:25:32 HTTP/1.0 GET : /CuteMi/index.php/home/product/footer.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.0980s ( Load:0.0089s Init:0.0031s Exec:0.0726s Template:0.0134s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 10.20req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,576.89 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 4 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 33</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 124</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=3vd1dbgubfm4ss2m3oop2r1cj3</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\index.php ( 0.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\ThinkPHP.php ( 4.63 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Think.class.php ( 12.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage.class.php ( 1.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.54 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Mode\common.php ( 2.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Common\functions.php ( 47.80 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Hook.class.php ( 4.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\App.class.php ( 13.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Route.class.php ( 13.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Controller.class.php ( 10.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\View.class.php ( 7.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\BuildLiteBehavior.class.php ( 3.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\convention.php ( 11.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Common\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Lang\zh-cn.php ( 2.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\debug.php ( 1.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php ( 4.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\CommonController.class.php ( 1.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Model.class.php ( 59.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db.class.php ( 32.66 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db\Driver\Mysql.class.php ( 10.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template.class.php ( 28.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.49 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Runtime\Cache\Home\876f3e97bd3c8e2f432bf41e4f9dee90.php ( 16.75 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 0.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.25 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\BuildLiteBehavior [ RunTime:0.000020s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.000101s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCacheBehavior [ RunTime:0.000589s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.000645s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplaceBehavior [ RunTime:0.000188s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000267s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplateBehavior [ RunTime:0.012097s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.012156s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCacheBehavior [ RunTime:0.000191s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.000218s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_close` [ RunTime:0.004903s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_close` WHERE ( close_id = '1' ) LIMIT 1   [ RunTime:0.000525s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_flink` [ RunTime:0.005843s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_flink` WHERE ( status=1 )  [ RunTime:0.000384s ]</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw==" /></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.0980s </div><img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/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"></div>
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

    
<!-- .modal-globalSites END -->
<script type="text/JavaScript">
      $(function(){

         //点击版本,颜色时触发的事件
           $(".color").click(function(){
              $(this).css({background:"orange"}).siblings().css({background:"white"});  
               orange= $(this).attr("alt");
              $('.co').html(orange);          
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



           // 点击加入购物车触发事件
        $(".btn").click(function(){
            $.ajax({
                type:"get",
                data:"gid=<?php echo ($goods["gid"]); ?>&color="+orange,
                url:"/CuteMi/index.php/Home/BeforeCart/doattindex",
                dataType:"text",
                success:function(data){
                     //console.log(data);
                },
                async:false,
             });
        });



      });
</script>
   
	    <div class="modal fade zoom-modal modal-hide canRotate cantrans" id="JimageModal">
	    </div></body></html>