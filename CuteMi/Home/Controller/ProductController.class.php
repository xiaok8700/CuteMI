<?php
namespace Home\Controller;
use Think\Controller;
class ProductController extends CommonController {
    // 显示首页
    public function index(){

       $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);

       $typeid = I("get.typeid");
       $type = M("type");
      
       $res1 = $type->where("pid = ".$typeid)->select();
       // 获取二级类的分类ID
       foreach($res1 as $v){
           $arr[]=$v["typeid"];
       }
       
       // 获取二级类下的所有商品
       $goods = M("goods");
       $res2 = $goods->where("typeid in"."(".implode(",",$arr).")")->select();
       $this->assign("res2",$res2);
       $this->assign("res3",$res2);
      
       //获取轮播图
       $event = M("event");
       $res = $event->where("status = '0'")->select();
       foreach($res as $v){
          $arr1[]=$v["pic"];
       }
       //dump($arr);
        $this->assign("pic0",$arr1[0]);
        $this->assign("pic1",$arr1[1]);
        $this->assign("pic2",$arr1[2]);
        $this->assign("pic3",$arr1[3]);

        $this->display();
  }

   //网页头部部分
   public function header(){
       //头部导航栏部分
       //一级分类
       $type = M("type");
       $nav1 = $type->where("pid = 0")->select();
       $this->assign("nav1",$nav1);
  
       $attach_type = M("attach_type");
       $nav2 = $attach_type->where("pid = 0")->select();
       $this->assign("nav2",$nav2);
          $num=0;
       foreach(I("session.shopcar") as $v){
          $num++;
        }
       $this->assign("num",$num);

       $this->display();
   }

   //网页尾部部分
   public function footer(){
		 //友情链接遍历
        $flink = M("flink")->where("status=1")->select();
        $this->assign("flink",$flink);
        $this->display();
   }


  // 附件分类页
  public function attproduct(){
       
      // 二级类
       $attid = I("get.attid");
       $attach_type = M("attach_type");
      
       $res1 = $attach_type->where("pid = ".$attid)->select();
       // 获取二级类的分类ID
       foreach($res1 as $v){
           $arr[]=$v["attid"];
       }
       
       // 获取二级类下的所有商品
       $goods = D("goods");
       $collect = M("collect");

       $res2 = $goods->where("typeid in"."(".implode(",",$arr).")")->select();
       //dump($res2);

       $this->assign("res2",$res2);
      
       //实例化收藏表
       $collect = M("collect");
       $uid = $_SESSION["username"]["uid"];
       $res3 = $collect->where("uid = ".$uid." and state = '0'")->select();
       // dump($res3);
       foreach($res3 as $v){
            $collection[] = $v["gid"];
       }
       // dump($collection);
       $this->assign("collection",$collection);
        
       $this->display();
  }

  //加入收藏
  public function collect(){
     
     $gid = I("get.gid");
     $collect = M("collect"); 
     $uid = $_SESSION["username"]["uid"];
     $res = $collect->where("gid = ".$gid." and uid=".$uid." and state = '0'")->find();
     //判断该商品是否已经收藏过
     if($res){
         //已收藏过
         echo "0";
     }else{
         //未收藏过
         $goods = M("goods");
         $res = $goods->where("gid = ".$gid)->find();
         $data["uid"] = $_SESSION["username"]["uid"];
         $data["gid"] = $res["gid"];
         $data["pic"] = $res["pic"];
         $data["gname"] = $res["gname"];
         $data["state"] = "0";
         $data["price"] = $res["price"];
         $data["color"] = $res["color"];
         $data["keywords"] = $res["keywords"];
         $data["onclick"] = $res["onclick"];
         $result = $collect->data($data)->add();
         echo "1"; 
          }
  }

  //积分兑换商品
  public function integral(){

    $num = $_POST['jpg'];
    $uid = $_SESSION['username']['uid'];

    $int = M('integral');
    $i = $int->where('uid='.$uid)->find();
    if($i['num']>$num){
      $data = array(
        'num' => $i['num']-$num,
        );
      $model = M('integral');
      $res = $model->where('uid='.$uid)->data($data)->save();
        if($res){
           echo 1;
        }else{
         echo 0;
        }
    }else{
      echo 0;
    }
  }

}