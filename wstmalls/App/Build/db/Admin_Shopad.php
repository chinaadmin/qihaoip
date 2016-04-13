<?php
/***
Ad广告***
id,groupid,name,img,link,about,sort,state,starttime,endtime
*/
	return array(
    		'db'         =>array('name'=>'shopad','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'用户商铺广告','else'=>'包含banner、商标和专利广告'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		
			'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'uid'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'UID','else'=>'用户的数据id',
						'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'shopid' 	 =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'商城id','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'type'       =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'广告组','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'SHOP_AD_TYPE'),
			
    		'name'       =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'广告名称','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'img'        =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'广告图片','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'link'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'广告链接','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'sort'       =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'广告排序','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'text','data'=>''),
			
			'state'      =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'广告状态','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'select','data'=>'SHOP_AD_STATE'),
			
			'about'      =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'拒绝原因','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'textarea','data'=>'','min'=>'0','max'=>'128'),
);