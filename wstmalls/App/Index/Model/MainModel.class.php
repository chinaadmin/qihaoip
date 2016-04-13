<?php
namespace Index\Model;
use Think\Model;
class MainModel extends Model {
    	/**
    	 *
    	 *
    	 *
    	 CREATE TABLE IF NOT EXISTS `main` (
    	 `id` int(10) NOT NULL AUTO_INCREMENT,
    	 `name` varchar(255) DEFAULT '0',
    	 `else` text NOT NULL,
    	 `about` tinyint(4) DEFAULT NULL,
    	 `time` int(11) NOT NULL COMMENT '注释',
    	 PRIMARY KEY (`id`),
    	 UNIQUE KEY `about` (`about`),
    	 KEY `name` (`name`)
    	 ) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
    	 MyISAM 读为主有优势，不支持事务
    	 InnoDB 写为主有优势，支持事务
    	 * @var unknown
    	 */
    	//ALTER TABLE `main` ADD `aaa` VARCHAR(11) NOT NULL ;
    	//PRIMARY|主键   UNIQUE|唯一    INDEX|索引
    	//array('id','bigint(20)|int(10)|decimal(9,2),varchar(255)|text|','NOT NULL|非空   DEFAULT NULL|默认为空   DEFAULT \'12345\'|默认值 ','AUTO_INCREMENT','PRIMARY|主键   UNIQUE|唯一    INDEX|索引','词条说明');
    	public $auto_build = array(
    			//id|属性及长度|是否为空|自增长|主键|备注|||显示|编辑|编辑类型|允许值
    			array('id','int(10)','NOT NULL','AUTO_INCREMENT','PRIMARY','其他'),
    			array('firstname','varchar(32)','DEFAULT NULL','','','姓'),
    			array('lastname','varchar(32)','DEFAULT NULL','','','名'),
    			array('phone','varchar(32)','DEFAULT NULL','','','电话'),
    			array('email','int(32)','NOT NULL','','','邮箱'),
    			array('which','varchar(32)','DEFAULT NULL','','','选择'),
    			array('file','varchar(16)','NOT NULL','','','文件'),
    			array('sex','varchar(16)','DEFAULT NULL','','','性别'),
    			array('top','int(16)','NOT NULL','','','排序'),
    			array('color','varchar(16)','DEFAULT NULL','','','颜色'),
    			array('db','main','InnoDB','utf8','1'),
    	);
}