<?php
/***
 * Cart购物车（永久，自动清理）
Cart,Ip,userid,item,edittime
 */
	return array(
    		'db'         =>array('name'=>'cart','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'购物车','else'=>'用户购物车，后台仅作管理'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		
			'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),

			'item'         =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商品id','else'=>'商品id列表',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'edittime'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'最近修改时间','else'=>'最近修改时间',
					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
);