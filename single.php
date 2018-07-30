<?php

get_header();

if(have_posts()):
    while(have_posts()) : the_post(); ?> <!-- anything between this line and endwhile gets repeated for every post -->
   <article class="post">
    <h2><a href="<?php the_permalink(); ?>"> <?php the_title();?></a></h2>
    
    <p class="info"><?php the_time("F jS, Y g:i a"); ?> | by <a href="<?php get_author_posts_url(get_the_author_meta("ID"));?>"><?php the_author();?></a> | Posted in 
    
    <?php
                     //get category will return an array with all categories assinged to a post
    $categories = get_the_category();
    $seperator = ", ";            //if theres more than 1 category, seperate them with a , and a space     
    $output = "";


   if($categories){ //if there is content in categories, loop through each item once
     foreach($categories as $category){
       //$category works like this
 
   $output .= '<a href="' . get_category_link($category->term_id) . '">' .  $category->cat_name . '</a>' . $seperator;  // .= means you can add to a variable, instead of overwriting a variable

     }//once the looping is done, output the categories
            //trim takes output and removes from the end/beginning anything that resembles the $seperator
    echo trim($output, $seperator);

   }

    ?>
    
    
    </p>

    <?php the_post_thumbnail("banner-image");  ?>

<?php the_content();?>

</article>
  <?php endwhile;

else : 
  echo "<p> No content found</p>";
endif;
  

get_footer();


?> 
