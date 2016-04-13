<?php
namespace Build\Controller;
class db_help {
	public $listhead = '';//列表页头部
	public $list = '';//列表页显示
	public $search = '';//列表页搜索
	public $searchchk = '';//搜索检查like
	
	public $edit = '';//显示层编辑
	public $editchk = '';//显示层编辑数据时js检查
	
	public $add = '';//显示层增加
	public $addchk = '';//显示层添加数据时js检查
	
	public $show = '';//显示层显示数据
	
	public $fieldadd = '';//控制器添加时的数据
	public $fieldedit = '';//控制器编辑时的数据
	
	public $title = '';//公共的数据头
	public $name = '';//公共的数据名称
	
	public $show_url = 'admin_show/id/<?php echo $row[\'id\'] ?>';//列表页查看时候显示的url
	public $show_field = 'id';//列表页查看的时候使用的字段
	public function field($array){//控制器的field数据
		foreach ($array as $k=>$v){
			if($k=='db'){
				//
			} else {
				if(!isset($v['min']) || !$v['min']){$v['min']=0;}
				if(!isset($v['max']) || !$v['max']){$v['max']=0;}
				$name = $v['about']?$v['about']:$k;
				if($v['search']){//是否搜索
					if($v['search']=='like'){
						$this->searchchk .= '		if(isset($search[\''.$k.'\'])){$this->_where[\''.$k.'\'] = array(\'LIKE\',\'%\'.$search[\''.$k.'\'].\'%\');}
';
					} else {
						$this->searchchk .= '		if(isset($search[\''.$k.'\'])){$this->_where[\''.$k.'\'] = $search[\''.$k.'\'];}
';
					}
				}
				
				if($v['data']=='autotime'){//
					$this->fieldadd .= '			$value[\''.$k.'\'] = time();
';
					$this->fieldedit .= '			$value[\''.$k.'\'] = time();
';
				} else if($v['data']=='autodate'){
					$this->fieldadd .= '			$value[\''.$k.'\'] = date(\'Ymd\');
';
				} else {//数据检查
					if($v['add']){
					$this->fieldadd .= '			$value[\''.$k.'\'] = $this->I_chk(\'post.'.$k.'\',\''.$name.'\','.$v['min'].','.$v['max'].');
';
					}
					if($v['edit']){
						$this->fieldedit .= '			$value[\''.$k.'\'] = $this->I_chk(\'post.'.$k.'\',\''.$name.'\','.$v['min'].','.$v['max'].');
';
					}
				}
			}
		}
	}
	
	public function view($array,$class_name){//显示层数据
		foreach ($array as $k=>$v){
			if($k=='db'){
				$this->name = $v['about']?$v['about']:$v['name'];
				$this->title = $this->name.($v['else']?('-'.$v['else']):'');
				if(isset($v['show_url'])){$this->show_url = $v['show_url'];}
				if(isset($v['show_field'])){$this->show_field = $v['show_field'];}
			} else {
				$this->show .= '          <div class="container-fluid">
          <div class="col-sm-2 col-md-1 col-lg-1"><strong>'.($v['about']?$v['about']:$k).'</strong></div>
';
				$this->show .= '          <div class="col-sm-10 col-md-11 col-lg-11"><p><?php echo $data[\''.$k.'\']; ?></p></div>
          </div>
';
				$this->$v['input']($v,$k,$class_name);
			}
		}
	}
	
	private function text($arr,$name,$class_name){//文本域
		$idname = $class_name.'-'.$name;
		$must = '';
		if($arr['data']=='must'){
			$must .= ' placeholder="必填:'.$arr['about'].'" required';
		} else {
			$must .= ' placeholder="'.$arr['about'].'"';
		}
		
		if($arr['show']){//是否显示
			$this->listhead .= '                  <th>'.$arr['about'].'</th>
';
			if($arr['data']=='autotime'){
				$this->list .= '                  <td><?php echo date(\'Y-m-d H:i:s\',$row[\''.$name.'\']); ?></td>
';
			} else {
				$this->list .= '                  <td><?php echo $row[\''.$name.'\']; ?></td>
';
			}
		}
		
		if($arr['add']){//是否添加
			if($arr['data']=='autodate' || $arr['data']=='autotime'){//如果数据是自动添加时间或者日期，则无需添加
			} else {
				$this->add .= '  <div class="form-group">
    <label for="'.$idname.'" class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="'.$name.'" id="'.$idname.'" <?php if(isset($data[\''.$name.'\'])){echo \'value="\'.$data[\''.$name.'\'].\'"\'; } ?> '.$must.'>
    </div>
  </div>
';
				if((isset($arr['min']) && $arr['min']) || (isset($arr['max']) && $arr['max'])){//最小值和最大值只要有一个通过就需要验证
					$this->addchk .= '	if(!chk_v_l(\''.$idname.'\',\''.$arr['about'].'\','.$arr['min'].','.$arr['max'].')){return false;};
';
				}
			}

		}
		
		if($arr['edit']){//是否编辑
			if($arr['data']=='autodate' || $arr['data']=='autotime'){//如果数据是自动添加时间或者日期，则无需编辑
			} else {
				$this->edit .= '  <div class="form-group">
    <label for="'.$idname.'" class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <input type="text" class="form-control" name="'.$name.'" id="'.$idname.'" <?php if(isset($data[\''.$name.'\'])){echo \'value="\'.$data[\''.$name.'\'].\'"\'; } ?> '.$must.'>
    </div>
  </div>
';
				if((isset($arr['min']) && $arr['min']) || (isset($arr['max']) && $arr['max'])){//最小值和最大值只要有一个通过就需要验证
					$this->editchk .= '	if(!chk_v_l(\''.$idname.'\',\''.$arr['about'].'\','.$arr['min'].','.$arr['max'].')){return false;};
';
				}
			}
			
		}
		
		if($arr['search']){//是否搜索
			$this->search .= '  <div class="form-group">
    <label for="'.$idname.'">'.$arr['about'].'</label>
    <input type="text" class="form-control input-sm" name="'.$name.'" id="'.$idname.'" <?php if(isset($search[\''.$name.'\'])){echo \'value="\'.$search[\''.$name.'\'].\'"\'; } else {echo \'placeholder="'.$arr['else'].'"\'; } ?>>
  </div>
';			
		}
	}
	
	private function image($arr,$name,$class_name){//文件域
		$idname = $class_name.'-'.$name;
		$must = '';
		if($arr['data']=='must'){
			$must .= ' required';
		}
	
		if($arr['show']){//是否显示
			$this->listhead .= '                  <th>'.$arr['about'].'</th>
';
			$this->list .= '                  <td><?php echo $row[\''.$name.'\']?\'<a href="\'.$row[\''.$name.'\'].\'" target="_blank"><img src="\'.$row[\''.$name.'\'].\'" width="200px"></a>\':\'\'; ?></td>
';
	
		}
	
		if($arr['add']){//是否添加
			$this->add .= '  <div class="form-group">
    <label for="'.$idname.'" class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="'.$idname.'-show"><?php if(isset($data[\''.$name.'\']) && $data[\''.$name.'\']){echo \'<a href="\'.$data[\''.$name.'\'].\'" target="_blank"><img src="\'.$data[\''.$name.'\'].\'" width="200px"></a>\'; } ?></div>
    <input type="text" class="form-control" id="'.$idname.'-hidden" name="'.$name.'" <?php if(isset($data[\''.$name.'\'])){echo \'value="\'.$data[\''.$name.'\'].\'"\'; } ?> '.$must.'><input type="file" class="form-control" name="file" id="'.$idname.'" onchange="return ajaxFileUpload(\''.$idname.'\',\'image\')">
    </div>
  </div>
';
		}
	
		if($arr['edit']){
			$this->edit .= '  <div class="form-group">
    <label for="'.$idname.'" class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="'.$idname.'-show"><?php if(isset($data[\''.$name.'\']) && $data[\''.$name.'\']){echo \'<a href="\'.$data[\''.$name.'\'].\'" target="_blank"><img src="\'.$data[\''.$name.'\'].\'" width="200px"></a>\'; } ?></div>
    <input type="text" class="form-control" id="'.$idname.'-hidden" name="'.$name.'" <?php if(isset($data[\''.$name.'\'])){echo \'value="\'.$data[\''.$name.'\'].\'"\'; } ?> '.$must.'><input type="file" class="form-control" name="file" id="'.$idname.'" onchange="return ajaxFileUpload(\''.$idname.'\',\'image\')">
    </div>
  </div>
';
		}
	}
	
	private function file($arr,$name,$class_name){//文件域
		$idname = $class_name.'-'.$name;
		$must = '';
		if($arr['data']=='must'){
			$must .= ' required';
		}
	
		if($arr['show']){//是否显示
			$this->listhead .= '                  <th>'.$arr['about'].'</th>
';
			$this->list .= '                  <td><?php echo $row[\''.$name.'\']?\'<a href="\'.$row[\''.$name.'\'].\'" target="_blank">\'.($row[\''.$name.'\']).\'</a>\':\'\'; ?></td>
';
				
		}
	
		if($arr['add']){//是否添加
			$this->add .= '  <div class="form-group">
    <label for="'.$idname.'" class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="'.$idname.'-show"><?php if(isset($data[\''.$name.'\']) && $data[\''.$name.'\']){echo \'<a href="\'.$data[\''.$name.'\'].\'" target="_blank">\'.$data[\''.$name.'\'].\'</a>\'; } ?></div>
    <input type="text" class="form-control" id="'.$idname.'-hidden" name="'.$name.'" <?php if(isset($data[\''.$name.'\'])){echo \'value="\'.$data[\''.$name.'\'].\'"\'; } ?> '.$must.'><input type="file" class="form-control" name="file" id="'.$idname.'" onchange="return ajaxFileUpload(\''.$idname.'\',\'file\')">
    </div>
  </div>
';
		}
	
		if($arr['edit']){
			$this->edit .= '  <div class="form-group">
    <label for="'.$idname.'" class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <div id="'.$idname.'-show"><?php if(isset($data[\''.$name.'\']) && $data[\''.$name.'\']){echo \'<a href="\'.$data[\''.$name.'\'].\'" target="_blank">\'.$data[\''.$name.'\'].\'</a>\'; } ?></div>
    <input type="text" class="form-control" id="'.$idname.'-hidden" name="'.$name.'" <?php if(isset($data[\''.$name.'\'])){echo \'value="\'.$data[\''.$name.'\'].\'"\'; } ?> '.$must.'><input type="file" class="form-control" name="file" id="'.$idname.'" onchange="return ajaxFileUpload(\''.$idname.'\',\'file\')">
    </div>
  </div>
';
		}
	}
	
	private function textarea($arr,$name,$class_name){//文本区域
		$idname = $class_name.'-'.$name;
		if(isset($arr['ckeditor']) && $arr['ckeditor']){
			$editname = 'ckeditor';
		} else {
			$editname = $idname;
		}
		$must = '';
		if($arr['data']=='must'){
			$must .= ' placeholder="必填:'.$arr['about'].'" required';
		} else {
			$must .= ' placeholder="'.$arr['about'].'"';
		}
		if($arr['show']){//是否显示
			$this->listhead .= '                  <th>'.$arr['about'].'</th>
';
			$this->list .= '                  <td><?php echo $row[\''.$name.'\'] ?></td>
';
		}
		
		if($arr['add']){//是否添加
			
			$this->add .= '<div class="form-group">
    <label class="col-sm-2 col-md-1 col-lg-1  control-label" for="'.$editname.'">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="'.$name.'" id="'.$editname.'" class="col-sm-12 col-md-12 col-lg-12" '.$must.'><?php if(isset($data[\''.$name.'\'])){echo $data[\''.$name.'\']; } ?></textarea>
    </div>
  </div>
';
		}
		
		if($arr['edit']){//是否编辑
			$this->edit .= '  <div class="form-group">
    <label for="'.$editname.'" class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <textarea rows="2" name="'.$name.'" id="'.$editname.'" class="col-sm-12 col-md-12 col-lg-12" '.$must.'><?php if(isset($data[\''.$name.'\'])){echo $data[\''.$name.'\']; } ?></textarea>
    </div>
  </div>
';
		}
		
		if($arr['search']){//是否搜索
			$this->search .= '  <div class="form-group">
    <label for="'.$idname.'">'.$arr['about'].'</label>
    <input type="text" class="form-control input-sm" name="'.$name.'" id="'.$idname.'" <?php if(isset($search[\''.$name.'\'])){echo \'value="\'.$search[\''.$name.'\'].\'"\'; } ?>>
  </div>
';
		}
	}
	
	private function select($arr,$name,$class_name){//选择框
		$idname = $class_name.'-'.$name;
		if($arr['show']){//是否显示
			$this->listhead .= '                  <th>'.$arr['about'].'</th>
';
			$this->list .= '                  <td><?php echo $row[\''.$name.'\'] ?></td>
';
		}
			$arrdata = explode(',', $arr['data']);
			$datastr = '';
			$searchstr = '';
			$i=0;
			foreach ($arrdata as $row){
				if($row){
					$datastr .= '\''.$row.'\', ';
					$searchstr .= '\''.$row.'\', ';
					if($i==0){
						$datastr .= '$data[\''.$name.'\'], ';
						$searchstr .= '$search[\''.$name.'\'], ';
					}
					$i++;
				}
				
			}
			$datastr = substr($datastr, 0,strlen($datastr)-2);
			$searchstr = substr($searchstr, 0,strlen($searchstr)-2);
			$add = '  <div class="form-group">
    <label for="'.$idname.'"  class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-3 col-md-2 col-lg-2">
    <select class="form-control" id="'.$idname.'" name="'.$name.'">
    <option value ="0">未选择</option>
<?php get_select('.$datastr.') ?>
	</select>
	</div>
  </div>';
			$search = '  <div class="form-group">
    <label for="'.$idname.'">'.$arr['about'].'</label>
    <select class="form-control" id="'.$idname.'" name="'.$name.'">
    <option value ="0">未选择</option>
<?php get_select('.$searchstr.') ?>
	</select>
  </div>';
		if($arr['add']){
			$this->add .= $add;	
		}
		
		if($arr['edit']){
			$this->edit .= $add;
		}
		
		if($arr['search']){
			$this->search .= $search;
		}
	}
    
	private function checkbox($arr,$name,$class_name){//多选框
		$add = '  <div class="form-group">
  	<label class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <label class="form-control">
      <input type="checkbox"> Check me out
      <input type="checkbox"> Check he out
      <input type="checkbox"> Check me out
    </label>
    </div>
  </div>';
	}
	
	private function radio($arr,$name,$class_name){//单选框
		$add = '  <div class="form-group">
  	<label class="col-sm-2 col-md-1 col-lg-1  control-label">'.$arr['about'].'</label>
    <div class="col-sm-10 col-md-11 col-lg-11">
    <label class="form-control" >
      <input type="radio" name="sex" value="male"> set off
      <input type="radio" name="sex" value="fmale"> set on
      <input type="radio" name="sex" value="nothing"> set nothing
    </label>
    </div>
  </div>';
	}
}