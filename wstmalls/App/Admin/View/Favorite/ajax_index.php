<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>收藏夹-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>收藏夹:收藏商品等</h3>
    <form id="sh-Admin-Favorite" method="post" novalidate>
                
            
                <label>ID:</label>
    			<input name="id" class="easyui-textbox" >
            
    	<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="doSearch('dg-Admin-Favorite','dlg-Admin-Favorite','sh-Admin-Favorite','<?php echo U('ajax_serach'); ?>')">搜索</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-no" plain="true" onclick="cleanSearch('dg-Admin-Favorite','sh-Admin-Favorite','<?php echo U('ajax_cleanSearch'); ?>')">清空</a>
    </form>
    <table id="dg-Admin-Favorite" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ajax_ShowList'); ?>" toolbar="#toolbar-Admin-Favorite" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="data">数据</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Admin-Favorite">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Admin-Favorite','fm-Admin-Favorite','<?php echo U('ajax_add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Admin-Favorite','dlg-Admin-Favorite','fm-Admin-Favorite','<?php echo U('ajax_edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Admin-Favorite','<?php echo U('ajax_del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Admin-Favorite" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Admin-Favorite-buttons">
        <div class="ftitle">收藏夹</div>
        <form id="fm-Admin-Favorite" method="post" novalidate>
        
            <div class="fitem">
                <label>数据:</label>
    			<input name="data" class="easyui-textbox" >
            </div>
        </form>
    </div>
    <div id="dlg-Admin-Favorite-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Admin-Favorite','dlg-Admin-Favorite','fm-Admin-Favorite')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Admin-Favorite').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Admin-Favorite{
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