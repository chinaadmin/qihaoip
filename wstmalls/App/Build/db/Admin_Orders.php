<?php
	return array(
    		'db'         =>array('name'=>'orders','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
			
			'uid'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'订单号','else'=>'订单流水',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
    		'buyer'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'买家','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
    					
    		'amount'         =>array('type'=>'decimal(9,2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'总计','else'=>'总计金额',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'num'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'订单商品格式','else'=>'商品个数',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'date'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'订单日期','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'datetime'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'订单时间','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'订单状态','else'=>'默认可1',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ORDERS_STATE'),
			
			'payid'         =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'支付流水号','else'=>'订单支付',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),

			'paydate'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'支付日期','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'paytime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'支付时间','else'=>'支付时间',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			
);