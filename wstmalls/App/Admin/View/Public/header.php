    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('/Admin'); ?>">7号网后台管理中心</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo U('/Admin'); ?>">后台首页</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户 <span class="caret"></span></a>
            	<ul class="dropdown-menu">
            	<li><a href="<?php echo U('Login/logout'); ?>">退出登陆</a></li>
            	<li role="separator" class="divider"></li>
            	<li><a href="#">通知</a></li>
            	<li role="separator" class="divider"></li>
            	<li><a href="#">待办事项<span class="badge badge-danger">14</span></a></li>
            	</ul>
            </li>
            <li><a href="#">帮助文档</a></li>
          </ul>
          <form class="navbar-form navbar-right" action="<?php echo U('/Admin/Search'); ?>">
          	<div class="input-group">
              <input type="text" class="form-control" placeholder="功能搜索">
              <span class="input-group-btn">
        	  <button class="btn btn-default" type="submit">搜索</button>
      		  </span>
      		</div>
          </form>
        </div>
      </div>
    </nav>