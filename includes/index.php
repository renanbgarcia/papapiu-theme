<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

include implode(DIRECTORY_SEPARATOR, [get_template_directory(), 'includes', 'lessons', '_index.php']);
include implode(DIRECTORY_SEPARATOR, [get_template_directory(), 'includes', 'dashboard', '_index.php']);