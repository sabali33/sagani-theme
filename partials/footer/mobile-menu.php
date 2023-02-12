<?php
declare(strict_types=1);

/**
 * A template to display mobile canvas menu
 */

?>

<div class="mobile-menu-wrap canvas active">
    <span class="mobile-hamburger">
        <i class="icon-close"></i>
    </span>
    <div class="mobile-menu-inner">
        <?php
        wp_nav_menu( [
            'theme_location' => 'main_nav',
            'menu_id'        => 'mobile-menu',
            'menu_class'        => 'navigation__list',
            'walker'  => new Sagani_Nav_Walker()

        ] );
        ?>
    </div>
</div>
