
	<style type="text/css">
		.sidebarTitle {
			background-color: #1d5b79;
			text-align: center;
			padding: 5px;
			color: #fff;
		}

		.center {
			text-align: center;
		}
	</style>

	<?php if ( ! dynamic_sidebar( 'blog') ): ?>

		<h3 class='sidebarTitle'>Categories</h3>	
	<?php	
		$args = array(
		  'orderby' => 'name',
		  'order' => 'ASC'
		  );
		$categories = get_categories($args);
		  foreach($categories as $category) { 
		    echo '<p class="center"><a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf( __( "View all posts in %s" ), $category->name ) . '" ' . '>' . $category->name.'('.$category->count.') </a></p> ';}
		    // echo '<p> Description:'. $category->description . '</p>';
		    // echo '<p> Post Count: '. $category->count . '</p>';  } 
	?>	

 
		<h3 class='sidebarTitle'>Twitter Feed</h3>
		<p><a class="twitter-timeline" href="https://twitter.com/TickSense_" data-widget-id="601097397859549185">Tweets by @TickSense_</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>
		

	<?php endif; ?>

