<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class PayController extends CommonController{
    
    //显示首页
    public function index(){

        $oid = $_GET['oid'];
        $pay = M('order');
        $a = $pay->where('oid='.$oid)->find();
        $address = $a['address'];
        $uid = $_SESSION['username']['uid'];
        foreach($_SESSION['shopcar'] as $k=>$v){
        $data=array(
            'gid' => $v['gid'],
            'gname' => $v['gname'],
            'oid' => $oid,
            'price' => $v['price'],
            'buynum' => $v['buynum'],
            'pic' => $v['pic'],
            'uid' => $uid
          );
        $str.=$v['gname'].',';

        $detail = M('order_detail');
        $count = $detail->data($data)->add();

        };
        if($count){
            $str1 = rtrim($str,',');
            $arr = explode(',',$str1);
            $this->assign('gname',$arr);
            $this->assign('or',$a);
        }
        $this->display();
    }

    public function bank(){

        $oid = I("post.oid");
        //将订单号送入页面中
        $this->assign("oid",$oid);
        $this->display();
    }
   

    public function pay(){

        $oid = I("post.oid");//获取订单的oid
        $account = I("post.account");//获取银行卡号
        $bank = M("user_bank");  
        //开启事务
        $bank->startTrans();
        $id = $_SESSION["coupun_id"];//获取优惠券的id
        $res = $bank->find();
        if($res["account"]==$account){
        	$money =  $_SESSION["money"];
        	$count = $res["count"] - $money;
        	if($count<0){
        		//余额不足
        		echo 1;
        	}else{
               //执行扣款操作
                $a = array("count"=>$count, );
        		    $res = $bank->where("uid = 0")->data($a)->save();
                //付款为成功
                if(!$res){
                    //事务回滚
                    $bank->rollback();
                }else{
                    //修改优惠券状态   
    		        $coupun_detail = M("coupun_detail");
                    $data = array('status' =>1,);
    		        $coupun_detail->where("id=".$id)->data($data)->save();

                    //改变订单的状态
    		        $order = M("order");
                    $b = array("orderstatus"=>"2");
                    $order->where("oid = ".$oid)->data($b)->save();

                    //改变购物车中的相应商品状态
                    $order_detail = M("order_detail");
                    $result = $order_detail->where("oid = ".$oid)->select();
                    foreach($result as $v){
                    	if(array_key_exists($v["gid"],$_SESSION["shopcar"])){
                        		$_SESSION["shopcar"][$v["gid"]] = array();
                                unset($_SESSION["shopcar"][$v["gid"]]);
                    	}
                    }     
                echo 2;//付款成功
                //提交事务
                $bank->commit();
        	   }
            }
        }else{
        	//银行卡号错误
        	echo 3;
        }
    }
}
    
