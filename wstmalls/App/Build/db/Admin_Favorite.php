<?php
	return array(
    		'db'         =>array('name'=>'favorite','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'收藏夹','else'=>'收藏商品等'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'data'       =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'数据','else'=>'',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);