<?php
/***
Ad广告***
id,groupid,name,img,link,about,sort,state,starttime,endtime
*/
	return array(
    		'db'         =>array('name'=>'ad','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'站内广告','else'=>'包含banner、站内图片广告、滚动广告等'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		
			'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'groupid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'广告组','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ads'),
			
    		'name'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'广告名称','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'img'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'广告图片','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'file','data'=>''),
			
			'link'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'广告链接','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'about'         =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'广告详情','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'sort'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'广告排序','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'广告状态','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'select','data'=>'USER_STATE'),
			
			'nofollow'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'nofollow属性','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'select','data'=>'AD_NOFOLLOW'),
			
			'starttime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'开始时间','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'text','data'=>''),
			
			'endtime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'结束时间','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'text','data'=>''),
);