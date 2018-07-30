<?php

get_header();

if(have_posts()):
    while(have_posts()) : the_post(); ?>
<!-- anything between this line and endwhile gets repeated for every post -->
<article class="post-page">
 <!-- site nav class removes li dots and floats everything to the links are on a single line -->
	 
<?php 
if (has_children() or $post->post_parent>0) { ?>
 <nav class="site-nav children-links clearfix">

<span class="parent-link">
	<a href="<?php echo get_the_permalink(get_top_ancestor_id()); ?>">
		<?php echo get_the_title(get_top_ancestor_id())?>
	</a>
	</span>

<ul class="test1">
	
	<?php


$args = array(
"child_of" => get_top_ancestor_id(),   
//  "child_of" => $post->ID,   // only displays child pages of "about me", $post -> ID means display children of the currently viewed page//old solution
"title_li" => ""  //removes the "pages" text from the child page list
);

?>
	<!-- list_pages function outputs each child link in a li item, but the li items need to live in an ul item -->
	<?php wp_list_pages($args); ?>
	<!-- makes a list out of all the pages connected to wp -->
</ul>


</nav>

<?php } ?>

	
	<h2>
		<?php the_title();?>
	</h2>


	<?php the_content();?>
</article>
<?php endwhile;

else : 
  echo "<p> No content found</p>";
endif;
  

get_footer();


