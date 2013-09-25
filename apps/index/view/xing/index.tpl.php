
<?php require_once PUBLIC_PATH."public.php"; ?>
<title> Xssing </title>
</head>
<?php require_once TEMPLATE_PATH."xing/header.tpl.php"; ?>
<body>
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
  <tbody>
  
  <tr>
    <td height="30"><table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td width="15" height="30"><img width="15" height="30" src="<?php  echo PUBLIC_STYLE_URL ?>/tab_03.gif"></td>
            <td width="24" background="<?php  echo PUBLIC_STYLE_URL ?>tab_05.gif"><img width="16" height="16" src="<?php  echo PUBLIC_STYLE_URL ?>311.gif"></td>
            <td width="1373" background="/coder/waiku/Public/Admin/images/tab_05.gif" class="title1">项目管理</td>
            <td width="14"><img width="14" height="30" src="<?php  echo PUBLIC_STYLE_URL ?>/tab_07.gif"></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td> 
      
         <table class="toolbar" width="100%">
        <tr>
            <td width="86%" class="search">
             

            </td>
            <td>
            <a href="?m=project&a=add" ><span class="icon-new"></span>添加项目</a>
            </td>
            
            <td>
            <a href="http://www.yaseng.me" target="_blank"><span class="icon-help"></span>帮助</a>
            </td>
        </tr>
      </table>
    
      </td>
  </tr>
  <tr>
    <td width="100%"><table width="95%" cellspacing="1" cellpadding="3" border="0" bgcolor="#F2F9E8" align="center" class="admintable">
        <tbody>
          <tr>
            <td align="left" class="admintitle" colspan="5">项目列表&#12288; </td>
          </tr>
          <tr bgcolor="#f1f3f5" style="font-weight:bold;">
   
            <td width="20%" height="30" align="center" class="ButtonList">名称</td>
            <td width="8%" align="center" class="ButtonList">创建时间</td>
            <td width="15%" height="25" align="center" class="ButtonList">管理</td>
          </tr>
          <?php
			 
			 if(is_array($projects)){
			  
			   
			   foreach($projects  as  $project){
		  
			 
				
			   $time=date("Y-m-d H:i:s",$project['time']);
    
				print<<<END
		   <tr>
              <td><a href="?m=project&a=show&pid={$project['pid']}"> <font color="#00CC00"> <strong>{$project['name']} </strong></font> </a></td>
              <td>{$time}</td>
              <td>
			       <a href="?m=project&a=show&pid={$project['pid']}"><span class="ico_Preview"> </span> 进入 </a> 
                  <a href="?m=xing&a=delp&pid={$project['pid']}"><span class="ico_Del"> </span> 删除 </a></td>
            </tr>
            <tr>
 
END;
			   	
				   
			   }
			   
				 
			 }
				
			
			
			?>
        <td bgcolor="f7f7f7" colspan="5"><div id="page">
              <ul style="text-align:left;">
              </ul>
            </div></td>
        </tr>
        </tbody>
        
      </table></td>   
  </tr>
  <tr>
    <td height="29"><table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td width="15" height="29"><img width="15" height="29" src="<?php  echo PUBLIC_STYLE_URL ?>/tab_20.gif"></td>
            <td background="<?php  echo PUBLIC_STYLE_URL ?>/tab_21.gif">&nbsp;</td>
            <td width="14"><img width="14" height="29" src="<?php  echo PUBLIC_STYLE_URL ?>/tab_22.gif"></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  </tbody>
</table>
</body>
</html>
