<section class="related-post">
    <?php
    $current_tags = get_the_tags();
    if ( $current_tags ) :
        foreach ( $current_tags as $tag ) {
            $current_tag_list[] = $tag->term_id;
        }

        $args = array(
            'tag__in'        => $current_tag_list,
            'post__not_in'   => array( $post->ID ),
            'posts_per_page' => 4,
            'orderby' => 'rand',
        );
        $related_posts = new WP_Query( $args );
        if( $related_posts->have_posts() ) :
            ?>
            <h3>関連記事</h3>
            <ul class="related-post__list">
                <?php
                    while ( $related_posts->have_posts() ) :
                        $related_posts->the_post();
                ?>
                    <li class="related-post__item"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( 'thumbnail' ); ?></a></li>
                    <?php
                endwhile;
                ?>
            </ul>
            <?php
        else :
        ?>
        関連記事はありません
        <?php
        endif;
        wp_reset_postdata();
    endif;
    ?>					
</section>