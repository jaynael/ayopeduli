<? //theme support
add_theme_support( 'automatic-feed-links','title','editor','thumbnail','custom-fields' );
//image tumbnail
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'post-item', 210);
add_image_size( 'post-single', 550);
//menus
// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
function add_menuclass($ulclass) {
return preg_replace('/<ul>/', '<ul id="nav" class="home">', $ulclass, 1);
}
register_nav_menus( array(
	'main_menu' => ' Main Menu' ,
	'footer_menu' => ' Footer Menu'
) );

//filterable
add_action('init', 'donasi_custom_init');  
	
	/*-- Custom Post Init Begin --*/
	function donasi_custom_init()
	
	{
	  $labels = array(
		'name' => _x('donasi', 'post type general name'),
		'singular_name' => _x('donasi', 'post type singular name'),
		'add_new' => _x('Add New', 'donasi'),
		'add_new_item' => __('Add New donasi'),
		'edit_item' => __('Edit donasi'),
		'new_item' => __('New donasi'),
		'view_item' => __('View donasi'),
		'search_items' => __('Search donasi'),
		'not_found' =>  __('No donasi found'),
		'not_found_in_trash' => __('No donasi found in Trash'),
		'parent_item_colon' => '',
		'menu_name' => 'donasi'

	  );
	//theme support
	 $args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','author', 'post-formats')
	  );
	  // The following is the main step where we register the post.
	  register_post_type('donasi',$args);
	  
	  // Initialize New Taxonomy Labels
	  $labels = array(
		'name' => _x( 'Tags', 'taxonomy general name' ),
		'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Types' ),
		'all_items' => __( 'All Tags' ),
		'parent_item' => __( 'Parent Tag' ),
		'parent_item_colon' => __( 'Parent Tag:' ),
		'edit_item' => __( 'Edit Tags' ),
		'update_item' => __( 'Update Tag' ),
		'add_new_item' => __( 'Add New Tag' ),
		'new_item_name' => __( 'New Tag Name' ),
	  );
		// Custom taxonomy for donasi Tags
		register_taxonomy('tagportifolio',array('donasi'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'tag-portifolio' ),
	  ));
	  
	}
	/*-- Custom Post Init Ends --*/
	
	/*--- Custom Messages - donasi_updated_messages ---*/
	add_filter('post_updated_messages', 'donasi_updated_messages');
	
	function donasi_updated_messages( $messages ) {
	  global $post, $post_ID;

	  $messages['donasi'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('donasi updated. <a href="%s">View donasi</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('donasi updated.'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('donasi restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('donasi published. <a href="%s">View donasi</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('donasi saved.'),
		8 => sprintf( __('donasi submitted. <a target="_blank" href="%s">Preview donasi</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('donasi scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview donasi</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('donasi draft updated. <a target="_blank" href="%s">Preview donasi</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );

	  return $messages;
	}
	
	/*--- #end SECTION - donasi_updated_messages ---*/
	
	/*--- Demo URL meta box ---*/
	
	add_action('admin_init','portfolio_meta_init');
	
	function portfolio_meta_init()
	{
		// add a meta box for wordpress 'donasi' type
		add_meta_box('portfolio_meta', 'donasi Info', 'portfolio_meta_setup', 'donasi');
	 
		// add a callback function to save any data a user enters in
		add_action('save_post','portfolio_meta_save');
	}
	
	function portfolio_meta_setup()
	{
		global $post;
	 	 
		?>
        	<div class="portfolio_meta_control">
				<label>Judul</label>
				<p>
					<input type="text" name="post_title" value="<?php  echo get_post_meta($post->ID,'post_title',TRUE); ?>" style="width: 100%;" />
				</p>
			</div>
            <div class="portfolio_meta_control">
				<label>Donasi Untuk</label>
				<p>
					<input type="text" name="sobat" value="<?php  echo get_post_meta($post->ID,'sobat',TRUE); ?>" style="width: 100%;" />
				</p>
			</div>
			<div class="portfolio_meta_control">
				<label>Jumlah Donasi</label>
				<p>
					<input type="text" name="jmldonasi" value="<?php echo get_post_meta($post->ID,'jmldonasi',TRUE); ?>" style="width: 100%;" />
				</p>
			</div>
            <div class="portfolio_meta_control">
				<label>Alamat email</label>
				<p>
					<input type="text" name="email" value="<?php echo get_post_meta($post->ID,'email',TRUE); ?>" style="width: 100%;" />
				</p>
			</div>
            <div class="portfolio_meta_control">
				<label>No. Hp</label>
				<p>
					<input type="text" name="hp" value="<?php echo get_post_meta($post->ID,'hp',TRUE); ?>" style="width: 100%;" />
				</p>
			</div>
            <div class="portfolio_meta_control">
				<label>Donasi Via</label>
				<p>
					<!--<input type="text" name="hp" value="<?php // echo // get_post_meta($post->ID,'hp',TRUE); ?>" style="width: 100%;" />-->
                    <select name="via">
                    	<option><?php echo get_post_meta($post->ID,'via',TRUE); ?></option>
                        <option>BCA </option>
                        <option>BRI</option>
                    </select>
				</p>
			</div>
		<?php

		// create for validation
		echo '<input type="hidden" name="meta_noncename" value="' . wp_create_nonce(__FILE__) . '" />';
	}
	
	function portfolio_meta_save($post_id) 
	{
		// check nonce
		if (!isset($_POST['meta_noncename']) || !wp_verify_nonce($_POST['meta_noncename'], __FILE__)) {
		return $post_id;
		}

		// check capabilities
		if ('post' == $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
		return $post_id;
		}
		} elseif (!current_user_can('edit_page', $post_id)) {
		return $post_id;
		}

		// exit on autosave
		if (defined('DOING_AUTOSAVE') == DOING_AUTOSAVE) {
		return $post_id;
		}
		if(isset($_POST['post_title'])) 
		{
			update_post_meta($post_id, 'post_title', $_POST['post_title']);
		} else 
		{
			delete_post_meta($post_id, 'post_title');
		}
		if(isset($_POST['sobat'])) 
		{
			update_post_meta($post_id, 'sobat', $_POST['sobat']);
		} else 
		{
			delete_post_meta($post_id, 'sobat');
		}

		if(isset($_POST['jmldonasi'])) 
		{
			update_post_meta($post_id, 'jmldonasi', $_POST['jmldonasi']);
		} else 
		{
			delete_post_meta($post_id, 'jmldonasi');
		}
		if(isset($_POST['email'])) 
		{
			update_post_meta($post_id, 'email', $_POST['email']);
		} else 
		{
			delete_post_meta($post_id, 'email');
		}
		if(isset($_POST['hp'])) 
		{
			update_post_meta($post_id, 'hp', $_POST['hp']);
		} else 
		{
			delete_post_meta($post_id, 'hp');
		}
		if(isset($_POST['via'])) 
		{
			update_post_meta($post_id, 'via', $_POST['via']);
		} else 
		{
			delete_post_meta($post_id, 'via');
		}
	}
	
	/*--- #end  Demo URL meta box ---*/
	
	/*function enqueue_filterable() 
	{
		wp_register_script( 'filterable', get_template_directory_uri() . '/js/filterable.js', array( 'jquery' ) );
		wp_enqueue_script( 'filterable' );
	}
	add_action('wp_enqueue_scripts', 'enqueue_filterable');*/
	
	//function filterable
	
?>