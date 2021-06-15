<?php get_header(); ?>
  <div id="content">
    
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
    <div class="post" id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
		
		<div class="entry">
		<?php the_content('<p>Continue reading &raquo;</p>'); ?>
		<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
		<?php edit_post_link('Edit', '<p>', '</p>'); ?>
		</div><!--/entry -->
	
	</div><!--/post -->
	
		<?php endwhile; endif; ?>

  </div><!--/content -->
  
  <div id="footer"></div>
</div><!--/left-col -->

<?php get_sidebar(); ?>
  
<?php get_footer(); ?>