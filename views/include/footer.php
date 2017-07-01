    <script src="views/assets/js/jquery-3.2.0.min.js"></script>
    <script src="views/assets/js/bootstrap.min.js"></script>
    <script src="views/assets/js/parsley/parsley.min.js"></script>
    <script src="views/assets/js/parsley/es.js"></script>
    <script src="views/assets/js/jquery.backstretch.min.js"></script>
    <script src="views/assets/js/move-top.js"></script>
    <script src="views/assets/js/easing.js"></script>
    <script src="views/assets/js/main.js"></script>
    <script type="text/javascript">
    	jQuery(document).ready(function($) {
    		$(".scroll").click(function(event){
    			event.preventDefault();
    			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
    		});
    	});
    </script>
  	<script type="text/javascript">
  		$(document).ready(function() {
  		/*
  			var defaults = {
  			containerID: 'toTop', // fading element id
  			containerHoverID: 'toTopHover', // fading element hover id
  			scrollSpeed: 1200,
  			easingType: 'linear'
  			};
  		*/
  		$().UItoTop({ easingType: 'easeOutQuart' });
  		});
  	</script>
  	<a href="#home" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
  </body>
</html>
