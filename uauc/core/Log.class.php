<?php
/**
 * @desc   日志静态类  用于记录调试 错误信息
 * @team   高空科技:WwW.UaUc.Net 项目合作:UaUc.TaoBao.Com
 * @author Yaseng WwW.Yaseng.Me [Yaseng@UAUC.NET]
 */
class LOG{


	const  SQL='SQL';

	static $log =   array();
	static $startTime;                 
	static $stopTime;                


	/**
	 * 在脚本开始处调用获取脚本开始时间的微秒值
	 */
	static function start(){
		self::$startTime = microtime(true);   //将获取的时间赋给成员属性$startTime
	}
	/**
	 *在脚本结束处调用获取脚本结束时间的微秒值
	 */
	static function stop(){
		self::$stopTime= microtime(true);   //将获取的时间赋给成员属性$stopTime
	}


	public  static  function  record($msg,$level='SQL'){

		$date= date('Y-m-d H:i:s',time());
		self::$log[] =   "[".$date."] | ".$_SERVER['REQUEST_URI']." | {$level}: {$msg}\r\n";
		 
	}
	 

    /**
     * @desc 显示调试信息
     */
	public  static function  show(){

       $msg='';
		foreach(self::$log  as  $log){

			$msg.=$log."<br>";
        }
		$time=round((self::$stopTime - self::$startTime) , 4);   //运行时间
		$title="UAUC Debug Bar$ "." Time:".$time." Url:".MODULE_NAME."-".ACTION_NAME; 
echo
<<<SQL
  	<div id="debug-bar" style="background:#F5F5F5;color:#888;margin:6px;font-size:14px;border:1px dashed silver;padding:8px"><div style="color:gray;font-weight:bold"><span>$title</span><span onclick="this.parentNode.parentNode.style.display='none'" style="cursor:pointer;float:right;width:10px;background:#500;border:1px solid #555;color:white">X</span></div><div style="overflow:auto;height:100px;text-align:left;">$msg </div> </div>
SQL;


	}
	 
	public static  function save(){
		 
		 
	}
	/*
	 * 运行
	 */
	public  static  function  run(){
  	
  	if(!DEBUG_MODE) self::save();   //日志记录
   
  	
  }
	
	
}

?>