<!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
{moj_tag:include file="templates/header.php":moj_tag}

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
                            <h1 class="widget-title">{moj_tag:$searchword:moj_tag}的搜索结果:{moj_tag:$result_count:moj_tag}条</h1>
                    </aside>
                    
		</div>
            </div>
	</div>
    </div>
    
    <div id="content" class="site-content">
        {moj_tag:section name=n loop=$result:moj_tag}
        {moj_tag:if $smarty.section.n.first:moj_tag}
            <article id="post-198" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
                <div class="entry-summary">
                    <p></p>
                </div>
            </article>
        {moj_tag:/if:moj_tag}
        <article id="post-198" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <div class="text-contents">
                <header class="entry-header">
                        <a href="member.php?profile={moj_tag:$result[n].link:moj_tag}" title="点击查看">{moj_tag:$result[n].title:moj_tag}</a>
		</header>
                <div class="entry-summary">
                    <p>
                        {moj_tag:$result[n].desc:moj_tag}
                    </p>
                </div>
            </div>
	</article>
        {moj_tag:sectionelse:moj_tag}
        <article id="post-298" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <div class="entry-summary">
                <p>无搜索结果</p>
            </div>
        </article>
        {moj_tag:/section:moj_tag}
    </div>
</div>

{moj_tag:include file="templates/footer.php":moj_tag}