<?php
class  ProjectModel  extends  Model{
	
	function  add($name){
		
		return  $this->insert(array('name'=>$name,'time'=>time(),'uid'=>$_SESSION['uid'],'url'=>$this->geturl()));		
	}
	
    private  function  geturl(){
    	
    	return  substr(md5(time()),0,6);
    	
    }
    
    function  url_to_pid($url){
    	
      $pid=$this->fetch_first("pid",array('url'=>$url));
	  return $pid['pid'];
    }
	
	function  del($pid){
		
		
		
		
	}
	
}
 