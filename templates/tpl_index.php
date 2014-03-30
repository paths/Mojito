<!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page ">
{moj_tag:include file="templates/header.php":moj_tag}

<div id="main" class="site" style="height: 510px; top: 76px; opacity: 1;">
    
    {moj_tag:section loop=$photos name=idx:moj_tag}
    <article class="grid-project" style="top: {moj_tag:$photos[idx].top:moj_tag}px; left: {moj_tag:$photos[idx].left:moj_tag}px; width: {moj_tag:$photos[idx].width:moj_tag}px; height: {moj_tag:$photos[idx].height:moj_tag}px;">
        <a href="{moj_tag:$photos[idx].link:moj_tag}" class="preview" style="background-image: url({moj_tag:$photos[idx].thumbnails:moj_tag});">
            <span class="hover-box">
                <span class="inner" style="-webkit-transform: translate(0px, -50%);">
                    <b>{moj_tag:$photos[idx].title:moj_tag}</b>
                </span>
            </span>
        </a>
    </article>
    {moj_tag:sectionelse:moj_tag}
    <div class="slider" data-animation="slide">
        <article class="slide image-center-center active" id="slide-5585" data-image="templates/img/iceland.jpg" style="background-image: url(templates/img/alt.jpg); visibility: visible; opacity: 1;">
            <div class="info style-default white" style="overflow: hidden; top: 274px; left: 574px; height: auto;" data-position="center">
            </div>
        </article>
    </div>
    {moj_tag:/section:moj_tag}
</div>

{moj_tag:include file="templates/footer.php":moj_tag}