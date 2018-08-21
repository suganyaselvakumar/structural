<?php
/**
 * clean Theme Customizer
 *
 * @package Structural     
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function structural_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->selective_refresh->add_partial('service_section_title', array(
        'selector' => '.service-wrapper .section-head', 
    ));
    $wp_customize->selective_refresh->add_partial('image_content_section_title', array(
        'selector' => '.content-section-wrapper .section-head', 
    ));
    $wp_customize->selective_refresh->add_partial('recent_post_section_title', array(
        'selector' => '.post-wrapper .section-head', 
    ));
    $wp_customize->selective_refresh->add_partial('recent_posts_count', array(
        'selector' => '.post-wrapper .latest-posts', 
    ));
    $wp_customize->selective_refresh->add_partial('image_content_section_1', array(
        'selector' => '.content-section-wrapper .service-image-section', 
    ));
    $wp_customize->selective_refresh->add_partial('image_content_section_2', array(
        'selector' => '.content-section-wrapper .service-content', 
    ));
	$wp_customize->selective_refresh->add_partial('service_section_icon_1', array(
        'selector' => '.service-1', 
    ));
    $wp_customize->selective_refresh->add_partial('service_section_1', array(
        'selector' => '.content-1', 
    ));
    $wp_customize->selective_refresh->add_partial('service_section_icon_2', array(
        'selector' => '.service-2', 
    ));
    $wp_customize->selective_refresh->add_partial('service_section_2', array(
        'selector' => '.content-2', 
    ));
    $wp_customize->selective_refresh->add_partial('service_section_icon_3', array(
        'selector' => '.service-3', 
    ));
    $wp_customize->selective_refresh->add_partial('service_section_3', array(
        'selector' => '.content-3', 
    ));
    $wp_customize->selective_refresh->add_partial('slider_count', array(
        'selector' => '.flex-caption', 
    ));
	$wp_customize->selective_refresh->add_partial('sidebars_widgets[top-left]', array(
        'selector' => '.cart-left .dummy-content-left', 
    ));
    $wp_customize->selective_refresh->add_partial('sidebars_widgets[top-right]', array(
        'selector' => '.cart-right .dummy-content-right', 
    ));
    $wp_customize->selective_refresh->add_partial('sidebars_widgets[header-right]', array(
        'selector' => '.header-right .dummy-header-right', 
    ));
    $wp_customize->selective_refresh->add_partial('copyright', array(
        'selector' => '.site-info .container', 
    ));
}
add_action( 'customize_register', 'structural_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function structural_customize_preview_js() {
	wp_enqueue_script( 'structural_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'structural_customize_preview_js' );



add_action( 'wp_head','structural_customizer_service_color' );

function structural_customizer_service_color() {
	for ($i=1; $i < 4; $i++) { 
		switch ($i) {
			case '1':
				$bg_color = '#5daae0';
				break;
			case '3':
				$bg_color = '#00ba71';
				break;
			default:
				$bg_color = '#ea4640';
				break;
		}
		if( get_theme_mod('service_color_'.$i,$bg_color) ) {
				
			$service_color = sanitize_hex_color(get_theme_mod( 'service_color_'.$i,$bg_color));  ?>
			
			<style type="text/css">
				.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .service-content:hover h4 a	
			    {
					color: <?php echo $service_color; ?>;
				}
				.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .service-content:hover p a	
			    {
					background-color: <?php echo $service_color; ?>;
				}


				.services-wrapper .service:nth-of-type(<?php echo $i; ?>) .icon-wrapper .fa
				{
					background-color: <?php echo $service_color; ?>;
				}
                .content-1 .customize-partial-edit-shortcut-button,.content-2 .customize-partial-edit-shortcut-button,.content-3 .customize-partial-edit-shortcut-button {
                      left:-110px;
                }
			</style><?php
		}

	}?>
<?php }