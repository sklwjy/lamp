<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>灵步网微博-点滴生活，精彩世界</title>
<link href="styles/SBGG.css" type="text/css" rel="stylesheet" />
<link href="styles/global.css" type="text/css" rel="stylesheet" />
<script src="script/SBGG.js" language="javascript" />
<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</script>

</head>

<body>
<!-- 总容器 continer DIV 开始 -->
<div id="continer">
  <!-- top部分DIV -->
	<div id="top">
    	<!-- top部分的LogoDIV -->
    	<div id="topLogo">
        	<!-- topLogo部分的icoDIV -->
            <div id="topLogoIco"> <a href="index.html"><img src="images/logo_ipad.png" width="72" height="72" alt="" /></a>
          </div>
            <!-- topLogo部分的icoDIV结束 -->
            
            <!-- topLogo部分的wordDIV -->
            <div id="topLogoWord"> <a href="index.html"><img src="images/LogoMaker.gif" width="128" height="60" alt="" /></a>
          </div>
            <!-- topLogo部分的wordDIV -->
        </div>
        <!-- top部分的LogoDIV结束 -->
        
        <!-- top部分的文字导航 -->
        <div id="topWordMenu">
        	<ul>
            	<li>已有灵步账号，<a href="login.html">请登录</a></li>
                <li><a href="SBGG.html">随便逛逛</a></li>
                <li><a href="#">手机</a></li>
                <li><a href="#">帮助</a></li>
            </ul>
        </div>
        <!-- top部分的文字导航结束 -->
    </div>
    <!-- top部分结束 -->
    </div>
    <!-- topDIv 结束-->
    <!-- 下部容器 main DIV 开始 -->
	<div id="main">
    	<!-- 下部容器头部注内 DIV 开始 -->
    	<div id="mainTop">
    	  <!--下部容器头部注册内容 DIV 开始 -->
    	  <div id="mainTopContent">
    	    <!-- 字体DIV 开始 -->
    	    <div id="topWord" class="topWord"> 点击生活，精彩世界，快来加入灵步网微博吧 </div>
    	    <!-- 字体DIV 结束 -->
    	    <!-- 文本框DIV 开始 -->
    	    <div id="topTextDIV">
    	      <input type="topText" value="请输入电子邮箱" id="topText" />
  	      </div>
    	    <!-- 文本框DIV 结束-->
    	    <!-- 注册按钮 DIV 开始 -->
    	    <div id="ZCButton"> <img src="images/ZCButton.gif"  onclick="quickZC()"/></div>
    	    <!-- 注册按钮 DIV 结束-->
    	    <!-- 电子邮箱 开始 -->
    	    <div id="mail1">电子邮箱 </div>
    	    <!-- 电子邮箱 结束 -->
    	    <!-- 创建密码 开始 -->
    	    <div id="password11">创建密码 </div>
    	    <!-- 创建密码 结束 -->
    	    <!-- 密码确认 开始 -->
    	    <div id="password21">密码确认 </div>
    	    <!-- 密码确认 结束 -->
    	    <!-- 验证码 开始 -->
    	    <div id="yangzhen1">验 证 码 </div>
    	    <!-- 验证码 结束 -->
    	    <!-- 电子邮箱输入框 开始 -->
    	    <div id="mail2" >
    	      <input id="mailInput" type="text" onblur="checkMail()" class="mailInput"/>
  	      </div>
    	    <!-- 电子邮箱输入框 结束 -->
    	    <!-- 创建密码输入框 开始 -->
    	    <div id="password12" >
    	      <input id="passwordInput" type="password" onblur="checkPassword()" />
  	      </div>
    	    <!-- 创建密码输入框 结束 -->
    	    <!-- 密码确认输入框 开始 -->
    	    <div id="password22" >
    	      <input id="passwordTwice" type="password" onblur="isSame()" />
  	      </div>
    	    <!-- 密码确认输入框 结束 -->
    	    <!-- 验证码输入框 开始 -->
    	    <div id="yangzheng2" >
    	      <input id="yangzhen" type="text" onblur="checkIsRight()" />
  	      </div>
    	    <!-- 验证码输入框 结束 -->
    	    <!-- 电子邮箱提示框 开始 -->
    	    <div id="mail3"> 找回账号和密码用。如123@ifeng.com </div>
    	    <!-- 电子邮箱提示框 结束 -->
    	    <!-- 创建密码提示框 开始 -->
    	    <div  id="password13">密码至少包含一个数字和字母且不能小于6位</div>
    	    <!-- 创建密码提示框 结束 -->
    	    <!-- 密码确认提示框 开始 -->
    	    <div  id="password23"></div>
    	    <!-- 密码确认提示框 结束 -->
    	    <!-- 验证码提示框 开始 -->
    	    <div id="yangzhen3"></div>
    	    <!-- 验证码提示框 结束 -->
    	    <div id="picyanzheng"></div>
    	    <!-- 换验证码 DIV 开始 -->
    	    <div id="change"> 看不清？&nbsp;&nbsp;<a href="javascript:getnum()">换一换</a><br />
  	      </div>
    	    <!-- 换验证码 DIV 结束 -->
    	    <!-- 注册成功 DIV 开始 -->
    	    <div id="success"> <img  id="link" src="images/ZCButton1.gif" border="0" onclick="checkAll()" /> </div>
    	    <!-- 注册成功 DIV 结束 -->
    	    <!-- 头部拉起控制DIV 开始 -->
    	    <div id="hangUp"> <img src="images/UpArrow.gif" width="20" height="23" onclick="hangUp()" /> </div>
    	    <!-- 头部拉起控制DIV 结束 -->
  	    </div>
    	  <!-- 下部容器头部注内容册 DIV 结束 -->
          <!-- flash1 DIV 开始 -->
          <div id="flash1">
            <object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="500" height="207">
              <param name="movie" value="flash/41.swf" />
              <param name="quality" value="high" />
              <param name="wmode" value="transparent" />
              <param name="swfversion" value="6.0.65.0" />
              <!-- 此 param 标签提示使用 Flash Player 6.0 r65 和更高版本的用户下载最新版本的 Flash Player。如果您不想让用户看到该提示，请将其删除。 -->
              <param name="expressinstall" value="Scripts/expressInstall.swf" />
              <!-- 下一个对象标签用于非 IE 浏览器。所以使用 IECC 将其从 IE 隐藏。 -->
              <!--[if !IE]>-->
              <object type="application/x-shockwave-flash" data="flash/41.swf" width="500" height="207">
                <!--<![endif]-->
                <param name="quality" value="high" />
                <param name="wmode" value="transparent" />
                <param name="swfversion" value="6.0.65.0" />
                <param name="expressinstall" value="Scripts/expressInstall.swf" />
                <!-- 浏览器将以下替代内容显示给使用 Flash Player 6.0 和更低版本的用户。 -->
                <div>
                  <h4>此页面上的内容需要较新版本的 Adobe Flash Player。</h4>
                  <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="获取 Adobe Flash Player" /></a></p>
                </div>
                <!--[if !IE]>-->
              </object>
              <!--<![endif]-->
            </object>
          </div>
        <!-- flash1 DIV 结束 -->        
</div>
    	<!-- 下部容器头部注内 DIV 结束 -->
        <!--下部容器左侧mainBanner DIV 开始 -->
<div id="mainBanner">
        	<!-- 左侧内容 DIV 开始 -->
            <div id="mainBannerContent" >
            	<!-- 左侧内容链接DIV 开始 -->
                <div style="height:20px; width:523px;">
                </div>
       	  	  <div id="mainBanngerContertLink">
                	<!-- 三个小的文字链接DIV 开始-->
                    <div id="littleLink1" class="littleLink" >
                    	<a href="#">热门微博</a>
                    </div>                    	
                    <div id="littleLink2" class="littleLink">
                    	<a href="#">大家正在说</a>
                    </div>
                    <div id="littleLink3" class="littleLink">
                    	<a href="#">最新加入</a>
                    </div>
                    <!-- 三个小的文字链接DIV 结束-->
             	</div> 
                <!-- 左侧内容链接DIV 结束 -->
                <!-- 左侧内容今日人物DIV 开始 -->
              <div id="mainBannerToday" onmouseover="ting()" onmouseout="goon()">
                	<div style="margin-top:10px; margin-left:10px;">
                	<font style="font-size:16px; font-weight:700;">今日人物</font><br />
                    </div>
                    <br />
                	<!-- 今日人物1内容DIV -->
               	  	<div id="today" name="name">                  
                        <div id="TX">
                          <img src="images/TX1.gif" width="54" height="58" alt="" title="" />
                        </div>
                        <div id="todayWord">
                        <font class="customerWord1"><a href="#">時事辯論會</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">香港</font><br /> 
                        <font class="customerWord3">微博766&nbsp;粉丝39968</font><br />
                        <br />
                        <br />
                        </div>
                        <div id="guanzhu">
                        	<img src="images/today.gif" alt="" width="16" height="20" align="absmiddle" title="" />
                            &nbsp;<font style="font-size:14px; color:#005DC3;"><a href="login.html">加关注</a></font>
                    	</div>
               	  	</div>      
                    
                    <!-- 今日人物2内容DIV -->
               	  	<div id="today" name="name">                  
                        <div id="TX" >
                          <img src="images/TX3.gif" width="54" height="58" alt="" title="" />
                        </div>
                        <div id="todayWord">
                        <font class="customerWord1"><a href="#">摄影师肖育文</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">云南</font><br /> 
                        <font class="customerWord3">微博
16666&nbsp;粉丝5496</font><br />
                        <br />
                        <br />
                        </div>
                        <div id="guanzhu">
                        	<img src="images/today.gif" alt="" width="16" height="20" align="absmiddle" title="" />
                            &nbsp;<font style="font-size:14px; color:#005DC3;"><a href="login.html">加关注</a></font>
                    	</div>
           	  	  	</div>         
                    
                    <!-- 今日人物3内容DIV -->
               	  	<div id="today" name="name">                  
                        <div id="TX" >
                          <img src="images/TX5.gif" width="54" height="58" alt="" title="" />
                        </div>
                        <div id="todayWord">
                        <font class="customerWord1"><a href="#">一娴</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">海外</font><br /> 
                        <font class="customerWord3">微博247&nbsp;粉丝201475</font><br />
                        <br />
                        <br />
                        </div>
                        <div id="guanzhu">
                        	<img src="images/today.gif" alt="" width="16" height="20" align="absmiddle" title="" />
                            &nbsp;<font style="font-size:14px; color:#005DC3;"><a href="login.html">加关注</a></font>
                    	</div>
           	  	  	</div>         
                    
                    <!-- 今日人物4内容DIV -->
           	  	<div id="today" name="name">                  
                        <div id="TX" >
                        <img src="images/TX7.gif" width="54" height="58" alt="" title="" />
                        </div>
                        <div id="todayWord">
                        <font class="customerWord1"><a href="#">王亚龙</a>	</font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">台湾</font><br /> 
                        <font class="customerWord3">微博4575&nbsp;粉丝79968</font>
                        <br />
                        <br />
                        </div> 
                        <div id="guanzhu">
                        	<img src="images/today.gif" alt="" width="16" height="20" align="absmiddle" title="" />
                            &nbsp;<font style="font-size:14px; color:#005DC3;"><a href="login.html">加关注</a></font>
                    	</div><br />                       
       	  	  	</div> 
                              
              </div>
                <!-- 左侧内容今日人物DIV 结束 -->
                <br /><br />
                &nbsp;&nbsp;&nbsp;&nbsp;
                <font class="bannerword1">新增粉丝最多的用户</font>
                <!-- 按钮DIV 开始 -->
                <div style="float:right;">
                    <input type="button" style="btn1" value="今日" class="btn1" />
                    <input type="button" style="btn1" value="全部" class="btn1" />
                </div><br />
                <!-- 按钮DIV 结束 -->
                <hr class="bannerhr" />
                <!-- 多个用户DIV -->
                <div id="customer" >
                    <div id="GZIcon" >
                        <font class="GZIconWord1">351</font><br />
                        <font class="GZIconWord2"><a href="login.html">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX1.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">時事辯論會</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">香港</font><br /> 
                    <font class="customerWord3">微博766&nbsp;粉丝39968</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">297</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX2.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">程贺麟</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">香港</font><br /> 
                    <font class="customerWord3">微博3017&nbsp;粉丝19100</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">266</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX3.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">一娴</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">海外</font><br /> 
                    <font class="customerWord3">微博766&nbsp;粉丝39968</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">263</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX4.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">黄海波</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">香港</font><br /> 
                    <font class="customerWord3">微博1374&nbsp;粉丝68831</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">260</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX5.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">李阳的微博</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2"> 广东 广州市</font><br /> 
                    <font class="customerWord3">微博238&nbsp;粉丝6801</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">260</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX6.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">董一鸣</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">北京</font><br /> 
                    <font class="customerWord3">微博254&nbsp;粉丝5999</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">260</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX7.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">柯云路</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">北京 海淀区</font><br /> 
                    <font class="customerWord3">微博288&nbsp;粉丝7128</font><br />
                    【人生百态】某大学教授感叹：“在大学，想很好的通过考试，一般有3种方式：第一，作弊；第二，找任课老师拉关系；第三，刻苦攻读！”毕业后，第一种人成了商业能手，第二种人进了政界，第三种人在教书或者打工！有同感的童鞋请转发。41分钟前
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">254</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX8.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">樊建川</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2"> 四川 成都市</font><br /> 
                    <font class="customerWord3">微博402&nbsp;粉丝7647</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">243</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX9.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">斗官</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">海外</font><br /> 
                    <font class="customerWord3">微博193&nbsp;粉丝562</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">241</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                        <img src="images/TX10.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">怪帥姜聲揚</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">香港</font><br /> 
                    <font class="customerWord3">微博1028&nbsp;粉丝60896</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">219</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                      <img src="images/TX11.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">性感美女搞笑汇总</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">广东 广州市</font><br /> 
                    <font class="customerWord3">微博511&nbsp;粉丝542</font><br />
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">215</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                      <img src="images/TX12.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">李忠辉</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">
                    <font class="customerWord2">广东 深圳市</font><br />
                    <font class="customerWord3">微博1406&nbsp;粉丝5039</font><br /> 娱乐项目开发，应该照顾国人情感——体验经济，旅游经济都是趋势，但活动策划者要做受人尊敬的大爷而不是讨骂的孙子。//@時事辯論會 这个好玩吗？33分钟前 
                    <br />
                    <br />
                  	</div>
                </div>
                
                <div id="customer">
                    <div id="GZIcon" >
                        <font class="GZIconWord1">188</font><br />
                        <font class="GZIconWord2"><a href="#">加关注</a></font>
                    </div>
                    <div id="TX" >
                      <img src="images/TX13.gif" width="54" height="58" alt="" title="" />
                    </div>
                    <div id="customerWord" >
                    <font class="customerWord1"><a href="#">不弯的丁子</a></font><img src="images/HG.gif" alt="" width="15" height="15" align="absmiddle" title=""/>&nbsp;<font class="customerWord2">北京 朝阳区</font><br /> 
                    <font class="customerWord3">微博507&nbsp;粉丝491</font><br />不夸张//@闻媚而动 太夸张了吧？//@不弯的丁子 不能把你忽悠，就把你灭掉！ 毛的精髓！ @闻媚而动 什么都要/废除滴/@张铁 啥理，说说，//@闻媚而动 说滴好//@张铁 有理，/@老顽童野兔 一百步还要笑五十步！还要脸不？恬不知耻！陈云评他：建党他有份，建国他有功，治国他无能，文革他犯罪！/@张铁 呵呵查看全文今天 16:15 
                    <br />
                    <br />
                  	</div>
                </div>
                
      	</div>
    </div>
    <!--下部容器左侧mainBanner DIV 结束 -->
    <!--下部容器右侧mainRight DIV 开始 -->
    <div id="mainRight">
          <!--下部容器右侧mainRight1 DIV 开始 -->
         <div id="mainRight1">
             <!--下部容器右侧mainRight1Banner DIV 开始 -->
             <div id="mainRight1Banner">
                <!--下部容器右侧mainRight1BannerMenu DIV 开始 -->
               <div id="mainRight1BannerMenu">
                  <!--下部容器右侧mainRight1BannerMenuTop DIV 开始 -->
                   <div id="mainRight1BannerMenuTop"><b>今日发布最多的用户</b>
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuTop DIV 结束 -->
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg1.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">雨中人87</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>332</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg2.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">莪程</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>308</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg3.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">每日热点</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>272</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg4.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">江南水玲</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>246</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg5.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">萧萧雨歇</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>243</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 -->
                   <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg6.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">住无边慧</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>238</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg7.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">阿奎力斯</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>236</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg8.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">仿织公</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>194</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg9.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">花国宝</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>185</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg10.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">ZGONGGUODAYE</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>166</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
               </div>
                <!--下部容器右侧mainRight1BannerMenu DIV 结束 -->
               <div id="mainRight1BannerMenu">
                  <!--下部容器右侧mainRight1BannerMenuTop DIV 开始 -->
                   <div id="mainRight1BannerMenuTop"><b>今日转发最多的用户</b>
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuTop DIV 结束 -->
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg5.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">萧萧雨歇</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>431</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg11.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">无名花飘香</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>420</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg9.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">花国宝</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>386</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg8.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">仿织公</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>286</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg2.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">莪程</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>232</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 -->
                   <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg12.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">射京办主任</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>215</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg13.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">王金法</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>207</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg14.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">我是猫人</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>198</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg15.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">拿着傻瓜机的菜鸟</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>180</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 开始 -->
                  <div id="mainRight1BannerMenuPeople">
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleImg"><a href="#"><img src="images/mainRight1BannerMenuPeopleImg16.gif" alt="" align="absmiddle" title="" /></a>
                     </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleImg DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 开始 -->
                     <div id="mainRight1BannerMenuPeopleWord1"><a href="#">张铁</a><br />
                       <a href="#">加关注
                     </a></div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord1 DIV 结束 -->
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 开始 -->
                    <div id="mainRight1BannerMenuPeopleWord2"><b>153</b>
                    </div>
                     <!--下部容器右侧mainRight1BannerMenuPeopleWord2 DIV 结束 -->
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuPeople DIV 结束 --> 
                   <!--下部容器右侧mainRight1BannerMenuTop DIV 开始 -->
                   <div id="mainRight1BannerMenuTop"><b><font size="3">今日热门话题</font></b>
                  </div>
                  <!--下部容器右侧mainRight1BannerMenuTop DIV 结束 -->
                  <!--下部容器右侧mainRight1BannerMenuRank DIV 开始 -->
                  <div id="mainRight1BannerMenuRank"><font size="4">1</font>&nbsp;<a href="#">中超</a>&nbsp;（3042）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 -->
               <div id="mainRight1BannerMenuRank"><font size="4">2</font>&nbsp;<a href="#">暴雨</a>&nbsp;（9200）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">3</font>&nbsp;<a href="#">伊伊</a>&nbsp;（1333）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">4</font>&nbsp;<a href="#">变形金刚</a>&nbsp;（3209）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">5</font>&nbsp;<a href="#">情人节</a>&nbsp;（8129）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">6</font>&nbsp;<a href="#">双色球</a>&nbsp;（1711）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">7</font>&nbsp;<a href="#">哈利波特</a>&nbsp;（715）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">8</font>&nbsp;<a href="#">还珠格格</a>&nbsp;（1418）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">9</font>&nbsp;<a href="#">味千拉面</a>&nbsp;（812）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 --> 
               <div id="mainRight1BannerMenuRank"><font size="4">10</font>&nbsp;<a href="#">上座率</a>&nbsp;（1746）
               </div>
               <!--下部容器右侧mainRight1BannerRank DIV 结束 -->  
               </div>
                <!--下部容器右侧mainRight1BannerMenu DIV 结束 -->
                <!--下部容器右侧mainRight1Banner DIV 结束 -->
         </div>
         </div>
         <!--下部容器左侧mainRight1 DIV 结束 -->
      </div>
    <!--下部容器左侧mainRight DIV 结束 -->
</div>
    <!-- 下部容器 main DIV 结束 -->
    <!-- 脚部footer DIV 开始 -->
    <<div id="footer">
    	<!-- footer网站链接部分 -->
    	<div id="footerLink">      
            <ul>
            	<li><a href="#" class="a2">灵步网介绍</a></li>
                <li><a href="#" class="a2">广告服务</a></li>
                <li><a href="#" class="a2">API</a></li>
                <li><a href="#" class="a2">诚征英才</a></li>
                <li><a href="#" class="a2">保护隐私权</a></li>
                <li><a href="#" class="a2">免责条款</a></li>
                <li><a href="#" class="a2">法律顾问</a></li>
                <li><a href="#" class="a2">意见反馈</a></li>
            </ul>
        </div>
        <!-- footer网站链接部分结束 -->
        <!-- footer网站版权信息 -->
        <div id="footerCopy">
        	Copyright&copy;2011-2012 灵步小组 版权所有
      </div>
        <!-- footer网站版权信息结束 -->
</div>
    <!-- 脚部footer DIV 开始 -->
    
</div>
<!-- 总容器 continer DIV 结束 -->
<script type="text/javascript">
<!--
//-->
</script>
</body>
</html>
