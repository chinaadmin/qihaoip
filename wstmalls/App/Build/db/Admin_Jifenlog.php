<?php
/**
积分流水
Jifenlog
id、用户id、积分事由、积分id、积分日期、积分时间、积分值、积分前、积分后
 */
	return array(
    		'db'         =>array('name'=>'jifenlog','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'积分记录','else'=>'积分流水记录'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'uid'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'uid','else'=>'面向用户的id',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'userid'       =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'用户id','else'=>'用户id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    		
			'adminid'       =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'操作员id','else'=>'管理员id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'typeid'       =>array('type'=>'int(8)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'积分项目','else'=>'项目id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'name'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'积分详情','else'=>'积分详情说明',
    						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'date'       =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'积分日期','else'=>'积分日期',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    		
    		'datetime'   =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'积分时间','else'=>'积分时间戳',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    		
    		'jifen'       =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'积分','else'=>'积分值',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    							
    		'beginjifen'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'开始值','else'=>'开始积分值',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    									
    		'endjifen'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'结束值','else'=>'最终积分值',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);