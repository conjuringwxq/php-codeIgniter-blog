<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <base href="<?php echo site_url();?>">
  <title>博客文章管理 <?php echo $this->session->userdata('uname');?>的博客 - SYSIT个人博客</title>
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
    	<span id="AdminTitle">博客文章管理</span>
    </div>
    <div id="AdminMenu"><ul>
	<li class="caption">个人信息管理		
		<ol>
			<li><a href="Blog/inbox">站内留言(0/1)</a></li>
			<li><a href="Blog/profile">编辑个人资料</a></li>
			<li><a href="Blog/chpwd">修改登录密码</a></li>
			<li><a href="Blog/userSettings">网页个性设置</a></li>
		</ol>
	</li>		
</ul>
<ul>
	<li class="caption">博客管理	
		<ol>
			<li><a href="Blog/newBlog">发表博客</a></li>
			<li><a href="Blog/blogCatalogs">博客设置/分类管理</a></li>
			<li class="current"><a href="Blog/blogs">文章管理</a></li>
			<li><a href="Blog/blogComments">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<div class="MainForm BlogArticleManage">
  <h3 class="title">共有 3 篇博客，每页显示 40 个，共 1 页</h3>
    <div id="BlogOpts">
	<a href="javascript:;" id="select1">全选</a>&nbsp;|
	<a href="javascript:;" id="select2">取消</a>&nbsp;|
	<a href="javascript:;" id="select3">反向选择</a>&nbsp;|
	<a href="javascript:;" id="select4">删除选中</a>
  </div>
  <ul>
      <?php
        foreach ($mbk as $v) {
            ?>
            <li class="row_1">
                <input name="blog" value="24027" type="checkbox">
                <a href="viewPost_comment" target="_blank"><span class="dtitle"><?php echo $v->TITLE?></span></a>
                <small><?php echo $v->ADD_TIME;?></small>
            </li>
            <?php
        }
      ?>
  </ul>
</div>

</div>
	<div class="clear"></div>
</div>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>

<script>
    $('#select1').click(function(){
       $('input[name="blog"]').each(function(){
            $(this).attr('checked',true);
       })
    });
    $('#select2').click(function(){
        $('input[name="blog"]').each(function(){
            $(this).attr('checked',false);
        })
    });
    $('#select3').click(function(){
        $('input[name="blog"]').each(function(){
            this.checked=!this.checked;
        })
    });
    $('#select4').click(function(){
        var arr=[];
        $('input:checked').each(function(index){
           arr[index]=($(this).next().text());
        });
        $.post('Blog/delete',{'delarr':arr},function (data) {
            $('input:checked').parent().addClass('choice');
            $('input[name="blog"]').parent().remove('.choice');
            // location.reload();
        },'json');
    });
</script>
</body></html>