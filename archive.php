<?php
get_header();

if ( have_posts() ) :

	the_archive_title( '<h1 class="page-title">', '</h1>' );
	the_archive_description( '<div class="archive-description">', '</div>' );

	while ( have_posts() ) : the_post();

		get_template_part( 'template-parts/content' );

	endwhile;

	the_posts_navigation();

else :

	get_template_part( 'template-parts/content', 'none' );

endif;

get_sidebar();
get_footer();
