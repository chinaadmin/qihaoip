<?php
/**
Telmsgstyle
id、调用位置（英文），调用位置说明（中文），模板配置（配置参数），模板内容
 */
	return array(
    		'db'         =>array('name'=>'telmsgstyle','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'短信发送模板','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'method'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'模板方法','else'=>'调用模板的方法',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'name'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'名称','else'=>'模板名称',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'configs'       =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'配置组','else'=>'配置参数组',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'configs'),
			
			'data'       =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'模板内容','else'=>'模板内容详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
);