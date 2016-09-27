<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel{
   
	protected $_link=array(
		//关联用户信息表
		'user_detail'=>array(
			//设置关系
			'mapping_type' =>self::HAS_ONE ,
			//设置关联外键
			'foreign_key'  =>'uid',
			//将附加表直接添加到原模型中显示而不是作为二维数组
			'as_fields'  =>'nickname,sex,birth,facepic',
			
		
		),
		'user_bank'=>array(
			//设置关系
			'mapping_type' =>self::HAS_MANY ,
			//设置关联外键
			'foreign_key'  =>'uid',
			//将附加表直接添加到原模型中显示而不是作为二维数组(一对多尽量别拿出来)
			'as_fields'  =>'account,count',
			
		
		),
		
	
	);
   
   
   
   
}