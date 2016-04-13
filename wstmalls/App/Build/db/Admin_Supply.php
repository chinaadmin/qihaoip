<?php
/***
 * 
Supply供求信息
id,uid,supplytype,tmpa,groupid,userid,title,content,pricemin,pricemax,addtime,edittime,endtime,views,state
 */
	return array(
    		'db'         =>array('name'=>'supply','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'供求信息','else'=>'商品供求信息'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
			'uid'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'信息号','else'=>'信息流水',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
    		'supplytype'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 2','auto'=>'','index'=>'index','about'=>'供/求类型','else'=>'（供求）',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'SUPPLY_TYPE'),
			
			'tmpa'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'商标/专利','else'=>'（商标、专利）',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_PATM'),
			
			'groupid'     =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'产品类别','else'=>'其他',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'userid'     =>array('type'=>'int(10)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'用户id','else'=>'其他',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'title'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'标题','else'=>'标题详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'content'         =>array('type'=>'varchar(255)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'内容','else'=>'内容详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'pricemin'         =>array('type'=>'decimal(9,2)','isnull'=>'DEFAULT 0.00','auto'=>'','index'=>'','about'=>'价格','else'=>'区间',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'pricemax'         =>array('type'=>'decimal(9,2)','isnull'=>'DEFAULT 0.00','auto'=>'','index'=>'','about'=>'价格','else'=>'区间',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'adddate'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'提交日期','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'addtime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'开始时间','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'edittime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'更新时间','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'endtime'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'结束时间','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'views'         =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'查看次数','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'状态','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_STATE'),
);