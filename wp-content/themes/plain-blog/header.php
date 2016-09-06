<?php
/**
 * This file is responsible for the rendering of the header of the theme.
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

<?php if (is_single())
{
    $ex_header = get_post_meta($post->ID,ex_header,true);
    if($ex_header)
    {
        echo $ex_header;
    }
}
?>

    <link rel="stylesheet" href="/dat/githubgist.style.css"/>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/faviconmayu.gif" />
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    wp_head();
    ?>



</head>
<body <?php body_class(); ?>>
    <!--main_container-->
    <div id="headerbar_fix">
        <div id="headerbar">
            <!-- <div id="h_menu">
                <img src="/wp-content/themes/plain-blog/menu.png" height="40" width="40">
                <div id="h_menu_item"></div>
            </div> -->
            <div id="title_img"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/panyamohi_title.png" height="40" width="128"></a></div>
            <?php get_template_part('searchform_h'); ?>
            <div id="h_menu">
                <img src="/wp-content/themes/plain-blog/menu.png" height="40" width="40">
                <div id="h_menu_item"></div>
            </div>
        </div>
    </div>
    <div class="clear_fix"></div>
    <div id="main_container">
        <div class="col-md-12 no-padding">
            <div class="header_">
                <div class="container_">
                    <div class="pull-left_">
                        <!-- <a href="<?php /*echo esc_url(home_url());*/ ?>" class="logo_"> -->
						<?php if(is_home() && is_front_page()) { ?>
							<h1></h1>
                        <?php }
						   else {
						 ?>
                      	 	<!-- <p><?php /*bloginfo('name');*/ ?></p> -->
                        <?php } ?>     
                        </a>
                    </div>
                    <div class="pull-right_">
                        <div id='navigation_'>
                              <?php if ( has_nav_menu( 'primary' ) ) { ?>
                                <?php wp_nav_menu( 
										array( 
											'theme_location' => 'primary',
											'container' => '',
											'menu_class' => '',
											'items_wrap' => '<ul>%3$s</ul>',
											'walker' => new DropDown_Nav_Menu()
                                		) ); 
								?>
                              <?php } else{ ?>  
                                <ul class="menu clearfix_">
										<?php wp_list_categories('title_li='); ?>
									</ul>
                                <?php } ?>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="banner_heading_ header_bg_">
                <div class="clearfix_"></div>
        </div>
        
        <div class="clearfix_"></div>
        <!--middle section Start here-->
        <div class="middle_section col-md-12">
            <!--container start-->
            <div class="container">
                <!--row start-->
                <div class="row">
           