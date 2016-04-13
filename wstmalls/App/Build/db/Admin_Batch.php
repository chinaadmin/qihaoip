<?php
/***
 * id
 * 用户id
 * 文件名
 * 开始时间
 * 类型
 * 条目数量
 * 状态
 * 完成度
 * 结束时间
 */
	return array(
    		'db'         =>array('name'=>'batch','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
			
			'uid'       =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'uid','else'=>'',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
			
			'memberid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'用户id','else'=>'',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
			
			'filename'       =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'文件名','else'=>'',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
			
			'starttime'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'开始时间','else'=>'',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
			
			'type'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'类型','else'=>'类型',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
			
    		'nums'       =>array('type'=>'int(8)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'条目数量','else'=>'数据详情',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'textarea','data'=>''),
    					
    		'success'    =>array('type'=>'int(8)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'成功记录','else'=>'数字排序',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
			'failed'    =>array('type'=>'int(8)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'失败记录','else'=>'数字排序',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
    		'state'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'状态','else'=>'数据状态',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'select','data'=>'BATCH_STATE','min'=>'0','max'=>'2'),
			
			'endtime'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'结束时间','else'=>'',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
);