<?php

get_header();

if(have_posts()):
    while(have_posts()) : the_post(); ?> <!-- anything between this line and endwhile gets repeated for every post -->
                          <!-- this line of code:only applies the class "has-thumbnail" if a post has a thumbnail-->
   <article class="post <?php if(has_post_thumbnail()){?>has-thumbnail<?php } ?>">
<!--post thumbnail -->
 <div class="post-thumb">
 
 <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("small-thumbnail");  ?></a>

    </div>
    
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
        
    
    
    
    
    
         <!--if the post being looped through has excerpt-->
         <!-- in clear language: this if statement displays the full post text unless it has an excerpt -->
    <?php if($post->post_excerpt){ ?>

        
    <p>    <!-- adding get to the function will still return the excerpt, but it wont do anything with html, meaning: need to add <p> elements-->
    <?php echo get_the_excerpt();?> 
    <a href="<?php the_permalink();  ?>"> Read more&raquo; </a> <!-- &raquo; = arrows -->
 </p>


          
   <?php }else {

     the_content();

   }  ?>

  


</article>
  <?php endwhile;

else : 
  echo "<p> No content found</p>";
endif;
  

get_footer();


?> 
