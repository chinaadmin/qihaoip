<?php
/***
Article文章***
id,groupid,style,title,keywords,description,content,addtime,views,editor,state,sort,hot,top
 * 
 */
	return array(
    		'db'         =>array('name'=>'article','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'文章管理','else'=>'文章包含新闻资讯帮助等各种图文数据','show_url'=>'/news/<?php echo $row[\'date\'],\'/\',$row[\'id\']; ?>','show_field'=>'id'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'groupid'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'index','about'=>'分类','else'=>'分类id',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'articles','min'=>0,'max'=>10),
			
			'style'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'模板式样','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'title'         =>array('type'=>'varchar(64)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'标题','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'like','input'=>'text','data'=>'must','min'=>4,'max'=>60),
			
			'keywords'         =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'关键词','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'description'         =>array('type'=>'varchar(255)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'描述','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'content'         =>array('type'=>'text','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'内容','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>'must','min'=>15,'max'=>0,'ckeditor'=>1),
			
			'img'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'文章图片','else'=>'数据详情',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'file','data'=>''),
			
			'date'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'index','about'=>'添加日期','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>'autodate'),
			
			'addtime'         =>array('type'=>'varchar(16)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'添加时间','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'0','search'=>'0','input'=>'text','data'=>'autotime'),
			
			'views'         =>array('type'=>'int(10)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'查看次数','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'editor'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'发布者','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'text','data'=>''),
			
			'state'         =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'状态','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ITEM_STATE'),
			
			'sort'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'排序','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'100'),
			
			'hot'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'首页推荐','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ARTICLE_TYPE'),
			
			'hot1'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'','about'=>'资讯首页推荐','else'=>'数据详情',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'ARTICLE_TYPE'),
);