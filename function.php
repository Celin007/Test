<?php
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}


function change_page_menu_classes($menu)
{
	$ifRESearch = (bool)is_search();
	$isRENot = (bool)is_404();
	
	if (($ifRESearch != 1) && ($isRENot != 1)) 
	{
   foreach (get_the_category() as $category) {
    if ( $category->name == 'Strand A - Scripture and Jesus' ) {
       $menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-2335', 'menu-item-2335 current-menu-item', $menu ); // add the current_page_parent class to the page you want
		  $menu = str_replace( 'menu-item-1231', 'menu-item-1231 current_page_parent', $menu ); // add the current_page_parent class to the page you want
		 
    }
	 else  if ( $category->name == 'Strand B - Church and Community' ) {
		 $menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-2825', 'menu-item-2825 current-menu-item', $menu ); // add the current_page_parent class to the page you want
		  $menu = str_replace( 'menu-item-1231', 'menu-item-1231 current_page_parent', $menu ); // add the current_page_parent class to the page you want
		
    }
	   
	   	 else  if ( $category->name == 'Strand C - God, Religion and Life' ) {
			
				   $menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-3599', 'menu-item-3599 current-menu-item', $menu ); // add the current_page_parent class to the page you want
		  $menu = str_replace( 'menu-item-1231', 'menu-item-1231 current_page_parent', $menu ); // add the current_page_parent class to the page you want
			
     
		
    }
	   
	   	 else  if ( $category->name == 'Strand D - Prayer, Liturgy and Sacraments' ) {
		
       $menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-3642', 'menu-item-3642 current-menu-item', $menu ); // add the current_page_parent class to the page you want
		  $menu = str_replace( 'menu-item-1231', 'menu-item-1231 current_page_parent', $menu ); // add the current_page_parent class to the page you want
		
    }
	   
	   
	   	 else  if ( $category->name == 'Strand E - Morality and Justice' ) {
		
       $menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-3662', 'menu-item-3642 current-menu-item', $menu ); // add the current_page_parent class to the page you want
		  $menu = str_replace( 'menu-item-1231', 'menu-item-1231 current_page_parent', $menu ); // add the current_page_parent class to the page you want
		
    }
	   
   }
	      
   }
	else if($ifRESearch == 1){
		 $menu = str_replace( 'current-menu-item', '', $menu ); // remove all current_page_parent classes
        $menu = str_replace( 'menu-item-2351', 'menu-item-2351 current-menu-item', $menu ); // add the current_page_parent class to the page you want
		
		//highlight search menu item 
	}
  
    return $menu;
}
add_filter( 'nav_menu_css_class', 'change_page_menu_classes', 10,2 );

if (!function_exists('is_search')) {
function is_search() {
	global $wp_query;

	if ( ! isset( $wp_query ) ) {
		_doing_it_wrong( __FUNCTION__, __( 'Conditional query tags do not work before the query is run. Before then, they always return false.' ), '3.1.0' );
		return false;
	}

	return $wp_query->is_search();
}}




?>

<?php
if (!function_exists('minimal_blocks_display_inner_header')) :
    
    function minimal_blocks_display_inner_header()
    { ?>
        <?php
        $header_image = '';
        if (has_header_image()) {
            $header_image = 'data-bg';
        }
        ?>
        <header class="inner-banner <?php echo esc_attr($header_image); ?>" <?php if (has_header_image()) { ?> data-background="<?php echo esc_url(get_header_image()); ?>" <?php }
        ?> >
            <?php if (is_singular()) { ?>
              
                <div class="thememattic-header">
                    <div class="tm-wrapper">
                        <div class="meta-categories-1">
                            <?php minimal_blocks_entry_category(); ?>
                        </div>
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                        <?php if (!is_page()) {
                            global $post;
                            $author_id = $post->post_author;
                            ?>
                            <div class="entry-header">
                                <div class="meta-group">
                                     <span class="entry-meta post-author">
                                        <span class="author-avatar">
                                            <img src="<?php echo get_avatar_url($author_id, 'size = 200'); ?>">
                                        </span>
                                        <a href="<?php echo esc_url(get_author_posts_url($author_id, get_the_author_meta('user_nicename'))); ?>">
                                            <?php echo esc_html(get_the_author_meta('display_name', $author_id)); ?>
                                        </a>
                                    </span>
                                    <?php minimal_blocks_posted_date_only(); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
					
					
					  <div class="thememattic-breadcrumb">
                    <div class="tm-wrapper">
                        <?php
                        /**
                         * Hook - minimal_blocks_display_breadcrumb.
                         *
                         * @hooked minimal_blocks_breadcrumb_content - 10
                         */
                        do_action('minimal_blocks_display_breadcrumb');
						
                        ?>
                    </div>
                </div>
                </div>
            <?php } else {
                
                $breadcrumb_type = minimal_blocks_get_option( 'breadcrumb_type', true );
                if ( 'disabled' === $breadcrumb_type ) {
                    return;
                }
                // Bail if Home Page.
                if ( is_front_page() || is_home() ) {
                    return;
                } ?>
                
                <div class="thememattic-header">
                    <div class="tm-wrapper">
                        <?php if (is_404()) { ?>
                            <h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'minimal-blocks'); ?></h1>
                        <?php } elseif (is_archive()) {
                            the_archive_title('<h1 class="entry-title">', '</h1>');
                            the_archive_description('<div class="taxonomy-description">', '</div>');
                        } elseif (is_search()) { ?>
                            <h1 class="entry-title"><?php printf(esc_html__('Search Results for: %s', 'minimal-blocks'), '<span>' . get_search_query() . '</span>'); ?></h1>
                        <?php } else { ?>
                            <h1 class="entry-title"></h1>
                        <?php }
                        ?>
                    </div>
					
					<div class="thememattic-breadcrumb">
                    <div class="tm-wrapper">
                        <?php
                        /**
                         * Hook - minimal_blocks_display_breadcrumb.
                         *
                         * @hooked minimal_blocks_breadcrumb_content - 10
                         */
                        do_action('minimal_blocks_display_breadcrumb');
                        ?>
                    </div>
                </div>
                </div>
            <?php } ?>
            <?php $enable_header_images = minimal_blocks_get_option('enable_header_overlay', false);
            if ($enable_header_images == false) {
               ?> <div class="header-image-overlay"></div> <?php
            }
            ?>
        </header>
    <?php }
endif;
add_action('minimal_blocks_inner_header', 'minimal_blocks_display_inner_header');


add_action('wp_footer', 'asp_add_script_to_footer', 999999);
function asp_add_script_to_footer() {
	?>
	<script>
	jQuery(function($){
		$('.asp_option_label').each(function(){
			//alert($(this).text().trim());
			if ( $(this).text().trim() == 'Strand E - Morality and Justice' ) {
				$(this).addClass('new-filter');
			}
		});
	});
	</script>

<?php
}





// Code to redirect Category archive page to custom landing page for unit pages  
function redirect_page() {

     if (isset($_SERVER['HTTPS']) &&
        ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
        isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
        $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
        $protocol = 'https://';
        }
        else {
        $protocol = 'http://';
    }

    $currenturl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $currenturl_relative = wp_make_link_relative($currenturl);

    switch ($currenturl_relative) {
    
        case '/curriculum-content/strands/category/a/':
            $urlto = home_url('/curriculum-content/strands/strand-a/');
            break;
			
			 case '/curriculum-content/strands/a/':
            $urlto = home_url('/curriculum-content/strands/strand-a/');
            break;
			
			 case '/curriculum-content/strands/category/b/':
            $urlto = home_url('/curriculum-content/strands/strand-b/');
            break;
			
			 case '/curriculum-content/strands/b/':
            $urlto = home_url('/curriculum-content/strands/strand-b/');
            break;
			
			case '/curriculum-content/strands/category/c/':
            $urlto = home_url('/curriculum-content/strands/strand-c/');
            break;
			
			
			 case '/curriculum-content/strands/c/':
            $urlto = home_url('/curriculum-content/strands/strand-c/');
            break;
			
				
			case '/curriculum-content/strands/category/d/':
            $urlto = home_url('/curriculum-content/strands/strand-d/');
            break;
			
			 case '/curriculum-content/strands/d/':
            $urlto = home_url('/curriculum-content/strands/strand-d/');
            break;
			
				
			case '/curriculum-content/strands/category/e/':
            $urlto = home_url('/curriculum-content/strands/strand-d/');
            break;
			
			 case '/curriculum-content/strands/d/':
            $urlto = home_url('/curriculum-content/strands/strand-e/');
            break;
        
        default:
            return;
    
    }
    
    if ($currenturl != $urlto)
        exit( wp_redirect( $urlto ) );


}
add_action( 'template_redirect', 'redirect_page' );


function wpb_hook_javascript_footer() {
    ?>
        <script>
		var v = document.getElementsByName("namedirectory_Assessment");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");
			
		var v = document.getElementsByName("namedirectory_AssessmentAS");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
			
		var v = document.getElementsByName("namedirectory_AssessmentFOR");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
		
			
		var v = document.getElementsByName("namedirectory_CoreContent");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");
			
		var v = document.getElementsByName("namedirectory_CrossCurriculumPriorities");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
			
		var v = document.getElementsByName("namedirectory_Doctrine");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
		
		
		var v = document.getElementsByName("namedirectory_EnduringUnderstanding");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");
			
		var v = document.getElementsByName("namedirectory_EssentialQuestions");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
			
		var v = document.getElementsByName("namedirectory_LearningFocus");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
		
		var v = document.getElementsByName("namedirectory_KeyInquiryQuestion");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");
			
		var v = document.getElementsByName("namedirectory_Outcomes");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
			
		var v = document.getElementsByName("namedirectory_Scripture");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");		
			
				var v = document.getElementsByName("namedirectory_StatementsofLearning");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");
			
		var v = document.getElementsByName("namedirectory_Strand");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
			
		var v = document.getElementsByName("namedirectory_SuccessCriteria");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
		
		
		var v = document.getElementsByName("namedirectory_ReligiousEducationPriorities");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");
			
		var v = document.getElementsByName("namedirectory_TheGeneralCapabilities");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");	
		
		var v = document.getElementsByName("namedirectory_UnitOverview");
		v[0].nextElementSibling.setAttribute("class", "re-syllabus-glossary");
		
		
		
			
        </script>


    <?php
}
add_action('wp_footer', 'wpb_hook_javascript_footer');


function custom_excerpt_length( $length ) {
    return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );






