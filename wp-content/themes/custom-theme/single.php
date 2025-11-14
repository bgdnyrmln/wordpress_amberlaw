<?php

use Timber\Timber;

$context = Timber::context();

$context['text'] = apply_filters('the_content', get_the_content());

Timber::render('templates/single-' . get_post_type() . '.twig', $context);
