<?php
   $classes = is_single() ? '' : 'sg-shadow-lg'; 
?>
<article <?php post_class( join(' ', [ $classes, 'listing listing-classic'] ) ); ?> >
    %POSTS%
</article>