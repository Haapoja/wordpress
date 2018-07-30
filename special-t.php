<?php

/*template name : special layout 
*/

get_header();

if(have_posts()):
    while(have_posts()) : the_post(); ?> <!-- anything between this line and endwhile gets repeated for every post -->
   <article class="post-page">
    <h2><?php the_title();?></h2>
    <?php the_content();?>
</article>
  <?php endwhile;

else : 
  echo "<p> No content found</p>";
endif;
  

get_footer();


?> 
