<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <base href="<?php echo site_url();?>">
  <title>我的留言箱 <?php echo $this->session->userdata('uname');?>的博客 - SYSIT个人博客</title>
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
				<?php echo $this->session->userdata('uname');?> [ <a href="Blog/index">退出</a> ]
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
    	<span id="AdminTitle">我的留言箱</span>
    </div>
    <div id="AdminMenu"><ul>
	<li class="caption">个人信息管理		
		<ol>
			<li class="current"><a href="Blog/inbox">站内留言(0/1)</a></li>
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
			<li><a href="Blog/blogs">文章管理</a></li>
			<li><a href="Blog/blogComments">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<ul class="tabnav"> 
	<li class="tab1 current"><a href="Blog/inbox">所有留言<em>(<?php echo $send_count->count;?>)</em></a></li>
	<li class="tab4"><a href="Blog/outbox">已发送留言<em>(0)</em></a></li>
    </ul>
<div class="MsgList">
<ul>
    <?php
        foreach ($receive as $v) {
            ?>
            <li id="msg_186720">
                <span class="sender">
                    <a href="Message/sendMsg?id=<?php echo $v->SENDER;?>">
                        <img src="images/12_50.jpg"
                             alt="<?php echo $v->NAME;?>"
                             title="<?php echo $v->NAME;?>"
                             class="SmallPortrait"
                             user="12" align="absmiddle">
                    </a>
                </span>
                <span class="msg">
                    <div class="outline">
                        <a href="Message/sendMsg?id=<?php echo $v->SENDER;?>" target="user"><?php echo $v->NAME;?></a>
                        发送于
                        <?php
                        $nowYear=date( 'Y' );//时间1--年
                        $nowMonth=date( 'm' );//时间1--月
                        $nowDay=date( 'd' );//时间1--日
                        $nowHour=date( 'H' );//时间1--时
                        $nowMinute=date( 'i' );//时间1--分
                        $nowSecond=date( 's' );//时间1--秒
                        $oldTime=$v->ADD_TIME;//get时间2
                        //分割字符串
                        $preDay=explode('-',$oldTime);
                        //                        echo $preDay[0];//时间2--年
                        //                        echo $preDay[1];//时间2--月
                        //分割字符串
                        $sdate=explode(' ',$preDay[2]);
                        //                        echo $sdate[0] ;//时间2--日
                        //分割字符串
                        $time=explode(':',$sdate[1]) ;//时间2--时间
                        //                        echo $time[0];//时间2--时
                        //                        echo $time[1];//时间2--分
                        //                        echo $time[2];//时间2--秒

                        if($nowYear!=$preDay[0]){
                            echo $nowYear-$preDay[0].'年';
                        }else if($nowMonth!=$preDay[1]){
                            echo $nowMonth-$preDay[1].'个月';
                        }else if($nowDay!=$sdate[0]){
                            echo $nowDay-$sdate[0].'天';
                        }else if($nowHour!=$time[0]){
                            echo $nowHour-$time[0].'小时';
                        }else if($nowMinute!=$time[1]){
                            echo $nowMinute-$time[1].'分钟';
                        }else if($nowSecond!=$time[2]){
                            echo $nowSecond!=$time[2].'秒';
                        }
                        ?>前(<?php echo $v->ADD_TIME;?>)
                        &nbsp;&nbsp;<a href="javascript:;" id="<?php echo $v->SENDER;?>">删除</a>
                    </div>
                    <div class="content">
                      <div class="c"><?php echo $v->CONTENT;?></div>
                    </div>
                    <div class="opts">
                        <a href="Message/sendMsg?id=<?php echo $v->SENDER;?>">回复留言</a>
                    </div>
	            </span>
                <div class="clear"></div>
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
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)<?php var_dump($send_count->count)?></div>
</div>
<script>
    $('.outline a:last-child').click(function (e) {
        $(this).parents('li#msg_186720').addClass('choice');
        var cfm=confirm('您确认要删除此条留言吗？');
        if(cfm==true){
            $.post('Blog/delsend_msg',{'del':e.target.id},function(data){
                $('li#msg_186720').remove('.choice');
            },'json')
        }else if(cfm==false){
            $('li#msg_186720').removeClass('choice');
        }
    });
</script>
</body></html>