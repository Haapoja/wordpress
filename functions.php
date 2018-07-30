<?php       /* this function imports css styles to the page */
function custom_wp(){
    wp_enqueue_style("style", get_stylesheet_uri());
}
/* need to add the function for it to actually run */
add_action("wp_enqueue_scripts", "custom_wp");

//nav menus
register_nav_menus(array(                 //assings menus 
    "primary"=> __("Primary Menu"),
    "footer"=>__("Footer Menu")
));





//get top ancestor
//purpouse: return value of topmost ancestor page in the form of an id relative to the current page viewed
//meaning, if viewing a parent page, it can return its own id value, but if on a child page, it retuns the value of its parent page
function get_top_ancestor_id(){

    global $post;
//if current page, has parent
    if($post->post_parent){                //get_post_ancestors creates an array containing parent, great parent and so on, not needed in this situation
     //we dont need an array, so create a variable to contain the array, need to reverse the array, because it stores in it an order, ind which
     //the first value is the most direct parent instead of topmost parent
        $ancestors = array_reverse(get_post_ancestors($post->ID));
     //return first value of the array
        return $ancestors[0];
    }
  //if page does not have a parent, return page id
    return $post->ID;
}


//does page have children?

function has_children(){
global $post;

$pages = get_pages("child_of=" . $post->ID);
return count($pages);
}

//customize excerpt word count length
function custom_excerpt(){
    return 25;
}
//calls the function, specifies what to alter with "excerpt_length"
add_filter("excerpt_length", "custom_excerpt");

//theme setup
function Wp_setup(){


    //add featured image support
    add_theme_support("post-thumbnails");
    add_image_size("small-thumbnail", 180, 120,true);
                               //width, height, hardcropping/softcropping 
   add_image_size("banner-image", 920, 210, true);

}

add_action("after_setup_theme", "Wp_setup");


