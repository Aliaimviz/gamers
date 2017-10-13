<?php

class inner_pages_shortcodes {

    public function __construct() {
        //silder shortcode buying guide page
        add_shortcode('buying_guides_sliders_showes', array($this, "buying_guide_slider_shower"));
        add_shortcode("gammer-videos",array($this,"gamming_videos"));
        add_shortcode("show-side-bar-video-filter",array($this,"gamming_show_cats"));
        add_action("wp_footer",array($this,"footer_scriptss_muy"));
        add_action('wp_ajax_search_video_based_on_character', array($this,'search_video_based_on_character'));
		add_action('wp_ajax_nopriv_search_video_based_on_character', array($this,'search_video_based_on_character'));
		add_action('wp_ajax_search_video_based_on_character_by_cat', array($this,'search_video_based_on_character_by_cat'));
		add_action('wp_ajax_nopriv_search_video_based_on_character_by_cat', array($this,'search_video_based_on_character_by_cat'));
		add_action('wp_ajax_search_likes_chartes', array($this,'search_likes_chartes'));
		add_action('wp_ajax_nopriv_search_likes_chartes', array($this,'search_likes_chartes'));
		
		
    }
    function search_likes_chartes(){
    	$post_ids = $_POST["counter"];
    	$user_id = $_POST["user_id"];

    	$arr = array();
    	$likes_post_meta = get_post_meta($post_ids,'post_likes',true);
    	if(!empty($likes_post_meta)){

			if (in_array($user_id, $likes_post_meta))
			{
			  echo "alreay like this magazine";
			}
			else
			{
			  $likes_post_meta[] = $user_id;
			  update_post_meta($post_ids,'post_likes',$likes_post_meta);  
			}
    	}else{
    		$arr[] = $user_id;
    		update_post_meta($post_ids,'post_likes',$arr);
    	}
    	die();
    }
    function search_video_based_on_character_by_cat(){
    	$terms = $_POST["favorite"];

    	if(!empty($terms)){
    		$args = array(
					'post_type' => 'video',
					'post_status' => 'publish',
					'posts_per_page' => -1,
					'tax_query' => array(
					    array(
					    'taxonomy' => 'video-cat',
					    'field' => 'id',
					    'terms' => $terms
					     )
					  )
				);
				$query = new WP_Query( $args );
				if ( $query->have_posts() ) {
		
				while ( $query->have_posts() ) {
					$query->the_post();
					$post_id = get_the_ID();
					$video_url = get_post_meta($post_id,'video_url',true);
					$timming = get_post_meta($post_id,'video_time',true);
					$term_list = wp_get_post_terms($post_id, 'video-cat', array("fields" => "all"));
					$html .='<div class="col-xs-3">
		                    	<div class="video-box">
		                        	<iframe width="100%" height="150" src="'.$video_url.'" frameborder="0" allowfullscreen=""></iframe>
		                        	<h2>'.get_the_title($post_id).'</h2>
		                        	<div class="video-description">
		                            	<h6>'.$timming.'</h6>
		                            	<h6>'.$term_list[0]->name.'</h6>
		                        	</div>
		                   		</div>
		                	</div>';
				}
			}
			else{
				$html .='No video found';
			}
    	}
    	else{
    		$html .='';
    	}
		echo $html;
    	die();
    }
    function gamming_show_cats(){
    	$html ='';
    	$taxonomy = 'video-cat';
    	$parents = get_terms( $taxonomy, array( 'parent' => 0,'hide_empty' => false,'orderby'=>'id' ) );

		if(!empty($parents)){
			foreach($parents as $term){
				$term_id = $term->term_id;
				$ages = get_terms( $taxonomy, array(
						        'hide_empty' => 0,
						        'parent' => $term_id,
						    ));
				$html .='
						<a href="#demo'.$term_id.'" class="list-group-item list-group-item-success strong type-inner" data-toggle="collapse" data-parent="#MainMenu">'.$term->name.'<i class="fa fa-caret-down"></i></a>';
                                $html .='<div class="collapse list-group-submenu" id="demo'.$term_id.'">';
                                foreach($ages as $child){
                                	$html .='<a href="javascript:void(0);" class="list-group-item search_list_feature" id="'.$child->term_id.'"><input type="checkbox" name="filter_term[]" id="filter_term[]" class="filter_terms_child"  value="'.$child->term_id.'"> '.$child->name.'</a>';	
                                }
                                
                                    
                                $html .='</div>';
						
				$termchildrens = get_term_children( $term_id, $taxonomy );

			}	
		}
		
    	return $html;
    }
    function footer_scriptss_muy(){
    	$html ='<script>
    				jQuery(document).ready(function(){
    					jQuery(document).on("click",".search_btn",function(){
    						
    						var search_flds = jQuery("#search_flds").val();
    						jQuery(".loader_ajax").show();
    						jQuery.ajax({
									url : "'.site_url().'/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_video_based_on_character",
									search_flds : search_flds
									},
									success : function( response ) {
									//console.log(response);           
									jQuery(".show_cats_vido").html(response);
									jQuery(".loader_ajax").hide();
									},
									 error: function(errorThrown){
									
									console.log(errorThrown);
									}
								});
    					});
    					jQuery(document).on("click",".filter_terms_child",function(){
    						var favorite = [];
				            jQuery.each(jQuery("input[type=checkbox]:checked"), function(){            
				                favorite.push(jQuery(this).val());
				            });
				            
				            jQuery(".loader_ajax").show();
				            jQuery.ajax({
									url : "'.site_url().'/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_video_based_on_character_by_cat",
									favorite : favorite
									},
									success : function( response ) {
									//console.log(response);           
									jQuery(".show_cats_vido").html(response);
									jQuery(".loader_ajax").hide();
									},
									 error: function(errorThrown){
									
									console.log(errorThrown);
									}
							});
    					});
    					jQuery(document).on("click",".likes",function(){
    						var counter_ids = jQuery(this).attr("id");
    						var user_ids = jQuery(this).attr("data-user-id");
    						if(user_ids!=""){
    							jQuery.ajax({
									url : "'.site_url().'/wp-admin/admin-ajax.php",
									type : "post",
									data : {
									action : "search_likes_chartes",
									counter : counter_ids,
									user_id : user_ids
									},
									success : function( response ) {
									    
									jQuery(".addthis_button_compact").html(response);
									jQuery(".loader_ajax").hide(); 

									},
									 error: function(errorThrown){
									
									console.log(errorThrown);
									}
								});
    						}else{
    							alert("First login then like this game");
    						}
    						
    					});
    				});
    			</script>';
    	echo $html;
    }
    function search_video_based_on_character(){
    	$search_title = $_POST["search_flds"];
    	$html ='';
    	$args = array(
				    'post_type' => 'video',
				    's' => $search_title,
				    'post_status' => 'publish',
				    'orderby'     => 'title', 
				    'order'       => 'ASC'        
				);
		$wp_query = new WP_Query($args);
		if ( $wp_query->have_posts() ) {
	
			while ( $wp_query->have_posts() ) {
				$wp_query->the_post();
				$post_id = get_the_ID();
				$video_url = get_post_meta($post_id,'video_url',true);
				$timming = get_post_meta($post_id,'video_time',true);
				$term_list = wp_get_post_terms($post_id, 'video-cat', array("fields" => "all"));
				$html .='<div class="col-xs-3">
	                    	<div class="video-box">
	                        	<iframe width="100%" height="150" src="'.$video_url.'" frameborder="0" allowfullscreen=""></iframe>
	                        	<h2>'.get_the_title($post_id).'</h2>
	                        	<div class="video-description">
	                            	<h6>'.$timming.'</h6>
	                            	<h6>'.$term_list[0]->name.'</h6>
	                        	</div>
	                   		</div>
	                	</div>';
			}
		}
		else{
			$html .='No video found';
		}
		echo $html;
    	die();
    }
    function gamming_videos(){
    	$html ='';
    	$args = array(
					'post_type' => 'video',
					'post_status' => 'publish',
					'posts_per_page' => -1
					);
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) {
	
			while ( $query->have_posts() ) {
				$query->the_post();
				$post_id = get_the_ID();
				$video_url = get_post_meta($post_id,'video_url',true);
				$timming = get_post_meta($post_id,'video_time',true);
				$term_list = wp_get_post_terms($post_id, 'video-cat', array("fields" => "all"));
				
				$html .='<div class="col-xs-3">
	                    	<div class="video-box">
	                        	<iframe width="100%" height="150" src="'.$video_url.'" frameborder="0" allowfullscreen=""></iframe>
	                        	<h2>'.get_the_title().'</h2>
	                        	<div class="video-description">
	                            	<h6>'.$timming.'</h6>
	                            	<h6>'.$term_list[0]->name.'</h6>
	                        	</div>
	                   		</div>
	                	</div>';
			}
	
	
			wp_reset_postdata();
		}
    	

    	return $html;
    }
    //buying guide page shortcodes slider start
    function buying_guide_slider_shower($atts = array(), $content = null, $tag) {

        shortcode_atts(array(
            'var1' => 'default var1',
            'slug' => false,
                ), $atts);
        $html = '';
        $post_slug = $atts["slug"];
        $args = array(
            'post_type' => 'guides',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'buying-guide',
                    'field' => 'slug',
                    'terms' => $post_slug,
                ),
            ),
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) {
            $i = 0;
            while ($query->have_posts()) {
                $query->the_post();
                $post_id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url($post_id, 'full');

                if ($i == 0) {
                    $html = '<div class="item active">
								<div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
									<a href="#"><img src="' . $featured_img_url . '" alt="slider 01"></a>
									<div class="team_columns_item_caption">
                                         <h4>' . get_post_meta($post_id, 'buying_guides_price', true) . '</h4>
                                    </div>
                                    <div class="list-colums">';
                    if (have_rows('buying_guides_features')):

                        while (have_rows('buying_guides_features')) : the_row();

                            $html .= '<h4>
									    <i class="fa fa-arrow-circle-o-right" aria-hidden="true">
									    </i>' . get_sub_field('features') . '</h4>';

                        endwhile;

                    endif;
                    $html .= '</div>
                                    <div class="color-red">
                                        <h4>' . get_the_title($post_id) . '</h4>
                                    </div>
                                    <div class="row">';
                    if (have_rows('buying_guides_description')):

                        while (have_rows('buying_guides_description')) : the_row();

                            $html .= '<div class="col-md-4 remove_padding">
									         			<p>' . get_sub_field('features_description') . '</p>
									        		</div>';
                        endwhile;
                    endif;
                    $html .= '</div>
								</div>
							</div>
							';
                }
                else {
                    $html = '<div class="item">
								<div class="col-xs-12 col-sm-6 col-md-4 team_columns_item_image">
									<a href="#"><img src="' . $featured_img_url . '" alt="slider 01"></a>
									<div class="team_columns_item_caption">
                                         <h4>' . get_post_meta($post_id, 'buying_guides_price', true) . '</h4>
                                    </div>
                                    <div class="list-colums">';
                    if (have_rows('buying_guides_features')):

                        while (have_rows('buying_guides_features')) : the_row();

                            $html .= '<h4>
									        			<i class="fa fa-arrow-circle-o-right" aria-hidden="true">
									        		</i>' . get_sub_field('features') . '</h4>';

                        endwhile;

                    endif;
                    $html .= '</div>
                                    <div class="color-red">
                                        <h4>' . get_the_title($post_id) . '</h4>
                                    </div>
                                    <div class="row">';
                    if (have_rows('buying_guides_description')):

                        while (have_rows('buying_guides_description')) : the_row();

                            $html .= '<div class="col-md-4 remove_padding">
									         			<p>' . get_sub_field('features_description') . '</p>
									        		</div>';
                        endwhile;
                    endif;
                    $html .= '</div>
								</div>
							</div>
							';
                }
                $i++;
            }


            wp_reset_postdata();
        } else {
            // no posts found
        }
        return $html;
    }

    //buying guides page shortcodes slider end
}

?>