<?php
class  ProjectAction  extends  AppAction{
	
	
	function  add(){
		
		
		include view_file();
		
	}
	
	function  onadd(){
		
		$project=new ProjectModel();
		if($project->add($_POST['name'])){
			
			 cpmsg("添加成功","success","?m=xing");
		}else{
			
		 	cpmsg("添加失败","error");
		}
		
	 
		
	}
	function  show(){
		
		$pid=intval($_GET[pid]);
		
		$project=new ProjectModel();
		
		$pro=$project->getby_pid($pid);
		
        if($pro[uid]!=$_SESSION['uid']) {
        cpmsg("无权限",'error',"?m=xing");  exit();	
        }
		
        $xing=new XingModel();
        $browsers=$xing->get_browsers($pid);
  
        
      
        
		include  view_file();
	}
 
	
	
}
 