<?php
declare(strict_types=1);
/**
 * Template for displaying single page
 */
get_header();
?>



<main class="page-body">
    <div class="site-width">
        <div class="sg-row sg-grid-gap-2-lg">
            <div class="main-content sg-col-12-xs sg-col-8-lg">
                <div class="page-content-wrap">
                    <?php while(have_posts()): the_post();?>
                        <header>
                            <?php if( has_post_thumbnail()){
                                the_post_thumbnail();
                            }?>

                            <h1 class="page-title"><?php the_title(); ?></h1>
                        </header>
                        <div class="page-content">

                            <?php the_content();?>

                        </div>
                    <?php endwhile; ?>
                </div>
            </div>

            <?php get_sidebar() ?>
        </div>
    </div>
</main>








<?php
get_footer();