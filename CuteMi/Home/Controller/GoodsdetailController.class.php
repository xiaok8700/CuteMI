<?php
namespace Home\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class GoodsdetailController extends CommonController {

    public function index(){

             $num=0;
          foreach(I("session.shopcar") as $v){
              $num++;
          }
          $this->assign("num",$num);

        //商品表和商品详情表联查,查询所有商品信息
        $goods = M('goods');
        $detail = M('goods_detail');
        $gid = $_GET['gid'];
        // dump($gid);
        $res = $goods->where('mi_goods.gid='.$gid)
                   ->field('mi_goods.*,mi_goods_detail.*')
                   ->join("left join mi_goods_detail on mi_goods.gid = mi_goods_detail.gid")
                   ->find();
        // var_dump($res);
        $res['shell'] = htmlspecialchars_decode($res['shell']);
        $this->assign('goods',$res);
        $this->display();
       }

    //附件的查询
    public function attdetail(){

        //实例化商品表
        $uid = $_SESSION['usename']['uid'];
        $att = M('goods');
        $gid = I('get.gid');
        $good = $att->where('gid='.$gid)->find();
        $color = $good['color'];
        $color = explode(",",$color);
        $this->assign('color',$color);

        // dump($good);
        $this->assign('goods',$good);
        $this->assign('uid',$uid);

        
        $res = M('discuss');
        $b = $res->where('gid='.$gid)->order("id desc")->select();
        $r = M('discuss');
        $count = $r->where('gid='.$gid)->count();
        $this->assign('count',$count);
      
        $this->assign('pl',$b);
       
        
        $result = M('discuss_replay');
        foreach($b as $k=>$v){
        $b[$k]['hhf'] = $result->where('id = '.$v['id'])->select();
     }
        //dump($b);
        $this->assign('hf',$b);
        $this->display();

    }

    //回复插入数据库
    public function insert(){

        $insert = M('discuss_replay');
        $time = date('y-m-d h:i:s',time());
        $data = array(
            'id'=>I('get.pid'),
            'uid'=>I('get.uid'),
            'rep'=>I('get.replay'),
            'addtime' =>$time
            );
        $res = $insert->data($data)->add();
        if($res){
            echo 1;
        }
    }

    







    

}
