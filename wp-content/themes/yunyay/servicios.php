<?php
/* servicios.php
* @package WordPress
* @subpackage yunyay
* @since yunyay 1.0
* Template Name: Servicios
*/ ?>
<?php get_header();
$yunyay_plupload = rwmb_meta('yunyay_plupload', '');
$segundo_contenido = rwmb_meta( 'yunyay_wysiwyg', '');

if (have_posts()):while(have_posts()):the_post();

?>
	<article id="servicios">
		<div>
		<h2><?php the_title();?></h2>
		
			<div>
				<div class="list_item">
					<div class="list_item_img slider_secundario">
						<figure>
							<?php if(wpmd_is_notphone()) { ?>
							<div class="cycle-slideshow"
							data-cycle-speed="2000" 
							data-cycle-pause-on-hover="true"
							data-cycle-prev=".back"
							data-cycle-next=".next"
							>
							<?php } else { ?> 
							<div>
							<?php };?>
							<?php 
								if(has_post_thumbnail())
								{
									the_post_thumbnail('custom-thumb-800-600');
								}
								else
								{
									echo '<img src="'.get_stylesheet_directory_uri().'/img/gravatar.png" alt="'.__('Sin imagen', 'hotellosrobles').'" />';
								};?>
							<?php if(wpmd_is_notphone())
							{
								/*$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
								if ($attachID !== '')
								{
									foreach ($attachID as $item)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-800-600');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="' . $alt . '"';
										echo ' />';
									}
								}*/
								if($yunyay_plupload)
								{
									foreach ($yunyay_plupload as $item => $value)
									{
										$imagen = wp_get_attachment_image_src($item,'custom-thumb-800-600');
										$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
										$descripcion = get_post_field('post_content', $item);
										echo '<img class="item" src="' . $imagen[0] . '"';
										echo ' alt="';
										if($alt)
										{
											echo $alt;
										}
										elseif($descripcion)
										{
											echo $descripcion;
										}
										else
										{
											echo get_the_title();
										}
										echo '"';
										echo ' />';
									}
								}
							}?>
						</div><!-- .cycle-slideshow -->
						<?php if(wpmd_is_notphone()) { ?>
						<div class="navegacion">
							<div class="back"><a class="boton_general">‹</a></div>
							<div class="next"><a class="boton_general">›</a></div>
						</div><!-- .navegación -->
						<?php };?>
						</figure>
					</div><!-- .list_item_img -->


					<div class="encolumnas">
						<?php the_content();?>
					</div>
					
					<figure>
						<div>
						<?php if(wpmd_is_phone())
						{
							/*$attachID = (get_post_meta( $post->ID, 'custom_imagenrepetible',true));
							if ($attachID !== '')
							{
								foreach ($attachID as $item)
								{
									$imagen = wp_get_attachment_image_src($item,'custom-thumb-600-x');
									$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
									$descripcion = get_post_field('post_content', $item);
									echo '<img class="item" src="' . $imagen[0] . '"';
									echo ' alt="' . $alt . '"';
									echo ' />';
								}
							}*/
							if($yunyay_plupload)
							{
								foreach ($yunyay_plupload as $item => $value)
								{
									$imagen = wp_get_attachment_image_src($item,'custom-thumb-600-x');
									$alt = get_post_meta($item, '_wp_attachment_image_alt', true);
									$descripcion = get_post_field('post_content', $item);
									echo '<img class="item" src="' . $imagen[0] . '"';
									echo ' alt="';
									if($alt)
									{
										echo $alt;
									}
									elseif($descripcion)
									{
										echo $descripcion;
									}
									else
									{
										echo get_the_title();
									}
									echo '"';
									echo ' />';
								}
							}
						}?>
						</div>
					</figure>
				</div><!-- .list_item -->
				<div class="contenido_una_columna">
					<?php 
					if($segundo_contenido)
					{
						echo $segundo_contenido;
					} else {
						echo __("Algo falló.", "yunyay");
					}
					;?>
				</div>
			</div>
		<?php endwhile; endif;?>
	</div><!-- #slider -->
<?php get_footer();?>