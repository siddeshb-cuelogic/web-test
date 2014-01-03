  <?php 
   include("includes/config.php"); 
   include("includes/functions.php");
   include("tpl/header.php");
  ?>
  <!-- Wrapper start -->
  <div class="container"> 
    <!-- Begin page maincontent -->
    <?php
	 	include("tpl/$strAction.php");
	 ?>
    <!-- Wrapper End -->
    <div class="clearfix"></div>
    <!--Footer Start-->
    <?php 
	 	include("tpl/footer.php");
	 ?>
    <!--Footer End--> 
  </div>
  <!-- End page maincontent --> 
  
</div>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="http://code.jquery.com/jquery.js"></script> 
<script type="text/javascript" src="js/jquery.validate.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script language="javascript" type="text/javascript">
$(document).ready(function()
		{
			$(".navbar-nav li").hover(function(){
				$(this).find(".submenu").fadeIn();
			}, function(){
				$(this).find(".submenu").fadeOut();	
			});
			
			$("ul.nav li").hover(function(){
				$(this).find(".dropdown-menu").show();
			}, function(){
				$(this).find(".dropdown-menu").hide();
			});	
			
			$(window).scroll(function(){
				if ($(this).scrollTop() > 100) {
					$('.scroll_top').fadeIn();
					$(".header-fixed").addClass("header-shadow");
				} else {
					$('.scroll_top').fadeOut();
					$(".header-fixed").removeClass("header-shadow");
				}
        	});
			
			$('.scroll_top').click(function(){
				$("html, body").animate({ scrollTop: 0 }, 600);
				return false;
        	});
				
			
});			
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
  ga('create', 'UA-44331190-2', 'cuelogic.com');
  ga('send', 'pageview');
 
</script>
<?php include("includes/jsincluder.php"); ?>
</body>
</html>