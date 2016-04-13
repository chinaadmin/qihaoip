<?php
/**
Email
id、用户id、模板id、发送内容、用户邮箱，送达状态，邮箱验证码，发送日期，发送时间
 */
	return array(
    		'db'         =>array('name'=>'email','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'邮件发送记录','else'=>'注册，通知邮件发送记录'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'userid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'用户id','else'=>'用户id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
    					
    		'typeid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'模板id','else'=>'模板id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'data'       =>array('type'=>'varchar(128)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'发送数据','else'=>'发送的数据',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    							
    		'useremail'       =>array('type'=>'varchar(32)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'用户邮箱','else'=>'用户邮箱',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    									
    		'state'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'数据发送状态','else'=>'发送状态',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    											
    		'pin'       =>array('type'=>'varchar(8)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'验证码','else'=>'发送验证码',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'date'       =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'发送日期','else'=>'发送日期',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'datetime'   =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'发送时间','else'=>'发送时间',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);