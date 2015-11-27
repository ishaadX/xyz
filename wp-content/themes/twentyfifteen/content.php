<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
		// Post thumbnail.
		twentyfifteen_post_thumbnail();
	?>

	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s', 'twentyfifteen' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );


			// $video_id = get_post_meta($post->ID,'file', true);
		 	$attachment = get_post_meta($post->ID,'file', true);
			$video_option_table =  array(
																'title' 			=> get_the_title($attachment->post_title),
																'mp4' 				=> wp_get_attachment_url( $attachment ),
																'permalink'		=> get_the_permalink( $attachment ),
																'preroll_mp4'	=> wp_get_attachment_url( $attachment )
																// 'caption' 	=> $attachment->post_excerpt,
															);

			// $video_option = array(
			// 	'mp4'		=> wp_get_attachment_url( $video_id ),
			// 	'title' => $video_id->post_title,
			// );

			// $advertise = get_post_meta($post->ID, 'file', true);
			// $ad_video_option_table = array(
			// 														'preroll_mp4'		=> wp_get_attachment_url( $advertise )
			// 													);
			// var_dump($ad_video_option_table);

			echo do_shortcode('[shaad_player mp4="'.wp_get_attachment_url( $attachment ).'" title = "'.get_the_title($attachment->post_title).'" permalink = "'.get_the_permalink( $attachment ).'" preroll_mp4 = "'.wp_get_attachment_url( $attachment ).'" ]');
			// echo do_shortcode('[shaad_player all="'. $video_option_table .'" ]');

			// echo do_shortcode('[shaad_ad_player ad_mp4 = "'.wp_get_attachment_url( $advertise ).'" ]');
		?>





		<?php

			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>

	</div><!-- .entry-content -->

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>

	<footer class="entry-footer">
		<?php twentyfifteen_entry_meta(); ?>
		<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
