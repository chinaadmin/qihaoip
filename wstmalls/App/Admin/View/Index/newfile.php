<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="keywords" content="html5,jquery,ui,widgets,ajax,ria,web framekwork,web development,easy,easyui,datagrid,treegrid,tree">
		<meta name="description" content="jQuery EasyUI is a complete framework for HTML5 web page. It provides easy to use components for building modern, interactive, javascript applications that work on pc and mobile devices.">
		<title>parser - Documentation - jQuery EasyUI</title>
        <link rel="stylesheet" href="/css/kube.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../css/main.css">
		<link rel="stylesheet" type="text/css" href="../../prettify/prettify.css">
		<script type="text/javascript" src="../../prettify/prettify.js"></script>
		<script type="text/javascript" src="/easyui/jquery.min.js"></script>
		<script type="text/javascript">
			$(function(){
								$('textarea[name="code-parser"]').each(function(){
					var data = $(this).val();
					data = data.replace(/(\r\n|\r|\n)/g, '\n');
					if (data.indexOf('\t') == 0){
						data = data.replace(/^\t/, '');
						data = data.replace(/\n\t/g, '\n');
					}
					data = data.replace(/\t/g, '    ');
					var pre = $('<pre name="code" class="prettyprint linenums"></pre>').insertAfter(this);
					pre.text(data);
					$(this).remove();
				});
				prettyPrint();
			});
		</script>
	</head>
	<body>
		<div id="header" class="group wrap header">
			<div class="content">
	<div class="navigation-toggle" data-tools="navigation-toggle" data-target="#navbar-1">
		<span>EasyUI</span>
	</div>
	<div id="elogo" class="navbar navbar-left">
		<ul>
			<li>
				<a href="/index.php"><img src="/images/logo2.png" alt="jQuery EasyUI"/></a>
			</li>
		</ul>
	</div>
	<div id="navbar-1" class="navbar navbar-right">
		<ul>
			<li><a href="/index.php">Home</a></li>
			<li><a href="/demo/main/index.php">Demo</a></li>
			<li><a href="/tutorial/index.php">Tutorial</a></li>
			<li><a href="/documentation/index.php">Documentation</a></li>
			<li><a href="/download/index.php">Download</a></li>
			<li><a href="/extension/index.php">Extension</a></li>
			<li><a href="/contact.php">Contact</a></li>
			<li><a href="/forum/index.php">Forum</a></li>
		</ul>
	</div>
	<div style="clear:both"></div>
</div>
<script type="text/javascript">
	function setNav(){
		var demosubmenu = $('#demo-submenu');
		if (demosubmenu.length){
			if ($(window).width() < 450){
				demosubmenu.find('a:last').hide();
			} else {
				demosubmenu.find('a:last').show();
			}
		}
		if ($(window).width() < 767){
			$('.navigation-toggle').each(function(){
				$(this).show();
				var target = $(this).attr('data-target');
				$(target).hide();
				setDemoNav();
			});
		} else {
			$('.navigation-toggle').each(function(){
				$(this).hide();
				var target = $(this).attr('data-target');
				$(target).show();
			});
		}
	}
	function setDemoNav(){
		$('.navigation-toggle').each(function(){
			var target = $(this).attr('data-target');
			if (target == '#navbar-demo'){
				if ($(target).is(':visible')){
					$(this).css('margin-bottom', 0);
				} else {
					$(this).css('margin-bottom', '2.3em');
				}
			}
		});
	}
	$(function(){
		setNav();
		$(window).bind('resize', function(){
			setNav();
		});
		$('.navigation-toggle').bind('click', function(){
			var target = $(this).attr('data-target');
			$(target).toggle();
			setDemoNav();
		});
	})
</script>		</div>
		<div id="mainwrap">
			<div id="content" class="content">
			

<div style="padding:10px">

<h3>Parser</h3>
<h4>Usage</h4>
<textarea name="code-parser" class="js">
$.parser.parse();       // parse all the page
$.parser.parse('#cc');  // parse the specified node
</textarea>

<h4>Properties</h4>
<table class="doc-table">
<tr>
<th><strong>Name</strong></th>
<th><strong>Type</strong></th>
<th><strong>Description</strong></th>

<th><strong>Default</strong></th>
</tr>
<tr>
<td>$.parser.auto</td>
<td>boolean</td>
<td>Defines if to auto parse the easyui component.</td>
<td>true</td>
</tr>
</table>

<h4>Events</h4>
<table class="doc-table">
<tr>
<th><strong>Name</strong></th>
<th><strong>Parameters</strong></th>
<th><strong>Description</strong></th>
</tr>
<tr>
<td>$.parser.onComplete</td>

<td>context</td>
<td>Fires when parser finishing its parse action.</td>
</tr>
</table>

<h4>Methods</h4>
<table class="doc-table">
<tr>
<th><strong>Name</strong></th>

<th><strong>Parameter</strong></th>
<th><strong>Description</strong></th>
</tr>
<tr>
<td>$.parser.parse</td>
<td>context</td>
<td>Parse the easyui component.</td>
</tr>
</table>

</div>

﻿			</div>
		</div>
		<div id="footer" class="content text-centered">
			<div>Copyright © 2010-2015 www.jeasyui.com</div>
		</div>
	</body>
</html>