<?php

function game_menu_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s clearfix">';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '<li class="game-icon"><a href="#" class="not-active"><img src="'. get_bloginfo( 'stylesheet_directory' ).'/assets/img/game-icon.png"></a></li>';
  
  $wrap .= '%3$s';
  
  // the static link 
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}


function magazine_menu_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s clearfix">';
  
  // get nav items as configured in /wp-admin/
  
  $wrap .= '%3$s';
  $wrap .= '<li class="magazine-icon"><a href="#" class="not-active"><img src="'. get_bloginfo( 'stylesheet_directory' ).'/assets/img/magazine-icon.png"></a></li>';
  
  // the static link 
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}



class Nfr_Menu_Walker extends Walker_Nav_Menu{

                /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max
         * depth and no ignore elements under that depth. It is possible to set the
         * max depth to include all depths, see walk() method.
         *
         * This method shouldn't be called directly, use the walk() method instead.
         *
         * @since 2.5.0
         *
         * @param object $element Data object
         * @param array $children_elements List of elements to continue traversing.
         * @param int $max_depth Max depth to traverse.
         * @param int $depth Depth of current element.
         * @param array $args
         * @param string $output Passed by reference. Used to append additional content.
         * @return null Null on failure with no changes to parameters.
         */
        function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

                if ( !$element )
                        return;

                $id_field = $this->db_fields['id'];

                //display this element
                if ( is_array( $args[0] ) )
                        $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );

                //Adds the 'parent' class to the current item if it has children               
                if( ! empty( $children_elements[$element->$id_field] ) ) {
                        array_push($element->classes,'parent');
                        $element->title .= ' <i class="fa fa-caret-down" aria-hidden="true"></i>';
                }

                $cb_args = array_merge( array(&$output, $element, $depth), $args);

                call_user_func_array(array(&$this, 'start_el'), $cb_args);

                $id = $element->$id_field;

                // descend only when the depth is right and there are childrens for this element
                if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

                        foreach( $children_elements[ $id ] as $child ){

                                if ( !isset($newlevel) ) {
                                        $newlevel = true;
                                        //start the child delimiter
                                        $cb_args = array_merge( array(&$output, $depth), $args);
                                        call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                                }
                                $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                        }
                        unset( $children_elements[ $id ] );
                }

                if ( isset($newlevel) && $newlevel ){
                        //end the child delimiter
                        $cb_args = array_merge( array(&$output, $depth), $args);
                        call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
                }

                //end this element
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
                call_user_func_array(array(&$this, 'end_el'), $cb_args);
        }
}