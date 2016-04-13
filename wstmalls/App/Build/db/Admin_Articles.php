<?php
/***
 * Articles文章组***
id,upid,name,indexstyle,liststyle,title,keywords,description,about,sort
 */

	return array(
    		'db'         =>array('name'=>'articles','driver'=>'MyISAM','char'=>'utf8','incr'=>'1','about'=>'文章分类','else'=>'包含新闻资讯帮助文档等分类'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    		
			'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'1','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
			
    		'upid'         =>array('type'=>'int(10)','isnull'=>'DEFAULT 0','auto'=>'','index'=>'index','about'=>'上级分类','else'=>'',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'1','input'=>'select','data'=>'articles,upid=0'),
			
			'name'         =>array('type'=>'varchar(16)','isnull'=>'NOT NULL','auto'=>'','index'=>'','about'=>'分类名称','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'must'),
			
			'ename'         =>array('type'=>'varchar(10)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'分类英文名称','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'indexstyle'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'首页式样','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'liststyle'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'列表式样','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'title'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'标题','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'keywords'         =>array('type'=>'varchar(128)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'关键词','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'description'         =>array('type'=>'varchar(256)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'描述','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>''),
			
			'about'         =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'说明','else'=>'',
					'show'=>'0','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
			
			'sort'         =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'','about'=>'排序','else'=>'',
					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
);