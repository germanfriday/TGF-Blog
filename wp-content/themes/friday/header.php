<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />
<title>the german friday</title>
<meta name="verify-v1" content="2EM9drRyArBYOdCXrLaCQ3scRRPViAxwC1p/F0j8hHg=" />
<script type="text/javascript" src="../../../wp-content/themes/friday/js/common.js"></script>
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<meta name="verify-v1" content="2EM9drRyArBYOdCXrLaCQ3scRRPViAxwC1p/F0j8hHg=" >
</head>
<body>
<div id="wrapper">
  <div id="header">
    <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
    <div id="rss">
    <a href="http://www.thegermanfriday.com/feed/"></a>    </div>
    <ul id="main_nav">
      <?php wp_list_pages('title_li='); ?>
    </ul>
    
    <ul id="sidebar" class="sidebar">
<?php 
	if (! function_exists('dynamic_sidebar') 
		|| ! dynamic_sidebar() ) : 
	?>
	<?php endif;?>
	</ul>

    <div class="clear"></div>