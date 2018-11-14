<!doctype html>
<?php if ($this->_var['full_page']): ?>
<html>
<head><?php echo $this->fetch('library/admin_html_head.lbi'); ?></head>
<body class="iframe_body">
	<div class="warpper">
    	<div class="title"><?php echo $this->_var['lang']['seller']; ?> - <?php echo $this->_var['ur_here']; ?></div>
        <div class="content">
        	<div class="explanation" id="explanation">
            	<div class="ex_tit">
					<i class="sc_icon"></i><h4><?php echo $this->_var['lang']['operating_hints']; ?></h4><span id="explanationZoom" title="<?php echo $this->_var['lang']['fold_tips']; ?>"></span>
                    <?php if ($this->_var['open'] == 1): ?>
                    <div class="view-case">
                    	<div class="view-case-tit"><i></i><?php echo $this->_var['lang']['view_tutorials']; ?></div>
                        <div class="view-case-info">
                        	<a href="http://help.ecmoban.com/article-3330.html" target="_blank"><?php echo $this->_var['lang']['tutorials_bonus_list_one']; ?></a>
                        </div>
                    </div>			
                    <?php endif; ?>				
				</div>
                <ul>
                	<li><?php echo $this->_var['lang']['operation_prompt_content']['list']['0']; ?></li>
                    <li><?php echo $this->_var['lang']['operation_prompt_content']['list']['1']; ?></li>
                </ul>
            </div>
            <div class="flexilist">
                <div class="common-content">
					<div class="list-div"  id="listDiv" >
                    	<?php endif; ?>
                    	<table cellpadding="1" cellspacing="1">
                        	<thead>
                            	<tr>
                                	<th><div class="tDiv"><?php echo $this->_var['lang']['record_id']; ?></div></th>
                                    <th><div class="tDiv"><?php echo $this->_var['lang']['goods_steps_name']; ?></div></th>
                                    <th><div class="tDiv"><?php echo $this->_var['lang']['site_name']; ?></div></th>
                                    <th><div class="tDiv"><?php echo $this->_var['lang']['status']; ?></div></th>
                                    <th><div class="tDiv"><?php echo $this->_var['lang']['valid_time']; ?></div></th>
                                    <th class="handle"><?php echo $this->_var['lang']['handler']; ?></th>
                                </tr>
                            </thead>
                            <tbody>
							    <?php $_from = $this->_var['pzd_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'list');$this->_foreach['listname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['listname']['total'] > 0):
    foreach ($_from AS $this->_var['list']):
        $this->_foreach['listname']['iteration']++;
?>
								<td><div class="tDiv"><?php echo $this->_var['list']['id']; ?></div></td>
								<td><div class="tDiv"><?php echo $this->_var['list']['shop_name']; ?></div></td>
								<td><div class="tDiv"><?php echo $this->_var['list']['domain_name']; ?></div></td>
								<td>
									<div class="tDiv">
										<div class="switch mauto <?php if ($this->_var['list']['is_enable']): ?>active<?php endif; ?>" onclick="listTable.switchBt(this, 'is_enable', <?php echo $this->_var['list']['id']; ?>)" title="<?php echo $this->_var['lang']['yes']; ?>">
											<div class="circle"></div>
										</div>
										<input type="hidden" value="" name="is_enable">
									</div>
								</td>  
							    <td><div class="tDiv"><?php echo $this->_var['list']['validity_time']; ?></div></td>
							    <td class="handle">
                                    <div class="tDiv a2">
                                        <a href="seller_domain.php?act=edit&id=<?php echo $this->_var['list']['id']; ?>" title="<?php echo $this->_var['lang']['edit']; ?>" class="btn_edit"><i class="icon icon-edit"></i><?php echo $this->_var['lang']['edit']; ?></a>
                                        <a href="javascript:;" onclick="listTable.remove(<?php echo $this->_var['list']['id']; ?>, '<?php echo $this->_var['lang']['domain_confirm']; ?>')" title="<?php echo $this->_var['lang']['remove']; ?>" class="btn_trash"><i class="icon icon-trash"></i><?php echo $this->_var['lang']['drop']; ?></a>
                                    </div>
								</td>
								</tr>
								<?php endforeach; else: ?>
								<tr><td class="no-records"  colspan="11"><?php echo $this->_var['lang']['no_records']; ?></td></tr>
								<?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </tbody>
                            
                            <tfoot>
                            	<tr>
                                    <td colspan="12">
                                        <div class="tDiv">
                                            <div class="tfoot_btninfo">
                                                <input type="hidden" name="act" value="batch_remove" />
                                                <input type="submit" value="<?php echo $this->_var['lang']['drop']; ?>" name="remove" ectype="btnSubmit" class="btn btn_disabled" disabled="">
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
                </div>
            </div>
        </div>
    </div>
	<?php echo $this->fetch('library/pagefooter.lbi'); ?>
<?php endif; ?> 
</body>
</html>