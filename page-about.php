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
		<div class="template-about__media">
			<video class="template-about__media__video" width="720" height="480" autoplay loop>
				<source src="<?php echo get_template_directory_uri(); ?>/dst/video/rainbowrocks.mp4" type="video/mp4">
				<source src="<?php echo get_template_directory_uri(); ?>/dst/video/rainbowrocks.webm" type="video/webm">
				<source src="<?php echo get_template_directory_uri(); ?>/dst/video/rainbowrocks.ogv" type="video/ogg">
			</video>
		</div>
		<section class="template-about__stats">
			<div class="template-about__stats__inner">
				<div class="template-about__stats__title">
					<?php bloginfo("name"); ?> so far&hellip;
				</div>
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
		<?php while ( have_posts() ) : the_post(); ?>
		<section class="template-about__intro">
			<div class="layout">
				<div class="content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
		<?php endwhile; ?>
		<?php 
			$staff = new WP_Query('post_type=meet_runner&posts_per_page=-1&orderby=title&order=ASC');
			if($staff->have_posts()):
		?>
		<section class="template-about__staff">
			<?php 
				while($staff->have_posts()): $staff->the_post();
					if(get_field("runner_staff") == true): 
			?>
						<article class="staff template-about__staff__item">
							<div class="staff__banner<?php if($banner = bb_profile_banner()): ?> staff__banner--custom<?php endif; ?>" style="background-color: <?php echo bb_generate_colour(get_the_title()); ?>; <?php if($banner = bb_profile_banner()): ?>background-image: url(<?php echo $banner; ?>);<?php endif; ?>"></div>
							<img class="staff__avatar" alt="" src="<?php echo bb_profile_avatar(); ?>">
							<div class="staff__body">
								<h1 class="staff__name"><?php echo get_the_title(); ?></h1>
								<div class="content staff__content">
									<?php echo bb_profile_biography(); ?>
									<ul class="staff__social-links">
										<?php if($link = bb_custom_field("runner_twitter", $runner)): ?>
										<li class="staff__item">
											<a class="staff__link" href="https://twitter.com/<?php echo $link; ?>">
												<span class="icon icon--social-twitter staff__icon"></span>
												@<?php echo $link; ?>
											</a>
										</li>
										<?php endif; ?>
										<?php if($link = bb_custom_field("runner_facebook", $runner)): ?>
										<li class="staff__item">
											<a class="staff__link" href="https://facebook.com/<?php echo $link; ?>">
												<span class="icon icon--social-facebook staff__icon"></span>
												/<?php echo $link; ?>
											</a>
										</li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</article>
			<?php 
					endif;
				endwhile;
			?>
		</section>
		<?php
			endif; 
			wp_reset_postdata();
		?>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>