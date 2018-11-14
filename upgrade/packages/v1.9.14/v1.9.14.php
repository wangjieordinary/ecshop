<?php
//websc
class up_v1_9_14
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

	public function up_v1_9_14()
	{
	}

	public function update_database_optionally()
	{
		global $db;
		global $ecs;
		include_once ROOT_PATH . 'includes/inc_constant.php';
		$sql = 'UPDATE ' . $ecs->table('admin_action') . ' SET `seller_show` = 0 WHERE `action_code` = \'order_back_cause\';';
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('touch_topic') . " (\r\n  `topic_id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n  `user_id` int(11) unsigned NOT NULL,\r\n  `title` varchar(255) NOT NULL DEFAULT '''''',\r\n  `intro` text NOT NULL,\r\n  `start_time` int(11) NOT NULL DEFAULT '0',\r\n  `end_time` int(10) NOT NULL DEFAULT '0',\r\n  `data` text NOT NULL,\r\n  `template` varchar(255) NOT NULL DEFAULT '''''',\r\n  `css` text NOT NULL,\r\n  `topic_img` varchar(255) DEFAULT NULL,\r\n  `title_pic` varchar(255) DEFAULT NULL,\r\n  `base_style` char(6) DEFAULT NULL,\r\n  `htmls` mediumtext,\r\n  `keywords` varchar(255) DEFAULT NULL,\r\n  `description` varchar(255) DEFAULT NULL,\r\n  `review_status` tinyint(1) unsigned NOT NULL DEFAULT '1',\r\n  `review_content` varchar(1000) NOT NULL DEFAULT '',\r\n  KEY `topic_id` (`topic_id`),\r\n  KEY `review_status` (`review_status`)\r\n) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
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
