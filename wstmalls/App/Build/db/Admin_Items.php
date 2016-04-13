<?php
/***
Items商品类***
id,tmpa,name,about,sort,state
*/
die('文件锁定！');//添加商标分类时联动查询
	return array(
    		'db'         =>array('name'=>'items','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'商品分类','else'=>'商品分类模块，包含所有商品类别和子分类。'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据ID',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'tmpa'       =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'商品类型','else'=>'大类，区分是商标还是专利',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_PATM'),
			
			'parentid'   =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'上级ID','else'=>'上级ID为0即为顶级分类',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'items,parentid=0'),
			
			'name'         =>array('type'=>'varchar(8)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'类别名称','else'=>'类别名称',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'about'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'类别说明','else'=>'补充说明',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'level'        	=>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'级别','else'=>'补充说明',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
								
			'sort'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'排序','else'=>'数据排序',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'状态','else'=>'状态详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_STATE'),
);