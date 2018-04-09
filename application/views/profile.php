<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url();?>">
  <title>会员资料设置 <?php echo $this->session->userdata('uname');?>的博客 - SYSIT个人博客</title>
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
    	<span id="AdminTitle">会员资料设置</span>
    </div>
    <div id="AdminMenu"><ul>
	<li class="caption">个人信息管理		
		<ol>
			<li><a href="Blog/inbox">站内留言(0/1)</a></li>
			<li class="current"><a href="Blog/profile">编辑个人资料</a></li>
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
			<li class="current"><a href="Blog/blogComments">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<ul class="tabnav"> 
	<li class="current"><a href="javascript:;">会员基本资料</a></li>
</ul>

<div class="MainForm">
<form class="AutoCommitJSONForm" action="Blog/do_profile" method="POST">
<table>
	<tbody><tr>
		<th>登录帐号</th>		
		<td>
			<?php echo $this->session->userdata('uname');?>
		</td>
	</tr>
	<tr>
		<th>姓名</th>		
		<td>
			<input name="name" size="20" maxlength="20" class="TEXT" value="<?php echo $mydata[0]->NAME;?>" type="text">
			<span class="Info" id="name_msg">不能超过10个字</span>
		</td>
	</tr>
	<tr>
    	<th>性别</th>		
		<td>
			<input name="gender" value="1" checked="<?php
                if($mydata[0]->GENDER==1){
                    echo 'checked';
                }else{
                    echo '';
                }
            ?>" type="radio">男
			<input name="gender" value="2" checked="<?php
            if($mydata[0]->GENDER==1){
                echo 'checked';
            }else{
                echo '';
            }
            ?>" type="radio">女
		</td>	
    </tr>
	<tr>
    	<th>出生年月</th>		
		<td>
            <select name="y"><option selected="selected" value="0">--</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option></select> 年
            <select name="m"><option selected="selected" value="00">--</option><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select> 月
            <select name="d"><option selected="selected" value="00">--</option><option value="01">1</option><option value="02">2</option><option value="03">3</option><option value="04">4</option><option value="05">5</option><option value="06">6</option><option value="07">7</option><option value="08">8</option><option value="09">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option></select> 日
		</td>	
    </tr>
	<tr>
		<th>居住地区</th>		
		<td><select onchange="showcity(this.value, document.getElementById('userCity'));" name="province" id="userProvince">
	<option value="">--请选择省份--</option>
	<option value="北京">北京</option> 
	<option value="上海">上海</option> 
	<option value="广东">广东</option> 
	<option value="江苏">江苏</option> 
	<option value="浙江">浙江</option> 
	<option value="重庆">重庆</option> 
	<option value="安徽">安徽</option> 
	<option value="福建">福建</option> 
	<option value="甘肃">甘肃</option> 
	<option value="广西">广西</option> 
	<option value="贵州">贵州</option> 
	<option value="海南">海南</option> 
	<option value="河北">河北</option> 
	<option value="黑龙江">黑龙江</option>
	<option value="河南">河南</option> 
	<option value="湖北">湖北</option> 
	<option value="湖南">湖南</option> 
	<option value="江西">江西</option> 
	<option value="吉林">吉林</option> 
	<option value="辽宁">辽宁</option> 
	<option value="内蒙古">内蒙古</option> 
	<option value="宁夏">宁夏</option> 
	<option value="青海">青海</option> 
	<option value="山东">山东</option> 
	<option value="山西">山西</option> 
	<option value="陕西">陕西</option> 
	<option value="四川">四川</option> 
	<option value="天津">天津</option> 
	<option value="新疆">新疆</option> 
	<option value="西藏">西藏</option> 
	<option value="云南">云南</option> 
	<option value="香港">香港特别行政区</option> 
	<option value="澳门">澳门特别行政区</option>
	<option value="台湾">台湾</option> 
	<option value="海外">海外</option>
</select>
<select name="city" id="userCity">
    <option selected="selected" value="哈尔滨">哈尔滨</option>
    <option value="北安">北安</option>
    <option value="大庆">大庆</option>
    <option value="大兴安岭">大兴安岭</option>
    <option value="鹤岗">鹤岗</option>
    <option value="黑河">黑河</option>
    <option value="佳木斯">佳木斯</option>
    <option value="鸡西">鸡西</option>
    <option value="牡丹江">牡丹江</option>
    <option value="齐齐哈尔">齐齐哈尔</option>
    <option value="七台河">七台河</option>
    <option value="双鸭山">双鸭山</option>
    <option value="绥化">绥化</option>
    <option value="伊春">伊春</option>
</select>
</td>
	</tr>
	<tr>
		<th>个性签名<br>不超过100字</th>		
		<td><textarea name="signature" style="width: 300px; height: 100px;" class="TEXT"><?php echo $mydata[0]->SIGNATURE;?></textarea></td>
	</tr>
	<tr><th colspan="2"></th></tr>
	<tr class="submit">
		<th></th>
		<td>
		<input value="保存修改" class="BUTTON SUBMIT" type="submit">
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
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)<?php var_dump($mydata[0]);?></div>
</div>
<script>
</script>
</body></html>