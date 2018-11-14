<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><?php echo $this->_var['lang']['seller']; ?> - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
            <div class="tabs_info">
                <ul>
                    <li <?php if ($this->_var['filter']['cycle'] == - 1): ?>class="curr"<?php endif; ?>><a href="merchants_commission.php?act=list&cycle=-1"><?php echo $this->_var['lang']['all_shops']; ?></a></li>
                    <li <?php if ($this->_var['filter']['cycle'] == 3): ?>class="curr"<?php endif; ?>><a href="merchants_commission.php?act=list&cycle=3"><?php echo $this->_var['lang']['01_monthly_checkout_bill']; ?></a></li>
                    <li <?php if ($this->_var['filter']['cycle'] == 1): ?>class="curr"<?php endif; ?>><a href="merchants_commission.php?act=list&cycle=1"><?php echo $this->_var['lang']['02_weekly_bill']; ?></a></li>
                    <li <?php if ($this->_var['filter']['cycle'] == 0): ?>class="curr"<?php endif; ?>><a href="merchants_commission.php?act=list&cycle=0"><?php echo $this->_var['lang']['03_daily_checkout_bill']; ?></a></li>
                    <!--<li><a href=""><?php echo $this->_var['lang']['04_3_day_checkout_bill']; ?></a></li>-->
                </ul>
            </div>
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4><?php echo $this->_var['lang']['operating_hints']; ?></h4><span id="explanationZoom" title="<?php echo $this->_var['lang']['fold_tips']; ?>"></span></div>
                <ul>
                	<li><?php echo $this->_var['lang']['operation_prompt_content']['list']['0']; ?></li>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['list']['1']; ?></li>
                    <li class="red"><?php echo $this->_var['lang']['operation_prompt_content']['list']['2']; ?></li>
                    <li class="red"><?php echo $this->_var['lang']['operation_prompt_content']['list']['3']; ?></li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="section_filter">
                    <ul>
                        <li>
                            <span><?php echo $this->_var['lang']['total_amount']; ?></span>
                            <div class="price"><em ectype="total_amount">0.00</em><?php echo $this->_var['lang']['yuan']; ?></div>
                        </li>
                        <li>
                            <span><?php echo $this->_var['lang']['no_settlement']; ?></span>
                            <div class="price"><em ectype="no_settlement">0.00</em><?php echo $this->_var['lang']['yuan']; ?></div>
                        </li>
                        <li>
                            <span><?php echo $this->_var['lang']['is_settlement']; ?></span>
                            <div class="price"><em ectype="is_settlement">0.00</em><?php echo $this->_var['lang']['yuan']; ?></div>
                        </li>
                        <li>
                            <span><?php echo $this->_var['lang']['store_num']; ?></span>
                            <div class="price"><em ectype="store_num">0</em><?php echo $this->_var['lang']['jia']; ?></div>
                        </li>
                    </ul>
                </div>
            	<div class="common-head">
                    <div class="search">
                    	<form action="javascript:;" name="searchForm" onSubmit="searchGoodsname(this);">
                        <div id="text_time_start" class="text_time ml10">
                            <input type="text" readonly placeholder="<?php echo $this->_var['lang']['order_start_time']; ?>" autocomplete="off" class="text mr0" id="start_time_id" name="start_time">
                        </div>
                        <span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
                        <div id="text_time_end" class="text_time">
                            <input type="text" readonly autocomplete="off" placeholder="<?php echo $this->_var['lang']['order_end_time']; ?>" class="text" id="end_time_id" value="" name="end_time">
                        </div>      
                        <div class="input">
                            <input type="text" name="user_name" class="text nofocus" placeholder="<?php echo $this->_var['lang']['suppliers_name']; ?>" autocomplete="off" />
                            <input type="submit" class="btn" name="secrch_btn" ectype="secrch_btn" value="" />
                        </div>
                        </form>
                    </div>
					<div class="fl">
						<a href="<?php echo $this->_var['action_link3']['href']; ?>"><div class="fbutton"><div class="csv" title="<?php echo $this->_var['action_link3']['text']; ?>"><span><i class="icon icon-download-alt"></i><?php echo $this->_var['action_link3']['text']; ?></span></div></div></a>
					</div>
                </div>
                <div class="common-content">
                	<div class="list-div" id="listDiv" >
						<?php endif; ?>
                        <form method="post" action="" name="listForm" onsubmit="return confirm(batch_drop_confirm);">
                    	<table cellpadding="1" cellspacing="1">
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['suppliers_name']; ?></div></th>
									<th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['suppliers_store']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['suppliers_company']; ?></div></th>
                                    <th width="13%"><div class="tDiv"><?php echo $this->_var['lang']['suppliers_address']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['order_valid_total']; ?></div></th>
                                    
                                    <!--分销商品开关begin -->
                                	<?php if ($this->_var['is_dir']): ?>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['all_drp_amount']; ?></div></th>
                                    <?php endif; ?>
                                	<!--分销商品开关end -->
                                    
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['order_refund_total']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['is_settlement_amount']; ?></div></th>
									<th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['no_settlement_amount']; ?></div></th>
                                    <th width="15%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							    <?php $_from = $this->_var['merchants_commission_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'commission');if (count($_from)):
    foreach ($_from AS $this->_var['commission']):
?>
								<tr>
                                    <td class="sign"><div class="tDiv"><input type="checkbox" name="checkboxes[]" class="checkbox" value="<?php echo $this->_var['commission']['user_id']; ?>" id="checkbox_<?php echo $this->_var['commission']['user_id']; ?>" /><label for="checkbox_<?php echo $this->_var['commission']['user_id']; ?>" class="checkbox_stars"></label></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['commission']['user_id']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['commission']['user_name']; ?></div></td>
									<td><div class="tDiv red"><?php echo $this->_var['commission']['store_name']; ?><?php if ($this->_var['commission']['self_run']): ?>（<?php echo $this->_var['lang']['self_run']; ?>）<?php endif; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['commission']['companyName']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['commission']['company_adress']; ?><p><?php echo empty($this->_var['commission']['company_contactTel']) ? $this->_var['lang']['n_a'] : $this->_var['commission']['company_contactTel']; ?></p></div></td>
                                    <td style="color:#C00">
                                        <div class="tDiv">
                                        	<?php if ($this->_var['commission']['is_goods_rate']): ?>
                                            	<p> + <?php echo $this->_var['commission']['order_total_fee']; ?>【<?php echo $this->_var['lang']['edit_order']; ?>】</p>
                                                <p> + <?php echo $this->_var['commission']['goods_total_fee']; ?>【<?php echo $this->_var['lang']['goods_alt']; ?>】</p>
                                            	<p>=<?php echo $this->_var['commission']['order_valid_total']; ?></p>
                                            <?php else: ?>
                                        		<?php echo $this->_var['commission']['order_valid_total']; ?>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    
                                    <!--分销商品开关begin -->
                                	<?php if ($this->_var['is_dir']): ?>
                                    <td><div class="tDiv"><?php echo $this->_var['commission']['order_drp_commission']; ?></div></td>
                                    <?php endif; ?>
                                	<!--分销商品开关end -->
                                    
                                    <td style="color:#1b9ad5"><div class="tDiv"><?php echo $this->_var['commission']['order_refund_total']; ?></div></td>
                                    <td style="color:#179f27">
                                    	<div class="tDiv">
                                        	<p id="list_is_settlement_<?php echo $this->_var['commission']['user_id']; ?>"></p>
                                            <?php if ($this->_var['commission']['is_goods_rate'] && $this->_var['commission']['is_settlement_price'] != 0): ?>
                                            	<p><em class="red">(<?php echo $this->_var['lang']['part_goods']; ?>)</em></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td style="color:#F00">
                                    	<div class="tDiv">
                                        	<p id="list_no_settlement_<?php echo $this->_var['commission']['user_id']; ?>"></p>
                                            <?php if ($this->_var['commission']['is_goods_rate'] && $this->_var['commission']['no_settlement_price'] != 0): ?>
                                            	<p><em class="red">(<?php echo $this->_var['lang']['part_goods']; ?>)</em></p>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td class="handle">
                                        <div class="tDiv a3_3">
                                        	<a href="merchants_commission.php?act=edit&id=<?php echo $this->_var['commission']['user_id']; ?>" title="<?php echo $this->_var['lang']['02_order_list']; ?>" class="btn_see" ><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view']; ?></a>
                                           	<a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['commission']['user_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a>	
                                        </div>
                                    </td>
								</tr>
								<?php endforeach; else: ?>
								<tr><td class="no-records" colspan="12"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
								<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            <tfoot>
                            	<tr>
                                    <td colspan="12">
                                        <div class="fl red"><?php echo $this->_var['lang']['admin_commission']; ?>：<?php echo $this->_var['lang']['is_settlement_amount']; ?>：<em id="is_settlement"></em>，<?php echo $this->_var['lang']['no_settlement_amount']; ?>：<em id="no_settlement"></em></div>
                                    	<div class="list-page">
                                            <?php echo $this->fetch('library/page.lbi'); ?>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        </form>
						<?php if ($this->_var['full_page']): ?>
                    </div>
                </div>
            </div>
            <div class="gj_search">
                <div class="search-gao-list" id="searchBarOpen">
                    <i class="icon icon-zoom-in"></i><?php echo $this->_var['lang']['advanced_search']; ?>
                </div>
                <div class="search-gao-bar">
                    <div class="handle-btn" id="searchBarClose"><i class="icon icon-zoom-out"></i><?php echo $this->_var['lang']['pack_up']; ?></div>
                    <div class="title"><h3><?php echo $this->_var['lang']['advanced_search']; ?></h3></div>
                    <form method="get" name="formSearch_senior" action="javascript:searchStore()">
                        <div class="searchContent">
                            <div class="layout-box">
                                <dl>
                                    <dt><?php echo $this->_var['lang']['steps_shop_name']; ?></dt>
                                    <dd>
                                        <div id="shop_name_select" class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                               <li><a href="javascript:;" data-value="1"><?php echo $this->_var['lang']['s_shop_name']; ?></a></li>
                                               <li><a href="javascript:;" data-value="2"><?php echo $this->_var['lang']['s_qw_shop_name']; ?></a></li>
                                               <li><a href="javascript:;" data-value="3"><?php echo $this->_var['lang']['s_brand_type']; ?></a></li>
                                            </ul>
                                            <input name="store_search" type="hidden" value="0" id="shop_name_val">
                                        </div>
                                    </dd>
                                </dl>
                                <dl style="display:none" id="merchant_box">
                                    <dd>
                                        <div class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                               <?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['store']['ru_id']; ?>"><?php echo $this->_var['store']['store_name']; ?></a></li>
                                               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                            <input name="merchant_id" type="hidden" value="0" >
                                        </div>
                                    </dd>
                                </dl>
                                <dl id="store_keyword" style="display:none" >
                                    <dd><input type="text" value="" name="store_keyword" class="s-input-txt" autocomplete="off" /></dd>
                                </dl>
                                <dl style="display:none" id="store_type">
                                    <dd>
                                        <div class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['steps_shop_type']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['flagship_store']; ?>"><?php echo $this->_var['lang']['flagship_store']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['exclusive_shop']; ?>"><?php echo $this->_var['lang']['exclusive_shop']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['franchised_store']; ?>"><?php echo $this->_var['lang']['franchised_store']; ?></a></li>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['shop_store']; ?>"><?php echo $this->_var['lang']['shop_store']; ?></a></li>
                                            </ul>
                                            <input name="store_type" type="hidden" value="0" >
                                        </div>
                                    </dd>
                                </dl>
                                <dl class="bot_btn">
                                    <dd>
                                       <input name="seller_list" type="hidden" value="0" >
                                       <input type="submit" class="btn red_btn" name="tj_search" value="<?php echo $this->_var['lang']['button_inquire']; ?>" /><input type="reset" class="btn btn_reset" name="reset" value="<?php echo $this->_var['lang']['button_reset_alt']; ?>" />
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
	<script type="text/javascript">
    //列表导航栏设置下路选项
    $(".ps-container").perfectScrollbar();
        
    //分页传值
    listTable.recordCount = <?php echo empty($this->_var['record_count']) ? '0' : $this->_var['record_count']; ?>;
    listTable.pageCount = <?php echo empty($this->_var['page_count']) ? '1' : $this->_var['page_count']; ?>;
    
    <?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
    listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

	$(function(){
        /* 当页还是所有 */
        commission_all();
		commission_amount();
	});

    /* 当页还是所有 */
    function commission_all(){
        var cycle = <?php echo $this->_var['filter']['cycle']; ?>;
        Ajax.call('merchants_commission.php?act=commission_amount', 'type=all&cycle='+cycle, function(data){
            if(data.admin_all){
                $("[ectype='store_num']").text(data.admin_all['store_num']);
                $("[ectype='total_amount']").text(data.admin_all['total_amount']);
                $("[ectype='is_settlement']").text(data.admin_all['is_settlement']);
                $("[ectype='no_settlement']").text(data.admin_all['no_settlement']);
            }
        }, "GET", "JSON");
    }
	
	function commission_amount(){
		var checkboxes = $(":input[name='checkboxes[]']");
		var str = '';
		var val = '';
		
		for(var i = 0; i < checkboxes.length; i++){
			val = checkboxes.eq(i).val();
			
			if(i == 0){
				str = val;
			}else{
				str += "," + val;
			}
		}

		Ajax.call('merchants_commission.php?act=commission_amount', 'seller=' + str, commissionAmountResponse, "GET", "JSON");
	};
	
	function commissionAmountResponse(result){
		$("#is_settlement").html(result.commission.is_settlement);
		$("#no_settlement").html(result.commission.no_settlement);
		
		for(var i=0; i < result.commission_list.length; i++){
			$("#list_is_settlement_" + result.commission_list[i].user_id).html(result.commission_list[i].is_settlement);
			$("#list_no_settlement_" + result.commission_list[i].user_id).html(result.commission_list[i].no_settlement);
		}
	}
    
    //导出商家佣金列表
    function download_list()
    {
      var args = '';
      for (var i in listTable.filter)
      {
        if (typeof(listTable.filter[i]) != "function" && typeof(listTable.filter[i]) != "undefined")
        {
          args += "&" + i + "=" + encodeURIComponent(listTable.filter[i]);
        }
      }
      
      location.href = "merchants_commission.php?act=commission_download" + args;
    }
    $.gjSearch("-240px");  //高级搜索
    
    
    $.divselect("#shop_name_select","#shop_name_val",function(obj){
        var val = obj.attr("data-value");
        get_store_search(val);
    });
	
    function get_store_search(val){
		if(val == 1){
			$("#merchant_box").css("display",'');
			$("#store_keyword").css("display",'none');
			$("#store_type").css("display",'none')
		}else if(val == 2){
			$("#merchant_box").css("display",'none');
			$("#store_keyword").css("display",'');
			$("#store_type").css("display",'none')
		}else if(val == 3){
			$("#merchant_box").css("display",'none');
			$("#store_keyword").css("display",'');
			$("#store_type").css("display",'')
		}else{
			$("#merchant_box").css("display",'none');
			$("#store_keyword").css("display",'none');
			$("#store_type").css("display",'none')
		}
    }
    
    /* 搜索店铺 */
    function searchStore()
    {
        
        var frm = $("form[name='formSearch_senior']");
        listTable.filter['store_search'] = Utils.trim(frm.find("input[name='store_search']").val());
        listTable.filter['merchant_id'] = Utils.trim(frm.find("input[name='merchant_id']").val());
        listTable.filter['store_keyword'] = Utils.trim(frm.find("input[name='store_keyword']").val());
        listTable.filter['store_type'] = Utils.trim(frm.find("input[name='store_type']").val());
    
        listTable.filter['page'] = 1;
        listTable.loadList();
    }
    
	//日期选择插件调用start sunle
	var opts1 = {
		'targetId':'start_time_id',//时间写入对象的id
		'triggerId':['start_time_id'],//触发事件的对象id
		'alignId':'text_time_start',//日历对齐对象
		'format':'-',//时间格式 默认'YYYY-MM-DD HH:MM:SS'
		'min':'' //最小时间
	},opts2 = {
		'targetId':'end_time_id',
		'triggerId':['end_time_id'],
		'alignId':'text_time_end',
		'format':'-',
		'min':''
	}
	xvDate(opts1);
	xvDate(opts2);
	//日期选择插件调用end sunle
    </script>
</body>
</html>
<?php endif; ?>