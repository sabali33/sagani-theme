<?php
    extract([
        'simple' => false
    ]);
?>
<?php 
 extract([
     'logo' => false,//Sagani::customizer()->get_logo()
 ]);
?>

<header class="header header-alt">
    <div class="navigation simple"> <!-- has navigation-center and navigation-right modifiers -->
        <div class="site-width">
            <nav class="navigation__nav">
                <?php if( $simple ): ?>
                    <div class="title">
                        <a href="<?php echo esc_url(home_url( "/" ) ); ?>" class="header__logo" title="<?php echo esc_attr(bloginfo( 'name' )); ?>"><?php echo $logo ? $logo : esc_html( bloginfo( 'name' ) ); ?></a>
                    </div>
                <?php endif; ?>
                <?php 
                    wp_nav_menu( [
                        'theme_location' => 'main_nav',
						'menu_id'        => 'primary-menu',
						'menu_class'        => 'navigation__list',
                        'walker' => new Sagani_Nav_Walker()
                    ] );
                ?>

                <div class="navigation__action">
                    <ul class="navigation__action-list">
                        <li class="navigation__action-item navigation__action--search">
                            <!-- <label for="overlay-search-toggle"><span class="fa fa-search"></span></label> -->
                            <a href="#search-popup-box" class="icon-search icon-xxlarge" aria-label="Search"></a>
                            <i class="icon-hidden"><?php echo esc_html_e('Seach', 'sagani'); ?></i>
                            
                        </li>
                        <li class="navigation__action-item navigation__action--cart">
                            <a href="#" class="fa fa-shopping-cart" aria-label="SHopping Cart"></a>
                            <i class="icon-hidden"> <?php echo esc_html_e('Cart', 'sagani'); ?></i>
                            <span class="navigation__cart-item-count">3</span>
                        </li>
                        <li class="navigation__action-item navigation__action--bars">
                            <a href="#" class="fa fa-bars" aria-label="Hamburger"></a>
                            <i class="icon-hidden">Hamburger</i>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        

    </div>
    
</header>
    