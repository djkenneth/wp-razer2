<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'NAKED_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 900;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'naked' ), // Register the Primary menu
		// Copy and paste the line above right here if you want to make another menu, 
		// just change the 'primary' to another name
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function naked_register_sidebars() {
	register_sidebar(array(				// Start a series of sidebars to register
		'id' => 'sidebar', 					// Make an ID
		'name' => 'Sidebar',				// Name it
		'description' => 'Take it on the side...', // Dumb description for the admin side
		'before_widget' => '<div>',	// What to display before each widget
		'after_widget' => '</div>',	// What to display following each widget
		'before_title' => '<h3 class="side-title">',	// What to display before each widget's title
		'after_title' => '</h3>',		// What to display following each widget's title
		'empty_title'=> '',					// What to display in the case of no title defined for a widget
		// Copy and paste the lines above right here if you want to make another sidebar, 
		// just change the values of id and name to another word/name
	));
} 
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'naked_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function naked_scripts()  { 

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('style.css', get_stylesheet_directory_uri() . '/style.css');
	
	// add fitvid
	wp_enqueue_script( 'naked-fitvid', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), NAKED_VERSION, true );
	
	// add theme scripts
	wp_enqueue_script( 'naked', get_template_directory_uri() . '/js/theme.min.js', array(), NAKED_VERSION, true );

	wp_enqueue_style('tailwindcss_output', get_template_directory_uri() . '/src/output.css', array());

	wp_enqueue_script('custom.js', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), true ); 

	wp_enqueue_style('custom.css', get_stylesheet_directory_uri() . '/assets/css/custom.css');

	/// add bootstrap style
	// wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');
	// wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array(), true );
}
add_action( 'wp_enqueue_scripts', 'naked_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header

function enqueue_my_custom_shortcode() {
    include_once get_template_directory() . '/inc/cta.php';
}

add_action('init', 'enqueue_my_custom_shortcode');

function fetch_todos_from_api() {
    // Define the API endpoint
    $api_url = 'https://jsonplaceholder.typicode.com/todos?_start=0&_limit=5';

    // Make a GET request to the API
    $response = wp_remote_get($api_url);

    // Check for errors
    if (is_wp_error($response)) {
        return 'Unable to retrieve data.';
    }

    // Get the response body
    $body = wp_remote_retrieve_body($response);

    // Decode the JSON data into an associative array
    $todos = json_decode($body, true);

    // Check if decoding was successful
    if (!is_array($todos)) {
        return 'Error decoding JSON data.';
    }

    // Start output buffering to capture HTML output
    ob_start();

    // Display the data
    echo '<ul class="todos-list">';
    foreach ($todos as $todo) {
        echo '<li>';
        echo '<strong>ID:</strong> ' . esc_html($todo['id']) . '<br>';
        echo '<strong>Title:</strong> ' . esc_html($todo['title']) . '<br>';
        echo '<strong>Completed:</strong> ' . ($todo['completed'] ? 'Yes' : 'No');
        echo '</li>';
    }
    echo '</ul>';

    // Return the captured output
    return ob_get_clean();
}

// Register the shortcode
add_shortcode('display_todos', 'fetch_todos_from_api');


// function cptui_register_my_cpts_people() {

// 	/**
// 	 * Post Type: People.
// 	 */

// 	$labels = [
// 		"name" => esc_html__( "People", "custom-post-type-ui" ),
// 		"singular_name" => esc_html__( "Person", "custom-post-type-ui" ),
// 	];

// 	$args = [
// 		"label" => esc_html__( "People", "custom-post-type-ui" ),
// 		"labels" => $labels,
// 		"description" => "",
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"show_ui" => true,
// 		"show_in_rest" => true,
// 		"rest_base" => "",
// 		"rest_controller_class" => "WP_REST_Posts_Controller",
// 		"rest_namespace" => "wp/v2",
// 		"has_archive" => false,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"delete_with_user" => false,
// 		"exclude_from_search" => false,
// 		"capability_type" => "post",
// 		"map_meta_cap" => true,
// 		"hierarchical" => false,
// 		"can_export" => false,
// 		"rewrite" => [ "slug" => "people", "with_front" => true ],
// 		"query_var" => true,
// 		"supports" => [ "title", "editor", "thumbnail" ],
// 		"show_in_graphql" => false,
// 	];

// 	register_post_type( "people", $args );
// }

// add_action( 'init', 'cptui_register_my_cpts_people' );



// function cptui_register_my_taxes_breeds() {

// 	/**
// 	 * Taxonomy: Breeds.
// 	 */

// 	$labels = [
// 		"name" => esc_html__( "Breeds", "custom-post-type-ui" ),
// 		"singular_name" => esc_html__( "Breed", "custom-post-type-ui" ),
// 	];

	
// 	$args = [
// 		"label" => esc_html__( "Breeds", "custom-post-type-ui" ),
// 		"labels" => $labels,
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"hierarchical" => true,
// 		"show_ui" => true,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"query_var" => true,
// 		"rewrite" => [ 'slug' => 'breeds', 'with_front' => true,  'hierarchical' => true, ],
// 		"show_admin_column" => true,
// 		"show_in_rest" => true,
// 		"show_tagcloud" => false,
// 		"rest_base" => "breeds",
// 		"rest_controller_class" => "WP_REST_Terms_Controller",
// 		"rest_namespace" => "wp/v2",
// 		"show_in_quick_edit" => false,
// 		"sort" => false,
// 		"show_in_graphql" => false,
// 	];
// 	register_taxonomy( "breeds", [ "cats" ], $args );
// }
// add_action( 'init', 'cptui_register_my_taxes_breeds' );