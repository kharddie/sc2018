<?php global $smof_data;
?>

<footer id="footer">

  <div class="centered-wrapper">
    <?php
    if (is_active_sidebar('top-footer')) : ?>
      <div id="topfooter">
        <?php dynamic_sidebar('top-footer'); ?>
      </div>
      <!--end topfooter-->
    <?php endif; ?>

  </div>
  <!--end centered-wrapper-->

  <?php
  $fclass = '';
  if (isset($smof_data['footer_layout'])) {
    if ($smof_data['footer_layout'] == 2) {
      $fclass = 'cfooter';
    }
  }
  ?>

  <div id="bottomfooter" <?php if ($fclass != '') {
                            echo 'class="' . $fclass . '"';
                          } ?>>
    <div class="centered-wrapper upper">
      <div class="flex-grid">
        <div>
          <h1 class="H1-Grey">CONTACT SIMON CAULFIELD</h1>
          <div class="contact">
            <span>Phone: 0437 935 912</span>
            <span>|</span>
            <span>Email: sc@eplace.com.au</span>
          </div>

          <h1 class="H1-Grey">SIMON CAULFIELD PROPERTY UPDATES</h1>

          <p class="Body-Grey"> Enter your details below to receive the latest property news from the Simon Caulfield
            team
            including our upcoming projects and events.</p>

          <div class="sub-btn">
            <div class="createsend-button" style="height:27px;display:inline-block;" data-listid="i/BE/B2E/E7F/D4BDF26B90917DEB">
            </div>
            <script type="text/javascript">
              (function() {
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

        <div>
          <h1 class="H1-Grey">COMMUNITY WORK &amp; SPONSORSHIPS</h1>
          <div>
            <p class="Body-Grey"> Continually strengthening community relationships, Simon is involved with and
              sponsors
              many
              charities & organisations including coaching the Under 9 Rosella's Soccer team from New Farm United
              Soccer
              Club,
              and raising awareness for Autism & Male Youth Depression, all in his personal time.</p>

            <p class="Body-Grey">Simon would encourage donations to any of these worthwhile groups.</p>
          </div>
          <div class="footer-logos">
            <a class="nonblock nontext clip_frame grpelem" id="u7821" href="http://www.autismawareness.com.au/" target="_blank">
              <img class="block" id="u7821_img" src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/02/autism-awareness-logo.jpg" alt="" width="117" height="33"></a>
            <a class="nonblock nontext clip_frame grpelem" id="u2038" href="http://www.beyondblue.org.au/" target="_blank" data-muse-uid="U2038" data-muse-type="img_frame">
              <!-- image --><img class="block" id="u2038_img" src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/02/beyond-blue-logo.jpg" data-hidpi-src="images/beyond-blue-logo_2x.jpg?crc=363486227" alt="" width="131" height="73"></a>
          </div>

        </div>
      </div>

    </div>
    <!--end centered-wrapper-->
    <div class="footer-bottom">
      <div class="centered-wrapper lower">
        <div class="flex-grid">
          <div>
            <p class="copy-r">© Copyright 2019 Simon Caulfield. Website by <a class="nonblock" href="http://www.mama.com.au" target="_blank"><span id="u23917-2">MAMA</span></a></p>
          </div>
          <div class="footer-social">
            <a class="nonblock nontext Button rounded-corners clearfix grpelem" id="buttonu23925" href="privacy-policy.html" data-href="page:U14674">
              <!-- container box -->
              <div class="clearfix grpelem" id="u23926-4">
                <!-- content -->
                <p>Privacy Policy</p>
              </div>
            </a>
            <a class="nonblock nontext transition clip_frame grpelem" id="u23921" href="https://au.linkedin.com/pub/simon-caulfield/4a/a9/146" target="_blank">
              <!-- svg --><img class="svg" id="u23922" src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/02/linkedin.svg" width="25" height="25" alt=""></a>
            <a class="nonblock nontext transition clip_frame grpelem" id="u23919" href="https://www.facebook.com/pages/Simon-Caulfield-Premium-Properties/152644954748355" target="_blank">
              <!-- svg --><img class="svg" id="u23920" src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/02/facebook.svg" width="25" height="25" alt=""></a>
            <a class="nonblock nontext transition clip_frame grpelem" id="u23923" href="https://instagram.com/simon_sells_property/" target="_blank">
              <!-- svg --><img class="svg" id="u23924" src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/02/instagram.svg" width="25" height="25" alt=""></a>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!--end bottomfooter-->

  <a href="#" class="totop"><i class="fa fa-angle-double-up"></i></a>

</footer>
<!--end footer-->
</div>
<!--end wrapper-->

<?php wp_footer(); ?>

<script>
  function getScrollDist(scrollTop, docHeight, windHeight, whichDivPos, whichDivPosConst) {
    scrollPos = (scrollTop / (docHeight - windHeight));
    var poss = (parseInt(whichDivPos) * scrollPos);
    var position = whichDivPosConst - poss;
    console.log("  blackLeftScrollPosConst=" + whichDivPosConst + "  scrollPos=" + scrollPos + "   position=" + position);
    return position;
  }

  jQuery(document).ready(function() {
    jQuery(".nav-btn-left").on("click", function() {
      var el = jQuery("#menu-close");
      var leftMenu = jQuery(".left-menu");
      if (el.text() == el.data("text-swap")) {
        el.text(el.data("text-original"));
        leftMenu.animate({
          "left": "-193"
        }, "slow");
      } else {
        el.data("text-original", el.text());
        el.text(el.data("text-swap"));

        leftMenu.animate({
          "left": "0"
        }, "slow");
      }
    });

    if (pageId === 368) {

      jQuery("#wrapper").addClass("remove-bg");
      jQuery("#footer").addClass("hide-footer");
      jQuery("html body").addClass("projects-bg");


    } else {

      jQuery("#wrapper").removeClass("remove-bg");
      jQuery("#footer").removeClass("hide-footer");
      jQuery("html body").removeClass("projects-bg");

    }

    //black scroll left
    var blackLeftScrollDiv = jQuery('#slideLeft>.vc_row-o-content-middle.vc_row-flex');
    var blackLeftScrollPos = parseInt(blackLeftScrollDiv.css("left"));
    const blackLeftScrollPosConst = parseInt(blackLeftScrollDiv.css("left"));

    //grey scroll left
    var grayLeftScrollDiv = jQuery('#slideLeftGray>.vc_row-o-content-middle.vc_row-flex');
    var grayLeftScrollPos = parseInt(grayLeftScrollDiv.css("left"));
    const grayLeftScrollPosConst = parseInt(grayLeftScrollDiv.css("left"));

    jQuery(window).scroll(function() {
      var scrollTop = jQuery(this).scrollTop(),
        docHeight = jQuery(document).height(),
        windHeight = jQuery(this).height();

      var blackLeftScrollDivLeft = getScrollDist(scrollTop, docHeight, windHeight, blackLeftScrollPos, blackLeftScrollPosConst);
      var grayLeftScrollDivLeft = getScrollDist(scrollTop, docHeight, windHeight, grayLeftScrollPos, grayLeftScrollPosConst);

      blackLeftScrollDiv.css({
        'left': blackLeftScrollDivLeft
      });

      grayLeftScrollDiv.css({
        'left': grayLeftScrollDivLeft
      });


    });

  })
</script>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</body>

</html>