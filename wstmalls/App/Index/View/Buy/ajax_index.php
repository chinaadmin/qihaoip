<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index-Articles-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>Index-Articles</h3>
    <form id="sh-Index-Articles" method="post" novalidate>
                
            
                <label>ID:</label>
    			<input name="id" class="easyui-textbox" >
            
            
                <label>上级分类:</label>
    			<select class="easyui-combobox" name="upid">
                <option value="0"></option>
                <option value="1">第一类</option>
                <option value="2">第二类</option>
                <option value="3">第三类</option>
                </select>
            
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch('dg-Index-Articles','dlg-Index-Articles','sh-Index-Articles','<?php echo U('ajax_serach'); ?>')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch('dg-Index-Articles','sh-Index-Articles','<?php echo U('ajax_cleanSearch'); ?>')">清空</a>
    </form>
    <table id="dg-Index-Articles" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ajax_ShowList'); ?>" toolbar="#toolbar-Index-Articles" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="id">ID</th>
            	<th field="upid">上级分类</th>
            	<th field="name">分类名称</th>
            	<th field="indexstyle">首页式样</th>
            	<th field="liststyle">列表式样</th>
            	<th field="title">标题</th>
            	<th field="keywords">关键词</th>
            	<th field="description">描述</th>
            	<th field="about">说明</th>
            	<th field="sort">排序</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Index-Articles">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Index-Articles','fm-Index-Articles','<?php echo U('ajax_add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Index-Articles','dlg-Index-Articles','fm-Index-Articles','<?php echo U('ajax_edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Index-Articles','<?php echo U('ajax_del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Index-Articles" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Index-Articles-buttons">
        <div class="ftitle">Index-Articles</div>
        <form id="fm-Index-Articles" method="post" novalidate>
        
            <div class="fitem">
                <label>上级分类:</label>
    			<select class="easyui-combobox" name="upid">
                <option value="0"></option>
                <option value="1">第一类</option>
                <option value="2">第二类</option>
                <option value="3">第三类</option>
                </select>
            </div>
            <div class="fitem">
                <label>分类名称:</label>
    			<input name="name" class="easyui-textbox"  required="true">
            </div>
            <div class="fitem">
                <label>首页式样:</label>
    			<input name="indexstyle" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>列表式样:</label>
    			<input name="liststyle" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>标题:</label>
    			<input name="title" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>关键词:</label>
    			<input name="keywords" class="easyui-textbox" data-options="multiline:true" style="height:60px">
            </div>
            <div class="fitem">
                <label>描述:</label>
    			<input name="description" class="easyui-textbox" data-options="multiline:true" style="height:60px">
            </div>
            <div class="fitem">
                <label>说明:</label>
    			<input name="about" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>排序:</label>
    			<input name="sort" class="easyui-textbox" >
            </div>
        </form>
    </div>
    <div id="dlg-Index-Articles-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Index-Articles','dlg-Index-Articles','fm-Index-Articles')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Index-Articles').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Index-Articles{
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