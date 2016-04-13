<?php
/**
Company
id、企业名称、法人姓名、营业执照、注册地址、联系地址、注册资本、经营范围、收款银行、收款银行账户名、收款银行账号
id,name,frname,yyzhizhao,regaddress,address,regmoney,business,bank,cardname,card,state,reason
 */
	return array(
    		'db'         =>array('name'=>'company','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'公司数据','else'=>'公司注册信息等数据'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'name'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'企业名称','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'frname'     =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'法人姓名','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'frsex'     =>array('type'=>'int(2)','isnull'=>'DEFAULT 3','auto'=>'','index'=>'','about'=>'法人性别','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'USER_SEX'),
						
			'yyzhizhao'  =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'营业执照','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),

			'province1'   =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'省份','else'=>'所在省份id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'province'),
									
			'city1'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'城市','else'=>'所在城市id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'regaddress' =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'注册地址','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	

			'province2'   =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'省份','else'=>'所在省份id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'province'),
									
			'city2'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'城市','else'=>'所在城市id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'address'    =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'联系地址','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'regmoney'   =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'注册资本(万元)','else'=>'以万元为单位',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'business'   =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'经营范围','else'=>'数字排序',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'bank'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'收款行','else'=>'数据状态',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'BANKS'),
    					
    		'bankname'   =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'支行名称','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'cardname'   =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'收款账户名','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    							
    		'card'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'银行卡号','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'state'      =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'验证状态','else'=>'验证是否通过',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'PERSON_CHK'),
    					
    		'reason'     =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'验证原因','else'=>'如果验证未通过，请填写原因。',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
    		
);