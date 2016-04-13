<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index-Ad-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>Index-Ad</h3>
    <form id="sh-Index-Ad" method="post" novalidate>
                
            
                <label>ID:</label>
    			<input name="id" class="easyui-textbox" >
            
            
                <label>广告组:</label>
    			<select class="easyui-combobox" name="groupid">
                <option value="0"></option>
                <?php get_select('ads'); ?>
                </select>
            
            
                <label>广告名称:</label>
    			<input name="name" class="easyui-textbox" >
            
            
                <label>广告图片:</label>
    			<input name="img" class="easyui-textbox" >
            
            
                <label>广告链接:</label>
    			<input name="link" class="easyui-textbox" >
            
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch('dg-Index-Ad','dlg-Index-Ad','sh-Index-Ad','<?php echo U('ajax_serach'); ?>')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch('dg-Index-Ad','sh-Index-Ad','<?php echo U('ajax_cleanSearch'); ?>')">清空</a>
    </form>
    <table id="dg-Index-Ad" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ajax_ShowList'); ?>" toolbar="#toolbar-Index-Ad" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="groupid">广告组</th>
            	<th field="name">广告名称</th>
            	<th field="img">广告图片</th>
            	<th field="link">广告链接</th>
            	<th field="about">广告详情</th>
            	<th field="sort">广告排序</th>
            	<th field="state">广告状态</th>
            	<th field="starttime">开始时间</th>
            	<th field="endtime">结束时间</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Index-Ad">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Index-Ad','fm-Index-Ad','<?php echo U('ajax_add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Index-Ad','dlg-Index-Ad','fm-Index-Ad','<?php echo U('ajax_edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Index-Ad','<?php echo U('ajax_del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Index-Ad" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Index-Ad-buttons">
        <div class="ftitle">Index-Ad</div>
        <form id="fm-Index-Ad" method="post" novalidate>
        
            <div class="fitem">
                <label>广告组:</label>
    			<select class="easyui-combobox" name="groupid">
                <?php get_select('ads'); ?>
                </select>
            </div>
            <div class="fitem">
                <label>广告名称:</label>
    			<input name="name" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>广告图片:</label>
    			<input name="img" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>广告链接:</label>
    			<input name="link" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>广告详情:</label>
    			<input name="about" class="easyui-textbox" data-options="multiline:true" style="height:60px">
            </div>
            <div class="fitem">
                <label>广告排序:</label>
    			<input name="sort" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>广告状态:</label>
    			<input name="state" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>开始时间:</label>
    			<input name="starttime" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>结束时间:</label>
    			<input name="endtime" class="easyui-textbox" >
            </div>
        </form>
    </div>
    <div id="dlg-Index-Ad-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Index-Ad','dlg-Index-Ad','fm-Index-Ad')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Index-Ad').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Index-Ad{
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