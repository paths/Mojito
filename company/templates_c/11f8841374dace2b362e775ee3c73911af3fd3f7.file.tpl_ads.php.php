<?php /* Smarty version Smarty-3.1.16, created on 2014-04-01 01:59:02
         compiled from "F:\Mojito\company\templates\tpl_ads.php" */ ?>
<?php /*%%SmartyHeaderCode:402053396384267441-54113089%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11f8841374dace2b362e775ee3c73911af3fd3f7' => 
    array (
      0 => 'F:\\Mojito\\company\\templates\\tpl_ads.php',
      1 => 1396288737,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '402053396384267441-54113089',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_53396384750e30_54655194',
  'variables' => 
  array (
    'right1' => 0,
    'ad_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53396384750e30_54655194')) {function content_53396384750e30_54655194($_smarty_tpl) {?><!DOCTYPE html>
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
			<h1 class="widget-title"><?php echo $_smarty_tpl->tpl_vars['right1']->value;?>
</h1>
			
                    </aside>
                    <aside id="categories-2" class="widget widget_categories">
			<div class="decoration"></div>
                            <h1 class="widget-title">在Doupit创建广告</h1>
                            <ul>
				<li class="cat-item cat-item-23">
                                    <a href="#" title="如何创建广告">如何创建</a>
				</li>
				<li class="cat-item cat-item-30">
                                    <a href="#" title="广告政策">广告政策</a>
				</li>
				<li class="cat-item cat-item-12">
                                    <a href="#" title="广告费用">广告费用</a>
				</li>
                                <li class="cat-item cat-item-05">
                                    <a href="#" title="热门问题">Q & A</a>
				</li>
                            </ul>
                    </aside>
                    
		</div>
            </div>
	</div>
    </div>
    
    <div id="content" class="site-content">
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['n'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['n']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['name'] = 'n';
$_smarty_tpl->tpl_vars['smarty']->value['section']['n']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ad_list']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                        <a href="detail.php?id=<?php echo $_smarty_tpl->tpl_vars['ad_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['link'];?>
" title="点击查看"><?php echo $_smarty_tpl->tpl_vars['ad_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['title'];?>
</a>
		</header>
                <div class="entry-summary">
                    <p>
                        <?php echo $_smarty_tpl->tpl_vars['ad_list']->value[$_smarty_tpl->getVariable('smarty')->value['section']['n']['index']]['desc'];?>

                    </p>
                </div>
            </div>
	</article>
        <?php endfor; else: ?>
        <article id="post-298" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <div class="entry-summary">
                <p>暂无广告</p>
            </div>
        </article>
        <?php endif; ?>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("templates/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
