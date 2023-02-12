<?php
 /**
  * Template for single post
  */
?>

<?php
	get_header();

	extract([
		'post_footer' => [
			'tag_clouds' => true,
			'share_counter' => [
				'likes' => true,
				'views' => true,
			]//phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing, Generic.Arrays.DisallowShortArraySyntax
		],//phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing, Generic.Arrays.DisallowShortArraySyntax
		'social_share' => [
			'facebook' => true,
			'twitter' => true,
			'linkedin' => true,
			'pinterest' => true,
			'vk' => true,
		],//phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing, Generic.Arrays.DisallowShortArraySyntax
		'post_author' => true,
		'post_nav' => true,
		'related_posts' => [
			'date' => true,
			'post_id' => get_the_ID(),
			'count' => 3
		],//phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing, Generic.Arrays.DisallowShortArraySyntax
		'post_comments' => comments_open(),
		
	]//phpcs:ignore WordPress.Arrays.ArrayDeclarationSpacing, Generic.Arrays.DisallowShortArraySyntax
);
?>
	<main class="main" role="main">
		<div class="site-width">
			<div class="sg-row sg-grid-gap-2-lg">
				<div class="sg-col-8-lg">
					<div class="main-content post-content-box h-100">
						
						<?php get_template_part('loop'); ?>

						<?php if( Sagani::utils()->some( $post_footer ) ) : ?>
							<div class="post-foot sg-px-8-lg">
								<?php if( $post_footer['tag_clouds']  ) : ?>

									<div class="tag-cloud">
										<?php the_tags('<ul class="tag-list"><li class="tag-item">', '</li><li>', '</li></ul>'); ?>
									</div>

								<?php endif; ?>

								<?php if( Sagani::utils()->some( $post_footer['share_counter'] ) ) : ?>

									<div class="share-counter">
										<span class="post-likes">
											<a href="#" class="sg-bold"><i class="icon-xlarge icon icon-heart"></i>110</a>
										</span>
										<span class="post-comments">
											<a href="#" class="sg-bold"><i class="icon icon-comment"></i>77</a>
										</span>
										<span class="post-views">
												<i class="icon icon-eye"></i>50
										</span>
										
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if( Sagani::utils()->some( $social_share ) ) : ?>

							<?php get_template_part('partials/single/social-share', '', $social_share ); ?>
							
						<?php endif; ?>
						
						<?php if( $post_author ): ?>

							<?php get_template_part( 'partials/author-box' ); ?>

						<?php endif; ?>
						
						<?php if( $post_nav ): ?>

							<?php get_template_part('partials/single/post-navigation', '', [] ); ?>

						<?php endif; ?>
						<!-- Post Navigation-->

						<?php if( $related_posts ): ?>

							<?php get_template_part( 'partials/single/related-posts', '', $related_posts ); ?>
							
						<?php endif; ?>

						<!-- Comments -->
						<?php if( $post_comments ): ?>
							<?php comments_template( '', true); ?>
						
						<?php else: ?>
							<div class="sg-px-8">
								<p>
									<?php echo esc_html_e('Comments are closed', 'sagani' ); ?>
								</p>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<!-- Sidebar -->
				
                <?php get_sidebar() ?>

	
			</div>
		</div>
		
	</main>
<?php
	get_footer();
?>
