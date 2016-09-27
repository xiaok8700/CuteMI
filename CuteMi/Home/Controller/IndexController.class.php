<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
   //首页显示
    public function index(){
       //一级分类
       $type = M("type");
       $nav1 = $type->where("pid = 0")->select();
       $this->assign("nav1",$nav1);
       $this->assign("nav3",$nav1);

       $attach_type = M("attach_type");
       $nav2 = $attach_type->where("pid = 0")->select();
       $this->assign("nav2",$nav2);
       $this->assign("nav4",$nav2);

       $this->assign("nav2",$nav2);
         $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);

       //获取轮播图
        $event = M("event");
        $res = $event->where("status = '0'")->select();
        foreach($res as $v){
           $arr[]=$v["pic"];
        }
       
        $this->assign("pic0",$arr[0]);
        $this->assign("pic1",$arr[1]);
        $this->assign("pic2",$arr[2]);
        $this->assign("pic3",$arr[3]);

        $islogin = $_SESSION["username"]["islogin"];
        $uname = $_SESSION["username"]["uname"];

        $this->assign("islogin",$islogin);
        $this->assign("uname",$uname);
        
        // dump($_SESSION["username"]);



        //友情链接遍历
        $flink = M("flink")->where("status=1")->select();
        $this->assign("flink",$flink);
        $this->display();
  }


  //二级导航
  public function index2(){

      //商品分类
      $typeid = I("post.typeid"); 
      $type = M("type");

       // 二级类
       $res1 = $type->where("pid = ".$typeid)->select();
       // 获取二级类的分类ID
       foreach($res1 as $v){
           $arr[]=$v["typeid"];
       }
       
       // 获取二级类下的所有商品
       $goods = M("goods");
       $res2 = $goods->where("typeid in"."(".implode(",",$arr).")")->select();
       echo json_encode($res2);

  }

//-----------------------------------------------------------------
   public function bianli(){

      //商品分类
       $typeid = I("get.typeid");
      //$typeid='56'; 
      $type = M("type");

       // 二级类
       $res1 = $type->where("pid = ".$typeid)->select();
       // 获取二级类的分类ID
       foreach($res1 as $v){
           $arr[]=$v["typeid"];
       }
       
       // 获取二级类下的所有商品
       $goods = M("goods");
       $res2 = $goods->where("typeid in"."(".implode(",",$arr).")")->select();
       // echo json_encode($res2);
       //dump($res2);
       //die();
       $this->assign('res2', $res2);
       $this->display();

  }
  //-----------------------------------------------------------------

  //搜索功能
  public function search(){

      $gname = I("get.gname");
      $goods = M("goods");
       // $res = $goods->where("gname like '%".$gname."%'")->find();
         // dump($res);

      
     $res = $goods->where("gname = '".$gname."'")->find();
      if($res){

            $this->redirect('goodsdetail/index', array('gid' => $res["gid"]));
            // $this->redirect('product/index', array('typeid' => $res["typeid"]));
      }else{
          $this->error("无此商品",U("index/index"),3);
      }

      $this->display();
  }

  
}
