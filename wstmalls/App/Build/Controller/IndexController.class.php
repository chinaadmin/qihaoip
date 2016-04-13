<?php
namespace Build\Controller;
use Think\Controller;
class IndexController extends Controller {
	public function _initialize(){
		$this->show("该模块已暂停使用！",'utf8');exit;
	}
	private $db = '';
    public function index(){
    	$show = '';
    	$show .= '自动构建任务<br />';
    	$show .= U('Main/build',['M'=>'Index','C'=>'Index']).'  用于创建Index模块下的Index控制器<br />';
    	if(is_dir(APP_PATH.'Build/db')){
    		if ($dh = opendir(APP_PATH.'Build/db'))
    			{
    				while (($file = readdir($dh)) !== false){
    					if(strstr($file, 'php')){
    						$file = str_replace('.php', '', $file);
    						$file = explode('_', $file);
    						$show .= '<a target="_blank" href="/Build/Main/builda/M/'.$file[0].'/C/'.$file[1].'.html" > /Build/Index/builda/M/'.$file[0].'/C/'.$file[1].'.html</a><br />';
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
    			file_put_contents($db_cfile, '<?php'.PHP_EOL."	return array(".PHP_EOL."    		'db'         =>array('name'=>'".strtolower($C)."','driver'=>'InnoDB','char'=>'utf8','incr'=>'1','about'=>'','else'=>''),//MyISAM 读为主有优势，不支持事务 InnoDB 写为主有优势，支持事务
    					
    		'id'         =>array('type'=>'int(10)','isnull'=>'NOT NULL','auto'=>'AUTO_INCREMENT','index'=>'PRIMARY','about'=>'ID','else'=>'数据id',
    					'show'=>'0','add'=>'0','edit'=>'0','search'=>'1','input'=>'text','data'=>''),
    					
    		'data'       =>array('type'=>'varchar(64)','isnull'=>'DEFAULT NULL','auto'=>'','index'=>'','about'=>'数据','validType'=>'',
    					'show'=>'1','add'=>'1','edit'=>'1','search'=>'0','input'=>'text','data'=>''),
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
//     	$this->creat_Model($M=null,$C=null);
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
    		$con = str_replace('{M}', $M, $con);
    		$con = str_replace('{C}', $C, $con);
    		$con = str_replace('{db}', $this->db, $con);
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
    	$mainfile = APP_PATH.'Build/File/main.txt';
    	$con = file_get_contents($mainfile);
    	$db_cfile = APP_PATH.'Build/db/'.$M.'_'.$C.'.php';
    	$class_name = $M.'-'.$C;
    	if(file_exists($db_cfile)){
    		$auto_build = require $db_cfile;
    	}
    	$filepath = APP_PATH.$M.'/View/'.$C.'/';
    	if(!is_dir($filepath)){
    		if(mkdir($filepath)){
    			echo $M.'模块下'.$C.'视图目录创建成功<br />';
    		} else {
    			echo $M.'模块下'.$C.'视图目录创建失败，请检查权限<br />';
    			return false;
    		}	
    	}
    	$file = $filepath.'ajax_index.php';
    	$listcon = '';//列表内容
    	$editcon = '';//编辑器内容
    	$searchcon = '';//搜索内容
    	foreach ($auto_build as $k=>$row){
    		if($k=='db'){
    			if($row['about']){//标题
    				$about = $row['about'];
    			} else {
    				$about = $M.'-'.$C;
    			}
    			$con = str_replace('{about}', $about, $con);
    			$con = str_replace('{title}', $about.'-管理中心', $con);
    			if($row['else']){//描述
    				$about .= ':'.$row['else'];
    			}
    			$con = str_replace('{else}', $about, $con);
    		} else {
    			$input_temp = '';//当前框的html
    			$list_temp = '';
    			$search_temp = '';
    			if($row['show']){//如果可显示在列表中
    				if($row['about']){
    					$about = $row['about'];
    				} else {
    					$about = $k;
    				}
    				$list_temp = '
            	<th field="'.$k.'">'.$about.'</th>';//列表内容
    			}
    			
    			if($row['add'] || $row['edit'] || $row['search']){//任意一个成立则构造输入框
    				if($row['about']){
    					$about = $row['about'];
    				} else {
    					$about = $k;
    				}
    				$input_temp .= '
            <div class="fitem">
                <label>'.$about.':</label>';
    				if($row['input']=='text'){//*************文本
    					$input_temp .= '
    			<input name="'.$k.'" class="easyui-textbox" ';
    					if($row['data'] == 'must'){//是否必须
    						$input_temp .= ' required="true"';
    					}
    					if(isset($row['validType']) && $row['validType']){//是否必须
    						$input_temp .= ' validType="'.$row['validType'].'"';
    					}
    					$input_temp .= '>
            </div>';
    				} else if($row['input']=='textarea'){//*************文本区域
    					$input_temp .= '
    			<input name="'.$k.'" class="easyui-textbox" data-options="multiline:true" style="height:60px"';
    					if($row['data'] == 'must'){//是否必须
    						$input_temp .= ' required="true"';
    					}
    					if(isset($row['validType']) && $row['validType']){//验证规则
    						$input_temp .= ' validType="'.$row['validType'].'"';
    					}
    					$input_temp .= '>
            </div>';
    				} else if($row['input']=='radio'){//*************单选
    					if(is_array($row['data'])){//单选框，值存在
    						foreach ($row['data']  as $kk=>$vv){
    							$input_temp .= '
    			'.$vv.':<input name="'.$k.'" type="radio" style="width: 20;" value="'.$kk.'">';
    						}
    					} else {//单选框，值不存在
    						$input_temp .= '
    			选择：<input name="'.$k.'" type="radio" style="width: 20;" value="1">';
    					}
    					$input_temp .= '
            </div>';
    				} else if($row['input']=='checkbox'){//*************复选
    					if(is_array($row['data'])){//复选框，值存在
    						foreach ($row['data']  as $kk=>$vv){
    							$input_temp .= '
       			'.$vv.':<input name="'.$k.'" type="checkbox" style="width: 20;" value="'.$kk.'">';
    						}
    					} else {
    						$input_temp .= '
    			选择：<input name="'.$k.'" type="checkbox" style="width: 20;" value="1">';
    					}
    					$input_temp .= '
            </div>';
    				} else if($row['input']=='select'){//*************选择框
    					$input_temp .= '
    			<select class="easyui-combobox" name="'.$k.'">
    			<!--00-->';
    					if(is_array($row['data'])){//值存在
    						foreach ($row['data'] as $kk=>$vv){
    							$input_temp .= '
                <option value="'.$kk.'">'.$vv.'</option>';
    						}
    					} else if($row['data']){
    						$input_temp .= '<?php get_select('.$row['data'].'); ?>';
    					}
    					$input_temp .= '
                </select>
            </div>';
    				}
    			}
    			
    			if($row['search']){//如果可搜索
    				$search_temp = str_replace('<div class="fitem">', '', $input_temp);
    				$search_temp = str_replace('</div>', '', $search_temp);
    				$search_temp = str_replace('disabled="disabled"', '', $search_temp);
    				$search_temp = str_replace('<!--00-->', '<option value="0"></option>', $search_temp);
    				$search_temp = str_replace('required="true"', '', $search_temp);
    			}
    			
    			$listcon .= $list_temp;//列表内容
    			if($row['add'] || $row['edit']){
    				$editcon .= $input_temp;//编辑器内容
    			}
    			$searchcon .= $search_temp;
    		}
    	}
    	if($searchcon){
    		$searchcon =  '<form id="sh-{class}" method="post" novalidate>
                '.$searchcon.'
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch(\'dg-{class}\',\'dlg-{class}\',\'sh-{class}\',\'<?php echo U(\'ajax_serach\'); ?>\')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch(\'dg-{class}\',\'sh-{class}\',\'<?php echo U(\'ajax_cleanSearch\'); ?>\')">清空</a>
    </form>';
    	}
    	
    	$con = str_replace('{list}', $listcon, $con);
    	$con = str_replace('{edit}', $editcon, $con);
    	$con = str_replace('{search}', $searchcon, $con);
    	$con = str_replace('{class}', $class_name, $con);
//     	echo $listcon,'<hr>','<hr>';
//     	echo $editcon,'<hr>','<hr>';
//     	echo $searchcon,'<hr>','<hr>';
		if(file_exists($file)){
			if(!$rebuild){
				echo $M.'模块下'.$C.'视图模板无需重新创建<br />';
				return true;
			} else {//当强制重建，则删除后重建
				unlink($file);
				echo $M.'模块下'.$C.'视图模板被强制删除。<br />';
			}
		}
		if(file_put_contents($file, $con)){
			echo $M.'模块下'.$C.'视图模板创建完毕<br />';
			return true;
		}
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
    		$db = M('zero');
    		$re = $db->execute($sql);
    	} catch (\Exception $e){
    		echo '数据库创建失败:',$e,'<br />';
    		return false;
    	}
    	echo '数据库创建成功(除非手动删除，否则数据库永远都不会被重复创建)！<br />';
    	return true;
    }
}