<?php
/**
 * Products custom post type
 *
 * @package squoze
 * @since squoze 1.0
 */

// Register Products Post Type
add_action( 'init', 'squoze_register_product_posts' );

function squoze_register_product_posts() {
    $labels = array(
        'name' => __( 'Products', 'squoze' ),
        'singular_name' => __( 'Product', 'squoze' ),
        'add_new' => __( 'Add New', 'squoze' ),
        'add_new_item' => __( 'Add New Product', 'squoze' ),
        'edit_item' => __( 'Edit Product', 'squoze' ),
        'new_item' => __( 'New Product', 'squoze' ),
        'view_item' => __( 'View Product', 'squoze' ),
        'search_items' => __( 'Search Product', 'squoze' ),
        'not_found' => __( 'No Product found', 'squoze' ),
        'not_found_in_trash' => __( 'No Product found in Trash', 'squoze' ),
        'parent_item_colon' => __( 'Parent Product:', 'squoze' ),
        'menu_name' => __( 'Products', 'squoze' )
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', ),
        'description' => __( 'Products', 'squoze' ),
		'menu_position' => 6,
        'public' => true,
        'show_ui' => true,
        'query_var' => true,  
        'can_export' => true,  
        'show_in_menu' => true,  
        'show_in_nav_menus' => false,  
        'publicly_queryable' => true,  
        'exclude_from_search' => false,  
        'rewrite' => array( 'slug' => 'products' ),
        'capability_type' => 'post'
    );

    register_post_type( 'product', $args );
}

add_action( 'admin_init', 'squoze_products_init' );
add_action( 'save_post', 'squoze_save_price' );

function squoze_products_init() {
	add_meta_box( "prodInfo-meta", "Product Options", "squoze_meta_options", "product", "normal", "high" );
}

function squoze_meta_options() {
	global $post;
	$price = '';
	if ( $post ) {
		$custom = get_post_custom( $post->ID );
		if ( array_key_exists( "price", $custom ) ) {
			$price = $custom["price"][0];
		}
	}
?>
	<label>Price:</label><input name="price" value="<?php echo $price; ?>" />
<?php
}

function squoze_save_price() {
	global $post;
	if ( $post ) {
		update_post_meta( $post->ID, "price", $_POST["price"] );
	}
}

add_action( 'init', 'squoze_create_product_taxonomies' );

function squoze_create_product_taxonomies() {

	$labels = array(
		'name' => __( 'Catalogs', 'squoze', 'squoze' ),
		'singular_name' => __( 'Catalog', 'squoze', 'squoze' ),
		'search_items' =>  __( 'Search Catalogs', 'squoze' ),
		'all_items' => __( 'All Catalogs', 'squoze' ),
		'parent_item' => __( 'Parent Catalog', 'squoze' ),
		'parent_item_colon' => __( 'Parent Catalog:', 'squoze' ),
		'edit_item' => __( 'Edit Catalog', 'squoze' ), 
		'update_item' => __( 'Update Catalog', 'squoze' ),
		'add_new_item' => __( 'Add New Catalog', 'squoze' ),
		'new_item_name' => __( 'New Catalog Name', 'squoze' ),
		'menu_name' => __( 'Catalog', 'squoze' ),
	); 
	register_taxonomy( "catalog", array("product"), array(
					"hierarchical" => true,
					"labels" => $labels,
					"show_ui" => true,
					"query_var" => true,
					"rewrite" => array( 'slug' =>'catalog') )
				);
}

add_filter( 'manage_edit-product_columns', 'squoze_prod_edit_columns' );
add_action( 'manage_posts_custom_column', 'squoze_prod_custom_columns' );

function squoze_prod_edit_columns($columns){
        $columns = array(
            "cb" => "<input type=\"checkbox\" />",
            "title" => __( "Product Title", 'squoze' ),
            "description" => __( "Description", 'squoze' ),
            "price" => __( "Price", 'squoze' ),
            "catalog" => __( "Catalog", 'squoze' ),
        );

        return $columns;
}

function squoze_prod_custom_columns($column){
        global $post;
        switch ($column)
        {
            case "description":
                the_excerpt();
                break;
            case "price":
                $custom = get_post_custom();
                echo $custom["price"][0];
                break;
            case "catalog":
                echo get_the_term_list($post->ID, 'catalog', '', ', ','');
                break;
        }
}
