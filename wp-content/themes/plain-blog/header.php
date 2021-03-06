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
    
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/faviconmayu.gif" />
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="alternate" hreflang="ja" href="/" />
    <?php
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    wp_head();
    ?>
    
    <!-- アナリティクスのインクルード -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/dat/analyticstracking.php" ?>
    <!-- 成功してたらこの間に吐き出されてるはず -->
    
    <!-- FingerPrintのインクルード -->
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . "/dat/fingerprint2.min.js.php" ?>
    <!-- 成功してたらこの間に吐き出されてるはず -->


</head>
<body <?php body_class(); ?>>
    <!--main_container-->
    <div class="headerbar_fix">
        <div class="headerbar">
            <!-- <div id="h_menu">
                <img src="/wp-content/themes/plain-blog/menu.png" height="40" width="40">
                <div id="h_menu_item"></div>
            </div> -->
            <div class="title_img"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/panyamohi_title.png" height="40" width="128"></a></div>
            <?php get_template_part('searchform_h'); ?>
            <div class="h_menu">
                <img src="/wp-content/themes/plain-blog/menu.png" height="40" width="40">
                <div class="h_menu_item">
                    <div class="google_translate_element"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'ja', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: true, gaTrack: true, gaId: 'UA-68910918-1'}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                </div>
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
           