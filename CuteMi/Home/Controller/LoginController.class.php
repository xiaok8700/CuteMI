<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends CommonController {
	  //登录页面
    public function index(){

      $this->display();
  }

    public function dologin(){

      $uname = I("post.uname");
      $upwd5 = I("post.upwd");
      $upwd = md5($upwd5);
      $data["uname"] = $uname;
      $data["upwd"] = $upwd;      
      $user = M("user");
      $res = $user->where($data)->find();
        if($res){
           $this->success("登陆成功",U("index/index"),3); 
           $uid = $res["uid"];
           $logintime = $res["logintime"];
           $addtime = $res["addtime"];
           $loginip = $res["loginip"];

           $_SESSION["username"]["islogin"]=true;
           $_SESSION["username"]["uname"]=$res["uname"];
           $_SESSION["username"]["upwd"]=$res["upwd"];
           $_SESSION["username"]["uid"]=$uid;
           $_SESSION["username"]["logintime"]=$logintime;
           $_SESSION["username"]["addtime"]=$addtime;
           $_SESSION["username"]["loginip"]=$loginip;
        }else{
           $this->success("登录失败","index",3);
        }
    }
    
    //注册页面
    public function register(){

    	$this->display();
    }

    //执行注册
    public function doregister(){

    	if(I("post.upwd")!=I("post.repwd")){
        $this->error("两次输入密码不一致!","register");
      }else{
           $verify = new \Think\Verify();  
           if(!$verify->check(I("post.code"))){
             $this->error("验证码错误!","register",3);
           }else{
              $user = M("user");
              $data["uname"] = I("uname");
              $data["upwd"] = md5(I("upwd"));
              $data["logintime"] = time();
              $data["addtime"] = time();
              $data["loginip"] = $_SERVER["REMOTE_ADDR"];
              //dump($data);
              
              $res = $user->data($data)->add();
              if($id=$res){
			  //获取插入用户的自增ID  为user_detail表添加一个默认的数据
				$user_detail = M('user_detail');
				$arr['uid'] = $id;
				//$result2=$user_detail->data($arr)->add();
				$user_detail->data($arr)->add();
			  //if($result2){
                 //$this->success("注册成功!","index",3);
             // }else{
                // $this->error("注册失败!","register",3);
              //}
			  $this->success("注册成功!","index",3);
            }
			}
        }
    }

    //获得验证码
    public function getCode(){
      
    	$Verify = new \Think\Verify();
        $Verify->fontSize = 16;
        $Verify->length   = 4;
        $Verify->imageW   = "130px";
        $Verify->imageH = "40px";
        $Verify->useNoise = false;
        $Verify->useCurve = false;
        ob_clean();
        $Verify->entry();
    }


    //退出
    public function logout(){
        //销毁SESSION;
        $_SESSION["username"]=array();
        $_SESSION["shopcar"]=array();
        setCookie($_COOKIE["username"]['islogin'],null,time(),'/');
        setCookie($_COOKIE["username"]['uname'],null,time(),'/');
        setCookie($_COOKIE["username"]['upwd'],null,time(),'/');
        setCookie($_COOKIE["username"]['uid'],null,time(),'/');
        setCookie($_COOKIE["username"]['logintime'],null,time(),'/');
        setCookie($_COOKIE["username"]['addtime'],null,time(),'/');
        setCookie($_COOKIE["username"]['loginip'],null,time(),'/');
        // session_destroy();
        //跳转会登录页面
        $this->success('退出中......',U('Index/index'),3);
    }
        
}