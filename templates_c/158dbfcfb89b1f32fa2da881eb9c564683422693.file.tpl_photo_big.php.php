<?php /* Smarty version Smarty-3.1.16, created on 2014-03-25 19:41:00
         compiled from "F:\Mojito\templates\tpl_photo_big.php" */ ?>
<?php /*%%SmartyHeaderCode:235533147002c7012-19221130%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '158dbfcfb89b1f32fa2da881eb9c564683422693' => 
    array (
      0 => 'F:\\Mojito\\templates\\tpl_photo_big.php',
      1 => 1395747649,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '235533147002c7012-19221130',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53314700370af1_33413972',
  'variables' => 
  array (
    'img' => 0,
    'ads' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53314700370af1_33413972')) {function content_53314700370af1_33413972($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
<?php echo $_smarty_tpl->getSubTemplate ("templates/header.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="main" class="site" style="height: 510px; top: 76px; opacity: 1;">

    <div class="slider">
        <div class="slide image-center-center active" id="slide-436" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['img']->value;?>
); visibility: visible; opacity: 1;">
		<?php echo $_smarty_tpl->tpl_vars['ads']->value;?>

	</div>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("templates/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
