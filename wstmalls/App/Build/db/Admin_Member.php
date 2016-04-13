<?php
/***
Member账户（前台及后台）//访客日志/Log/Daily
id,ugroup,admin,adminord,username,email,mobile,webname,aid,qq,weixin,name,area,address,bank,bankcard,idcard,idcardimg,regip,regtime,jifen,money,lockmoney,qmoney,emailchk,mobilechk,idcardchk,bankcardchk,password,paypassword,gender,img,state
 */
	return array(
    		'db'         =>array('name'=>'member','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'用户账户','else'=>'所有用户资料'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'ugroup'     =>array('type'=>'int(10)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'用户组','else'=>'用户组',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'members'),

			'admin'      =>array('type'=>'int(10)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'管理组','else'=>'管理组',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'admin'),
			
			'adminord'   =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'管理员排序','else'=>'管理员排序',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'100'),
			
			'username'   =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'UNIQUE','about'=>'用户账号','else'=>'账号',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'email'      =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'邮箱','else'=>'邮箱账号',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),

			'mobile'     =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'手机号','else'=>'手机号码',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'tel'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'电话号码','else'=>'固定电话号码',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'webname'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'昵称','else'=>'网名',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'aid'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'经纪人','else'=>'经纪人id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'member,admin=3,adminord,id,name'),
			
			'qq'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'qq号码','else'=>'个人qq号',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'weixin'     =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'微信账号','else'=>'个人微信账号',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
					
			'name'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'姓名','else'=>'个人姓名',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'about'       =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'个人简介','else'=>'个人简介',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'textarea','data'=>'','max'=>'255'),
			
			'province'   =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'省份','else'=>'所在省份id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'province'),
			
			'city'       =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'城市','else'=>'所在城市id',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
						
			'address'       =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'地址','else'=>'个人地址',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),

			'bank'     =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'归属银行','else'=>'个人银行卡号',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'BANKS'),
			
			'bankcard'     =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'银行卡号','else'=>'个人银行卡号',
							'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'idcard'     =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'身份证号','else'=>'个人身份号',
							'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'idcardimg'     =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'身份证照片','else'=>'个人身份证照片',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'regip'     =>array('type'=>'varchar(32)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'注册ip','else'=>'注册时的ip地址',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'regdate'     =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'注册日期','else'=>'注册时的日期',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'regtime'     =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'注册时间','else'=>'注册时的时间',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'jifen'     =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'','about'=>'用户积分','else'=>'用户个人积分',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'money'     =>array('type'=>'decimal(9,2)','isnull'=>'DEFAULT 0.00','auto'=>'','index'=>'','about'=>'金额','else'=>'个人账户余额',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			//regip,regtime,money,lockmoney,qmoney
			'lockmoney'     =>array('type'=>'decimal(9,2)','isnull'=>'DEFAULT 0.00','auto'=>'','index'=>'','about'=>'冻结金额','else'=>'冻结金额',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'qmoney'     =>array('type'=>'decimal(9,2)','isnull'=>'DEFAULT 0.00','auto'=>'','index'=>'','about'=>'七号币','else'=>'商城的抵用金',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
					
			'emailchk'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'邮箱验证','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_CHK'),
			
			'mobilechk'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'手机验证','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_CHK'),
			
			'idcardchk'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'身份验证','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_CHK'),

			'bankcardchk'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'银行卡验证','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_CHK'),

			'password'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'用户密码','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'0','search'=>'0','input'=>'text','data'=>''),

			'paypassword'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'支付密码','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'0','search'=>'0','input'=>'text','data'=>''),

			'gender'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 3','auto'=>'','index'=>'','about'=>'性别','else'=>'性别',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'USER_SEX'),

			'img'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'头像图片','else'=>'个人头像',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'状态','else'=>'账号状态',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'USER_STATE'),
);