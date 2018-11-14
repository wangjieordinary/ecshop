<?php if ($this->_var['full_page']): ?>
<!doctype html>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>

<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><?php if ($this->_var['user_type'] == 1): ?><?php echo $this->_var['lang']['seller']; ?><?php else: ?><?php echo $this->_var['lang']['08_members']; ?><?php endif; ?> - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<?php if ($this->_var['user_type'] == 1): ?>
            	<?php echo $this->fetch('library/seller_tab.lbi'); ?>
            <?php else: ?>
            	<?php echo $this->fetch('library/users_tab.lbi'); ?>
            <?php endif; ?>
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
                   	<div class="refresh ml0">
                    	<div class="refresh_tit" title="<?php echo $this->_var['lang']['refresh_data']; ?>"><i class="icon icon-refresh"></i></div>
                    	<div class="refresh_span"><?php echo $this->_var['lang']['refresh_common']; ?><?php echo $this->_var['record_count']; ?><?php echo $this->_var['lang']['record']; ?></div>
                    </div>
                    
                    <div class="search">
                    	<form action="javascript:;" name="searchForm" onSubmit="searchGoodsname(this);">
                        <div class="select_w120 imitate_select">
                            <div class="cite"><?php echo $this->_var['lang']['all']; ?></div>
                            <ul>
                                <li><a href="javascript:;" data-value="-1"><?php echo $this->_var['lang']['all']; ?></a></li>
                                <li><a href="javascript:;" data-value="0"><?php echo $this->_var['lang']['not_audited']; ?></a></li>
                                <li><a href="javascript:;" data-value="1"><?php echo $this->_var['lang']['audited_adopt']; ?></a></li>
                                <li><a href="javascript:;" data-value="2"><?php echo $this->_var['lang']['audited_not_adopt']; ?></a></li>
                            </ul>
                            <input name="review_status" type="hidden" value="-1">
                        </div>
                        <div class="input">
                            <input type="text" name="keyword" class="text nofocus" placeholder="<?php echo $this->_var['lang']['user_name']; ?>" autocomplete="off" />
                            <input type="submit" class="btn" name="secrch_btn" ectype="secrch_btn" value="" />
                        </div>
                        </form>
                    </div>
                </div>
                <div class="common-content">
                    <form method="POST" action="" name="listForm" onsubmit="return confirmSubmit()">
                	<div class="list-div"  id="listDiv">
                        <?php endif; ?>
                    	<table cellpadding="0" cellspacing="0" border="0">
                        	<thead>
                            	<tr>
                                    <th width="3%" class="sign"><div class="tDiv"><input type="checkbox" name="all_list" class="checkbox" id="all_list" /><label for="all_list" class="checkbox_stars"></label></div></th>
                                    <th width="5%"><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th width="20%"><div class="tDiv"><?php if ($this->_var['user_type'] == 1): ?><?php echo $this->_var['lang']['goods_steps_name']; ?><?php else: ?>会员名称<?php endif; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['real_name']; ?></div></th>
                                    <th width="15%"><div class="tDiv"><?php echo $this->_var['lang']['bank_mobile']; ?></div></th>
                                    <th width="20%"><div class="tDiv"><?php echo $this->_var['lang']['self_num']; ?></div></th>
                                    <th width="10%"><div class="tDiv"><?php echo $this->_var['lang']['adopt_status']; ?></div></th>
                                    <th width="15%" class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $_from = $this->_var['users_real_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'users_real_list_0_04440300_1540968641');if (count($_from)):
    foreach ($_from AS $this->_var['users_real_list_0_04440300_1540968641']):
?>
                            	<tr>
                                    <td class="sign"><div class="tDiv"><input type="checkbox" name="checkboxes[]" value="<?php echo $this->_var['users_real_list_0_04440300_1540968641']['real_id']; ?>" class="checkbox" id="checkbox_<?php echo $this->_var['users_real_list_0_04440300_1540968641']['real_id']; ?>" /><label for="checkbox_<?php echo $this->_var['users_real_list_0_04440300_1540968641']['real_id']; ?>" class="checkbox_stars"></label></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['users_real_list_0_04440300_1540968641']['real_id']; ?></div></td>
                                    <td><div class="tDiv"><?php echo htmlspecialchars($this->_var['users_real_list_0_04440300_1540968641']['user_name']); ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['users_real_list_0_04440300_1540968641']['real_name']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['users_real_list_0_04440300_1540968641']['bank_mobile']; ?></div></td>
                                    <td><div class="tDiv"><?php echo $this->_var['users_real_list_0_04440300_1540968641']['self_num']; ?></div></td>
                                    <td><div class="tDiv"><?php if ($this->_var['users_real_list_0_04440300_1540968641']['review_status'] == 1): ?><?php echo $this->_var['lang']['audited_adopt']; ?><?php elseif ($this->_var['users_real_list_0_04440300_1540968641']['review_status'] == 2): ?><?php echo $this->_var['lang']['audited_not_adopt']; ?><?php else: ?><?php echo $this->_var['lang']['not_audited']; ?><?php endif; ?></div></td>
                                    <td class="handle">
                                        <div class="tDiv a2">
                                            <a href="user_real.php?act=edit&real_id=<?php echo $this->_var['users_real_list_0_04440300_1540968641']['real_id']; ?>&user_type=<?php echo $this->_var['user_type']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
                                            <a href="javascript:confirm_redirect('<?php echo $this->_var['lang']['confirm_redirect']; ?>', 'user_real.php?act=remove&real_id=<?php echo $this->_var['users_real_list_0_04440300_1540968641']['real_id']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a>
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
                                                <input type="hidden" value="batch" name="act">
                                                <div class="item">
                                                    <div id="drop_select" class="imitate_select select_w120">
                                                      <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                                      <ul>
                                                         <li><a href="javascript:;" data-value="" class="ftx-01"><?php echo $this->_var['lang']['select_please']; ?></a></li>
                                                         <li><a href="javascript:;" data-value="batch_remove" class="ftx-01"><?php echo $this->_var['lang']['drop']; ?></a></li>
                                                         <li><a href="javascript:;" data-value="review_to" class="ftx-01"><?php echo $this->_var['lang']['check']; ?></a></li>
                                                      </ul>
                                                      <input name="type" type="hidden" value="" id="drop_val">
                                                    </div>
                                                </div>
                                                <div class="item" style="display: none;" id="review_status">
                                                    <div id="review_status_select" class="imitate_select select_w120">
                                                      <div class="cite"><?php echo $this->_var['lang']['select_please']; ?></div>
                                                      <ul>
                                                         <li><a href="javascript:;" data-value="0" class="ftx-01"><?php echo $this->_var['lang']['all']; ?></a></li>
                                                         <li><a href="javascript:;" data-value="1" class="ftx-01"><?php echo $this->_var['lang']['audited_adopt']; ?></a></li>
                                                         <li><a href="javascript:;" data-value="2" class="ftx-01"><?php echo $this->_var['lang']['audited_not_adopt']; ?></a></li>
                                                      </ul>
                                                      <input name="review_status" type="hidden" value="0" id="review_status_val">
                                                    </div>
                                                </div>
                                                <input name="review_content" type="text" value="" class="text text_2 mr10 lh26" style="display:none" />
                                                <input type="submit" value="<?php echo $this->_var['lang']['button_submit_alt']; ?>" name="remove" ectype="btnSubmit" class="btn btn_disabled" disabled="">
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
	
	$.divselect("#drop_select","#drop_val",function(obj){
		changeAction();
	});

	$.divselect("#review_status_select","#review_status_val",function(obj){
		var val = obj.attr("cat_type");
		get_review_status(val);
	});
	
	function confirmSubmit(frm, ext){
		if ($("input[name='type']").val() == 'trash'){
			return confirm('{$lang.real_confirm_redirect');
		}else if ($("input[name='type']").val() == ''){
			return false;
		}else{
			return true;
		}
	}
    
	function get_review_status(){
		var type = $("input[name='type']").val();
		if(type == 'review_to'){
            if($("input[name='review_status']").val() == 2){
                $("input[name='review_content']").css('display','');
            }else{
                $("input[name='review_content']").css('display','none');
            }
		}else{
            $("input[name='review_content']").css('display','none');
		}
    }
	
	function changeAction(){
        var type = $("input[name='type']").val();
        var review_status = $("#review_status");

        // 切换商品审核列表的显示
        review_status.css("display",type == 'review_to' ? '' : 'none');
        
        if(type != 'review_to'){
            review_status.css("display", 'none');
        }
	}
    </script>
</body>
</html>
<?php endif; ?>
