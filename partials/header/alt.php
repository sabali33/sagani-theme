<div class="header header-alt">
    <?php get_template_part('partials/header/mobile-header'); ?>
	<div class="site-width">
        <div class="header-inner">
            <div class="header-alt__top-bar-left sg-col-4-md">
                <ul class="header-alt__top-bar-nav">
                    <li class="header__tob-bar-nav-item"><a href="#">Lifestyle</a></li>
                    <li class="header__tob-bar-nav-item"><a href="#">Contact</a></li>
                    <li class="header__tob-bar-nav-item"><a href="#">Sign in/ join</a></li>
                </ul>
            </div>
            <div class="header__middle sg-col-4-md">

                <?php get_template_part('/partials/header/logo') ?>

            </div>
            <div class="header__top-bar-right sg-col-4-md">

                <?php get_template_part('partials/header/social-icons'); ?>

            </div>
        </div>
	</div>
</div>
<?php get_template_part( 'partials/header/nav' ); ?>