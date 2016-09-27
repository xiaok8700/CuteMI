<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class AttachController extends CommonController {
    public function index(){
        $goods=M('goods');
        //分页显示
        //计算总数据条数'
       $total =  $goods->where('status = 0')->count();
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



        $result=$goods->where('status=0')->page($no,10)->select();
        $this->assign('good',$result);
        // dump($result);
       $this->display();
       }

    public function add(){
    	$type=M('attach_type');
        $arr = $type->field("attid,pid,attname,path,concat(path,attid) as newpath")->order('newpath')->select();
        // dump($arr);
        // die;
    	$this->assign('type',$arr);
        $this->display();
    }
    
    //商品的插入
    public function insert(){

            $upload = new \Think\Upload();// 实例化上传类  
            $upload->maxSize   =  2*1024*1024 ;// 设置附件上传大小  
            $upload->exts      =  array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
            $upload->rootPath  =  './Public/Uploads/'; // 设置附件上传目录  
            //声明命名规范
            // $upload->saveName = '';
            $upload->autoSub  =false;
              // 上传文件   
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

               
               $goods=M('goods');
            
        //联表应用要加relation(true)插入数据库图片名字要从图片上传成功是遍历使用
         $type=M('attach_type');
         $name=I('post.attname');
         $a=$type->where("attname='".$name."'")->getField('attid');
         $showtime=date("Y-m-d H:i:s");

         $data=I('post.');
         $data1=array(
            'addtime'=> $showtime,
            'pic' => $pic,
            'pic1' => $pic1,
            'pic2' => $pic2,
            'pic3' => $pic3,
            'typeid' => $a,
            'status' => 0,
            'gname' =>$data['gname'],
            'price' => $data['price'],
            'color' => $data['color'],
            'store' => $data['store']
            );
         // $data['addtime']=$showtime;
         // $data['pic']=$pic;
         // $data['typeid']=$a;
         // $data['status']=0;
         // dump($data);
        $result=$goods->data($data1)->add();
        // dump($result);  
        // dump(I('get.'));      
                
      
        if($a=$result){
            $this->success('添加成功','index');
        }else{
            $this->error('添加失败','add');
        }
         $this->display();

     }

    //商品的删除
    public function delete(){
        $del=M('goods');
        $gid=I('get.gid');
        // echo 'confirm(您确定删除吗?)';
       $result=$del->where('gid='.$gid)->delete();
       if($result){
            $this->success('删除成功',U('index'));
       }else{
            $this->error('删除失败','index');

       }
    }
    //商品的修改页面
    public function mod(){
        $mod=M('goods');
        $id=I('get.gid');
        $goo=$mod->where('status = 0 and gid='.$id)->find();
        $this->assign('goods',$goo);
        $mod1=M('type');
        $this->display();
    }

    //对商品修改插入数据库
    public function change(){
        $change=M('goods');
        $data=I('post.');
         // dump($data);
        // $data1=array(
        //     'price' => $data['price'],
        //     'store' => $data['store']
        //     );
        // dump($data['gid']);
        
        $a=$change->where('gid='.I('get.gid'))->data($data)->save();
        if($a){
            $this->success('修改成功','index');
        }else{
            $this->error('修改失败','mod');
        }
        $this->display('index');
    }

    //展示商品详情
    public function detail(){

        $detail=M('goods');
        // $arr=(
        //     'status'=0,
        //     'gid' =I('get.gid')
        //     );
        $result=$detail->where('status=0 and gid="'.I('get.gid').'"')->find();
         // dump($result);
        $this->assign('res',$result);
        $this->display();

    }
    //修改商品详情
    public function moddetail(){
        $model=M('goods_detail');
        $model1=$model->where('gid='.I("get.gid"))->find();
         // dump($model1);
        $this->assign('mod',$model1);

        $this->display();
    }

    //修改详情处理
    public function changedetail(){
        $change=M('goods_detail');
        dump(I('post.'));
        // $change->create();
        $da=I('post.');
        $data1=array(
            'screen' => $da['screen'],
            'battery' => $da['battery'],
            'system' => $da['system'],
            'shell' => $da['shell']

            );
        $data=$change->where('gid='.I('post.gid'))->field('screen,battery,system,shell')->save($data1);
        dump($data);
        if($data){
            $this->success('修改成功','detail');
        }else{
            $this->error('修改失败','moddetail');
        }

    } 


}