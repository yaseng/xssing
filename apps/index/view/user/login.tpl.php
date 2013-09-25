<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>施工重地 闲人勿扰</title>
<meta name="description" content="xxxx">
<meta name="keywords" content="aaaa">
<link href="<?php echo  PUBLIC_STYLE_URL?>login.css" rel="stylesheet" type="text/css" />
<script language="javascript"  src="<?php echo STATIC_JS_URL ?>jquery.js"></script>
</head>
<body>
<div class="loginmask"></div>
<div class="loading" style="display: none; "></div>
<div class="login" style="display: block; ">
  <div class="logo"></div>
  <div class="input">
    <div class="log">
      <div class="name">
        <input type="text" id="value_1" placeholder="用户名" name="value_1" tabindex="1">
       
      <div class="pwd">
        <input type="password" id="value_2" placeholder="密码" name="value_2" tabindex="2">
        <input type="button" class="submit" tabindex="3">
        <div class="check"></div>
      </div>
      <div class="tip"></div>
    </div>
    <div class="reg disn">
      <div class="name">
        <input type="text"  placeholder="邀请码" id="incode"  tabindex="2"  onBlur="checkIncode()" >
        <a class="btn" href="javascript:;" style="position:absolute;left:-45px;color:#FFF;width:40px;height:30px;line-height:30px">返回</a> </div>
      <div class="name">
        <input type="text" id="reg_1" placeholder="用户名" name="reg_1" tabindex="1">
      </div>
      <div class="pwd">
        <input type="password" id="reg_2" placeholder="密码" name="reg_2" tabindex="2">
      </div>
      <div class="pwd">
        <input type="password" id="reg_3" placeholder="确认密码" name="reg_3" tabindex="3">
        <input type="button" class="submit" tabindex="4">
        <div class="check"></div>
      </div>
      <div class="tip"></div>
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

	$('.log .submit').click(function(){
		if($('#value_1').val()!="" && $('#value_2').val()!=""){
			$('.log .submit').hide();
			$('.log .check').show();
			$('.log .tip').text('').hide();
			$.ajax({
				type:'POST',
				url:'?m=user&a=onlogin',
				data:'value_1='+$('#value_1').val()+'&value_2='+$('#value_2').val(),
				success:function(msg){
					$('.log .submit').show();
					$('.log .check').hide();
		            if(msg == 1){
						$('.loading').hide();
						$('.loginmask').fadeIn(500,function(){
							location.href = '?m=xing';
						});
					}else{
						$('.log .tip').text('用户名或密码错误').show();
					}
				}
			});
		}
	});
	$('.reg .submit').click(function(){
		if($('#reg_1').val()!="" && $('#reg_2').val()!="" && $('#reg_3').val()!=""){
			if($('#reg_2').val() != $('#reg_3').val()){
				$('.reg .submit').show();
				$('.reg .check').hide();
				$('.reg .tip').text('确认密码不正确').show();
			}else{
				var username = $('#reg_1').val();
				$('.reg .submit').hide();
				$('.reg .check').show();
				$('.reg .tip').text('').hide();
				$.ajax({
					type:'POST',
					url:'ajax.php',
					data:'ac=reg&value_1='+$('#reg_1').val()+'&value_2='+$('#reg_2').val(),
					success:function(msg){
						$('.reg .submit').show();
						$('.reg .check').hide();
						if(msg){
							$('.log .tip').text('恭喜你，注册成功').show();
							$('#value_1').val(username).focus().blur();
							$('#value_2').focus();
							$('.log').fadeIn().removeClass('disn');
							$('.reg').fadeOut().addClass('disn');
						}else{
							$('.reg .tip').text('用户名已存在，请更换').show();
							$('#reg_1').val('').focus();
						}
					}
				});
			}
		}
	});
</script>
