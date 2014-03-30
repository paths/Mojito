<?php /* Smarty version Smarty-3.1.16, created on 2014-03-29 16:27:35
         compiled from "F:\Mojito\templates\tpl_member.php" */ ?>
<?php /*%%SmartyHeaderCode:26905532dc050a16e02-54191078%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9682b5824a45b8652a9ce43be3b05aeee4cb8a1a' => 
    array (
      0 => 'F:\\Mojito\\templates\\tpl_member.php',
      1 => 1396071977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26905532dc050a16e02-54191078',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.16',
  'unifunc' => 'content_532dc050abcff1_87189162',
  'variables' => 
  array (
    'right1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532dc050abcff1_87189162')) {function content_532dc050abcff1_87189162($_smarty_tpl) {?><!DOCTYPE html>
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
                            <h1 class="widget-title">欢迎使用Doupit</h1>
                            <ul>
				<li class="cat-item cat-item-23">
                                    <a href="#" title="查看您的图片">您的图片</a>
				</li>
				<li class="cat-item cat-item-30">
                                    <a href="#" title="编辑您的图片，获取广告收入">编辑图片</a>
				</li>
				<li class="cat-item cat-item-12">
                                    <a href="#" title="查看您的广告收入">广告收入</a>
				</li>
                            </ul>
                    </aside>
                    
		</div>
            </div>
	</div>
    </div>
    
    <div id="content" class="site-content">
        <article id="post-198" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <a class="thumbnail" href="templates/img/alt.jpg" title="查看图片">
                <img src="templates/img/alt.jpg" class="resizable" width="583" height="328" alt=""></a>
            <div class="text-contents">
                <header class="entry-header">
                        <a href="#" title="点击查看">标题</a>
		</header>
                <div class="entry-summary">
                    <p>
                        Fluxus blog posts comes with big images and nicely crafted typography. Check out this one as an example.
                    </p>
                    <div class="wrap-excerpt-more">
                        <a class="excerpt-more" href="#">更多</a>
                    </div>
                </div>
            </div>
	</article>
    </div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("templates/footer.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
