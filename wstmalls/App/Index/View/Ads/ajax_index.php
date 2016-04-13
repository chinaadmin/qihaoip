<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index-Ads-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>Index-Ads</h3>
    <form id="sh-Index-Ads" method="post" novalidate>
                
            
                <label>ID:</label>
    			<input name="id" class="easyui-textbox" >
            
            
                <label>广告位置:</label>
    			<input name="name" class="easyui-textbox"  >
            
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch('dg-Index-Ads','dlg-Index-Ads','sh-Index-Ads','<?php echo U('ajax_serach'); ?>')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch('dg-Index-Ads','sh-Index-Ads','<?php echo U('ajax_cleanSearch'); ?>')">清空</a>
    </form>
    <table id="dg-Index-Ads" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ajax_ShowList'); ?>" toolbar="#toolbar-Index-Ads" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="id">ID</th>
            	<th field="name">广告位置</th>
            	<th field="high">宽度</th>
            	<th field="width">高度</th>
            	<th field="about">备注信息</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Index-Ads">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Index-Ads','fm-Index-Ads','<?php echo U('ajax_add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Index-Ads','dlg-Index-Ads','fm-Index-Ads','<?php echo U('ajax_edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Index-Ads','<?php echo U('ajax_del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Index-Ads" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Index-Ads-buttons">
        <div class="ftitle">Index-Ads</div>
        <form id="fm-Index-Ads" method="post" novalidate>
        
            <div class="fitem">
                <label>广告位置:</label>
    			<input name="name" class="easyui-textbox"  required="true">
            </div>
            <div class="fitem">
                <label>宽度:</label>
    			<input name="high" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>高度:</label>
    			<input name="width" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>备注信息:</label>
    			<input name="about" class="easyui-textbox" data-options="multiline:true" style="height:60px">
            </div>
        </form>
    </div>
    <div id="dlg-Index-Ads-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Index-Ads','dlg-Index-Ads','fm-Index-Ads')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Index-Ads').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Index-Ads{
            margin:0;
            padding:10px 30px;
        }
        .ftitle{
            font-size:14px;
            font-weight:bold;
            padding:5px 0;
            margin-bottom:10px;
            border-bottom:1px solid #ccc;
        }
        .fitem{
            margin-bottom:5px;
        }
        .fitem label{
            display:inline-block;
            width:80px;
        }
        .fitem input{
            width:300px;
        }
    </style>
    </div>
</body>
</html>