<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url();?>">
  <title>发送留言成功! -  <?php echo $this->session->userdata('uname');?>的博客 - SYSIT个人博客</title>
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
            当前访客身份：<?php echo $this->session->userdata('uname');?>
            [ <a href="User/unindex">退出</a> ]
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
	<div id="OSC_Content"><div class="SpaceChannel">
	<div id="portrait"><a href="Blog/adminIndex"><img src="images/portrait.gif" alt="<?php echo $this->session->userdata('uname');?>" title="<?php echo $this->session->userdata('uname');?>" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
    <div id="lnks">
		<strong><?php echo $this->session->userdata('uname');?>的博客</strong>
		<div>
			<a href="Blog/index">TA的博客列表</a>&nbsp;|
			<a href="javascript:sendmsg(154693)">发送留言</a>
</span>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="Blog">
<div style="width: auto; height: auto; overflow: auto; position: relative;"><style>
.error_msg {display:none;color:#C00;padding:3px 3px 3px 20px;margin:0 0 10px 0;}
.error_msg a {margin:0 5px;}

.success_msg {
	margin:0 0 10px 0;
	display:none;
	font-size:12pt;
	color:#40AA53;
	padding:50px 0;
	text-align:center;
	font-wight:bold;
}
.success_msg a {margin:0 5px;color:#40AA53;}

#AjaxBox {
	text-align:left;
}

#AjaxBox #Title {
	padding:5px 0 5px 10px;
	background: #F2F2F2;
    font-size: 12pt; 
    font-weight:bold;
	margin-bottom:10px;
	height: 100px;
	line-height: 100px;
}

#AjaxBox #Title a {color:#4466BB;margin:0 3px;}

/** 表单 **/

#AjaxBox form {}
#AjaxBox form .SUBMIT {font-weight:bold;}
#AjaxBox form input {padding:1px 2px;}
#AjaxBox form textarea {background:#ffd;border:1px solid #ccc;padding:2px;}
#AjaxBox form tr.submit td {padding-top:20px;}

#AjaxBox form table {}
#AjaxBox form table tr th {text-align:right;}
#AjaxBox form table tr td {padding:0 0 5px 0;}
#AjaxBox form table tr td.heading {font-weight:bold;padding:0;}
#AjaxBox form table tr td span.Tip {color:#F90;margin-left:10px;}
#AjaxBox form table tr td span.Tip a {margin:0 5px;}
#AjaxBox form table tr td input {padding:2px;}
#AjaxBox form table tr td input.focusField {background:#ffc;}
#AjaxBox form table tr td textarea {font-size:10pt;line-height:20px;padding:2px;}
#AjaxBox form table tr.submit td input {font-size:10pt;padding:2px 5px;}

#AjaxBox img#img_vcode {border:2px solid #9AF;}

/* 表单 */
#AjaxBox form h2 {font-size:12pt; border-bottom:1px solid #ccc;margin:0;padding:10px 0 10px 20px;}
#AjaxBox form h2 a {margin:0 5px;}

#AjaxBox form tr.Tip td ol {
	list-style-position:inside;
	padding:5px 2px;
	border:1px solid #09F;
	line-height:22px;
	color:#06F;
}

#AjaxBox form tr.Tip td ol li.first {font-weight:bold;padding-left:0px;font-size:10.5pt;}
#AjaxBox form tr.Tip td ol li {padding-left:10px;}

#OSChinaLoginTip {margin:10px 0 0 0;font-size:10pt;padding:0 0 5px 0;color:#060;}
#OSChinaLoginTip ul {margin:10px 0 0 0;}
#OSChinaLoginTip ul li {float:left; width:90px;margin-right:30px;}
#OSChinaLoginTip ul li#openid_gmail img {margin-top:8px;}
#OSChinaLoginTip ul li#openid_yahoo img {margin-top:15px;}
#OSChinaLoginTip ul li#openid_msn img {}
#OSChinaLoginTip ul li a {display:block;height:40px;}
#OSChinaLoginTip ul li a {border:1px solid #fff;padding:2px;}
#OSChinaLoginTip ul li a:hover {border:1px solid #40AA53;background:#cfc;}
</style>
<div id="AjaxBox">
	<h2 id="Title">发送留言给 <u><?php echo $this->session->userdata('uname');?></u> 成功! <a href="Blog/index">查看<?php echo $this->session->userdata('uname');?>的博客列表</a></h2>
	<div id="Content"><div id="s_error_msg" class="error_msg"></div>
<div id="s_success_msg" class="success_msg"></div>
</div>
</div>
</div>	

</div>
<div class="BlogMenu"><div class="RecentBlogs SpaceModule">
	<strong>最新博文</strong><ul>
            <?php
            foreach ($new as $v) {
                ?>
                <li><a href="javascript:;"><?php echo $v->TITLE;?></a></li>
                <?php
            }
            ?>
			<li class="more"><a href="Blog/index">查看所有博文</a></li>
    </ul>
</div>

</div>
<div class="clear"></div>

<div id="inline_reply_editor" style="display:none;">
<div class="CommentForm">
	<form id="form_inline_comment" action="/action/blog/add_comment?blog=24026" method="POST">
	  <input id="inline_reply_id" name="reply_id" value="" type="hidden">          
      <textarea name="content" style="width: 450px; height: 60px;"></textarea><br>
	  <input value="回复" id="btn_comment" class="SUBMIT" type="submit"> 
	  <input value="关闭" class="SUBMIT" id="btn_close_inline_reply" type="button"> 文明上网，理性发言
    </form>
</div>
</div>
<script type="text/javascript" src="assets/js/Blog/blogs" defer="defer"></script>
<script type="text/javascript" src="assets/js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
<link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css">
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</body></html>