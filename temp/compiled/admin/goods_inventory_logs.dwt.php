<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4><?php echo $this->_var['lang']['operating_hints']; ?></h4><span id="explanationZoom" title="<?php echo $this->_var['lang']['fold_tips']; ?>"></span></div>
                <ul>
                	<li><?php echo $this->_var['lang']['operation_prompt_content']['list']['0']; ?></li>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['list']['1']; ?></li>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['list']['2']; ?></li>
                </ul>
            </div>
            <div class="flexilist">
				<div class="common-head">
                    <?php if ($this->_var['action_link']): ?>
                    <div class="fl">
                        <a href="<?php echo $this->_var['action_link']['href']; ?>"><div class="fbutton"><div class="piliang" title="<?php echo $this->_var['action_link']['text']; ?>"><span><i class="icon icon-copy"></i><?php echo $this->_var['action_link']['text']; ?></span></div></div></a>
                    </div>
                    <?php endif; ?>
                    <div class="search">
                    	<form action="javascript:;" name="searchForm" onSubmit="searchGoodsname(this);">
                            <div id="text_time_start" class="text_time">
                                <input type="text" readonly placeholder="<?php echo $this->_var['lang']['start_time']; ?>" autocomplete="off" class="text valid" id="start_time_id" name="start_time" style="margin-right:0px;">
                            </div>
                            <span class="bolang">&nbsp;&nbsp;~&nbsp;&nbsp;</span>
                            <div id="text_time_end" class="text_time">
                                <input type="text" readonly autocomplete="off" placeholder="<?php echo $this->_var['lang']['end_time']; ?>" class="text" id="end_time_id" value="" name="end_time">
                            </div>
                            <div class="input mr10">
                                <input type="text" name="keyword" class="text nofocus" placeholder="<?php echo $this->_var['lang']['goods_name']; ?>" autocomplete="off" />
                                <input type="submit" value="" class="not_btn" />
                            </div>
                        </form>
                    </div>
                </div>
                <div class="common-content">
				<form method="POST" action="goods_inventory_logs.php?act=batch_drop" name="listForm" onsubmit="return confirm('<?php echo $this->_var['lang']['confirm_batch_delete']; ?>');">
                	<div class="list-div"  id="listDiv">
						<?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                	<th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="20%"><div class="tDiv"><?php echo $this->_var['lang']['goods_name']; ?></div></th>
                                    <th width="16%"><div class="tDiv"><?php echo $this->_var['lang']['goods_attr']; ?></div></th>
                                    <th width="8%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['order_sn']; ?></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['inventory']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['inventory_type']; ?></div></th>
                                    <th width="12%"><div class="tDiv"><?php echo $this->_var['lang']['operation_info']; ?></div></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $_from = $this->_var['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                            	<tr>
                                	<td class="sign"><div class="tDiv"><input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['list']['id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['list']['id']; ?>" /><label for="checkbox_<?php echo $this->_var['list']['id']; ?>" class="checkbox_stars"></label></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['id']; ?></div></td>
									<td>
                                        <div class="tDiv goods_list_info">
                                            <div class="img"><a href="../goods.php?id=<?php echo $this->_var['list']['goods_id']; ?>" target="_blank" title="<?php echo htmlspecialchars($this->_var['list']['goods_name']); ?>"><img src="<?php echo $this->_var['list']['goods_thumb']; ?>" width="68" height="68" /></a></div>
                                            <div class="desc">
                                                <div class="name">
                                                    <span title="<?php echo $this->_var['list']['goods_name']; ?>" data-toggle="tooltip" class="span"><?php echo $this->_var['list']['goods_name']; ?></span>
                                                </div>
												<?php if ($this->_var['list']['brand_name']): ?><p class="brand"><?php echo $this->_var['lang']['brand']; ?>：<em><?php echo $this->_var['list']['brand_name']; ?></em></p><?php endif; ?>
                                            </div>        
                                        </div>
                                    </td>
									<td><div class="tDiv"><?php echo $this->_var['list']['goods_attr']; ?></div></td>
                                    <td><div class="tDiv"><font class="red"><?php echo $this->_var['list']['shop_name']; ?></font></div></td>
                                    <td><div class="tDiv"><?php echo empty($this->_var['list']['order_sn']) ? $this->_var['lang']['n_a'] : $this->_var['list']['order_sn']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['list']['number']; ?></div></td>
                                    <td>
                                        <div class="tDiv">
                                            <span>
                                                <?php if ($this->_var['list']['product_id']): ?>
                                                    <?php echo $this->_var['lang']['goods_attr_stock']; ?>
                                                    <br>
                                                    <font class="navy">(
                                                    <?php if ($this->_var['list']['model_attr'] == 1): ?>
                                                        <?php echo $this->_var['lang']['warehouse']; ?>：<?php echo $this->_var['list']['warehouse_name']; ?>
                                                    <?php elseif ($this->_var['list']['model_attr'] == 2): ?>
                                                        <?php echo $this->_var['lang']['region']; ?>：<?php echo $this->_var['list']['area_name']; ?>
                                                    <?php else: ?>
                                                        <?php echo $this->_var['lang']['default']; ?>
                                                    <?php endif; ?>
                                                    )</font>
                                                <?php else: ?>
                                                    <?php echo $this->_var['lang']['goods_stock']; ?>
                                                    <br>
                                                    <font class="navy">(
                                                    <?php if ($this->_var['list']['model_inventory'] == 1): ?>
                                                        <?php echo $this->_var['lang']['warehouse']; ?>：<?php echo $this->_var['list']['warehouse_name']; ?>
                                                    <?php elseif ($this->_var['list']['model_inventory'] == 2): ?>
                                                        <?php echo $this->_var['lang']['region']; ?>： <?php echo $this->_var['list']['area_name']; ?>
                                                    <?php else: ?>
                                                        <?php echo $this->_var['lang']['default']; ?>
                                                    <?php endif; ?>
                                                    )</font>
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                    </td>
                                    <td>
                                    	<div class="tDiv">
                                        	<p><?php echo $this->_var['list']['admin_name']; ?></p>
                                            <p>
                                                <span>
                                                <?php if ($this->_var['list']['use_storage'] == 0): ?>
                                                    <?php echo $this->_var['lang']['delivery_time']; ?>
                                                <?php elseif ($this->_var['list']['use_storage'] == 1): ?>
                                                    <?php echo $this->_var['lang']['order_time']; ?>
                                                <?php elseif ($this->_var['list']['use_storage'] == 2): ?>
                                                    <?php echo $this->_var['lang']['order_invalid']; ?>
                                                <?php elseif ($this->_var['list']['use_storage'] == 3): ?>
                                                    <?php echo $this->_var['lang']['order_cancel']; ?>
                                                <?php elseif ($this->_var['list']['use_storage'] == 4): ?>
                                                    <?php echo $this->_var['lang']['order_confirm_receipt']; ?>
                                                <?php elseif ($this->_var['list']['use_storage'] == 5): ?>
                                                    <?php echo $this->_var['lang']['order_not_shipped']; ?>
                                                <?php elseif ($this->_var['list']['use_storage'] == 6): ?>
                                                    <?php echo $this->_var['lang']['order_return']; ?>
                                                <?php elseif ($this->_var['list']['use_storage'] == 15): ?>
                                                    <?php echo $this->_var['lang']['paid_time']; ?>                                                    
                                                <?php endif; ?>
                                            	</span>
                                            </p>
                                            <p><?php echo $this->_var['list']['add_time']; ?></p>
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
                                        <div class="tDiv">
                                            <div class="tfoot_btninfo">
                                                <input name="step" type="hidden" value="<?php echo $this->_var['step']; ?>" />
                                                <input type="submit" value="<?php echo $this->_var['lang']['drop']; ?>" name="drop_type_id" ectype="btnSubmit" class="btn btn_disabled" disabled="">
                                            </div>
                                            <div class="list-page">
                                                <?php echo $this->fetch('library/page.lbi'); ?>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
						<?php if ($this->_var['full_page']): ?>
                    </div>
                    </form>
                </div>
            </div>
            <div class="gj_search">
                <div class="search-gao-list" id="searchBarOpen">
                    <i class="icon icon-zoom-in"></i><?php echo $this->_var['lang']['advanced_search']; ?>
                </div>
                <div class="search-gao-bar">
                    <div class="handle-btn" id="searchBarClose"><i class="icon icon-zoom-out"></i><?php echo $this->_var['lang']['pack_up']; ?></div>
                    <div class="title"><h3><?php echo $this->_var['lang']['advanced_search']; ?></h3></div>
                    <form method="get" name="formSearch_senior" action="javascript:searchInventory()">
                        <div class="searchContent">
                            <div class="layout-box">
                                <dl>
                                    <dt><?php echo $this->_var['lang']['goods_name']; ?></dt>
                                    <dd><input type="text" value="" name="keyword" class="s-input-txt" autocomplete="off" /></dd>
                                </dl>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['order_id']; ?></dt>
                                    <dd><input type="text" value="" name="order_sn" class="s-input-txt" autocomplete="off" /></dd>
                                </dl>
                                <?php if ($this->_var['warehouse_list']): ?>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['warehouse']; ?></dt>
                                    <dd>
                                        <div id="warehouseselect"  class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                               <?php $_from = $this->_var['warehouse_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
                                               <li><a href="javascript:;" data-value="<?php echo $this->_var['list']['region_id']; ?>"><?php echo $this->_var['list']['region_name']; ?></a></li>
                                               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                            <input name="warehouse_id" type="hidden" value="0" id="warehouseval">
                                        </div>
                                    </dd>
                                </dl>
                              <dl>
                                    <dt><?php echo $this->_var['lang']['region']; ?></dt>
                                    <dd >
                                        <div id="area_list"  class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                            </ul>
                                            <input name="area_id" type="hidden" value="0">
                                        </div>
                                    </dd>
                                </dl>
                                <?php endif; ?>
                                <?php if ($this->_var['step'] == 'put'): ?>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['operation_type']; ?></dt>
                                    <dd>
                                        <div  class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                                <li><a href="javascript:;" data-value="-1"><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                                <li><a href="javascript:;" data-value="2"><?php echo $this->_var['lang']['order_invalid']; ?></a></li>
                                                <li><a href="javascript:;" data-value="3"><?php echo $this->_var['lang']['order_cancel']; ?></a></li>
                                                <li><a href="javascript:;" data-value="5"><?php echo $this->_var['lang']['order_not_shipped']; ?></a></li>
                                                <li><a href="javascript:;" data-value="6"><?php echo $this->_var['lang']['order_return']; ?></a></li>
                                                <li><a href="javascript:;" data-value="7"><?php echo $this->_var['lang']['add_goods']; ?></a></li>
                                                <li><a href="javascript:;" data-value="13"><?php echo $this->_var['lang']['edit_goods']; ?></a></li>
                                                <li><a href="javascript:;" data-value="9"><?php echo $this->_var['lang']['add_goods_product']; ?></a></li>
                                                <li><a href="javascript:;" data-value="11"><?php echo $this->_var['lang']['edit_goods_product']; ?></a></li>
                                            </ul>
                                            <input name="operation_type" type="hidden" value="-1">
                                        </div>
                                    </dd>
                                </dl>
                                <?php else: ?>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['operation_type']; ?></dt>
                                    <dd>
                                        <div  class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                                <li><a href="javascript:;" data-value="-1"><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                                <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['delivery_time']; ?></a></li>
                                                <li><a href="javascript:;" data-value="1"><?php echo $this->_var['lang']['order_time']; ?></a></li>
                                                <li><a href="javascript:;" data-value="4"><?php echo $this->_var['lang']['order_confirm_receipt']; ?></a></li>
                                                <li><a href="javascript:;" data-value="8"><?php echo $this->_var['lang']['edit_goods']; ?></a></li>
                                                <li><a href="javascript:;" data-value="10"><?php echo $this->_var['lang']['edit_goods_product']; ?></a></li>
                                            </ul>
                                            <input name="operation_type" type="hidden" value="-1">
                                        </div>
                                    </dd>
                                </dl>
                                <?php endif; ?>
                                <!--卖场 start-->
                                <?php if ($this->_var['rs_enabled'] && ! $this->_var['rs_id']): ?>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['rs_name']; ?></dt>
                                    <dd>
                                        <div id="" class="imitate_select select_w145">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                            <ul>
                                                <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                                <?php $_from = $this->_var['region_store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'data');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['data']):
?>
                                                <li><a href="javascript:;" data-value="<?php echo $this->_var['data']['rs_id']; ?>" class="ftx-01"><?php echo $this->_var['data']['rs_name']; ?></a></li>
                                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                            </ul>
                                            <input name="rs_id" type="hidden" value="<?php echo empty($_GET['rs_id']) ? '0' : $_GET['rs_id']; ?>" autocomplete="off">
                                        </div>
                                    </dd>
                                </dl>
                                <?php endif; ?>
                                <!--卖场 end-->
                                <dl>
                                    <dt><?php echo $this->_var['lang']['steps_shop_name']; ?></dt>
                                    <dd>
                                        <div id="shop_name_select" class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
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
	listTable.recordCount = <?php echo empty($this->_var['record_count']) ? '0' : $this->_var['record_count']; ?>;
	listTable.pageCount = <?php echo empty($this->_var['page_count']) ? '1' : $this->_var['page_count']; ?>;
	
	<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	
	//高级搜索
	$.gjSearch("-240px");

    $.divselect("#warehouseselect","#warehouseval",function(obj){
        var val = obj.attr("data-value");
        get_search_area(val);
    });
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

    function get_search_area(warehouse_id){
		$.jqueryAjax('goods_inventory_logs.php', 'is_ajax=1&act=search_area&warehouse_id='+  warehouse_id, function(data){
			$("#area_list").html(data.content);
		}, "GET", "JSON");
    }
	
	function searchInventory(){
		var frm = $("form[name='formSearch_senior']");
		
		listTable.filter['store_search'] = Utils.trim(frm.find("input[name='store_search']").val());
		listTable.filter['merchant_id'] = Utils.trim(frm.find("input[name='merchant_id']").val());
		listTable.filter['store_keyword'] = Utils.trim(frm.find("input[name='store_keyword']").val());
		listTable.filter['store_type'] = Utils.trim(frm.find("input[name='store_type']").val());

		listTable.filter['keyword'] = Utils.trim(frm.find("input[name='keyword']").val());
		listTable.filter['order_sn'] = Utils.trim(frm.find("input[name='order_sn']").val());
		listTable.filter['warehouse_id'] = Utils.trim(frm.find("input[name='warehouse_id']").val());
		listTable.filter['area_id'] = Utils.trim(frm.find("input[name='area_id']").val());
		listTable.filter['operation_type'] = Utils.trim(frm.find("input[name='operation_type']").val());
        //卖场 start
        <?php if ($this->_var['rs_enabled'] && ! $this->_var['rs_id']): ?>
        listTable.filter['rs_id'] = Utils.trim(frm.find("input[name='rs_id']").val());
        <?php endif; ?>
        //卖场 end
	
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
