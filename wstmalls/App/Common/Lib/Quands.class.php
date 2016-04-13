<?php
namespace Common\Lib;
class Quands{
	public $config = array(
// 			'url'=>'http://115.182.102.40:8083/brand/api',//测试URL
			'url'=>'http://unions.quandashi.cn:8083/brand/api',//正式URL
			'appKey'=>'21395037',//应用KEY
			'signKey'=>'skciehfj4892hdosoAjw89cOi39dhje3'//加密密钥111
	);
	public $data;
	public $debugInfo;
	public function __construct(){
		$this->data['v'] = '1.0';//版本号
		$this->data['appKey'] = $this->config['appKey'];
		$this->data['format'] = 'json';//json或者xml
		$this->data['locale'] = 'zh_CN';//zh_CN或en
	}

	/**
	 * 权大师列表搜索页面
	 * @param 要检索的数据 string $q
	 * @param 检查类型 $type （agency 代理机构，applicant 申请人，data_id 申请注册号，name 商标名称）
	 * @param 商标的大类（45个） $class
	 * @param 页数 $page
	 * @return 返回 josn格式字符串 mixed
	 */
	public function search($q='',$type='',$class='',$num='10',$page='0'){
		/***
		* agency 代理机构
		* applicant 申请人
		* data_id 申请注册号
		* name 商标名称
		*
		* typeCode 分类号
		*/
		$page = $page + 0;
		if($page<0){
			$page = 0;
		}
		$type_array = array(
			'agency',//代理机构
			'applicant',//申请人
			'data_id',//申请注册号
			'name',//商标名称
		);
		$post_data = $this->data;
		$post_data['timeStamp'] = time().'000';//时间戳
		$post_data['method'] = 'brighthead.brand.search';//
		$post_data['q'] = $q;
		if(in_array($type, $type_array)){
			$post_data['field'] = $type;
		} else {
			$post_data['field'] = 'all';
		}
		$class==''||$class==0?'':$post_data['typeCode'] = $class;//$class不为空才赋值
		$post_data['page'] = $page;//
		$post_data['pageSize'] = '10';//
		$post_data = $this->sign($post_data);
		$data = $this->post($post_data);
		
// 		echo $data,PHP_EOL;
		$data = json_decode($data,true);
		$arr['status'] = 'OK';
		$arr['request_id'] = '145645571617790786558173';
		if(isset($data['items']) && count($data['items'])){
			
		} else {
			return json_encode(array());
		}
		foreach ($data['items'] as $k=>$row){
			$items[$k] = array(
					'fid'=>$row['dataId'],   //搜索的时候用id:1234111
					'fclass'=>$row['typeCode'],   //类别
					'ftmid'=>$row['dataId'],         //id二进制
					'ftmchin'=>$row['name'],         //中文
					'ftmeng'=>$row['enName'],         //英文
					'ftmpy'=>'',         //拼音
					'ftmhead'=>'',         //商标头（拼音缩写？）
					'fsqdate'=>$row['createDate'],         //申请日期
					'fzcdate'=>$row['registerDate'],         //注册日期
					'fggq'=>$row['noticeIssue'],        //公告期
					'fbgq'=>$row['registerIssue'],         //变更期
					'fsqr1'=>$row['applicant'],         //申请人1
					'fbgqh1'=>'',         //变更期号1
					'fbgdate1'=>'',         //变更日期1
					'fsqr2'=>'',         //申请人2（变更之前）
					'faddr'=>$row['adress'].$row['enAdress'],    //地址
					'fdlzz'=>$row['agency'],         //代理组织
					'fbz'=>'',         //备注
					'fsysp'=>$row['serviceName'],         //使用商品
					'fbguserid'=>$row['statusFlag'],         //法律状态1:有效；2:无效；3:待审；4:不定  5-未知状态
					'ftmjpm'=>'',         //商标简拼名
					'farea'=>'',         //区域（数组）
					'fspzb'=>$row['similarCode'],         //群组（数字用“|”隔开）
					'fjzdate'=>$row['privateEndDate'],         //截止日期
					'fcsdate'=>$row['privateStartDate'],         //初始日期
					'fzdys'=>'',         //
			);
		}
		$result['searchtime'] = $data['QTime'];
		$result['total'] = $data['totalResults'];
		$result['num'] = '10';
		$result['viewtotal'] = $data['totalResults'];
		$result['items'] = $items;
		$arr['result'] = $result;
		return json_encode($arr);
	}

	/**
	 * 通过注册号查询 商标详情
	 * @param 商标注册号 $tmid
	 * @return 返回json格式字符串
	 */
	public function get($tmid,$class='0',$type='dev'){
		$post_data = $this->data;
		$post_data['timeStamp'] = time().'000';//时间戳111
		$post_data['method'] = 'brighthead.brand.get';//
		$post_data['dataId'] = $tmid;
		$post_data = $this->sign($post_data);
		$data = $this->post($post_data);
		if($type=='test'){
			echo $data;
		}
		$data = json_decode($data,true);
		$arr['status'] = 'OK';
		$arr['request_id'] = '145645571617790786558173';
		$goodsname = '';//使用商品
		$goodscode = '';//群组
		if(isset($data['goodsList']) && count($data['goodsList'])){
			foreach ($data['goodsList'] as $row){
				$goodsname .= $row['name'].'|';
				$goodscode .= $row['code'].'|';
			}
			$goodsname = substr($goodsname, 0, -1);
			$goodscode = substr($goodscode, 0, -1);
		}

		$dynamic = array();
		$i = 0;
		foreach ($data['flowList'] as $value){//商标状态流水
// 			$dynamic[$i]['time0'] = $value['lastTime'];
			$dynamic[$i]['time'] = $value['lastTime']?$this->date_f($value['lastTime']):'';
			$dynamic[$i]['type'] = $value['name'];
			$i++;
		}
		foreach ($data['noticeList'] as $value){//商标公告流水
// 			$dynamic[$i]['time0'] =$value['noticeDate'];
			$dynamic[$i]['time'] = $value['noticeDate']?$this->date_f($value['noticeDate']):'';
			$dynamic[$i]['type'] = $value['noticeName'];
			$i++;
		}
		
		$arr['dynamic'] = $dynamic;//商标状态流水和公告流水
		
		if(isset($data['brand']) && count($data['brand'])){
				
		} else {
			return json_encode(array());
		}
		$items[0] = array(
					'fid'=>$data['brand']['dataId'],   //搜索的时候用id:1234
					'fclass'=>$data['brand']['typeCode'],   //类别
					'ftmid'=>$data['brand']['dataId'],         //id二进制
					'ftmchin'=>$data['brand']['name'],         //中文
					'ftmeng'=>$data['brand']['enName'],         //英文
					'ftmpy'=>'',         //拼音
					'ftmhead'=>'',         //商标头（拼音缩写？）
					'fsqdate'=>$data['brand']['createDate'],         //申请日期
					'fzcdate'=>$data['brand']['registerDate'],         //注册日期
					'fggq'=>$data['brand']['noticeIssue'],        //公告期
					'fbgq'=>$data['brand']['registerIssue'],         //变更期
					'fsqr1'=>$data['brand']['applicant'],         //申请人1
					'fbgqh1'=>'',         //变更期号1
					'fbgdate1'=>'',         //变更日期1
					'fsqr2'=>'',         //申请人2（变更之前）
					'faddr'=>$data['brand']['adress'].$data['brand']['enAdress'],         //地址
					'fdlzz'=>$data['brand']['agency'],         //代理组织
					'fbz'=>'',         //备注
					'fsysp'=>$goodsname,         //使用商品$row['serviceName']
					'fbguserid'=>$data['brand']['statusFlag'],         //法律状态1:有效；2:无效；3:待审；4:不定  5-未知状态
					'ftmjpm'=>'',         //商标简拼名
					'farea'=>'',         //区域（数组）
					'fspzb'=>$goodscode,         //群组（数字用“|”隔开）$row['similarCode']
					'fjzdate'=>$data['brand']['privateEndDate'],         //截止日期
					'fcsdate'=>$data['brand']['noticeDate'],         //初始日期
					'fzdys'=>'',         //
		);
		$result['total'] = '1';
		$result['num'] = '1';
		$result['items'] = $items;
		$arr['result'] = $result;
		return json_encode($arr);
	}

	
	public function test_get($tmid,$class='0'){
		$post_data = $this->data;
		$post_data['timeStamp'] = time().'000';//时间戳
		$post_data['method'] = 'brighthead.brand.get';//
		$post_data['dataId'] = $tmid;
		$post_data = $this->sign($post_data);
		return $this->post($post_data);
	}
	
	/**
	 * 时间规范化
	 */
	private function date_f($date){
		$date = strtotime($date);
		$date = date('Y-m-d',$date);
		return $date;
	}
	
	/**
	 * 签名函数
	 * @param unknown $data
	 * @return string
	 */
	private function sign($data){
		ksort($data);
		$str = '';
		foreach ($data as $k=>$v){
			$str .= $k.$v;
		}
		$str = $this->config['signKey'].$str.$this->config['signKey'];
		$data['sign'] = strtoupper(sha1($str));//
		return $data;
	}

	/**
	 * post通信函数
	 * @param 发送的数组 $post_data
	 * @return 返回json格式数据
	 */
	private function post($post_data = ''){//curl
		$url = $this->config['url'];
		if(is_array($post_data)){
			$url .= '?';
			foreach ($post_data as $k=>$v){
				$url .= $k.'='.urlencode($v).'&';
			}
			$url = substr($url, 0 , -1);
		}
		$ch = curl_init();
		curl_setopt ($ch, CURLOPT_URL, $url);
		curl_setopt ($ch, CURLOPT_POST, 1);
		if($post_data != ''){
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		}
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, '10');
		curl_setopt($ch, CURLOPT_HEADER, false);
		$file_contents = curl_exec($ch);
		curl_close($ch);
		return $file_contents;
	}
}