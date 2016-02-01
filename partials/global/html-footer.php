	<ul class="accessibility-links">
		<li><a href="#top">Skip to top</a></li>
	</ul>

	<!-- Postload Javascript --> 
	<script type="text/javascript">
		WebFontConfig = {
			typekit: { 
				id: "rvj6shm" 
			},
			custom: { 
				families: [ 'Icons' ], 
				testStrings: {
					'Icons': '\uE036' 
				}
			}
		};
		(function() {
			var wf = document.createElement('script');
			wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
			wf.type = 'text/javascript';
			wf.async = 'true';
			var s = document.getElementsByTagName('script')[0];
			s.parentNode.insertBefore(wf, s);
		})();
	</script>
	<script src="<?php echo get_template_directory_uri(); ?>/dst/js/vendor.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/dst/js/scripts.js"></script>

	<!-- Google Analytics -->
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-34034973-1', 'auto');
		ga('send', 'pageview');
	</script>

</body>
</html>