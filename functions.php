<?php

if (!defined('ABSPATH')) exit;

require implode(DIRECTORY_SEPARATOR, [get_template_directory(), 'includes', 'init', '_index.php']);
require implode(DIRECTORY_SEPARATOR, [get_template_directory(), 'includes', 'utils', '_index.php']);
require implode(DIRECTORY_SEPARATOR, [get_template_directory(), 'includes', 'lessons', '_index.php']);
require implode(DIRECTORY_SEPARATOR, [get_template_directory(), 'includes', 'dashboard', '_index.php']);