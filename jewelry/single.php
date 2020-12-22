<?php get_header(); ?>
    <div class='page'>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="post__wrapper">
            <div class='main__image post__logo'>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/branch.png">
            </div>
            <h1 class='title'><?php the_title(); ?></h1>
            <div class="post_img"><?php the_post_thumbnail('large'); ?></div>
            <p class="text__date">
                <?php the_date('j F'); ?>, <?php the_author(); ?>
            </p>
            <div class="description"><?php the_content(); ?></div>
        </div>
        <?php endwhile; endif; ?>
        <div class="reviews">
            <nav id="nav-single">
                <span class="nav-previous"><?php previous_post_link( 'Preview Post <br> %link<p>%link</p>'); ?></span>
                <span class="nav-next"><?php next_post_link ('Next Post <br> %link <p>%link</p>'); ?></span>
            </nav>
            <?php comments_template('/comments.php'); ?>
        </div>
    </div>    
<?php get_footer(); ?>