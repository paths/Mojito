<?php /* Smarty version Smarty-3.1.16, created on 2014-03-25 13:46:51
         compiled from "F:\Mojito\templates\tpl_register.php" */ ?>
<?php /*%%SmartyHeaderCode:29911532dcce7241637-77947743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eda0f024af7bf25f43f80760c5d3ab4d10d933c1' => 
    array (
      0 => 'F:\\Mojito\\templates\\tpl_register.php',
      1 => 1395726021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29911532dcce7241637-77947743',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532dcce7317664_75888563',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532dcce7317664_75888563')) {function content_532dcce7317664_75888563($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page no-scroll ">
<?php echo $_smarty_tpl->getSubTemplate ("templates/header.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="main" class="site" style="height: 510px; top: 76px; opacity: 1;">
    <div class="slider">
	<div class="slide image-center-center active" id="slide-436" style="background-image: url(templates/img/1440x900-6.png); visibility: visible; opacity: 1;">
        	<article class="info white no-fade style-page-with-background dim-background" style="overflow: hidden; top: 18.2%; left: 48.88%; height: auto;" data-position="custom" data-top="18.2%" data-left="48.88%">
                	<div class="viewport" style="-webkit-transition: -webkit-transform 0ms; transition: -webkit-transform 0ms; -webkit-transform-origin: 0px 0px; -webkit-transform: translate(0px, 0px) translateZ(0px);">
                        	<h1 class="entry-title">Register Doupit.</h1>
					<div class="entry-content">
                                            <form action="register.php" method="post">
                                                Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" name="RegEmail" onChange="return checkUserExist();" /><label name="ValRegUsername"></label><br /><br />
                                                密码:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="RegPassword" /><label name="ValRegPassword"></label><br /><br />
                                                确认密码:&nbsp;&nbsp;&nbsp;<input type="password" name="RegConfirmPassword" /><label name="ValRegComfirmPassword"></label><br /><br />
                                                <input class="button button-white" value="注册" type="submit" onClick="return ValRegister();" />
                                            </form>
					</div>
			</div>
		</article>
	</div>
    </div>
</div>
    
<?php echo $_smarty_tpl->getSubTemplate ("templates/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
