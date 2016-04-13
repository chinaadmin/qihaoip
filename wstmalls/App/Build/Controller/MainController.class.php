<?php
namespace Build\Controller;
use Think\Controller;
class MainController extends Controller {
	private $db = '';
	public function test(){
		new input();
	}
	
	public function drop_db($db){
		if($db){
			$sql = 'DROP TABLE qh_'.$db.'';
			M('')->query($sql);
			echo 'success!';
		} else {
			echo 'empty!';
		}
	}
	
    public function index($all=0){
    	$show = '';
    	$show .= '自动构建任务<br />';
    	$show .= U('build',['M'=>'Index','C'=>'Index']).'  用于创建Index模块下的Index控制器<br />';
    	if(is_dir(APP_PATH.'Build/db')){
    		if ($dh = opendir(APP_PATH.'Build/db'))
    			{
    				while (($file = readdir($dh)) !== false){
    					if(strstr($file, 'php')){
    						$file = str_replace('.php', '', $file);
    						$file = explode('_', $file);
    						$show .= '<a target="_blank" href="/Build/Main/builda/M/'.$file[0].'/C/'.$file[1].'/re/1.html" > /Build/Main/builda/M/'.$file[0].'/C/'.$file[1].'/re/1.html</a><br />';
    						if($all){
    							$this->builda($file[0],$file[1],$re=1);
    						}
    					}
    				}
    				
    			}
    	}
    	$this->show($show,'utf8');
    }
    
    public function build($M=null,$C=null){
    	// 生成Admin模块的Role控制器类
    	// 默认类库为Admin\Controller\RoleController
    	// 如果已经存在则不会重新生成
    	$str = '<h1>';
    	if(isset($M) && isset($C)){
    		if(!is_dir(APP_PATH.$M)){//如果APP目录不存在，则创建
    			\Think\Build::buildAppDir($M);//创建APP
    			$str .= $M.'模块已成功创建。<br />';
    		} else {
    			$str .= $M.'模块无须重复创建。<br />';
    		}
    		if(!file_exists(APP_PATH.$M.'/Controller/'.$C.'Controller.class.php')){
    			\Think\Build::buildController($M,$C);
    			\Think\Build::buildModel($M,$C);
    			$str .= $M.'模块的'.$C.'控制器和模型已成功生成。<br />';
    		} else {
    			$str .= $M.'模块的'.$C.'控制器无须重复生成。<br />';
    		}
    		$db_cfile = APP_PATH.'Build/db/'.$M.'_'.$C.'.php';
    		if(!file_exists($db_cfile)){
    			file_put_contents($db_cfile, '<?php'.PHP_EOL."	return array(".PHP_EOL."    		'db'         =>array('name'=>'".strtolower($C)."','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'数据名称','else'=>'数据备注'),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id','validType'=>'int(10)',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>'','min'=>'0','max'=>'0'),
    					
    		'data'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'数据','else'=>'数据详情','validType'=>'',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'textarea','data'=>'','min'=>'0','max'=>'0','ckeditor'=>1),//注意必须是textarea的ckeditor=1表示用富文本编辑器
    					
    		'sort'       =>array('type'=>'int(4)','isnull'=>'DEFAULT 100','auto'=>'','index'=>'index','about'=>'排序','else'=>'数字排序','validType'=>'int(4)',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>'','min'=>'0','max'=>'4'),
    					
    		'state'       =>array('type'=>'int(2)','isnull'=>'DEFAULT 1','auto'=>'','index'=>'index','about'=>'状态','else'=>'数据状态','validType'=>'int(2)',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'select','data'=>'USER_STATE','min'=>'0','max'=>'2'),
);");
    		}
    		$str .= '请查看'.$db_cfile.'文件，然后根据相关参数完善数据库配置，以进行下一步builda生成。</h1>';
    		$this->show($str,'utf8');
    	} else {
    		$this->show('请使用“/M/Admin/C/User”的参数来生成Admin模块的User类','utf8');
    	}
    }
    
    public function builda($M=null,$C=null,$re=0){
    	if($M && $C){
    		if($re){
    			$this->show('正在使用强制生成模式<br />','utf8');
    			$rebuild = TRUE;
    		} else {
    			$this->show('正在使用默认模式，已经生成的文件不会被强制更新，如需强制更新。请使用参数/re/1.html来使用强制更新模式。<br />注意：即使在强制更新模式下，模块、模块下各默认文件夹和模块主Base控制器都不会重复生成。','utf8');
    			$rebuild = FALSE;
    		}
    		echo '<h1>正在创建'.$M.'模块下的'.$C.'的所有功能<br />';
    		if($this->creat_db($M,$C,$rebuild)){
    			if($this->creat_Controller($M,$C,$rebuild)){
    				$this->creat_View($M,$C,$rebuild);
    			}
    		}
    		echo '</h1>';
    	} else {
    		$this->show('<h1>请输入模块M和控制器C<br /></h1>','utf8');
    	}
    }
    
    private function this_name(){
    	echo MODULE_NAME.'/'.CONTROLLER_NAME."/".ACTION_NAME;
    }
    
    private function creat_Controller($M=null,$C=null,$rebuild=false){
    	$filemain = APP_PATH.'Build/File/BaseController.txt';
    	$rfilemain = APP_PATH.$M.'/Controller/'.$M.'BaseController.class.php';
    	if(!file_exists($rfilemain)){
    		$con = file_get_contents($filemain);
    		$con = str_replace('{M}', $M, $con);
    		$con = str_replace('{C}', $C, $con);
    		if(file_put_contents($rfilemain, $con)){
    			echo $M.'模块下主基础Base控制器创建成功<br />';
    		} else {
    			echo $M.'模块下主基础Base控制器创建失败，请检查权限<br />';
    			return false;
    		}
    		
    	} else {
    		echo $M.'模块下主基础Base控制器无须重复创建<br />';
    	}
    	$filec = APP_PATH.'Build/File/Controller.txt';
    	$rfilec = APP_PATH.$M.'/Controller/'.$C.'Controller.class.php';
    	if(file_exists($rfilec)){
    		if(!$rebuild){
    			echo $M.'模块下'.$C.'控制器无需重新创建<br />';
    			return true;
    		} else {//当强制重建，则删除后重建
    			unlink($rfilec);
    			echo $M.'模块下'.$C.'控制器被强制删除<br />';
    		}
    	}
    	if(!file_exists($rfilec)){
    		$con = file_get_contents($filec);
    		$db_cfile = APP_PATH.'Build/db/'.$M.'_'.$C.'.php';
    		if(file_exists($db_cfile)){
    			$auto_build = require $db_cfile;
    		} else {
    			die('控制器创建失败，因为其数据库文件不存在。');
    		}
    		$db_help = new db_help();
    		$db_help->field($auto_build);
    		$con = str_replace('{fieldadd}', $db_help->fieldadd, $con);//添加数据时的数据验证
    		$con = str_replace('{fieldedit}', $db_help->fieldedit, $con);//编辑数据时的数据验证
    		$con = str_replace('{searchchk}', $db_help->searchchk, $con);//搜索时的数据检查和like方式处理
    		$con = str_replace('{M}', $M, $con);//替换Model
    		$con = str_replace('{C}', $C, $con);//替换Controller
    		$con = str_replace('{db}', $this->db, $con);//替换数据库名
    		
    		if(file_put_contents($rfilec, $con)){
    			echo $M.'模块下'.$C.'控制器创建成功<br />';
    		} else {
    			echo $M.'模块下'.$C.'控制器创建失败，请检查权限<br />';
    			return false;
    		}
    		
    	} else {
    		echo '目标控制器无须重复创建<br />';
    	}
    	return true;
    }
    
    private function creat_View($M=null,$C=null,$rebuild=false){
    	$filepath = APP_PATH.$M.'/View/'.$C.'/';
    	if(!is_dir($filepath)){
    		if(mkdir($filepath)){
    			echo $M.'模块下'.$C.'视图目录创建成功<br />';
    		} else {
    			echo $M.'模块下'.$C.'视图目录创建失败，请检查权限<br />';
    			return false;
    		}
    	}
    	$addfile = APP_PATH.'Build/File/admin_add.php';//获取模板文件
    	$editfile = APP_PATH.'Build/File/admin_edit.php';
    	$showfile = APP_PATH.'Build/File/admin_show.php';
    	$listfile = APP_PATH.'Build/File/admin_ShowList.php';
    	$addcon = file_get_contents($addfile);//获取模板文件内容
    	$editcon = file_get_contents($editfile);
    	$showcon = file_get_contents($showfile);
    	$listcon = file_get_contents($listfile);
    	$addview = $filepath.'admin_add.php';//获取目标文件地址
    	$editview = $filepath.'admin_edit.php';
    	$showview = $filepath.'admin_show.php';
    	$listview = $filepath.'admin_ShowList.php';
    	
    	$db_cfile = APP_PATH.'Build/db/'.$M.'_'.$C.'.php';//获取db文件
    	if(file_exists($db_cfile)){
    		$auto_build = require $db_cfile;
    	}
    	$class_name = $M.'-'.$C;
    	$input = new db_help();
    	$input->view($auto_build, $class_name);
    	
    	$addcon = str_replace('{name}', $input->name, $addcon);
    	$addcon = str_replace('{title}', $input->title, $addcon);
    	$addcon = str_replace('{add}', $input->add, $addcon);
    	$addcon = str_replace('{addchk}', $input->addchk, $addcon);
    	
    	$editcon = str_replace('{name}', $input->name, $editcon);
    	$editcon = str_replace('{title}', $input->title, $editcon);
    	$editcon = str_replace('{edit}', $input->edit, $editcon);
    	$editcon = str_replace('{editchk}', $input->editchk, $editcon);
    	
    	$showcon = str_replace('{name}', $input->name, $showcon);
    	$showcon = str_replace('{title}', $input->title, $showcon);
    	$showcon = str_replace('{show}', $input->show, $showcon);
    	
//     	$con = str_replace('{show_url}', $db_help->show_url, $con);//列表页查看时候显示的url
//     	$con = str_replace('{show_field}', $db_help->show_field, $con);//列表页查看的时候使用的字段
		
    	$listcon = str_replace('{name}', $input->name, $listcon);
    	$listcon = str_replace('{title}', $input->title, $listcon);
    	$listcon = str_replace('{search}', $input->search, $listcon);
    	$listcon = str_replace('{listhead}', $input->listhead, $listcon);
    	$listcon = str_replace('{list}', $input->list, $listcon);
    	$listcon = str_replace('{show_url}', $input->show_url, $listcon);
    	$listcon = str_replace('{show_field}', $input->show_field, $listcon);
    	    	
		if(file_exists($addview) && file_exists($editview) && file_exists($showview) && file_exists($listview)){
			if(!$rebuild){
				echo $M.'模块下'.$C.'视图文件无需重复创建，未发生任何更改。<br />';
				return true;
			} else {//当强制重建，则删除后重建
				unlink($addview);
				unlink($editview);
				unlink($showview);
				unlink($listview);
				echo $M.'模块下'.$C.'视图模板被强制删除，准备重建。<br />';
			}
		}
		
		if(file_put_contents($addview, $addcon)){
			echo $M.'模块下'.$C.'视图文件“新增数据”创建完毕<br />';
		}
		if(file_put_contents($editview, $editcon)){
			echo $M.'模块下'.$C.'视图文件“编辑数据”创建完毕<br />';
		}
		if(file_put_contents($showview, $showcon)){
			echo $M.'模块下'.$C.'视图文件“显示数据”创建完毕<br />';
		}
		if(file_put_contents($listview, $listcon)){
			echo $M.'模块下'.$C.'视图文件“数据列表”创建完毕<br />';
		}
		return true;
    }
    
    private function creat_Model($M=null,$C=null,$rebuild=false){
    	$file = APP_PATH.'Build/File/.php';
    }
    
    private function creat_db($M=null,$C=null,$rebuild=false){
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
    	array('id','bigint(20)|int(10)|decimal(9,2),varchar(255)|text|','NOT NULL|非空   DEFAULT NULL|默认为空   DEFAULT \'12345\'|默认值 ','AUTO_INCREMENT','PRIMARY|主键   UNIQUE|唯一    INDEX|索引','词条说明');
    	if($M && $C){
    		$db_cfile = APP_PATH.'Build/db/'.$M.'_'.$C.'.php';
    		if(file_exists($db_cfile)){
    			$auto_build = require $db_cfile;
    		} else {
    			echo '数据库文件'.'Build/db/'.$M.'_'.$C.'.php'.'不存在，无法构建！';
    			return false;
    		}
    	} else {
    		echo '数据库文件模块和控制器参数不存在，无法构建！';
    		return false;
    	}
    	$sql1 = '';
    	foreach ($auto_build as $k=>$row){
    		if($k=='db'){
    			$this->db = $row['name'];
    			$db_name = C('DB_PREFIX').$row['name'];
    			$sql2 = ') ENGINE='.$row['driver'].' DEFAULT CHARSET='.$row['char'].' AUTO_INCREMENT='.$row['incr'];
    			if($row['about']){
    				$sql2 .= ' COMMENT=\''.$row['about'].'\'';
    				$sql2 .= ';';
    			}
    		} else {
    			$sql1 .= '`'.$k.'` '.$row['type'].' '.$row['isnull'].' '.$row['auto'];
    			if($row['about']){
    				$sql1 .= ' COMMENT \''.$row['about'].'\'';
    			}
    			$sql1 .= ',';
    			if($row['index']){
    				if($row['index']=='PRIMARY'){
    					$sql1 .= 'PRIMARY KEY (`'.$k.'`),';
    				} else if($row['index']=='UNIQUE'){
    					$sql1 .= 'UNIQUE KEY `'.$k.'` (`'.$k.'`),';
    				} else if($row['index']=='INDEX'){
    					$sql1 .= 'KEY `'.$k.'` (`'.$k.'`),';
    				}
    	
    			}
    		}
    	}
    	 
    	$sql = 'CREATE TABLE IF NOT EXISTS `'.$db_name.'` ('.substr($sql1, 0, strlen($sql1)-1).$sql2;
//     	$this->show($sql.'<hr>','utf8');
    	try{
    		$db = M('');
    		$re = $db->execute($sql);
    	} catch (\Exception $e){
    		echo '数据库创建失败:',$e,'<br />';
    		return false;
    	}
    	echo '数据库创建成功(除非手动删除，否则数据库永远都不会被重复创建)！<br />';
    	return true;
    }
}