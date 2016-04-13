<?php
/**
Person
id、姓名、身份号、身份证正面、身份证反面、手持身份证照
id,name,cardid,img1,img2,img3,state,reson
 */
	return array(
    		'db'         =>array('name'=>'person','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'个人身份','else'=>'个人身份数据'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'name'       =>array('type'=>'varchar(8)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'用户姓名','else'=>'用户姓名',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'sex'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 3','auto'=>'','index'=>'','about'=>'性别','else'=>'性别',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'USER_SEX'),
			
			'cardid'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'身份号','else'=>'身份证号码',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'img1'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'身份证正面','else'=>'身份证正面',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
					
			'img2'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'身份证反面','else'=>'身份证反面',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'img3'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'手持身份照','else'=>'手持身份证照',
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