<?php
namespace Admin\Controller;
use Think\Controller;
class CoupunController extends CommonController {
    //显示首页
    public function index(){
       
       $coupun = M("coupun");
       $res = $coupun->order("addtime desc")->select();
       $this->assign("res",$res);
       
       $this->display();
       }

    //添加优惠券事件
    public function add(){

    	$this->display();
    }
 
 
    //执行优惠券添加
    public function doadd(){
       
       $upload = new \Think\Upload();// 实例化上传类   
       $upload->maxSize   =     3145728 ;// 设置附件上传大小    
       $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
       $upload->rootPath  =      './Public/Uploads/'; // 设置附件上传目录 
       $upload->autoSub  = false;   
       // 上传文件     
       $info   =   $upload->upload();    
       if(!$info) {

       // 上传错误提示错误信息        
          $this->error($upload->getError());    
       }else{

       // 上传成功  
       	  $pic = $info["pic"]['savename'];
          //dump($info);
          //die;
       	  $_POST["pic"] = $pic;
          $_POST["remove_time"] = ((($_POST["remove_time"])*24*3600)+time());
          $_POST["addtime"] = time();
          $coupun = M("coupun");
          $coupun->create();
          $res =  $coupun->add();
          
          if($res){
       	    $this->success("上传成功!",U("coupun/index"),3); 
           }else{
           	$this->error("上传失败!",U("coupun/add"),3);
           }
       }

    }

    //执行优惠券删除
    public function del(){

       $id = I("get.id");
       $coupun = M("coupun");
       $res = $coupun->where("id = ".$id)->delete();
       if($res){
          $this->success("删除成功!",U("coupun/index"),1);
       }else{
          $this->error("删除失败!",U("coupun/index"),1);
       }

    }
    
    //优惠券的修改
    public function mod(){

       $id = I("get.id");
       $coupun = M("coupun");
       $res = $coupun->where("id = ".$id)->find();
       //dump($res);
       $this->assign("coupun",$res);

       $this->display();
    }

    //执行优惠券的修改
    public function domod(){

       $id = I("get.id");
       $coupun = M("coupun");
       $coupun->create();
       $res = $coupun->where("id = ".$id)->save();
       if($res){
          $this->success("修改数据成功!",U("coupun/index"),3);
       }else{
          $this->error("修改数据失败!",U("coupun/mod"),3);
       }
    }
}