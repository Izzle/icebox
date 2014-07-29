<?php 
/**
 * content.php
 *
 * The default template for displaying content
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Article Header -->
	<header class="entry-header"> <?php 
		// If the post has a thumbnail and its not password protected
		// then display the thumbnail
		if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure class="entry-thumbnail"><?php the_post_thumbnail(); ?></figure>
		<?php endif; 

		// If single page, display the title
		// else, display the title in a link
		if ( is_single() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>
		
		<p class="entry-meta">
			<?php 
				// Display the meta information
				icebox_post_meta();
			 ?>
		</p>
	</header><!-- end entry-header -->

	<!-- Article Content -->
	<div class="entry-content">
		<?php
		if (is_search() ) {
			the_excerpt();
		} else {
			the_content( __( 'Continue reading &rarr;', 'icebox' ) );

			wp_link_pages();
		}
		?>
	</div><!-- end entry-content-->

	<!-- Article Footer -->
	<footer class="entry-footer">
		<?php 
			// If we have a single page and the author bio exists
			// then display it
			if ( is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by ', 'icebox' ) . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta( 'description' ) . '</p>';
			}
		 ?>
	</footer><!--end entry-footer-->
</article>