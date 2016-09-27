<?php
namespace Admin\Controller;
use Think\Controller;
class FlinkController extends CommonController {

	//显示首页
   public function index(){

        //显示分类信息
       $user = M("Flink");    
        //分页显示
        //计算总数据条数'
       $total =  $user->count();
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
        $res = $user->field("fid,name,href,status,concat(fid) as newpath")->order('newpath')->page($no,10)->select();
        $this->assign("flink",$res);
        $this->display();
    }

     //添加友链页面
	public function add(){
		$this->display();
	}

	//添加友链数据操作
	public function insert(){
		//将获取的友链表单中的数据插入数据库
		//实例化Model类
		$user=M('Flink');
		//创建对象
		//$user->create();
		$data["name"] = I("post.name");
		$data["href"] = I("post.href");
		$data["status"] = I("post.status");
		//dump($data);
		if($user->data($data)->add()){
			//添加成功，跳转到友链列表
			$this->success('添加友链成功！','index');
		}else{
				//添加失败//跳转回注册页面即可	
			$this->error('添加友链失败！','add');	
			}
		}

	//修改友链页面
	public function mod(){
		//接受友链ID
		$fid = I('get.fid');
		//查询友链原有信息
		$user = M('Flink');
		$info = $user->where('fid="'.$fid.'" OR name="'.$fid.'" OR href="'.$fid.'" OR status="'.$fid.'"')->find();
		
		//分配到模板中
		$this->assign('user',$info);
		$this->display();
	}

	//修改友链数据操作
	public function update(){
		$user = M('Flink');
		//接受有友链信息 过滤非法信息
		$user->create();
		
		//进行修改操作
		$result = $user->save();
		if($result){
			$this->success('修改友链信息成功',U('Flink/mod','fid='.I('post.fid')));
			
		}else{
			$this->error('修改友链信息失败，请重新修改',U('Flink/mod','fid='.I('post.fid')));
		}
		
	}

	//删除友链操作
	public function delete(){
		
		//接受友链传入的ID进行删除操作
		$user = M('Flink');
		
		$result = $user->delete(I('get.fid'));
		
		if($result){
			//删除成功
			$this->success('删除成功',U('Flink/index'),3);
		}else{
			//删除失败
			$this->error('删除失败',U('Flink/index'));
		}	
	}
}	  