<?php get_header(); ?>
<main>
    <?php if(have_posts()): the_post(); ?>
        <article <?php post_class( "post" ); ?>>
            <section class="post__content">
                <?php the_content(); ?>
            </sction>
            <section class="metadata">
                <div class="metadata__container">
                    <h1 class="metadata__title"><?php the_title(); ?></h1>
                    <?php if(has_category() ): ?>
                        <div class="metadata__category">
                            <?php echo get_the_category_list( ' ' ); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <?php the_tags( '<ul class="metadata__tag-list"><li class="metadata__tag-item">','</li><li class="metadata__tag-item">','</li></ul>' ); ?>                
                <div class="metadata__date">
                    <time datetime="<?php echo get_the_date( 'Y-m-d' ); ?>">
                        <?php echo get_the_date(); ?>
                    </time>
                </div>
            </section>
            <div class="separator"></div>
            <?php
            if ( comments_open() || get_comments_number() ) :
				comments_template();
            endif;
            ?>
            <div class="separator"></div>
            <?php get_template_part( 'inc/related', 'post' ); ?>
        </article>
    <?php endif; ?>
</main>
<?php get_footer(); ?>