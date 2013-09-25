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
            <td width="1373" background="<?php  echo PUBLIC_STYLE_URL ?>/tab_05.gif" class="title1">项目管理 >> 添加项目</td>
            <td width="14"><img width="14" height="30" src="<?php  echo PUBLIC_STYLE_URL ?>/tab_07.gif"></td>
          </tr>
        </tbody>
      </table></td>
  </tr>
  <tr>
    <td><table width="95%" cellspacing="2" cellpadding="3" border="0" bgcolor="#FFFFFF" align="center" class="admintable">
        <form   id="myform" method="post" name="myform"   action="?m=project&a=onadd">
        <tbody>
          <tr>
            <td align="left" class="admintitle" colspan="2">添加文章</td>
          </tr>
          <tr>
            <td width="20%" class="b1_1">项目名称</td>
            <td class="b1_1"><input type="text" maxlength="50" size="40"   name="name" >
             </td>
          </tr>
        
           
          <tr>
            <td width="20%" class="b1_1"></td>
            <td class="b1_1"><input type="submit" value="添 加" class="gbtn" name="submit">
              &nbsp;&nbsp;
              <input type="button" value="返 回" class="gbtn" onClick="history.go(-1);"></td>
          </tr>
        </form>
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
