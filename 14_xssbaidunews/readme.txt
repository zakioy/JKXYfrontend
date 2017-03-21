1.xss注入防范
利用htmlspecialchars函数来检测入库数据
修改页面：/server/update.php；/server/insert.php；/js/admin.js

2.csrf注入防范
通过session来设置提交时的token值。
修改页面：/server/update.php；/server/insert.php


  
其它修改：
/server/config.php  添加屏蔽mysql错误提示；添加常量IN_SYS，来判断php文件不能直接访问
/server/config.php  添加SafeFilter函数，用来xss过滤和防sql注入。
/server/curnews.php (更新时通过id查询数据库获得相应信息）添加防范：把id传入值转化成int型
/server/delete.php (删除信息) 添加防范：把id传入值转化成int型

