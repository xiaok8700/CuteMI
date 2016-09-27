<?php
namespace Home\Controller;
use Think\Controller;
class CartController extends CommonController {
   //首页显示
    public function index(){
      // dump(I("session.shopcar"));
      $this->assign("shopcar",I("session.shopcar"));
      $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);
      $this->display();
  }

    public function total(){
       
      $total = I("get.total");
      //将总计存放在session中
      $_SESSION["total"]=$total;
    }
    
    //删除购物车中的商品
    public function del(){
       
      $gid = I("get.gid");
      //销毁SESSION;
      $_SESSION["shopcar"][$gid]=array();
      unset($_SESSION["shopcar"][$gid]);
        
    }

}