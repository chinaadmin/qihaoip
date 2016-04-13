<?php
/**
Msg
id、发送者id、接收者id、发送者类型、发送时间、查看时间、发送内容
 */
	return array(
    		'db'         =>array('name'=>'msg','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'站内信','else'=>'站内信'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
			'uid'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'用户id','else'=>'数据流水',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
    					
    		'userid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'发送者','else'=>'发送者id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'toid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'接收者','else'=>'接收者id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'usertype'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'用户类型','else'=>'是否管理员',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_TYPE'),
					
			'sendtime'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'发送时间','else'=>'数据发送时间',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
							
			'totime'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'接收时间','else'=>'数据接收时间',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'data'       =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'数据详情','else'=>'',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);