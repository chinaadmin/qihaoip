<?php
	return array(
    		'db'         =>array('name'=>'index','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
    					
    		'data'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'数据','else'=>'数据详情','validType'=>'',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>'','min'=>'0','max'=>'0','ckeditor'=>1),//注意必须是textarea的ckeditor=1表示用富文本编辑器
    					
    		'sort'       =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'index','about'=>'排序','else'=>'数字排序','validType'=>'int(4)',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
    					
    		'state'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'状态','else'=>'数据状态','validType'=>'int(2)',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'','min'=>'0','max'=>'2'),
);