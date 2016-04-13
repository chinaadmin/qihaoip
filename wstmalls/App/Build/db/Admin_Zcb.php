<?php
/***
 * id
 * 分类
 * 标题
 * 关键词
 * 描述
 * 图片
 * 详情
 * 
 * 价格
 * 包内商品
 * 
 * 排序
 * 状态
 */
	return array(
    		'db'         =>array('name'=>'zcb','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'知产包','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
			
			'type'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'分类','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'like','input'=>'select','data'=>'items','min'=>0,'max'=>0),
			
			'title'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'标题','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'like','input'=>'text','data'=>'must','min'=>4,'max'=>60),
						
			'keywords'	=>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'关键词','else'=>'数据详情',
							'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
								
			'description'	=>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'描述','else'=>'数据详情',
							'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'smallimg'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'缩略图片','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'file','data'=>''),
			
			'img'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'图片','else'=>'数据详情',
							'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'file','data'=>''),
						
			'content'	=>array('type'=>'text','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'内容','else'=>'数据详情',
							'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>'must','min'=>5,'max'=>0,'ckeditor'=>1),
			
			'price'		=>array('type'=>'text','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'价格','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must','min'=>0,'max'=>0,'ckeditor'=>1),
			
			'item'		=>array('type'=>'text','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'包内商品','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must','min'=>0,'max'=>0,'ckeditor'=>1),
												    					
    		'sort'       =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'index','about'=>'排序','else'=>'数字排序','validType'=>'int(4)',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
    					
    		'state'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'状态','else'=>'数据状态','validType'=>'int(2)',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'USER_STATE'),
);