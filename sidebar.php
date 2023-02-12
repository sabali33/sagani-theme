<?php

if( !is_active_sidebar('sagani_main_sidebar') ){

    return;
}
?>
<div class="sg-col-12-xs sg-col-4-lg">

    <aside class="main-sidebar">

        <ul class="widgets">

            <?php
                dynamic_sidebar( 'sagani_main_sidebar' );
            ?>

        </ul>

    </aside>

</div>