<?php
	/*
		Template Name: Page - Home
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
	if(have_posts()):
		while(have_posts()): the_post(); 
			$home_blurb = get_the_content();
		endwhile;
	endif; 
	$meet_query_args = array(
		"post_type" => "meet",
		"orderby" => "meta_value_num",
		"order" => "ASC",
		"posts_per_page" => "3",
		"meta_key" => "meet_start_time",
		"meta_compare" => ">",
		"meta_value" => time()
	);
	$meet_query = new WP_Query($meet_query_args);
?>

	<main class="body" id="content" role="main">
		<?php 
			if($meet_query->have_posts()): 
		?>
		<div class="meet-grid meet-grid--homepage meet-grid--items-<?php echo $meet_query->post_count; ?> template-homepage__meet-grid">
			<div class="layout">
				<?php
					$index = 0;
					while($meet_query->have_posts()): $meet_query->the_post();
						if(has_post_thumbnail()):
							$image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), "full");
							$image_url = $image_url[0];
						else: 
							$image_url = false;
						endif; 
				?>
				<article class="meet-grid__item" style="background-color: <?php echo bb_generate_colour(get_the_title()); ?>">
					<a class="meet-grid__link" href="<?php the_permalink(); ?>">
						<?php if($image_url): ?>
							<div class="meet-grid__image">
								<picture>
									<img srcset="<?php echo $image_url; ?>" alt="">
								</picture>
							</div>
						<?php endif; ?>
						<div class="meet-grid__body">
							<h1 class="meet-grid__title"><?php the_title(); ?></h1>
							<span class="meet-grid__date"><?php echo bb_meet_dates(bb_custom_field('meet_start_time')); ?></span>
						</div>
					</a>
				</article>
				<?php
					endwhile;
				?>
			</div>
		</div>
		<?php 
			else:
				$custom_image_url = get_theme_mod("bb_homepage_banner_image");
		?>
			<div class="banner template-homepage__banner">
				<div class="banner__image">
					<picture>
						<img srcset="<?php echo $custom_image_url; ?>" alt="">
					</picture>
				</div>
			</div>
		<?php 
			endif; 
		?>
		<div class="content template-homepage__intro">
			<p><?php echo $home_blurb; ?></p>
		</div>
		<div class="template-homepage__social-feed">
			<div class="layout">
				<?php bb_social_feed("severnbronies", "443693042356765", 8); ?>
			</div>
		</div>
	</main>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>