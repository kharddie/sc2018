<?php
/*

Template Name: Project Page

 */
?>

<?php get_header(); ?>

<?php //get_template_part( 'includes/page-title' ); ?>
<?php
		$dt_template_blog = get_post_meta($post->ID, 'dt_blog_layout', true);
		$dt_blog_categories = get_post_meta($post->ID, 'dt_blog_categories', true);
		$dt_posts_number = get_post_meta($post->ID, 'dt_posts_number', true);
		$dt_blog_content = get_post_meta($post->ID, 'dt_blog_vc_content', true);
?>

<div class="centered-wrapper ">
  <div class="project-page">


    <?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php the_title(); ?>
    <?php the_content(); ?>
    <?php echo get_the_date(); ?>

    <?php endwhile; ?>
    <?php endif; ?>



    <div class="footer-social">
      <a class="nonblock nontext Button rounded-corners clearfix grpelem" id="buttonu23925" href="privacy-policy.html"
        data-href="page:U14674">
        <!-- container box -->
        <div class="clearfix grpelem" id="u23926-4">
          <!-- content -->
          <p>Privacy Policy</p>
        </div>
      </a>
      <a class="nonblock nontext transition clip_frame grpelem" id="u23921" href="https://au.linkedin.com/pub/simon-caulfield/4a/a9/146"
        target="_blank">
        <!-- svg --><img class="svg" id="u23922" src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/linkedin.svg"
          width="25" height="25" alt=""></a>
      <a class="nonblock nontext transition clip_frame grpelem" id="u23919" href="https://www.facebook.com/pages/Simon-Caulfield-Premium-Properties/152644954748355"
        target="_blank">
        <!-- svg --><img class="svg" id="u23920" src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/facebook.svg"
          width="25" height="25" alt=""></a>
      <a class="nonblock nontext transition clip_frame grpelem" id="u23923" href="https://instagram.com/simon_sells_property/"
        target="_blank">
        <!-- svg --><img class="svg" id="u23924" src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/instagram.svg"
          width="25" height="25" alt=""></a>
    </div>
  </div>

  <div style="display:none">
    <?php get_footer(); ?>
  </div>