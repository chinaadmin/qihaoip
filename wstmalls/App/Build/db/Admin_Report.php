<?php
	return array(
    		'db'         =>array('name'=>'report','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'系统报告','else'=>'各种报告和日志'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    		'data'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'数据','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
);