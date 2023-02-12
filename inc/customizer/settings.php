<?php

declare(strict_types=1);

class Sagani_Customizer_Settings
{
    /**
     * @return int
     */
    public function get_logo():int
    {
        return (int) get_theme_mod( 'custom_logo' );
    }
}