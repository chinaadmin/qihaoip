<?php
/***
Menu首页导航***
id,groupid,upid,name,title,alt,link,about
 */
	return array(
    		'db'         =>array('name'=>'menu','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'导航菜单','else'=>'页面的导航菜单'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'groupid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'所在类别','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'menus'),
			
			'upid'         =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'上级导航','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'name'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'名称','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'title'         =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'title标签','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'alt'         =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'alt标签','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'link'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'链接地址','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must'),
			
			'about'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'链接说明','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'sort'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'排序','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_STATE'),
);