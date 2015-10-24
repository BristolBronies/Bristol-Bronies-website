<?php
	/*
		Template Name: Page - Staff Listing
	*/
	get_template_part('partials/global/html-header');
	get_template_part('partials/global/header');
?>

<?php 
	if(have_posts()):
		while(have_posts()): the_post(); 
?>

	<main class="body" id="content" role="main">
		<div class="layout">
			<article class="article">
				<header class="article__header">
					<h1 class="article__title"><?php the_title(); ?></h1>
				</header>
				<div class="content article__body">
					<?php the_content(); ?>
				</div>
				<?php 
					$staff = new WP_Query('post_type=meet_runner&posts_per_page=-1&orderby=title&order=ASC');
					if($staff->have_posts()):
				?>
				<div class="template-staff__list">
					<?php 
						while($staff->have_posts()): $staff->the_post();
							if(get_field("runner_staff") == true): 
					?>
						<section class="staff template-staff__item">
							<div class="staff__banner<?php if($banner = bb_profile_banner($runner)): ?> staff__banner--custom<?php endif; ?>" style="background-color: <?php echo bb_generate_colour(get_the_title()); ?>; <?php if($banner = bb_profile_banner($runner)): ?>background-image: url(<?php echo $banner; ?>);<?php endif; ?>"></div>
							<img class="staff__avatar" alt="" src="<?php echo bb_profile_avatar($runner); ?>">
							<div class="staff__body">
								<h1 class="staff__name"><?php echo get_the_title(); ?></h1>
								<div class="content staff__content">
									<?php echo bb_profile_biography($runner); ?>
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
						</section>
					<?php 
							endif;
						endwhile;
					?>
				</div>
			</article>
			<?php
				endif; 
				wp_reset_postdata();
			?>
		</div>
	</main>

<?php
		endwhile;
	endif; 
?>

<?php
	get_template_part('partials/global/footer');
	get_template_part('partials/global/html-footer');
?>