<?php
/**
 * Archives template
 */

get_header();

?>
	<div id="top"></div>
	
	<main class="main mt-10" role="main">
		<div class="site-width">
			<header class="archive-header">
				<h1 class="main-heading "> <?php echo esc_html_e('Archive', 'sagani' ); ?> </h1>
				<?php if( !is_front_page() ) get_template_part('components/archive/filter-form' ); ?>
			</header>
			<div class="sg-row sg-grid-gap-2-lg">
				<div class="sg-col-12-sm sg-col-8-lg">
					<div class="main-content">
							<!-- CLASSIC LISTING STYLE -->
							<?php get_template_part( 'loop' ); ?>
<!--						<article class="listing listing-classic-left">-->
<!--							<div class="post-thumb">-->
<!--								<a href="#" class="post-link">-->
<!--									<img src="img/maximilien-t-scharner-318691-unsplash.jpg" alt="Thumbnail">-->
<!--								</a>-->
<!--								-->
<!--							</div>-->
<!--							<div class="post-excerpt right">-->
<!--								<div class="post-meta">-->
<!--									<span class="post-cat"><a href="#">Lifestyle</a></span>-->
<!--									<time class="post-date">18 July 2018</time>-->
<!--									<span class="posted-by"> <a href="#">By John Doe </a> </span>-->
<!--									<h2 class="post-title"><a href="#">A calm comes over the lake this month</a></h2>-->
<!--								</div>-->
<!--								<p>-->
<!--									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, dicta, quod. Fuga id, animi voluptate, in quasi totam ipsum sapiente dolor beatae eveniet voluptatum libero ab! Cum animi modi cupiditate.-->
<!--								</p>-->
<!--								<div class="margin-top-small">-->
<!--									<a href="#" class="read-more">Continue Reading</a>-->
<!--								</div>-->
<!--								<div class="share-counter">-->
<!--									<span class="post-likes">-->
<!--										<a href="#"><i class="fa fa-heart"></i>110</a>-->
<!--									</span>-->
<!--									<span class="post-comments"><a href="#"><i class="fa fa-comment"></i>77</a></span>-->
<!--									<span class="post-views"><i class="fa fa-eye"></i>50</span>-->
<!--									<span class="post-share"><a href="#"><i class="fa fa-share-alt"></i> Share</a></span>-->
<!--								</div>-->
<!--							</div>-->
<!--							-->
<!--						</article>-->

					</div>
				</div>

				<?php get_sidebar() ?>
				
			</div>
		</div>
	</main>
	
<?php get_footer(); ?>