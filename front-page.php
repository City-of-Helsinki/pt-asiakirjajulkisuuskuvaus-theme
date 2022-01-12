<?php
/**
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
*
* @package Aste
*/

get_header();
?>


<div id="primary" class="content-area">

  <?php get_template_part( 'template-parts/', 'content') ?>

  <?php the_content(); ?>

<?php

  get_footer();

?>
