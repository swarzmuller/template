    <?php get_header(); ?>
    <main class='main'>
        <?php if ( have_posts() ) : ?>
        <?php while (have_posts() ) : the_post(); ?>
        <div class='list'>
                <div class='main__image'>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/branch.png">
                </div>
                <div class='post'>
                    <?php the_post_thumbnail('large'); ?>
                </div>
                <div class='text'>
                    <p class="text__date"><?php the_date('j F'); ?>, <?php the_author(); ?></p>
                    <p class="text__head"><?php the_title(); ?></p>
                    <p class="text__descr"><?php the_excerpt_rss(); ?></p>
                    <div class='text__comments'>
                        <?php comments_number('0', '1', '%'); ?>
                        <img class='text__img' src="<?php echo get_template_directory_uri(); ?>/assets/img/comment.png">
                    </div>
                    <a class="text__btn" href="<?php the_permalink(); ?>">Read Post</a>
                </div>
        </div>
        <?php endwhile; ?>
        <?php endif; ?>
        <?php the_posts_pagination(array(
            'prev_text'    => __(''),
            'next_text'    => __(''),
            'prev_next'    => true,
            'screen_reader_text' => ' ',
        )); ?>
    </main>
    <?php get_footer(); ?>
</div>