<?php
/*
Template Name: Schedule
*/
get_header(); ?>

<?php

$args = array(
	'post_type'			=>	'program',
	'posts_per_page'	=>	-1,
	'order_by'			=>	the_field('date_picker'),
	'order'				=>	'DES'
);

?>

	<div class="rugby-programs no-bullet">
	
		<div class="program-list">
			<section class="program-listings">
				<table id="rotv-schedule" class="dataTable">
					
					<thead class="program-menu top-bar-section" data-topbar>
						<tr>
							<th class="date" rowspan="1" colspan="1">Date</th>
							<th class="time" rowspan="1" colspan="1">Time</th>
							<th class="program" rowspan="1" colspan="1">Program</th>
							<th class="description" rowspan="1" colspan="1">Description</th>
							<th class="network" rowspan="1" colspan="1">Network</th>
						</tr>
					</thead>

					<?php $loop = new WP_Query($args);
					while($loop->have_posts()) : $loop->the_post(); ?>

					<tr class="program-wrapper">
					
						<td class="date">
							<?php
								date_default_timezone_set('UTC-4');
								$date = get_field('date_picker');
								//echo $date;
								
								$y = substr($date, 0, 4);
								$m = substr($date, 4, 2);
								$d = substr($date, 6, 2);
								$mons = array( 01 => 'Jan', 02 => 'Feb', 03 => 'Mar', 04 => 'Apr', 05 => 'May', 06 => 'Jun', 07 => 'Jul', 08 => 'Aug', 09 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec' );
								$month = $date[$m];
								$month_name = $mons[$month];
								if(substr($d, 0, 1) == '0'){
									$d = substr($d, 1, 1);
									echo $month_name . ' ' . $d;
								} elseif($m == '08') {
									echo 'Aug' . ' ' . $d;
								} else {
									echo $month_name . ' ' . $d;
								}							
							?>
						</td>

						<td class="time <?php echo get_field('live'); ?>"><?php $time = get_field('time'); $ampm = substr($time, -2, 2); if(substr($time, -6, 4) == ':00 ' && $ampm){ $time = preg_replace('/[:00]{3}\s[A-Z]{2}/', '', $time.strtolower($ampm)); echo $time; } else { $time = preg_replace('/\s[A-Z]{2}/', '', $time.strtolower($ampm)); echo $time; } ?></td>
						
						<td class="program <?php echo get_field('program_type'); ?>">
							<?php
								if(get_field('program_type') == "competition"){
									$comp_field = get_field_object('competition');
									$comp_value = get_field('competition');
									$comp_label = $comp_field['choices'][$comp_value];
									echo $comp_label;
								}
								else {
									$prog_field = get_field_object('program_type');
									$prog_value = get_field('program_type');
									$prog_label = $prog_field['choices'][$prog_value];
									echo $prog_label;
								}
							?>
						</td>
						
						<td class="program-description program-title">
						<?php
							the_title();
							$trailer = get_field('trailer');
							if($trailer){
								echo '<span class="trailer"> · <a href="' . $trailer . '">Watch Trailer</a></span>'; 
							}
						?>
						</td>
						
						<td class="network">
							<?php
								$network_list = get_field_object('network');
								$network_names = get_field('network');
								$network = $network_list['choices'][$network_names];
								echo $network;

							?>
						</td>

					</tr>
				
					<?php endwhile; wp_reset_postdata(); ?>

				</table>

			</section>
		</div>

	</div>

<?php get_footer(); ?>