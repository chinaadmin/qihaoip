<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Index-Main-管理中心</title>
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="<?php echo STATIC_DIR; ?>easyui/demo/demo.css">
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo STATIC_DIR; ?>easyui/jquery.easyui.min.js"></script>
</head>
<body>
<div id='content'>
    <h3>Index-Main:fortest</h3>
    
    <table id="dg-Index-Main" title="数据列表" class="easyui-datagrid" style="width:100%;height:auto" url="<?php echo U('ShowList'); ?>" toolbar="#toolbar-Index-Main" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
            
            	<th field="id">id</th>
            	<th field="name">其他</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar-Index-Main">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser('dlg-Index-Main','fm-Index-Main','<?php echo U('add'); ?>')">新增</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser('dg-Index-Main','dlg-Index-Main','fm-Index-Main','<?php echo U('edit'); ?>')">编辑</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser('dg-Index-Main','<?php echo U('del'); ?>')">删除</a>
    </div>
    
    <div id="dlg-Index-Main" class="easyui-dialog" style="width:80%;height:auto;padding:10px 20px" closed="true" buttons="#dlg-Index-Main-buttons">
        <div class="ftitle">Index-Main</div>
        <form id="fm-Index-Main" method="post" novalidate>
        
            <div class="fitem">
                <label>其他:</label>
    			<input name="name" class="easyui-textbox" >
            </div>
        </form>
    </div>
    <div id="dlg-Index-Main-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser('dg-Index-Main','dlg-Index-Main','fm-Index-Main')" style="width:90px">保存</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg-Index-Main').dialog('close')" style="width:90px">取消</a>
    </div>
    <style type="text/css">
        #fm-Index-Main{
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