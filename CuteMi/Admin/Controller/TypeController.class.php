<?php
namespace Admin\Controller;
use Think\Controller;
header("content-type:text/html;charset=utf-8");
class TypeController extends CommonController {

    //显示首页
    public function index(){
      //显示分类信息
      $type = M("type");
      //分页显示
      //计算总数据条数'
      $total =  $type->count();
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

      $res = $type->field("typeid,pid,tname,path,concat(path,typeid) as newpath")->order('newpath')->page($no,10)->select();
      $this->assign("type",$res);
      $this->display();
    }
 
     public function add(){
        //通过超连接过去的
        if(I("get.typeid")){
            $typeid = I("get.typeid");
            $type = M("type");
            $res = $type->where("typeid=".$typeid)->find();
            $this->assign("pname",$res["tname"]); 
            $this->assign("typeid",$res["typeid"]);
        //直接访问时         
        }else{
             $this->assign("pname","顶级");
        }
         $this->display();
    }

    public function doadd(){
      
        $type = M("type");
        //判断路径来源  
        if(I("post.typeid")){
          //从链接过来的
          $typeid = I("post.typeid");//父id
          $tname = I("post.tname");
          //拼装path字段(父path,父id);
          $result = $type->where("typeid=".$typeid)->find();
          $parentPath = $result["path"];
          $path = $parentPath.$typeid.",";
           
          //定义数据数组
          $res = $type->field("concat(path,typeid) as newpath")->where("typeid=".$typeid)->order('newpath')->find();
          $num = substr_count($res['newpath'],',');
          
          $data["tname"] = str_repeat("----",$num).$tname;
          $data["pid"] = $typeid;
          $data["path"] = $path;
          //dump($data);
          $res = $type->data($data)->add();
        }else{
            //直接添加的
            $type->create();
        	$res = $type->add();
             }
      
      //判断结果   
        if($res){
            $this->success("分类添加成功","index",3);
        }else{
            $this->error("分类添加失败","index",3);
        }

        }

     
        public function mod(){

            $typeid = I("get.typeid");
            $type = M("type");
            $res = $type->where("typeid=".$typeid)->find();
            $tname = $res["tname"];
            $newtname = trim($tname,"-");
            
            //定义数据数组
            $data["tname"] = $newtname;
            $data["typeid"] = $res["typeid"];
            $data["tname"] = $newtname;
            
            $this->assign("data",$data);
            $this->display();
        }

        public function domod(){
           
           $typeid = I("post.typeid");
           $tname = I("post.tname");
           $type = M("type");
        
           $res = $type->field("path,pid")->where("typeid=".$typeid)->order('path')->find();
           // dump($res);
            if($res["pid"]==0){
                //当修改一级分类时候
               $data["tname"]=$tname;
               $result = $type->where("typeid=".$typeid)->save($data); 
            }else{
               //当修改二级分类时候
               $num = substr_count($res['path'],',')-1;  
               //dump($num);         
               $data["tname"] = str_repeat("----",$num).$tname;
                        
               $type = M("type");
               $result = $type->where("typeid=".$typeid)->save($data);
         }
            //判断结果
            if($result){
                $this->success("信息修改成功","index",3);
            }else{
                $this->error("信息修改失败","index",3);
            }
        }

    public function del(){

         $type = M("type");
         $typeid = I("get.typeid");
         //取出所有的pid 
         $res = $type->field("pid")->select();
         foreach($res as $v){
            $pid[] = $v["pid"];
         }

         //判断是否为终极类
         if(in_array($typeid,$pid)){
            $this->error("对不起,该类下还有子类,不能删除",U("index"),3);
         }else{     
          $res = $type->where("typeid=".$typeid)->delete();

          if($res){
            $this->success("删除成功",U("index"),3);
          }else{
            $this->error("删除成功",U("index"),3);
          }
      }
    }


}