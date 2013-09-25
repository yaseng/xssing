<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>会员注册</title>
<meta name="description" content="xxxx">
<meta name="keywords" content="aaaa">
<link href="<?php echo  PUBLIC_STYLE_URL?>login.css" rel="stylesheet" type="text/css" />
<script language="javascript"  src="<?php echo STATIC_JS_URL ?>jquery.js"></script>
</head>
<body>
<div class="loginmask"></div>
<div class="loading" style="display: none; "></div>
<div class="login" style="display: block; ">
  <div class="logo">   </div>

  <div class="input">
    <div class="log">
      
    <div class="reg">
        
        <?php    if(!$is_incode){   ?>  <div class="name"  id="reg_1">
	 <font  color="#00FF00"  >  Invitation code  error </font>  </div>
	 <?php  }  else {  ?>
     
       <form  id="reg"   action="?m=user&a=onreg"  method="post">
        
      <div class="name">
        <input type="text" id="reg_1" placeholder="用户名" name="reg_1" tabindex="1">
      </div>
      <div class="pwd">
        <input type="password" id="reg_2" placeholder="密码" name="reg_2" tabindex="2">
      </div>
      <div class="pwd">
        <input type="password" id="reg_3" placeholder="确认密码" name="reg_3" tabindex="3">
        <input type="hidden"   id="incode"  name="incode" value="<?php echo $i ?>">
        <input type="button" class="submit" tabindex="4">
        </form>
        <div class="check"></div>
      </div>
      <div class="tip"></div>   <?php  }  ?>
    </div>

  </div>      
    
</div>
<script>

   
$(".input .log").bind("keyup",function(e){
	if(e.keyCode == 13){$('.log .submit').click();}
});
$(".input .reg").bind("keyup",function(e){
	if(e.keyCode == 13){$('.reg .submit').click();}
});


	$('.btn').click(function(){
		if($('.log').hasClass('disn')){
			$('.log').fadeIn().removeClass('disn');
			$('.reg').fadeOut().addClass('disn');
			$('#value_1').val('').focus();
		}else{
			$('.log').fadeOut().addClass('disn');
			$('.reg').fadeIn().removeClass('disn');
			$('#reg_1').val('').focus();
		}
	});

 
	$('.reg .submit').click(function(){
		if($('#reg_1').val()!="" && $('#reg_2').val()!="" && $('#reg_3').val()!=""){
			if($('#reg_2').val() != $('#reg_3').val()){
				$('.reg .submit').show();
				$('.reg .check').hide();
				$('.reg .tip').text('确认密码不正确').show();
			}else{
		        
			    $("#reg").submit();
				
			}
		}
	});
</script>
