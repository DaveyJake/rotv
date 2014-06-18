<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Rugby On TV
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script>
	$('body:not(.mobile)').flowtype({
		minimum   : 641,
		maximum   : 1919,
		minFont   : 10,
		maxFont   : 18,
		fontRatio : 75
	});

	$('body.mobile').flowtype({
		minimum   : 320,
		maximum   : 640,
		minFont   : 14,
		maxFont   : 20,
		fontRatio : 90
	});

	$(document).ready(function(){
		$('#rotv-schedule').dataTable({
			paging: false
		});
	});
</script>

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

</body>
</html>
