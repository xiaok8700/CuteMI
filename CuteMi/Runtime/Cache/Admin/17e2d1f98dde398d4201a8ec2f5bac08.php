<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>管理页面</title>

<script src="/CuteMi/Public/admin/js/prototype.lite.js" type="text/javascript"></script>
<script src="/CuteMi/Public/admin/js/moo.fx.js" type="text/javascript"></script>
<script src="/CuteMi/Public/admin/js/moo.fx.pack.js" type="text/javascript"></script>
<style>
body {
	font:12px Arial, Helvetica, sans-serif;
	color: #000;
	background-color: #EEF2FB;
	margin: 0px;
}
#container {
	width: 182px;
}
H1 {
	font-size: 12px;
	margin: 0px;
	width: 182px;
	cursor: pointer;
	height: 30px;
	line-height: 20px;	
}
H1 a {
	display: block;
	width: 182px;
	color: #000;
	height: 30px;
	text-decoration: none;
	moz-outline-style: none;
	background-image: url(/cuteMi/public/admin/images/menu_bgS.gif);
	background-repeat: no-repeat;
	line-height: 30px;
	text-align: center;
	margin: 0px;
	padding: 0px;
}
.content{
	width: 182px;
	height: 26px;
	
}
.MM ul {
	list-style-type: none;
	margin: 0px;
	padding: 0px;
	display: block;
}
.MM li {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	list-style-type: none;
	display: block;
	text-decoration: none;
	height: 26px;
	width: 182px;
	padding-left: 0px;
}
.MM {
	width: 182px;
	margin: 0px;
	padding: 0px;
	left: 0px;
	top: 0px;
	right: 0px;
	bottom: 0px;
	clip: rect(0px,0px,0px,0px);
}
.MM a:link {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(/cuteMi/public/admin/images/menu_bg1.gif);
	background-repeat: no-repeat;
	height: 26px;
	width: 182px;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	text-decoration: none;
}
.MM a:visited {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(/cuteMi/public/admin/images/menu_bg1.gif);
	background-repeat: no-repeat;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	height: 26px;
	width: 182px;
	text-decoration: none;
}
.MM a:active {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	color: #333333;
	background-image: url(/cuteMi/public/admin/images/menu_bg1.gif);
	background-repeat: no-repeat;
	height: 26px;
	width: 182px;
	display: block;
	text-align: center;
	margin: 0px;
	padding: 0px;
	overflow: hidden;
	text-decoration: none;
}
.MM a:hover {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	line-height: 26px;
	font-weight: bold;
	color: #006600;
	background-image: url(/cuteMi/public/admin/images/menu_bg2.gif);
	background-repeat: no-repeat;
	text-align: center;
	display: block;
	margin: 0px;
	padding: 0px;
	height: 26px;
	width: 182px;
	text-decoration: none;
}
</style>
</head>

<body>
<table width="100%" height="280" border="0" cellpadding="0" cellspacing="0" bgcolor="#EEF2FB">
  <tr>
    <td width="182" valign="top"><div id="container">
      <h1 class="type"><a href="javascript:void(0)">商城用户管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/User/index" target="main">用户列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/User/add" target="main">用户添加</a></li> 
        </ul>
      </div>
       <h1 class="type"><a href="javascript:void(0)">管理员</a></h1>
       <div class="content">      	
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Admin/index" target="main">管理员列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/Admin/add" target="main">添加管理员</a></li>        
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">商品分类</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/type/index" target="main">分类管理</a></li>
          <li><a href="/CuteMi/index.php/Admin/type/add" target="main">添加分类</a></li>
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">商品管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
		  <li><a href="/CuteMi/index.php/Admin/goods/index" target="main">商品列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/goods/add" target="main">添加商品</a></li>
          <li><a href="/CuteMi/index.php/Admin/goods/detail" target="main">商品详情</a></li>
         
        </ul>
      </div>
      <h1 class="type"><a href="javascript:void(0)">附件分类</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Attachtype/index" target="main">分类列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/Attachtype/add" target="main">添加分类</a></li>
          
        </ul>
      </div>
    </div>
        <h1 class="type"><a href="javascript:void(0)">附件管理</a></h1>
      <div class="content">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
            </tr>
          </table>
        <ul class="MM">
            <li><a href="/CuteMi/index.php/Admin/Attach/index" target="main">附件列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/Attach/add" target="main">添加附件</a></li>
         
        </ul>
      </div>
      
      <h1 class="type"><a href="javascript:void(0)">订单管理</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Order/index" target="main">订单列表</a></li>
        </ul>
      </div>

      <h1 class="type"><a href="javascript:void(0)">商品评价</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Discuss/index" target="main">评论列表</a></li>
        </ul>
      </div>

      <h1 class="type"><a href="javascript:void(0)">轮播图</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Event/index" target="main">轮播图列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/Event/add" target="main">添加轮播图</a></li> 
        </ul>
      </div>


      <h1 class="type"><a href="javascript:void(0)">优惠券</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Coupun/index" target="main">优惠券管理</a></li>
          <li><a href="/CuteMi/index.php/Admin/Coupun/add" target="main">添加优惠券</a></li> 
        </ul>
      </div>

     <!--  <h1 class="type"><a href="javascript:void(0)">商品收藏</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Collect/index" target="main">收藏列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/Collect/add" target="main">添加收藏</a></li> 
        </ul>
      </div> -->

      <h1 class="type"><a href="javascript:void(0)">用户积分</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Integral/detail" target="main">积分规则</a></li>
          <li><a href="/CuteMi/index.php/Admin/Integral/index" target="main">积分列表</a></li>
           
        </ul>
      </div>

      <h1 class="type"><a href="javascript:void(0)">友情链接</a></h1>
      <div class="content">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><img src="/CuteMi/Public/admin/images/menu_topline.gif" width="182" height="5" /></td>
          </tr>
        </table>
        <ul class="MM">
          <li><a href="/CuteMi/index.php/Admin/Flink/index" target="main">友链列表</a></li>
          <li><a href="/CuteMi/index.php/Admin/Flink/add" target="main">友链添加</a></li> 
        </ul>
      </div>

      </div>
        <script type="text/javascript">
		var contents = document.getElementsByClassName('content');
		var toggles = document.getElementsByClassName('type');
	
		var myAccordion = new fx.Accordion(
			toggles, contents, {opacity: true, duration: 400}
		);
		myAccordion.showThisHideOpen(contents[0]);
	</script>
        </td>
  </tr>
</table>
</body>
</html>