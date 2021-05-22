<?php
get_header();
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
?>
    <main>
			<div id="magicgrid-container">		
				<?php
				if ((is_home() || is_front_page()) && $paged == 1) {
					get_template_part( 'inc/card','intro' );
				} elseif ( is_archive() ) {
					get_template_part( 'inc/card','head' );
				}
				if ( have_posts() ) {
					while ( have_posts() ){
						the_post();
						get_template_part( 'inc/card','' );
					}
				}
				?>
			</div>
			<?php get_template_part( 'inc/pager' ); ?>
	</main>
<?php get_footer(); ?>