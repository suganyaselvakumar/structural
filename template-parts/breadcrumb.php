<?php
/**
 * The template used for displaying page breadcrumb
 *
 * @package Structural
 */

$breadcrumb = get_theme_mod( 'breadcrumb',true ); 
$breadcrumb_bg_size = get_theme_mod('breadcrumb_bg_size','cover');
$breadcrumb_bg_imgae = get_theme_mod('breadcrumb_background_image');
$breadcrumb_bg_repeat = get_theme_mod('breadcrumb_bg_repeat','repeat');
$breadcrumb_bg_position = get_theme_mod('breadcrumb_bg_position','center center');
$breadcrumb_bg_attachment = get_theme_mod('breadcrumb_bg_attachment','fixed'); 
$breadcrumb_background_color = get_theme_mod('breadcrumb_background_color','#27323d');
if(get_theme_mod('breadcrumb_background_image_status',true)) {
	if( $breadcrumb_bg_imgae != '' ) {
		$breadcrumb_background_image = $breadcrumb_bg_imgae;
	} else {
		$breadcrumb_background_image = get_template_directory_uri() . '/images/breadcrumb.png';
	}
}
else { 
	$breadcrumb_background_image ='';
}
if( !is_front_page() ): ?>
	<div class="breadcrumb" style="background-color:<?php echo $breadcrumb_background_color;?>;background-image:url('<?php echo $breadcrumb_background_image;?>');background-size: <?php echo $breadcrumb_bg_size?>; background-repeat: <?php echo $breadcrumb_bg_repeat?>; background-position: <?php echo $breadcrumb_bg_position?>; background-attachment: <?php echo $breadcrumb_bg_attachment?>;">
		<div class="container"><?php
		    if( !is_search() && !is_archive() && !is_404() ) : ?>
				<div class="sixteen columns">
					<?php the_title('<h2>','</h2>');?>	
					<?php if( $breadcrumb ) : ?>	
						<div class="breadcrumb-text">	
							<span class="txt-bread"><?php _e('You are here:','structural');?></span>
							<?php structural_breadcrumbs(); ?>
						</div>
					<?php endif; ?>
				</div><?php
			endif; ?>
			
		</div>
	</div><?php  
endif;