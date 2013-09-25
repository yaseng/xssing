<?php
class  InfoModel extends  Model{
	
	var $bid;
	
	function  __construct($bid){
		
		parent::__construct();
		
		$this->bid=$bid;
		
		
	}
	function  add(){
		
		$this->insert(array("bid"=> $this->bid));
		
	}
	
	function  set($title,$url,$cookie){
		
		$this->update(array("title"=>$title,"url"=>$url,"cookie"=>$cookie), array("bid"=> $this->bid));
		
	}
	function  get(){
		
		
		if($this->privacy()){  
			$this->dbtable='info';
		return  $this->fetch_first("*",array("bid"=> $this->bid));
		}else{
			return  false;
		}
		
	}
	function privacy(){
		
	 	$this->dbtable='browser';
	 	$browser=$this->fetch_first("pid",array('bid'=>$this->bid));
	    $this->dbtable='project';
	 	$project=$this->fetch_first("uid",array('pid'=>$browser['pid']));
 
	  
	     return  ($project['uid']==$_SESSION['uid'])  ? true  :  false ;
		 
		
	} 
	
	
	
	function  del(){
		
		return  $this->delete(array("bid"=> $this->bid));
		
	}
	
	
	
	
	
	
}
 