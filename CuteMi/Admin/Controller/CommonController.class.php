<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class CommonController extends Controller {

    public function _initialize(){
      //echo "#####";
       if(!$_SESSION['admin_user']['islogin']){
         $this->error("请先登录!",U("login/index"),3);
       }
	   
		//DUMP($_SESSION);
		//前台用户显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='user' && !in_array(1,$_SESSION["admin_user"]["power"])){
			//dump($_SESSION["admin_user"]["power"]);
			$this->error('您没有操作权限',U('Index/right'));
		}
		//后台用户显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='admin' && !in_array(1,$_SESSION["admin_user"]["power"])){
			//dump($_SESSION["admin_user"]["power"]);
			$this->error('您没有操作权限',U('Index/right'));
		}
		//后台用户添加列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='admin' && strtolower(ACTION_NAME) =='add'&& !in_array(6,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//后台用户删除列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='admin' && strtolower(ACTION_NAME) =='delete'&& !in_array(7,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//后台用户删除列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='admin' && strtolower(ACTION_NAME) =='mod'&& !in_array(8,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//商品显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='goods' && !in_array(2,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//商品分类显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='type' && !in_array(2,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//附件分类显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='attachtype' && !in_array(2,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//附件管理显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='attach' && !in_array(2,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//商品评价显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='discuss' && !in_array(2,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//订单显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='order' && !in_array(3,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
		//图片轮播显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='event' && !in_array(4,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		} 
		//优惠券显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='coupun' && !in_array(4,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		} 
		//商品收藏显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='collect' && !in_array(4,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		} 
		//用户积分显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='Integral' && !in_array(4,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		} 
		//友情链接显示列表方法权限判断
		if(strtolower(CONTROLLER_NAME)=='flink' && !in_array(5,$_SESSION["admin_user"]["power"])){
			
			$this->error('您没有操作权限',U('Index/right'));
		}
    }
    
    
}