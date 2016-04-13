<?php
/***
Members用户组
id,name,isvip,lv
 */
	return array(
    		'db'         =>array('name'=>'members','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'用户组','else'=>'用户组资料'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'name'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'会员组','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must'),
			
    		'isvip'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'会员类型','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'USER_VIP'),
			
			'lv'         =>array('type'=>'int(2)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'会员等级','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must'),
);