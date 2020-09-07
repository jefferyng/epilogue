<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://jefferyng.com
 * @since      1.0.0
 *
 * @package    Epilogue
 * @subpackage Epilogue/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Epilogue
 * @subpackage Epilogue/admin
 * @author     Jeffery Ng <me@jefferyng.com>
 */
class Epilogue_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Epilogue_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Epilogue_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/epilogue-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Epilogue_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Epilogue_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/epilogue-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Creates FB Post custom post type
	*
	* @since 1.0.0
	* @access public
	* @uses register_post_type()
	*/
	public static function new_cpt_fb_posts() {
		$cap_type = 'post';
		$plural = 'Facebook Posts';
		$single = 'Facebook Post';
		$cpt_name = 'fb-post';

		$opts['can_export'] = TRUE;
		$opts['capability_type'] = $cap_type;
		$opts['description'] = '';
		$opts['exclude_from_search'] = FALSE;
		$opts['has_archive'] = FALSE;
		$opts['hierarchical'] = FALSE;
		$opts['map_meta_cap'] = TRUE;
		$opts['menu_icon'] = 'dashicons-admin-post';
		$opts['menu_position'] = 25;
		$opts['public'] = TRUE;
		$opts['publicly_querable'] = TRUE;
		$opts['query_var'] = TRUE;
		$opts['register_meta_box_cb'] = '';
		$opts['rewrite'] = FALSE;
		$opts['show_in_admin_bar'] = TRUE;
		$opts['show_in_menu'] = TRUE;
		$opts['show_in_nav_menu'] = TRUE;
		$opts['show_in_rest'] = TRUE;
		$opts['show_ui'] = TRUE;
		$opts['supports']	= array( 'title', 'editor' );
		$opts['taxonomies']	= array();

		$opts['capabilities']['delete_others_posts']	= "delete_others_{$cap_type}s";
		$opts['capabilities']['delete_post']	= "delete_{$cap_type}";
		$opts['capabilities']['delete_posts']	= "delete_{$cap_type}s";
		$opts['capabilities']['delete_private_posts']	= "delete_private_{$cap_type}s";
		$opts['capabilities']['delete_published_posts']	= "delete_published_{$cap_type}s";
		$opts['capabilities']['edit_others_posts']	= "edit_others_{$cap_type}s";
		$opts['capabilities']['edit_post']	= "edit_{$cap_type}";
		$opts['capabilities']['edit_posts']	= "edit_{$cap_type}s";
		$opts['capabilities']['edit_private_posts']	= "edit_private_{$cap_type}s";
		$opts['capabilities']['edit_published_posts']	= "edit_published_{$cap_type}s";
		$opts['capabilities']['publish_posts'] = "publish_{$cap_type}s";
		$opts['capabilities']['read_post'] = "read_{$cap_type}";
		$opts['capabilities']['read_private_posts'] = "read_private_{$cap_type}s";

		$opts['labels']['add_new'] = esc_html__( "Add New {$single}", 'epilogue' );
		$opts['labels']['add_new_item'] = esc_html__( "Add New {$single}", 'epilogue' );
		$opts['labels']['all_items'] = esc_html__( $plural, 'epilogue' );
		$opts['labels']['edit_item'] = esc_html__( "Edit {$single}" , 'epilogue' );
		$opts['labels']['menu_name'] = esc_html__( $plural, 'epilogue' );
		$opts['labels']['name'] = esc_html__( $plural, 'epilogue' );
		$opts['labels']['name_admin_bar'] = esc_html__( $single, 'epilogue' );
		$opts['labels']['new_item'] = esc_html__( "New {$single}", 'epilogue' );
		$opts['labels']['not_found'] = esc_html__( "No {$plural} Found", 'epilogue' );
		$opts['labels']['not_found_in_trash'] = esc_html__( "No {$plural} Found in Trash", 'epilogue' );
		$opts['labels']['parent_item_colon'] = esc_html__( "Parent {$plural} :", 'epilogue' );
		$opts['labels']['search_items'] = esc_html__( "Search {$plural}", 'epilogue' );
		$opts['labels']['singular_name'] = esc_html__( $single, 'epilogue' );
		$opts['labels']['view_item'] = esc_html__( "View {$single}", 'epilogue' );

		$opts['rewrite']['ep_mask']	= EP_PERMALINK;
		$opts['rewrite']['feeds']	= FALSE;
		$opts['rewrite']['pages']	= TRUE;
		$opts['rewrite']['slug'] = esc_html__( strtolower( $plural ), 'epilogue' );
		$opts['rewrite']['with_front']	= FALSE;

  	$opts = apply_filters( 'now-hiring-cpt-options', $opts );
		register_post_type( strtolower( $cpt_name ), $opts );
	}

	/**
	* Register the administration menu for this plugin into the WordPress Dashboard menu.
	*
	* @since 1.0.0
	*/

	public function add_plugin_admin_menu() {
		add_options_page( 'Epilogue Settings', 'Settings', 'manage_options', $this->plugin_name, array($this, 'display_plugin_setup_page'));
	}

	/**
	* Add settings action link to the plugins page.
	*
	* @since 1.0.0
	*/

	public function add_action_links( $links ) {
		$settings_link = array(
			'<a href="' . admin_url( 'options-general.php?page=' . $this->plugin_name ) . '">' . __('Settings', $this->plugin_name) . '</a>',
		);
		return array_merge( $settings_link, $links );
	}

	/**
	* Render the settings page for this plugin.
	*
	* @since 1.0.0
	*/

	public function display_plugin_setup_page() {
		include_once( 'partials/epilogue-admin-display.php' );
	}

	public function options_update() {
	    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

	public function validate($input) {
	    $valid = array();
	    $valid['setting-01'] = (isset($input['setting-01']) && !empty($input['setting-01'])) ? 1 : 0;
	    return $valid;
	 }

}
