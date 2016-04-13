<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index-Article-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>Index-Article</h3>
    <form id="sh-Index-Article" method="post" novalidate>
                
            
                <label>ID:</label>
    			<input name="id" class="easyui-textbox" >
            
            
                <label>分类:</label>
    			<input name="groupid" class="easyui-textbox" >
            
            
                <label>模板式样:</label>
    			<input name="style" class="easyui-textbox" >
            
            
                <label>标题:</label>
    			<input name="title" class="easyui-textbox"  >
            
            
                <label>发布者:</label>
    			<input name="editor" class="easyui-textbox" >
            
            
                <label>状态:</label>
    			<select class="easyui-combobox" name="state">
                <option value="0"></option>
                <option value="1">正常</option>
                <option value="2">禁用</option>
                <option value="3">未审核</option>
                </select>
            
            
                <label>推荐位置:</label>
    			<select class="easyui-combobox" name="hot">
                <option value="0"></option>
                <option value="1">无推荐</option>
                <option value="2">首页推荐</option>
                <option value="4">列表推荐</option>
                </select>
            
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch('dg-Index-Article','dlg-Index-Article','sh-Index-Article','<?php echo U('ajax_serach'); ?>')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch('dg-Index-Article','sh-Index-Article','<?php echo U('ajax_cleanSearch'); ?>')">清空</a>
    </form>
    <table id="dg-Index-Article" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ajax_ShowList'); ?>" toolbar="#toolbar-Index-Article" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="id">ID</th>
            	<th field="groupid">分类</th>
            	<th field="style">模板式样</th>
            	<th field="title">标题</th>
            	<th field="keywords">关键词</th>
            	<th field="description">描述</th>
            	<th field="img">文章图片</th>
            	<th field="addtime">添加时间</th>
            	<th field="views">查看次数</th>
            	<th field="editor">发布者</th>
            	<th field="state">状态</th>
            	<th field="sort">排序</th>
            	<th field="hot">推荐位置</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Index-Article">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Index-Article','fm-Index-Article','<?php echo U('ajax_add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Index-Article','dlg-Index-Article','fm-Index-Article','<?php echo U('ajax_edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Index-Article','<?php echo U('ajax_del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Index-Article" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Index-Article-buttons">
        <div class="ftitle">Index-Article</div>
        <form id="fm-Index-Article" method="post" novalidate>
        
            <div class="fitem">
                <label>分类:</label>
    			<input name="groupid" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>模板式样:</label>
    			<input name="style" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>标题:</label>
    			<input name="title" class="easyui-textbox"  required="true">
            </div>
            <div class="fitem">
                <label>关键词:</label>
    			<input name="keywords" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>描述:</label>
    			<input name="description" class="easyui-textbox" data-options="multiline:true" style="height:60px">
            </div>
            <div class="fitem">
                <label>内容:</label>
    			<input name="content" class="easyui-textbox" data-options="multiline:true" style="height:60px" required="true">
            </div>
            <div class="fitem">
                <label>文章图片:</label>
    			<input name="img" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>添加时间:</label>
    			<input name="addtime" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>查看次数:</label>
    			<input name="views" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>发布者:</label>
    			<input name="editor" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>状态:</label>
    			<select class="easyui-combobox" name="state">
                <option value="0"></option>
                <option value="1">正常</option>
                <option value="2">禁用</option>
                <option value="3">未审核</option>
                </select>
            </div>
            <div class="fitem">
                <label>排序:</label>
    			<input name="sort" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>推荐位置:</label>
    			<select class="easyui-combobox" name="hot">
                <option value="0"></option>
                <option value="1">无推荐</option>
                <option value="2">首页推荐</option>
                <option value="4">列表推荐</option>
                </select>
            </div>
        </form>
    </div>
    <div id="dlg-Index-Article-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Index-Article','dlg-Index-Article','fm-Index-Article')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Index-Article').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Index-Article{
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