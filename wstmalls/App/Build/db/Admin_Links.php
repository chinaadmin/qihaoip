<?php
/***
 * Links友情链接分类***
id,name,img,title,alt,about,sort
 */
	return array(
    		'db'       =>array('name'=>'links','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'友情链接组','else'=>'友情链接分组'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'name'     =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'分类名称','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'img'      =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'链接图片','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'title'    =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'title标签','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'alt'      =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'alt标签','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'about'    =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'链接详情','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'sort'     =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'链接排序','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);