<?php /* Smarty version Smarty-3.1.16, created on 2014-04-01 23:46:58
         compiled from "F:\Mojito\templates\tpl_login.php" */ ?>
<?php /*%%SmartyHeaderCode:16795339a942da2eb1-78856074%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1278f33166aa9e67adb45898d4a2f269b58c6c7d' => 
    array (
      0 => 'F:\\Mojito\\templates\\tpl_login.php',
      1 => 1396367201,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16795339a942da2eb1-78856074',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5339a9431307d0_74797819',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5339a9431307d0_74797819')) {function content_5339a9431307d0_74797819($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
<?php echo $_smarty_tpl->getSubTemplate ("templates/header.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="main" class="site" style="height: 510px; top: 76px; opacity: 1;">
    <div class="slider">
	<div class="slide image-center-center active" id="slide-436" style="background-image: url(templates/img/1440x900-6.png); visibility: visible; opacity: 1;">
            <article class="info white no-fade style-page-with-background dim-background" style="overflow: hidden; top: 18.2%; left: 48.88%; height: auto;" data-position="custom" data-top="18.2%" data-left="48.88%">
		<div class="viewport" style="-webkit-transition: -webkit-transform 0ms; transition: -webkit-transform 0ms; -webkit-transform-origin: 0px 0px; -webkit-transform: translate(0px, 0px) translateZ(0px);">
                    <h1 class="entry-title">Login Doupit.</h1>
                        <div class="entry-content">
                            <form action="login.php" method="post">
                                Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" id="iLoginEmail" name="nLoginEmail" /><label id="iValLoginName"></label><br /><br />
                                Password:<input type="password" id="iLoginPassword" name="nLoginPassword" /><label id="iValLoginPassword"></label><br /><br />
                                Remember Me&nbsp;&nbsp;&nbsp;<input  type="checkbox" name="rememberMe" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="登录" OnClick="return ValLogin();" />
                            </form>
                        </div>
                </div>
            </article>
	</div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("templates/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
