<?php
/**
 * 积分设置
Jifen
id、积分值、每日积分次数、每账户积分次数、积分事由、积分位置
 */
	return array(
    		'db'         =>array('name'=>'jifen','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'积分设置','else'=>'用于设置用户行为积分值'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'value'       =>array('type'=>'int(8)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'积分值','else'=>'0',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),

			'datetimes'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'每日积分次数','else'=>'0',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
					
			'membertimes'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'每账号积分次数','else'=>'0',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
    		'name'       =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'积分名称','else'=>'积分名称',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
    					
    		'about'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'积分描述','else'=>'用于详细描述积分位置',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
);