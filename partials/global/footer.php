	<footer class="footer" id="footer" role="contentinfo">
		<?php /* <div class="footer__billboards">
			<?php get_template_part('partials/global/billboards'); ?>
		</div>*/ ?>
		<div class="footer__boilerplate">
			<small class="footer__legal">&copy;<?php echo date("Y"); ?> <?php echo get_bloginfo("name"); ?>. All rights reserved. Website designed and developed by <a href="http://greysadventures.com/">Grey's Adventures</a>. <em>My Little Pony: Friendship is Magic</em> is &copy; Hasbro. <?php bloginfo("blogname"); ?> is not affiliated in any way with Hasbro or DHX Media. No copyright infringement intended.</small>
			<?php
				wp_nav_menu(array(
					"theme_location" => "footer",
					"menu_class" => "footer__legal-links",
					"container" => false,
					"items_wrap" => '<ul class="%2$s">%3$s</ul>',
					"walker" => new bb_naked_navigation_walker
				));
			?>
		</div>
	</footer>

