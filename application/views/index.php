<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Language" content="zh-CN">
	<base href="<?php echo site_url();?>">
  <title>
	<?php if($this->session->userdata('uid')){
        echo $this->session->userdata('uname');
    }
	?>的博客 - SYSIT个人博客</title>
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
    		<form action="Blog/index" method="post">
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
		<div><a href="Blog/index">TA的博客列表</a>&nbsp;|
			<a href="Blog/outbox">发送留言</a></div>
	</div>
	<div class="clear"></div>
</div>
<div class="BlogList">
<ul>
	<?php
        foreach ($blogs as $val) {
            //urlencode进行编码
            $newtime=urlencode($val->ADD_TIME);
    ?>
    <li class="Blog" id="<?php echo $val->BLOG_ID;?>">
        <h2 class="BlogAccess_true BlogTop_0"><a href="Blog/viewPost_logined?id=<?php echo $val->BLOG_ID;?>?time=<?php echo $newtime;?>"><?php echo $val->TITLE; ?></a></h2>
        <div class="outline">
            <span class="time">发表于：<?php echo $val->ADD_TIME; ?></span>
            <span class="catalog">分类：<a href="javascript:;"><?php echo $val->NAME; ?></a></span>
            <span class="stat">统计: <?php echo $val->COMM_RATE; ?>评/<?php echo $val->CLICK_RATE; ?>阅</span>
            <?php
                if ($this->session->userdata('uid') == $val->USER_ID) {
                    echo "<span class=\"blog_admin\">
                            ( <a href=\"Blog/newBlog?id=$val->BLOG_ID\">修改</a> | 
                            <a href=\"javascript:;\" id=$val->BLOG_ID\">删除</a> )
                          </span>";
                } else {
                    echo "";
                }
            ?>
    </div>
		<div class="TextContent" id="blog_content_24027">
				<?php echo $val->CONTENT;?>
		<div class="fullcontent"><a href="Blog/viewPost_logined?id=<?php echo $val->BLOG_ID;?>?time=<?php echo $newtime;?>">阅读全文...</a></div>
			</div>
	  </li>
	<?php
		}
	?>
</ul>
<div class="clear"></div>
	</div>
<div class="BlogMenu"><div class="admin SpaceModule">
  <strong>博客管理</strong>
  <ul class="LinkLine">
	<li><a href="Blog/newBlog">发表博客</a></li>
			<li><a href="Blog/blogCatalogs">博客分类管理</a></li>
	<li><a href="Blog/blogs">文章管理</a></li>
	<li><a href="Blog/blogComments">网友评论管理</a></li>
  </ul>
</div>
<div class="catalogs SpaceModule">
  <strong>博客分类</strong>
  <ul class="LinkLine">
      <?php
        foreach($blog1 as $v) {
            ?>
            <li><a href="javascript:;"><?php echo $v->NAME;?>(<?php echo $v->count;?>)</a></li>
            <?php
        }
      ?>
  </ul>
</div>
<div class="comments SpaceModule">
  <strong>最新网友评论</strong>
      <ul>
          <?php
            foreach ($blog2 as $v) {
                //urlencode进行编码
                $newtime=urlencode($v->ADD_TIME);
                ?>
                <li>
                    <span class="u"><a href="Blog/viewPost_logined?id=<?php echo $v->COMMENT_ID;?>?time=<?php echo $newtime;?>">
                            <img src="images/portrait.gif"
                                 alt="<?php echo $v->ACCOUNT; ?>"
                                 title="<?php echo $v->ACCOUNT; ?>"
                                 class="SmallPortrait" user="154693" align="absmiddle"></a></span>
                    <span class="c"><?php echo $v->ACCOUNT;?>
                <span class="t">发布于
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
                    ?>前 <a href="Blog/viewPost_logined?id=<?php echo $v->COMMENT_ID;?>?time=<?php echo $newtime;?>">查看»</a></span>
            </span>
                    <div class="clear"></div>
                </li>
                <?php
            }
          ?>
	  </ul>
  </div></div>
<div class="clear"></div>
</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</div>

<!--<script>
    $('.SUBMIT').click(function(){
       $.post('Blog/index',{},function(data){

       },'json');
    });
</script>-->
<script>
    $('.blog_admin a:last-child').click(function (e) {
        $(this).parents('li.Blog').addClass('choice');
        // var idx=$('.blog_admin a:last-child').index($(this));
        var cfm=confirm('文章删除后无法恢复，请确认是否删除此篇文章？');
        if(cfm==true){
            $.get('Blog/del', {'id':e.target.id},function(data){
                $('li.Blog').remove('.choice');
            },'json');

        }else if(cfm==false){
            $('li.Blog').removeClass('choice');
        }
        // window.location.reload();//如果不加该方法，就得重新计算count
    });
</script>
</body>
</html>