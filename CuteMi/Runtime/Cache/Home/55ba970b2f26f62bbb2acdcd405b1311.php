<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN" xml:lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta charset="UTF-8">
        <title>填写订单信息</title>
        <!-- <link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon"> -->
        <link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/base.min.css">
        <script src="/CuteMi/Public/home/js/jquery-1.7.2.js"></script>
         
        <link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/checkout.min.css">
        <script src='/CuteMi/Public/home/js/jquery-1.7.2.js'></script>

        <style>
            #lean_overlay {
                position: fixed;
                z-index:100;
                top: 0px;
                left: 0px;
                height:100%;
                width:100%;
                background: #000;
                display: none;
            }
        </style>
    </head>
    <body>
        <div class="site-header site-mini-header">
            <div class="container">
                <div class="header-logo">
                    <a class="logo " href="/CuteMi/index.php/Home/index/index" >
                        <img src="/CuteMi/Public/home/images/logo.png">
                    </a>
                </div>
          
                <div class="topbar-info" id="J_userInfo">   <span>欢迎您：<?php echo ($_SESSION['username']['uname']); ?></span>  <span class="user"><a class="user-name" href="/CuteMi/index.php/Home/space/index">个人中心</a></span></div>
            </div>
        </div>
        
        <div class="page-main">
            <div class="container">
                <div class="checkout-box">
                    <div class="section section-address">
                        <div class="section-header clearfix">
                            <h3 class="title">收货地址</h3>
                            <div class="more">
                            </div>
                        </div>
                        <div class="section-body clearfix" id="J_addressList">
 <!-----------------------------遍历已有地址开始------------------------------------>                           
                            <?php if(is_array($add)): foreach($add as $key=>$address): ?><div class="checked address-item J_addressItem ">
                                    <!--遍历地址信息-->
                                    <div class="delete" style='width=10px;height=10px;position:absolute;top:5;right:0;background:gray;font-size:20px'>X
                                    </div>
                                    <dl>
                                        <dt>
                                        <span class="tag"><?php echo ($address["address"]); ?></span><br>
                                        <em class="uname"><?php echo ($address["name"]); ?></em>
                                        </dt>
                                        <dd class="utel">
                                                        <?php echo ($address["mob_phone"]); ?> 
                                        </dd>
                                        <dd class="uaddress">
                                            <?php echo ($address["is_district"]); ?>

                                        </dd>
                                    </dl>

                              <!--   <div class="actions">
                                    <input type="radio" name="id" class="xiaomi" value="<?php echo ($address["id"]); ?>" onclick="update(<?php echo ($address["id"]); ?>)"> 
                                </div> -->
                                 <div class="actions">
                                    <input type="radio" name="id" class="adresscheck xiaomi" value="<?php echo ($address["id"]); ?>" data = "<?php echo ($address["id"]); ?>"> 
                                </div>
                            </div><?php endforeach; endif; ?> 
                       
                           
 <!-----------------------------遍历已有地址结束------------------------------------>                           
                                
 <!-----------------------------跳转添加新地址页面------------------------------------>                           
                                   
                            <div class="address-item J_addressItem ">
                                <!--遍历地址信息-->
                                <dl>

                                    <dd>
                                        <a href="/CuteMi/index.php/Home/Order/address">添加新地址</a>           
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    <div class="section section-goods">
                        <div class="section-header clearfix">
                            <h3 class="title">商品及优惠券</h3>
                            <div class="more">
                                <a href="/CuteMi/index.php/Home/cart/index">返回购物车<i class="iconfont"></i></a>
                            </div>
                        </div>

                        <div class="section-body">
 <!-----------------------------商品具体参数------------------------------------>                           

                            <?php if(is_array($shop)): foreach($shop as $key=>$car): ?><ul class="goods-list" id="J_goodsList">
                                    <li class="clearfix">
                                        <div class="col col-img">
                                            <img src="/CuteMi/Public/Uploads/<?php echo ($car["pic"]); ?>" width="30" height="30">
                                        </div>
                                        <div class="col col-name">
                                            <a href="http://item.mi.com/1151100011.html" target="_blank" data-stat-id="35c1cafdce82fa11" onclick="_msq.push([ &amp; #39; trackEvent &amp; #39; , &amp; #39; 50d1f382fadafb8b - 35c1cafdce82fa11 &amp; #39; , &amp; #39; http://item.mi.com/1151100011.html&#39;, &#39;pcpid&#39;]);">
                                                <?php echo ($car["gname"]); ?> <?php echo ($car["verson"]); ?>    <?php echo ($car["storage"]); ?>  
                                            </a>
                                        </div>
                                        <div class="col col-price">
                                            <?php echo ($car["price"]); ?>            
                                        </div>
                                        <div class="col col-status">

                                            <?php echo ($car["color"]); ?> 
                                        </div>
                                        <div class="col col-total">

                                            <?php echo ($car["buynum"]); ?>件

                                        </div>
                                    </li>
                                </ul><?php endforeach; endif; ?>
                              
                        </div>
                    </div>
                    <form action="/CuteMi/index.php/Home/Order/addorder" method="post">
                        <div class="section section-count clearfix">
                            <div class="count-actions">
                                <div class="coupon-trigger" id="J_useCoupon"><i class="iconfont icon-plus"></i>使用优惠券
                                    <select  id="discount">
                                        <option value="">——请使用优惠卷——</option>
                                        <?php if(is_array($coupun)): foreach($coupun as $key=>$coupun): ?><option value="<?php echo ($coupun["id"]); ?>"><?php echo ($coupun["title"]); ?></option><?php endforeach; endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="money-box" id="J_moneyBox">
                                <ul>
                                    <li class="clearfix">
                                        <label>商品件数：</label>
                                        <span class="val"><?php echo ($count); ?>种商品</span>
                                    </li>
                                    
                                    <li class="clearfix">
                                        <label>运费：</label>
                                        <span class="val"><i id="J_postageVal">0</i>元</span>
                                    </li>

                                    <li class="clearfix total-price">
                                        <label>应付总额：</label>
                                        <span class="val"><em id="J_totalPrice"><?php echo ($total); ?></em>元</span>
                                    </li>

                                    <li class="clearfix total-price">
                                        <label>实付总额：</label>
                                        <span class="val"><em id="actualpay"><?php echo ($total); ?></em>元</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                      

                        <div class="section-bar clearfix">
                            <div class="fl">
                                <div class="seleced-address hide" id="J_confirmAddress">
                                </div>
                                <div class="big-pro-tip hide J_confirmBigProTip"></div>
                            </div>
                            <div class="fr">
                                <input type="hidden" id = "oid" name="oid" value="">
                                
                                <button class="btn btn-primary" id="J_checkoutToPay">去结算</button>
                            </div>
                        </div>
                </form>
            </div>
            </div>
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
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">请求信息 : 2016-09-18 18:26:59 HTTP/1.0 GET : /CuteMi/index.php/home/product/footer.html</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">运行时间 : 0.0448s ( Load:0.0105s Init:0.0026s Exec:0.0182s Template:0.0135s )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">吞吐率 : 22.32req/s</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">内存开销 : 1,576.89 kb</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">查询信息 : 4 queries 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">文件加载 : 33</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">缓存信息 : 0 gets 0 writes </li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">配置加载 : 124</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">会话信息 : SESSION_ID=1nfe30al9ofk1p21svm6lujuc0</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\index.php ( 0.10 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\ThinkPHP.php ( 4.63 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Think.class.php ( 12.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage.class.php ( 1.38 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Storage\Driver\File.class.php ( 3.54 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Mode\common.php ( 2.82 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Common\functions.php ( 47.80 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Hook.class.php ( 4.02 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\App.class.php ( 13.21 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Dispatcher.class.php ( 14.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Route.class.php ( 13.37 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Controller.class.php ( 10.84 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\View.class.php ( 7.31 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\BuildLiteBehavior.class.php ( 3.69 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ParseTemplateBehavior.class.php ( 3.89 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ContentReplaceBehavior.class.php ( 1.91 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\convention.php ( 11.28 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Common\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Lang\zh-cn.php ( 2.56 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Conf\debug.php ( 1.50 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Conf\config.php ( 0.44 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ReadHtmlCacheBehavior.class.php ( 5.60 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\ProductController.class.php ( 4.30 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Home\Controller\CommonController.class.php ( 1.79 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Model.class.php ( 59.43 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db.class.php ( 32.66 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Db\Driver\Mysql.class.php ( 10.78 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template.class.php ( 28.41 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib\Cx.class.php ( 22.49 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Think\Template\TagLib.class.php ( 9.19 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\CuteMi\Runtime\Cache\Home\876f3e97bd3c8e2f432bf41e4f9dee90.php ( 16.75 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\WriteHtmlCacheBehavior.class.php ( 0.98 KB )</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">H:\WWW\www\CuteMi\ThinkPHP\Library\Behavior\ShowPageTraceBehavior.class.php ( 5.25 KB )</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\BuildLiteBehavior [ RunTime:0.000010s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_init ] --END-- [ RunTime:0.000052s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ReadHtmlCacheBehavior [ RunTime:0.000605s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_begin ] --END-- [ RunTime:0.000647s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ContentReplaceBehavior [ RunTime:0.000098s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ template_filter ] --END-- [ RunTime:0.000140s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\ParseTemplateBehavior [ RunTime:0.010542s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_parse ] --END-- [ RunTime:0.010597s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --START--</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">Run Behavior\WriteHtmlCacheBehavior [ RunTime:0.000375s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ view_filter ] --END-- [ RunTime:0.000404s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">[ app_end ] --START--</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	<li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_close` [ RunTime:0.004318s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_close` WHERE ( close_id = '1' ) LIMIT 1   [ RunTime:0.000276s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SHOW COLUMNS FROM `mi_flink` [ RunTime:0.003575s ]</li><li style="border-bottom:1px solid #EEE;font-size:14px;padding:0 12px">SELECT * FROM `mi_flink` WHERE ( status=1 )  [ RunTime:0.000398s ]</li>    </ol>
    </div>
        <div style="display:none;">
    <ol style="padding: 0; margin:0">
	    </ol>
    </div>
    </div>
</div>
<div id="think_page_trace_close" style="display:none;text-align:right;height:15px;position:absolute;top:10px;right:12px;cursor: pointer;"><img style="vertical-align:top;" src="data:image/gif;base64,R0lGODlhDwAPAJEAAAAAAAMDA////wAAACH/C1hNUCBEYXRhWE1QPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS4wLWMwNjAgNjEuMTM0Nzc3LCAyMDEwLzAyLzEyLTE3OjMyOjAwICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdFJlZj0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlUmVmIyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IFdpbmRvd3MiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MUQxMjc1MUJCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MUQxMjc1MUNCQUJDMTFFMTk0OUVGRjc3QzU4RURFNkEiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDoxRDEyNzUxOUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDoxRDEyNzUxQUJBQkMxMUUxOTQ5RUZGNzdDNThFREU2QSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PgH//v38+/r5+Pf29fTz8vHw7+7t7Ovq6ejn5uXk4+Lh4N/e3dzb2tnY19bV1NPS0dDPzs3My8rJyMfGxcTDwsHAv769vLu6ubi3trW0s7KxsK+urayrqqmop6alpKOioaCfnp2cm5qZmJeWlZSTkpGQj46NjIuKiYiHhoWEg4KBgH9+fXx7enl4d3Z1dHNycXBvbm1sa2ppaGdmZWRjYmFgX15dXFtaWVhXVlVUU1JRUE9OTUxLSklIR0ZFRENCQUA/Pj08Ozo5ODc2NTQzMjEwLy4tLCsqKSgnJiUkIyIhIB8eHRwbGhkYFxYVFBMSERAPDg0MCwoJCAcGBQQDAgEAACH5BAAAAAAALAAAAAAPAA8AAAIdjI6JZqotoJPR1fnsgRR3C2jZl3Ai9aWZZooV+RQAOw==" /></div>
</div>
<div id="think_page_trace_open" style="height:30px;float:right;text-align: right;overflow:hidden;position:fixed;bottom:0;right:0;color:#000;line-height:30px;cursor:pointer;"><div style="background:#232323;color:#FFF;padding:0 6px;float:right;line-height:30px;font-size:14px">0.0448s </div><img width="30" style="" title="ShowPageTrace" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyBpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENTNSBXaW5kb3dzIiB4bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOjVERDVENkZGQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIiB4bXBNTTpEb2N1bWVudElEPSJ4bXAuZGlkOjVERDVENzAwQjkyNDExRTE5REY3RDQ5RTQ2RTRDQUJCIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6NURENUQ2RkRCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6NURENUQ2RkVCOTI0MTFFMTlERjdENDlFNDZFNENBQkIiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5fx6IRAAAMCElEQVR42sxae3BU1Rk/9+69+8xuNtkHJAFCSIAkhMgjCCJQUi0GtEIVbP8Qq9LH2No6TmfaztjO2OnUdvqHFMfOVFTqIK0vUEEeqUBARCsEeYQkEPJoEvIiELLvvc9z+p27u2F3s5tsBB1OZiebu5dzf7/v/L7f952zMM8cWIwY+Mk2ulCp92Fnq3XvnzArr2NZnYNldDp0Gw+/OEQ4+obQn5D+4Ubb22+YOGsWi/Todh8AHglKEGkEsnHBQ162511GZFgW6ZCBM9/W4H3iNSQqIe09O196dLKX7d1O39OViP/wthtkND62if/wj/DbMpph8BY/m9xy8BoBmQk+mHqZQGNy4JYRwCoRbwa8l4JXw6M+orJxpU0U6ToKy/5bQsAiTeokGKkTx46RRxxEUgrwGgF4MWNNEJCGgYTvpgnY1IJWg5RzfqLgvcIgktX0i8dmMlFA8qCQ5L0Z/WObPLUxT1i4lWSYDISoEfBYGvM+LlMQQdkLHoWRRZ8zYQI62Thswe5WTORGwNXDcGjqeOA9AF7B8rhzsxMBEoJ8oJKaqPu4hblHMCMPwl9XeNWyb8xkB/DDGYKfMAE6aFL7xesZ389JlgG3XHEMI6UPDOP6JHHu67T2pwNPI69mCP4rEaBDUAJaKc/AOuXiwH07VCS3w5+UQMAuF/WqGI+yFIwVNBwemBD4r0wgQiKoFZa00sEYTwss32lA1tPwVxtc8jQ5/gWCwmGCyUD8vRT0sHBFW4GJDvZmrJFWRY1EkrGA6ZB8/10fOZSSj0E6F+BSP7xidiIzhBmKB09lEwHPkG+UQIyEN44EBiT5vrv2uJXyPQqSqO930fxvcvwbR/+JAkD9EfASgI9EHlp6YiHO4W+cAB20SnrFqxBbNljiXf1Pl1K2S0HCWfiog3YlAD5RGwwxK6oUjTweuVigLjyB0mX410mAFnMoVK1lvvUvgt8fUJH0JVyjuvcmg4dE5mUiFtD24AZ4qBVELxXKS+pMxN43kSdzNwudJ+bQbLlmnxvPOQoCugSap1GnSRoG8KOiKbH+rIA0lEeSAg3y6eeQ6XI2nrYnrPM89bUTgI0Pdqvl50vlNbtZxDUBcLBK0kPd5jPziyLdojJIN0pq5/mdzwL4UVvVInV5ncQEPNOUxa9d0TU+CW5l+FoI0GSDKHVVSOs+0KOsZoxwOzSZNFGv0mQ9avyLCh2Hpm+70Y0YJoJVgmQv822wnDC8Miq6VjJ5IFed0QD1YiAbT+nQE8v/RMZfmgmcCRHIIu7Bmcp39oM9fqEychcA747KxQ/AEyqQonl7hATtJmnhO2XYtgcia01aSbVMenAXrIomPcLgEBA4liGBzFZAT8zBYqW6brI67wg8sFVhxBhwLwBP2+tqBQqqK7VJKGh/BRrfTr6nWL7nYBaZdBJHqrX3kPEPap56xwE/GvjJTRMADeMCdcGpGXL1Xh4ZL8BDOlWkUpegfi0CeDzeA5YITzEnddv+IXL+UYCmqIvqC9UlUC/ki9FipwVjunL3yX7dOTLeXmVMAhbsGporPfyOBTm/BJ23gTVehsvXRnSewagUfpBXF3p5pygKS7OceqTjb7h2vjr/XKm0ZofKSI2Q/J102wHzatZkJPYQ5JoKsuK+EoHJakVzubzuLQDepCKllTZi9AG0DYg9ZLxhFaZsOu7bvlmVI5oPXJMQJcHxHClSln1apFTvAimeg48u0RWFeZW4lVcjbQWZuIQK1KozZfIDO6CSQmQQXdpBaiKZyEWThVK1uEc6v7V7uK0ysduExPZx4vysDR+4SelhBYm0R6LBuR4PXts8MYMcJPsINo4YZCDLj0sgB0/vLpPXvA2Tn42Cv5rsLulGubzW0sEd3d4W/mJt2Kck+DzDMijfPLOjyrDhXSh852B+OvflqAkoyXO1cYfujtc/i3jJSAwhgfFlp20laMLOku/bC7prgqW7lCn4auE5NhcXPd3M7x70+IceSgZvNljCd9k3fLjYsPElqLR14PXQZqD2ZNkkrAB79UeJUebFQmXpf8ZcAQt2XrMQdyNUVBqZoUzAFyp3V3xi/MubUA/mCT4Fhf038PC8XplhWnCmnK/ZzyC2BSTRSqKVOuY2kB8Jia0lvvRIVoP+vVWJbYarf6p655E2/nANBMCWkgD49DA0VAMyI1OLFMYCXiU9bmzi9/y5i/vsaTpHPHidTofzLbM65vMPva9HlovgXp0AvjtaqYMfDD0/4mAsYE92pxa+9k1QgCnRVObCpojpzsKTPvayPetTEgBdwnssjuc0kOBFX+q3HwRQxdrOLAqeYRjkMk/trTSu2Z9Lik7CfF0AvjtqAhS4NHobGXUnB5DQs8hG8p/wMX1r4+8xkmyvQ50JVq72TVeXbz3HvpWaQJi57hJYTw4kGbtS+C2TigQUtZUX+X27QQq2ePBZBru/0lxTm8fOOQ5yaZOZMAV+he4FqIMB+LQB0UgMSajANX29j+vbmly8ipRvHeSQoQOkM5iFXcPQCVwDMs5RBCQmaPOyvbNd6uwvQJ183BZQG3Zc+Eiv7vQOKu8YeDmMcJlt2ckyftVeMIGLBCmdMHl/tFILYwGPjXWO3zOfSq/+om+oa7Mlh2fpSsRGLp7RAW3FUVjNHgiMhyE6zBFjM2BdkdJGO7nP1kJXWAtBuBpPIAu7f+hhu7bFXIuC5xWrf0X2xreykOsUyKkF2gwadbrXDcXrfKxR43zGcSj4t/cCgr+a1iy6EjE5GYktUCl9fwfMeylyooGF48bN2IGLTw8x7StS7sj8TF9FmPGWQhm3rRR+o9lhvjJvSYAdfDUevI1M6bnX/OwWaDMOQ8RPgKRo0eulBTdT8AW2kl8e9L7UHghHwMfLiZPNoSpx0yugpQZaFqKWqxVSM3a2pN1SAhC2jf94I7ybBI7EL5A2Wvu5ht3xsoEt4+Ay/abXgCQAxyOeDsDlTCQzy75ohcGgv9Tra9uiymRUYTLrswOLlCdfAQf7HPDQQ4ErAH5EDXB9cMxWYpjtXApRncojS0sbV/cCgHTHwGNBJy+1PQE2x56FpaVR7wfQGZ37V+V+19EiHNvR6q1fRUjqvbjbMq1/qfHxbTrE10ePY2gPFk48D2CVMTf1AF4PXvyYR9dV6Wf7H413m3xTWQvYGhQ7mfYwA5mAX+18Vue05v/8jG/fZX/IW5MKPKtjSYlt0ellxh+/BOCPAwYaeVr0QofZFxJWVWC8znG70au6llVmktsF0bfHF6k8fvZ5esZJbwHwwnjg59tXz6sL/P0NUZDuSNu1mnJ8Vab17+cy005A9wtOpp3i0bZdpJLUil00semAwN45LgEViZYe3amNye0B6A9chviSlzXVsFtyN5/1H3gaNmMpn8Fz0GpYFp6Zw615H/LpUuRQQDMCL82n5DpBSawkvzIdN2ypiT8nSLth8Pk9jnjwdFzH3W4XW6KMBfwB569NdcGX93mC16tTflcArcYUc/mFuYbV+8zY0SAjAVoNErNgWjtwumJ3wbn/HlBFYdxHvSkJJEc+Ngal9opSwyo9YlITX2C/P/+gf8sxURSLR+mcZUmeqaS9wrh6vxW5zxFCOqFi90RbDWq/YwZmnu1+a6OvdpvRqkNxxe44lyl4OobEnpKA6Uox5EfH9xzPs/HRKrTPWdIQrK1VZDU7ETiD3Obpl+8wPPCRBbkbwNtpW9AbBe5L1SMlj3tdTxk/9W47JUmqS5HU+JzYymUKXjtWVmT9RenIhgXc+nroWLyxXJhmL112OdB8GCsk4f8oZJucnvmmtR85mBn10GZ0EKSCMUSAR3ukcXd5s7LvLD3me61WkuTCpJzYAyRurMB44EdEJzTfU271lUJC03YjXJXzYOGZwN4D8eB5jlfLrdWfzGRW7icMPfiSO6Oe7s20bmhdgLX4Z23B+s3JgQESzUDiMboSzDMHFpNMwccGePauhfwjzwnI2wu9zKGgEFg80jcZ7MHllk07s1H+5yojtUQTlH4nFdLKTGwDmPbIklOb1L1zO4T6N8NCuDLFLS/C63c0eNRimZ++s5BMBHxU11jHchI9oFVUxRh/eMDzHEzGYu0Lg8gJ7oS/tFCwoic44fyUtix0n/46vP4bf+//BRgAYwDDar4ncHIAAAAASUVORK5CYII="></div>
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


<script type="text/JavaScript">
     $(function(){

            $(".adresscheck").click(function(){
                var id = $(this).attr("data");
                $("#oid").val(id);
                // alert(id);

            });


             //点击删除触发事件
           $('.delete').click(function(){
           
                var del=$(this).parent().children().find('input').val();
    

                $.ajax({
                    url:"/CuteMi/index.php/Home/Order/delete",     //请求地址
                    type:"post",             //发送方式
                    data:{id:del},//请求数据
                    async:true,             //是否同步
                    dataType:"json",        //响应数据格式
                    success:function(data){ //成功回调函数
                       // console.log(data);
                       if(data){
                        location.reload();

                       }
                    },
                    error:function(){   //失败回调函数
                        alert("ajax请求失败！");
                    }
                 });
            });


           //使用优惠券时候的价格变化
            $("#discount").change(function(){
                  id = $(this).val();
                 var total = parseInt($("#J_totalPrice").html());

                 // alert(id);
                 //将数据提交给PHP
                  $.ajax({
                        type:"get",
                        data:"id="+id,
                        url:"/CuteMi/index.php/Home/Order/coupun",
                        dataType:"text",
                        success:function(data){
                           // console.log(data);
                           var data = parseInt(data);
                            var num = total-data;
                            if(num<0){
                                num = 0;
                            }
                            $("#actualpay").html(num);
                        },
                     });
            });

          
            //点击去结算触发事件
            $("#J_checkoutToPay").click(function(){
                var o=$('#oid').val();
                // alert(o);
                // alert(o);
                if(o!=""){
                    var money = $("#actualpay").text();
                  $.ajax({
                        type:"get",
                        data:"money="+money,
                        url:"/CuteMi/index.php/Home/Order/money",
                        dataType:"text",
                        success:function(data){
                          console.log(data);

                        },
                        async:false,
                     });
                    

                }else{
                 
                 //判断是否已经选择地址
                 // var check = $(".xiaomi").attr("checked");
                 // if(check == undefined){
                 //     alert("请选择地址");
                 //     return false;
                 // }

                 
                  alert('请选择地址');
                    // location.href="/CuteMi/index.php/Home/Order/index";
                    return false;

                }
            });
             
     });
</script>

</body>
</html>