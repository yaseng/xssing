<?php
class  UserAction  extends  Action{
	
	function   index(){
		
		
		
		
	}
	
	
	function   login(){
		
  
		
		include  view_file();
		
	   
	}
	
	function  onlogin(){
		
	   
	   $name=$_POST['value_1'];
       $pass=$_POST['value_2'];
       $user=new UserModel();  
       
       
       
       if($user->login($name, $pass)){
       	
       	
         echo  1;
       	
       } 
	   
		
	}
	function  logout(){
		
		
	  $_SESSION['id']=null;
	  setcookie('xing_name','',time()-7*3600);
	  setcookie('xing_pass','',time()-7*3600);
      J("?m=user&a=login");
		
		
	}
	function  reg(){
		
		$i=$_GET['i'];
		$is_incode=0;
		if($i){
		
		$incode=new IncodeModel();
        
	   
		if($incode->is_ok($i)) $is_incode=1;
		 
		
		
	}
	 include  view_file();
	}
	function  onreg(){
		
		 
		$incode=new IncodeModel();
	   	 $code=$_POST['incode'];
	   	 $name=$_POST['reg_1'];
	   	 $pass=$_POST['reg_2'];
       
	   
	    if($incode->is_ok($code)){
	    	
  			
	     $user=new UserModel(); 
	     
	 
	     
        if($user->reg($name, $pass)){
		 
		    $incode->del($code);
		 
		 if($user->login($name, $pass)){
		 	
		 	
		  	header("Location:?m=xing");
		 	
		 }
		 
	        
		 }
	    	
	    	
	    }
		else{
			
			cpmsg("注册失败鸟");
			
		}
		
		
		
	}
	/**
	 * @desc 邀请码生成接口    强烈要求自定义函数名称和 $token   这里提供一个demo
	 *       使用方法 : www.yaseng.me/?m=user&a=get_incode&token=admin&n=100  
	 */
	function  get_incode(){
		
		$n=intval($_GET['n']);
		$token=$_GET['token'];
		
		if($n && $token=="admin"){
			
			$incode=new IncodeModel();
			
			for($i=0;$i<=$n;$i++){
				
		  		echo     SITE_ROOT."?i=".$incode->add()."<br>";	
				
			}
	  
         
			
			
		}else{
			
			
			show_404();
			
		}
	
 
	}
	
	
}
 