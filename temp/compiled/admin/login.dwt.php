<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $this->_var['lang']['admin_title']; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="../favicon.ico" />
<link rel="icon" href="../animated_favicon.gif" type="image/gif" />
<link rel="stylesheet" type="text/css" href="css/purebox.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<?php echo $this->smarty_insert_scripts(array('files'=>'../js/jquery-1.9.1.min.js,../js/jquery.cookie.js,../js/jquery.SuperSlide.2.1.1.js,../js/jquery.validation.min.js,../js/lib_ecmobanFunc.js')); ?>
<script type="text/javascript">
//若cookie值不存在，则跳出iframe框架
if(!$.cookie('dscActionParam') && $.cookie('admin_type') != 1){
	$.cookie('admin_type','1' , {expires: 1 ,path:'/'});
	top.location.href = location.href;
}

<?php $_from = $this->_var['lang']['js_languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['key'] => $this->_var['item']):
?>
var <?php echo $this->_var['key']; ?> = "<?php echo $this->_var['item']; ?>";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</script>
</head>

<body>
	<div class="login-layout">
    	<div class="logo">
        <?php if ($this->_var['admin_login_logo']): ?>
        	<img src="<?php echo $this->_var['admin_login_logo']; ?>">
        <?php else: ?>
        	<img src="images/loginImg.png">
        <?php endif; ?>
        </div>
        <form action="privilege.php?act=signin" name='theForm' id="theForm" method="post">
            <div class="login-form" style="position: relative">
                <div class="formContent">
                	<div class="title"><?php echo $this->_var['lang']['management_center']; ?></div>
                    <div class="formInfo">
                    	<div class="formText">
                        	<i class="icon icon-user"></i>
                            <input type="text" name="username" autocomplete="off" class="input-text" value="" placeholder="<?php echo $this->_var['lang']['user_name']; ?>" />
                        </div>
                        <div class="formText">
                        	<i class="icon icon-pwd"></i>
                                <input type="password" style="display:none"/> 
                            <input type="password" name="password" autocomplete="off" class="input-text" value="" placeholder="<?php echo $this->_var['lang']['password']; ?>" />
                        </div>
                        <div class="formText">
                        	<div class="checkbox">
                            	<div class="cur">
                                    <input type="hidden" value="0" name="remember"/>
                                </div>
                            </div>
                           <span class="span"><?php echo $this->_var['lang']['save_information']; ?></span>
                            <a href="get_password.php?act=forget_pwd" class="forget_pwd"><?php echo $this->_var['lang']['forget_password']; ?></a>
                        </div>
                        <div class="formText submitDiv">
                            <?php if ($this->_var['gd_version'] > 0): ?>
                        	<span class="text_span">
                            	<div class="code">
                                	<div class="arrow"></div>
                                    <div class="code-img"><img style="cursor: pointer;" src="index.php?act=captcha" onclick= $(".code-img").find('img').attr('src',"index.php?act=captcha&"+Math.random()) /></div>
                                </div>  
                        		<input type="text" name="captcha" class="input-yzm" value="" autocomplete="off" />
                            </span>
                            <span class="submit_span">
                            	<input type="submit" name="submit" class="sub" value="<?php echo $this->_var['lang']['login']; ?>" />
                            </span>
                            <?php else: ?>
                            <span class="submit_span">
                            	<input type="submit" name="submit" class="sub sub_curr" value="<?php echo $this->_var['lang']['login']; ?>" />
                            </span>
                            <?php endif; ?>
                            <input type="hidden" name="dsc_token" value="<?php echo $this->_var['dsc_token']; ?>" autocomplete="off" />
                        </div>
                    </div>
                </div>
                <div id="error" style="position: absolute;left:0px;bottom: 30px;text-align: center;width:395px;">

                </div>
            </div>
        </form>
    </div>
    <div id="bannerBox">
        <ul id="slideBanner" class="slideBanner">
            <li><img src="images/banner_1.jpg"></li>
            <li><img src="images/banner_2.jpg"></li>
            <li><img src="images/banner_3.jpg"></li>
            <li><img src="images/banner_4.jpg"></li>
            <li><img src="images/banner_5.jpg"></li>
        </ul>
    </div>
    <?php echo $this->smarty_insert_scripts(array('files'=>'jquery.purebox.js')); ?>
    <script type="text/javascript">
    	$("#bannerBox").slide({mainCell:".slideBanner",effect:"fold",interTime:3500,delayTime:500,autoPlay:true,autoPage:true,endFun:function(i,c,s){
			$(window).resize(function(){
				var width = $(window).width();
				var height = $(window).height();
				s.find(".slideBanner,.slideBanner li").css({"width":width,"height":height});
			});
		}});

        $(function(){
			$(".formText .input-text").focus(function(){
				$(this).parent().addClass("focus");
			});
			
			$(".formText .input-text").blur(function(){
				$(this).parent().removeClass("focus");
			});
			
			$(".checkbox").click(function(){
				if($(this).hasClass("checked")){
					$(this).removeClass("checked");
                    $('input[name=remember]').val(0);
				}else{
					$(this).addClass("checked");
                    $('input[name=remember]').val(1);
				}
			});
			
			$(".formText .input-yzm").focus(function(){
				$(this).prev().show();
			});
			
			$(".formText").blur(function(){
				$(this).prev().hide();
			});
			
            $('.submit_span .sub').on('click',function(){
                $('.code').show();
            });
            $('#theForm input[name=submit]').on('click',function(){
                var username=true;
                var password=true;
                var captcha=true;
				var dsc_token = $(":input[name='dsc_token']").val();
				
                if($('#theForm input[name=username]').val() == ''){
                    $('#error').html('<span class="error">'+user_name_empty+'</span>');
                    $('#theForm input[name=username]').focus();
                    username = false;
                    return false;
                }

                if($('#theForm input[name=password]').val() == ''){
                    $('#error').html('<span class="error">'+password_empty+'</span>');
                    $('#theForm input[name=password]').focus();
                    password = false;
                    return false;
                }

                if($('#theForm input[name=captcha]').val() == ''){
                    $('#error').html('<span class="error">'+captcha_empty+'</span>');
                    $('#theForm input[name=captcha]').focus();
                    captcha = false;
                    return false;
                }

                if(captcha){
					$.ajax({
						async:false,
						url:'privilege.php?act=signin&type=captcha',
						data:{'captcha':$('#theForm input[name=captcha]').val(),'dsc_token':dsc_token},
						type:'post',
						success:function(data){
							if(data == 'false'){
								$('#error').html('<span class="error"><?php echo $this->_var['lang']['captcha_error']; ?></span>');
								captcha = false;
								return false;
							}
						}
					});
                }
                if(captcha && $('#theForm input[name=username]').val() != '' && $('#theForm input[name=password]').val() != ''){
                    $.ajax({
                        async:false,
                        url:'privilege.php?act=signin&type=password',
                        data:{'username':$('#theForm input[name=username]').val(),'password':$('#theForm input[name=password]').val(),'dsc_token':dsc_token},
                        type:'post',
                        success:function(data){
                            if(data == 'false'){
                                $('#error').html('<span class="error">'+username_password_error+'</span>');
                                $('.code-img img').attr('src','index.php?act=captcha&'+Math.random());
                                username=false;
                                password=false;
                                return false;
                            }
                        }
                    });
                }

                if(captcha && username && password){
                    $('#theForm').submit();
                }else{
                    return false;
                }
            });
			
			$(document).click(function(e){
				if(e.target.name !='captcha' && !$(e.target).parents("div").is(".submitDiv")){
					$('.code').hide();
				}
			});
			
			/* 判断浏览器是ie6 - ie8 后台不可以进入*/
			if(!$.support.leadingWhitespace){
				notIe();
			}
        });	
    </script>
</body>
</html>
