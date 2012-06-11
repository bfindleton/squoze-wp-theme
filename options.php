<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'squoze'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Sidebar columns
	$sidebar_columns = array(
		'2' => __('Two', 'squoze'),
		'3' => __('Three', 'squoze'),
		'4' => __('Four', 'squoze')
	);

	// Test data
	$test_array = array(
		'one' => __('One', 'squoze'),
		'two' => __('Two', 'squoze'),
		'three' => __('Three', 'squoze'),
		'four' => __('Four', 'squoze'),
		'five' => __('Five', 'squoze')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __('French Toast', 'squoze'),
		'two' => __('Pancake', 'squoze'),
		'three' => __('Omelette', 'squoze'),
		'four' => __('Crepe', 'squoze'),
		'five' => __('Waffle', 'squoze')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );
		
	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/images/';

	$options = array();

	$options[] = array(
		'name' => __('Basic Settings', 'squoze'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Default Layout', 'squoze'),
		'desc' => __('Select default sidebar layout.', 'squoze'),
		'id' => 'sidebar_layout',
		'std' => "left",
		'type' => "images",
		'options' => array(
			'none' => $imagepath . '1col.png',
			'left' => $imagepath . '2cl.png',
			'right' => $imagepath . '2cr.png',
			'both' => $imagepath . '3col.png'
		)
	);

	$options[] = array(
		'name' => __('Left Sidebar Columns', 'squoze'),
		'desc' => __('Select number of columns for the left sidebar.', 'squoze'),
		'id' => 'left_sidebar_columns',
		'std' => '2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sidebar_columns);

	$options[] = array(
		'name' => __('Right Sidebar Columns', 'squoze'),
		'desc' => __('Select number of columns for the right sidebar.', 'squoze'),
		'id' => 'right_sidebar_columns',
		'std' => '2',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $sidebar_columns);

	$options[] = array(
		'name' => __('Custom Stylesheet', 'squoze'),
		'desc' => __('Add your own stylesheet.', 'squoze'),
		'id' => 'custom_styles',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input Text Mini', 'squoze'),
		'desc' => __('A mini text input field.', 'squoze'),
		'id' => 'example_text_mini',
		'std' => 'Default',
		'class' => 'mini',
		'type' => 'text');

	$options[] = array(
		'name' => __('Input Text', 'squoze'),
		'desc' => __('A text input field.', 'squoze'),
		'id' => 'example_text',
		'std' => 'Default Value',
		'type' => 'text');

	$options[] = array(
		'name' => __('Textarea', 'squoze'),
		'desc' => __('Textarea description.', 'squoze'),
		'id' => 'example_textarea',
		'std' => 'Default Text',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Input Select Small', 'squoze'),
		'desc' => __('Small Select Box.', 'squoze'),
		'id' => 'example_select',
		'std' => 'three',
		'type' => 'select',
		'class' => 'mini', //mini, tiny, small
		'options' => $test_array);

	$options[] = array(
		'name' => __('Input Select Wide', 'squoze'),
		'desc' => __('A wider select box.', 'squoze'),
		'id' => 'example_select_wide',
		'std' => 'two',
		'type' => 'select',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Select a Category', 'squoze'),
		'desc' => __('Passed an array of categories with cat_ID and cat_name', 'squoze'),
		'id' => 'example_select_categories',
		'type' => 'select',
		'options' => $options_categories);

	$options[] = array(
		'name' => __('Select a Page', 'squoze'),
		'desc' => __('Passed an pages with ID and post_title', 'squoze'),
		'id' => 'example_select_pages',
		'type' => 'select',
		'options' => $options_pages);

	$options[] = array(
		'name' => __('Input Radio (one)', 'squoze'),
		'desc' => __('Radio select with default options "one".', 'squoze'),
		'id' => 'example_radio',
		'std' => 'one',
		'type' => 'radio',
		'options' => $test_array);

	$options[] = array(
		'name' => __('Example Info', 'squoze'),
		'desc' => __('This is just some example information you can put in the panel.', 'squoze'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Input Checkbox', 'squoze'),
		'desc' => __('Example checkbox, defaults to true.', 'squoze'),
		'id' => 'example_checkbox',
		'std' => '1',
		'type' => 'checkbox');

	$options[] = array(
		'name' => __('Advanced Settings', 'squoze'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Check to Show a Hidden Text Input', 'squoze'),
		'desc' => __('Click here and see what happens.', 'squoze'),
		'id' => 'example_showhidden',
		'type' => 'checkbox');
		
	$options[] = array(
		'name' => __('Hidden Text Input', 'squoze'),
		'desc' => __('This option is hidden unless activated by a checkbox click.', 'squoze'),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text');

	$options[] = array(
		'name' => __('Uploader Test', 'squoze'),
		'desc' => __('This creates a full size uploader that previews the image.', 'squoze'),
		'id' => 'example_uploader',
		'type' => 'upload');

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png')
	);

	$options[] = array(
		'name' =>  __('Example Background', 'squoze'),
		'desc' => __('Change the background CSS.', 'squoze'),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background' );

	$options[] = array(
		'name' => __('Multicheck', 'squoze'),
		'desc' => __('Multicheck description.', 'squoze'),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);

	$options[] = array(
		'name' => __('Colorpicker', 'squoze'),
		'desc' => __('No color selected by default.', 'squoze'),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color' );
		
	$options[] = array( 'name' => __('Typography', 'squoze'),
		'desc' => __('Example typography.', 'squoze'),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography' );
		
	$options[] = array(
		'name' => __('Custom Typography', 'squoze'),
		'desc' => __('Custom typography options.', 'squoze'),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options );

	$options[] = array(
		'name' => __('Text Editor', 'squoze'),
		'type' => 'heading' );

	/**
	 * For $settings options see:
	 * http://codex.wordpress.org/Function_Reference/wp_editor
	 *
	 * 'media_buttons' are not supported as there is no post to attach items to
	 * 'textarea_name' is set by the 'id' you choose
	 */

	$wp_editor_settings = array(
		'wpautop' => true, // Default
		'textarea_rows' => 5,
		'tinymce' => array( 'plugins' => 'wordpress' )
	);
	
	$options[] = array(
		'name' => __('Default Text Editor', 'squoze'),
		'desc' => sprintf( __( 'You can also pass settings to the editor.  Read more about wp_editor in <a href="%1$s" target="_blank">the WordPress codex</a>', 'squoze' ), 'http://codex.wordpress.org/Function_Reference/wp_editor' ),
		'id' => 'example_editor',
		'type' => 'editor',
		'settings' => $wp_editor_settings );

	return $options;
}

/*
 * This is an example of how to add custom scripts to the options panel.
 * This example shows/hides an option when a checkbox is clicked.
 */

add_action('optionsframework_custom_scripts', 'optionsframework_custom_scripts');

function optionsframework_custom_scripts() { ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('#example_showhidden').click(function() {
  		$('#section-example_text_hidden').fadeToggle(400);
	});

	if ($('#example_showhidden:checked').val() !== undefined) {
		$('#section-example_text_hidden').show();
	}

});
</script>

<?php
}