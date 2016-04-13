<?php
/**
 * 受让主体
 * ------
 * id
 * 归属id
 * 类型
 * 受让人
 * 补充信息
 * 是否默认
 */
	return array(
    		'db'         =>array('name'=>'shourangzt','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
    					
    		'memberid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'归属id','else'=>'所有者id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),

			'type'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'类型','else'=>'公司/个人',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'ZT_TYPE'),
					
			'name'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'受让人','else'=>'名称',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'like','input'=>'text','data'=>''),
							
			'info'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'补充信息','else'=>'身份证号/公司地址',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
    		'default'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'默认主体','else'=>'是否默认',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'ZT_DEFAULT'),
);