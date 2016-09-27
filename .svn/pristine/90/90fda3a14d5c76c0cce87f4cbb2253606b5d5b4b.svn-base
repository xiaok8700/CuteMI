<?php
namespace Admin\Controller;
use Think\Controller;
class IntegralController extends CommonController {
    //显示首页
    public function index(){

        $user = M('user');
        $res = $user->join('left join mi_integral on mi_user.uid = mi_integral.uid')
                    ->join('left join mi_user_detail on mi_user.uid = mi_user_detail.uid')
                    ->select();
        $this->assign('res',$res);
      
       $this->display();
       }

       public function detail(){
        $this->display();
       }

   
}