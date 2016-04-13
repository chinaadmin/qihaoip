<?php
/***
Config系统配置
id,group,name,type,data
 */
	return array(
    		'db'         =>array('name'=>'config','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'系统配置','else'=>'设置系统相关参数'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		
			'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'groupid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'数据组','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'configs'),
			
			'name'         =>array('type'=>'varchar(32)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'数据名称','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'data'         =>array('type'=>'varchar(255)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'数据内容','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'textarea','data'=>'must'),
);