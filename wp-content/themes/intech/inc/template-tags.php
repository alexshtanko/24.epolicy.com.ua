<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package intech
 */
if ( ! function_exists( 'intech_posted_on' ) ) :
	function intech_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">'. $time_string .'</a>'
		);
		echo '<span class="posted-on">'. $posted_on .'</span>';
	}
endif;
if ( ! function_exists( 'intech_posted_by' ) ) :
	function intech_posted_by() {
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'. esc_html( get_the_author() ) .'</a></span>'
		);
		echo '<span class="byline">'. $byline .'</span>';
	}
endif;
if ( ! function_exists( 'intech_post_cat' ) ) :
	function intech_post_cat(){
		if ( 'post' === get_post_type() ) {
			$categories_list = get_the_category_list( esc_html__( ', ', 'intech' ) );
			if ( $categories_list ) {
				printf( '<span class="cat-links">%1$s</span>', $categories_list );
			}
		}
	}
endif;
if ( ! function_exists( 'intech_post_comment' ) ) :
	function intech_post_comment(){
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						esc_html__( 'Leave a Comment<span class="screen-reader-text">'.esc_html__('on %s','intech').'</span>', 'intech' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;
if ( ! function_exists( 'intech_post_tag' ) ) :
	function intech_post_tag(){
		if ( 'post' === get_post_type() ) {
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				printf( '<span class="tagcloud">%1$s</span>', $tags_list ); 
			}
		}
	}
endif;
if ( ! function_exists( 'intech_entry_footer' ) ) :
	function intech_entry_footer() {
		edit_post_link(
			sprintf(
				wp_kses(
					esc_html__( 'Edit <span class="screen-reader-text">%s</span>', 'intech' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;
if ( ! function_exists( 'intech_post_thumbnail' ) ) :
	function intech_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>

		<?php else : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>
		<?php
		endif;
	}
endif;