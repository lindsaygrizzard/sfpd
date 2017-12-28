<?php
if ( post_password_required() ) {
    return;
}
?>
<div id="comments" class="comments-area">
    <?php if ( have_comments() ): ?>
        <?php
        $gym_comment_count = get_comments_number();
        $gym_comments_text = number_format_i18n( $gym_comment_count ) . ' ';
        if ( $gym_comment_count > 1 ) {
            $gym_comments_text .= __( 'Comments', 'gymedge' );
        }
        else{
            $gym_comments_text .= __( 'Comment', 'gymedge' );
        }
        ?>
        <h3><?php echo esc_html( $gym_comments_text );?></h3>
        <?php
        $gym_avatar = get_option( 'show_avatars' );
        ?>
       <ul class="comment-list<?php echo empty( $gym_avatar ) ? ' avatar-disabled' : '';?>">
            <?php
            wp_list_comments(
                array(
                    'style'             => 'ul',
                    'callback'          => 'GymEdge_Helper::comments_callback',
                    'reply_text'        => '<i class="fa fa-mail-forward" aria-hidden="true"></i> '. __( 'Reply', 'gymedge' ),
                    'avatar_size'       => 130,
                    'format'            => 'html5',
                    ) 
                );
                ?>
            </ul>

            <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                <nav class="pagination-area comment-navigation">
                    <ul>
                        <li><?php previous_comments_link( esc_html__( 'Older Comments', 'gymedge' ) ); ?></li>
                        <li><?php next_comments_link( esc_html__( 'Newer Comments', 'gymedge' ) ); ?></li>
                    </ul>
                </nav><!-- #comment-nav-below -->
            <?php endif; // Check for comment navigation.?>

        <?php endif; ?>
        <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gymedge' ); ?></p>
        <?php endif;?>

        <?php
        // Start displaying Comment Form
        $gym_commenter = wp_get_current_commenter();
        $gym_req = get_option( 'require_name_email' );
        $gym_aria_req = ( $gym_req ? " required" : '' );

        $gym_fields =  array(
            'author' =>
            '<div class="col-sm-6 padding-left"><div class="form-group comment-form-author"><input type="text" id="author" name="author" value="' . esc_attr( $gym_commenter['comment_author'] ) . '" placeholder="'.esc_attr__( 'Name', 'gymedge' ).( $gym_req ? ' *' : '' ).'" class="form-control"' . $gym_aria_req . '></div></div>',

            'email' =>
            '<div class="col-sm-6 padding-right comment-form-email"><div class="form-group"><input id="email" name="email" type="email" value="' . esc_attr(  $gym_commenter['comment_author_email'] ) . '" class="form-control" placeholder="'.esc_attr__( 'Email', 'gymedge' ).( $gym_req ? ' *' : '' ).'"' . $gym_aria_req . '></div></div>',
            );

        $gym_args = array(
            'class_submit'      => 'submit btn-send',
            'submit_field'         => '<div class="form-group form-submit">%1$s %2$s</div>',
            'comment_field' =>  '<div class="form-group comment-form-comment"><textarea id="comment" name="comment" required placeholder="'.esc_attr__( 'Comment *', 'gymedge' ).'" class="textarea form-control" rows="10" cols="40"></textarea></div>',
            'fields' => apply_filters( 'comment_form_default_fields', $gym_fields ),
            );

            ?>
            <div class="mt40"></div>
            <?php comment_form( $gym_args );?>
        </div>