<?php
return array(
	'TMPL_ACTION_ERROR' => 'Public/error',//默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS' => 'Public/success',//默认成功跳转对应的模板文件
	'TRADE_CAT' => array(
		'1'=>array(
			'name'=>'互联网',
			'gcat'=>array(
					'32'=>'应用软件',
					'58'=>'在线商店',
					'61'=>'提供在线论坛',
					'64'=>'提供在线音乐及录像等',
					'65'=>'互联网搜索引擎',
					'68'=>'在线社交服务',
			),
			),
		'2'=>array(
			'name'=>'电子',
			'hcat'=>array(
					'32'=>'电脑、手机、电视机等',
			),
			'gcat'=>array(
					'65'=>'计算机软件服务相关',
					'58'=>'组织（商业、广告、宽览）交易会等',
					'63'=>'电子产品加工服务',
					'64'=>'在线电子服务下载、在线电子游戏等',
					'60'=>'电子产品的维修服务',
			),
			),
		'3'=>array(
			'name'=>'服饰',
			'hcat'=>array(
					'48'=>'服装',
					'41'=>'皮具、皮包',
			),
			'gcat'=>array(
					'37'=>'首饰',
					'32'=>'太阳镜',
					'58'=>'销售服务',
					'60'=>'服装修补、翻新、清洗服务',
					'63'=>'服装加工',
					'65'=>'服装设计',
					'68'=>'服装出租',
					'46'=>'丝、线等生产资料',
					'47'=>'床上用品、纺织工艺等',
					'49'=>'服装花边、配料等',
			),
			),
		'4'=>array(
			'name'=>'化妆',
			'hcat'=>array(
					'10'=>'化妆品、洗衣、洗发等',
			),
			'gcat'=>array(
					'44'=>'化妆用品',
					'65'=>'化妆品研究',
					'67'=>'美容院、整形',
			),
		),
		'5'=>array(
			'name'=>'首饰',
			'hcat'=>array(
					'37'=>'珠宝、手表、首饰等',
			),
			'gcat'=>array(
					'63'=>'珠宝首饰修理',
			),	
		),
		'6'=>array(
			'name'=>'食品',
			'gcat'=> array(
					'52'=>'腌腊制品、鱼制食品、干果、豆腐制品、食用油等',
					'53'=>'调味品、糕点、方便食品等',
					'54'=>'新鲜水果、蔬菜、活动物等',
					'55'=>'饮料、果汁、矿泉水、啤酒等',
					'56'=>'白酒、红酒、葡萄酒、白兰地等含酒精饮品',
					'62'=>'物流、配送、仓储等',
					'63'=>'食品加工、饮料加工等',
					'67'=>'营养与饮食指导、保健等',
			),
		),
		'7'=>array(
			'name'=>'餐饮',
			'hcat'=>array(
					'65'=>'餐饮、餐馆、酒店，住宿等',
			),
			'gcat'=> array(
					'31'=>'餐具（刀、叉和匙）等',
					'63'=>'食品加工、剥制加工等',
					'67'=>'营养与饮食指导、保健等',
					'58'=>'饭店商业管理',
			),
		),
		'8'=>array(
			'name'=>'电器',
			'hcat'=>array(
					'32'=>'电视机、音响、摄像机等',
			),
			'gcat'=>array(
					'34'=>'照明设备、电冰箱、空调、电暖气、热水壶、油烟机',
					'60'=>'电器设备的安装与修理',
			),
		),
		'9'=>array(
			'name'=>'家居',
			'hcat'=>array(
					'43'=>'家具、沙发、枕、垫、橱柜、非金属家具部件、玻璃镜子等',
			),
			'gcat'=>array(
					'42'=>'地板、木材',
					'47'=>'床上用品、床单、被罩、毛巾被、毯子、窗帘、纺织品壁挂、塑料家具罩、纺织品制家具罩、家具遮盖物、家具织物等',
					'60'=>'家具修复、家居保养、家具制造（修理）等',
					'63'=>'家具生产加工服务、层压板加工、木器制作、木材加工服务',
			),
		),
		'10'=>array(
			'name'=>'房产',
			'hcat'=>array(
					'59'=>'商品房销售、不动产中介',
					'60'=>'房屋建筑、室内装修',
			),
			'gcat'=>array(
					'63'=>'材料处理、加工服务',
					'68'=>'物业管理',
			),
		),
		'11'=>array(
			'name'=>'汽车',
			'hcat'=>array(
					'35'=>'汽车',
			),
			'gcat'=>array(
					'34'=>'车灯',
					'60'=>'汽车保养和修理、汽车清洗',
					'62'=>'汽车运输、汽车出租',
					'29'=>'汽车车轮锁',
			),
		),
		'12'=>array(
			'name'=>'旅游',
			'hcat'=>array(
					'62'=>'观光旅游、旅行安排、旅行社、商品包装、物流运输等',
			),
			'gcat'=>array(
					'64'=>'假日野营娱乐服务',
					'66'=>'餐饮、酒店、茶馆、住宿',
					'67'=>'疗养院、桑拿服务、（景区）风景设计、庭园设计',
			),
		),
		'13'=>array(
			'name'=>'文娱',
			'hcat'=>array(
					'64'=>'教育、电视文娱节目、电影、娱乐、在线游戏、健身俱乐部等',
			),
			'gcat'=>array(
					'39'=>'图书刊期报纸等',
					'58'=>'电视广告',
					'61'=>'电视播放',
					'68'=>'在线社交网络服务',
					'32'=>'软件程序',
			),
		),
		'14'=>array(
			'name'=>'医疗',
			'hcat'=>array(
					'28'=>'药品',
					'67'=>'医疗服务',
			),
			'gcat'=>array(
					'53'=>'保健食品',
					'33'=>'医疗器械',
			),
		),
		'15'=>array(
			'name'=>'商贸',
			'hcat'=>array(
					'58'=>'销售服务、在线商场',
			),
			'gcat'=>array(
					'62'=>'物流运输',
			),
		),
		'16'=>array(
			'name'=>'金融',
			'hcat'=>array(
					'59'=>'保险、金融事务、货币事务',
			),
			'gcat'=>array(
					'58'=>'会计',
			),
		),
		'17'=>array(
			'name'=>'机械',
			'hcat'=>array(
					'30'=>'各型机械',
					'35'=>'车辆器械和设备、陆海空器械和设备',
					'51'=>'运动’体育器械',
					'29'=>'机械金属零部件',
					'31'=>'手工用具和器械',
					'32'=>'电子机械产品、机械用紧密仪器',
			),
			'gcat'=>array(
					'60'=>'各型机械设备的安装与维修',
					'58'=>'机械设备的展览展示、代理销售、广告宣传等',
					'65'=>'机械研发、材料测试、电子器械软件安装等',
					'63'=>'机械加工',
					'62'=>'仓储运输',
			),
		),
		'18'=>array(
			'name'=>'化工',
			'hcat'=>array(
					'8'=>'化工产品等',
			),
			'gcat'=>array(
					'9'=>'防锈剂、天然树脂等',
					'10'=>'研磨材料',
					'11'=>'工业用润滑剂、除尘制剂等',
					'28'=>'医用化学试剂、农业杀菌试剂、空气净化制剂、消毒剂等',
					'30'=>'各种化学工用设备等',
					'40'=>'各种橡胶、塑料管、绝缘材料、纤维材料等',
					'65'=>'化学分析、研究、工程设计、分析',
					'63'=>'化学试剂加工和处理等',
			),
		),
		'19'=>array(
			'name'=>'能源',
			'hcat'=>array(
					'11'=>'煤、石油、燃气等燃料',
			),
			'gcat'=>array(
					'8'=>'化工原料等',
					'34'=>'燃料处理设备等',
					'63'=>'燃料加工',
			),
		),
		'20'=>array(
			'name'=>'建材',
			'gcat'=>array(
					'29'=>'金属建筑物、金属建筑构件等金属材料',
					'40'=>'保温、隔热、隔音材料、绝缘制品等橡胶材料',
					'42'=>'非金属建筑结构、可移动的非金属建筑物、大理石、石头',
					'9'=>'建筑用涂料',
					'10'=>'抛光制剂、抛光用硅藻石、建筑用砂布等',
					'30'=>'建筑机械、装卸设备等',
					'60'=>'建筑、建筑物装饰、施工、修理等',
					'63'=>'建材加工等',
			),	
		),
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	),
);