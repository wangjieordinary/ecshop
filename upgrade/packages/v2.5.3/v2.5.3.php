<?php
class up_v2_5_3
{
	/**
     * 本升级包中SQL文件存放的位置（相对于升级包所在的路径）。每个版本类必须有该属性。
     */
	public $sql_files = array(
		'structure' => 'structure.sql',
		'data'      => array('zh_cn_utf-8' => 'data_zh_cn_utf-8.sql')
		);
	/**
     * 本升级包是否进行智能化的查询操作。每个版本类必须有该属性。
     */
	public $auto_match = true;

	public function __construct()
	{
	}

	public function up_v2_5_3()
	{
	}

	public function update_database_optionally()
	{
		global $db;
		global $ecs;
		include_once ROOT_PATH . 'includes/inc_constant.php';
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('kdniao_eorder_config') . " (\r\n\t\t  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `ru_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `shipping_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `shipper_code` varchar(10) NOT NULL,\r\n\t\t  `customer_name` varchar(50) NOT NULL,\r\n\t\t  `customer_pwd` varchar(50) NOT NULL,\r\n\t\t  `month_code` varchar(50) NOT NULL,\r\n\t\t  `send_site` varchar(50) NOT NULL,\r\n\t\t  `pay_type` tinyint(1) unsigned NOT NULL DEFAULT '1',\r\n\t\t  `template_size` varchar(20) NOT NULL,\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  KEY `ru_id` (`ru_id`),\r\n\t\t  KEY `shipping_id` (`shipping_id`)\r\n\t\t) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('kdniao_customer_account') . " (\r\n\t\t  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `ru_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `shipping_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `shipper_code` varchar(10) NOT NULL,\r\n\t\t  `station_code` varchar(30) NOT NULL,\r\n\t\t  `station_name` varchar(30) NOT NULL,\r\n\t\t  `apply_id` varchar(30) NOT NULL,\r\n\t\t  `company` varchar(30) NOT NULL,\r\n\t\t  `name` varchar(30) NOT NULL,\r\n\t\t  `tel` varchar(20) NOT NULL,\r\n\t\t  `mobile` varchar(20) NOT NULL,\r\n\t\t  `province_name` varchar(20) NOT NULL,\r\n\t\t  `province_code` varchar(20) NOT NULL,\r\n\t\t  `city_name` varchar(20) NOT NULL,\r\n\t\t  `city_code` varchar(20) NOT NULL,\r\n\t\t  `exp_area_name` varchar(20) NOT NULL,\r\n\t\t  `exp_area_code` varchar(20) NOT NULL,\r\n\t\t  `address` varchar(100) NOT NULL,\r\n\t\t  `dsc_province` smallint(5) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `dsc_city` smallint(5) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `dsc_district` smallint(5) unsigned NOT NULL DEFAULT '0',\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  KEY `ru_id` (`ru_id`),\r\n\t\t  KEY `shipping_id` (`shipping_id`)\r\n\t\t) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
		$GLOBALS['db']->query($sql);
		$sql = 'SELECT id FROM ' . $GLOBALS['ecs']->table('shop_config') . ' WHERE code = \'kdniao_account_use\'';

		if (!$GLOBALS['db']->getOne($sql)) {
			$sql = 'SELECT id FROM ' . $GLOBALS['ecs']->table('shop_config') . ' WHERE `code` = \'tp_api\';';
			$config_id = $GLOBALS['db']->getOne($sql);
			$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('shop_config') . ' (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`, `shop_group`) VALUES (NULL, \'' . $config_id . '\', \'kdniao_account_use\', \'select\', \'0,1\', \'\', \'0\', \'3\', \'tp_api\');';
			$GLOBALS['db']->query($sql);
		}
	}

	public function update_files()
	{
		$result = file_mode_info(ROOT_PATH . 'data/');

		if ($result < 2) {
			exit('ERROR, ' . ROOT_PATH . 'data/ isn\'t a writeable directory.');
		}

		if (!file_exists(ROOT_PATH . 'data/config.php')) {
			if (file_exists(ROOT_PATH . 'includes/config.php')) {
				copy(ROOT_PATH . 'includes/config.php', ROOT_PATH . 'data/config.php');
			}
			else {
				exit('ERROR, can\'t find config.php.');
			}
		}

		if (!file_exists(ROOT_PATH . 'data/install.lock.php')) {
			if (file_exists(ROOT_PATH . 'includes/install.lock.php')) {
				copy(ROOT_PATH . 'includes/install.lock.php', ROOT_PATH . 'data/install.lock.php');
			}
			else {
				exit('ERROR, can\'t find install.lock.php.');
			}
		}
	}
}


?>
