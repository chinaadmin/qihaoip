<?php
	return array(
    		'db'         =>array('name'=>'keywords','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'热门搜索词','else'=>'热门搜索关键词'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		
			'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'groupid'         =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'关键词组','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'keywords'),
    		
			'keywords'   =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'搜索关键词','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'views'		=>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'搜索次数','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'sort'		=>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'排序','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'','input'=>'text','data'=>''),
			
			'state'		=>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_STATE'),
);