<?php
/**
Plugin Name: homeshortcodes
**/

add_shortcode("banner-section","banner_section");
function banner_section($atts = array(), $content = null, $tag){
	shortcode_atts(array(
        'var1' => 'default var1',
        'background-color' => false,
        'image' => false,
        'font-color' => false,
        'content' =>false,
        'opacity' =>false,
        'class' =>false
    ), $atts);

   /* $query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  1,
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		if($custom_query->have_posts()){*/
			$html ='';
			/*while ( $custom_query->have_posts() ) : 
				$custom_query->the_post(); 
				$post_id = get_the_ID();*/
				$html .='
						<div class="un-banner '.$atts["class"].'" style="background-image:url('.$atts["image"].');">
							<div class="transbox" style="background-color#:'.$atts["background-color"].'; opacity:'.$atts["opacity"].'">
								<h3 class="Raleway" style="color:#'.$atts["font-color"].'">'.$atts["content"].'</h3>
							</div>
						 </div>
						';
			//endwhile;
			return $html;
		//}	
}


add_shortcode("without-backgrounds","without_background");
function without_background($atts = array(), $content = null, $tag){
	shortcode_atts(array(
        'var1' => 'default var1',
        'titles' => false,
        'contents' => false
    ), $atts);
    //print_r($atts);
    global $post;
    $post_id = get_the_ID();
    $html ='';
    //echo get_the_date($post_id).;
	/*$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  1,
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		if($custom_query->have_posts()){
			$html ='';
			while ( $custom_query->have_posts() ) : 
				$custom_query->the_post(); 
				$post_id = get_the_ID();*/
				$html .='
						<div class="intro-without-bg" id="rating">
							<h2>'.$atts["titles"].'</h2>
							<p class="Raleway">'.$atts["contents"].'</p>

						</div>
						';
			//endwhile;
			return $html;
		//}
}
add_shortcode("overview_section1","overview_upper");
function overview_upper($atts = array(), $content = null, $tag){

	shortcode_atts(array(
        'var1' => 'default var1',
        'background' => false,
        'title' => false,
        'date' => false,
        'content' => false
    ), $atts);
	//print_r($atts);
    if(!empty($atts["background"])){
    	global $post;
    	$nice_date = date('M Y', strtotime( $post->post_date ));
    	$html = '';
    	/*$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  1,
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		if($custom_query->have_posts()){
			$html .='';
			while ( $custom_query->have_posts() ) : 
				$custom_query->the_post(); 
				$post_id = get_the_ID();*/
				$html .='
						<div class="intro-with-bg" id="overview" style="background-color:'.$atts["background"].'">
							<span class="Raleway">'.$nice_date.'</span>
							<h2>'.$atts["title"].'</h2>
							<p class="Raleway">'.$atts["content"].'</p>
						</div>
						';
			//endwhile;
			return $html;
		//}
    }

}
add_shortcode("layout_posts","layout_posts_related");
function layout_posts_related($atts = array(), $content = null, $tag){
	shortcode_atts(array(
        'var1' => 'default var1',
        'half' => false,
        'content'=> false,
        'writer'=> false,
        'class'=> false,
        'full' => false
    ), $atts);
    $html ='';
    if(!empty($atts["half"])){
    	/*$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  2,
            'order' => 'ASC'
            );
	$custom_query = new WP_Query ( $query_cpt3 );
	if ( $custom_query->have_posts() ) { */
		$html .='<div id="full_article '.$atts["half"].'">
				 ';
		/*while ( $custom_query->have_posts() ) : 
				$custom_query->the_post(); 
				$post_id = get_the_ID();*/
				$html .='
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-quote left-quote '.$atts["class"].'">
						<div>
						<i class="fa fa-quote-left" aria-hidden="true"></i>
						<p>
							'.$atts["content"].'
						</p>
						<h5>'.$atts["writer"].'</h5>
						</div>
						</div>
						 ';
		//endwhile;
		$html .='</div>';
	//}
    }
    else if(!empty($atts["full"])){
    /*	$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  1,
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		if ( $custom_query->have_posts() ) { */
			
			/*while ( $custom_query->have_posts() ) : 
					$custom_query->the_post(); 
					$post_id = get_the_ID();*/
					$html .='

							<div id="custom_anchor">							
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pad0 dual-quote">
									<div class="text-quote single-quote">
										<div>
											<i class="fa fa-quote-left" aria-hidden="true"></i>
											<p>
												'.$atts["content"].'
											</p>
											<h5>'.$atts["writer"].'</h5>
										</div>
									</div>
								</div>
							</div>';
			//endwhile;
		//}
    }
   return $html;

}
add_shortcode("accessorie","right_side_bar_bottom");
function right_side_bar_bottom(){
	$html ='';
	$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  2,
            'order' => 'ASC'
            );
	$custom_query = new WP_Query ( $query_cpt3 );
	if ( $custom_query->have_posts() ) { 
		
		
		while ( $custom_query->have_posts() ) : 
				$custom_query->the_post(); 
			$post_id = get_the_ID();
			$html .='
					<div class="accessory-content">
						<a href="'.get_the_permalink($post_id).'" class="read-more">Accessorie</a>
						<h3>'.get_the_title($post_id).'</h3>
						<p>'.get_the_excerpt($post_id).'</p>
						<span>'.get_the_author($post_id).' '.get_the_date($post_id).' <span class="counts">8</span> </span>
					</div>
					 ';
		endwhile;
		
	}
	return $html;
}
add_shortcode("related_articles","right_side_bar");
function right_side_bar(){
	$html ='';
	$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  5,
            'order' => 'ASC'
            );
	$custom_query = new WP_Query ( $query_cpt3 );
	if ( $custom_query->have_posts() ) { 
		$html .='<div class="related-articles">';
		$html .='<h2>related articles</h2><ul>';
		while ( $custom_query->have_posts() ) : 
				$custom_query->the_post(); 
			$post_id = get_the_ID();
			$html .='<li>
						<h3><a href="#">'.get_the_title($post_id).'</a></h3>
						<p>'.get_the_excerpt($post_id).'</p>
						<a href="'.get_the_permalink($post_id).'" class="read-more">read more</a>
					  </li>';
		endwhile;
		$html .='</ul></div>';
	}
	return $html;
}

add_shortcode("label","label_pro");
function label_pro($atts = array(), $content = null, $tag){
	global $post;
	$post_id = get_the_ID();
	
	$out = '';
	if($atts["label"]){
		$ids = str_replace(' ','',$atts["label"]);
		$out .= '<div id="'.$ids.'"></div>';
		anchor($ids,$atts["label"]);
		return $out;
	}
	
}
add_shortcode("anchor","anchor");
function anchor($ids,$la){
	echo $side_menu = "<li class='side_menu' style='display:none;'><a href='#".$ids."'>".$la."</a></li>";
}

add_action("wp_footer","footer_scripts");
function footer_scripts(){
	?>
	<script>
	jQuery(document).ready(function(){
		jQuery(".side_menu").insertAfter("#abc span");
		jQuery(".side_menu").show();
		jQuery("#abc span").remove();
	});
	</script>
	<?php
}
add_shortcode("custom-specific","my_offset_post");
function my_offset_post(){
	 $query_cpt3 = array (
            'post_type' => 'magazine',
            'number'  =>  5,
            'order' => 'ASC',
            'offset' => 2
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		echo "<pre>";
		print_r($custom_query);
		echo "</pre>";
		echo $custom_query->post_count;
}
add_shortcode('Magazine','SH_TEST_handler');
function SH_TEST_handler($atts = array(), $content = null, $tag){
    shortcode_atts(array(
        'var1' => 'default var1',
        'series' => false,
        'category' => false,
        'style' => false,
        'quantity' => false,
        'class' => false
    ), $atts);
$exp = explode('-',$atts['series']);
//print_r($exp);
    /*$args = array(
	'posts_per_page'   => $atts['quantity'],
	'number'           => $exp[1],
	'offset'           => $exp[0],
	'category'         => $atts['category'],
	'category_name'    => '',
	'orderby'          => 'date',
	'order'            => 'DESC',
	'include'          => '',
	'exclude'          => '',
	'meta_key'         => '',
	'meta_value'       => '',
	'post_type'        => 'magazine',
	'post_mime_type'   => '',
	'post_parent'      => '',
	'author'	   => '',
	'author_name'	   => '',
	'post_status'      => 'publish'
	
);*/
//print_r($atts['style']);
if(!empty($exp[1])){
	$limit = $exp[1];
}
else if(!empty($atts['quantity'])){
	$limit = $atts['quantity'];
}
$args = array( 'post_type'=>'magazine','posts_per_page' => $limit,'offset'=> $exp[0], 'category' =>$atts['category'],'orderby' => 'id','order' => 'DESC');
$custom_query = new WP_Query( $args );

    //die();
//echo $atts['category'];
    if (!empty($atts['series']) && !empty($atts['category']) && empty($atts['quantity']) && empty($atts['style'])){
    	
    	$html ='';
		$i=0;
		//if ( $custom_query->have_posts() ) { 
			while ( $custom_query->have_posts() ) : 
					$custom_query->the_post();
    		 $post_id = get_the_ID();
				
				//$post_id = get_the_ID();
				//echo $i;
				$featured_img_url = get_the_post_thumbnail_url($post_id,'full');
				$term_list = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "names"));
				$term_lists = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "all"));
				//print_r($term_lists);
				$term_lists_id = $term_lists[0]->slug;
				if($term_lists[0]->term_id==$atts["category"]){
					if($i==0){
					
					$html .='<div class="mag-hom-image '.$atts["class"].'">

								<a href="'.get_the_permalink($post_id).'"><img class="alignleft wp-image-33 size-full" src="'.esc_url($featured_img_url).'" alt="" width="863" height="355" /></a>
								<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
								<h2><a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a></h2>
								<div class="img-icns img-icns-first"><i class="fa fa-share-alt" aria-hidden="true"></i> 20</div>
								<div class="img-icns"><i class="fa fa-heart" aria-hidden="true"></i> 179</div>
							</div>';

					$i=1;
				}
				else{
					if($i==2){
						$html .='<div class="magazine-news">';
						$html .='
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">

						<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.esc_url($featured_img_url).'" alt="" width="425" height="271" /></a>
						<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
						<h2><a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a></h2>
						</div>
						</div>
						';
					}
					else{
						$html .='
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">

						<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.esc_url($featured_img_url).'" alt="" width="425" height="271" /></a>
						<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
						<h2><a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a></h2>
						</div>
						</div>
						';
					}
					
						if($i==5){
						$html .='</div>';
					}
				}
				}
				
				$i++;
		endwhile;
		//}
		echo $html;
    }
    else if(!empty($atts["series"]) && empty($atts["quantity"]) && empty($atts["category"]) && empty($atts['style'])){
    	$html ='';
		$i=0;
		//if ( $custom_query->have_posts() ) { 
			while ( $custom_query->have_posts() ) : 
					$custom_query->the_post();
    		 $post_id = get_the_ID();
				
				//$post_id = get_the_ID();
				//echo $i;
				$featured_img_url = get_the_post_thumbnail_url($post_id,'full');
				$term_list = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "names"));
				$term_lists = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "all"));
				//print_r($term_lists);
				$term_lists_id = $term_lists[0]->slug;
				//if($term_lists[0]->term_id==$atts["category"]){
					if($i==0){
					
					$html .='<div class="mag-hom-image '.$atts["class"].'">

								<a href="'.get_the_permalink($post_id).'"><img class="alignleft wp-image-33 size-full" src="'.esc_url($featured_img_url).'" alt="" width="863" height="355" /></a>
								<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
								<h2><a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a></h2>
								<div class="img-icns img-icns-first"><i class="fa fa-share-alt" aria-hidden="true"></i> 20</div>
								<div class="img-icns"><i class="fa fa-heart" aria-hidden="true"></i> 179</div>
							</div>';

					$i=1;
				}
				else{
					if($i==2){
						$html .='<div class="magazine-news">';
						$html .='
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">

						<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.esc_url($featured_img_url).'" alt="" width="425" height="271" /></a>
						<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
						<h2><a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a></h2>
						</div>
						</div>
						';
					}
					else{
						$html .='
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">

						<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.esc_url($featured_img_url).'" alt="" width="425" height="271" /></a>
						<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
						<h2><a href="'.get_the_permalink($post_id).'">'.get_the_title($post_id).'</a></h2>
						</div>
						</div>
						';
					}
					
						if($i==5){
						$html .='</div>';
					}
				}
				//}
				
				$i++;
		endwhile;
		//}
		echo $html;


    }
    else if(!empty($atts["series"]) && !empty($atts["style"]) && empty($atts["quantity"]) && empty($atts["category"])){
    	//echo "work";
    	$html ='';
    	$html .='<div class="magazine-news">';
    	while ( $custom_query->have_posts() ) : 
					$custom_query->the_post();
    		 $post_id = get_the_ID();
    		$term_list = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "names"));
				$term_lists = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "all"));
			//if($term_lists[0]->term_id==$atts['category']){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				
				
				$term_lists_id = $term_lists[0]->slug;
				$html .='<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">
							<p>
								';

								$html .='<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.$featured_img_url.'" alt="" width="425" height="271" srcset="'.$featured_img_url.' 300w" sizes="(max-width: 425px) 100vw, 425px">
								</a>';

							$html .='</p>
							<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
							<h2><a href="#">'.get_the_title($post_id).'</a></h2>
						</div>
					</div>';
			//}
    		
    	endwhile;
    	$html .='</div>';
    	wp_reset_postdata();
    	return $html;
    }
    else if(!empty($atts['quantity']) && !empty($atts['category'])){
    	$html ='';
    	$html .='<div class="magazine-news">sdfsdfsdfsdf';
    	while ( $custom_query->have_posts() ) : 
					$custom_query->the_post();
    		 $post_id = get_the_ID();
    		$term_list = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "names"));
				$term_lists = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "all"));
			if($term_lists[0]->term_id==$atts['category']){
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				
				
				$term_lists_id = $term_lists[0]->slug;
				$html .='<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">
							<p>
								';

								$html .='<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.$featured_img_url.'" alt="" width="425" height="271" srcset="'.$featured_img_url.' 300w" sizes="(max-width: 425px) 100vw, 425px">
								</a>';

							$html .='</p>
							<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
							<h2><a href="#">'.get_the_title($post_id).'</a></h2>
						</div>
					</div>';
			}
    		
    	endwhile;
    	$html .='</div>';
    	wp_reset_postdata();
    	echo $html;
    }
    else if(!empty($atts['quantity']) && empty($atts["category"]) && empty($atts["series"]) && empty($atts["style"])){
    	$html ='';
    	$html .='<div class="magazine-news">';
    	while ( $custom_query->have_posts() ) : 
					$custom_query->the_post();
				$post_id = get_the_ID();
    		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				$term_list = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "names"));
				$term_lists = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "all"));
				//print_r($term_lists);
				$term_lists_id = $term_lists[0]->slug;
				$html .='<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">
							<p>
								';

								$html .='<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.$featured_img_url.'" alt="" width="425" height="271" srcset="'.$featured_img_url.' 300w" sizes="(max-width: 425px) 100vw, 425px">
								</a>';

							$html .='</p>
							<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
							<h2><a href="#">'.get_the_title($post_id).'</a></h2>
						</div>
					</div>';
    	//endforeach;
				//}
				endwhile;
    	$html .='</div>';
    	//wp_reset_postdata();
    	echo $html;
    }
    else if(empty($atts['quantity']) && !empty($atts["category"]) && empty($atts["series"]) && empty($atts["style"])){

	/*$html ='<div class="row">
				<div class="col-lg-12" style="padding: 0; padding-right: 2px;">
				<div class="tabbable">
				<ul class="nav nav-pills nav-stacked col-md-4 col-md-push-8 col-lg-3 col-lg-push-9">
			';
			$i=1;
	foreach ( $posts_array as $post ) {
    	//setup_postdata( $post ); 
    	$post_id = $post->ID;
    	if($i==1){
    		$html .='
		 			<li class="active"><a href="#'.$post->ID.'" data-toggle="tab"><i><i class="fa fa-play" aria-hidden="true"></i></i> <i>'.$post->post_title.'</i></a></li>';
		 	//		$i=2;
    	}
    	else{
    		$html .='<li><a href="#'.$post->ID.'" data-toggle="tab"><i><i class="fa fa-play" aria-hidden="true"></i></i> <i>'.$post->post_content.'</i></a></li>
		 	';
    	}

		$i++;	
			
    } 
	$html .='</ul>
			 <div class="tab-content col-md-8 col-md-pull-4 col-lg-9 col-lg-pull-3">
			';
		$j=1;
	foreach ( $posts_array as $posts ) {
		$post_ids = $posts->ID;
		$url_video = get_post_meta($post_ids,'video_url',true);
		if($j==1){
			$html .='<div id="'.$posts->ID.'" class="tab-pane active">

			<iframe src="'.$url_video.'" width="652" height="424" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			<div class="iframe-overlay">
			<h4>'.$post->post_title.'</h4>
			<h2>'.$post->post_content.'</h2>
			</div>
			</div>';
		}else{
			$html .='<div id="'.$posts->ID.'" class="tab-pane">

					<iframe src="'.$url_video.'" width="652" height="424" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
					<div class="iframe-overlay">
					<h4>'.$post->post_title.'</h4>
					<h2>'.$post->post_content.'</h2>
					</div>
				</div>';
		}
		$j++;
		
	}
	$html .='</div></div></div></div>';
	echo $html;*/
    }
    //die();
    /*else if(!empty($atts['quantity']) ){
    	$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  $atts['quantity'],
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		echo $custom_query->post_count;
		if(!empty($custom_query)){
			$html ='';
			$html .='<div class="magazine-news">';
			while ( $custom_query->have_posts() ) : 
					$custom_query->the_post(); 
				
				$post_id = get_the_ID();
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				$term_list = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "names"));
				$term_lists = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "all"));
				//print_r($term_lists);
				$term_lists_id = $term_lists[0]->slug;
				$html .='<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<div class="news-grids">
							<p>
								';

								$html .='<a href="'.get_the_permalink($post_id).'"><img class="alignnone wp-image-40 size-full" src="'.$featured_img_url.'" alt="" width="425" height="271" srcset="'.$featured_img_url.' 300w" sizes="(max-width: 425px) 100vw, 425px">
								</a>';

							$html .='</p>
							<h4><a href="'.site_url().'/magazine-category/'.$term_lists_id.'">'.$term_list[0].'</a></h4>
							<h2><a href="#">'.get_the_title($post_id).'</a></h2>
						</div>
					</div>';
			endwhile;
			$html .='</div>';
			return $html;
		}
    }
    else if(!empty($atts['category'])){
    	
    	
		$posts_array = get_posts(
                        array( 'posts_per_page' => 5,
                            'post_type' => 'video',
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'video-cat',
                                'field' => 'id',
                                'terms' => $atts['category'],
                                )
                            )
                        )
                    );

    //print_r( $posts_array );
if(!empty($posts_array)){
	$html ='<div class="row">
				<div class="col-lg-12" style="padding: 0; padding-right: 2px;">
				<div class="tabbable">
				<ul class="nav nav-pills nav-stacked col-md-4 col-md-push-8 col-lg-3 col-lg-push-9">
			';
			$i=1;
	foreach ( $posts_array as $post ) {
    	//setup_postdata( $post ); 
    	$post_id = $post->ID;
    	if($i==1){
    		$html .='
		 			<li class="active"><a href="#'.$post->ID.'" data-toggle="tab"><i><i class="fa fa-play" aria-hidden="true"></i></i> <i>'.$post->post_title.'</i></a></li>';
		 	//		$i=2;
    	}
    	else{
    		$html .='<li><a href="#'.$post->ID.'" data-toggle="tab"><i><i class="fa fa-play" aria-hidden="true"></i></i> <i>'.$post->post_content.'</i></a></li>
		 	';
    	}

		$i++;	
			
    } 
	$html .='</ul>
			 <div class="tab-content col-md-8 col-md-pull-4 col-lg-9 col-lg-pull-3">
			';
		$j=1;
	foreach ( $posts_array as $posts ) {
		$post_ids = $posts->ID;
		$url_video = get_post_meta($post_ids,'video_url',true);
		if($j==1){
			$html .='<div id="'.$posts->ID.'" class="tab-pane active">

			<iframe src="'.$url_video.'" width="652" height="424" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
			<div class="iframe-overlay">
			<h4>'.$post->post_title.'</h4>
			<h2>'.$post->post_content.'</h2>
			</div>
			</div>';
		}else{
			$html .='<div id="'.$posts->ID.'" class="tab-pane">

					<iframe src="'.$url_video.'" width="652" height="424" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
					<div class="iframe-overlay">
					<h4>'.$post->post_title.'</h4>
					<h2>'.$post->post_content.'</h2>
					</div>
				</div>';
		}
		$j++;
		
	}
	$html .='</div></div></div></div>';

}
else{

}
wp_reset_postdata();

    	return $html;
    }*/
   /* else if(!empty($atts['style'])){
    	$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  1,
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		$html ='';
		if ( $custom_query->have_posts() ) { 
			while ( $custom_query->have_posts() ) : 
					$custom_query->the_post(); 

			endwhile;	
		}
		
    	return $html;
    }*/
    /*else if(!empty($atts['quantity'])){
    	$query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  $atts['quantity'],
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		$html ='';
		if ( $custom_query->have_posts() ) { 
			while ( $custom_query->have_posts() ) : 
					$custom_query->the_post(); 
				
			endwhile;	
		}
    	return $html;
    }*/
    /*else{
    	return 'myvalue';
    }*/

        
}
?>