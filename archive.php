<?php get_header(); ?>

    <?php get_template_part('masonry'); ?>
    <div class='spacer'>&nbsp;</div>

    <div class="row">
        <div class="col-md-8">

            <div class="page-header" style='margin: 0px 0px 20px'>
              <h1><?php wp_title(''); ?> Blog Posts</h1>
            </div>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article class="post">

                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <em><p>
                    By <?php the_author(); ?>
                    on <?php echo the_time('l, F jS, Y');?>
                    in <?php the_category( ', ' ); ?>.
                    <a href="<?php comments_link(); ?>"><?php comments_number(); ?></a>
            </p></em>

                <?php the_excerpt(); ?>
                    <hr>
            </article>


        <?php endwhile; else: ?>

            <div class="page-header">
                <h1>Oh no!</h1>
            </div>

            <p>No content is appearing on this page!</p>

        <?php endif; ?>

    </div>

    <div class="col-md-4" style='margin-top: 20px;'>

    <?php get_sidebar( 'blog' ); ?>

    </div>

    </div>

<?php get_footer(); ?>