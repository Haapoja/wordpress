<?php

get_header();

if(have_posts()):
    while(have_posts()) : the_post(); ?>
<!-- anything between this line and endwhile gets repeated for every post -->
<article class="post-page">
<div class="column-container clearfix">
			
			<!-- title-column -->
			<div class="title-column">
				<h2><?php the_title(); ?></h2>
			</div><!-- /title-column -->
			
			<!-- text-column -->
			<div class="text-column">
				<?php the_content(); ?>
			</div><!-- /text-column -->
			
		</div><!-- /column-container -->
		

</article>
<?php endwhile;

else : 
  echo "<p> No content found</p>";
endif;
  

get_footer();


