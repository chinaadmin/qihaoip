<?php
/**
订单动态流水
Orderlog
id、订单id、用户id、操作人id、订单事由、事由详情、相关文件
 */
	return array(
    		'db'         =>array('name'=>'orderlog','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'orderid'    =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'订单id','else'=>'非UID',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
    					
    		'userid'     =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'排序','else'=>'数字排序',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
    					
    		'adminid'    =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'操作人','else'=>'操作人',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'member,admin>3'),
    					
    		'admintype'       =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'操作人类型','else'=>'类型',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'USER_TYPE'),
    					
    		'datetime'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'处理时间','else'=>'订单处理时间',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    							
    		'type'       =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'事由id','else'=>'订单事由id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'orderstyle'),
    							
    		'name'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'订单事由','else'=>'数据状态',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    						
    		'about'      =>array('type'=>'varchar(255)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'事由详情','else'=>'详情说明',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    				
    		'file'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'相关文件','else'=>'文件压缩包',
    							'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);