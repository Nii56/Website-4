<?php
/**
 * Events Archive
 *
 * This is the archive template for Events.
 *
 * @package DBC
 * @subpackage Template
 */
get_header(); // Loads the header.php template.

global $query_string;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
query_posts($query_string.'&paged='.$paged.'&posts_per_page=-1&orderby=title&order=ASC');

?>

	<?php do_atomic( 'before_content' ); // dbc_before_content ?>
	
	<div id="content" role="main">

		<?php do_atomic( 'open_content' ); // dbc_open_content ?>

		<div class="hfeed">
			
			<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

				<?php do_atomic( 'before_entry' ); // hybrid_before_entry ?>

				<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>
				
				<?php get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'small-thumb', 'image_class' => 'thumbnail' ) ); ?>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
					<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'dbc' ), 'after' => '</p>' ) ); ?>
				</div><!-- .entry-summary -->

				<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms taxonomy="category" before="Posted in "] [entry-terms before="| Tagged "] [entry-comments-link before=" | "]', 'dbc' ) . '</div>' ); ?>

				<?php do_atomic( 'after_entry' ); // hybrid_after_entry ?>

			</article><!-- .hentry -->
			
			<hr>

			<?php do_atomic( 'after_singular' ); // hybrid_after_singular ?>

			<?php comments_template( '/comments.php', true ); // Loads the comments.php template ?>

			<?php endwhile; ?>

		<?php else: ?>

			<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

		<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // dbc_close_content ?>
		
		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // dbc_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>