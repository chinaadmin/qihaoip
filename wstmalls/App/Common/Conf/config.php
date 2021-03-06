<?php
/***
 * 使用C方法获取配置
*/
return array(
	'URL_CASE_INSENSITIVE' =>false,//URL区分大小写
	'URL_HTML_SUFFIX'=>'html',//后缀支持
 	//'SHOW_PAGE_TRACE' =>true,//显示页面Trace信息/
	
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com', // 服务器地址11111
	'DB_NAME'   => 'mall', // 数据库名
	'DB_USER'   => 'qihaoip', // 用户名
	'DB_PWD'    => '23498jsfda43qfsdf', // 密码
	'DB_PREFIX' => 'qh_', // 数据库表前缀
		
    /* 'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => 'localhost', // 服务器地址
	'DB_NAME'   => 'mall', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '', // 密码
	'DB_PREFIX' => 'qh_', // 数据库表前缀 */
		
	'DB_PORT'   => 3306, // 端口
	'DB_CHARSET'=> 'utf8', // 字符集
	'DB_DEBUG'  =>  true, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
	
	'URL_MODEL' => '2',//url模式，此模式不显示index
	'MODULE_ALLOW_LIST'  =>    array('Index','Admin','Member','Build','Trade','Financial','Zlgj','Policy'),
	'DEFAULT_MODULE'     =>    'Index',//默认模块
	'TMPL_TEMPLATE_SUFFIX'=>'.php',//设置模板文件的后缀
	
	'QH_URL'=>'http://www.qihaoip.com/',
		
	'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
	'APP_SUB_DOMAIN_RULES'    =>    array(
		'f'        => 'Financial',  // f.qihaoip.com子域名指向Financial模块
		'z'        => 'Policy',  // z.qihaoip.com子域名指向Policy模块
	),
	
	/**** 数据缓存设置*****/
	'DATA_CACHE_TIME'       =>  1,      // 数据缓存有效期 0表示永久缓存
	'DATA_CACHE_COMPRESS'   =>  false,   // 数据缓存是否压缩缓存
	'DATA_CACHE_CHECK'      =>  false,   // 数据缓存是否校验缓存
	'DATA_CACHE_PREFIX'     =>  'tp_',     // 缓存前缀
	'DATA_CACHE_TYPE'       =>  'File',// 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
	
	'TMPL_CACHE_ON' => false,//禁止模板编译缓存
	//'HTML_CACHE_ON' => false,//禁止静态缓存
		
	/****错误设置*****/
	'SHOW_ERROR_MSG'        =>  true,    // 显示错误信息
	'TRACE_MAX_RECORD'      =>  100,    // 每个级别的错误信息 最大记录数
	'TMPL_EXCEPTION_FILE'   => '500.php',

	/****Cookie设置*****/
	'COOKIE_EXPIRE'         =>  172800,    // Cookie有效期
	'COOKIE_DOMAIN'         =>  '',      // Cookie有效域名
	'COOKIE_PATH'           =>  '/',     // Cookie路径
	'COOKIE_PREFIX'         =>  '',      // Cookie前缀 避免冲突
	'COOKIE_HTTPONLY'       =>  '',     // Cookie的httponly属性 3.2.2新增
	/****Session设置*****/
	'SESSION_AUTO_START'    => true, //是否开启session
	'SESSION_OPTIONS'	    => array('name'=>'qh_session','expire'=>36000),//session 配置数组
	
	//以下是Shop的配置
	'NO_FOLLOW'=>array('1'=>'不添加','2'=>'添加'),//链接nofollow标签
	'SHOP_AD_TYPE'=>array('1'=>'banner广告','2'=>'商标左广告','3'=>'商标下广告','4'=>'专利左广告','5'=>'专利下广告','6'=>'蓝色顶部','7'=>'红色方块'),//商户广告类型
	'SHOP_AD_STATE'=>array('1'=>'待审核','2'=>'审核被拒绝','3'=>'审核通过'),//商户广告状态
	'PAY_TYPE'=>array('1'=>'银联','2'=>'支付宝'),//支付类型
	'BANKS'=>array('104100000004'=>'中国银行','103100000026'=>'农业银行','102100099996'=>'工商银行','105100000017'=>'建设银行','301290000007'=>'交通银行','303100000006'=>'光大银行','302100011000'=>'中信银行','305100000013'=>'民生银行','308584000013'=>'招商银行','309391000011'=>'兴业银行','306581000003'=>'广发银行','307584007998'=>'平安银行','304100040000'=>'华夏银行'),
	'ITEM_PATM'=>array('1'=>'商标','2'=>'专利','3'=>'其他'),
	'ITEM_STATE'=>array('1'=>'已发布','2'=>'待审核','3'=>'未通过','4'=>'已下架','5'=>'交易处理中','6'=>'已售出','8'=>'用户已删除'),
	'ITEM_TYPE'=>array('1'=>'官方自营','2'=>'官方代售','3'=>'企业用户','4'=>'个人用户'),//商标性质
	'ITEM_MASTER_TYPE'=>array('1'=>'企业','2'=>'个人','3'=>'高校'),//商品归属性质
	'ITEM_REG_TYPE'=>array('1'=>'中文','2'=>'英文','3'=>'中文+英文','4'=>'图形','5'=>'中文+图形','6'=>'英文+图形','7'=>'组合'),//注册类型 中文    英文    中文+英文    图形    中文+图形    英文+图形    组合
	'ITEM_TMPA_TYPE'=>array('1'=>'中文 (专利->发明)','2'=>'英文 (专利->实用新型)','3'=>'中文+英文 (专利->外观专利)','4'=>'图形','5'=>'中文+图形','6'=>'英文+图形','7'=>'组合'),
	'ITEM_PA_TYPE'=>array('1'=>'发明','2'=>'实用新型','3'=>'外观设计'),//专利类型
	'ITEM_AREA_TYPE'=>array('1'=>'中国内地','2'=>'港澳台地区','4'=>'美国','5'=>'英国','6'=>'意大利','7'=>'俄罗斯','8'=>'德国','9'=>'法国','10'=>'欧盟','11'=>'日本','12'=>'韩国','13'=>'巴西','14'=>'马来西亚','15'=>'南非','3'=>'其他'),//商标地址
	'ITEM_SELL_TYPE'=>array('1'=>'转让','2'=>'普通许可','3'=>'独占许可','4'=>'排他许可'),//转让类型
	'ITEM_HOT'=>array('1'=>'不推荐','2'=>'推荐'),//推荐类型
	'ITEM_SHOP'=>array('1'=>'不推荐','2'=>'推荐','3'=>'特别推荐'),//推荐类型
	'ITEM_TUIJIAN'=>array('1'=>'推荐','2'=>'特惠专区'),//
	'ITEM_SALE'=>array('1'=>'单独转让','2'=>'非单独转让'),//是否单独转让
	//以下是子订单配置
	'ORDER_STATE'=>array('1'=>'待支付','2'=>'已支付','3'=>'手续办理','4'=>'待确认','5'=>'订单完成','11'=>'已超时','12'=>'已撤销','21'=>'已删除'),//订单状态
	'ORDER_TYPE'=>array('1'=>'普通订单','2'=>'充值订单'),//订单状态
	'BATCH_STATE'=>array('1'=>'任务排队中，请等待。','2'=>'任务进行中。','3'=>'任务完成！'),
	//以下是订单配置
	'ORDERS_STATE'=>array('1'=>'新订单','2'=>'已作废','3'=>'支付成功','4'=>'交易完成'),//订单状态//该状态已作废2016-01-04
	'AD_NOFOLLOW'=>array('1'=>'禁用','2'=>'启用'),//NOFOLLOW属性
	//以下是供求信息配置
	'SUPPLY_TYPE'=>array('1'=>'供应','2'=>'求购','3'=>'其他'),//推荐类型
	//以下是文章状态
	'ARTICLE_TYPE'=>array('1'=>'不推荐','2'=>'推荐'),//推荐类型
	//以下是百科推荐状态
	'BAIKE_TYPE'=>array('1'=>'商标百科','2'=>'专利百科'),//推荐类型11
	//以下是用户配置
	'USER_CHK'=>array('1'=>'未验证','2'=>'等待验证','3'=>'已验证','4'=>'验证未通过'),//用户验证
	'USER_STATE'=>array('1'=>'正常','2'=>'禁用'),//用户账户状态
	'CATE_LEVEL'=>array('1'=>'1级别','2'=>'2级别','3'=>'3级别'),//商品分类级别
	'USER_SEX'=>array('1'=>'男','2'=>'女','3'=>'保密'),//用户性别
	'USER_VIP'=>array('1'=>'免费会员','2'=>'付费会员'),//用户是否付费
	'USER_TYPE'=>array('1'=>'会员','2'=>'管理员'),
	'PERSON_CHK'=>array('1'=>'未验证','2'=>'等待验证','3'=>'验证通过','4'=>'验证未通过'),//
	'SHOP_STATE'=>array('1'=>'未提交审核','2'=>'等待审核','3'=>'审核通过','4'=>'审核未通过'),
	'SHOP_TEMPLATE'=>array('1'=>'默认模板','2'=>'蓝色模板','3'=>'黄色模板','4'=>'其他'),
	//主体信息
	'ZT_TYPE'=>array('1'=>'公司','2'=>'个人'),
	'ZT_DEFAULT'=>array('1'=>'非默认','2'=>'默认'),
	//评论状态
	'COMMENT_STATE'=>array('1'=>'已审核','2'=>'待审核','2'=>'已禁止'),//评论状态
	'COMMENT_TYPE'=>array('1'=>'文章评论','2'=>'商品评论'),//评论类型
	//资金配置
	'MONEY_LOG_TYPE'=>array('1'=>'充值','2'=>'提现','3'=>'消费','4'=>'卖出','5'=>'退款','6'=>'其他'),//资金异动类型
	//商城模板设置
	'TEMPLATE_TYPE'=>array('1'=>'blue','2'=>'green','3'=>'red'),
	'TRADE_STATE' =>array('1'=>'有效','2'=>'无效','3'=>'待审','4'=>'不定','5'=>'未知状态','102'=>'已注册','101'=>'申请中','103'=>'已驳回','100'=>'已无效','104'=>'已初审','106'=>'其他'),
	//模版自定义替换规则
	'TMPL_PARSE_STRING'=> array(
		'HTMLSUFFIX'=>'.html',
		'__APP__' => 'http://www.qihaoip.com',
		//'__ZPP__' => 'http://z.qihaoip.com',
	),
	'TYPE_CODE' => array(
			'8'=>'1',
			'9'=>'2',
			'10'=>'3',
			'11'=>'4',
			'28'=>'5',
			'29'=>'6',
			'30'=>'7',
			'31'=>'8',
			'32'=>'9',
			'33'=>'10',
			'34'=>'11',
			'35'=>'12',
			'36'=>'13',
			'37'=>'14',
			'38'=>'15',
			'39'=>'16',
			'40'=>'17',
			'41'=>'18',
			'42'=>'19',
			'43'=>'20',
			'44'=>'21',
			'45'=>'22',
			'46'=>'23',
			'47'=>'24',
			'48'=>'25',
			'49'=>'26',
			'50'=>'27',
			'51'=>'28',
			'52'=>'29',
			'53'=>'30',
			'54'=>'31',
			'55'=>'32',
			'56'=>'33',
			'57'=>'34',
			'58'=>'35',
			'59'=>'36',
			'60'=>'37',
			'61'=>'38',
			'62'=>'39',
			'63'=>'40',
			'64'=>'41',
			'65'=>'42',
			'66'=>'43',
			'67'=>'44',
			'68'=>'45'
		)
);