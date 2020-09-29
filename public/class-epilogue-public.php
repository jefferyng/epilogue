<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://jefferyng.com
 * @since      1.0.0
 *
 * @package    Epilogue
 * @subpackage Epilogue/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Epilogue
 * @subpackage Epilogue/public
 * @author     Jeffery Ng <me@jefferyng.com>
 */
class Epilogue_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/epilogue-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/epilogue-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	* Returns a post object of fb posts
	*
	* @param array $params An array of optional parameters
	* quantity Number of quote posts to return
	*
	* @return object A post object
	*/

	public function get_fb_posts($params) {
		$return = '';
		$args = array(
			'post_type' => 'fb_posts',
			'posts_per_page' => $params,
			'orderby' => 'desc'
		);

		$query = new WP_Query( $args );

		if ( is_wp_error( $query ) ) {
			$return = 'Oops!...No posts for you!';
		} else {
			$return = $query->posts;
		}

		return $return;
	} // get_fb_posts()

	/**
	* Registers all shortcodes at once
	*
	* @return [type] [description]
	*/

	public function register_shortcodes() {
		add_shortcode( 'facebookposts', array( $this, 'list_fb_posts' ) );
	} // register_shortcodes()

	public function list_fb_posts( $atts = array() ) {
		ob_start();

		$args = shortcode_atts( array(
			'num' => 5,
			'quotes-title' => 'Facebook Posts',),
			$atts
		);

		$items = $this->get_fb_posts($args['num']);		

		if ( is_array( $items ) || is_object( $items ) ) {
			echo('<h4>' . $args['quotes-title'] . '</h4><ul>');
			foreach ( $items as $item ) {
				echo('<li>' . $item->post_content . '</li>');
			} // foreach
			echo ('</ul>');
		} else {
			echo $items;
		}

		$output = ob_get_contents();
		ob_end_clean();

		return $output;

	} // list_fb_posts()

}
