<?php

namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class SpaceController extends CommonController {

    public function index(){  
     
         $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);
            
       
      //计算收藏商品数量
      $collect = M("collect");
      $uid = $_SESSION["username"]["uid"];
      $num = $collect->where("state = '0' and uid = ".$uid)->count();
      $this->assign("num",$num);
      
      //计算未支付订单的数量
      $nobuy = M('order');
      $uid = $_SESSION['username']['uid'];
      $res = $nobuy->where('uid='.$uid.' and orderstatus = 1')->count();
      $this->assign('nobuy',$res);

      //待收货的订单
      $buy = M('order');
      $res1 = $buy->where('uid='.$uid.' and orderstatus = 3')->count();
      $this->assign('no',$res1);

      //待收货的订单
      $nogot = M('order_detail');
      $res2 = $nogot->where('uid='.$uid.' and eval_status = 0')->count(); 
      $this->assign('p',$res2);

      $this->display();
    }
    
    
    
    public function dopass(){

        //修改密码
        $user = D('user');
        $data['uid'] = $_SESSION['username']['uid'];
        $data['upwd'] = md5(I('post.oldpassword'));
        $uid['uid'] = $_SESSION['username']['uid'];
        $add['upwd'] = md5(I('post.password'));
        //dump($add);
        //dump($data);
        $res = $user->where($data)->find();
        //dump($res);die();
        if(!$res){
            $this->error('原密码输入错误！');
        }else{
           if(!$_POST['password']){
               $this->error("密码不能为空！");
           }else if($_POST['password'] != $_POST['password2']){
               $this->error("两次密码输入不一致！");
           } else{
               $update = $user->where($uid)->data($add)->save();
                 if($update){
                    $this->success("密码修改成功！",U("dpasswd"));
                }else{
                    $this->error("密码修改失败！");
            }
           }
           
        }
    }

    //退出
    public function layout(){

      unset($_SESSION['user']);
      $this->success("exit",U("Space/index"));
    }

//////////////////////////////////用户收货地址部分////////////////    
    
    //显示所有地址
    public function address(){

           $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);
      
        $user = M('address');
        $uid = $_SESSION['username']['uid'];
        $data = $user->where('uid='.$uid)->select();
        $this->assign('data1',$data); 
        $this->display("address");
    }
    
    public function mod(){

               $num=0;
          foreach(I("session.shopcar") as $v){
              $num++;
          }
          $this->assign("num",$num);
        
         $id = $_GET['id'];
         $up = M('address');
         $res = $up->where('id='.$id)->find();
         // dump($res);
         $this->assign('data2',$res);
         $this->display();
    }

    //修改地址并保存
    public function change(){

      $id = $_POST['id'];
      $ress = M('district');
        foreach ($_POST['is_district'] as $v) {
            $row = $ress->find($v);
            $str2[] = $row['name'];
        }
      // $do = M('address');
      $_POST['uid'] = $_SESSION['username']['uid'];
      
      $_POST['is_district'] = implode(' ', $str2);

      $res = M('address');
      $res->create();
      // dump($_POST);
      $list = $res->where('id='.$id)->save();
      $list ? $this->ajaxReturn($list) : $this->ajaxReturn(0);
      if($a){
        $this->success('修改成功'); 
       }else{
        $this->error('修改失败');
       }
    }

    //删除多余地址
    public function del(){
        
      $user = M("address");
      $id = $_POST['id'];
      $res = $user->where('id='.$id)->delete();
      if($res){
              echo 1;
          }else{
              $this->error("修改失败！");
          }
    }

    //将新地址插入数据库
    public function insert(){

      $res = M('district');
        foreach ($_POST['is_district'] as $v) {
            $row = $res->find($v);
            $str2[] = $row['name'];
        }
      $do = M('address');
      $_POST['uid'] = $_SESSION['username']['uid'];
      
      $_POST['is_district'] = implode(' ', $str2);
      // dump($_POST);
      
      $do->create();
      $list = $do->add();
      $list ? $this->ajaxReturn($list) : $this->ajaxReturn(0);

    }


///////////////////////////////////////订单部分开始//////////////////////
    public function allbook(){

           $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);

       $model = M('order');
       $uid = $_SESSION['username']['uid'];
       //分页显示
       //计算总数据条数'
       $total =  $model->where('uid='.$uid)->count();
       $this->assign("total",$total);
       // 计算总页数
       $maxpage = ceil($total/2);
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
       $res = $model->where('uid='.$uid)->page($no,2)->select();
       // dump($res);
       $this->assign('res',$res);
       $this->display();
    }

    //未支付状态订单
    public function nobuy(){

           $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);
      
        $model = M('order');
        $uid = $_SESSION['username']['uid'];
        //分页显示
        //计算总数据条数'
        $total =  $model->where('uid='.$uid)->count();
        $this->assign("total",$total);
        // 计算总页数
        $maxpage = ceil($total/2);
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
        $res=$model->where('uid='.$uid.' and orderstatus = 1')->page($no,2)->select();
        // dump($res);
        $this->assign('res',$res);

        $this->display();   
    }

    //已支付状态订单
    public function buy(){

           $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);
     
        $model = M('order');
        $uid = $_SESSION['username']['uid'];
        //分页显示
        //计算总数据条数'
        $total =  $model->where('uid='.$uid)->count();
        $this->assign("total",$total);
        // 计算总页数
        $maxpage = ceil($total/2);
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
        $res = $model->where('uid='.$uid.' and orderstatus = 2')->page($no,2)->select();
        // dump($res);
        $this->assign('res',$res);

        $this->display(); 
    }

    //未收货状态订单
    public function nogot(){

           $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);
      
        $model = M('order');
        $uid = $_SESSION['username']['uid'];
        //分页显示
        //计算总数据条数'
        $total =  $model->where('uid='.$uid)->count();
        $this->assign("total",$total);
        // 计算总页数
        $maxpage = ceil($total/2);
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
        $res=$model->where('uid='.$uid.' and orderstatus = 3')->page($no,2)->select();
        // dump($res);
        $this->assign('res',$res);

        $this->display();   
    }

    //未支付状态订单
    public function got(){

         $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);
     
       $model=M('order');
       $uid=$_SESSION['username']['uid'];
       //分页显示
       //计算总数据条数'
       $total =  $model->where('uid='.$uid)->count();
       $this->assign("total",$total);
       // 计算总页数
       $maxpage = ceil($total/2);
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
       $res = $model->where('uid='.$uid.' and orderstatus = 4')->page($no,2)->select();
       // dump($res);
       $this->assign('res',$res);
       $this->display();   
    }

    public function detail(){

       $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);

      $oid = $_GET['oid'];
      $order = M('order');
      $data = $order->where('oid='.$oid)->find();
      // echo $oid;
      $this->assign('data',$data);
      $model = M('order_detail');
      $res = $model->where('oid='.$oid)->select();
      // dump($res);
      $this->assign('detail',$res);
      $this->display();
    }

    //订单搜索
    public function search(){

      $uid = $_SESSION['username']['uid'];
      $key = $_POST['keywords'];
      $search = M('order');
      $value = $search->where("oid=".$key." and uid=".$uid)->select();      
      if(!$value){
         $this->error('无查询结果',U('allbook'));
      
      }else{
         $this->assign('res',$value);
         $this->display('search');
      }
    }
//////////////////////////////////商品晒单/////////////////

   //已经评价的商品
    public function dis(){

       $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);

      $dis = M('order_detail');
      $uid = $_SESSION['username']['uid'];
      // dump($uid);
      $res = $dis->where('uid='.$uid.' and eval_status = 1')->select();
      // dump($res);
      $this->assign('dis',$res);
      $this->display();
    }

    //未评价的商品
    public function udis(){

       $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);

      $dis = M('order_detail');
      $uid = $_SESSION['username']['uid'];
      // dump($uid);
      $res = $dis->where('uid='.$uid.' and eval_status = 0')->select();
      // dump($res);
      $this->assign('udis',$res);
      $this->display();
    }

    //去评价商品
    public function pj(){

      $discuss = M('discuss');
      $_POST['uid'] = $_SESSION['username']['uid'];
      $uid = $_POST['uid'];
      $_POST['uname'] = $_SESSION['username']['uname'];
      $time = date('y-m-d H:i:s',time());
      // dump($_POST);
      $_POST['addtime'] = $time;
      $discuss->create();
      $res = $discuss->add();
      if($res){
        $detail = M('order_detail');
        $gid = $_POST['gid'];
        $data = array(
          'eval_status' => 1,
          );
        $a = $detail->where('gid='.$gid)->data($data)->save();
        if($a){
          $gid = $_POST['gid'];
          $goods = M('goods');
          
          $goo = $goods->where('gid='.$gid)->find();
        
          $price = ceil($goo['price']/100);
          // echo $c;
          $int = M('integral');
          $before = $int->where('uid='.$uid)->find();

          if($before){
            $num = $before['num']+$price;
            $data = array(
            'num' => $num,
            );
          $int2 = M('integral');
          $b = $int2->where('uid='.$uid)->data($data)->save();
          if($b){
            echo 1;
          }else{
            echo 0;
          }

          }else{
            $data = array(
              'num' => $price,
              'uid' =>$uid,

              );
            $int2 = M('integral');
            $c = $int2->data($data)->add();
            if($c){
              echo 1;
            }else{
              echo 0;
            }
           }
       }
      }
  }

    //评论详情页面
    public function discuss(){

       $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);

      $gid = $_GET['gid'];
      $uid = $_SESSION['username']['uid'];
      $discuss = M('discuss');
      $good = M('goods');
      $goods = $good->where('gid='.$gid)->find();
      $this->assign('goo',$goods); 
      $res = $discuss->where('uid='.$uid.' and gid ='.$gid)->select();
      // dump($res);
      $this->assign('res',$res);
      $this->display();

    }

 ////////////////////////////////////////收藏开始///////////////////////   
   
    //收藏
    public function collect(){

         $num=0;
      foreach(I("session.shopcar") as $v){
          $num++;
      }
      $this->assign("num",$num);

       $uid = $_SESSION["username"]["uid"];
       $collect = M("collect");
       $res = $collect->where("state = '0' and uid = ".$uid)->select();
       $this->assign("res",$res);
       $this->display();

    }

    //取消收藏
    public function cancel(){

       $cid = I("get.cid");
       $collect = M("collect");
       $data["state"] = "1";
       $collect->where("cid = ".$cid)->data($data)->save();

       // 获取gid
       $res = $collect->where("cid = ".$cid)->find();
       $gid = $res["gid"];
       //同时改变session中标识
       $_SESSION["collect"][$gid]["iscollect"]=false;

    }

/////////////////////////////////////////////收藏结束/////////////
   
    //现金账户
    public function yen(){

           $num=0;
        foreach(I("session.shopcar") as $v){
            $num++;
        }
        $this->assign("num",$num);
        
        $res = M('user_bank')->where("uid='{$_SESSION['username']['uname']}'");
        $res ? $this->assign('res',$res) : $this->assign('res','您的账户还没有，请充值');
        $this->display();
    }
	
    //充值
    public function recharge(){

        $where['uid'] = $_SESSION['username']['uname'];
        $res = M('user_bank')->where($where)->getField('count');
       // dump($res);die();
        $data['count'] = 10000 + $res;
        M('user_bank')->where($where)->data($data)->save();
        $this->success('充值成功！','yen');
    }

    
   
    
}