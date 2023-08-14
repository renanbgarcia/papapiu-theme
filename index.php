<?php

if (!defined('ABSPATH')) exit;

include 'components/header/header.php';

if (is_singular('post'))
   get_template_part('pages/single');

elseif (is_front_page())
   get_template_part('pages/front-page');

elseif (is_home())
   get_template_part('pages/home');

elseif (is_search())
   get_template_part('pages/search');

elseif (is_category())
   get_template_part('pages/taxonomy');

elseif (is_tax('pp_courses'))
   get_template_part('pages/taxonomy-pp_courses');

elseif (is_tax('pp_modules'))
   get_template_part('pages/taxonomy-pp_modules');

elseif (is_page())
   get_template_part('pages/page');


get_template_part('components/footer/footer');
