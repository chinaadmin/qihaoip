<?php
/**
 * 资金流水
Moneylog
id、用户id、订单id、支付id、异动类型,异动名称，金额日期，金额时间，金额值，更改前，更改后
 */
	return array(
    		'db'         =>array('name'=>'moneylog','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'资金流水','else'=>'用户账户资金异动流水'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
    					
    		'userid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'用户账号','else'=>'用户账号id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),//注意必须是textarea的ckeditor=1表示用富文本编辑器
    					
    		'orderid'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'订单号','else'=>'订单流水号',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'payid'       =>array('type'=>'varchar(24)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'支付号','else'=>'支付订单号',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    			
    		'name'       =>array('type'=>'varchar(32)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'异动名称','else'=>'名称描述',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    							
    		'type'       =>array('type'=>'int(2)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'异动类型','else'=>'只保存值',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'MONEY_LOG_TYPE'),
    							
    		'date'       =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'发生日期','else'=>'异动日期',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
 
    		'datetime'   =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'发生时间','else'=>'异动发生时间',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'money'      =>array('type'=>'decimal(9,2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'异动金额','else'=>'异动金额',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),

    		'beginmoney' =>array('type'=>'decimal(9,2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'开始余额','else'=>'用户账户为变动前金额',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    					
    		'endmoney'   =>array('type'=>'decimal(9,2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'结束金额','else'=>'用户账号最终金额',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'adminid'    =>array('type'=>'int(8)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'操作员','else'=>'管理员id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'member,admin>3'),
);