<?php
/*
 * 项目共同文件   配置   函数
 *
 */


/**
 *@desc  126短网站转换  需要 去 126.am  申请key (无需审核)
 *@param url 长地址   key  用户的key
 */
function  url_to_126($url,$key){


	$data="longUrl=$url&key=".$key;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://126.am/api!shorten.action");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$res=json_decode(curl_exec($ch));
	if($res->status_txt == 'OK'){
		 
		return  $res->url;
		 
	}

		
}




/*
 * 后台系统提示函数
 */
function cpmsg($message,$type="success",$url="-1",$time=666,$title="系统信息"){


	$color= ($type == 'success') ? "green" : "red";
	$message="<font color=$color > $message </font>";
	if($url == "-1"){

		$jsaction= "history.go(-1);";
		$url="javascript:history.go(-1);";
	}
	else{


		$jsaction="window.location.href ='$url';" ;

	}

	$style=PUBLIC_STYLE_URL."oa.css";
	print<<<END
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="{$style}" />
<table cellspacing="2" cellpadding="3" border="0"  align="center" class="admintable1" style="margin-top:20px;width:33%;">
 <tbody>  <tr> <td align="left" class="admintitle">{$title}</td>
 </tr> <tr> <td height="80" bgcolor="#FFFFFF" style="height:75px;line-height:22px;" align="center" valign="middle">
  <a href="$url"> <strong> $message </strong>  (跳转中...)</a><script> setTimeout("$jsaction",$time); </script>
  </td> </tr></tbody></table>
END;




}

 
 
function   send_mail($to,$title,$content){

	load_lib("Mailer");
	$mail = new PHPMailer();  
 
	$mail->IsSMTP();  
	$mail->CharSet="utf-8";
	$mail->Host = "smtp.163.com"; // 您的企业邮局域名
	$mail->SMTPAuth = true; // 启用SMTP验证功能
	$mail->Username = "xss_ing@163.com"; // 邮局用户名(请填写完整的email地址)
	$mail->Password = ""; // 邮局密码
	$mail->Port=25;
	$mail->From = "xss_ing@163.com"; //邮件发送者email地址
	$mail->FromName = "Xssing";
	$mail->AddAddress($to, $_COOKIE['xing_name']);//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
	//$mail->AddReplyTo("", "");

 
    $mail->IsHTML(true);  

	$mail->Subject = $title;
	$mail->Body = $content;
  
	 return  $mail->Send();
	
 

}
 
function send_sae_mail($to,$title,$content){
	
	 $mail = new SaeMail();
	 $ret = $mail->quickSend($to ,$title,$content , "xss_ing@163.com" , "" ,  "smtp.163.com" , 25 );
	
	
}



 
 
 
 
 
 
 
 
 

