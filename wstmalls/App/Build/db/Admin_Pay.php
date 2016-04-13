<?php
/**
Pay
id、用户账号、支付卡号、卖家id、发起时间、完成时间、订单号、支付金额、支付流水号、支付状态
**/
	return array(
    		'db'         =>array('name'=>'pay','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'userid'       =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'用户id','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'buyer'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'买家支付账号','else'=>'可为空',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'buyid'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'卖家支付id','else'=>'可为空',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'addtime'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'创建时间','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'date'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'支付日期','else'=>'数据详情',
						'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
						
			'endtime'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'支付时间','else'=>'数据详情',
						'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
			'orders'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'订单号','else'=>'数据详情',
						'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'money'       =>array('type'=>'decimal(9,2)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'支付金额','else'=>'数据详情',
						'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'payid'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'支付流水号','else'=>'数据详情',
						'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'type'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'支付类型','else'=>'阿里或银联',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'select','data'=>'PAY_TYPE'),
    					
    		'state'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'支付状态','else'=>'数据状态',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'1'),
);