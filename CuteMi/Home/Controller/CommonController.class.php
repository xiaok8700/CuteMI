<?php
namespace Home\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class CommonController extends Controller {

    public function _initialize(){

    	//判断是否登录
    	//优惠券页面验证登录
    	if(strtolower(CONTROLLER_NAME)=='coupun'){
    		 if(!$_SESSION["username"]["islogin"]){
                 $this->error("请先登录!",U("login/index"),3);
               }
    	}

       //订单页面验证登录
      if(strtolower(CONTROLLER_NAME)=='cart'){
         if(!$_SESSION["username"]["islogin"]){
                 $this->error("请先登录!",U("login/index"),3);
               }
      }

        //订单页面验证登录
      if(strtolower(CONTROLLER_NAME)=='order'){
    		 if(!$_SESSION["username"]["islogin"]){
                 $this->error("请先登录!",U("login/index"),3);
               }
    	}
        //个人中心页面验证登录
      if(strtolower(CONTROLLER_NAME)=='space'){
    		 if(!$_SESSION["username"]["islogin"]){
                 $this->error("请先登录!",U("login/index"),3);
               }
    	}
       //支付页面验证登录
      if(strtolower(CONTROLLER_NAME)=='pay'){
         if(!$_SESSION["username"]["islogin"]){
                 $this->error("请先登录!",U("login/index"),3);
               }
      }
       //个人信息页面验证登录
      if(strtolower(CONTROLLER_NAME)=='personal'){
         if(!$_SESSION["username"]["islogin"]){
                 $this->error("请先登录!",U("login/index"),3);
               }
      }
    	
         //如果关闭了网站
        $close = M("close");
        $res = $close->where("close_id = '1'")->find();
      if($res["status"]==2){    
          $this->redirect("Error/index");
       }
    }
    
    
}