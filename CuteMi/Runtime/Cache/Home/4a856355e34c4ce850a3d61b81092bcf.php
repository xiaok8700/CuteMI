<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0058)http://localhost/mishop/index.php/Home/Orders/address.html -->
<html lang="zh-CN" xml:lang="zh-CN">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">     
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta charset="UTF-8">
  <title>填写地址信息</title>
        <!-- <link rel="shortcut icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon"> -->
        <!-- <link rel="icon" href="http://s01.mifile.cn/favicon.ico" type="image/x-icon"> -->
  <link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/base.min.css">

  <link rel="stylesheet" type="text/css" href="/CuteMi/Public/home/css/checkout.min.css">
  <script src="/CuteMi/Public/home/js/jquery-1.7.2.js"></script>
        
</head>
    <body>
        <div class="site-header site-mini-header">
            <div class="container">
                <div class="header-logo">
                    <a class="logo " href="http://localhost/mishop/index.php" title="小米官网" data-stat-id="1781d41b6b733f86" onclick="_msq.push([ &amp; #39; trackEvent &amp; #39; , &amp; #39; 50d1f382fadafb8b - 1781d41b6b733f86 &amp; #39; , &amp; #39; http://www.mi.com/index.html&#39;, &#39;pcpid&#39;]);"></a>
                </div>
                <div class="header-title" id="J_miniHeaderTitle"><h2>添加地址</h2></div>
                <div class="topbar-info" id="J_userInfo"><span class="user"><a class="user-name" href="http://localhost/mishop/index.php/Home/Space/index.html" target="_blank" data-stat-id="fcad70ff2fe1e645" onclick="_msq.push([&#39;trackEvent&#39;, &#39;17d09c19e1c990ea-fcad70ff2fe1e645&#39;, &#39;/mishop/index.php/Home/Space/index.html&#39;, &#39;pcpid&#39;]);">个人中心</a></span></div>
            </div>
        </div>
        <!-- .site-mini-header END -->

         <!--<script type="text/javascript" async="" src="./address_files/unjcV2.js"></script>
         <script type="text/javascript" async="" src="./address_files/mstr.js"></script>
         <script type="text/javascript" async="" src="./address_files/jquery.statData.min.js"></script>
         <script type="text/javascript" async="" src="./address_files/xmst.js"></script>-->
        <script type="text/javascript" src="/CuteMi/Public/home/js/jquery-1.8.3.min.js"></script>
        <script>
            $(function(){
                $("input[name='name']").blur(function(){
                    var s = $("input[name='name']").val();
                     if(s!=''){
                       $(".box-main span").eq(0).css('display','none');
                   }else{
                        $(".box-main span").eq(0).css('display','block');
                   }
                });
               $("input[name='tel_phone']").blur(function(){
                   var re,r;
                   var s = $("input[name='tel_phone']").val();
                   re = /[0-9]{11}/;
                   r = s.match(re);
                   if(r){
                       $(".box-main span").eq(1).css('display','none');
                   }else{
                        $(".box-main span").eq(1).css('display','block');
                   }
               });
               $.ajax({
                   url:'/CuteMi/index.php/Home/Order/add',
                   type:'post',
                   data:{'upid':0},
                   dataType:'json',
                  // async:true;
                   success:function(data){
                               for(var i=0;i<data.length;i++){
                                var info = '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                                $("#cid").append(info);
                               // console.log(data);
                           }
                   },
                   error:function($a,$b,$c){
                       alert($c);
                   }
               });
               //获取所有下拉并添加选择时间
              // $("select").live("change",function(){
              //      var ob = $(this);
              //      //清除后面所有的select
              //      ob.nextAll("select").remove();
              //      $.ajax({
              //          url:"/mishop/index.php/Home/Orders/add.html",
              //          type:'post',
              //          data:{upid:ob.val()},
              //          //async:true,
              //          dataType:'json',
              //          success:function(data){
              //              if(data.length>0){
              //                  var select = $("<select></select>");
              //                  for(var i=0;i<data.length;i++){
              //                      var info = "<option value="+data[i].id+">"+data[i].name+"</option>"
              //                      select.append(info);
              //                  }
              //                  ob.after(select);
              //              }
              //          },
              //          error:function($a,$b,$c){
              //              alert($c);
              //          }
              //      });
              //  });
               $("select").live("change",function(){
                var ob = $(this);
                //清除后面所有的select
                ob.nextAll("select").remove();
                //ajax加载子城市信息
                $.ajax({
                    url:"/CuteMi/index.php/Home/Order/add",     //请求地址
                    type:"post",             //发送方式
                    data:{upid:ob.val()},//请求数据
                    async:true,             //是否同步
                    dataType:"json",        //响应数据格式
                    success:function(data){ //成功回调函数
                       // console.log(data);
                       if(data.length>0){
                           var select = $("<select name='is_district[]'></select>");
                           for(var i=0;i<data.length;i++){
                              var info = '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                              select.append(info);
                           }
                           ob.after(select);
                       }
                    },
                    error:function(){   //失败回调函数
                        alert("ajax请求失败！");
                    }
                 });
             });
            });
                 //添加地址
             function doAdd(){
                     $.ajax({
                     url:'/CuteMi/index.php/Home/Order/doaddress',
                     type:'post',
                     data:$("form").serialize(),
                     dataType:'json',
                     success:function(data){
                         if(data){
                          window.location.href='/CuteMi/index.php/Home/Order/index';
                      }else{
                         $("box-main span").eq(2).css('display','block');
                      }
                     },
                     // error:function($a,$b,$c){
                     //     //alert($c);
                     // }
                 });
             }    
        </script>
        <div class="page-main">
            <div class="container">
                <div class="checkout-box">
                    <div class="section section-address">
                        <div class="section-header clearfix">
                            <h3 class="title">已经存在的地址</h3>
                            <div class="more">
                            </div>
                        </div>
                        <div class="section-body clearfix" id="J_addressList">
                            <!-- addresslist begin -->
                            <?php if(is_array($addr)): foreach($addr as $key=>$address): ?><div class="address-item J_addressItem " data-address_id="10150801690007301" data-consignee="裴帅坡" data-tel="185****1927" data-province_id="2" data-province_name="北京" data-city_id="36" data-city_name="北京市" data-district_id="389" data-district_name="昌平区" data-area="0" data-address="育荣教育园区" data-tag_name="兄弟连教育">
                                   <!--遍历地址信息-->
                                    <dl>
                                        <dt>
                                        <span class="tag"><?php echo ($address["address"]); ?></span><br>
                                        <em class="uname"><?php echo ($address["name"]); ?></em>
                                        </dt>
                                        <dd class="utel">
                                            <?php echo ($address["mob_phone"]); ?>               
                                        </dd>
                                        <dd class="uaddress">
                                            <?php echo ($address["is_district"]); ?> <br>
                                                             
                                        </dd>
                                    </dl>
                                   
                                    <div class="actions">
                                     
                                        <a href="javascript:void(0);" class="modify J_addressModify" data-stat-id="25baf9d4f33c8f6c" onclick="">修改</a>
                                    </div>
                                </div><?php endforeach; endif; ?>
                                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="address-edit-box" style="width:800px ; margin:0 auto ; text-align:center">
            <form action="" method="post"> 
                <div class="box-main">
                  <div class="form-section form-section-active">
                        <label for="user_zipcode" class="input-label">姓名</label>
                        <input type="text" name="name" id="user_zipcode" class="input-text J_addressInput">
                        <span style="display:none">姓名不能为空</span>
                  </div>
                      <div class="form-section form-section-active">
                        <label for="tel_phone" class="input-label">手机号</label>
                        <input type="text" name="mob_phone" id="user_zipcode" class="input-text J_addressInput">
                        <span style="display: none">手机号码格式不正确</span>
                    </div>
                    <div class="form-section form-select-2 clearfix">
                                <select id="cid" name="is_district">
                                    <!-- <option>省份/自治区</option>
                                <option value="1">北京市</option><option value="2">天津市</option><option value="3">河北省</option><option value="4">山西省</option><option value="5">内蒙古自治区</option><option value="6">辽宁省</option><option value="7">吉林省</option><option value="8">黑龙江省</option><option value="9">上海市</option><option value="10">江苏省</option><option value="11">浙江省</option><option value="12">安徽省</option><option value="13">福建省</option><option value="14">江西省</option><option value="15">山东省</option><option value="16">河南省</option><option value="17">湖北省</option><option value="18">湖南省</option><option value="19">广东省</option><option value="20">广西壮族自治区</option><option value="21">海南省</option><option value="22">重庆市</option><option value="23">四川省</option><option value="24">贵州省</option><option value="25">云南省</option><option value="26">西藏自治区</option><option value="27">陕西省</option><option value="28">甘肃省</option><option value="29">青海省</option><option value="30">宁夏回族自治区</option><option value="31">新疆维吾尔自治区</option><option value="32">台湾省</option><option value="33">香港特别行政区</option><option value="34">澳门特别行政区</option><option value="35">海外</option><option value="36">其他</option> -->
                              </select>
                    </div>
                    <div class="form-section form-section-active">
                        <label for="user_zipcode" class="input-label">详细地址</label>
                        <input type="text" name="address" id="user_zipcode" class="input-text J_addressInput">
                    </div>
                      <div class="form-section form-section-active">
                        <label for="user_zipcode" class="input-label">邮政编码</label>
                        <input type="text" name="code" id="user_zipcode" class="input-text J_addressInput">
                     </div>
                      <div class="form-section form-section-active">
                        <label for="user_zipcode" class="input-label">固定电话</label>
                        <input type="text" name="tel_phone" id="user_zipcode" class="input-text J_addressInput">
                    </div>
                    <div class="form-section form-section-active">
                        <label for="user_zipcode">是否常用</label>
                        <input type="radio" name="is_default" id="user_zipcode" value="0">是 
                        <input type="radio" name="is_default" id="user_zipcode" value="1">否

                    </div>
                </div>
                
                <div class="form-confirm clearfix">
                       <span style="display:none ">注册失败 请重新注册</span>
                    <a id="J_save" class="btn btn-primary" href="javascript:void(0);" data-stat-id="12e61678358c83eb" onclick="doAdd()">保存</a>
                    <a id="J_cancel" class="btn btn-gray" href="/CuteMi/index.php/Home/Order/index">取消</a>

                </div>
        
        </form></div>
    
</body></html>