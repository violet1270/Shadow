<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>名牌手袋租赁系统</title>
  <link rel="stylesheet" type="text/css" href="admin/css/common.css"/>
  <link rel="stylesheet" type="text/css" href="admin/css/main.css"/>
  <script type="text/javascript" src="admin/js/libs/modernizr.min.js"></script>
  <script type="text/javascript" src="js/check_input.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
  <style type="text/css"> 
.ppt-container, .ppt-container ul, .ppt-container li, .ppt-container img { 
margin : 0; 
padding : 0; 
border : 0; 
} 
.ppt-container { 
width : 950px; 
height : 460px; 
position : relative; 
} 
.ppt-container img { 
width : 100%; 
height : 100%; 
} 
.ppt-container .hide { 
display : none; 
} 
.ppt-container ul.image-list li { 
position : absolute; 
top : 0px; 
left : 100px; 
} 
.ppt-container ul.button-list { 
list-style : none; 
position : absolute; 
right : 20px; 
bottom : 20px; 
} 
.ppt-container ul.button-list li { 
float : left; 
padding-right : 10px; 
} 
.ppt-container ul.button-list span { 
background : #E5E5E5; 
padding : 1px 7px; 
line-height : 20px; 
font-size : 13px; 
display : block; 
cursor : default; 
} 
.ppt-container ul.button-list span.selected { 
color : #FFF; 
background : #FF7000; 
} 
</style> 
<script type="text/javascript"> 
$(function() { 
var iCountOfImage = 7; //共7张图片 
var iPreIndex = 0;     //上一次索引位置 
$(".ppt-container ul.button-list li span").click(function() { 
var iIndex = $(this).attr("data-index"); 
if(iIndex == iPreIndex) { 
return;   //点击了当前图片，不切换 
} 

$(".ppt-container .image-list li[data-index="+ iIndex +"]").fadeIn(1500); 
$(".ppt-container .image-list li[data-index="+ iPreIndex +"]").fadeOut(1500); 
iPreIndex = iIndex; 
$(".ppt-container .button-list span").removeClass("selected"); 
$(this).addClass("selected"); 
}); 
setInterval(function() { //自动播放，每5秒触发一次单击事件，来播放幻灯片 
var iNextIndex = (iPreIndex + 1) % iCountOfImage; 
$(".ppt-container ul.button-list li span[data-index="+ iNextIndex +"]").click(); 
}, 5000); 
}); 
</script> 
</head>
<body>
  <div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
      <div class="topbar-logo-wrap clearfix">
        <ul class="top-info-list clearfix">
          <li><a class="on" href="index.php">首页</a></li>
          <li><a class="on" href="online_reserve.php">在线预订</a></li>
          <li><a class="on" href="order_query.php">订单查询</a></li>
        </ul>
      </div>
      <div class="top-info-wrap">
        <ul class="top-info-list clearfix">
          <li><a class="on" href="admin/index.php">后台管理</a></li>
          <li><a class="on" href="about.php">关于我们</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container clearfix">
    <div class="sidebar-wrap">
      <div class='sidebar-title' style="padding-top:20px">
        <h1><?php echo date("Y/m/d"); ?></h1>
      </div>
      <div style="text-align: center">
          <div style="padding-top: 10px">
          <img alt="" style="width: 180px; height: 180px" src="./images/a1.jpg">
          </div>
          <div style="padding-top: 10px">
          <img alt="" style=" width: 180px; height: 180px" src="./images/a2.jpg">
          </div>
          <div style="padding-top: 10px">
          <img alt="" style="width: 180px; height: 180px" src="./images/a3.jpg">
          </div>
      </div> 
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><span>欢迎使用名牌手袋租赁系统！</span></div>
      </div>
      <div style="width:1067px; height:470px;background-color:#999;margin-top:40px;padding-top:20px">
           <div class="ppt-container"> 
                <ul class="image-list"> 
                  <li data-index="0"><img style="width: 800px; height: 400px" src="./images/bb.jpg"/></li> 
                  <li data-index="1" class="hide"><img style="width: 800px; height: 400px" src="./images/b8.jpg"/></li> 
                  <li data-index="2" class="hide"><img style="width: 800px; height: 400px" src="./images/b3.jpg"/></li>
                  <li data-index="3" class="hide"><img style="width: 800px; height: 400px" src="./images/b4.jpg"/></li>
                  <li data-index="4" class="hide"><img style="width: 800px; height: 400px" src="./images/b5.jpg"/></li>
                  <li data-index="5" class="hide"><img style="width: 800px; height: 400px" src="./images/b6.jpg"/></li>
                  <li data-index="6" class="hide"><img style="width: 800px; height: 400px" src="./images/b7.jpg"/></li>
                </ul> 
                <ul class="button-list"> 
                  <li><span data-index="0" class="selected">1</span></li>
                  <li><span data-index="1">2</span></li>
                  <li><span data-index="2">3</span></li>
                  <li><span data-index="3">4</span></li>
                  <li><span data-index="4">5</span></li>
                  <li><span data-index="5">6</span></li>
                  <li><span data-index="6">7</span></li>
                </ul> 
              </div>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>
