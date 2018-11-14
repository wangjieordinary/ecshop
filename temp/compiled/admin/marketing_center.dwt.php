<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><?php echo $this->_var['lang']['promotion']; ?> - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
            <div class="flexilist mt0">
                <div class="common-content">
                    <div class="mian-info">
                        <div class="mkc_content">
                            <div class="mkc_dl mck_one">
                                <div class="mkc_dt"><?php echo $this->_var['lang']['platform_activity']; ?></div>
                                <div class="mkc_dd">
                                    <ul>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="wholesale.php?act=list" data-param="menushopping|13_wholesale" ectype="iframeHref">
                                                <em><i class="iconfont icon-wholesale"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['01_wholesale']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['wholesale_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="topic.php?act=list" data-param="menushopping|09_topic" ectype="iframeHref">
                                                <em><i class="iconfont icon-home-renovation"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['09_topic']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['topic_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="favourable.php?act=list" data-param="menushopping|12_favourable" ectype="iframeHref">
                                                <em><i class="iconfont icon-discount"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['12_favourable']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['favourable_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mkc_dl mck_two">
                                <div class="mkc_dt"><?php echo $this->_var['lang']['trade_play']; ?></div>
                                <div class="mkc_dd">
                                    <ul>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="auction.php?act=list" data-param="menushopping|10_auction" ectype="iframeHref">
                                            <em><i class="iconfont icon-auction"></i></em>
                                            <div class="info">
                                                <h2><?php echo $this->_var['lang']['auction']; ?></h2>
                                                <span><?php echo $this->_var['lang']['auction_notic']; ?></span>
                                            </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="snatch.php?act=list" data-param="menushopping|02_snatch_list" ectype="iframeHref">
                                                <em><i class="iconfont icon-tag-alt"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['02_snatch_list']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['snatch_list_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="group_buy.php?act=list" data-param="menushopping|08_group_buy" ectype="iframeHref">
                                                <em><i class="iconfont icon-group-alt"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['group']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['group_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="seckill.php?act=list" data-param="menushopping|03_seckill_list" ectype="iframeHref">
                                                <em><i class="iconfont icon-seckill"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['03_seckill_list']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['seckill_list_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="exchange_goods.php?act=list" data-param="menushopping|15_exchange_goods" ectype="iframeHref">
                                                <em><i class="iconfont icon-exchange-alt"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['integral_mall']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['integral_mall_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="presale.php?act=list" data-param="menushopping|16_presale" ectype="iframeHref">
                                                <em><i class="iconfont icon-presale"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['presale']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['presale_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mkc_dl mck_three">
                                <div class="mkc_dt"><?php echo $this->_var['lang']['bonus_card_coupons']; ?></div>
                                <div class="mkc_dd">
                                    <ul>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="bonus.php?act=list" data-param="menushopping|04_bonustype_list" ectype="iframeHref">
                                                <em><i class="iconfont icon-bonus"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['bonus']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['bonus_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="package.php?act=list" data-param="menushopping|14_package_list" ectype="iframeHref">
                                                <em><i class="iconfont icon-package-two"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['14_package_list']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['package_list_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="coupons.php?act=list" data-param="menushopping|17_coupons" ectype="iframeHref">
                                                <em><i class="iconfont icon-coupon"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['17_coupons']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['coupons_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="value_card.php?act=list" data-param="menushopping|18_value_card" ectype="iframeHref">
                                                <em><i class="iconfont icon-value-card"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['18_value_card']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['value_card_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                        	<a href="javascript:void(0);" data-url="gift_gard.php?act=list" data-param="menushopping|gift_gard_list" ectype="iframeHref">
                                                <em><i class="iconfont icon-gift-card"></i></em>
                                                <div class="info">
                                                    <h2><?php echo $this->_var['lang']['gift_gard_manage']; ?></h2>
                                                    <span><?php echo $this->_var['lang']['gift_gard_manage_notic']; ?></span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
</body>
</html>
