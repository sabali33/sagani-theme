<?php
declare(strict_types=1);
/**
 * A template to display default slider
 */
?>
<?php
$featured_products = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 8,
]);

if( !$featured_products->have_posts() ){
    return;
}
?>
<section class="main-slider">
    <div class="slider default-slider">
        <div class="sg-slides">
            <?php while($featured_products->have_posts()): $featured_products->the_post();?>
            <article <?php post_class('sg-slide');?>>
                <a href="<?php the_permalink() ?>">
                    <?php the_post_thumbnail('sagani-2-grid-slider') ?>
                </a>

                <div class="overlay">
                    <div class="post-meta above-title">
                        <span class="post-cat"><?php the_category(); ?></span>
                    </div>
                    <h2 class="post-title">
                        <a href="<?php the_permalink() ?>"> <?php the_title() ?></a>
                    </h2>
                    <div class="post-meta below-title">
                        <span class="posted-by"><?php the_author_link(); ?></span>
                        <span class="post-date"><?php the_date(); ?></span>

                    </div>
                </div>

            </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
        <span class="slider-nav big prev">
                <a href="#" class="nav-link prev" aria-label="Previous Post">&nbsp;<i class="icon icon-angle-left"></i></a>
            </span>
        <span class="slider-nav big next">
            <a href="#" class="nav-link next" aria-label="Next Post">&nbsp;<i class="icon icon-angle-right"></i></a>
        </span>
    </div>
</section>