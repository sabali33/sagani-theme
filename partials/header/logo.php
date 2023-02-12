<?php
 declare(strict_types=1);

extract([
    'logo_attachment_id' => Sagani::customizer()->get_logo()
]);
if($logo_attachment_id){
    $logo_url = wp_get_attachment_image_url( $logo_attachment_id , 'full' );
}
?>
<a href="<?php echo  esc_url(home_url( '/' )); ?>" class="header__logo" aria-label="<?php bloginfo( 'name' ); ?>">
    <?php if(isset($logo_url)): ?>
        <h1 class="site-logo">
            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php  echo esc_attr(bloginfo( 'name' )) ?>"/>
        </h1>
    <?php else: ?>
        <h1 class="site-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
    <?php endif; ?>
</a>
