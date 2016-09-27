<?php
namespace Admin\Controller;
use Think\Controller;
header("content-attach_type:text/html;charset=utf-8");
class attachtypeController extends CommonController {

    //显示首页
    public function index(){

      //显示分类信息
      $attach_type = M("attach_type");    
      //分页显示
      //计算总数据条数'
      $total =  $attach_type->count();
      $this->assign("total",$total);
      // 计算总页数
      $maxpage = ceil($total/10);
      $this->assign("maxpage",$maxpage);
      //计算当前页
      $no = I("get.no")?I("get.no"):1;
       //检测当前页
       if($no<1){
          $no = 1;
       }
       if($no > $maxpage){
         $no = $maxpage;
       }
       $this->assign("no",$no);
        $res = $attach_type->field("attid,pid,attname,path,concat(path,attid) as newpath")->order('newpath')->page($no,10)->select();
        $this->assign("attach_type",$res);
        $this->display();
    }

     public function add(){
            //通过超连接过去的
            if(I("get.attid")){
                $attid = I("get.attid");
                $attach_type = M("attach_type");
                $res = $attach_type->where("attid=".$attid)->find();
                $this->assign("pname",$res["attname"]); 
                $this->assign("attid",$res["attid"]);
            //直接访问时         
            }else{
                 $this->assign("pname","顶级");
            }
             $this->display();
    }

    public function doadd(){
      
        $attach_type = M("attach_type");
        //判断路径来源  
        if(I("post.attid")){
          //从链接过来的
           $attid = I("post.attid");//父id
           $attname = I("post.attname");
         //拼装path字段(父path,父id);
           $result = $attach_type->where("attid=".$attid)->find();
           $parentPath = $result["path"];
           $path = $parentPath.$attid.",";
           
         //定义数据数组
           $res = $attach_type->field("concat(path,attid) as newpath")->where("attid=".$attid)->order('newpath')->find();
           $num = substr_count($res['newpath'],',');
           
           $data["attname"] = str_repeat("----",$num).$attname;
           $data["pid"] = $attid;
           $data["path"] = $path;
            //dump($data);
           $res = $attach_type->data($data)->add();
        }else{
            //直接添加的
            $attach_type->create();
        	$res = $attach_type->add();
             }
      
      //判断结果   
        if($res){
            $this->success("分类添加成功","index",3);
        }else{
            $this->error("分类添加失败","index",3);
        }

        }

     
        public function mod(){

          $attid = I("get.attid");
          $attach_type = M("attach_type");
          $res = $attach_type->where("attid=".$attid)->find();
          $attname = $res["attname"];
          $newattname = trim($attname,"-");
          
          //定义数据数组
          $data["attname"] = $newattname;
          $data["attid"] = $res["attid"];
          $data["attname"] = $newattname;
          
          $this->assign("data",$data);
          $this->display();
        }

        public function domod(){
           
           $attid = I("post.attid");
           $attname = I("post.attname");
           $attach_type = M("attach_type");
        
           $res = $attach_type->field("path,pid")->where("attid=".$attid)->order('path')->find();
           // dump($res);
            if($res["pid"]==0){
                //当修改一级分类时候
               $data["attname"] = $attname;
               $result = $attach_type->where("attid=".$attid)->save($data); 
            }else{
               //当修改二级分类时候
               $num = substr_count($res['path'],',')-1;  
               //dump($num);         
               $data["attname"] = str_repeat("----",$num).$attname;
                        
               $attach_type = M("attach_type");
               $result = $attach_type->where("attid=".$attid)->save($data);
         }
            //判断结果
            if($result){
                $this->success("信息修改成功","index",3);
            }else{
                $this->error("信息修改失败","index",3);
            }
        }

    public function del(){

         $attach_type = M("attach_type");
         $attid = I("get.attid");
         //取出所有的pid 
         $res = $attach_type->field("pid")->select();
         foreach($res as $v){
            $pid[] = $v["pid"];
         }

         //判断是否为终极类
         if(in_array($attid,$pid)){
            $this->error("对不起,该类下还有子类,不能删除",U("index"),3);
         }else{     
          $res = $attach_type->where("attid=".$attid)->delete();

          if($res){
            $this->success("删除成功",U("index"),3);
          }else{
            $this->error("删除成功",U("index"),3);
          }
      }
    }


}