<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index-Comment-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>Index-Comment</h3>
    <form id="sh-Index-Comment" method="post" novalidate>
                
            
                <label>ID:</label>
    			<input name="id" class="easyui-textbox" >
            
            
                <label>数据ID:</label>
    			<input name="artid" class="easyui-textbox" >
            
            
                <label>评论的类型:</label>
    			<select class="easyui-combobox" name="type">
                <option value="1">文章评论</option>
                <option value="2">商品评论</option>
                </select>
            
            
                <label>上级评论:</label>
    			<input name="upid" class="easyui-textbox" >
            
            
                <label>评论者账号:</label>
    			<input name="amountid" class="easyui-textbox" >
            
            
                <label>访客IP:</label>
    			<input name="amountip" class="easyui-textbox" >
            
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch('dg-Index-Comment','dlg-Index-Comment','sh-Index-Comment','<?php echo U('ajax_serach'); ?>')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch('dg-Index-Comment','sh-Index-Comment','<?php echo U('ajax_cleanSearch'); ?>')">清空</a>
    </form>
    <table id="dg-Index-Comment" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ajax_ShowList'); ?>" toolbar="#toolbar-Index-Comment" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="artid">数据ID</th>
            	<th field="type">评论的类型</th>
            	<th field="upid">上级评论</th>
            	<th field="amountid">评论者账号</th>
            	<th field="amountip">访客IP</th>
            	<th field="content">评论内容</th>
            	<th field="like">喜欢</th>
            	<th field="unlike">不喜欢</th>
            	<th field="state">状态</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Index-Comment">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Index-Comment','fm-Index-Comment','<?php echo U('ajax_add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Index-Comment','dlg-Index-Comment','fm-Index-Comment','<?php echo U('ajax_edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Index-Comment','<?php echo U('ajax_del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Index-Comment" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Index-Comment-buttons">
        <div class="ftitle">Index-Comment</div>
        <form id="fm-Index-Comment" method="post" novalidate>
        
            <div class="fitem">
                <label>数据ID:</label>
    			<input name="artid" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>评论的类型:</label>
    			<select class="easyui-combobox" name="type">
                <option value="1">文章评论</option>
                <option value="2">商品评论</option>
                </select>
            </div>
            <div class="fitem">
                <label>上级评论:</label>
    			<input name="upid" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>评论者账号:</label>
    			<input name="amountid" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>访客IP:</label>
    			<input name="amountip" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>评论内容:</label>
    			<input name="content" class="easyui-textbox" data-options="multiline:true" style="height:60px" required="true">
            </div>
            <div class="fitem">
                <label>喜欢:</label>
    			<input name="like" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>不喜欢:</label>
    			<input name="unlike" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>状态:</label>
    			<select class="easyui-combobox" name="state">
                <option value="1">已审核</option>
                <option value="2">已禁止</option>
                </select>
            </div>
        </form>
    </div>
    <div id="dlg-Index-Comment-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Index-Comment','dlg-Index-Comment','fm-Index-Comment')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Index-Comment').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Index-Comment{
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