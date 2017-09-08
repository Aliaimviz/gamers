<?php

function game_menu_wrap() {
  // default value of 'items_wrap' is <ul id="%1$s" class="%2$s">%3$s</ul>'
  
  // open the <ul>, set 'menu_class' and 'menu_id' values
  $wrap  = '<ul id="%1$s" class="%2$s">';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '<li class="game-icon"><a href="#"><img src="'. get_bloginfo( 'stylesheet_directory' ).'/assets/img/game-icon.png"></a></li>';
  
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
  $wrap  = '<ul id="%1$s" class="%2$s">';
  
  // get nav items as configured in /wp-admin/
  $wrap .= '<li class="magazine-icon"><a href="#"><img src="'. get_bloginfo( 'stylesheet_directory' ).'/assets/img/magazine-icon.png"></a></li>';
  
  $wrap .= '%3$s';
  
  // the static link 
  
  // close the <ul>
  $wrap .= '</ul>';
  // return the result
  return $wrap;
}