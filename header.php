<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Rugby On TV
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

<script type="text/javascript" src="//cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="masthead" class="site-header" role="banner">
		
		<!-- nav class="top-bar" data-topbar>

			<section class="top-bar-section">

				<ul class="program-menu">
					<li class="name column">Date</li>
					<li class="divider"></li>
					<li class="name column">Time</li>
					<li class="divider"></li>
					<li class="name has-dropdown not-click column">
						<a href="#" class="filter-options">Program</a>
						<ul class="dropdown">
							<li class="has-dropdown not-click">
								<a href="#">Competition</a>
								<ul class="dropdown">
								<?php
									$comp_key = "field_5369dfaafc349";
									$competitions = get_field_object($comp_key);
									$competition_names = get_field($comp_key);
									foreach($competitions['choices'] as $competition_name){
										echo '<li><a href="#">' . $competition_name . '</a></li>';
									}
									wp_reset_postdata();
								?>
								</ul>
							</li>
							<li><a href="#">Documentary</a></li>
							<li><a href="#">TV Show</a></li>
							<li><a href="#">Movie</a></li>
						</ul>
					</li>
					<li class="divider"></li>
					<li class="name column">Description</li>
					<li class="divider"></li>
					<li class="name column">Network</li>
				</ul>

			</section>

		</nav -->
		
	</header><!-- #masthead -->

	<div id="content" class="site-content">
