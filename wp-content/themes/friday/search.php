<?php get_header(); ?>
    <!--<p>I work with small businesses and individuals who need an effective online presence to create professional, attractive websites built according to web standards. You can view some of my <a href="">work</a> or <a href="">contact me</a>.</p>-->
    <img id="boy_dino" src="../../../wp-content/themes/friday/images/boy_dino.png" alt="Exercise Your Imagination" /> </div>
  <div id="content">
    <div id="main_content">
        <?php include TEMPLATEPATH. '/p_info.php'; ?>
      <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="blog_post">
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <span class="date"><?php the_date(); ?></span>
        <?php the_content(); ?>
      </div>
      <?php endwhile; ?>
    <?php else: ?>
    <h2>Regrettably the page you seek is extinct!</h2>
    <?php endif; ?>
    
    <ul id="new_old">
    <li>
      <?php next_posts_link('&lt;&lt; Staler');?>
    </li>
    <li>
      <?php previous_posts_link('Fresher &gt;&gt;');?>
    </li>
  </ul>
           <?php get_footer(); ?>