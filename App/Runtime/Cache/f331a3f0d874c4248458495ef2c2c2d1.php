<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IT维护系统</title>


<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/easyui.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/icon.css">
<script src="__PUBLIC__/Js/jquery.min.js"></script>
<script src="__PUBLIC__/Js/jquery.easyui.min.js"></script>
<script src="__PUBLIC__/Js/easyui-lang-zh_CN.js"></script>
<script src="__PUBLIC__/Js/bootstrap.min.js"></script>

</head>
<body


	<div id="wrap" class="easyui-layout" data-options="fit:true,border:false" >
    
        <div id="north" data-options="region:'north'" style="height:50px; padding:10px;">
        	<strong>IT管理系统</strong>
        	<div style="float:right;">
        		<span>Admin你好</span>
                <span>退出登陆</span>
            </div>
        </div>
        
        <div id="west" data-options="region:'west',collapsible:true,collapsed:true" title="   " style="width:250px;"  >
                <div class="easyui-accordion" data-options="fit:true,border:false">
                    <div title="公告" style="padding:10px;">
                        11111111111
                    </div>
                    <div title="留言板" style="padding:10px;">
                        留言板
                    </div>
                    <div title="联系我们" style="padding:10px;">
                         22222222222222        
                    </div>
            
                </div>

        </div>
        
        <div id="center" class="easyui-tabs" data-options="region:'center',border:false">
			    <div title="首页" style="padding:10px">
                    3333333333333
                </div>
                <div title="维修记录" data-options="href:'<?php echo U('App/Index/wxjl');?>'" style="padding:5px">
                

                
                
                
                </div>
                <div title="设备管理" style="padding:5px">
                    555555555555555
                </div>
                <div title="IP地址管理" style="padding:5px">
                    66666666666666
                </div>
                <div title="知识库" style="padding:5px">
                    777777777777777
                </div>
                <div title="后台管理" data-options="href:''" style="padding:5px">
                    8888888888888888
                </div>
                
        </div>
        
        
    	
	</div>

</body>
</html>