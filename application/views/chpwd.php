<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url();?>">
  <title>修改登录密码 <?php echo $this->session->userdata('uname');?>的博客 - SYSIT个人博客</title>
      <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
  <script type="text/javascript" src="assets/js/jquery-1.js"></script>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery_002.js"></script>
  <script type="text/javascript" src="assets/js/oschina.js"></script>
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<div id="OSC_Banner">
    <div id="OSC_Slogon"><?php echo $this->session->userdata('uname');?>'s Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="javascript:;" class="project"><?php echo $this->session->userdata(umood);?></a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
	  <div id="VisitorInfo">
		当前访客身份：
				<?php echo $this->session->userdata('uname');?> [ <a href="User/unindex">退出</a> ]
				<span id="OSC_Notification">
			<a href="Blog/inbox" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
																				</span>
    </div>
		<div id="SearchBar">
    		<form action="javascript:;">
								<input name="user" value="154693" type="hidden">
																								<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
				<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="Blog/index">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">修改登录密码</span>
    </div>
    <div id="AdminMenu"><ul>
	<li class="caption">个人信息管理		
		<ol>
			<li><a href="Blog/inbox">站内留言(0/1)</a></li>
			<li><a href="Blog/profile">编辑个人资料</a></li>
			<li class="current"><a href="Blog/chpwd">修改登录密码</a></li>
			<li><a href="Blog/userSettings">网页个性设置</a></li>
		</ol>
	</li>		
</ul>
<ul>
	<li class="caption">博客管理	
		<ol>
			<li><a href="Blog/newBlog">发表博客</a></li>
			<li><a href="Blog/blogCatalogs">博客设置/分类管理</a></li>
			<li><a href="Blog/blogs">文章管理</a></li>
			<li class="current"><a href="Blog/blogComments">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">

<div class="MainForm">
<form class="AutoCommitJSONForm" action="Blog/do_chpwd" method="POST">
<h2>修改我的登录密码</h2>
<table width="100%">
	<tbody><tr>
		<th width="110">旧的登录密码</th>		
		<td>
			<input name="pwd" size="20" class="TEXT" tabindex="1" type="password">&nbsp;&nbsp;&nbsp;&nbsp;		
			<a href="javascript:;" target="_blank">忘记登录密码</a>
		</td>    		
	</tr>
	<tr>
		<th>新密码</th>		
		<td><input name="newpwd" size="20" class="TEXT" tabindex="2" type="password"></td>    		
	</tr>
	<tr>
		<th>再次输入新密码</th>		
		<td><input name="newpwd2" size="20" class="TEXT" tabindex="3" type="password"></td>    		
	</tr>
	<tr><th colspan="2"></th></tr>
	<tr class="submit">
		<th></th>
		<td>
		<input value="修改密码" class="BUTTON SUBMIT" tabindex="4" type="submit">
		<span id="error_msg" style="display:none"></span>
		</td>
	</tr>
</tbody></table>
</form>
</div></div>
	<div class="clear"></div>
</div>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)<?php echo $this->session->userdata('upass');?></div>
</div>
</body></html>