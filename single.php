<?php get_header(); ?>


<div class="row">
    <div class="col-md-12">
        <div class="featured-blogs">
            <img class="img-responsive center-block" src="<?php bloginfo('stylesheet_directory');?>/images/featured_post_placeholder.jpg" alt="featured posts ticksense">
        </div>
    </div>
</div>


    <div class="row">

        <div class="col-md-8">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div class="title">
                <img class="blog-image" src="<?php bloginfo('stylesheet_directory');?>/images/blog_post_logo.png">
                <h1 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            </div>
            <p>
                By <?php the_author(); ?>
                on <?php echo the_time('l, F jS, Y');?>
                in <?php the_category( ', ' ); ?>.
                <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
            </p>
            <p><?php the_content(); ?><p>
            <hr>
            <?php comments_template(); ?>

        <?php endwhile; else: ?>

                <div class="page-header">
                    <h1>Oh no!</h1>
                </div>

                <p>No content is appearing on this page!</p>

        <?php endif; ?>

        </div> <!-- col-md-8 end -->

        <div class="col-md-4">
            <?php get_sidebar( 'blog' ); ?>
        </div> <!--col-md-4 end -->

        </div> <!-- row end -->

<?php get_footer(); ?>