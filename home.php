<?php
    get_header();
?>
<main class="main" role="main">

    <?php  get_template_part('partials/sliders/default'); ?>
    <div class="site-width">
        <div class="u-center-element">
            <h1 class="main-heading margin-top-bottom">Welcome to coding this theme</h1>
        </div>
        <!-- POPULAR POST CTA -->
        <div class="sg-row">
            <?php  get_template_part('partials/home/cta'); ?>
        </div>
        <!-- PRODUCT CTA -->
        <div class="sg-row">
            <?php  get_template_part('partials/home/featured-products'); ?>
        </div>
        <img src="" alt="">
        <div class="sg-row sg-grid-gap-2-lg">
            
            <div class="sg-col-8-lg sg-col-12-xs">
                <section class="main-content">

                    <!-- HIGHLIGHT BLOCK -->

                    <?php  get_template_part('partials/blocks/hightlights'); ?>

                        
                        
                        
                    <!-- CLASSIC LISTING STYLE -->
                    <?php  //get_template_part( 'components/list-styles/list' ); ?>
                    <!-- <article class="listing listing-classic-left">
                        <div class="post-thumb">
                            <a href="#" class="post-link">
                                <img src="img/maximilien-t-scharner-318691-unsplash.jpg" alt="Thumbnail">
                            </a>
                            
                        </div>
                        <div class="post-excerpt right">
                            <div class="post-meta">
                                <span class="post-cat"><a href="#">Lifestyle</a></span>
                                <time class="post-date">18 July 2018</time>
                                <span class="posted-by"> <a href="#">By John Doe </a> </span>
                                <h2 class="post-title"><a href="#">A calm comes over the lake this month</a></h2>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, dicta, quod. Fuga id, animi voluptate, in quasi totam ipsum sapiente dolor beatae eveniet voluptatum libero ab! Cum animi modi cupiditate.
                            </p>
                            <div class="margin-top-small">
                                <a href="#" class="read-more">Continue Reading</a>
                            </div>
                            <div class="share-counter">
                                <span class="post-likes">
                                    <a href="#"><i class="fa fa-heart"></i>110</a>
                                </span>
                                <span class="post-comments"><a href="#"><i class="fa fa-comment"></i>77</a></span>
                                <span class="post-views"><i class="fa fa-eye"></i>50</span>
                                <span class="post-share"><a href="#"><i class="fa fa-share-alt"></i> Share</a></span>
                            </div>
                        </div>
                        
                    </article> -->
                    <!-- <article class="listing listing-gallery">
                        <div class="post-meta">
                            <span class="post-cat"><a href="#">Lifestyle</a></span>
                            <time class="post-date">18 July 2018</time>
                            <span class="posted-by"> <a href="#">By John Doe </a> </span>
                            <h2 class="post-title"><a href="#">A calm comes over the lake this month</a></h2>
                        </div>
                        <div class="post-gallery">
                            <ul class="post-images">
                                <li class="post-image small"><img src="img/ben-klea-1184785-unsplash.jpg" alt="Thumbnail"></li>
                                <li class="post-image small right"><img src="img/andras-kovacs-129181-unsplash.jpg" alt="Thumbnail"></li>
                                <li class="post-image big"><img src="img/jason-blackeye-129041-unsplash.jpg" alt="Thumbnail"></li>
                            </ul>
                            
                            
                            

                            
                        </div>
                        <div class="post-excerpt right">
                            
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, dicta, quod. Fuga id, animi voluptate, in quasi totam ipsum sapiente dolor beatae eveniet voluptatum libero ab! Cum animi modi cupiditate.
                            </p>
                            <div class="margin-top-small">
                                <a href="#" class="read-more">Continue Reading</a>
                            </div>
                            
                        </div>
                        <div class="share-counter">
                            <span class="post-likes">
                                <a href="#"><i class="fa fa-heart"></i>110</a>
                            </span>
                            <span class="post-comments"><a href="#"><i class="fa fa-comment"></i>77</a></span>
                            <span class="post-views"><i class="fa fa-eye"></i>50</span>
                            <span class="post-share"><a href="#"><i class="fa fa-share-alt"></i> Share</a></span>
                        </div>
                        
                    </article> -->
                    <!-- <article class="listing listing-slider">
                        <header>
                            <div class="post-slider">
                                <div class="slider-item">
                                    <a href="#" class="post-link">
                                        <img src="img/thumb-1.png" alt="Thumbnail">
                                    </a>
                                </div>
                                <div class="slider-item">
                                    <img src="img/thumb-1.png" alt="Thumbnail">
                                </div>
                                <div class="slider-item">
                                    <img src="img/thumb-1.png" alt="Thumbnail">
                                </div>
                                
                                <span class="slider-nav prev"><a href="#" class="prev" aria-label="Previous Post">&nbsp;</a></span>
                                <span class="slider-nav next"><a href="#" class="next" aria-label="Next Post">&nbsp;</a></span>
                            </div>
                            
                            <div class="post-meta">
                                <span class="post-cat"><a href="#">Lifestyle</a></span>
                                <time class="post-date">18 July 2018</time>
                                <span class="posted-by"> <a href="#">By John Doe </a> </span>
                                <h2 class="post-title"><a href="#">A calm comes over the lake this month</a></h2>
                            </div>
                            
                        </header>
                        <div class="post-excerpt">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus, dicta, quod. Fuga id, animi voluptate, in quasi totam ipsum sapiente dolor beatae eveniet voluptatum libero ab! Cum animi modi cupiditate.
                            </p>
                            <div class="margin-top-small">
                                <a href="#" class="read-more">Continue Reading</a>
                            </div>
                            
                        </div>
                        <div class="share-counter">
                            <span class="post-likes">
                                <a href="#"><i class="fa fa-heart"></i>110</a>
                            </span>
                            <span class="post-comments"><a href="#"><i class="fa fa-comment"></i>77</a></span>
                            <span class="post-views"><i class="fa fa-eye"></i>50</span>
                            <span class="post-share"><a href="#"><i class="fa fa-share-alt"></i> Share</a></span>
                        </div>
                    </article> -->

                    <!-- BLOG LISTING STYLE-->
                    <?php
                        get_template_part('loop-mix');
                    ?>

                </section>
            </div>
            
            <?php get_sidebar() ?>
            
        </div>

    </div>
    
</main>

<?php get_footer(); ?>