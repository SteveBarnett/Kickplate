<?php
get_header(); ?>
	<?php
	if ( have_posts() ) : ?>

		<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'kickplate' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'search' );

		endwhile;

		the_posts_navigation();

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>

<?php
get_sidebar();
get_footer();
