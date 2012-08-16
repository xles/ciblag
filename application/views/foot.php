			<hr>

			<footer>
				<p id="copyright">
					Powered by <a href="http://codeigniter.com/">CodeIgniter</a> &reg;.
					Built with <a href="http://twitter.github.com/bootstrap/" target="_blank">Twitter Bootstrap</a>. 
					Icons from <a href="http://glyphicons.com/" target="_blank">Glyphicons Free</a>.<br>
					Copyright <a href="http://web.mirakulix.org/">mirakulix.org</a> &copy; 2005-2012.
				</p>
			</footer>

		</div> <!-- /container -->
		<div id="pi"><a href="<?php echo base_url(); ?>pi">&Pi;</a></div>
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js"></script>

	<script src="<?php echo base_url(); ?>assets/js/less.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.timeago.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-transition.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-alert.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-modal.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-dropdown.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-scrollspy.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-tab.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-tooltip.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-popover.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-button.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-collapse.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-carousel.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-typeahead.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>

	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "ur-1c1a862b-394a-bfda-3aa8-18ffe8c1ed42"}); </script>

	<script>
	!function (d,s,id) {
		var js,fjs=d.getElementsByTagName(s)[0];
		if (!d.getElementById(id)){
			js=d.createElement(s);
			js.id=id;
			js.src="//platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
		}
	} (document, "script", "twitter-wjs");
	</script>

	<script>
	$('#pubdate').datepicker( {
		format: 'yyyy-mm-dd'
	});
	jQuery(document).ready(function() {
		jQuery("time.timeago").timeago();
	});
	(function() {
		var po = document.createElement('script'); 
		po.type = 'text/javascript'; 
		po.async = true;
		po.src = 'https://apis.google.com/js/plusone.js';
		var s = document.getElementsByTagName('script')[0]; 
		s.parentNode.insertBefore(po, s);
	})();
	</script>

</body>
</html>
