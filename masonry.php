<?php
$featured_posts = new WP_Query(array(
	'cat'=>'featured',
	'posts_per_page'=>5,
));
$sizes = array('2x2', '1x1', '2x1', '2x1', '1x1',);
?>
<div class="featured-masonry">
	<ul>
		<?php $i = 0; while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>

			<li class="masonry-item">
				<?php the_post_thumbnail('masonry_' . $sizes[$i % count($sizes)]); ?>
			</li>

		<?php $i ++; endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
</div>