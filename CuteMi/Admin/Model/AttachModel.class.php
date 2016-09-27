<?php
namespace Admin\Model;
use Think\Model\RelationModel;
class GoodsModel extends RelationModel{
   
	protected $_link=array(
		//关联用户信息表
		'goods_detail'=>array(
			//设置关系
			'mapping_type' =>self::HAS_ONE ,
			//设置关联外键
			'foreign_key'  =>'gid',
			//将附加表直接添加到原模型中显示而不是作为二维数组
			'as_fields'  =>'screen',
			
		
		),
		
		
	
	);
   
   
   
   
}