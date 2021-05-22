<?php get_header(); ?>
<main>
    <?php if(have_posts()): the_post(); ?>
        <article <?php post_class( "post" ); ?>>
            <section class="post-content">
                <?php the_content(); ?>
            </sction>
        </article>
    <?php endif; ?>
</main>
<?php get_footer(); ?>