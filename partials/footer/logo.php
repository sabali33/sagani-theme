<?php
declare(strict_types=1);

extract([
    'logo_attachment_id' => Sagani::customizer()->get_logo()
]);
if($logo_attachment_id){
    $logo_url = wp_get_attachment_image_url( $logo_attachment_id , 'full' );
}
?>

<img src="<?php echo esc_url($logo_url); ?>" alt="<?php  echo esc_attr(bloginfo( 'name' )) ?>"/>