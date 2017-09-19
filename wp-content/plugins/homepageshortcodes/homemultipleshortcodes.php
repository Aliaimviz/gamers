<?php
/**
Plugin Name: homeshortcodes
**/
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
        'quantity' => false
    ), $atts);

    if (!empty($atts['series'])){
    	$exp = explode('-',$atts['series']);
    	 $query_cpt3 = array (
            'post_type' => 'magazine',
            'posts_per_page'  =>  $exp[1],
            'order' => 'ASC'
            );
		$custom_query = new WP_Query ( $query_cpt3 );
		$html ='';
		$i=0;
		if ( $custom_query->have_posts() ) { 
			while ( $custom_query->have_posts() ) : 
					$custom_query->the_post(); 
				
				$post_id = get_the_ID();
				//echo $i;
				$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
				$term_list = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "names"));
				$term_lists = wp_get_post_terms($post_id, 'magazine-category', array("fields" => "all"));
				//print_r($term_lists);
				$term_lists_id = $term_lists[0]->slug;
				//print_r(esc_url( $term_lists_id,'magazine-category' ));
				if($i==0){
					
					$html .='<div class="mag-hom-image">

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
				//if($i>1){
					
				//}
				
				
				$i++;
		endwhile;	
		}
		return $html;
    }
    else if(!empty($atts['category'])){
    	
    	
		$posts_array = get_posts(
                        array( 'posts_per_page' => 5,
                            'post_type' => 'video',
                            'tax_query' => array(
                                array(
                                'taxonomy' => 'video-cat',
                                'field' => 'name',
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
    }
    else if(!empty($atts['style'])){
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
		/*$html .="<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>

<a class='semi-transparent-button' href='#'>MORE INFO <i class='fa fa-arrow-circle-right' aria-hidden='true'></i> </a>";*/
    	return $html;
    }
    else if(!empty($atts['quantity'])){
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
    }
    else{
    	return 'myvalue';
    }

        
}
?>