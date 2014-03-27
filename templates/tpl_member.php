<!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
{moj_tag:include file="templates/header.php":moj_tag}

<div id="main" class="site site-with-sidebar">
    <div id="content" class="site-content">
        {moj_tag:section loop=$issue name=idx:moj_tag}
        <article id="post-198" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <a class="thumbnail" href="photo.php?id={moj_tag:$issue[idx].phid:moj_tag}" title="查看大图">
            <img src="{moj_tag:$issue[idx].path:moj_tag}" class="resizable" width="583" height="328" alt=""></a>
            <div class="text-contents">
		<header class="entry-header">
			<h1 class="entry-title">
                            {moj_tag:$issue[idx].title:moj_tag}
			</h1>
		</header>
		<div class="entry-summary">
                    <p>
                        {moj_tag:$issue[idx].desc:moj_tag}
                    </p>
                    <div class="wrap-excerpt-more">
                    </div>
		</div>
            </div>
	</article>
        {moj_tag:sectionelse:moj_tag}
        <article>暂无图片，点此上传</article>
        {moj_tag:/section:moj_tag}
        
    </div>

    <div class="sidebar sidebar-general widget-area" style="height: 1851px;">
        <div class="scroll-container">
	<div class="scrollbar" style="height: 465px;">
            <div class="track" style="height: 465px;">
		<div class="thumb">
                    <div class="end"></div>
                </div>
            </div>
	</div>
        <div class="viewport">
		<div class="overview">
                    <aside id="text-2" class="widget widget_text">
                            <div class="decoration"></div>
                            <h1 class="widget-title">{moj_tag:$nickname:moj_tag}</h1>
                    </aside>
                    <aside id="categories-2" class="widget widget_categories">
			<div class="decoration"></div>
			<h1 class="widget-title">Categories</h1>
			<ul>
                            <li class="cat-item cat-item-21">
				<a href="#" title="查看相关图片">图片</a>
                            </li>
                            <li class="cat-item cat-item-30">
				<a href="#" title="查看您的相关活动">活动</a>
                            </li>
                            <li class="cat-item cat-item-35">
				<a href="#" title="查看您的个人资料">个人资料</a>
                            </li>
                            <li class="cat-item cat-item-40">
				<a href="#" title="查看您的个人账户">账户</a>
                            </li>
                            <li class="cat-item cat-item-48">
				<a href="#" title="关于您的消息">消息</a>
                            </li>
			</ul>
                    </aside>
                    <aside id="archives-5" class="widget widget_archive">
			<div class="decoration"></div>
                    </aside>
		</div>
            </div>
    </div>
    </div>
</div>

<div id="footer-push"></div>

{moj_tag:include file="templates/footer.php":moj_tag}