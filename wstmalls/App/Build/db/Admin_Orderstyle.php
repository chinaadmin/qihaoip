<?php
/**
订单事由
Orderstyle
id、可用组别、事由名称
 */
	return array(
    		'db'         =>array('name'=>'orderstyle','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'订单事由','else'=>'预定义订单事由'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'groupid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'用户组','else'=>'用户组id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'members'),
			
			'adminid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'管理组','else'=>'管理组id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'admin'),
    					
    		'name'       =>array('type'=>'varchar(32)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'事由详情','else'=>'订单事由说明',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must'),
);