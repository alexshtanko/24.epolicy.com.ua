<div class="blog-article">
	<div class="intech-blog-top">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="intech-post-meta">
				<ul>
					<li class="post-date"><i class="flaticon-calendar"></i><?php intech_posted_on(); ?></li>
					<li class="post-by"><i class="flaticon-man"></i><?php intech_posted_by(); ?></li>
					<li class="post-comment"><i class="flaticon-speech-bubble"></i> <?php comments_popup_link('0 Comment', '1 Comment', '% '.esc_html__('Comments','intech').''); ?></li>
					<?php if ( is_singular() ) : ?>
					<li class="intech-cat"><i class="flaticon-repeat"></i><?php intech_post_cat(); ?></li>
					<?php endif; ?>
				</ul>
			</div>
		<?php endif; 
		if ( ! is_singular() ){
			?>
			<div class="intech-post-title">
				<?php the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</div>
			<div class="intech-cat"><span><?php esc_html_e('In :','intech') ?></span><?php intech_post_cat(); ?></div>
			<?php
		}
		?>
	</div>
	<div class="post-summery">
		<?php
		if(is_singular()){
			/* translators: %s: Name of current post */
            the_content(
                sprintf(
                    esc_html__( 'Continue reading %s', 'intech' ),
                    the_title( '<span class="screen-reader-text">', '</span>', false )
                )
            );
			wp_link_pages( array(
	            'before'           => '<div class="page-links post-pagination"><p>' . esc_html__( 'Pages:', 'intech' ).'</p><ul class="page-numbers"><li>',
	            'separator'        => '</li><li>',
	            'after'            => '</li></ul></div>',
	            'next_or_number'   => 'number',
	            'nextpagelink'     => esc_html__( 'Next Page', 'intech'),
	            'previouspagelink' => esc_html__( 'Prev Page', 'intech' ),
	        ));
		}else{
			?>
			<p><?php echo wp_trim_words( get_the_content(), 45 ); ?></p>
			<div class="blog-btn">
				<div class="theme-buttons">
					<a href="<?php echo esc_url( get_permalink() ); ?>" class="theme-button colorbg">
						<?php esc_html_e('Read More','intech') ?><i class="flaticon-right-arrow"></i>
					</a>
				</div>
			</div>
			<?php
		}
		?>
	</div>
	<?php if( is_singular() ) : ?>
		<?php if( has_tag() or function_exists( 'intech_post_share_social' ) ) : ?>
		<div class="intech-blog-rag-meta row">
			<?php if(has_tag()) : ?>
			<div class="entry-f-left">
				<?php intech_post_tag(); ?>
			</div>
			<?php endif; ?>
			<?php if( function_exists('intech_post_share_social')) : ?>
			<div class="entry-f-right">
				<div class="intech-social-share"> 
					<?php intech_post_share_social(); ?>
				</div>
			</div>
			<?php endif; ?>
		</div>
	<?php endif; endif; ?>
</div>