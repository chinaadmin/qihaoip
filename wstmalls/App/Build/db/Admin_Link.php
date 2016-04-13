<?php
/***
Link友情链接***
id,groupid,name,link,img,title,alt,about,addtime,endtime,state,sort
 */
	return array(
    		'db'         =>array('name'=>'link','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'友情链接','else'=>'包含所有友情链接'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'groupid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'链接分组','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'links'),
			
			'name'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'网站名称','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'link'         =>array('type'=>'varchar(128)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'网址','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'img'         =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'图片','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'file','data'=>''),
			
			'title'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'title标签','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'nofollow'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'nofollow标签','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'NO_FOLLOW'),
			
			'alt'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'alt标签','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'about'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'关于','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'addtime'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'开始时间','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'endtime'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'结束时间','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'状态','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_STATE'),
			
			'sort'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'排序','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);