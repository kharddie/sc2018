<?php
/*

Template Name: Projects Page

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
  <div class="projects-page">
    <div class="H1 clearfix colelem" id="u23860-4" data-muse-uid="U23860" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc">
      <h1>Projects</h1>
    </div>
    <div class="H1 clearfix colelem" id="u24142-4" data-muse-uid="U24142" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc">
      <!-- content -->
      <h1>CURRENT PROJECTS</h1>
    </div>
    <div class="long-div-container">
      <div class="long-div-flex">
        <div class="long-div-left">
          <img src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/barca.jpg" />
        </div>
        <div class="long-div-right">
          <h1 class="H1" id="u24147-2">Barca <span>Bulimba</span></h1>
          <p class="Body-Grey">Barca is a once in a lifetime opportunity to enjoy north facing 3 and 4 bedroom
            riverfront apartments and 3 and 4 bedroom terrace homes in one of Brisbane’s most exclusive riverfront
            enclaves. Featuring stunning architectural designs, luxury interiors and an unrivalled waterfront position
            with never to be built out river views.</p>
          <div class="sub-btn">
            <div class="createsend-button" style="height:27px;display:inline-block;" data-listid="i/BE/B2E/E7F/D4BDF26B90917DEB">
            </div>
            <script type="text/javascript">
              (function () {
                var e = document.createElement('script');
                e.type = 'text/javascript';
                e.async = true;
                e.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                  '://btn.createsend1.com/js/sb.min.js?v=3';
                e.className = 'createsend-script';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(e, s);
              })();
            </script>
          </div>
        </div>
      </div>
      <div class="long-div-flex">
        <div class="long-div-left">
          <img src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/banc.jpg" />
        </div>
        <div class="long-div-right">
          <h1 class="H1" id="u24147-2">BANC RIVER LUXURY<span>527 CORONATION DR, TOOWONG</span></h1>
          <p class="Body-Grey">Presiding over a glorious stretch of first class riverfront, Banc is a new destination
            for elite living. With most levels hosting just two or three layouts, all with floor-to-ceiling glass
            sliders, dramatic 2.75 metre ceilings, and full-sized balconies, broad panoramic views of the Brisbane
            River stretch from each of Banc’s 33 residences. An elegant design statement of grand flourishes and
            graceful proportions, Banc’s three and five bedroom residences cast an evocative presence over the Brisbane
            landscape. For more information visit: bancliving.com</p>
          <div class="sub-btn">
          </div>
        </div>
      </div>
    </div>
    <div class="H1 clearfix colelem" id="u24142-4" data-muse-uid="U24142" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc">
      <!-- content -->
      <h1>PAST PROJECTS</h1>
    </div>






    <div class="long-div-container width-flex">
      <div class="long-div-flex-hor">
        <div class="long-div-top">
          <img src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/haven.jpg" />
        </div>
        <div class="long-div-bottom">
          <h1 class="H1" id="u24147-2">HAVEN<span>NEWSTEAD</span></h1>
          <p class="Body" id="u23862-7">A new residential destination precinct on Skyring Terrace. Call it an urban
            retreat, an oasis in the sky, or simply a new benchmark in city living.</p>
          <div class="sub-btn btm">
            <a class="nonblock nontext Button gradient rounded-corners clearfix grpelem" id="buttonu23855" href="haven.html"
              data-href="page:U19880" data-muse-uid="U23855">
              <div class="clearfix grpelem" id="u23856-4" data-muse-uid="U23856" data-muse-type="txt_frame">
                <p>VIEW PROJECT</p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="long-div-flex-hor">
        <div class="long-div-top">
          <img src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/walan.jpg" />
        </div>
        <div class="long-div-bottom">
          <h1 class="H1" id="u24147-2">WALAN<span>KANGAROO POINT</span></h1>
          <p class="Body" id="u23862-7">From the finest of bespoke details to the dramatic sculptural form, Walan is an
            unmatched residential opportunity.</p>
          <div class="sub-btn btm">
            <a class="nonblock nontext Button gradient rounded-corners clearfix grpelem" id="buttonu23855" href="walan.html"
              data-href="page:U19880" data-muse-uid="U23855">
              <div class="clearfix grpelem" id="u23856-4" data-muse-uid="U23856" data-muse-type="txt_frame">
                <p>VIEW PROJECT</p>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>
    <div class="long-div-container width-flex">
      <div class="long-div-flex-hor">
        <div class="long-div-top">
          <img src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/zahra.jpg" />
        </div>
        <div class="long-div-bottom">
          <h1 class="H1" id="u24147-2">ZAHRA<span>NEW FARM</span></h1>
          <p class="Body" id="u23862-7">Zahra’s vision is to create an iconic riverside address through its unique
            architecture and a rich, opulent material palette.</p>
          <div class="sub-btn btm">
            <a class="nonblock nontext Button gradient rounded-corners clearfix grpelem" id="buttonu23855" href="zahra.html"
              data-href="page:U19880" data-muse-uid="U23855">
              <div class="clearfix grpelem" id="u23856-4" data-muse-uid="U23856" data-muse-type="txt_frame">
                <p>VIEW PROJECT</p>
              </div>
            </a>
          </div>
        </div>
      </div>
      <div class="long-div-flex-hor">
        <div class="long-div-top">
          <img src="http://mama.com.au/simoncaulfield/wp-content/uploads/2019/02/silt.jpg" />
        </div>
        <div class="long-div-bottom">
          <h1 class="H1" id="u24147-2">SILT APARTMENTS<span>KANGAROO POINT</span></h1>
          <p class="Body" id="u23862-7">Located on the bank of the Brisbane River in the exclusive peninsula community
            of Kangaroo Point, Silt is a symphony of open living spaces and natural elements, next to the Story Bridge.</p>
          <div class="sub-btn btm">
            <a class="nonblock nontext Button gradient rounded-corners clearfix grpelem" id="buttonu23855" href="silt.html"
              data-href="page:U19880" data-muse-uid="U23855">
              <div class="clearfix grpelem" id="u23856-4" data-muse-uid="U23856" data-muse-type="txt_frame">
                <p>VIEW PROJECT</p>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>

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


  <?php get_footer(); ?>