<?php

/*
 Template Name: Exclusive-Homes-Template
 */

get_header();
$post_id = filter_input(INPUT_GET, 'pid');
?>

<section id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="sales page-content">
            <div class="our-people-page-header single-page-header">
                <div class="page-header-fade"></div>
                <div class="page_title">
                    <?php echo get_the_title(); ?>
                </div>
                <?php
                if (has_post_thumbnail()) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail('full');
                }
                ?>
            </div>


            <div class="sales-holder all-page-holder">
                <div class="page-holder-inner two-col-inner" data-aos="fade-up">
                    <div class="page-holder-inner-media-flex">
                        <div class="page-holder-inner-media-left">
                            <img src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/test-2.jpg" />
                            <div class="preview-content">
                                <h2>HEADING TITLE TO BE<br> NO MORE THAN TEN WORDS</h2>
                                <p>Preview text no more than 20 words. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit</p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="page-holder-inner-media-right">
                            <img src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/test-2.jpg" />
                            <div class="preview-content">
                                <h2>HEADING TITLE TO BE<br> NO MORE THAN TEN WORDS</h2>
                                <p>Preview text no more than 20 words. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit</p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="page-holder-inner two-col-inner" data-aos="fade-up">
                    <div class="page-holder-inner-media-flex">
                        <div class="page-holder-inner-media-left">
                            <img src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/test-2.jpg" />
                            <div class="preview-content">
                                <h2>HEADING TITLE TO BE<br> NO MORE THAN TEN WORDS</h2>
                                <p>Preview text no more than 20 words. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit</p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="page-holder-inner-media-right">
                            <img src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/test-2.jpg" />
                            <div class="preview-content">
                                <h2>HEADING TITLE TO BE<br> NO MORE THAN TEN WORDS</h2>
                                <p>Preview text no more than 20 words. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit</p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-holder-inner two-col-inner" data-aos="fade-up">
                    <div class="page-holder-inner-media-flex">
                        <div class="page-holder-inner-media-left">
                            <img src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/test-2.jpg" />
                            <div class="preview-content">
                                <h2>HEADING TITLE TO BE<br> NO MORE THAN TEN WORDS</h2>
                                <p>Preview text no more than 20 words. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit</p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                        <div class="page-holder-inner-media-right">
                            <img src="http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/test-2.jpg" />
                            <div class="preview-content">
                                <h2>HEADING TITLE TO BE<br> NO MORE THAN TEN WORDS</h2>
                                <p>Preview text no more than 20 words. Lorem ipsum dolor sit amet, consectetur
                                    adipiscing elit</p>
                                <div class="small-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn white">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info-container" data-aos="fade-up">
                    <h2>sit amet, consectetuer adipiscing elit. Aenean commodo </h2>
                    <div class="property-details-holder">
                        <div class="property-details-inner property-details-top">
                            4 Bedroom | 3 Bathroom | 1 Media Room | 2 Car Parks
                        </div>
                        <div class="property-details-inner property-details-bottom">
                            123 Address Street, Suburb, Brisbane 4000
                        </div>
                    </div>
                </div>

                <div class="slider-container" data-aos="fade-up">
                    <button class="prev slider-btns"><img src="https://simoncaulfieldproperty.com.au/wordpress99/wp-content/uploads/2019/10/arrow-left.svg"></button>
                    <button class="next slider-btns"><img src="https://simoncaulfieldproperty.com.au/wordpress99/wp-content/uploads/2019/10/arrow-right.svg"></button>
                    <div class="my-slider">
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-1.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>


                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-1.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>


                    </div>
                    <div class="my-slider-thumb-nails">
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-1.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-1.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>
                        <div class="slider-item">
                            <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/test-2.jpg" alt="">
                        </div>
                    </div>
                </div>


                <div class="info-container bottom-div" data-aos="fade-up">
                    <div class="info-container-flex">
                        <div class="info-container-flex-left">
                            <h3>ABOUT THIS PROPERTY</h3>
                            <P>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                sem.</P>
                            <P>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                sem.</P>
                            <P>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget
                                dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
                                nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis,
                                sem.</P>

                            <h3>KEY FEATURES</h3>
                            <ul>
                                <li> Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                                <li> Aenean commodo ligula eget dolor.</li>
                                <li> Aenean massa.</li>
                                <li> Natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
                                <li> Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</li>
                                <li> Nulla consequat massa quis enim.</li>
                                <li> Donec pede justo, fringilla vel, aliquet nec, vulputate</li>
                            </ul>
                            <div class="property-details-btn">
                                <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn black">REQUEST MORE
                                    INFORMATION</a>
                                <div class="share-this">SHARE THIS</div>
                            </div>
                        </div>
                        <div class="info-container-flex-right">

                            <div class="agents-photo">

                                <img src="<?php echo site_url(); ?>/wp-content/uploads/2019/09/director-photo.jpg" alt="">
                            </div>

                            <div class="agents-details">
                                <h3>SIMON CLAUFIELD - DIRECTOR</h3>
                                Phone: 0437 935 912 | Email: sc@eplace.com.au
                                <div class="property-details-btn">
                                    <a href="<?php echo site_url(); ?>/exclusive-homes/" class="btn black">SIMON’S
                                        CREDENTIALS</a>
                                </div>
                            </div>


                            <div class="contact-info">
                                <h3>CONTACT PLACE HQ</h3>
                                Phone: 07 3153 1457<br>
                                Address: 291 Shafston Avenue, Kangaroo Point<br>
                                Office opening hours Monday to Friday 8:30 to 5:30pm<br>
                            </div>







                        </div>
                    </div>
                </div>

                <div id="map" data-aos="fade-up">google map</div>
                <script>
                    jQuery(document).ready(function() {


                        var big_slider = tns({
                            autoWidth: true,
                            loop: false,
                            container: '.my-slider',
                            navContainer: '.my-slider-thumb-nails',
                            items: 1,
                            gutter: 0,
                            navAsThumbnails: true,
                            mouseDrag: false,
                            speed: 400,
                            swipeAngle: false
                        });


                        var small_slider = tns({
                            loop: false,
                            container: '.my-slider-thumb-nails',
                            items: 5,
                            gutter: 20,
                            mouseDrag: true,
                            nav: false,
                            controls: false
                            //axis: "vertical"
                        });

                   
                        let _prev = document.querySelector(".prev"),
                            _next = document.querySelector(".next");

                        _prev.addEventListener('click', () => {
                            big_slider.goTo('prev');
                        });
                        _next.addEventListener('click', () => {
                            big_slider.goTo('next');
                        });


                    });

                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 12,
                            center: {
                                lat: -27.433962,
                                lng: 153.023567
                            },
                            styles: [{
                                "featureType": "water",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#e9e9e9"
                                }, {
                                    "lightness": 17
                                }]
                            }, {
                                "featureType": "landscape",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#f5f5f5"
                                }, {
                                    "lightness": 20
                                }]
                            }, {
                                "featureType": "road.highway",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#ffffff"
                                }, {
                                    "lightness": 17
                                }]
                            }, {
                                "featureType": "road.highway",
                                "elementType": "geometry.stroke",
                                "stylers": [{
                                    "color": "#ffffff"
                                }, {
                                    "lightness": 29
                                }, {
                                    "weight": 0.2
                                }]
                            }, {
                                "featureType": "road.arterial",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#ffffff"
                                }, {
                                    "lightness": 18
                                }]
                            }, {
                                "featureType": "road.local",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#ffffff"
                                }, {
                                    "lightness": 16
                                }]
                            }, {
                                "featureType": "poi",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#f5f5f5"
                                }, {
                                    "lightness": 21
                                }]
                            }, {
                                "featureType": "poi.park",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#dedede"
                                }, {
                                    "lightness": 21
                                }]
                            }, {
                                "elementType": "labels.text.stroke",
                                "stylers": [{
                                    "visibility": "on"
                                }, {
                                    "color": "#ffffff"
                                }, {
                                    "lightness": 16
                                }]
                            }, {
                                "elementType": "labels.text.fill",
                                "stylers": [{
                                    "saturation": 36
                                }, {
                                    "color": "#333333"
                                }, {
                                    "lightness": 40
                                }]
                            }, {
                                "elementType": "labels.icon",
                                "stylers": [{
                                    "visibility": "off"
                                }]
                            }, {
                                "featureType": "transit",
                                "elementType": "geometry",
                                "stylers": [{
                                    "color": "#f2f2f2"
                                }, {
                                    "lightness": 19
                                }]
                            }, {
                                "featureType": "administrative",
                                "elementType": "geometry.fill",
                                "stylers": [{
                                    "color": "#fefefe"
                                }, {
                                    "lightness": 20
                                }]
                            }, {
                                "featureType": "administrative",
                                "elementType": "geometry.stroke",
                                "stylers": [{
                                    "color": "#fefefe"
                                }, {
                                    "lightness": 17
                                }, {
                                    "weight": 1.2
                                }]
                            }]
                        });
                        var geocoder = new google.maps.Geocoder();


                        geocodeAddress(geocoder, map);

                    }

                    function geocodeAddress(geocoder, resultsMap) {
                        var address = "54 Vernon Terrace Teneriffe";
                        geocoder.geocode({
                            'address': address
                        }, function(results, status) {
                            if (status === 'OK') {
                                resultsMap.setCenter(results[0].geometry.location);
                                var marker = new google.maps.Marker({
                                    map: resultsMap,
                                    icon: "http://thedigitaltree.com.au/a/simoncaulfield/wp-content/uploads/2019/09/black-custom-marker.svg",
                                    position: results[0].geometry.location
                                });
                            } else {
                                alert('Geocode was not successful for the following reason: ' + status);
                            }
                        });
                    }
                </script>

            </div>

        </div>
    </main><!-- .site-main -->
</section><!-- .content-area -->

<?php
get_footer();
