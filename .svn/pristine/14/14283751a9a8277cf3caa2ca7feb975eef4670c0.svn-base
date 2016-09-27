<?php
namespace Home\Controller;
use Think\Controller;
class BeforeCartController extends CommonController {

  //首页显示
  public function index(){

     $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);
       
    $gid = I("get.gid");
    $goods = M("goods");
    $res = $goods->where("gid = ".$gid)->find();
    $this -> assign("goods",$res);
    $verson = $res["verson"];
    $verson = explode(",",$verson);
    $this->assign("verson",$verson);
    $color = $res["color"];
    $color = explode(",",$color);
    $this->assign("color",$color);
    $this->display();
  }

  //处理传送的数据
  public function doindex(){

    //接收ajax提交的值
    $gid = I("get.gid");
    $verson = I("get.verson");
    $color = I("get.color");

    //如果商品已经存在
    if(array_key_exists($gid,I("session.shopcar"))){
    //if(array_key_exists($gid,I("session.shopcar"))&& array_key_exists($verson,I("session.shopcar.verson")) && array_key_exists($color,I("session.shopcar.color"))){
    $_SESSION["shopcar"][$gid]["buynum"]++;
    }else{
    //第一次购买该商品
    $goods = M("goods");
    $product = $goods->where("gid = ".$gid)->find();

    $_SESSION["shopcar"][$gid]=$product;
    $_SESSION["shopcar"][$gid]["verson"] = $verson;
    $_SESSION["shopcar"][$gid]["color"] = $color;
    $_SESSION["shopcar"][$gid]["buynum"]=1;

  }
}

public function doattindex(){

    //接收ajax提交的值
    $gid = I("get.gid");
    $color = I("get.color");

    //如果商品已经存在
    if(array_key_exists($gid,I("session.shopcar"))){
    $_SESSION["shopcar"][$gid]["buynum"]++;
    }else{
    //第一次购买该商品
    $goods = M("goods");
    $product = $goods->where("gid = ".$gid)->find();

    $_SESSION["shopcar"][$gid]=$product;
    $_SESSION["shopcar"][$gid]["buynum"]=1;
     $_SESSION["shopcar"][$gid]["color"] = $color;

  }
}
 
}