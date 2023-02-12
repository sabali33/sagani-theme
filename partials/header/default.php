
<div class="header__top-bar">
	<div class="site-width">
		<div class="header__top-bar-left">
            <?php
            wp_nav_menu( [
                'theme_location' => 'top_nav',
                'menu_id'        => 'topbar-menu',
                'menu_class'        => 'header__tob-bar-nav-item'
            ] );
            ?>
		</div>
		<div class="header__top-bar-right">
			<ul class="social-icons">
				<li class="navigation__item">
					<a href="#" class="fa fa-facebook-f"  aria-label="Facebook"></a>
					<i class="social-icons__icon-hidden">Facebook</i>
				</li>
				<li class="navigation__item">
					<a href="#" class="fa fa-twitter" aria-label="Twitter"></a>
					<i class="social-icons__icon-hidden" >Twitter</i>
				</li>
				<li class="navigation__item">
					<a href="#" class="fa fa-google-plus" aria-label="Google"></a>
					<i class="social-icons__icon-hidden" >Google+</i>
				</li>
				<li class="navigation__item">
					<a href="#" class="fa fa-linkedin" aria-label="Linkedin"></a>
					<i class="social-icons__icon-hidden" >Linkedin</i>
				</li>
				<li class="navigation__item">
					<a href="#" class="fa fa-instagram" aria-label="Instagram"></a>
					<i class="social-icons__icon-hidden">Instagram</i>
				</li>
				<li class="navigation__item">
					<a href="#" class="fa fa-pinterest-p" aria-label="Pinterest"></a>
					<i class="social-icons__icon-hidden">Pinterest</i>
				</li>
			</ul>
		</div>
	</div>
	
</div>
<div class="header__middle">
	<div class="site-width">
		<div class="title">
			<a href="<?php echo  esc_url(home_url( '/' )); ?>" class="header__logo" aria-label="<?php bloginfo( 'name' ); ?>">
                <?php if(isset($logo_url)): ?>
                    <h1 class="site-logo">
                        <img src="<?php echo esc_url($logo_url); ?>" alt="<?php  echo esc_attr(bloginfo( 'name' )) ?>"/>
                    </h1>
                <?php else: ?>
                    <h1 class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
                <?php endif; ?>
			</a>
		</div>
		<div class="header-right"> 
			<?php dynamic_sidebar( 'sagani_header_right' ); ?>
		</div>
	</div>
	
</div>

<?php get_template_part( 'partials/header/nav' ); ?>