<?php
namespace Trade\Controller;
class AutoController extends TradeBaseController {
	public function _initialize(){
		set_time_limit(0);//无限运行时间
		ignore_user_abort();//关掉浏览器脚本继续运行
	}
	
	public function renewalMsg(){
		$m = M('user_trade');
		if(date('L',time()+31536000)==1){
			$ymd = time()+31622400;
		}else{
			$ymd = time()+31536000;
		}
		$time_where = strtotime(date("Y-m-d",strtotime("-6 month")));
		$where['zd_date'] = array(array('elt',$ymd),array('gt',1),array('gt',$time_where));
		$where['trade_dynamic_state'] = array(array('eq','102'),array('eq','105'),'or');
		$user_data = $m->field('qh_user_trade.user_id,qh_member.username,qh_member.name,qh_member.email,qh_member.mobile,qh_member.aid as parend_id')->join('left join qh_member on qh_user_trade.user_id = qh_member.id','LEFT')->group('user_id')->where($where)->select();
		
		if($user_data){
			foreach($user_data as $key=>$val){
				
				$where['user_id'] = $val['user_id'];
				//$user_trade_data = $m->field('qh_user_trade.id,qh_user_trade.uid,qh_user_trade.trade_name,qh_user_trade.user_id,qh_user_trade.trade_id,qh_user_trade.trade_class_id,qh_user_trade.trade_user,qh_user_trade.type,qh_user_trade.combination_state,qh_user_trade.state,qh_user_trade.zd_date,qh_user_trade.trade_dynamic_state,qh_user.username,qh_user.email,qh_user.email_msg,qh_user.mobile_phone,qh_user.mobile_phone_msg')->join('left join qh_user on qh_user_trade.user_id = qh_user.id','LEFT')->where($where)->select();
				$user_trade_data = $m->where($where)->select();
				$i0=0;$i1=0;$i2=0;$i3=0;$i4=0;
				foreach($user_trade_data as $k =>$v){
					if( strtotime(date("Y-m-d",strtotime("+12 month")))>=$v["zd_date"] && $v["email_msg_state"]=="0"){
						$i0++;
					}
					if( strtotime(date("Y-m-d",strtotime("+6 month")))>=$v["zd_date"] && $v["email_msg_state"]=="1"){
						$i1++;
					}
					if( strtotime(date("Y-m-d",strtotime("+1 month")))>=$v["zd_date"] && $v["email_msg_state"]=="2"){
						$i2++;
					}
					if( time()>=$v["zd_date"] && $v["email_msg_state"]=="3"){
						$i3++;
					}
					if(strtotime(date("Y-m-d",strtotime("-1 month")))>=$v['zd_date'] && $v["email_msg_state"]=="4"){
						$i4++;
					}
				}
				$total = $i0+$i1+$i2+$i3+$i4;
				if($total>0){
			
						$conttent = '<table width="700" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;margin:0 auto; border:1px solid #dedede; font-size:13px; line-height:24px; font-family:microsoft yahei, Arial, Helvetica, sans-serif;">
  <tr>
    <td style="background-color:#ff6600; padding:5px 20px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网">7号网提醒商标续展</a></td>
  </tr>
  
  <tr>
    <td style="padding:50px 50px 30px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;">
          <tr>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网商标">商标</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网专利">专利</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">资讯</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">案例</a></td>
          </tr>
          <tr>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/trademark/" target="_blank" title="7号网商标交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com//member/nologin.php?act=tm" target="_blank" title="7号网商标管家">管家</a>
            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利管家">管家</a>

            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">热门</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">最新</a>
             </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">商标</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">专利</a>
            </td>
          </tr>
          <tr>
          	<td colspan="7" style="border-bottom:1px solid #ff6600; padding:30px 0; text-align:center;"><a style="color:#000000; text-decoration:none; font-size:18px;" href="http://www.qihaoip.com/" target="_blank" title="更多精彩尽在7号网">更多精彩尽在7号网...</a></td>
          </tr>
        </table>
    </td>
  </tr>
  
  <tr>
    <td style="padding:20px 40px 0; font-size:20px;">尊敬的7号网用户&nbsp;<span style="color:#ff6600;">'.$val["username"].'</span>：</td>
  </tr>
  
  <tr>
    <td  style="padding:40px 40px 20px;">7号网提醒您，最近您有'.$total.'件商标需续展，请您及时续展哦！</td>
  </tr>
  
  <tr>
    <td  style="padding:0 40px 10px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;line-height:35px; border-top:1px solid #dedede; border-left:1px solid #dedede;">
			<tr style="">
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">注册号</td>                                                          
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">商标名称</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">截止日期</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">应办理续展时间</td>
          </tr>';
						foreach ($user_trade_data as $k=>$v){
							if( strtotime(date("Y-m-d",strtotime("+12 month")))>=$v["zd_date"] && $v["email_msg_state"]=="0"){
								$conttent.=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前12个月</td>
									          </tr>';
								
								$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'1'));
							}
							if( strtotime(date("Y-m-d",strtotime("+6 month")))>=$v["zd_date"] && $v["email_msg_state"]=="1"){
								$conttent .=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前6个月</td>
									          </tr>';
								$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'2'));
							}
							if( strtotime(date("Y-m-d",strtotime("+1 month")))>=$v["zd_date"] && $v["email_msg_state"]=="2"){
								$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前1个月</td>
									          </tr>';
								$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'3'));
							}
							if( time()>=$v["zd_date"] && $v["email_msg_state"]=="3"){
								$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">今日到期</td>
									          </tr>';
								$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'4'));
							}
							if(strtotime(date("Y-m-d",strtotime("-1 month")))>=$v['zd_date'] && $v["email_msg_state"]=="4"){
								$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'后6个月</td>
									          </tr>';
								$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'5'));
							}
							
						}
						$conttent .=' </table>
									    </td>
									  </tr>
									  
									  <tr>
									    <td  style="padding:0 40px 50px; text-align:right;">以上信息仅供参考，实时信息以商标网公布为准。</td>
									  </tr>
									  
									   <tr>
									    <td  style="padding:0 40px 20px;">
									    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
									          <tr>
									            <td><img width="110" src="http://www.qihaoip.com/skin/default/style/themes/v4/m/wap.png" alt="7号网微信号：qh7hip" /></td>
									            <td style="line-height:35px; font-size:14px;">如需帮助，请联系您的专属经纪人或拨打热线：<span style="color:#ff6600; font-size:18px;">400-889-7080</span><br />
									            7号网微信号：<span style="color:#ff6600; font-size:18px;">qh7hip</span><br />
									            感谢您对7号网的信任与支持！<br />
									            </td>
									          </tr>
									        </table>
									    </td>
									  </tr>
									  
									    <tr>
									    	<td  style="padding:0 40px 30px; text-align:right;">7号网&nbsp;&nbsp;敬上</td>
									  	</tr>
									    
									     <tr>
									    	<td  style="padding:20px 40px; text-align:center; background:#ff6600; color:#ffffff;">联系QQ：21556911&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;服务热线：400-889-7080<br />地址：深圳市南山区南山大道3838号深圳设计产业园金栋308-312、210-212</td>
									  	</tr>
									</table>';
						$this->sendEmail($val['email'],'七号网商标管家商标续展',$conttent);
						//发送经纪人邮件
						if($val['parent_id']){
						$this->sendParent($val,$user_trade_data,$total);
						}
				}
				}
			}
		}
		
	private function sendParent($val,$user_trade_data,$total){
		$m = M('user_trade');
		$user = M('User');
		$user_data = $user->where(array('id'=>$val['parent_id']))->find();
		$data_parent = '该客户邮箱：'.$val['email'];
		if($val['mobile_phone']){
			$data_parent .= '，电话：'.$val['mobile_phone'];
		}	
	$conttent = '<table width="700" border="0" cellspacing="0" cellpadding="0" style="background-color:#ffffff;margin:0 auto; border:1px solid #dedede; font-size:13px; line-height:24px; font-family:microsoft yahei, Arial, Helvetica, sans-serif;">
  <tr>
    <td style="background-color:#ff6600; padding:5px 20px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网">7号网提醒商标续展</a></td>
  </tr>
		
  <tr>
    <td style="padding:50px 50px 30px;">
        <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;">
          <tr>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网商标">商标</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/" target="_blank" title="7号网专利">专利</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">资讯</a></td>
            <td width="15">&nbsp;</td>
            <td style="background-color:#00d2ff; color:#ffffff; font-size:20px; text-align:center; padding:18px 0; width:120px;"><a style="color:#ffffff; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">案例</a></td>
          </tr>
          <tr>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/trademark/" target="_blank" title="7号网商标交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com//member/nologin.php?act=tm" target="_blank" title="7号网商标管家">管家</a>
            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利交易">交易</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/patent/" target="_blank" title="7号网专利管家">管家</a>
		
            </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">热门</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/news/" target="_blank" title="7号网资讯">最新</a>
             </td>
            <td width="15">&nbsp;</td>
            <td style="text-align:center; padding:10px 0; border:1px solid #00d2ff;">
            	<a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">商标</a>&nbsp;&nbsp;&nbsp;
                <a style="color:#000000; text-decoration:none;" href="http://www.qihaoip.com/case/" target="_blank" title="7号网案例">专利</a>
            </td>
          </tr>
          <tr>
          	<td colspan="7" style="border-bottom:1px solid #ff6600; padding:30px 0; text-align:center;"><a style="color:#000000; text-decoration:none; font-size:18px;" href="http://www.qihaoip.com/" target="_blank" title="更多精彩尽在7号网">更多精彩尽在7号网...</a></td>
          </tr>
        </table>
    </td>
  </tr>
		
  <tr>
    <td style="padding:20px 40px 0; font-size:20px;">尊敬的7号网用户&nbsp;<span style="color:#ff6600;">'.$user_data["username"].'</span>：</td>
  </tr>
		
  <tr>
    <td  style="padding:40px 40px 20px;">7号网提醒您，最近您的客户'.$val['username'].'，有'.$total.'件专利需缴费，请您及时通知哦！<br>
    		 '.$data_parent.'
    		</td>
  </tr>
		
  <tr>
    <td  style="padding:0 40px 10px;">
    	<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:13px;line-height:35px; border-top:1px solid #dedede; border-left:1px solid #dedede;">
			<tr style="">
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">注册号</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">商标名称</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">截止日期</td>
            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">应办理续展时间</td>
          </tr>';
		foreach ($user_trade_data as $k=>$v){
			if( strtotime(date("Y-m-d",strtotime("+12 month")))>=$v["zd_date"] && $v["email_msg_state"]=="0"){
				$conttent.=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前12个月</td>
									          </tr>';
		
				$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'1'));
			}
			if( strtotime(date("Y-m-d",strtotime("+6 month")))>=$v["zd_date"] && $v["email_msg_state"]=="1"){
				$conttent .=' <tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前6个月</td>
									          </tr>';
				$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'2'));
			}
			if( strtotime(date("Y-m-d",strtotime("+1 month")))>=$v["zd_date"] && $v["email_msg_state"]=="2"){
				$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'前1个月</td>
									          </tr>';
				$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'3'));
			}
			if( time()>=$v["zd_date"] && $v["email_msg_state"]=="3"){
				$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">今日到期</td>
									          </tr>';
				$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'4'));
			}
			if(strtotime(date("Y-m-d",strtotime("-1 month")))>=$v['zd_date'] && $v["email_msg_state"]=="4"){
				$conttent .='<tr>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none;" href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.ttmid($v["trade_id"]).'">'.ttmid($v["trade_id"]).'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;"><a style="color:#000000; text-decoration:none; " href="http://v2.qihaoip.com/Trade/Mytrade/tmshow/id/'.$v["trade_id"].'/class/'.$v["trade_class_id"].'" target="_blank" title="'.$v["trade_name"].'">'.$v["trade_name"].'</a></td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'</td>
									            <td style="padding:0 8px; border-bottom:1px solid #dedede; border-right:1px solid #dedede;">'.date("Y-m-d",$v["zd_date"]).'后6个月</td>
									          </tr>';
				$m->where(array('id'=>$v['id']))->save(array('email_msg_state'=>'5'));
			}
				
		}
		$conttent .=' </table>
									    </td>
									  </tr>
						
									  <tr>
									    <td  style="padding:0 40px 50px; text-align:right;">以上信息仅供参考，实时信息以商标网公布为准。</td>
									  </tr>
						
									   <tr>
									    <td  style="padding:0 40px 20px;">
									    	<table width="100%" border="0" cellspacing="0" cellpadding="0">
									          <tr>
									            <td><img width="110" src="http://www.qihaoip.com/skin/default/style/themes/v4/m/wap.png" alt="7号网微信号：qh7hip" /></td>
									            <td style="line-height:35px; font-size:14px;">如需帮助，请联系您的专属经纪人或拨打热线：<span style="color:#ff6600; font-size:18px;">400-889-7080</span><br />
									            7号网微信号：<span style="color:#ff6600; font-size:18px;">qh7hip</span><br />
									            感谢您对7号网的信任与支持！<br />
									            </td>
									          </tr>
									        </table>
									    </td>
									  </tr>
						
									    <tr>
									    	<td  style="padding:0 40px 30px; text-align:right;">7号网&nbsp;&nbsp;敬上</td>
									  	</tr>
							
									     <tr>
									    	<td  style="padding:20px 40px; text-align:center; background:#ff6600; color:#ffffff;">联系QQ：21556911&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;服务热线：400-889-7080<br />地址：深圳市南山区南山大道3838号深圳设计产业园金栋308-312、210-212</td>
									  	</tr>
									</table>';
							$this->sendEmail($user_data['email'],'七号网商标管家商标续展',$conttent);
	
	}
	
	public function login(){
		$data = I('get.');
		if((date('ymdHis')-$data['time'])<300){
			$no_login = M('no_login','qh_','mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8');
			$login_data = $no_login->where(array('url'=>$data['Aurl']))->find();
			$token = sha1($login_data['key'].$data['Aurl'].$data['Auser'].$data['time']);
			if($data['sign']==$token){
				if($this->login_session($data['Auser'])){
					if($data['act']=='tm'){
						header("Location: /Trade/Mytrade/index");
					} else if($data['act']=='pa'){
						header("Location: /Patent/MyPatent/situation");
					} else {
						header("Location: /");
					}
				} else {
					$this->error('登陆失败');
				}
			} else {
				$this->error('登陆校验失败');
			}
		} else {
			$this->error('已超期！'.date('ymdHis').'-----'.$data['time']);
		}
	}
	
	private function login_session($user, $pass = '') {
		$m = M ( 'user', 'qh_', 'mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8' );
		$user_data = $m->where(array('username'=>$user))->find();
		if ($user_data){
			if($pass != ''){
				if(md5($pass)!=$user_data['password']){
					return false;
				}
			}
			session('user_id', $user_data['id']);
			session('user_name', $user_data['username']);
			return true;
		}else{
			return false;
		}
	}
	
	public function main(){
		session_write_close();//取消session锁定
		$m = M('auto');
		$randnum = rand('111111','999999');//获取唯一随机数
		$m->where('id = 1')->save(['randnum'=>$randnum,'info'=>'开启进程:'.date('Y-m-d H:i:s')]);//保存唯一随机数
		while(true){
			$main = $m->where('id=1')->find();//查找数据库唯一随机数
			if($main['randnum']==$randnum){//如果唯一随机数一致
				$re = $m->where('id > 1 and state = 1 and runtime < '.time())->select();
				if($re){
					foreach ($re as $row){
						ob_flush();
						flush();
						try{
							$this->$row['func']();
						} catch (Exception $e){
							//donothing
							dump($e);
						}
						$m->where(['id'=>$row['id']])->save(['info'=>'最近心跳:'.date('Y-m-d H:i:s'),'runtime'=>time()+$row['addtime']]);
					}
				}
				$m->where(['id'=>'1'])->save(['info'=>'最近心跳:'.date('Y-m-d H:i:s')]);
				sleep(5);
			} else {
				exit;//进程结束
			}
			
		}
	}
	
	function decrypt($txt, $key = '') {
	
		$key or $key = DT_KEY;
	
		$txt = $this->kecrypt(base64_decode($txt), $key);
	
		$len = strlen($txt);
	
		$str = '';
	
		for($i = 0; $i < $len; $i++) {
	
			$tmp = $txt[$i];
	
			$str .= $txt[++$i] ^ $tmp;
	
		}
	
		return $str;
	
	}
	
	
	
	function kecrypt($txt, $key) {
	
		$key = md5($key);
	
		$len = strlen($txt);
	
		$ctr = 0;
	
		$str = '';
	
		for($i = 0; $i < $len; $i++) {
	
			$ctr = $ctr == 32 ? 0 : $ctr;
	
			$str .= $txt[$i] ^ $key[$ctr++];
	
		}
	
		return $str;
	
	}
	
	public function autoSell(){
		header('Content-type:text/html;charset=utf-8');//设定编码，防止输出乱码。
		$m = M('user_trade','qh_','mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8');
		$arr = $m->field('qh_user_trade.id,qh_user_trade.uid,qh_user_trade.trade_name,qh_user_trade.user_id,qh_user_trade.trade_class_id,qh_user_trade.trade_id,qh_user_trade.trade_user,qh_user_trade.type,qh_user_trade.tm_state,qh_user_trade.state,qh_user_trade.remind_msg,qh_user_trade.res_address,qh_user_trade.trading_state,qh_user_trade.sq_date,qh_user_trade.zc_date,qh_user_trade.zd_date,qh_user_trade.service,qh_user_trade.price,qh_user_trade.trade_dynamic,qh_user_trade.trade_dynamic_state,qh_user.username,qh_user_trade.combination_state')->join('left join qh_user on qh_user_trade.user_id = qh_user.id','LEFT')->where(['trading_state'=>'1'])->limit(2)->select();
		$qihao = M('trademark','xzz_','mysql://www7hipcn:Iseeip2015@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/www7hipcn#utf8');
		$sell = new \Org\Trade\Trade();
		$sell->logout();
		$sell->alogin();
		$restr = '';
		foreach ($arr as $row){
			$qihaorow = $qihao->where(['tmno'=>ttmid($row['trade_id'])])->find();
			if($qihaorow){
				$m->where(['trade_id'=>$row['trade_id']])->save(['trading_state'=>'9']);
				$restr .= ttmid($row['trade_id']).'已重复'.$qihaorow['itemid'];
			} else {
				$img = __ROOT__.'/temp.jpg';
				$img_data = $sell->query('http://sbcx.saic.gov.cn:9080/tmois/wszhcx_getImageInputSterem.xhtml?regNum='.ttmid($row['trade_id']).'&intcls=1');
				if($sell->state=='200'){
					file_put_contents($img, $img_data);
					$re = $sell->upimg('http://v2.qihaoip.com/temp.jpg',23);
					if($re!='ERROR' && $re){
						$restr .= '图片上传成功!';
						$img = $re;
					} else {
						$restr .= $re.'=>上传图片失败';
						$img = 'http://www.qihaoip.com/file/upload/201508/12/10-39-06-51-16.jpg.thumb.jpg';
					}
				} else {//如果没有获取到图片资料
					$img = 'http://www.qihaoip.com/file/upload/201508/12/10-39-06-51-16.jpg.thumb.jpg';
				}
				$rehtml = $sell->sellTM(ttmid($row['trade_id']), $row['service'], $row['trade_user'], date('Y-m-d',$row['zc_date']), $row['trade_name'], $row['username'], '商标服务项目：'.$row['service'].'<br />商标注册人：'.$row['trade_user'], $img, $row['trade_class_id'],$row['combination_state'],$row['price']);
				if(strstr($rehtml, '例如：颜色')){
					$restr .= '发布成功';
					$m->where(['trade_id'=>$row['trade_id']])->save(['trading_state'=>'2']);
				} else {
					$restr .= '发布失败';
					$restr .= $rehtml;
				}
			}
		}
	}
	
	public function autoSellPA(){
		header('Content-type:text/html;charset=utf-8');//设定编码，防止输出乱码。
		$m = M('patent_member','qh_','mysql://qihaoip:23498jsfda43qfsdf@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/qihaoip#utf8');
		$arr = $m->query('select a.id, (select username from qh_user where id = a.memberid), a.applynum, a.salestatus, a.trade_price, b.type, b.cname, b.zlpage, b.patentnum, b.applydate, b.opennum, b.announcenum, b.authnum, b.authdate, b.inventor, b.patentee, b.patenteeaddr, b.mainclassnum, b.subclassnum, b.priority, b.divisionapply, b.picture, b.agency, b.agent, b.info, b.sovereignitem, b.added, b.lestandate, b.legalstatus, b.legalstatusdetail, b.citingliterature, b.kinpatent from qh_patent_member a left join qh_patent_housekeeper b on a.applynum = b.patentnum where a.salestatus in(2,3) limit 0,2');
		$qihao = M('patent','xzz_','mysql://www7hipcn:Iseeip2015@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/www7hipcn#utf8');
		$sell = new \Org\Trade\Trade();
		$sell->logout();
		$sell->alogin();
		$restr = '';
		foreach ($arr as $row){
			$qihaorow = $qihao->where(['ptno'=>$row['applynum']])->find();
			if($qihaorow){
				$m->where(['id'=>$row['id']])->save(['salestatus'=>'9']);
				$restr .= $row['applynum'].'已重复'.$qihaorow['itemid'];
			} else {
// 				print_r($row);
				$pa = new \Org\Patent\Picture($row['applynum'],$row['zlpage']);
				$remsg = $pa->getIMG();
				$img = __ROOT__.'/tmtemp.jpg';
				$img_data = $sell->query($remsg['img']);
				if($sell->state=='200'){
					file_put_contents($img, $img_data);
					$re = $sell->upimg('http://v2.qihaoip.com/tmtemp.jpg',24);
					if($re!='ERROR' && $re){
						$restr .= '图片上传成功!';
						$img = $re;
					} else {
						$restr .= $re.'=>上传图片失败';
						$img = 'http://www.qihaoip.com/file/upload/201508/12/10-39-06-51-16.jpg.thumb.jpg';
					}
				} else {//如果没有获取到图片资料
					$img = 'http://www.qihaoip.com/file/upload/201508/12/10-39-06-51-16.jpg.thumb.jpg';
				}
				$rehtml = $sell->sellPA($row['applynum'], $remsg['patentee'],$remsg['inventor'], $remsg['applydate'], $remsg['cname'], $row['(select username from qh_user where id = a.memberid)'], '【摘要】：'.$remsg['info1'].'<br />【主权项】：'.$remsg['info2'], $img, $row['trade_price']);
				//专利权人 发明人 日期 标题 yonghu 专利详情 
				if(strstr($rehtml, '例如：颜色')){
					$restr .= '发布成功';
					$m->where(['id'=>$row['id']])->save(['salestatus'=>'4']);
				} else {
					$restr .= '发布失败';
					$restr .= $rehtml;
				}
			}
		}
		
	}
	
	public function sellfromfile(){
		$handle = @fopen("allin.txt", "r");
		if ($handle) {
			$i = 0;
			$sell = new \Org\Trade\Trade();
			$sell->logout();
			$sell->alogin();
			$qihao = M('trademark','xzz_','mysql://www7hipcn:Iseeip2015@rds67xzzc0wtoqxlzxfaxpublic.mysql.rds.aliyuncs.com/www7hipcn#utf8');
			while (!feof($handle)) {
				$i++;
				$buffer = fgets($handle);
				if($buffer){
					$arrs = explode(',', $buffer);
					$qihaorow = $qihao->where(['tmno'=>$arrs[2]])->find();
					if($qihaorow){
						echo $arrs[2],'第',$i,'行重复<br />';
					} else {
						$re = $sell->upimg('http://www.qihaoip.com/file/upload/img/'.$arrs[2].'.jpg',23);
						if($re!='ERROR' && $re){
							echo '图片上传成功!';
							$img = $re;
						} else {
							echo $re,'=>上传图片失败';
							$img = 'http://www.qihaoip.com/file/upload/201508/12/10-39-06-51-16.jpg.thumb.jpg';
						}
						$class = explode('-', $arrs[0]);
						$state = 0;
						if(strstr($arrs[3], '中文')){
							$state += 1;
						}
						if(strstr($arrs[3], '英文')){
							$state += 2;
						}
						if($state==0){
							$state = 4;
						}
						$rehtml = $sell->sellTM($arrs[2], $arrs[5], '', $arrs[6], $arrs[1], '7hip', '商标名称：'.$arrs[1].'<br />商标服务项目：'.$arrs[5], $img, $class[0],$state,$arrs[8]+0);
						if(strstr($rehtml, '例如：颜色')){
							echo $arrs[2],'第',$i,'行发布成功<br />';
						} else {
							echo $arrs[2],'第',$i,'行发布失败<br />';
						}
					}
					
				}
			}
		} else {
			echo '文件不存在';
		}
		fclose($handle);
	}
	
	private function getUrl($data,$url=''){//从URL获取数据//POST方式
		$cookies = array();
		if($url==''){
			$url = 'http://www.qihaoip.com/member/my.php?mid=24&action=add';
			$cookies['ca3_auth'] = 'e0gnSw9RAmtNcWZffBcAPABiAGhgEVZXCmtxfWkMUmQNbTUJBzMIMXFJYgNTPwA5KBpaa1M4chgANHtKcEdnAXsfJ0wPbgI3TXJmVHwTAG8ANAA4YFBWOwprcUBpYVI2';
			$cookies['ca3_chat_ec'] = "2";
			$cookies['ca3_forward_url'] = "http://www.qihaoip.com/";
			$cookies['ca3_userid'] = "16";
			$cookies['ca3_username'] = "haha7day";
		}
		$urlarr = parse_url($url);
		$headers = array(
				"Host: ".$urlarr['host'],
				'User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0',
				"Content-type: text/xml",
				"Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3",
				"Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*\/*;q=0.8",
				'Accept-Language: zh-CN,zh;q=0.8,en-US;q=0.5,en;q=0.3',
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);//请求的url
		curl_setopt($ch, CURLOPT_REFERER,$url);//当浏览器向web服务器发送请求的时候，一般会带上Referer
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);//文件头
// 		curl_setopt($ch, CURLOPT_AUTOREFERER, true);//当根据Location:重定向时，自动设置header中的Referer:信息。
// 		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);//启用时会将服务器服务器返回的"Location: "放在header中递归的返回给服务器，使用CURLOPT_MAXREDIRS可以限定递归返回的数量。
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);//将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。
		curl_setopt($ch, CURLOPT_FAILONERROR, true);//显示状态码
		curl_setopt($ch, CURLOPT_COOKIE,  $cookies);//设置cookie
		// 	curl_setopt($ch, CURLOPT_COOKIESESSION, TRUE);//启用时curl会仅仅传递一个session cookie，忽略其他的cookie，默认状况下cURL会将所有的cookie返回给服务端。session cookie是指那些用来判断服务器端的session是否有效而存在的cookie。
		// 	curl_setopt($ch, CURLOPT_TIMEOUT, 60); // 60 second
		curl_setopt($ch, CURLOPT_POST, true);//启用时会发送一个常规的POST请求，类型为：application/x-www-form-urlencoded，就像表单提交的一样。//CURLOPT_UPLOAD 	启用后允许文件上传。
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//POST数据
		$restr = curl_exec($ch);//得到的字符串
		$state = curl_getinfo($ch,CURLINFO_HTTP_CODE);//最后一个收到的HTTP代码
		// 	$info = curl_getinfo($ch);//
		curl_close($ch);
		if($restr || $state=='200'){
			return $restr;
		} else {
			return 'not 200:'.$state;
		}
	}
}