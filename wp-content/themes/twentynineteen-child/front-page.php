<?php

/**
 * front page template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();

?>

<script>
    var vidHolder = [];
</script>

<?php





function get_month()
{
    $month = date('m');
    $monthName = '';
    if ($month == 1) {
        $monthName = "January";
    }
    if ($month == 2) {
        $monthName = "February";
    }
    if ($month == 3) {
        $monthName = "March";
    }
    if ($month == 4) {
        $monthName = "April";
    }
    if ($month == 5) {
        $monthName = "May";
    }
    if ($month == 6) {
        $monthName = "June";
    }
    if ($month == 7) {
        $monthName = "July";
    }
    if ($month == 8) {
        $monthName = "August";
    }
    if ($month == 9) {
        $monthName = "September";
    }
    if ($month == 10) {
        $monthName = "October";
    }
    if ($month == 11) {
        $monthName = "November";
    }
    if ($month == 12) {
        $monthName = "December";
    }

    return  $monthName;
}

//query front page videos
$the_query = new WP_Query(
    array(
        'post_type' => 'Our_videos',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC',
        //Filter taxonomies by terms
        'tax_query' => array(
            array(
                'taxonomy' => 'classification',
                'terms' => 123,
                'field' => 'term_id'
            )
        )
    )
);




if ($the_query->have_posts()) : ?>
    <!-- the loop -->
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <?php
        $ID = get_the_id();
        $post_title = get_the_title();
        $post_date = get_the_date('l F j, Y');
        $featured_video = get_field('featured_video', $ID);
        $video_id = get_field('video_id', $ID);
        $video_title = get_field('video_title', $ID);
        $start_second = get_field('start_second', $ID);
        $end_seconds = get_field('end_seconds', $ID);
        $suggested_video_quality = get_field('suggested_video_quality', $ID);
        $cost_of_property = number_format(get_field('cost_of_property', $ID));
        $status = get_field('status', $ID);

        if ($start_second == '') {
            $start_second = 0;
        }
        if ($end_seconds == '') {
            $end_seconds = 0;
        }

        /*
  echo 'cost_of_property=' . $cost_of_property . '<br>';
  echo 'ID=' . $ID . '<br>';
  echo 'post_title=' . $post_title . '<br>';
 echo 'featured_video.=' . $featured_video . '<br>';
 echo 'video_title=' . substrwords($video_title ,30). '<br>'; 
 echo 'video_id=' . $video_id . '<br>';
 echo 'start_second=' . $start_second . '<br>';
  echo 'end_seconds=' . $end_seconds . '<br>';
  echo 'suggested_video_quality=' . $suggested_video_quality . '<br>';
*/

        ?>

        <script>
            var tempObj = {
                'videoId': '<?php echo $video_id; ?>',
                'video_title': '<?php echo  substrwords($video_title, 37) ?>',
                'video_title_full': '<?php echo  $video_title ?>',
                'startSeconds': <?php echo  $start_second; ?>,
                'endSeconds': <?php echo $end_seconds; ?>,
                'suggestedQuality': 'hd720',
                'cost_of_property': '<?php echo $cost_of_property; ?>',
                'status': '<?php echo $status; ?>'
            }
            vidHolder.push(tempObj);
        </script>

    <?php endwhile; ?>
    <!-- end of the loop -->



    <?php wp_reset_postdata(); ?>
<?php else : ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>



<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="home-page">



            <div class="lds-ellipsis-holder">
                <div class="lds-ellipsis">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="tv">
                <div class="screen mute" id="tv"></div>
            </div>
            <div class="home-page-inner" style="display:block">
                <div class="home-page-inner-overlay" style="display:block">
                    <div class="home-page-top">
                        <div class="home-logo">
                            <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/09/cs-logo-full.svg" />
                        </div>
                        <div class="home-content">
                            <?php
                            if (have_posts()) {

                                // Load posts loop.
                                while (have_posts()) {
                                    the_post();
                                    //get_template_part( 'template-parts/content/content' );
                                    the_content();
                                }

                                // Previous/next page navigation.
                                twentynineteen_the_posts_navigation();
                            } else {

                                // If no content, include the "No posts found" template.
                                get_template_part('template-parts/content/content', 'none');
                            }
                            ?>
                        </div>
                        <div class="cover">
                            <div class="hi">Click <span>here</span> to <em>un</em>mute &
                                <span>here</span> to see another vidHolder (<em>0</em> of <em>0</em>)
                            </div>
                        </div>
                        <div class="home-btn">
                            <a href="<?php echo site_url(); ?>/property/" class="btn white">VIEW EXCLUSIVE HOMES</a>
                        </div>
                    </div>
                    <div class="home-page-lower desktop-display">

                        <div class="feature-listings-flex fv-2">
                            <div class="feature-listings-flex-inner">
                                <div class="feature-listings-flex-inner-content"><a class="featured-video-btn featured-video-btn2 link-type" href="<?php echo get_home_url(); ?>/market-reports" data-id="299999999999999">
                                        <span class="price"><?php echo get_month(); ?></span><span class="title">New Monthly<br> Market reports</span></a></div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="home-page-lower mobile-display" style="display:none;">

            <div class="feature-listings-flex fv-2">
                <div class="feature-listings-flex-inner">
                    <div class="feature-listings-flex-inner-content"><a class="featured-video-btn featured-video-btn2 link-type" href="<?php echo get_home_url(); ?>/market-reports" data-id="299999999999999">
                            <span class="price"><?php echo get_month(); ?></span><span class="title">New Monthly Market reports</span></a></div>
                </div>
            </div>

        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->
<script>
    ///// home video

    var tag = document.createElement('script');
    tag.src = 'https://www.youtube.com/player_api';
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    var tv, time_update_interval, tv_title
    playerDefaults = {
        autoplay: 0,
        autohide: 1,
        modestbranding: 0,
        rel: 0,
        disablekb: 0,
        showinfo: 0,
        controls: 0,
        fs: 0,
        enablejsapi: 0,
        iv_load_policy: 3
    };
    var vidHolderxxxxxxx = [{
            'videoId': '4LnS8X4couw', //72
            'startSeconds': 20,
            'endSeconds': 50,
            'suggestedQuality': 'hd720'
        },
        {
            'videoId': '122Bxyj9yLM', //183
            'startSeconds': 140,
            'endSeconds': 170,
            'suggestedQuality': 'hd720',
        },
        {
            'videoId': 'F64pAPno3XQ', //32
            'startSeconds': 10,
            'endSeconds': 32,
            'suggestedQuality': 'hd720'
        },
        {
            'videoId': 'ZrxJ4-HjFCo', //35.4
            'startSeconds': 10,
            'endSeconds': 30,
            'suggestedQuality': 'hd720'
        },
        {
            'videoId': '9Mqj7F0MkpM', //34.2
            'startSeconds': 10,
            'endSeconds': 30,
            'suggestedQuality': 'hd720'
        }
    ];
    var randomVid = Math.floor(Math.random() * vidHolder.length),
        currVid = randomVid;

    jQuery('.hi em:last-of-type').html(vidHolder.length);

    function onYouTubePlayerAPIReady() {
        tv = new YT.Player('tv', {
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange,
                'onError': onPlayerError
            },
            playerVars: playerDefaults
        });
    }

    function onPlayerError(e) {
        console.log(e)
    }

    function onPlayerReady() {
        tv.loadVideoById(vidHolder[currVid]);
        tv.mute();
    }

    function formatTime(time) {
        time = Math.round(time);
        var minutes = Math.floor(time / 60),
            seconds = time - minutes * 60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        return minutes + ":" + seconds;
    }

    function onPlayerStateChange(e) {
        console.log("onPlayerStateChange e.data=" + e.data);
        if (e.data === 1) { ///playing
            console.log("inside e.data === 1");
            jQuery('#tv').addClass('active');
            //Get video title
            tv_title = tv.getVideoData().title;
            //activeVideoLink
            jQuery('.feature-listings-flex').removeClass('active');
            jQuery('.fv-' + currVid).addClass('active');

            jQuery('.home-page-lower > div:last-of-type').removeClass('active');

            jQuery('.hi em:nth-of-type(2)').html(currVid + 1);
            console.log("playing video number =" + currVid);

            //get the video duration


            // var startTime =vidHolder[currVid].startSeconds;
            //var endTime =vidHolder[currVid].endSeconds;
            console.log("getDuration=" + formatTime(tv.getDuration()));
            if (formatTime(tv.getDuration()) > 10) {}
            initializeProgressBar();
        } else if (e.data === 0) {
            console.log("******inside e.data === 0");
            jQuery('#tv').removeClass('active');
            if (currVid === vidHolder.length - 1) {
                currVid = 0;
            } else {
                currVid++;
            }
            tv.loadVideoById(vidHolder[currVid]);
            tv.seekTo(vidHolder[currVid].startSeconds);
            console.log("%%%%%%%%%% playing video number =" + currVid);
        }
    }

    jQuery(document).on('click', '.featured-video-btn', function() {
        if (!jQuery(this).hasClass("link-type")) {
            currVid = parseInt(jQuery(this).attr("data-id"));
            tv.loadVideoById(vidHolder[currVid]);
            tv.mute();
            //activeVideoLink
            jQuery('.feature-listings-flex').removeClass('active');
            jQuery('.fv-' + currVid).addClass('active');
            jQuery('.home-page-lower > div:last-of-type').removeClass('active');
        }
    });

    function initializeProgressBar() {

        // Update the controls on load
        updateProgressBar();

        // Clear any old interval.
        clearInterval(time_update_interval);

        // Start interval to update elapsed time display and
        // the elapsed part of the progress bar every second.
        time_update_interval = setInterval(function() {
            updateProgressBar();
        }, 1000)
    }

    // This function is called by initialize()
    function updateProgressBar() {
        // Update the value of our progress bar accordingly.
        console.log((tv.getCurrentTime() / tv.getDuration()) * 100);
        jQuery('#progress-bar .bar').css("width", (tv.getCurrentTime() / tv.getDuration()) * 100 + "%");
    }

    function vidRescale() {

        var w = jQuery(window).width() + 200,
            h = jQuery(window).height() + 200;

        if (w / h > 16 / 9) {
            tv.setSize(w, w / 16 * 9);
            jQuery('.tv .screen').css({
                'left': '0px'
            });
        } else {
            tv.setSize(h / 9 * 16, h);
            jQuery('.tv .screen').css({
                'left': -(jQuery('.tv .screen').outerWidth() - w) / 2
            });
        }
    }
    jQuery(window).on('load resize', function() {
        vidRescale();
    });
    jQuery('.hi span:first-of-type').on('click', function() {
        jQuery('#tv').toggleClass('mute');
        jQuery('.hi em:first-of-type').toggleClass('hidden');
        if (jQuery('#tv').hasClass('mute')) {
            tv.mute();
        } else {
            tv.unMute();
        }
    });
    jQuery('.hi span:last-of-type').on('click', function() {
        jQuery('.hi em:nth-of-type(2)').html('~');
        tv.pauseVideo();
    });
    jQuery('.hi span:last-of-type').on('click', function() {
        jQuery('.hi em:nth-of-type(2)').html('~');
        tv.pauseVideo();
    });
</script>
<script>
    jQuery(document).ready(function() {
        jQuery.each(vidHolder, function(index, value) {
            // alert(index + ": " + value);
            console.log("value.cost_of_property=" + value.cost_of_property)
            if (value.cost_of_property == 0) {
                value.cost_of_property = '&nbsp;<br>';
            } else {
                value.cost_of_property = '$' + value.cost_of_property;
            }
            jQuery('.home-page-lower.desktop-display').prepend('<div class="feature-listings-flex fv-' + index + '"><div class="feature-listings-flex-inner"><div class="feature-listings-flex-inner-content"><a class="featured-video-btn featured-video-btn2" href="#" data-id=' + index + '><span class="price">' + value.cost_of_property + '</span><span class="title">' + value.status + ' ' + value.video_title + '</span></a></div></div></div>');
            jQuery('.home-page-lower.mobile-display').prepend('<div class="feature-listings-flex fv-' + index + '"><div class="feature-listings-flex-inner"><div class="feature-listings-flex-inner-content"><a class="featured-video-btn featured-video-btn2" href="#" data-id=' + index + '><span class="price">' + value.cost_of_property + '</span><span class="title">' + value.status + ' ' + value.video_title_full + '</span></a></div></div></div>');

        });
    })
</script>
<?php
get_footer();
