<?php
/***
Order订单
id,uid,buyer,itemids,price,amount,addtime,updatetime,state,payid,paytime

类型
售价
手续费
积分抵扣
代金券
合同主体
受让主体
留言

获得积分
*/
	return array(
    		'db'         =>array('name'=>'order','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'商品订单','else'=>'查看用户的商品订单'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		
			'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
    		'uid'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'订单号','else'=>'订单流水',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'parent'	=>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'父类id','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'payid'	=>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'支付流水','else'=>'',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'type'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'订单类型','else'=>'数据详情',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'select','data'=>'ORDER_TYPE'),
			
			'seller'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'卖家','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'aid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'经纪人id','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'buyer'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'买家','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'htid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'合同主体id','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'srid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'受让主体id','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'itemids'         =>array('type'=>'text','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'商品id','else'=>'商品id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'price'         =>array('type'=>'decimal(9,2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'售价','else'=>'人民币元',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'fees'         =>array('type'=>'decimal(9,2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'手续费','else'=>'人民币元',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'jifen'         =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'积分抵扣','else'=>'比例为100:1',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
			'voucher'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'代金券','else'=>'代金券id',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
			'amount'         =>array('type'=>'decimal(9,2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'总计','else'=>'总计金额',
					'show'=>'1','add'=>'0','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'date'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'订单日期','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'datetime'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'订单时间','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'updatetime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'更新时间','else'=>'发起支付时间',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'about'         =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'订单留言','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'订单状态','else'=>'默认可1',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ORDER_STATE'),
);