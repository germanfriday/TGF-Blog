<?php get_header(); ?>
    <!--<p>I work with small businesses and individuals who need an effective online presence to create professional, attractive websites built according to web standards. You can view some of my <a href="">work</a> or <a href="">contact me</a>.</p>-->
    <img id="boy_dino" src="../wp-content/themes/friday/images/boy_dino.png" alt="Exercise Your Imagination" /> </div>
  <div id="content">
    <div id="main_content">
      <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
         <?php endwhile; ?>
    <?php else: ?>
    <?php endif; ?>
    
        <?php if (is_page('Home')) : ?>
        <?php the_content(); ?>
      
      <div id="from_blog"><a href="blog/"></a></div>
        <div class="blog_post" style="padding-top: 50px;">
     <?php query_posts($query_string . 'showposts=1'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>  

 <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <span class="date"><?php the_date(); ?></span> 
        <?php the_content(); ?> 
<?php if ( comments_open() ) : ?>
<?php comments_popup_link('No Comments - be the first!', '1 Comment so far - read it and leave your own! ', '%  Comments - read them and leave your own!', 'comment-link', 'Sorry, no further comments on this post'); ?> 

<?php endif; ?>  

<?php endwhile; ?>
<?php else : ?>
<?php endif; ?>
</div>
<?php endif; ?>

      <?php if (is_page('About')) : ?>
		<div id="page_content">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
      </div>
      <?php endif; ?>
      <?php if (is_page('Portfolio')) : ?>
		<div id="page_content">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
      </div>
      <?php endif; ?>
      <?php if (is_page('Contact')) : ?>
		<div id="page_content">
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>
      </div>
      <?php endif; ?>
   <?php include TEMPLATEPATH. '/p_info.php'; ?>
   <?php get_footer(); ?>