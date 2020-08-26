<?php

//**php for dynamic title***************************************************************************//

<title><?php bloginfo('name'); ?></title>

///***php for images and jequery slider******************************************************//
<?php echo get_template_directory_uri(); ?>/

//php for css***********************************************//
<?php bloginfo('stylesheet_url'); ?>

//*for wp head and footer****************************************************//
<?php wp_head();?>
<?php wp_footer();?>

//add header,footer and sidebar***********************************************//
<?php get_header();?>
<?php get_footer();?>
<?php get_sidebar();?>

////php for slider add**************************************************************/
<?php get_template_part('slider');?>
////****this code for meta tag*****************************************************************************/
<?<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

//PHP FOR MANIN MANU ***************************************************************************//

add_action('init', 'wpj_register_menu');
	function wpj_register_menu() {
		if (function_exists('register_nav_menu')) {
			register_nav_menu( 'wpj-main-menu', __( 'Main Menu', 'brightpage' ) );
		}
	}
//php for that from where cut the main manu like <ul>********************************************************************//
<div class="mainmenu">
				<?php
				if (function_exists('wp_nav_menu')) {
					wp_nav_menu(array('theme_location' => 'wpj-main-menu', 'menu_id' => 'nav', 'fallback_cb' => 'wpj_default_menu'));
				}
				else {
					wpj_default_menu();
				}
				?>
</div>

	
//*php for default manu*********************************************************************//
	function wpj_default_menu() {
		echo '<ul id="nav">';
		if ('page' != get_option('show_on_front')) {
			echo '<li><a href="'. home_url() . '/">Home</a></li>';
		}
		wp_list_pages('title_li=');
		echo '</ul>';
	}
//php for footer manu*****************************************//

	register_nav_menu( 'menu_footer', __( 'Footer Menu', 'bilanti' ) );

////////////***this code for drobdown manu made by jQuery********************************//////////////////////////////////////
		<?php wp_nav_menu(array('theme_location' => 'wpj-main-menu', 'menu_id' => 'mobile_menu'));?>

//php for sidebar and widget function*****************************************************************//

function habib_widget_areas() {
	register_sidebar( array(
		'name' => __( 'Left Menu', 'rasel' ),
		'id' => 'left_sidebar',
		'before_widget' => '<div class="single_sidebar">',
		'after_widget' => '</div>',
	    'before_title' => '<h2 style="display:none">',  
	    'after_title' => '</h2>',
	) );
}
add_action('widgets_init', 'habib_widget_areas');

//php for sidebar*************//
<?php dynamic_sidebar('name of id');?>



// ***php for posts mathod*************************************************************//
<?php if(have_posts()):?>
<?php while(have_posts()): the_posts; ?>
<Ã¢â‚¬Â¦Ã¢â‚¬Â¦Ã¢â‚¬Â¦pos Ã¢â‚¬Â¦Ã¢â‚¬Â¦Ã¢â‚¬Â¦Ã¢â‚¬Â¦Ã¢â‚¬Â¦Ã¢â‚¬Â¦Ã¢â‚¬Â¦Ã¢â‚¬Â¦>
<?php endwhile;?>
<?php endif; ?>


//************php for post mathod*************************************************************//
<?php if(have_posts()) :?>
					<?php while(have_posts()): the_post();?>
						<div class="heading">
							<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
						</div>
						<div class="post_info">
							posted on:<?php the_category('/');?>|posted in:<?php the_time('m,d,y');?>
							<?php comments_popup_link('no comments','1comments','%comments');?>
						</div>
						<div class="content">
							<?php the_content();?>
						</div>
						<?php endwhile;?>
						<?php endif;?>
						
						
//**************php for pragenation***********************************************************//
<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts') ); ?></div>
<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>') ); ?></div>


Post ar title anar jonno:<?php the_title(); ?>
Post ar title ka link korar jonno:<?php the_permalink(); ?>
Post ar on anar jonno:<?php the_time(Ã¢â‚¬ËœM,d,yÃ¢â‚¬â„¢); ?>
Post ar  saranso anar jonno:<?php the_excerpt(); ?>
Post ar pror content anar jonno:<?php the_ content (); ?>
Post ar posted in ar jonno? :<?php the_category(Ã¢â‚¬Ëœ,Ã¢â‚¬â„¢); ?>
Post ar comment anar jonno:<?php comments_popup_link(Ã¢â‚¬Ëœno commentÃ¢â‚¬â„¢,Ã¢â‚¬â„¢1 commentÃ¢â‚¬â„¢,Ã¢â‚¬â„¢% commentsÃ¢â‚¬â„¢); ?>



//*PHP for single php***********************************************************//

			<?php if(have_posts()) : ?>
				<?php while(have_posts())  : the_post(); ?>

						<h2><?php the_title(); ?></h2>

						<?php the_content(); ?>

					   <?php comments_template( '', true ); ?>  

					<?php endwhile; ?>

					 

					<?php else : ?>

						<h3><?php _e('404 Error&#58; Not Found'); ?></h3>

					<?php endif; ?>


//php for archive php******************************php for archive php*************************************************************//

<h1 class="archivetitle">

    <?php if (have_posts()) : ?>

        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

            <?php /* If this is a category archive */ if (is_category()) { ?>

                <?php _e('Archive for the'); ?> '<?php echo single_cat_title(); ?>' <?php _e('Category'); ?>                                    

            <?php /* If this is a tag archive */  } elseif( is_tag() ) { ?>

                <?php _e('Archive for the'); ?> <?php single_tag_title(); ?> Tag

            <?php /* If this is a daily archive */ } elseif (is_day()) { ?>

                <?php _e('Archive for'); ?> <?php the_time('F jS, Y'); ?>                                        

            <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>

                <?php _e('Archive for'); ?> <?php the_time('F, Y'); ?>                                    

            <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>

                <?php _e('Archive for'); ?> <?php the_time('Y'); ?>                                        

            <?php /* If this is a search */ } elseif (is_search()) { ?>

                <?php _e('Search Results'); ?>                            

            <?php /* If this is an author archive */ } elseif (is_author()) { ?>

                <?php _e('Author Archive'); ?>                                        

            <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

                <?php _e('Blog Archives'); ?>                                        

    <?php } ?>

</h1>
//defoult archive*****************************************************************//
<?php else : ?>

    <h3><?php _e('404 Error&#58; Not Found'); ?></h3>

<?php endif; ?>
				
			
//*************php for ajax script*****************************//
function comment_scripts(){

   if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

}

add_action( 'wp_enqueue_scripts', 'comment_scripts' );


//* This code for Featured Image Support ****************************************/

add_theme_support( 'post-thumbnails', array( 'post' ) );
set_post_thumbnail_size( 200, 200, true );
add_image_size( 'post-image', 150, 150, true );

///////php for fearure image left write in post_loop*************************************//
<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-image', array('class' => 'post-thumb')); ?></a>


/* This code for readmore write in functon **********************************************************************************************************************/

function excerpt($num) {

$limit = $num+1;

$excerpt = explode(' ', get_the_excerpt(), $limit);

array_pop($excerpt);

$excerpt = implode(" ",$excerpt)." <a href='" .get_permalink($post->ID) ." ' class='".readmore."'>Read More</a>";

echo $excerpt;

}
/********this code for readmore write in postloop and delete php the content****************************/////////////////
<?php echo excerpt('20'); ?>
//*********this code for 404 404*******404************404**********404******
			<div class="not_found">
				<h1>404 not found!</h1>
				<p>Sorry, but the page you are trying to reach is unavailable or does not exist.</p>
			</div>

//* this code for post quary and news catagory and others catagory post**************************write in template with post loop*************************//
<?php query_posts('post_type=post&category_name=News&post_status=publish&posts_per_page=2&paged='. get_query_var('paged')); ?>
<?php query_posts('post_type=post&category_name=Others&post_status=publish&posts_per_page=2&paged='. get_query_var('paged')); ?>

/* This is code for custom Post  and write it in functions.php*/

    /* Register Custom Post Types********************************************/
     
            add_action( 'init', 'create_post_type' );
            function create_post_type() {
                    register_post_type( 'testimonial',
                            array(
                                    'labels' => array(
                                            'name' => __( 'Testimonial' ),
                                            'singular_name' => __( 'Testimonial' ),
                                            'add_new' => __( 'Add New' ),
                                            'add_new_item' => __( 'Add New Testimonial' ),
                                            'edit_item' => __( 'Edit Testimonial' ),
                                            'new_item' => __( 'New Testimonial' ),
                                            'view_item' => __( 'View Testimonial' ),
                                            'not_found' => __( 'Sorry, we couldn\'t find the Testimonial you are looking for.' )
                                    ),
                            'public' => true,
                            'publicly_queryable' => false,
                            'exclude_from_search' => true,
                            'menu_position' => 14,
                            'has_archive' => false,
                            'hierarchical' => false,
                            'capability_type' => 'page',
                            'rewrite' => array( 'slug' => 'testimonial' ),
                            'supports' => array( 'title', 'editor', 'custom-fields' )
                            )
                    );
            }
			
			
	/////////**********************this code for slider costom post***************************///////////
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
	
	
		register_post_type( 'slider',
			array(
				'labels' => array(
						'name' => __( 'Slider' ),
						'singular_name' => __( 'Slide' ),
						'add_new' => __( 'Add New' ),
						'add_new_item' => __( 'Add New Slide' ),
						'edit_item' => __( 'Edit Slide' ),
						'new_item' => __( 'New Slide' ),
						'view_item' => __( 'View Slide' ),
						'not_found' => __( 'Sorry, we couldn\'t find the Slide you are looking for.' )
				),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => true,
			'menu_position' => 14,
			'has_archive' => true,
			'hierarchical' => true,
			'capability_type' => 'post',
			'rewrite' => array( 'slug' => 'slide' ),
			'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail' )
			)
		);
			
	}	
	
///////////////////////*********************this code for slider fature images******************////////////////////
	add_theme_support( 'post-thumbnails', array( 'post', 'slider') );
	add_image_size( 'slider-image', 670, 325, true );
	
/*this code for costom field write in postloop a********************/
/*this code for costom field write in postloop a********************/
////////*****display contomfields data*******///////
<?php $key="url"; echo get_post_meta($post->ID, $key, true )?>


<p style="background:red;color:#fff;padding:10px">
<?php $url = get_post_meta( $post->ID, 'url', true );
if ( $url ) {
    echo $url;
} else {
    the_permalink();
}
?></p>
/*with out image there is ***************************************/////// */
<?php $image=get_post_meta( $post->ID, 'url', true );
if($image):?>
<img src="<?php echo $image;?>" alt=""/>
<?php endif;?>


/*this code for active option tree write  in functions php******************************************/
/* This code for theme options */

add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_show_new_layout', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
include_once( 'option-tree/ot-loader.php' );
include_once( 'includes/theme-options.php' );


/////////////////********select the conditional data by the option tree**********////////////////////////////////////////////////////////***************/////////
					<?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'your_tree_id') ) : ?>    
					<?php get_option_tree( 'your_tree_id', '', 'true' ); ?>
					<?php else : ?>
					your default data
					<?php endif; endif; ?> 
				
///////////****************this code for logo uplodar by the option tree****************************************************///////////////////////////////////////////////

<?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'logo_uploader') ) : ?>    
					<a href="<?php bloginfo('home'); ?>"><img src="<?php get_option_tree( 'logo_uploader', '', 'true' ); ?>" alt=""/></a>
				<?php else : ?>
					<a href="<?php bloginfo('home'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt=""/></a>
				<?php endif; endif; ?> 


/******this code for search**************************************************************************/
function my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );
///////////////////***********this code for search html*************///////////////////////

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text" for="s">Search for:</label>
        <input type="text" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit" value="Search" />
    </div>
</form>


/////////////////******************************this code for shortcote******************************************************************/////////////////


function category_post_shortcode($atts){
	extract( shortcode_atts( array(
		'title' => '',
		'link' => '',
		'category' => '',
	), $atts, 'category_post' ) );
	
    $q = new WP_Query(
        array( 'category' => $category, 'posts_per_page' => '3', 'post_type' => 'post')
        );
$list = '<div class="latest_from_category"><h2 class="latest_frm_cat_title">'.$title.'</h2> <a href="'.$link.'" class="latest_more_link">more</a>';

while($q->have_posts()) : $q->the_post();
    //get the ID of your post in the loop
    $id = get_the_ID();

    $post_excerpt = get_post_meta($id, 'post_excerpt', true);  
	$post_thumbnail= get_the_post_thumbnail( $post->ID, 'post-thumbnail' );        
    $list .= '
	
						<div class="single_cate_post floatleft">
							'.$post_thumbnail.'
							<h3>'.get_the_title().'</h3> 
							<p>'.$post_excerpt.'</p>
							<a href="'.get_permalink().'" class="readmore">Read More</a>
						</div>		
	';        
endwhile;
$list.= '</div>';
wp_reset_query();
return $list;
}
add_shortcode('category_post', 'category_post_shortcode');	


	/******************** this code for enable jquery in wordpress Adding Latest jQuery from Wordpress */
	function news_reporter_latest_jquery() {
		wp_enqueue_script('jquery');
	}
	add_action('init', 'news_reporter_latest_jquery');


//////////*****************this code for shortcode*****************//////////////////

					function category_post_shortcode($atts){
						extract( shortcode_atts( array(
							'title' => '',
							'link' => '',
							'category' => '',
						), $atts, 'category_post' ) );
						
						$q = new WP_Query(
							array( 'category' => $category, 'posts_per_page' => '3', 'post_type' => 'post')
							);
					$list = '<div class="latest_from_category"><h2 class="latest_frm_cat_title">'.$title.'</h2> <a href="'.$link.'" class="latest_more_link">more</a>';

					while($q->have_posts()) : $q->the_post();
						//get the ID of your post in the loop
						$id = get_the_ID();

						$post_excerpt = get_post_meta($id, 'post_excerpt', true);  
						$post_thumbnail= get_the_post_thumbnail( $post->ID, 'post-thumbnail' );        
						$list .= '
						
											<div class="single_cate_post floatleft">
												'.$post_thumbnail.'
												<h3>'.get_the_title().'</h3> 
												<p>'.$post_excerpt.'</p>
												<a href="'.get_permalink().'" class="readmore">Read More</a>
											</div>		
						';        
					endwhile;
					$list.= '</div>';
					wp_reset_query();
					return $list;
					}
					add_shortcode('category_post', 'category_post_shortcode');	


?>