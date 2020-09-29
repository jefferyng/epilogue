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
		$cpt_name = 'fb_posts';

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

		register_post_type( strtolower( $cpt_name ), $opts );

		// Remove title because this doesn't exist for FB Posts, and it
		// can't be used for content because it has 60 character limit
		remove_post_type_support($cpt_name, 'title');

	}

	public static function fb_posts_table_head ( $columns ) {
		unset( $columns['title'] );
		unset( $columns['date']  );
		$defaults['date'] = 'Date';
		$defaults['post'] = 'Post';
    return $defaults;
	}

	public static function fb_posts_custom_column_values ( $column, $post_id ) {
     switch ( $column ) {
       case 'post'   :
			   $fb_post_limit = 160;
			 	 $content = wp_filter_nohtml_kses(get_post_field('post_content', $post_id));
				 $croppedContent = (strlen($content) < $fb_post_limit) ?
				 	 $content :
					 substr($content, 0, $fb_post_limit) . '...';
				 echo '<a href=\'' . admin_url('/post.php?post=') . $post_id . '&action=edit\'>' . $croppedContent . '</a>';
       break;
     }
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


	/**
	* Helper functions for the admin settings page
	*
	* @since 1.0.0
	*/

	public function options_update() {
	    register_setting($this->plugin_name, $this->plugin_name, array($this, 'validate'));
	}

	public function validate($input) {
	    $valid = array();
	    $valid['setting-01'] = (isset($input['setting-01']) && !empty($input['setting-01'])) ? 1 : 0;
	    return $valid;
	 }

	 /**
 	* Main functions for reading, processing, and creating
	* fb posts from the exported Facebook json files
 	*
 	* @since 1.0.0
 	*/

	 public function process_fb_posts() {
		 echo '<p>Process starting....</p>';

		 // I get the feeling that if a person's post history is especially big there might
		 // be posts_2, posts_3, etc,.
		 $posts_file = trailingslashit(wp_upload_dir()['basedir']) . 'data/posts/your_posts_1.json';
		 echo '<p>Search file....' . $posts_file . '</p>';

		 $content = file_get_contents( $posts_file );
		 $posts = json_decode( $content );

		 echo '<p>content entries: ' . sizeof($posts) . '</p>';

		 // To preserve as much information as possible,
		 // post/data and time should be kept as part of the fb post.
		 // Data/attachement of the post should be typed, and the data stringified.
		 // The two pieces of info should be used as a key/value pair of
		 // postmeta associated with the fb post.

		 foreach ($posts as $post) {

			 $FBPostID = $this->createFBPost($post);
			 if ($FBPostID == 0) { continue; }

			 // Insert each attachment seperately because it's
			 // possible to have duplicate data types (eg multiple photos),
			 // and that can't be handled with an by adding all the
			 // meta to a single associative array.

			 $attachments = !empty($post->attachments) ? $post->attachments : [];

			 foreach ($attachments as $attachment) {
				 $this->createFBPostMeta($attachment, $FBPostID);
			 }

		 }

		 echo '<p>content entries successfully added</p>';
	 }

	 private function createFBPost ($post) {
		 try {
			 // Deleted and attempted posts are still recorded
			 // but we don't need to save them here since there's
			 // no information other than timestamp associated with it.
			 if ($this->isEmptyPost($post)) { return 0; }

			 // get post, timestamp and create a new fb post with it
			 $dataPost = $this->getDataPost($post);

			 $timestamp = $post->timestamp;
			 $updateTimestamp = $this->getUpdateTimestamp($post);

			 $postdate = date("Y-m-d H:i:s", $timestamp);

			 $postOptions = [
				 'post_type' => 'fb_posts',
				 'post_content' => $dataPost,
				 'post_date_gmt' => $postdate,
				 'post_status' => 'publish',
				 'comment_status' => 'closed',
				 'ping_status' => 'closed',
			 ];

			 if (!empty($updateTimestamp)) {
				 $updateDate = date("Y-m-d H:i:s", $updateTimestamp);
				 $postOptions['post_modified_gmt'] = $updateDate;
			 }

			 // insert as new fb post, and return ID
			 return wp_insert_post($postOptions);

		 } catch (Exception $e) {
			 echo 'Error Insert FBPost: [' . $timestamp . '] - ' . $dataPost;
			 return 0;
		 }
	 }

	 private function createFBPostMeta ($attachment, $FBPostID) {
		 try {
			 // determine the type of the $attachment
			 // stringifying the rest of it for storage as meta
			 $dataType = $this->getAttachmentDatatype($attachment);
			 $stringifedJSON = json_encode($attachment);
			 add_post_meta( $FBPostID, $dataType, $stringifedJSON, false);
		 } catch (Exception $e) {
			 echo 'Error Insert Meta: [' . $FBPostID . ']: ' . json_encode($attachment);
		 }
	 }

	 private function getUpdateTimestamp ($post) {
		 try {
			 if (!empty($post) && !empty($post->data) && !empty($post->data->update_timestamp)) {
				 return $post->data->update_timestamp;
			 } else {
				 return null;
			 }
		 } catch (Exception $e) {
			 return null;
		 }
	 }

	 public const FB_DATA_TYPE_MEDIA = 'MEDIA';
	 public const FB_DATA_TYPE_LINK = 'LINK';
	 public const FB_DATA_TYPE_EVENT = 'EVENT';
	 public const FB_DATA_TYPE_PLACE = 'PLACE';
	 public const FB_DATA_TYPE_EXTERNAL = 'EXTERNAL';
	 public const FB_DATA_TYPE_POLL = 'POLL';
	 public const FB_DATA_TYPE_UNKNOWN = 'UNKNOWN';

	 private function getAttachmentDatatype ($attachment) {

		 if ($this->isMedia($attachment)) {
			 return self::FB_DATA_TYPE_MEDIA;
		 } else if ($this->isLink($attachment)) {
			 return self::FB_DATA_TYPE_LINK;
		 } else if ($this->isEvent($attachment)) {
			 return self::FB_DATA_TYPE_LINK;
		 } else if ($this->isPlace($attachment)) {
			 return self::FB_DATA_TYPE_PLACE;
		 } else if ($this->isExternalPost($attachment)) {
			 return self::FB_DATA_TYPE_EXTERNAL;
		 } else if ($this->isPoll($attachment)) {
			 return self::FB_DATA_TYPE_POLL;
		 } else {
			 return self::FB_DATA_TYPE_UNKNOWN;
		 }
	 }

	 private function getAttachmentData($attachment, $type) {
		 try {
		   return get_object_vars($attachment->data[0])[$type];
		 } catch (Exception $e) {
			 return null;
		 }
	 }

	 private function isMedia ($attachment) {
		 return !empty($this->getAttachmentData($attachment, 'media'));
	 }

	 private function isEvent ($attachment) {
		 return !empty($this->getAttachmentData($attachment, 'event'));
	 }

	 private function isPlace($attachment) {
		 return !empty($this->getAttachmentData($attachment, 'place'));
	 }

	 private function isPoll ($attachment)	 {
		 return !empty($this->getAttachmentData($attachment, 'poll'));
	 }

	 private function isLink ($attachment) {
		 return !empty($this->getExternalContextUrl($attachment));
	 }

	 private function getExternalContextUrl ($attachment) {
		 try {
			 return $attachment->data[0]->external_context->url;
		 } catch (Exception $e) {
			 return null;
		 }
	 }

	 private function isExternalPost ($attachment) {
		 return !empty($this->getExternalContextSource($attachment));
	 }

	 private function getExternalContextSource ($attachment) {
		 try {
			 return $attachment->data[0]->external_context->source;
		 } catch (Exception $e) {
			 return null;
		 }
	 }

	 private function getDataPost ($post) {
		 try {
			 $dataPost = $post->data[0]->post;
			 return !empty($dataPost) ? $dataPost : '';
		 } catch (Exception $e) {
			 return '';
		 }
	 }

	 // check for a very specific data structure.
	 // looks like it's created when someone starts a post but doesn't
	 // actually go through with it.
	 private function isEmptyPost ($post) {
		 // check if timestamp exists
		 // check if attachments is Empty
		 // check if data has only 1 entry, and the entry has only one key update_timestamp
		 return ( empty($post->attachments) &&
		   !empty($post->data) &&
			 sizeof($post->data) == 1 &&
			 !empty($post->data[0]) &&
			 is_object($post->data[0]) &&
			 $this->getJSONKeyCount($post->data[0]) == 1 &&
			 !empty($post->data[0]->update_timestamp)
		 );
	 }

	 private function getJSONKeyCount ($json) {
		 $array = get_object_vars($json);
		 $properties = array_keys($array);
		 return count($properties);
	 }

}
