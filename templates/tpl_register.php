<!DOCTYPE html>
<html lang="en-US" class="upscale horizontal-page no-scroll ">
{moj_tag:include file="templates/header.php":moj_tag}

<div id="main" class="site" style="height: 510px; top: 76px; opacity: 1;">
    <div class="slider">
	<div class="slide image-center-center active" id="slide-436" style="background-image: url(templates/img/1440x900-6.png); visibility: visible; opacity: 1;">
        	<article class="info white no-fade style-page-with-background dim-background" style="overflow: hidden; top: 18.2%; left: 48.88%; height: auto;" data-position="custom" data-top="18.2%" data-left="48.88%">
                	<div class="viewport" style="-webkit-transition: -webkit-transform 0ms; transition: -webkit-transform 0ms; -webkit-transform-origin: 0px 0px; -webkit-transform: translate(0px, 0px) translateZ(0px);">
                        	<h1 class="entry-title">Register Doupit.</h1>
					<div class="entry-content">
                                            <form action="register.php" method="post">
                                                Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="input" id="iRegEmail" name="nRegEmail" onChange="return checkUserExist();" /><label id="iValRegUsername"></label><br /><br />
                                                密码:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" id="iRegPassword" name="nRegPassword" /><label id="iValRegPassword"></label><br /><br />
                                                确认密码:&nbsp;&nbsp;&nbsp;<input type="password" id="iRegConfirmPassword" name="nRegConfirmPassword" /><label id="iValRegComfirmPassword"></label><br /><br />
                                                <input class="button button-white" value="注册" type="submit" onClick="return ValRegister();" />
                                            </form>
					</div>
			</div>
		</article>
	</div>
    </div>
</div>
    
{moj_tag:include file="templates/footer.php":moj_tag}