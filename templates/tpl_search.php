<!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
{moj_tag:include file="templates/header.php":moj_tag}

<div id="main" class="site site-with-sidebar">
    <div id="content" class="site-content">
        {moj_tag:section loop=$result name=idx:moj_tag}
        <article id="post-198" class="post-198 post type-post status-publish format-standard hentry category-blog-features tag-features tag-sample-content post-with-media post-with-featured-image">
            <div class="text-contents">
		<header class="entry-header">
			<h1 class="entry-title">
                            {moj_tag:$result[idx].title:moj_tag}
			</h1>
		</header>
                <div class="entry-summary">
                    <p>
                        {moj_tag:$result[idx].desc:moj_tag}
                    </p>
                    <div class="wrap-excerpt-more">
                    </div>
		</div>
            </div>
	</article>
        {moj_tag:sectionelse:moj_tag}
        <article>无搜索结果</article>
        {moj_tag:/section:moj_tag}
    </div>
</div>

{moj_tag:include file="templates/footer.php":moj_tag}