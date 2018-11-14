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
                	<li <?php if ($this->_var['act_type'] == 'merchants_seller_account'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link3']['href']; ?>"><?php echo $this->_var['action_link3']['text']; ?></a></li>
                    <li <?php if ($this->_var['act_type'] == 'detail' && $this->_var['log_type'] == 4): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link2']['href']; ?>"><?php echo $this->_var['action_link2']['text']; ?></a></li>
                    <li <?php if ($this->_var['act_type'] == 'detail' && $this->_var['log_type'] == 3): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link1']['href']; ?>"><?php echo $this->_var['action_link1']['text']; ?></a></li>
                    <li <?php if ($this->_var['act_type'] == 'detail' && $this->_var['log_type'] == 2): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link4']['href']; ?>"><?php echo $this->_var['action_link4']['text']; ?></a></li>
                    <li <?php if ($this->_var['act_type'] == 'detail' && $this->_var['log_type'] == 5): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link5']['href']; ?>"><?php echo $this->_var['action_link5']['text']; ?></a></li>
                    <li <?php if ($this->_var['act_type'] == 'account_log'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link']['href']; ?>"><?php echo $this->_var['action_link']['text']; ?></a></li> 
                    <li <?php if ($this->_var['act_type'] == 'account_log_list'): ?>class="curr"<?php endif; ?>><a href="<?php echo $this->_var['action_link6']['href']; ?>"><?php echo $this->_var['action_link6']['text']; ?></a></li>
                </ul>
            </div>
        	<div class="explanation" id="explanation">
            	<div class="ex_tit"><i class="sc_icon"></i><h4><?php echo $this->_var['lang']['operating_hints']; ?></h4><span id="explanationZoom" title="<?php echo $this->_var['lang']['fold_tips']; ?>"></span></div>
                <ul>
                	<li><?php echo $this->_var['lang']['operation_prompt_content']['seller_account']['0']; ?></li>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['seller_account']['1']; ?></li>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['seller_account']['2']; ?></li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-head">
                   	<div class="refresh ml0">
                    	<div class="refresh_tit" title="<?php echo $this->_var['lang']['refresh_data']; ?>"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span"><?php echo $this->_var['lang']['refresh_common']; ?><?php echo $this->_var['record_count']; ?><?php echo $this->_var['lang']['record']; ?></div>
                    </div>
                    <div class="search">
                    	<form action="javascript:;" name="searchForm" onSubmit="searchGoodsname(this);">
                        <div class="select">
                            <div class="fl"><?php echo $this->_var['lang']['steps_shop_name']; ?>：</div>
                            <div id="" class="imitate_select select_w170">
                                <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                <ul>
                                    <li><a href="javascript:get_store_search(-1);" data-value="-1" class="ftx-01"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                    <li><a href="javascript:get_store_search(1);" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['s_shop_name']; ?></a></li>
                                    <li><a href="javascript:get_store_search(2);" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['s_qw_shop_name']; ?></a></li>
                                    <li><a href="javascript:get_store_search(3);" data-value="3" class="ftx-01"><?php echo $this->_var['lang']['s_brand_type']; ?></a></li>
                                </ul>
                                <input name="store_search" type="hidden" value="-1" id="">
                            </div>
                            <div id="" class="imitate_select select_w170" style="display:none">
                                <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                <ul>
                                    <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['please_select']; ?></a></li>
                                    <?php $_from = $this->_var['store_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
                                    <li><a href="javascript:;" data-value="<?php echo $this->_var['store']['ru_id']; ?>" class="ftx-01"><?php echo $this->_var['store']['store_name']; ?></a></li>
                                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                </ul>
                                <input name="merchant_id" type="hidden" value="0" id="">
                            </div>
                            <input name="store_keyword" type="text" style="display:none" class="text text_2"/>
                            <div id="" class="imitate_select select_w170" style="display:none">
                                <div class="cite"><?php echo $this->_var['lang']['please_select']; ?></div>
                                <ul>
                                    <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['steps_shop_type']; ?></a></li>
                                    <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['flagship_store']; ?>" class="ftx-01"><?php echo $this->_var['lang']['flagship_store']; ?></a></li>
                                    <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['exclusive_shop']; ?>" class="ftx-01"><?php echo $this->_var['lang']['exclusive_shop']; ?></a></li>
                                    <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['franchised_store']; ?>" class="ftx-01"><?php echo $this->_var['lang']['franchised_store']; ?></a></li>
                                    <li><a href="javascript:;" data-value="<?php echo $this->_var['lang']['shop_store']; ?>" class="ftx-01"><?php echo $this->_var['lang']['shop_store']; ?></a></li>
                                </ul>
                                <input name="store_type" type="hidden" value="0" id="">
                            </div>							
                        </div>			
                    	<div class="input">
                        	<input type="text" name="keywords" class="text nofocus" placeholder="<?php echo $this->_var['lang']['username']; ?>" autocomplete="off">
							<input type="submit" class="btn" name="secrch_btn" ectype="secrch_btn" value="" />
                        </div>
                        </form>
                    </div>
                </div>
                <div class="common-content">
                	<div class="list-div" id="listDiv">
                        <?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                  <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                  <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['title_balance']; ?></div></th>
                                  <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['title_frozen_money']; ?></div></th>
                                  <th width="6%"><div align="center"><?php echo $this->_var['lang']['handler']; ?></div></th>
                                </tr>
                            </thead>
                            <tbody>
								<?php $_from = $this->_var['log_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'log');$this->_foreach['nolog'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['nolog']['total'] > 0):
    foreach ($_from AS $this->_var['log']):
        $this->_foreach['nolog']['iteration']++;
?>
                                <tr>
                                  <td><div class="tDiv"><font class="red"><?php echo $this->_var['log']['shop_name']; ?></font></div></td>
                                  <td><div class="tDiv"><?php echo $this->_var['log']['seller_money']; ?></div></td>
                                  <td><div class="tDiv"><?php echo $this->_var['log']['frozen_money']; ?></div></td>  
                                  <td class="handle"><div class="tDiv a3" align="center">
                                    <a href="merchants_account.php?act=edit_seller&ru_id=<?php echo $this->_var['log']['ru_id']; ?>" class="btn_see"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
                                    <a href="merchants_account.php?act=account_log_list&ru_id=<?php echo $this->_var['log']['ru_id']; ?>" class="btn_see"><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['fund_details']; ?></a>
                                  </div></td>
                                </tr>
                              <?php endforeach; else: ?>
                              <tr><td class="no-records" colspan="8"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
                              <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>   
                            <tfoot>
                            	<tr>
                                    <td colspan="12">
                                        <div class="list-page">
                                            <?php echo $this->fetch('library/page.lbi'); ?>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>    
                        <?php if ($this->_var['full_page']): ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
    <script type="text/javascript">
	listTable.recordCount = <?php echo empty($this->_var['record_count']) ? '0' : $this->_var['record_count']; ?>;
	listTable.pageCount = <?php echo empty($this->_var['page_count']) ? '1' : $this->_var['page_count']; ?>;
	listTable.act_type = 'merchants_seller_account';

	<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	
	$.divselect("#shop_name_select","#shop_name_val",function(obj){
		var val = obj.attr("data-value");
		get_store_search(val);
	});
	
	function get_store_search(val){
		if(val == 1){
			$("input[name=merchant_id]").parent(".imitate_select").show();
			$("input[name=store_keyword]").hide();
			$("input[name=store_type]").parent(".imitate_select").hide();
		}else if(val == 2){
			$("input[name=merchant_id]").parent(".imitate_select").hide();
			$("input[name=store_keyword]").show();
			$("input[name=store_type]").parent(".imitate_select").hide();			
		}else if(val == 3){
			$("input[name=merchant_id]").parent(".imitate_select").hide();
			$("input[name=store_keyword]").show();
			$("input[name=store_type]").parent(".imitate_select").show();			
		}else{
			$("input[name=merchant_id]").parent(".imitate_select").hide();
			$("input[name=store_keyword]").hide();
			$("input[name=store_type]").parent(".imitate_select").hide();			
		}
	}

	/**
	 * 搜索用户
	 */
	function searchUser()
	{
		
		var frm = $("form[name='formSearch_senior']");
		listTable.filter['store_search'] = Utils.trim(frm.find("input[name='store_search']").val());
		listTable.filter['merchant_id'] = Utils.trim(frm.find("input[name='merchant_id']").val());
		listTable.filter['store_keyword'] = Utils.trim(frm.find("input[name='store_keyword']").val());
		listTable.filter['store_type'] = Utils.trim(frm.find("input[name='store_type']").val());
		listTable.filter['keywords'] = Utils.trim(frm.find("input[name='keywords']").val());
		listTable.filter['page'] = 1;
		
		listTable.loadList();
	}
    </script>
</body>
</html>
<?php endif; ?>
