<?php

include  get_template_directory() . '/admin/options/panels.php';
include  get_template_directory() . '/admin/options/settings.php';

$this->add_panels_sections($panels);

$this->add_settings( $settings );