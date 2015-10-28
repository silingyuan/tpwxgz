<?php
return array(
	//'配置项'=>'配置值'
	//配置常用的CSS、JS、image资源的路径
	'TMPL_PARSE_STRING'=>array(
		'__SCRATCH__'=>'/Application/Home/View/Scratch/public',
		'__JQUERY__'=>'/Public/Jquery',
	),
		'TMPL_ACTION_SUCCESS' => 'Public:jump',
		'TMPL_ACTION_ERROR' => 'Public:jump',
		'SESSION_TYPE'=>'DB',
		'SESSION_OPTIONS'=>array(
				'expire'=>3600,
		),
		'DATA_CACHE_TYPE'=>'Db',
		'DATA_CACHE_TIME'=>600,
		'DATA_CACHE_TABLE'=>'sc_cache',
	'DB_TYPE'=>'mysql',   //数据库类型
	'DB_HOST'=>'120.55.116.234',    //服务器地址
	'DB_NAME'=>'a1026112625',    //数据库名
	'DB_USER'=>'a1026112625',       //数据库用户名
	'DB_PWD'=>'19603802',            //数据库密码
	'DB_PORT'=>3306,     //数据库端口
	'DB_PREFIX'=>'sc_',     //数据表前缀
	'DB_CHARSET'=>'utf8',   //字符集
	'SUBSCRIBE_LINK'=>'http://mp.weixin.qq.com/s?__biz=MzA4NzE5MTA1Mg==&mid=261405797&idx=1&sn=e864099bd06482e8e44a80d0f7e20428#rd',
	'REGISTER_LINK'=>'http://mp.weixin.qq.com/s?__biz=MzA4NzE5MTA1Mg==&mid=261405797&idx=1&sn=e864099bd06482e8e44a80d0f7e20428#rd'
		
);
?>