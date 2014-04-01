<?php /* Smarty version Smarty-3.1.16, created on 2014-03-31 22:06:48
         compiled from "F:\Mojito\templates\tpl_search.php" */ ?>
<?php /*%%SmartyHeaderCode:21383533976784d4596-18513876%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5a4d42ad392cfed0ff377ccf2409a0c250f1b5e' => 
    array (
      0 => 'F:\\Mojito\\templates\\tpl_search.php',
      1 => 1396109833,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21383533976784d4596-18513876',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'searchword' => 0,
    'result_count' => 0,
    'result' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53397678636077_92402989',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53397678636077_92402989')) {function content_53397678636077_92402989($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
<?php echo $_smarty_tpl->getSubTemplate ("templates/header.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="main" class="site site-with-sidebar" style="height: 778px; top: 76px; opacity: 0.9;">
    <div class="sidebar sidebar-general widget-area">
        <div class="scroll-container">
            <div class="scrollbar disable" style="height: 778px;">
		<div class="track" style="height: 778px;">
                    <div class="thumb" style="top: 0px; height: 778px;">
			<div class="end"></div>
                    </div>
		</div>
            </div>
            <div class="viewport">
                <div class="overview" style="top: 0px;">
                    <aside id="text-2" class="widget widget_text">
			<div class="decoration"></div>
			<h1 class="widget-title">搜索</h1>
			
                    </aside>
                    <aside id="categories-2" class="widget widget_categories">
			<div class="decoration"></div>
                            <h1 class="widget-title"><?php echo $_smarty_tpl->tpl_vars['searchword']->value;?>
的搜索结果:<?php echo $_smarty_tpl->tpl_vars['result_count']->value;?>
条</h1>
                    </aside>
                    
		</div>
            </div>
	</div>
    </div>
    
    <div id="content" class="site-content">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['result']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['n']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['n']['total']);
?>
        <?php if ($_smarty_tpl->getVariable('smarty')->value['section']['n']['first']) {?>
            <article id="post-198" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
                <div class="entry-summary">
                    <p></p>
                </div>
            </article>
        <?php }?>
        <article id="post-198" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <div class="text-contents">
                <header class="entry-header">
                        <a href="member.php?profile=<?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['link'];?>
" title="点击查看"><?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['title'];?>
</a>
		</header>
                <div class="entry-summary">
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['result']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['desc'];?>

                    </p>
                </div>
            </div>
	</article>
        <?php endfor; else: ?>
        <article id="post-298" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <div class="entry-summary">
                <p>无搜索结果</p>
            </div>
        </article>
        <?php endif; ?>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("templates/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
