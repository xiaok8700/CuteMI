<?php
namespace Admin\Controller;
use Think\Controller;
header('content-type:text/html;charset=utf-8');
class EventController extends CommonController {
    public function index(){

        $event = M('event');
        $res = $event->select();
        $this->assign('event',$res);

        $this->display();
       }

    public function add(){
        
        $this->display();
    }
    
    //图片的插入
    public function insert(){
        
      $upload = new \Think\Upload();
      $upload->maxSize = 1400000;//图片的大小
      $upload->exts = array("jpg","jpeg","png","gif");//图片的大小
      $upload->rootPath = "./Public/Events/";//上传路径
      $upload->autoSub = false;
      $info=$upload->upload();
      if(!$info){
            $this->error($upload->getError());
        }else{
            foreach($info as $file){
               $pic = $file['savepath'].$file['savename'];
            }
              
          }
          $post = I('post.');
          // dump($post);
          // die;
          $post['pic'] = $pic;
           $mod = M("event");
           $res = $mod->data($post)->add();
          //执行添加
           if($res){
              $this->success("添加成功",U("event/index"));
           }else{
              $this->error("添加失败");
          }             
    }

    //图片删除操作
    public function delete(){
      $delete = M('event');

      // $res=$delete->where('status=0 and eid='.I('get.eid'))->delete();
      $res = $delete->where('eid='.I('get.eid'))->find();
      if($res['status']=='0'){
           $this->error('图片正在使用，不允许删除',U('Event/index'));
      }else{
          $delete->where('eid='.I('get.eid'))->delete();
          $this->success('您删除成功',U('Event/index'));
      }
    }

    //图片的编辑
    public function edit(){
      $edit = M('event');
      $res = $edit->where('eid='.I('get.eid'))->find();
      // dump($res);
      // die;
      $this->assign('row',$res);
      $this->display('edit') ;

    } 

    public function update(){
     // $update=M('event');
      $update = M('event');  
      $res = $update->where("status='0'")->count();
     
      if($res >=4 && I('post.status') =='0'){
        $this->error('不允许修改为使用状态，请先撤销部分');

      }
      $update->create();
      $res = $update->where('eid='.I('post.eid'))->save();

      if(!$res){
         $this->error('修改失败',U('Event/edit'));
       
      }else{

         $this->success('修改成功',U('Event/index'));
      }
      $this->display();

    }
  } 







