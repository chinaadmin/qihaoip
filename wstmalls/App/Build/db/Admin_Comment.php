<?php
/***
Comment评论
id,artid,type,upid,amountid,amountip,content,like,unlike,state
 */
	return array(
    		'db'         =>array('name'=>'comment','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'用户评论','else'=>'用户在文章和商品下的评论'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'artid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'数据ID','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'type'         =>array('type'=>'int(2)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'评论的类型','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'COMMENT_TYPE'),
			
			'upid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'上级评论','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'amountid'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'评论者账号','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'amountip'         =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'访客IP','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'content'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'评论内容','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>'must'),
			
			'like'         =>array('type'=>'int(8)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'喜欢','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'unlike'         =>array('type'=>'int(8)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'不喜欢','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 2','auto'=>'','index'=>'','about'=>'状态','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'COMMENT_STATE'),
);