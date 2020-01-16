<?php global $smof_data; //get theme options ?>

			<?php if(isset($smof_data['header_social']) && ($smof_data['header_social'] != 0)) { ?>
				<ul id="header-social">
					<?php
						$social_links = array('rss','facebook','twitter','flickr','google-plus', 'dribbble' , 'linkedin', 'pinterest', 'youtube', 'github-alt', 'vimeo-square', 'instagram', 'tumblr', 'behance', 'vk', 'xing', 'soundcloud', 'codepen', 'yelp', 'slideshare', 'tripadvisor', '500px', 'foursquare', 'houzz');
						if($social_links) {
							foreach($social_links as $social_link) {
								if(!empty($smof_data[$social_link])) { echo '<li><a href="'. esc_url($smof_data[$social_link]) .'" title="'. $social_link .'" class="'.$social_link.'"  target="_blank"><i class="fa fa-'.$social_link.'"></i></a></li>';
								}								
							}
							if(!empty($smof_data['skype'])) { echo '<li><a href="skype:'. $smof_data['skype'] .'?call" title="'. $smof_data['skype'] .'" class="'.$smof_data['skype'].'"  target="_blank"><i class="fa fa-skype"></i></a></li>';
							}							
						}
					?>					
				</ul>
				<?php } ?>	

			<?php if($smof_data['search_header'] === '1') { ?>
				<div class="searchform-switch">
					<i class="fa fa-search"></i>
					<i class="fa fa-times-circle"></i>
				</div>
				
				<form class="header-search-form display-none" method="get" action="<?php echo home_url(); ?>/">
					<input class="header-search-input" type="text" placeholder="<?php echo __("Search...", "delicious"); ?>" id="s" name="s" value="<?php the_search_query(); ?>">
					<button type="submit">
						<i class="fa fa-search"></i>
					</button>
				</form>		
			<?php } ?>								

				<?php if (function_exists('delicious_language_selector')) { ?>
					<div class="flags_language_selector <?php if(isset($smof_data['header_scheme']) && ($smof_data['header_scheme'] == 'dark-header')) { echo 'dark-things'; } ?>"><?php delicious_language_selector(); ?></div>
				<?php } ?>	
