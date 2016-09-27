<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends CommonController {

 	//显示首页
	public function index(){
        //查询所有用户 
       $user = M("Admin_user");    
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
       $res = $user->field("ad_id,ad_name,ad_pwd,ad_ur,ad_logintime,ad_num,ad_loginip,concat(ad_id) as newpath")->order('newpath')->page($no,10)->select();
       $this->assign("admin_user",$res);
       $this->display();
    }

    //添加用户页面
	public function add(){
		$this->display();
	}
	
	//添加用户数据操作
	public function insert(){
		//验证两次密码是否一致
		if(I('post.ad_pwd')==I('post.ad_reupwd')){
			//将获取的用户表单中的数据插入数据库
			//实例化Model类
			$user=M('Admin_user');
			//创建对象
			//$user->create();
			$data["ad_name"] = I("post.ad_name");
			$data["ad_pwd"] = md5(I("post.ad_pwd"));
			$data["ad_logintime"] = date("Y-m-d H:i:s");
			$dats["ad_num"] = I("post.ad_num+1");
			$data["ad_loginip"] = $_SERVER['REMOTE_ADDR'];
			$data["ad_ur"] = I("post.ad_ur");
			if($user->data($data)->add()){
				//添加成功，跳转到用户列表
				$this->success('添加用户成功！','index');
			}else{
					//添加失败//跳转回注册页面即可	
				$this->error('添加用户失败！','add');	
				}
			}else{
			//跳转回注册页面即可	
				$this->error('两次密码不一致，请重新注册','add');
		}
	}  

	//search方法 查找用户
	public function search(){
		$this->display();
	}

	//修改用户页面
	public function mod(){
		//接受用户ID
		$ad_id = I('get.ad_id');
		//查询用户原有信息
		$user = M('Admin_user');
		$info = $user->where('ad_id="'.$ad_id.'" OR ad_name="'.$ad_id.'"')->find();
		
		//分配到模板中
		$this->assign('user',$info);
		$this->display();
	}

	//修改用户数据操作
	public function update(){
		$user = M('Admin_user');
		//接受有用户信息 过滤非法信息
		$user->create();
		
		//进行修改操作
		$result = $user->save();
		if($result){
			$this->success('修改用户信息成功',U('Admin/mod','ad_id='.I('post.ad_id')));
			
		}else{
			$this->error('修改用户信息失败，请重新修改',U('Admin/mod','ad_id='.I('post.ad_id')));
		}
		
	}
	
	//删除用户操作
	public function delete(){
		
		//接受用户传入的ID进行删除操作
		$user = M('Admin_user');
		
		$result = $user->delete(I('get.ad_id'));
		
		if($result){
			//删除成功
			$this->success('删除成功',U('Admin/index'),3);
		}else{
			//删除失败
			$this->error('删除失败',U('Admin/index'));
		}
	}
}