<?php /* Smarty version Smarty-3.1.16, created on 2014-03-31 22:05:57
         compiled from "F:\Mojito\templates\tpl_index.php" */ ?>
<?php /*%%SmartyHeaderCode:1124953397645e6b559-35720417%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '360bb8fd0a4fe328ece20ba74063dd413c7d3dc5' => 
    array (
      0 => 'F:\\Mojito\\templates\\tpl_index.php',
      1 => 1395924074,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1124953397645e6b559-35720417',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'photos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_5339764656da59_44553209',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5339764656da59_44553209')) {function content_5339764656da59_44553209($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
<?php echo $_smarty_tpl->getSubTemplate ("templates/header.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="main" class="site" style="height: 510px; top: 76px; opacity: 1;">
    
    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['photos']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['name'] = 'idx';
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['idx']['total']);
?>
    <article class="grid-project" style="top: <?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['top'];?>
px; left: <?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['left'];?>
px; width: <?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['width'];?>
px; height: <?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['height'];?>
px;">
        <a href="<?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['link'];?>
" class="preview" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['thumbnails'];?>
);">
            <span class="hover-box">
                <span class="inner" style="-webkit-transform: translate(0px, -50%);">
                    <b><?php echo $_smarty_tpl->tpl_vars['photos']->value[$_smarty_tpl->getVariable('smarty')->value['section']['idx']['index']]['title'];?>
</b>
                </span>
            </span>
        </a>
    </article>
    <?php endfor; else: ?>
    <div class="slider" data-animation="slide">
        <article class="slide image-center-center active" id="slide-5585" data-image="templates/img/iceland.jpg" style="background-image: url(templates/img/alt.jpg); visibility: visible; opacity: 1;">
            <div class="info style-default white" style="overflow: hidden; top: 274px; left: 574px; height: auto;" data-position="center">
            </div>
        </article>
    </div>
    <?php endif; ?>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("templates/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
