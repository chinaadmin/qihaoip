<?php
/***
 * 
Ads广告位专题***
id,name,high,width,about
 */
	return array(
    		'db'         =>array('name'=>'ads','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'广告位','else'=>'站内广告位'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'name'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'广告位置','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'high'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'宽度','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'width'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'高度','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'about'         =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'备注信息','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
);