<?php

/*
$Id: functions_persist.php 135237 2009-07-15 07:24:28Z jamesgpearce $

$URL: http://svn.wp-plugins.org/wordpress-mobile-pack/tags/1.1.1/themes/mobile_pack_base/functions_persist.php $

Copyright (c) 2009 mTLD Top Level Domain Limited

Online support: http://mobiforge.com/forum/dotmobi/wordpress

This file is part of the WordPress Mobile Pack.

The WordPress Mobile Pack is Licensed under the Apache License, Version 2.0
(the "License"); you may not use this file except in compliance with the
License.

You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed
under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
CONDITIONS OF ANY KIND, either express or implied. See the License for the
specific language governing permissions and limitations under the License.
*/

add_action('init', 'wpmp_theme_init');
function wpmp_theme_init() {
  foreach(array(
    'wpmp_theme_home_link_in_menu'=>'true',
    'wpmp_theme_post_summary'=>'teaser',
    'wpmp_theme_post_count'=>'5',
    'wpmp_theme_teaser_length'=>'50',
    'wpmp_theme_widget_list_count'=>'5',
    'wpmp_theme_transcoder_remove_media'=>'true',
    'wpmp_theme_transcoder_partition_pages'=>'true',
    'wpmp_theme_transcoder_shrink_images'=>'true',
    'wpmp_theme_transcoder_simplify_styling'=>'true',
  ) as $name=>$value) {
    if (get_option($name)=='') {
      update_option($name, $value);
    }
  }
  if(get_option('wpmp_theme_post_summary')=='whole') { //deprecated
    update_option('wpmp_theme_post_summary', 'teaser');
  }
  global $wp_registered_sidebars;
  if(sizeof($wp_registered_sidebars)==0) {
    register_sidebar(array(
      'before_widget' => '<li>',
      'after_widget' => '</li>',
      'before_title' => '<h2>',
      'after_title' => '</h2>',
    ));
  }
}


add_action('admin_menu', 'wpmp_theme_admin_menu');
function wpmp_theme_admin_menu() {
	add_theme_page(__('Mobile Theme'), __('Mobile Theme'), 3, 'wpmp_theme_theme_admin', 'wpmp_theme_theme_admin');
	add_theme_page(__('Mobile Widgets'), __('Mobile Widgets'), 3, 'wpmp_theme_widget_admin', 'wpmp_theme_widget_admin');
}

function wpmp_theme_theme_admin() {
  if(sizeof($_POST)>0) {
    print '<div id="message" class="updated fade"><p><strong>' . wpmp_theme_options_write() . '</strong></p></div>';
    if(isset($_POST['wpmp_theme_transcoder_clear_cache_now']) && $_POST['wpmp_theme_transcoder_clear_cache_now']=='true') {
      if(function_exists('wpmp_transcoder_purge_cache') && ($count = wpmp_transcoder_purge_cache())>0) {
        print '<div id="message" class="updated fade"><p><strong>' . $count . ' files cleared from image cache</strong></p></div>';
      }
    }
  }
  include_once('wpmp_theme_theme_admin.php');
}
function wpmp_theme_widget_admin() {
  if(sizeof($_POST)>0) {
    print '<div id="message" class="updated fade"><p><strong>' . wpmp_theme_options_write() . '</strong></p></div>';
  }
  include_once('wpmp_theme_widget_admin.php');
}

function wpmp_theme_options_write() {
  $message = __('Settings saved.');
  foreach(array(
    'wpmp_theme_widget'=>false,
    'wpmp_theme_home_link_in_menu'=>true,
    'wpmp_theme_post_count'=>false,
    'wpmp_theme_post_summary'=>false,
    'wpmp_theme_teaser_length'=>false,
    'wpmp_theme_widget_list_count'=>false,
    'wpmp_theme_transcoder_remove_media'=>true,
    'wpmp_theme_transcoder_partition_pages'=>true,
    'wpmp_theme_transcoder_shrink_images'=>true,
    'wpmp_theme_transcoder_simplify_styling'=>true,
  ) as $option=>$checkbox) {
    if(isset($_POST[$option])){
      $value = $_POST[$option];
      if(!is_array($value)) {
  			$value = trim($value);
      }
			$value = stripslashes_deep($value);
      update_option($option, $value);
      if ($option=='wpmp_theme_widget') {
        return $message;
      }
    } elseif ($checkbox) {
      update_option($option, 'false');
    }
  }
  if (!is_numeric(get_option('wpmp_theme_post_count'))) {
    update_option('wpmp_theme_post_count', '5');
    $message = __('Please provide a valid number of posts that you would like the theme to display.');
  }
  if (!is_numeric(get_option('wpmp_theme_teaser_length'))) {
    update_option('wpmp_theme_teaser_length', '50');
    $message = __('Please provide a valid teaser length.');
  }
  if (!is_numeric(get_option('wpmp_theme_widget_list_count'))) {
    update_option('wpmp_theme_widget_list_count', '5');
    $message = __('Please provide a valid widget list length.');
  }
  return $message;
}

function wpmp_theme_option($option, $onchange='') {
  switch ($option) {
    case 'wpmp_theme_post_summary':
      return wpmp_theme_option_dropdown(
        $option,
        array(
          'none'=>__('Title only'),
          'firstteaser'=>__('Title and teaser for first post, title for the rest'),
          'teaser'=>__('Title and teaser for all posts'),
        ),
        $onchange
      );

    case 'wpmp_theme_post_count':
    case 'wpmp_theme_teaser_length':
    case 'wpmp_theme_widget_list_count':
      return wpmp_theme_option_text(
        $option,
        $onchange
      );

    case 'wpmp_theme_home_link_in_menu':
    case 'wpmp_theme_transcoder_remove_media':
    case 'wpmp_theme_transcoder_partition_pages':
    case 'wpmp_theme_transcoder_shrink_images':
    case 'wpmp_theme_transcoder_simplify_styling':
    case 'wpmp_theme_transcoder_clear_cache_now':
      return wpmp_theme_option_checkbox(
        $option,
        $onchange
      );

  }
}

function wpmp_theme_option_dropdown($option, $options, $onchange='') {
  if ($onchange!='') {
    $onchange = 'onchange="' . attribute_escape($onchange) . '" onkeyup="' . attribute_escape($onchange) . '"';
  }
  $dropdown = "<select id='$option' name='$option' $onchange>";
  foreach($options as $value=>$description) {
    if(get_option($option)==$value) {
      $selected = ' selected="true"';
    } else {
      $selected = '';
    }
    $dropdown .= '<option value="' . attribute_escape($value) . '"' . $selected . '>' . __($description) . '</option>';
  }
  $dropdown .= "</select>";
  return $dropdown;
}

function wpmp_theme_option_text($option, $onchange='') {
  if ($onchange!='') {
    $onchange = 'onchange="' . attribute_escape($onchange) . '" onkeyup="' . attribute_escape($onchange) . '"';
  }
  $text = '<input type="text" id="' . $option . '" name="' . $option . '" value="' . attribute_escape(get_option($option)) . '" ' . $onchange . '/>';
  return $text;
}

function wpmp_theme_option_checkbox($option, $onchange='') {
  if ($onchange!='') {
    $onchange = 'onchange="' . attribute_escape($onchange) . '"';
  }
  $checkbox = '<input type="checkbox" id="' . $option . '" name="' . $option . '" value="true" ' . (get_option($option)==='true'?'checked="true"':'') . ' ' . $onchange . ' />';
  return $checkbox;
}



?>
