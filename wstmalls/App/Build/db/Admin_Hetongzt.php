<?php
/**
 * 合同主体
 * -----------
 * id
 * 归属id
 * 公司
 * 省
 * 市
 * 地址
 * 联系人
 * 联系电话
 * 是否默认
 */
	return array(
    		'db'         =>array('name'=>'hetongzt','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
			
			'memberid'       =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'归属id','else'=>'所有者id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'',),
			
			'name'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'名称','else'=>'主体名称',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'like','input'=>'text','data'=>''),
			
			'provice'       =>array('type'=>'varchar(8)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'省','else'=>'省份',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'',),
			
			'city'       =>array('type'=>'varchar(8)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'地区','else'=>'地区',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'',),
    					
    		'address'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'',''=>'','about'=>'地址','else'=>'详细地址',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),//注意必须是textarea的ckeditor=1表示用富文本编辑器
    					
    		'contact'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'联系人','else'=>'公司/个人',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'ZT_TYPE'),
    							
    		'tel'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'联系方式','else'=>'数字',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'',),
    					
    		'default'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'默认主体','else'=>'是否默认',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'ZT_DEFAULT'),
);