<?php
/***
Item商品名***
id,tmpa,groupid,title,keywords,description,introduce,price,views,state,img,userid,type,addtime,edittime,tmno,tmtype,tmlimit,tmregdate,tmregstart,tmregend,tmregarea,tmtradeway,tmscreening,tmcontent
1，添加广告图
2，知产包
*/
die('禁止自动构建！');//列表页查看详情链接导致
	return array(
    		'db'         =>array('name'=>'item','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'商品','else'=>'包含所有商标和专利，以及以后可能出现的商品。'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据ID',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'tmpa'         =>array('type'=>'int(1)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'商品类型','else'=>'区分是商标还是专利',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_PATM'),
			
			'groupid'      =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'类别','else'=>'类别id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'items'),
			
			'groupid2'      =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'二级分类','else'=>'类别id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'items'),
			
			'groupid3'      =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'三级分类','else'=>'类别id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'items'),
			
			'title'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'商品名称','else'=>'商品名称详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
			
			'keywords'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'关键词','else'=>'关键词说明',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'description'         =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'描述','else'=>'描述',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'introduce'         =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商品简介','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'price'         =>array('type'=>'decimal(9,2)','isnull'=>'DEFAULT \'0.00\'','auto'=>'','index'=>'','about'=>'商品价格','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'count'         =>array('type'=>'int(8)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'库存','else'=>'1',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'1'),
			
			'views'         =>array('type'=>'int(8)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'浏览次数','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_STATE'),
			
			'adimg'         =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'广告图片','else'=>'',
							'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'file','data'=>''),
					
			'img'         =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商品图片','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'userid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'用户ID','else'=>'',
					'show'=>'1','add'=>'0','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'aid'         =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'经纪人','else'=>'经纪人id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'member,admin=3,adminord,id,name'),
			
			'type'         =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'商品性质','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_TYPE'),
			
			'adddate'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'添加日期','else'=>'自动',
					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'autodate'),
			
			'addtime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'添加时间','else'=>'自动',
					'show'=>'0','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>'autotime'),
			
			'edittime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'修改时间','else'=>'自动',
					'show'=>'0','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
			'tmno'         =>array('type'=>'varchar(32)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'申请号','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'must'),
					
			'master'         =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'权利人','else'=>'',
							'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
					
			'mastertype'     =>array('type'=>'int(2)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'权利人类型','else'=>'',
							'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_MASTER_TYPE'),
			
			'tmtype'         =>array('type'=>'int(8)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'所属类别','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_REG_TYPE'),
			
			'tmlimit'        =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'服务项目','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must'),
			
			'tmregdate'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'申请日','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'tmregstart'        =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'注册日','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'tmregend'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'到期日','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'tmregarea'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'商品地区','else'=>'国内，国外，港台等',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'ITEM_AREA_TYPE'),
			
			'tmtradeway'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'交易方式','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'ITEM_SELL_TYPE'),
			
			'tmscreening'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'首页推荐','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_HOT'),
			
			'tmscreening1'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'市场页推荐','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_HOT'),
			
			'tmscreening2'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'资讯页推荐','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_HOT'),
			
			'tmscreening3'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'商城推荐','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_SHOP'),
					
			'tmscreening4'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'店铺推荐','else'=>'',
							'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_SHOP'),
							
			'singlesale'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'单独转让','else'=>'',
							'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_SALE'),
			
			'tuijian'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'推荐方式','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_TUIJIAN'),
			
			'tmcontent'         =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商品内容详情','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>'','ckeditor'=>1),
);