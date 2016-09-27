<?php
namespace Home\Controller;
use Think\Controller;
class CoupunController extends CommonController {
    // 显示首页
  public function index(){

      $uid = $_SESSION["username"]["uid"];
      //优惠券
      $coupun = M("coupun");
      $res = $coupun->select();
      $this->assign("coupun",$res);
      //实例化优惠券详情表
      $coupun_detail = M("coupun_detail");
      //判断是否已经领取过
      $res3 = $coupun_detail->where("uid = ".$uid)->select();
      foreach($res3 as $v){
         $arr[] = $v["cid"];
      }
      $this->assign("arr",$arr);

      $this->display();
  }

  //领取优惠券操作
  public function gain(){
    
      $cid = I("get.id");
      $uid = $_SESSION["username"]["uid"];
      //实例化优惠券表
      $coupun = M("coupun");
      $result = $coupun ->where("id = ".$cid)->find();
      $data["cid"] = $cid;
      $data["uid"] = $uid;
      $data["remove_time"] = $result["remove_time"];
      $data["title"] = $result["title"];
      $data["num"] = $result["num"];
      $data["status"] = "0";
      //实例化优惠券详情表
      $coupun_detail = M("coupun_detail");
      //判断是否已经领取过
      $res = $coupun_detail->where("cid = ".$cid." and uid = ".$uid)->find();
        if($res){
          //如果已经领取过
          echo "1";
        }else{
          //如果还没有领取
         $res2 = $coupun_detail->data($data)->add();
         if($res2){
            //领取成功
            echo "2";
         }else{
            //领取失败
            echo "3";
         }
    }
  }
}