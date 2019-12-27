<?php

/*
Template Name: Rental-Template
 */

get_header();
$post_cat = filter_input(INPUT_GET, 'sortby');

$hold_content_array = array();

?>
<section id="primary" class="content-area dev-page">
    <main id="main" class="site-main">
        <div class="media-page page-content">
            <div class="media-page-header single-page-header">
                <div class="page_title"><?php echo get_the_title(); ?></div>
                <div class="page-header-fade"></div>
                <div class="page-header-fade"></div>
                <?php if (has_post_thumbnail()) {
    the_post_thumbnail('full');
}?>
            </div>
            <div class="page-holder all-page-holder">

                <?php
$terms = get_terms(array(
    'taxonomy' => 'status',
    'hide_empty' => false,
));
//print_r($terms);

// echo do_shortcode('[listing post_type="rental" status="current,leased" tools_top="on"]');
?>
<header class="archive-header entry-header loop-header">
<h4 class="archive-title loop-title">
Rentals
</h4>
</header>

<?php
echo do_shortcode('[listing post_type="rental" tools_top="on"]');

?>





<?php
get_footer();