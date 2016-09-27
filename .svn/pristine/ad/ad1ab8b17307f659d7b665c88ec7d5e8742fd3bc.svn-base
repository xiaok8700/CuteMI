<?php
namespace Admin\Controller;
use Think\Controller;
class DiscussController extends CommonController {
	//显示评论首页
    public function index(){

       $discuss = M("discuss");
       $res = $discuss -> select();
       $this ->assign("res",$res);
       $this->display();
       }

     //删除评论
     public function del(){

     	$id = I("get.id");
     	$discuss = M("discuss");
        $res = $discuss->where("id = ".$id)->delete();
        if($res){
        	$this->success("删除评论成功!",U("index"),3);
        }else{
        	$this->error("删除评论失败!",U("index"),3);
        }
     }
}