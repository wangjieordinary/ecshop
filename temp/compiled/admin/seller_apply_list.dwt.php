<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><?php echo $this->_var['lang']['seller']; ?> - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<?php echo $this->fetch('library/seller_tab.lbi'); ?>
        	<div class="explanation" id="explanation">
                <div class="ex_tit"><i class="sc_icon"></i><h4><?php echo $this->_var['lang']['operating_hints']; ?></h4><span id="explanationZoom" title="<?php echo $this->_var['lang']['fold_tips']; ?>"></span></div>
                <ul>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['list']['0']; ?></li>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['list']['1']; ?></li>
                </ul>
            </div>
            <div class="flexilist">
            	<div class="common-head">
                    <div class="search">
                    	<form action="javascript:;" name="searchForm" onSubmit="searchGoodsname(this);">
                        <div class="input">
                            <input type="text" name="apply_sn" class="text nofocus" placeholder="<?php echo $this->_var['lang']['apply_sn']; ?>" autocomplete="off" />
                            <input type="submit" class="btn" name="secrch_btn" ectype="secrch_btn" value="" />
                        </div>
                        </form>
                    </div>
					<div class="fl">
						<a href="<?php echo $this->_var['action_link']['href']; ?>"><div class="fbutton"><div class="csv" title="<?php echo $this->_var['action_link']['text']; ?>"><span><i class="icon icon icon-download-alt"></i><?php echo $this->_var['action_link']['text']; ?></span></div></div></a>
					</div>
                </div>
                <div class="common-content">
                	<div class="list-div" id="listDiv" >
						<?php endif; ?>
                    	<table cellpadding="1" cellspacing="1">
                        	<thead>
                            	<tr>
                                	<th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['apply_sn']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['shop_name']; ?></div></th>
									<th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['grade_name']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['total_amount']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['refund_price']; ?></div></th>
                                    <th width="7%"><div class="tDiv"><?php echo $this->_var['lang']['payable_amount']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['back_price']; ?></div></th>
                                    <th width="6%"><div class="tDiv"><?php echo $this->_var['lang']['pay']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['add_time']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['apply_status']; ?></div></th>
                                    <th width="12%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							    <?php $_from = $this->_var['apply_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');if (count($_from)):
    foreach ($_from AS $this->_var['list']):
?>
								<tr>
								<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['apply_sn']); ?></div></td>
								<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['shop_name']); ?><?php if ($this->_var['list']['valid'] == 1): ?>&nbsp;&nbsp;<image src="images/yes.png" title="有效等级申请标识"/><?php endif; ?></div></td>
								<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['grade_name']); ?></div></td>	
								<td><div class="tDiv"><?php echo htmlspecialchars($this->_var['list']['total_amount']); ?></div></td>
								<td><div class="tDiv"><?php echo $this->_var['list']['refund_price']; ?></div></td>
							    <td><div class="tDiv"><?php echo $this->_var['list']['payable_amount']; ?></div></td>
								<td><div class="tDiv"><?php echo $this->_var['list']['back_price']; ?></div></td>
								<td><div class="tDiv"><?php echo $this->_var['list']['pay_name']; ?></div></td>
							    <td><div class="tDiv"><?php echo $this->_var['list']['add_time']; ?></div></td>
								<td><div class="tDiv"><?php echo $this->_var['list']['status_paid']; ?>,<?php echo $this->_var['list']['status_apply']; ?></div></td>  
							    <td class="handle">
                                    <div class="tDiv a2">
                                        <a href="seller_apply.php?act=info&apply_id=<?php echo $this->_var['list']['apply_id']; ?>&grade_id=<?php echo $this->_var['list']['grade_id']; ?>" title="<?php echo $this->_var['lang']['view_detail']; ?>" class="btn_see" ><i class="sc_icon sc_icon_see"></i><?php echo $this->_var['lang']['view']; ?></a>
                                        <?php if ($this->_var['list']['apply_status'] == 3 || $this->_var['pre_admin'] == 0): ?>
                                        <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['apply_id']; ?>, '<?php echo $this->_var['lang']['drop_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a>	
                                        <?php endif; ?>
                                    </div>
								</td>
								</tr>
								<?php endforeach; else: ?>
								<tr><td class="no-records"  align="center" colspan="11"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
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
            <div class="gj_search">
                <div class="search-gao-list" id="searchBarOpen">
                    <i class="icon icon-zoom-in"></i><?php echo $this->_var['lang']['advanced_search']; ?>
                </div>
                <div class="search-gao-bar">
                    <div class="handle-btn" id="searchBarClose"><i class="icon icon-zoom-out"></i><?php echo $this->_var['lang']['pack_up']; ?></div>
                    <div class="title"><h3><?php echo $this->_var['lang']['advanced_search']; ?></h3></div>
                    <form method="get" name="formSearch_senior" action="javascript:searchOrder()">
                        <div class="searchContent">
                            <div class="layout-box">
                                <dl>
                                    <dt><?php echo $this->_var['lang']['apply_sn']; ?></dt>
                                    <dd><input type="text" value="" name="apply_sn" class="s-input-txt" autocomplete="off" /></dd>
                                </dl>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['grade_name']; ?></dt>
                                    <dd><input type="text" value="" name="grade_name" class="s-input-txt" autocomplete="off" /></dd>
                                </dl>
                                <dl>
                                    <dt><?php echo htmlspecialchars($this->_var['lang']['pay_starts']); ?></dt>
                                    <dd>
                                        <div  class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="-1"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['no_pay']; ?></a></li>
                                               <li><a href="javascript:;" data-value="1"><?php echo $this->_var['lang']['is_pay']; ?></a></li>
                                            </ul>
                                            <input name="pay_starts" type="hidden" value="-1">
                                        </div>
                                    </dd>
                                </dl>
                               <dl>
                                    <dt><?php echo htmlspecialchars($this->_var['lang']['apply_status']); ?></dt>
                                    <dd>
                                        <div  class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="-1"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['is_confirm']['0']; ?></a></li>
                                               <li><a href="javascript:;" data-value="1"><?php echo $this->_var['lang']['is_confirm']['1']; ?></a></li>
                                               <li><a href="javascript:;" data-value="2"><?php echo $this->_var['lang']['is_confirm']['2']; ?></a></li>
                                               <li><a href="javascript:;" data-value="3"><?php echo $this->_var['lang']['is_confirm']['3']; ?></a></li>
                                            </ul>
                                            <input name="apply_starts" type="hidden" value="-1">
                                        </div>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt><?php echo $this->_var['lang']['effective_grade_apply']; ?></dt>
                                    <dd>
                                        <div  class="select_w145 imitate_select">
                                            <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                            <ul>
                                               <li><a href="javascript:;" data-value="-1"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                               <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['invalid']; ?></a></li>
                                               <li><a href="javascript:;" data-value="1"><?php echo $this->_var['lang']['effective']; ?></a></li>
                                            </ul>
                                            <input name="valid" type="hidden" value="-1">
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
	//分页传值
	listTable.recordCount = <?php echo empty($this->_var['record_count']) ? '0' : $this->_var['record_count']; ?>;
	listTable.pageCount = <?php echo empty($this->_var['page_count']) ? '1' : $this->_var['page_count']; ?>;

	<?php $_from = $this->_var['filter']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
	listTable.filter.<?php echo $this->_var['key']; ?> = '<?php echo $this->_var['item']; ?>';
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

    /**
     * 搜索订单
     */
    function searchOrder()
    {
        var frm = $("form[name='formSearch_senior']");
        listTable.filter['apply_sn'] = Utils.trim(frm.find("input[name='apply_sn']").val());
        listTable.filter['grade_name'] = Utils.trim(frm.find("input[name='grade_name']").val());
        listTable.filter['pay_starts'] = Utils.trim(frm.find("input[name='pay_starts']").val());
        listTable.filter['apply_starts'] = Utils.trim(frm.find("input[name='apply_starts']").val());
        listTable.filter['valid'] = frm.find("input[name='valid']").val();
        listTable.filter['page'] = 1;
        listTable.loadList();
    };
	
	//高级搜索
	$.gjSearch("-240px");
	</script>
</body>
</html>
<?php endif; ?>