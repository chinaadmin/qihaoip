<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>关键词-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>关键词</h3>
    <form id="sh-Index-Keywords" method="post" novalidate>
                
            
                <label>ID:</label>
    			<input name="id" class="easyui-textbox" >
            
            
                <label>关键词组:</label>
    			<select class="easyui-combobox" name="groupid">
                <option value="0"></option>
                <option value="1">默认类别</option>
                <option value="2">其他</option>
                </select>
            
            
                <label>搜索关键词:</label>
    			<input name="keywords" class="easyui-textbox"  >
            
            
                <label>是否显示:</label>
    			<select class="easyui-combobox" name="state">
                <option value="0"></option>
                <option value="1">显示</option>
                <option value="2">隐藏</option>
                </select>
            
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch('dg-Index-Keywords','dlg-Index-Keywords','sh-Index-Keywords','<?php echo U('ajax_serach'); ?>')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch('dg-Index-Keywords','sh-Index-Keywords','<?php echo U('ajax_cleanSearch'); ?>')">清空</a>
    </form>
    <table id="dg-Index-Keywords" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ajax_ShowList'); ?>" toolbar="#toolbar-Index-Keywords" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="groupid">关键词组</th>
            	<th field="keywords">搜索关键词</th>
            	<th field="views">搜索次数</th>
            	<th field="sort">排序</th>
            	<th field="state">是否显示</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Index-Keywords">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Index-Keywords','fm-Index-Keywords','<?php echo U('ajax_add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Index-Keywords','dlg-Index-Keywords','fm-Index-Keywords','<?php echo U('ajax_edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Index-Keywords','<?php echo U('ajax_del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Index-Keywords" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Index-Keywords-buttons">
        <div class="ftitle">关键词</div>
        <form id="fm-Index-Keywords" method="post" novalidate>
        
            <div class="fitem">
                <label>关键词组:</label>
    			<select class="easyui-combobox" name="groupid">
                <option value="0"></option>
                <option value="1">默认类别</option>
                <option value="2">其他</option>
                </select>
            </div>
            <div class="fitem">
                <label>搜索关键词:</label>
    			<input name="keywords" class="easyui-textbox"  required="true">
            </div>
            <div class="fitem">
                <label>搜索次数:</label>
    			<input name="views" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>排序:</label>
    			<input name="sort" class="easyui-textbox" >
            </div>
            <div class="fitem">
                <label>是否显示:</label>
    			<select class="easyui-combobox" name="state">
                <option value="0"></option>
                <option value="1">显示</option>
                <option value="2">隐藏</option>
                </select>
            </div>
        </form>
    </div>
    <div id="dlg-Index-Keywords-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Index-Keywords','dlg-Index-Keywords','fm-Index-Keywords')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Index-Keywords').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Index-Keywords{
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