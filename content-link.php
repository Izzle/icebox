<?php 
/**
 * content-link.php
 *
 * The default template for displaying posts with the Link post format
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<!-- Article Content -->
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading &rarr;', 'icebox' ) );

			wp_link_pages();
		?>
	</div><!-- end entry-content-->

	<!-- Article Footer -->
	<footer class="entry-footer">
		<p class="entry-meta">
			<?php 
				// Display the meta information
				icebox_post_meta();
			 ?>
		</p>
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