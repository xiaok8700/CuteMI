<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class GoodsController extends CommonController {
    public function index(){
   
       $goods = M('goods');
        //分页显示
        //计算总数据条数'
       $total =  $goods->where('status=1')->count();
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
       $result = $goods->where('status=1')->page($no,10)->select();
        // dump($result);
        // die;
       $this->assign('good',$result);
         // dump($result);
       $this->display();
       }

    public function add(){

    	$type = M('type');
        $arr = $type->field("typeid,pid,tname,path,concat(path,typeid) as newpath")->order('newpath')->select();
        // dump($arr);
        
    	$this->assign('type',$arr);
        $this->display();
    }

    // public function add()
    // {
    //   foreach($_POST['a'] as $v){
    //       $this->insert();
    //   }
    // }
    
    //商品的插入
    public function insert(){

        // var_dump($_FILES);


        $upload = new \Think\Upload();// 实例化上传类  
        $upload->maxSize   =  8*1024*1024 ;// 设置附件上传大小  
        $upload->exts      =  array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
        $upload->autoSub  =false;
        $upload->rootPath  =  './Public/Uploads/'; // 设置附件上传目录  
        $info   =   $upload->upload();
         // dump($info);
        // die;
        
        if(!$info) {// 上传错误提示错误信息  

                  $this->error($upload->getError()); 

              }else{// 上传成功 获取上传文件信息  

                 foreach($info as $file){  

                     $picture[] = $file["savename"];

               }
                // dump($picture);
               $pic = $picture[0];
               $pic1 = $picture[1];
               $pic2 =$picture[2];
               $pic3 = $picture[3];
            }

           //自定义了goods类设置联表关系
            $type = D('type');
            $name = I('post.tname');
            $a = $type->where("tname='".$name."'")->getField('typeid');

            $p = I('post.');
            // dump($p);
            // die;
            $showtime = date("Y-m-d H:i:s");
            $goods = D('goods');
            $data = array(
                'typeid' => $a,
                'gname' => $p['gname'],  
                'price' => $p['price'],
                'storage' => $p['storage'],
                'verson' => $p['verson'],
                'color' => $p['color'],
                'store' => $p['store'],
                'addtime' => $showtime ,
                'keywords' => $p['keywords'],
                'pic' => $pic,              
                'pic1' => $pic1,
                'pic2' => $pic2,
                'pic3' => $pic3,
                'goods_detail' => array(
                'screen' => '白色'
                    )

            );


        //联表应用要加relation(true)插入数据库图片名字要从图片上传成功是遍历使用         
        $result = $goods->relation(true)->data($data)->add();         
        if($result){
            $this->success('添加成功','index');
        }else{
            $this->error('添加失败','add');
        }
         // $this->display();

     }

    //商品的删除
    public function delete(){

       $del = M('goods');
       $gid = I('get.gid');
       $result = $del->where('gid='.$gid)->delete();
       if($result){
            $detail = M('goods_detail');
            $res = $detail->where('gid='.$gid)->delete();
            if($res){
            $this->success('删除成功',U('index'));
            }
       }else{
            $this->error('删除失败','index');

       }
    }
    //商品的修改页面
    public function mod(){

        $mod = M('goods');
        $id = I('get.gid');
        $goo = $mod->where('gid='.$id)->find();
        $this->assign('goods',$goo);
        $mod1 = M('type');
        $this->display();
    }

    //对商品修改插入数据库
    public function change(){

        $change = M('goods');
        $data = I('post.');
         // dump($data);
        $data1 = array(
            'price' => $data['price'],
            'store' => $data['store']
            );
        // dump($data['gid']);
        $a = $change->where("gname='".$data["gname"]."'")->field('price,store')->data($data1)->save();
        if($a){
            $this->success('修改成功','index');
        }else{
            $this->error('修改失败','mod');
        }
        $this->display('index');
    }

    //展示商品详情
    public function detail(){

        $detail = M('goods_detail');
         //分页显示
         //计算总数据条数'
        $total =  $detail->count();
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
        $result1 = $detail->page($no,10)->select();
         // dump($result);
         // die;
        $this->assign('res',$result1);
        $this->display();

    }
    //修改商品详情
    public function moddetail(){
        // dump(I('get.gid'));
        // die;
        $model = M('goods_detail');
        $model1 = $model->where('gid='.I("get.gid"))->find();
         // dump($model1);
        $this->assign('mod',$model1);

        $this->display();
    }

    //修改详情处理
    public function changedetail(){

        $change = M('goods_detail');
        // dump(I('post.'));
        // $change->create();
        $da = I('post.');
        $data1 = array(
            // 'storage' => $da['storage'],
            'screen' => $da['screen'],
            'battery' => $da['battery'],
            'system' => $da['system'],
            'shell' => $da['shell']

            );
        $data = $change->where('gid='.I('post.gid'))->field('screen,battery,system,shell')->save($data1);
        //dump($data);
        //die;
        if($data){
            $this->success('修改成功','detail');
        }else{
            $this->error('修改失败','moddetail');
        }

    } 


}
