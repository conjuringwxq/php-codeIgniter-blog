<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url();?>">
  <title><?php echo $userRatings->TITLE;?> -  <?php echo $this->session->userdata('uname');?>的博客 - SYSIT个人博客</title>
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
				<?php echo $this->session->userdata('uname');?> [ <a href="User/unindex">退出</a>] <span id="OSC_Notification">
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
			<a href="Message/sendMsg">发送留言</a>
</span>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="Blog">
	

  <div class="BlogTitle">

    <h1 id="<?php echo $userRatings->BLOG_ID;?>"><?php echo $userRatings->TITLE;?></h1>
    <div class="BlogStat">
        <span class="admin">
            <?php
                if($this->session->userdata('uid')==$userRatings->WRITER){
                    echo "<a href=\"Blog/newBlog?id=$userRatings->BLOG_ID\">编辑</a>&nbsp;|&nbsp;
                          <a href=\"javascript:;\">删除</a>";
                }else{
                    echo "";
                }
            ?>
		</span>
        发表于<?php
        $nowYear=date( 'Y' );//时间1--年
        $nowMonth=date( 'm' );//时间1--月
        $nowDay=date( 'd' );//时间1--日
        $nowHour=date( 'H' );//时间1--时
        $nowMinute=date( 'i' );//时间1--分
        $nowSecond=date( 's' );//时间1--秒
        $oldTime=$userRatings->ADD_TIME;//get时间2
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
        ?>前 ,
		已有<strong><?php echo $userRatings->CLICK_RATE;?></strong>次阅读
		共<strong><a href="javascript:scroll(0,330)"><?php echo $userRatings->COMM_RATE;?></a></strong>个评论
		<strong>1</strong>人收藏此文章
	</div> 
  </div>
  <div class="BlogContent TextContent"><?php echo $userRatings->TITLE;?></div>
      <div class="BlogLinks">
	<ul>
          <li>上篇<span>(1小时前)</span>：
              <?php $ntime=urlencode($prev->ADD_TIME);
              if($prev){?>
              <a href="Blog/viewPost_logined?id=<?php echo $prev->BLOG_ID?>?time=<?php echo $ntime?>" class="prev">
                  <?php echo $prev->TITLE;?>
              </a>
              <?php
              } else{
                  echo "<span style='font-weight:800;color:#000;'>没有了</span>";
              }?>
          </li>
          <li>下篇 <span>(11小时前)</span>：
              <?php $ntime=urlencode($next->ADD_TIME);
              if($next){?>
              <a href="Blog/viewPost_logined?id=<?php echo $next->BLOG_ID?>?time=<?php echo $ntime?>" class="next">
                  <?php echo $next->TITLE;?>
              </a>
              <?php
              } else{
                  echo "<span style='font-weight:800;color:#000;'>没有了</span>";
              }?>
          </li>
    </ul>
  </div>
    <div class="BlogComments">
        <h2><a name="comments" href="javascript:scroll(0,document.body.scrollHeight)" class="opts">发表评论»</a>
            <p class="num">共有<?php $num=$cou[0]->count;echo $num;?>条网友评论</p>
        </h2>
        <ul id="BlogComments">
            <?php
                foreach ($ator as $value){
            ?>
            <li id="cmt_24026_154693_261665458">
                <div class="portrait">
                    <a href="Blog/adminIndex">
                        <img src="images/portrait.gif"
                             alt="<?php echo $value->NAME;?>"
                             title="<?php echo $value->NAME;?>"
                             class="SmallPortrait"
                             user="154693"
                             align="absmiddle">
                    </a>
                </div>
                <div class="body">
                    <div class="title">
                        <?php echo $value->NAME;?> 发表于 <?php echo $value->ADD_TIME;?>
                        <a href="javascript:delete_c(24026,154693,261665458)">删除</a>
                    </div>
                    <div class="post"
                    "=""><?php echo $value->CONTENT;?>
                </div>
                <div id="inline_reply_of_24026_154693_261665458" class="inline_reply"></div>
    </div>
    <div class="clear">

    </div>
    </li>
    <?php
    }
            ?>
        </ul>
    </div>
  <div class="CommentForm">
    <a name="postform"></a>
    <form id="form_comment" action="javascript:scroll(0,0)" method="POST">
      <textarea id="ta_post_content" name="content" style="width: 450px; height: 100px;"></textarea><br>
	  <input value="发表评论" id="btn_comment" class="SUBMIT" type="submit"> 
	  <img id="submiting" style="display: none;" src="images/loading.gif" align="absmiddle">
	  <span id="cmt_tip">文明上网，理性发言</span>
    </form>
	<a href="javascript:scroll(0,0)" class="more">回到顶部</a>
	<a href="javascript:scroll(0,330)" class="more">回到评论列表</a>
  </div>
  </div>
<div class="BlogMenu"><div class="RecentBlogs SpaceModule">
	<strong>最新博文</strong>
        <ul>
            <?php
                foreach ($nArticle as $val) {
                    ?>
                    <li><a href="javascript:;"><?php echo $val->TITLE;?></a></li>
                    <?php
                }?>
			<li class="more"><a href="Blog/index">查看所有博文»</a></li>
        </ul>
</div>

</div>
<div class="clear"></div>

<div id="inline_reply_editor" style="display:none;">

</div>
<script type="text/javascript" src="assets/js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="css/shCore.css">
<link type="text/css" rel="stylesheet" href="css/shThemeDefault.css">

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script>
    $('#btn_comment').click(function(){
        $id=$('h1').attr('id');
        $content=$('textarea').val();
        $.post('Blog/announce',{'id':$id,'content':$content},function(data){
            $('ul#BlogComments').prepend("<li id='cmt_24026_154693_261665458'>"
                                +"<div class='portrait'>"
                                    +"<a href=\"#\">"
                                        +"<img src='images/portrait.gif'"
                                        +"alt='<?php echo $this->session->userdata('uname');?>'"
                                        +"title='<?php echo $this->session->userdata('uname');?>'"
                                        +"class='SmallPortrait'"
                                        +"user='154693'"
                                        +"align='absmiddle'>"
                                    +"</a>"
                                +"</div>"
                                +"<div class='body'>"
                                    +"<div class='title'>"
                                        +"<?php echo $this->session->userdata('uname');?> 发表于 <?php echo date('Y-m-d H-i-s');?>"
                                        +"<a href='javascript:delete_c(24026,154693,261665458)'>删除</a>"
                                    +"</div>"
                                    +"<div class='post'>"
                                    +$content
                                    +"</div>"
                                    +"<div id='inline_reply_of_24026_154693_261665458' class='inline_reply'></div>"
                                +"</div>"
                                +"<div class='clear'></div>"
                            +"</li>");
            $('p.num').html("共有"+($("#BlogComments li").length)+"条网友评论");//更改网友评论数据的条数
        },'json');
        $('textarea').val("");
    });
    $('.admin a:last-child').click(function(){
        var $title=$('h1').html();
        var cfm=confirm('文章删除后无法恢复，请确认是否删除此篇文章？');
        if(cfm==true) {
            $.post('Blog/delsub', {'title': $title}, function (data) {
                window.location='Blog/index';
            }, 'json')
        }
    });
</script>
</body></html>