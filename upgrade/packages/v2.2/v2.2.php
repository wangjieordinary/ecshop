<?php
//websc
class up_v2_2
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

	public function up_v2_2()
	{
	}

	public function update_database_optionally()
	{
		global $db;
		global $ecs;
		include_once ROOT_PATH . 'includes/inc_constant.php';
		$sql = 'UPDATE ' . $GLOBALS['ecs']->table('shop_config') . ' SET `type` = \'hidden\' WHERE `code` = \'wap_config\';';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('merchants_server') . ' ADD `cycle` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT \'2\' AFTER `suppliers_percent` ;';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('merchants_server') . " CHANGE `server_id` `server_id` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT ,\r\n\t\tCHANGE `user_id` `user_id` INT( 10 ) UNSIGNED NOT NULL ;";
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('merchants_server') . ' ADD `commission_model` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `suppliers_percent` ;';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('order_info') . ' ADD `chargeoff_status` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT \'0\';';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('order_return') . ' ADD `chargeoff_status` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT \'0\';';
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('seller_bill_goods') . " (\r\n\t\t  `id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `rec_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `order_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `cat_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `proportion` varchar(20) NOT NULL DEFAULT '',\r\n\t\t  `goods_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `goods_number` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `goods_attr` text NOT NULL,\r\n\t\t  `drp_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  KEY `rec_id` (`rec_id`),\r\n\t\t  KEY `order_id` (`order_id`),\r\n\t\t  KEY `goods_id` (`goods_id`),\r\n\t\t  KEY `cat_id` (`cat_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('seller_bill_order') . " (\r\n\t\t  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `bill_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `user_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `seller_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `order_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `order_sn` varchar(255) NOT NULL DEFAULT '',\r\n\t\t  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `order_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `return_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `return_shippingfee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `goods_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `tax` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `shipping_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `insure_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `pay_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `pack_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `card_fee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `bonus` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `integral_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `coupons` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `discount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `value_card` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `money_paid` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `surplus` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `drp_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `confirm_take_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `chargeoff_status` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  UNIQUE KEY `order_id` (`order_id`),\r\n\t\t  UNIQUE KEY `order_sn` (`order_sn`),\r\n\t\t  KEY `seller_id` (`seller_id`),\r\n\t\t  KEY `user_id` (`user_id`),\r\n\t\t  KEY `bill_id` (`bill_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('seller_commission_bill') . " (\r\n\t\t  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `seller_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `bill_sn` varchar(255) NOT NULL DEFAULT '',\r\n\t\t  `order_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `shipping_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `return_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `return_shippingfee` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `proportion` varchar(20) NOT NULL DEFAULT '',\r\n\t\t  `commission_model` tinyint(1) NOT NULL DEFAULT '-1',\r\n\t\t  `gain_commission` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `should_amount` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `chargeoff_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `settleaccounts_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `start_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `end_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `chargeoff_status` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `bill_cycle` tinyint(1) unsigned NOT NULL DEFAULT '2',\r\n\t\t  `bill_apply` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `apply_note` varchar(255) NOT NULL DEFAULT '',\r\n\t\t  `apply_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `operator` varchar(255) NOT NULL DEFAULT '',\r\n\t\t  `check_status` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `reject_note` varchar(255) NOT NULL DEFAULT '',\r\n\t\t  `check_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `frozen_money` decimal(10,2) unsigned NOT NULL DEFAULT '0.00',\r\n\t\t  `frozen_data` smallint(5) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `frozen_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  PRIMARY KEY (`id`),\r\n\t\t  KEY `seller_id` (`seller_id`),\r\n\t\t  KEY `bill_cycle` (`bill_cycle`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('user_rank') . ' CHANGE `rank_id` `rank_id` INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT ;';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('users') . ' CHANGE `user_rank` `user_rank` INT( 10 ) UNSIGNED NOT NULL DEFAULT \'0\';';
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('appeal_img') . " (\r\n\t\t  `img_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `order_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `complaint_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `ru_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `img_file` varchar(255) NOT NULL,\r\n\t\t  PRIMARY KEY (`img_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('complaint') . " (\r\n\t\t  `complaint_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `order_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `order_sn` varchar(255) NOT NULL,\r\n\t\t  `user_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `user_name` varchar(60) NOT NULL,\r\n\t\t  `ru_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `shop_name` varchar(60) NOT NULL,\r\n\t\t  `title_id` smallint(5) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `complaint_content` text NOT NULL,\r\n\t\t  `add_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `complaint_handle_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `appeal_messg` text NOT NULL,\r\n\t\t  `appeal_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `end_handle_time` int(10) NOT NULL DEFAULT '0',\r\n\t\t  `end_admin_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `end_handle_messg` text NOT NULL,\r\n\t\t  `complaint_state` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `complaint_active` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  PRIMARY KEY (`complaint_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('complaint_img') . " (\r\n\t\t  `img_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `order_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `complaint_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `user_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `img_file` varchar(255) NOT NULL,\r\n\t\t  PRIMARY KEY (`img_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('complaint_talk') . " (\r\n\t\t  `talk_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `complaint_id` int(10) unsigned NOT NULL,\r\n\t\t  `talk_member_id` int(10) unsigned NOT NULL,\r\n\t\t  `talk_member_name` varchar(30) NOT NULL,\r\n\t\t  `talk_member_type` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `talk_content` varchar(255) NOT NULL,\r\n\t\t  `talk_state` tinyint(1) unsigned NOT NULL DEFAULT '1',\r\n\t\t  `admin_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `talk_time` int(10) NOT NULL DEFAULT '0',\r\n\t\t  `view_state` varchar(60) NOT NULL,\r\n\t\t  PRIMARY KEY (`talk_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('complain_title') . " (\r\n\t\t  `title_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `title_name` varchar(30) NOT NULL,\r\n\t\t  `title_desc` varchar(255) NOT NULL,\r\n\t\t  PRIMARY KEY (`title_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('merchants_server') . ' ADD `bill_freeze_day` SMALLINT( 5 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `commission_model` ;';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('order_info') . ' ADD  `invoice_type` TINYINT( 1 ) NOT NULL DEFAULT  \'0\';';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('order_info') . ' ADD  `vat_id` int( 11 ) NOT NULL DEFAULT  \'0\';';
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('users_vat_invoices_info') . " (\r\n\t\t  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,\r\n\t\t  `user_id` mediumint(8) NOT NULL,\r\n\t\t  `company_name` varchar(60) NOT NULL DEFAULT '',\r\n\t\t  `company_address` varchar(255) NOT NULL DEFAULT '',\r\n\t\t  `tax_id` varchar(20) NOT NULL DEFAULT '',\r\n\t\t  `company_telephone` varchar(20) NOT NULL DEFAULT '',\r\n\t\t  `bank_of_deposit` varchar(20) NOT NULL DEFAULT '',\r\n\t\t  `bank_account` varchar(30) NOT NULL DEFAULT '',\r\n\t\t  `consignee_name` varchar(20) NOT NULL DEFAULT '',\r\n\t\t  `consignee_mobile_phone` varchar(15) NOT NULL DEFAULT '',\r\n\t\t  `consignee_province` varchar(20) NOT NULL DEFAULT '',\r\n\t\t  `consignee_address` varchar(255) NOT NULL DEFAULT '',\r\n\t\t  `audit_status` tinyint(1) NOT NULL DEFAULT '0',\r\n\t\t  `add_time` int(11) NOT NULL,\r\n\t\t  PRIMARY KEY (`id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('goods_report') . " (\r\n\t\t  `report_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `user_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `user_name` varchar(60) NOT NULL,\r\n\t\t  `goods_id` int(11) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `goods_name` varchar(120) NOT NULL,\r\n\t\t  `goods_image` varchar(255) NOT NULL,\r\n\t\t  `title_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `type_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `inform_content` text NOT NULL,\r\n\t\t  `add_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `report_state` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `handle_type` tinyint(1) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `handle_message` text NOT NULL,\r\n\t\t  `handle_time` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `admin_id` int(10) NOT NULL DEFAULT '0',\r\n\t\t  PRIMARY KEY (`report_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('goods_report_img') . " (\r\n\t\t  `img_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `goods_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `report_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `user_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `img_file` varchar(255) NOT NULL,\r\n\t\t  PRIMARY KEY (`img_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('goods_report_title') . " (\r\n\t\t  `title_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `type_id` int(10) unsigned NOT NULL DEFAULT '0',\r\n\t\t  `title_name` varchar(60) NOT NULL,\r\n\t\t  PRIMARY KEY (`title_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'CREATE TABLE IF NOT EXISTS ' . $GLOBALS['ecs']->table('goods_report_type') . " (\r\n\t\t  `type_id` int(10) NOT NULL AUTO_INCREMENT,\r\n\t\t  `type_name` varchar(60) NOT NULL,\r\n\t\t  `type_desc` text NOT NULL,\r\n\t\t  PRIMARY KEY (`type_id`)\r\n\t\t) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('merchants_server') . " ADD `day_number` SMALLINT( 8 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `cycle` ,\r\nADD `bill_time` INT( 10 ) UNSIGNED NOT NULL DEFAULT '0' AFTER `day_number` ;";
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('users') . ' ADD `report_time` INT( 11 ) NOT NULL DEFAULT \'0\';';
		$GLOBALS['db']->query($sql);
		$field = get_table_file_name($ecs->table('order_goods'), 'drp_money');

		if (!$field['bool']) {
			$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('order_goods') . ' ADD `drp_money` DECIMAL( 10, 2 ) UNSIGNED NOT NULL DEFAULT \'0.00\';';
			$GLOBALS['db']->query($sql);
		}

		$field = get_table_file_name($ecs->table('order_info'), 'confirm_take_time');

		if (!$field['bool']) {
			$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('order_info') . ' ADD `confirm_take_time` INT( 10 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `shipping_time`;';
			$GLOBALS['db']->query($sql);
		}

		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('complain_title') . ' ADD `is_show` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `title_desc` ;';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('goods_report_type') . ' ADD `is_show` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `type_desc` ;';
		$GLOBALS['db']->query($sql);
		$sql = 'ALTER TABLE ' . $GLOBALS['ecs']->table('goods_report_title') . ' ADD `is_show` TINYINT( 1 ) UNSIGNED NOT NULL DEFAULT \'0\' AFTER `title_name` ;';
		$GLOBALS['db']->query($sql);
		$sql = 'UPDATE ' . $GLOBALS['ecs']->table('shop_config') . ' SET `type` = \'file\' WHERE `code` = \'watermark\';';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('admin_action') . ' ( `parent_id` , `action_code` , `seller_show` ) VALUES ( 6, \'exchange\', 1 ) ;';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('admin_action') . ' ( `parent_id` , `action_code` , `seller_show` ) VALUES ( 6, \'complaint\', 1 ) ;';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('admin_action') . ' (`parent_id`, `action_code` , `seller_show` ) VALUES (\'7\', \'seckill_manage\', 0 );';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('admin_action') . ' (`parent_id`, `action_code` , `seller_show` ) VALUES (\'3\', \'user_vat_manage\', 1 );';
		$GLOBALS['db']->query($sql);
		$sql = 'UPDATE ' . $GLOBALS['ecs']->table('shop_config') . ' SET `type` = \'hidden\', `store_range` = \'0,1\' WHERE `code` = \'commission_model\';';
		$GLOBALS['db']->query($sql);
		$sql = 'SELECT id FROM ' . $GLOBALS['ecs']->table('shop_config') . ' WHERE code = \'extend_basic\'';
		$config_id = $GLOBALS['db']->getOne($sql, true);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('shop_config') . ' ( `parent_id` , `code` , `type` , `store_range` , `value` , `sort_order` , `shop_group` ) VALUES ( \'' . $config_id . '\', \'report_handle\', \'select\', \'0,1\', 1, \'15\', \'report_conf\' ) ;';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('shop_config') . ' ( `parent_id` , `code` , `type` , `value` , `sort_order` , `shop_group` ) VALUES ( \'' . $config_id . '\', \'report_handle_time\', \'text\', \'30\', \'15\', \'report_conf\' ) ;';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('admin_action') . ' ( `parent_id` , `action_code` ) VALUES ( 1, \'goods_report\') ;';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('goods_report_type') . ' (`type_id`, `type_name`, `type_desc`) VALUES (1, \'出售禁售品\', \'销售商城禁止和限制交易规则下所规定的所有商品。\'), (2, \'产品质量问题\', \'产品质量差，与描述严重不相符。\');';
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('goods_report_title') . " (`type_id`, `title_name`, `is_show`) VALUES\r\n\t\t(1, '枪支弹药', 1),\r\n\t\t(1, '管制刀具、弓弩类、其他武器等', 1),\r\n\t\t(1, '赌博用具类', 1),\r\n\t\t(1, '毒品及吸毒工具', 1),\r\n\t\t(2, '色差大，质量差。', 1),\r\n\t\t(2, '描述与实物严重不符', 1);";
		$GLOBALS['db']->query($sql);
		$sql = 'INSERT INTO ' . $GLOBALS['ecs']->table('goods_report_type') . " (`type_name`, `type_desc`, `is_show`) VALUES\r\n('出售禁售品', '销售商城禁止和限制交易规则下所规定的所有商品。', 1),\r\n('产品质量问题', '产品质量差，与描述严重不相符。', 1);";
		$GLOBALS['db']->query($sql);
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
