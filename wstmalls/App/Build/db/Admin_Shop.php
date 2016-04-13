<?php
/**
Shop
商铺名称、商铺标题、商铺关键词、商铺描述、简介、logo，img（形象图），
企业信息，个人信息，负责人信息，手机，电话，邮箱，qq，微信，联系地址，
经纪人，banner1，banner2，banner3，ad1，ad2，ad3，ad4，ad5，ad6，state

 */
	return array(
    		'db'         =>array('name'=>'shop','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'商铺','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
    					
    		'name'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商城名称','else'=>'数据详情',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'title'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'SEO标题','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
							
			'keywords'       =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'SEO关键词','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
						
			'description'       =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'SEO描述','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),	
						
			'content'       =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商城简介','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>'','ckeditor'=>1),	
						
			'logo'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商城logo','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
						
			'img'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商城形象图','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'qyname'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'企业名','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
								
			'about'       =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'企业简介','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
						
			'honor'       =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'荣誉资质','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
								
			'person'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'联系人姓名','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
						
			'chkstate'       =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'用户确认状态','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'kfinfo'       =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'客服信息','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'worktime'     =>array('type'=>'text','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'工作时间','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
										
			'showphone'    =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示电话','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
												
			'showtel'    =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示座机','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
							
			'showtm'     =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示商标模块','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
									
			'showpa'     =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示专利模块','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
											
			'showtj'     =>array('type'=>'int(1)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'是否显示特别推荐模块','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),

			'template'     =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'商城模板','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'SHOP_TEMPLATE'),
							
			//企业信息，个人信息，负责人信息，手机，电话，邮箱，qq，微信，联系地址，			
			'companyid'       =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'企业用户身份id','else'=>'数据详情',
						'show'=>'0','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),

			'companychk'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'企业用户认证状态','else'=>'数据详情',
						'show'=>'0','add'=>'0','edit'=>'0','search'=>'0','input'=>'select','data'=>'PERSON_CHK'),
						
			'personid'       =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'个人用户身份id','else'=>'数据详情',
						'show'=>'0','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),
			
			'personchk'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'个人用户身份认证状态','else'=>'数据详情',
						'show'=>'0','add'=>'0','edit'=>'0','search'=>'0','input'=>'select','data'=>'PERSON_CHK'),
						
			'masterid'       =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'商城负责人身份id','else'=>'数据详情',
						'show'=>'0','add'=>'0','edit'=>'0','search'=>'0','input'=>'text','data'=>''),	
						
			'phone'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'手机号码','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
						
			'tel'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'电话号码','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
						
			'email'       =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'邮箱','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
						
			'qq'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'qq','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
						
			'weixin'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'微信','else'=>'数据详情',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	

			'province'   =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'省份','else'=>'所在省份id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'province'),
									
			'city'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'城市','else'=>'所在城市id',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'address'       =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'联系地址','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),	
			//经纪人，banner1，banner2，banner3，ad1，ad2，ad3，ad4，ad5，ad6，state	
			'aid'       =>array('type'=>'int(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'经纪人id','else'=>'数据详情',
						'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
						
			'tuijian'      =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'商城推荐','else'=>'是否推荐',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'ITEM_HOT'),
						
			'sort'      =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'index','about'=>'商城排序','else'=>'排序越大越靠前',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'','max'=>4),
    		
			'state'      =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'验证状态','else'=>'验证是否通过',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'SHOP_STATE'),
						
			'reason'     =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'验证原因','else'=>'如果验证未通过，请填写原因。',
						'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);