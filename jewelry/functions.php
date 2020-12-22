<?php 

    register_nav_menu('header_menu', 'Top Menu');
    register_nav_menu('footer_menu', 'Bottom Menu');
    add_theme_support('post-thumbnails' );

    function jewelry_scripts() {
        wp_enqueue_style( 'jewelry-style', get_stylesheet_uri(), array());
        wp_style_add_data( 'jewelry-style', 'rtl', 'replace' );
    
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
            wp_enqueue_script( 'comment-reply' );
        }
    }
    add_action( 'wp_enqueue_scripts', 'jewelry_scripts' );

    add_theme_support( 'title-tag' );

    add_theme_support(
        'custom-background',
        apply_filters(
            'jewelry_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );
    
     //ADD CLASS FOR TABLE IN THE POST******************/

    function first_table($content){
        return preg_replace('/<table([^>]+)?>/', '<table$1 class="table">', $content, 1);
    }
    add_filter('the_content', 'first_table');

    add_filter('comment_form_default_fields', 'sheens_unset_url_field');
        function sheens_unset_url_field ( $fields ) {
            if ( isset($fields['url'] ))
                unset ( $fields['url'] );

        return $fields;
    }

    //CUSTOMIZE POST COMMENT******************/
    function mytheme_comment($comment, $args, $depth) {
        if ( 'div' === $args['style'] ) {
            $tag       = 'div';
            $add_below = 'comment';
        } else {
            $tag       = 'li';
            $add_below = 'div-comment';
        }?>
        <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
        <?php 
            if ( 'div' != $args['style'] ) { ?>
            <div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
        } ?>
            <div class="comment-author vcard"><?php 
                if ( $args['avatar_size'] != 0 ) {
                    echo get_avatar( $comment, $args['avatar_size'] ); 
                }  ?>
            </div>
            <?php 
            if ( $comment->comment_approved == '0' ) { ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/><?php 
            } ?>
            <div class="comment-meta commentmetadata">
                <div class='author__container'>
                    <?php  printf( __( '<p class="fn">%s</p> <span class="says"> &#8212 </span>' ), get_comment_author_link() ); ?>
                        <div class="reply"><?php 
                            comment_reply_link( 
                                array_merge( 
                                    $args, 
                                    array( 
                                        'add_below' => $add_below, 
                                        'depth'     => $depth, 
                                        'reply_text' => "Reply",
                                        'max_depth' => $args['max_depth'] ,
                                        
                                    ) 
                                ) 
                            ); ?>
                    </div>
                </div>
                <p class='comment__date'>
                    <?php
                        printf( 
                            __('%1$s at %2$s'), 
                            get_comment_date('j F, Y'),  
                            get_comment_time() 
                        ); ?>
                </p>
                <?php 
                    edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
                <div class='comment__text'>
                    <?php comment_text(); ?>
                </div>
            </div>
            <?php 
        if ( 'div' != $args['style'] ) : ?>
            </div><?php 
        endif;
    }

        //CUSTOMIZE COMMENT FORM******************/

    // Unset URL from comment form
    function crunchify_move_comment_form_below( $fields ) { 
        $comment_field = $fields['comment']; 
        unset( $fields['comment'] ); 
        $fields['comment'] = $comment_field; 
        return $fields; 
    } 

    function ea_comment_textarea_placeholder( $args ) {
        $args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="Comment"', $args['comment_field'] );
        return $args;
    }
    add_filter( 'comment_form_defaults', 'ea_comment_textarea_placeholder' );

    add_filter( 'comment_form_fields', 'crunchify_move_comment_form_below' ); 

    // Add placeholder for Name and Email
    function modify_comment_form_fields($fields){

        $commenter = wp_get_current_commenter();
        $req      = get_option( 'require_name_email' );
        $aria_req = ( $req ? " aria-required='true'" : '' );
        
        $fields['author'] = 
        '<p class="comment-form-author">' . 
            '<input id="author" placeholder="Name" name="author" type="text" value="' .
            esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
        '</p>';
        $fields['email'] = 
        '<p class="comment-form-email">' . 
            '<input id="email" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
            '" size="30"' . $aria_req . ' />'  .
        '</p>';
        return $fields;
    }
    add_filter('comment_form_default_fields','modify_comment_form_fields');

    
?>