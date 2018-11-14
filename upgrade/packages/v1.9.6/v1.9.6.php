<?php
//websc
class up_v1_9_6
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

	public function up_v1_9_6()
	{
	}

	public function update_database_optionally()
	{
		global $db;
		global $ecs;
		include_once ROOT_PATH . 'includes/inc_constant.php';
		$sql = 'ALTER TABLE ' . $ecs->table('goods') . " ADD  `freight` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT  '0',\r\n\t\tADD  `shipping_fee` DECIMAL( 10, 2 ) NOT NULL DEFAULT  '0.00',\r\n\t\tADD  `tid` INT( 10 ) UNSIGNED NOT NULL DEFAULT  '0';";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('goods_transport') . " (\r\n\t\t  `tid` smallint(5) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `ru_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `type` TINYINT( 1 ) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `title` varchar(50) NOT NULL DEFAULT '',\r\n\t\t  `update_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  PRIMARY KEY (`tid`),\r\n\t\t  KEY `ru_id` (`ru_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('goods_transport_extend') . " (\r\n\t\t  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `tid` smallint(5) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `ru_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `area_id` text NOT NULL,\r\n\t\t  `top_area_id` text NOT NULL,\r\n\t\t  `sprice` decimal(10,2) NOT NULL,\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  KEY `tid` (`tid`),\r\n\t\t  KEY `ru_id` (`ru_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('goods_transport_express') . " (\r\n\t\t  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `tid` smallint(5) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `ru_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `shipping_id` text NOT NULL,\r\n\t\t  `shipping_fee` decimal(10,2) NOT NULL,\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  KEY `tid` (`tid`),\r\n\t\t  KEY `ru_id` (`ru_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('pay_card') . " (\r\n\t\t  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `card_number` varchar(60) NOT NULL DEFAULT '',\r\n\t\t  `card_psd` varchar(40) NOT NULL DEFAULT '',\r\n\t\t  `user_id` int(20) NOT NULL,\r\n\t\t  `used_time` varchar(40) NOT NULL DEFAULT '',\r\n\t\t  `status` smallint(5) unsigned DEFAULT '0',\r\n\t\t  `c_id` int(10) unsigned NOT NULL,\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  KEY `user_id` (`user_id`),\r\n\t\t  UNIQUE KEY `card_number` (`card_number`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('pay_card_type') . " (\r\n\t\t  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `type_name` varchar(40) NOT NULL DEFAULT '',\r\n\t\t  `type_money` float(9,2) NOT NULL,\r\n\t\t  `type_prefix` varchar(10) NOT NULL DEFAULT '',\r\n\t\t  `use_end_date` varchar(60) NOT NULL DEFAULT '',\r\n\t\t  PRIMARY KEY (`type_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('value_card') . " (\r\n\t\t  `vid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',\r\n\t\t  `tid` int(10) NOT NULL COMMENT '储值卡类型ID',\r\n\t\t  `value_card_sn` varchar(30) NOT NULL COMMENT '储值卡账号',\r\n\t\t  `value_card_password` varchar(20) NOT NULL COMMENT '储值卡密码',\r\n\t\t  `user_id` int(10) NOT NULL COMMENT '绑定用户ID',\r\n\t\t  `card_money` decimal(10,2) unsigned NOT NULL COMMENT '卡内余额',\r\n\t\t  `bind_time` int(11) NOT NULL COMMENT '绑定时间',\r\n\t\t  `end_time` int(11) NOT NULL COMMENT '截止日期',\r\n\t\t  PRIMARY KEY (`vid`),\r\n\t\t  KEY `tid` (`tid`),\r\n\t\t  KEY `user_id` (`user_id`),\r\n\t\t  UNIQUE KEY `value_card_sn` (`value_card_sn`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('value_card_record') . " (\r\n\t\t  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',\r\n\t\t  `vc_id` int(10) NOT NULL COMMENT '储值卡ID',\r\n\t\t  `order_id` int(10) NOT NULL COMMENT '订单ID',\r\n\t\t  `use_val` decimal(10,2) NOT NULL COMMENT '使用金额',\r\n\t\t  `add_val` int(10) NOT NULL COMMENT '充值金额',\r\n\t\t  `record_time` int(11) NOT NULL COMMENT '记录时间',\r\n\t\t  PRIMARY KEY (`rid`),\r\n\t\t  KEY `vc_id` (`vc_id`),\r\n\t\t  KEY `order_id` (`order_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$db->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $ecs->table('value_card_type') . " (\r\n\t\t  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',\r\n\t\t  `name` varchar(180) DEFAULT NULL COMMENT '类型名称',\r\n\t\t  `vc_desc` varchar(255) DEFAULT NULL COMMENT '描述',\r\n\t\t  `vc_value` decimal(10,0) NOT NULL COMMENT '面值',\r\n\t\t  `vc_prefix` varchar(10) NOT NULL DEFAULT '',\r\n\t\t  `vc_dis` decimal(10,2) NOT NULL DEFAULT '1.00' COMMENT '折扣率',\r\n\t\t  `vc_limit` tinyint(5) NOT NULL DEFAULT '1' COMMENT '限制数量',\r\n\t\t  `use_condition` tinyint(1) NOT NULL DEFAULT '0' COMMENT '使用条件',\r\n\t\t  `spec_goods` varchar(255) NOT NULL COMMENT '指定商品',\r\n\t\t  `spec_cat` varchar(255) NOT NULL COMMENT '指定分类',\r\n\t\t  `vc_indate` tinyint(3) NOT NULL COMMENT '有效期单位为自然月',\r\n\t\t  `is_rec` tinyint(1) NOT NULL DEFAULT '0' COMMENT '可否充值',\r\n\t\t  `add_time` int(11) NOT NULL COMMENT '储值卡类型新增时间',\r\n\t\t  PRIMARY KEY (`id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;";
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('goods') . ' ADD INDEX ( `freight` ) ;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('goods') . ' ADD INDEX ( `tid` ) ;';
		$db->query($sql);
		$sql = 'ALTER TABLE  ' . $ecs->table('goods_extend') . " ADD  `width` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `height` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `depth` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `origincountry` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `originplace` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `assemblycountry` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `barcodetype` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `catena` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `isbasicunit` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `packagetype` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `grossweight` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `netweight` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `netcontent` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `licensenum` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `healthpermitnum` VARCHAR( 50 ) NOT NULL;";
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('cart') . " ADD `freight` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '0',\r\n\t\tADD `tid` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0';";
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('cart') . ' ADD `shipping_fee` DECIMAL( 10, 2 ) UNSIGNED NOT NULL DEFAULT \'0.00\';';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('order_goods') . ' ADD `shipping_fee` DECIMAL( 10, 2 ) UNSIGNED NOT NULL DEFAULT \'0.00\';';
		$db->query($sql);
		$sql = 'ALTER TABLE  ' . $ecs->table('seller_shopinfo') . " ADD  `js_appkey` VARCHAR( 50 ) NOT NULL ,\r\n\t\tADD  `js_appsecret` VARCHAR( 50 ) NOT NULL;";
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('comment') . ' ADD `rec_id` INT( 10 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `order_id`;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('comment_img') . ' ADD `rec_id` INT( 10 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `order_id`;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('category') . ' ADD  `commission_rate` SMALLINT( 5 ) UNSIGNED NOT NULL DEFAULT  \'0\';';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('goods') . ' ADD COLUMN `desc_mobile`  text NOT NULL AFTER `goods_desc`;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('cart') . ' ADD `store_mobile` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL AFTER `shipping_fee`;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('cart') . ' ADD `take_time` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\' AFTER `store_mobile`;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('store_order') . ' ADD `take_time` DATETIME NOT NULL DEFAULT \'0000-00-00 00:00:00\' AFTER `pick_code`;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('value_card') . ' ADD  `vc_value` INT( 10 ) NOT NULL AFTER  `user_id`;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('order_goods') . " ADD `freight` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `is_single` ,\r\n\t\tADD `tid` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `freight` ;";
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('order_goods') . ' ADD INDEX ( `freight` ) ;';
		$db->query($sql);
		$sql = 'ALTER TABLE ' . $ecs->table('order_goods') . ' ADD INDEX ( `tid` ) ;';
		$db->query($sql);
		$sql = 'SELECT id FROM ' . $ecs->table('shop_config') . ' WHERE code = \'extend_basic\'';
		$config_id = $db->getOne($sql, true);
		$sql = 'INSERT INTO ' . $ecs->table('shop_config') . ' (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, \'' . $config_id . '\', \'user_login_logo\', \'file\', \'\', \'images/common/\', \'\', \'1\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('shop_config') . ' (`id`, `parent_id`, `code`, `type`, `store_range`, `value`) VALUES (NULL, \'4\', \'use_value_card\', \'select\', \'0,1\', \'0\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('shop_config') . ' (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, \'' . $config_id . '\', \'commission_model\', \'select\', \'0,1\', \'\', \'0\', \'1\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('admin_action') . ' (`action_id`, `parent_id`, `action_code`, `relevance`, `seller_show`) VALUES (NULL, \'1\', \'value_card\', \'\', \'0\');';
		$db->query($sql);
		$sql = 'SELECT action_id FROM ' . $ecs->table('admin_action') . ' WHERE action_code = \'merchants\'';
		$action_id = $db->getOne($sql, true);
		$sql = 'INSERT INTO ' . $ecs->table('admin_action') . ' (`action_id`, `parent_id`, `action_code`, `relevance`, `seller_show`) VALUES (NULL, \'' . $action_id . '\', \'seller_users_real\', \'\', \'0\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('admin_action') . ' (`action_id`, `parent_id`, `action_code`, `relevance`, `seller_show`) VALUES (NULL, \'5\', \'api\', \'\', \'0\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('admin_action') . ' (`action_id`, `parent_id`, `action_code`, `relevance`, `seller_show`) VALUES (NULL, \'0\', \'transfer_manage\', \'\', \'0\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('admin_action') . ' (`action_id`, `parent_id`, `action_code`, `relevance`, `seller_show`) VALUES (NULL, \'10\', \'transfer\', \'\', \'0\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('shop_config') . ' (`id`, `parent_id`, `code`, `type`, `store_range`, `store_dir`, `value`, `sort_order`) VALUES (NULL, \'' . $config_id . '\', \'login_logo_pic\', \'file\', \'\', \'images/common/\', \'\', \'1\');';
		$db->query($sql);
		$sql = 'INSERT INTO ' . $ecs->table('ad_position') . (' (`position_id`, `user_id`, `position_name`, `ad_width`, `ad_height`, `position_model`, `position_desc`, `position_style`, `is_public`, `theme`) VALUES (NULL, \'0\', \'regist_banner\', \'526\', \'327\', \'注册页面左侧banner图\', \'注册页面左侧banner图\', \'{foreach from=' . $ads . " item=ad}\r\n" . $ad . "\r\n{/foreach}', '0', 'ecmoban_dsc');");
		$db->query($sql);
		$sql = 'SELECT position_id FROM ' . $ecs->table('ad_position') . ' WHERE position_name = \'regist_banner\'';
		$position_id = $db->getOne($sql, true);
		$sql = 'INSERT INTO ' . $ecs->table('ad') . ' (`ad_id`, `position_id`, `media_type`, `ad_name`, `ad_link`, `link_color`, `ad_code`, `start_time`, `end_time`, `link_man`, `link_email`, `link_phone`, `click_count`, `enabled`, `is_new`, `is_hot`, `is_best`, `public_ruid`, `ad_type`, `goods_name`) VALUES (NULL, \'' . $position_id . '\', \'0\', \'regist_banner\', \'\', \'#\', \'1483637255218364816.jpg\', \'1469505301\', \'1629993600\', \'\', \'\', \'\', \'0\', \'1\', \'0\', \'0\', \'0\', \'0\', \'0\', \'0\');';
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
