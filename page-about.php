<?php
	/*
		Template Name: Page - About
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');

	$all_meets = new WP_Query("post_type=meet&posts_per_page=-1");
	$meet_count = $all_meets->found_posts;

	$meet_length = 0;
	while($all_meets->have_posts()) {
		$all_meets->the_post();
		$start = get_field("meet_start_time");
		$end = get_field("meet_end_time");
		$meet_length += ($end - $start);
	}
	$meet_length = round($meet_length / 60 / 60);

?>

	<main class="body" id="content" role="main">
		<?php 
			while ( have_posts() ) : the_post(); 
		?>
		<div class="template-about__media">
			
			<?php 
				if(has_post_thumbnail()):
					$image_url[0] = wp_get_attachment_image_src(get_post_thumbnail_id(), "medium")[0];
					$image_url[1] = wp_get_attachment_image_src(get_post_thumbnail_id(), "large")[0];
			?>
			<picture class="template-about__media__image">
				<!--[if IE 9]><video style="display:none;"><[endif]-->
				<source srcset="<?php echo $image_url[0]; ?>" media="(max-width: 599px)">
				<source srcset="<?php echo $image_url[1]; ?>" media="(min-width: 600px)">
				<!--[if IE 9]></video><![endif]-->
				<img srcset="<?php echo $image_url[1] ?>" alt="">
			</picture>
			<?php 
				else:
			?>
			<video class="template-about__media__video" width="720" height="480" autoplay loop>
				<source src="<?php echo get_template_directory_uri(); ?>/dst/video/rainbowrocks.mp4" type="video/mp4">
				<source src="<?php echo get_template_directory_uri(); ?>/dst/video/rainbowrocks.webm" type="video/webm">
				<source src="<?php echo get_template_directory_uri(); ?>/dst/video/rainbowrocks.ogv" type="video/ogg">
			</video>
			<?php
				endif;
			?>
		</div>
		<section class="template-about__stats">
			<div class="template-about__stats__inner">
				<div class="stat template-about__stats__item">
					<div class="stat__value"><?php echo $meet_count; ?></div>
					<div class="stat__label">events</div>
				</div>
				<div class="stat template-about__stats__item">
					<div class="stat__value"><?php echo $meet_length; ?></div>
					<div class="stat__label">hours</div>
				</div>
				<div class="stat template-about__stats__item">
					<div class="stat__value">200+</div>
					<div class="stat__label">attendees</div>
				</div>
			</div>
		</section>
		<section class="template-about__intro">
			<div class="layout">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
		<?php 
			endwhile; 
		?>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>