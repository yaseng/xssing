xssing
======

Funny and easy xss platform
  
 
<pre>
项目发布地址 http://yaseng.me/xssing-1.html
介绍文章 http://yaseng.me/bind-xss-tutorial.html
Google 托管 http://code.google.com/p/xssing/
演示视频 http://v.youku.com/v_show/id_XNDYzODM5MDcy.html
交流qq群 209546692 作者微博 http://t.qq.com/uaucya
版本     xssing 1.3

</pre>

安装

在下载http://code.google.com/p/xssing/ 或 http://yaseng.me/xssing-1.html 导入 xssing.sql 到mysql 配置 config/mysql.php 删除 /apps/running/uauc.php 可以运行
在sae部署

    新版本的xssing 完全兼容 sae 请修改配置总入口文件 /uauc/uauc.php 

define('SAE',1); // 1 在sae部署

    邮件配置

apps\index\lib\common\common.php 修改 send_mail( send_sae_mail) 对应的信息 更新缓存 你懂的

常见问题

    q:安装之后一片空白
    a:更新至最新版 开启php错误提示 (uauc/uauc.php 加一个 os_start())

    q:怎么添加用户
    a:查看 apps/index/action/User.Action.php 里面的生成邀请码算法 请改变token值

    q:怎么把?m=xing&a=info&bid=29 又长又臭的url 改成 想 /xing/info/bid
    a:这个是mvc框架的典型特征 请自行编写url rewrite

    q:打开之后没有 样式 css 图片没加载就来
    a:手动定义一下 uauc/define.php define('SITE_ROOT',"网站url 带http")

    q:擦 你在源码里面留了后门吧 看 /demo/test.php 一句话 echo htmlentities($GET['a']);
    a:好吧 你赢了 这TM能用菜刀连接我就自宫 

使用
http://yaseng.me/xssing-1.html 详细使用方法

开发
概述

    xssing 是一个基于 php+mysql的 网站 xss 利用与检测平台,可以对你的产品进行黑盒xss安全测试,可以兼容各种浏览器客户端的网站url,cookies已经user-agent下线,批量管理代码,采用MVC构架,易于阅读和二次开发. 基于Php+Mysql 采用轻量级快速框架UAUC, 框架代码下 uauc 下面,入口文件 为 uauc.php,框架核心采用缓存编译机制,修改uauc 目录和 config 目录下的文件都要删除缓存重新编译(/apps/running/uauc.php) 

    项目开发主要于 apps 下面的文件 mvc 架构的 action 和 model 的编写,已经view 视图前台设计

开发规范

    请加qq群 209546692也可以联系作者 yaseng@uauc.net 

项目目录结构
<pre>

 ├─apps   
 │  └─index                     /*项目*/
 │      ├─action                /*动作*/
 │      ├─lib
 │      ├─model
 │      ├─running
 │      └─view                 /*模板视图文件*/
 │          ├─index
 │          ├─project
 │          ├─public
 │          │  ├─js
 │          │  └─style
 │          │      └─toolbar
 │          ├─user
 │          └─xing
 ├─config                     /*系统配置*/
 ├─demo                       /*简单的留言加后台系统*/       
 │  ├─admin
 │  └─static
 │      ├─css
 │      │  └─images
 │      │      └─source
 │      ├─images
 │      │  ├─panel
 │      │  └─toolbar
 │      └─js
 ├─release
 ├─static                    /*图片  css  js 等静态文件*/
 │  ├─js
 │  └─style 
 └─uauc                      /*核心框架库*/
     ├─class
     ├─common
     ├─core
     └─lib 
</pre>

更新记录

    xssing 1.0

完成xss 平台基本框架

    xssing 1.1

修复几个bug 完善在 linux 环境下的兼容性

    xssing 1.2

修改几个逻辑bug和 自身的xss (伪造USER_AGENT) ps:感谢法克论坛的灰太狼 完全兼容sae平台

    xssing 1.3

    内核框架 uauc framework 调试升级可以记录脚本运行时间 当前执行sql语句 xss 获取信息兼容性 增加浏览器批量删除 全选 功能 增加 126 网址缩短 增加邮件提醒 (sae 兼容) 
