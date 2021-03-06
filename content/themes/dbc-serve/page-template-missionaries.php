<?php
/**
 * Template Name: Missionaries
 *
 * This template will list all of the missionaries.
 *
 * @package DBC
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // dbc_before_content ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // dbc_open_content ?>

		<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

		<div class="hfeed">

			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; ?>
			<?php global $query_string; query_posts( $querystring. '&posts_per_page=-1&order=ASC&orderby=title&post_type=missionary&paged='. $paged ); ?>
		
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // dbc_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // dbc_open_entry ?>

						<p><?php get_the_image( array( 'default_image' => get_stylesheet_directory_uri(). '/images/noavatar.png', 'height' => '150', 'image_class' => 'avatar', 'meta_key' => 'Thumbnail', 'size' => 'thumbnail', 'width' => '150' ) ); ?></p>
						
						<h2><a href="<?php the_permalink(); ?>"><?php the_title_attribute(); ?></a></h2>

						<?php do_atomic( 'close_entry' ); // dbc_close_entry ?>

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // dbc_after_entry ?>

					<?php get_sidebar( 'after-singular' ); // Loads the sidebar-after-singular.php template. ?>

					<?php do_atomic( 'after_singular' ); // dbc_after_singular ?>

				<?php endwhile; ?>

			<?php endif; wp_reset_query(); ?>
			
		</div><!-- .hfeed -->
		
		<?php do_atomic( 'close_content' ); // dbc_close_content ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // dbc_after_content ?>

<?php get_footer(); // Loads the footer.php template. ?>
