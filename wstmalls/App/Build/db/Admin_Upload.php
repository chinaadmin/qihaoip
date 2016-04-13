<?php
/**
上传文件
 */
	return array(
    		'db'         =>array('name'=>'upload','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'userid'     =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'用户id','else'=>'用户id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'file'       =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'文件地址','else'=>'文件相对地址',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'date'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'日期','else'=>'当前日期',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
    		'datetime'   =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'时间','else'=>'当前时间',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);