<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <link rel="icon" href="<?php echo STATIC_V2;?>favicon.ico">

    <title>商品订单列表</title>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo STATIC_V2;?>js/bootstrap.min.js"></script>
	<link href="<?php echo STATIC_V2;?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom styles for this template -->
    <link href="<?php echo STATIC_V2;?>css/admin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo STATIC_V2;?>js/admin.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
<include file="Public/header" />
<div class="container-fluid">
	<div class="row">
<include file="Public/left" />
<!-- content -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <ol class="breadcrumb">
  		    <li><a href="<?php echo U('/Admin'); ?>">首页</a></li>
  			<li><span>商品订单管理</span></li>
  			<li class="active">商品订单列表&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo U('admin_add'); ?>" target="_blank">新增商品订单</a></li>
		  </ol>
          <div class="panel panel-default">
		  <div class="panel-heading">
<form class="form-inline" action="<?php echo U('admin_ShowList'); ?>" id="form-search" method="post">
  <div class="form-group">
    <label for="Admin-Order-uid">订单号</label>
    <input type="text" class="form-control input-sm" name="uid" id="Admin-Order-uid" <?php if(isset($search['uid'])){echo 'value="'.$search['uid'].'"'; } else {echo 'placeholder="订单流水"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-parent">父类id</label>
    <input type="text" class="form-control input-sm" name="parent" id="Admin-Order-parent" <?php if(isset($search['parent'])){echo 'value="'.$search['parent'].'"'; } else {echo 'placeholder=""'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-payid">支付流水</label>
    <input type="text" class="form-control input-sm" name="payid" id="Admin-Order-payid" <?php if(isset($search['payid'])){echo 'value="'.$search['payid'].'"'; } else {echo 'placeholder=""'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-type">订单类型</label>
    <select class="form-control" id="Admin-Order-type" name="type">
    <option value ="0">未选择</option>
<?php get_select('ORDER_TYPE', $search['type']) ?>
	</select>
  </div>  <div class="form-group">
    <label for="Admin-Order-seller">卖家</label>
    <input type="text" class="form-control input-sm" name="seller" id="Admin-Order-seller" <?php if(isset($search['seller'])){echo 'value="'.$search['seller'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-aid">经纪人id</label>
    <input type="text" class="form-control input-sm" name="aid" id="Admin-Order-aid" <?php if(isset($search['aid'])){echo 'value="'.$search['aid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-buyer">买家</label>
    <input type="text" class="form-control input-sm" name="buyer" id="Admin-Order-buyer" <?php if(isset($search['buyer'])){echo 'value="'.$search['buyer'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-htid">合同主体id</label>
    <input type="text" class="form-control input-sm" name="htid" id="Admin-Order-htid" <?php if(isset($search['htid'])){echo 'value="'.$search['htid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-srid">受让主体id</label>
    <input type="text" class="form-control input-sm" name="srid" id="Admin-Order-srid" <?php if(isset($search['srid'])){echo 'value="'.$search['srid'].'"'; } else {echo 'placeholder="数据详情"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-itemids">商品id</label>
    <input type="text" class="form-control input-sm" name="itemids" id="Admin-Order-itemids" <?php if(isset($search['itemids'])){echo 'value="'.$search['itemids'].'"'; } else {echo 'placeholder="商品id"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-price">售价</label>
    <input type="text" class="form-control input-sm" name="price" id="Admin-Order-price" <?php if(isset($search['price'])){echo 'value="'.$search['price'].'"'; } else {echo 'placeholder="人民币元"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-fees">手续费</label>
    <input type="text" class="form-control input-sm" name="fees" id="Admin-Order-fees" <?php if(isset($search['fees'])){echo 'value="'.$search['fees'].'"'; } else {echo 'placeholder="人民币元"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-amount">总计</label>
    <input type="text" class="form-control input-sm" name="amount" id="Admin-Order-amount" <?php if(isset($search['amount'])){echo 'value="'.$search['amount'].'"'; } else {echo 'placeholder="总计金额"'; } ?>>
  </div>
  <div class="form-group">
    <label for="Admin-Order-state">订单状态</label>
    <select class="form-control" id="Admin-Order-state" name="state">
    <option value ="0">未选择</option>
<?php get_select('ORDER_STATE', $search['state']) ?>
	</select>
  </div>
  <button type="submit" class="btn btn-info btn-sm">搜索</button>
  <button type="reset" class="btn btn-danger btn-sm" onclick="return freset()">清空</button>
</form>
		  </div>
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>订单号</th>
                  <th>父类id</th>
                  <th>支付流水</th>
                  <th>订单类型</th>
                  <th>卖家</th>
                  <th>经纪人id</th>
                  <th>买家</th>
                  <th>合同主体id</th>
                  <th>受让主体id</th>
                  <th>商品id</th>
                  <th>售价</th>
                  <th>手续费</th>
                  <th>积分抵扣</th>
                  <th>代金券</th>
                  <th>总计</th>
                  <th>订单日期</th>
                  <th>订单时间</th>
                  <th>更新时间</th>
                  <th>订单留言</th>
                  <th>订单状态</th>

                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach ($data['rows'] as $row){ ?>
                <tr class="active">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['uid']; ?></td>
                  <td><?php echo $row['parent']; ?></td>
                  <td><?php echo $row['payid']; ?></td>
                  <td><?php echo $row['type'] ?></td>
                  <td><?php echo $row['seller']; ?></td>
                  <td><?php echo $row['aid']; ?></td>
                  <td><?php echo $row['buyer']; ?></td>
                  <td><?php echo $row['htid']; ?></td>
                  <td><?php echo $row['srid']; ?></td>
                  <td><?php echo $row['itemids']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['fees']; ?></td>
                  <td><?php echo $row['jifen']; ?></td>
                  <td><?php echo $row['voucher']; ?></td>
                  <td><?php echo $row['amount']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['datetime']; ?></td>
                  <td><?php echo $row['updatetime']; ?></td>
                  <td><?php echo $row['about']; ?></td>
                  <td><?php echo $row['state'] ?></td>

                  <td><a href="admin_show/id/<?php echo $row['id'] ?>" class="btn btn-success btn-xs" target="_blank"><span class="glyphicon glyphicon-search"></span> 查看</a><a href="<?php echo U('admin_edit',['id'=>$row['id']]); ?>" class="btn btn-warning btn-xs" target="_blank"><span class="glyphicon glyphicon-pencil"></span> 编辑</a><span class="btn btn-danger btn-xs"  onclick="del(<?php echo $row['id']; ?>)"><span class="glyphicon glyphicon-trash"></span> 删除</span></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
<div class="container-fluid">
  	<nav>
	<form class="navbar-form form-inline" action="<?php echo U('admin_ShowList'); ?>" method="get">
	<?php echo $data['page']; ?>
	</form>  
	</nav>
</div>
          </div>
        </div>
<script type="text/javascript">
function del(id){
	$.ajax({
		type:"GET",
		url:"<?php echo U('admin_del'); ?>",
		data:'id='+id,
		success:function(data){
			var re = eval(data);
			if(re.success){
				location.reload(true);
			} else {
				alert(re.errorMsg);
			}
		}
	});
	return false;
}
function freset(){
		$.ajax({
			type:"POST",
			url:"<?php echo U('admin_ShowList'); ?>",
			data:'cleanSearch=1',
			success:function(data){
				var re = eval(data);
				if(re.success){
					window.location.href=window.location.href;
				} else {
					alert(re.errorMsg);
				}
			}
		});
		return false;
	}
</script>
<!-- content -->
    </div>
</div>
</body>
</html>