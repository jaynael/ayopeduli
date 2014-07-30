<?php 
function theme_styles()  
{ 
  // Register the style like this for a theme:  
  // (First the unique name for the style (custom-style) then the src, 
  // then dependencies and ver no. and media type)
  wp_register_style( 'css-reseter', 
    get_template_directory_uri() . '/css/css-reseter.css', 
    array(), 
    '20120208', 
    'all' );

  // enqueing:
  wp_enqueue_style( 'css-reseter' );
}
add_action('wp_print_styles', 'theme_styles');
//image tumbnail
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'post-item', 220,220);
add_image_size( 'post-single', 550,300);

//limit caracter
function titlelimitchar($title){
	    if(strlen($title) > 200 && !(is_single()) && !(is_page())){
        $title = substr($title,0,200) . "..";
    }
    return $title;
}
add_filter( 'the_content', 'titlelimitchar' );
//
add_post_meta($post_id, $meta_key, $meta_value, $unique);
add_post_meta(68, 'my_key', 47);

//theme support
add_theme_support( 'automatic-feed-links','title','editor','thumbnail','custom-fields' );
//Excerp length
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
//  Custom Child Theme Functions
//

add_action( 'show_user_profile', 'show_extra_profile_fields', 10 );
add_action( 'edit_user_profile', 'show_extra_profile_fields', 10 );
function show_extra_profile_fields( $user ) { ?>
	<h3>Extra profile information</h3>

	<div class="form-table">
		<div class="item"><label for="twitter">Twitter</label>
			<input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
			<span class="description">Please enter your Twitter username.</span>
		</div>
        <div class="item">
        	<label>Jenis keanggotaan</label>
            <select name="anggota" id="anggota">
            	<option><?php echo esc_attr( get_the_author_meta( 'anggota', $user->ID ) ); ?></option>
                <option>Angels</option>
                <option>Volunteer</option>
            </select>
        </div>

	</div>
<?php }
add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'twitter', $_POST['twitter'] );
	update_usermeta( $user_id, 'anggota', $_POST['anggota'] );
}

register_sidebar(array(
  'name' => __( 'facebook-login' ),
  'id' => 'facebook-login',
  'description' => __( 'Widgets in this area will be show facebook register.' ),
));
register_sidebar(array(
  'name' => __( 'Search' ),
  'id' => 'search',
  'description' => __( 'Widgets to search anything in website' ),
));
register_sidebar(array(
  'name' => __( 'Sidebar Page' ),
  'id' => 'page',
  'description' => __( 'Widgets to sidebar on pages' ),
));
register_sidebar(array(
  'name' => __( 'twitter' ),
  'id' => 'twitter',
  'description' => __( 'Widgets to sidebar on pages' ),
));
register_nav_menus( array(
	'main_menu' => ' Main Menu' ,
	'footer_menu' => ' Footer Menu'
) );

if ( ! function_exists( 'twentyeleven_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 */
function twentyeleven_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo $nav_id; ?>">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'twentyeleven' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'twentyeleven' ) ); ?></div>
		</nav><!-- #nav-above -->
	<?php endif;
}
endif; // twentyeleven_content_nav
// Add ID and CLASS attributes to the first <ul> occurence in wp_page_menu
function add_menuclass($ulclass) {
return preg_replace('/<ul>/', '<ul id="nav" class="home">', $ulclass, 1);
}
add_filter('wp_page_menu','add_menuclass');
   
function add_contact_script() {
    wp_register_script('contact', get_bloginfo('template_directory') . '/js/contact.js', array('jquery'), '1.0' );
    wp_enqueue_script('contact');
}

//jangan lupa untuk meregister contact.js

add_action('init', 'checking_user');
function checking_user(){
    if(is_user_logged_in()){ //jika user terdaftar , gunakan hook berikut
        add_action('wp_ajax_contact_form', 'ajax_contact');
    }else{//jika user tidak terdaftar , gunakan hook berikut
        add_action('wp_ajax_nopriv_contact_form', 'ajax_contact');
    }
}
function ajax_contact(){
    if(!empty($_POST)){ //jika data pada contact form tidak kosong
        $name = $_POST['name']; //mendapatkan data dari field nama dan seterusnya
        $organization = $_POST['organization'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $admin_email = get_bloginfo('admin_email'); //mendapatkan email admin dengan bantuan helper dari core wordpress
        $msg = $_POST['message'];
        $error = ''; //membuat variable yang menjadi acuan bila ada field yang tidak diisi
        if(!$name){
            $error .= 'Isi Nama Anda <br/>'; //bila field nama tidak diisi , variabel error ditambhkan dan seterusnya
        }
        if(!$organization){
            $error .= 'Isi Orgaisasi Anda <br/>';
        }
        if(!$phone){
            $error .= 'Isi Nomor Telefon Anda <br/>';
        }
        if(!$email){
            $error .= 'Isi Email Anda <br/>';
        }
        if(!$msg){
            $error .= 'Isi Pesan Anda';
        }
        
        if(empty($error)){ //jika tidak ada error
            $subject = "Email Baru dari Website Anda"; //subjek dari email yang dikirimkan
            $message = "Anda Menerima Email Baru. \n\n <br/>
                Name: ". $name . "\n <br/>
                Organization : ". $organization ." \n<br/>
                Phone : ". $phone . " \n <br/>
                Email : " . $email ." \n <br/>
                Message : " . $msg ." \n";
            $email = mail($admin_email, $subject, $message, //fungsi mail wordpress untuk mengiim email
                "From: " . $name . " <" . $email . "> rn"
                ."Reply-To: " . $email . "rn"
                ."X-Mailer: PHP/" . phpversion());
            if($email){//bila email terkirim
                echo 'sent'; //hasil yang di tangkap oleh contact.js yang nantinya akan menampilkan tulisan sukses.
            }die();
        }else{ // bila tidak
            echo $error;
            die();
        }
    }
}

function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/search' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
    <input type="text" placeholder="Search" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';

    return $form;
}
	 add_filter('allowed_redirect_hosts','allow_ms_parent_redirect');
			function allow_ms_parent_redirect($allowed)
			{
				$allowed[] = 'ayopeduli.com';
				return $allowed;
			}
add_filter( 'get_search_form', 'my_search_form' );


//Meta box
$wt_metaboxes = array(
     "harga" => array (
        "name" => "harga_produk",
        "default" => "",
        "label" => "Harga Produk",
       "type" => "text",
      )
  );

function isi_box() {
   global $post, $wt_metaboxes;
   echo '<table>'."\n";
   foreach ($wt_metaboxes as $wt_metabox) {
       $wt_metaboxvalue = get_post_meta($post->ID,$wt_metabox["name"],true);
       if ($wt_metaboxvalue == "" || !isset($wt_metaboxvalue)) {
          $wt_metaboxvalue = $wt_metabox['default'];
       }
      ?>
     <tr>
        <td><?php echo $wt_metabox['label'];?></td>
        <td><input type="<?php echo $wt_metabox['type'];?>" value="<?php echo stripslashes($wt_metaboxvalue);?>" name="<?php echo $wt_metabox["name"];?>" id="<?php echo $wt_metabox;?>"></td>
     </tr>

<?php
   }
   echo "</table>";
}

function meta_box_baru() {
  if ( function_exists('add_meta_box') ) {
     add_meta_box('informasi-tambahan-produk','Informasi Tambahan Produk','isi_box','post','normal');
  }
}

add_action('admin_menu', 'meta_box_baru');

//custom dashboard
// Replace Admin Dashboard Logo
 function wp_admin_dashboard_custom_logo() {
	 echo '<style type="text/css">#header-logo { background-image: url('.get_bloginfo('template_directory').'/images/thumb.png) !important; }</style>';
	 }
	 
  add_action('admin_head', 'wp_admin_dashboard_custom_logo');

/*--- Custom Messages - project_updated_messages ---*/
	add_filter('post_updated_messages', 'project_updated_messages');
	
	function project_updated_messages( $messages ) {
	  global $post, $post_ID;

	  $messages['project'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Project updated. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		2 => __('Custom field updated.'),
		3 => __('Custom field deleted.'),
		4 => __('Project updated.'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Project restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Project published. <a href="%s">View project</a>'), esc_url( get_permalink($post_ID) ) ),
		7 => __('Project saved.'),
		8 => sprintf( __('Project submitted. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		9 => sprintf( __('Project scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview project</a>'),
		  // translators: Publish box date format, see http://php.net/date
		  date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		10 => sprintf( __('Project draft updated. <a target="_blank" href="%s">Preview project</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	  );

	  return $messages;
	}
	
	/*--- #end SECTION - project_updated_messages ---*/
	
	/*--- Demo URL meta box ---*/
	
	add_action('admin_init','portfolio_meta_init');
	
	function portfolio_meta_init()
	{
		// add a meta box for wordpress 'project' type
		add_meta_box('portfolio_meta', 'Project Infos', 'portfolio_meta_setup', 'project', 'side', 'low');
	 
		// add a callback function to save any data a user enters in
		add_action('save_post','portfolio_meta_save');
	}
	
	function portfolio_meta_setup()
	{
		global $post;
	 	 
		?>
			<div class="portfolio_meta_control">
				<label>URL</label>
				<p>
					<input type="text" name="_url" value="<?php echo get_post_meta($post->ID,'_url',TRUE); ?>" style="width: 100%;" />
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

		if(isset($_POST['_url'])) 
		{
			update_post_meta($post_id, '_url', $_POST['_url']);
		} else 
		{
			delete_post_meta($post_id, '_url');
		}
	}
/*add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'sobat',
		array(
			'labels' => array(
				'name' => __( 'Sobat' ),
				'singular_name' => __( 'Sobat' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'thumbnail','tags' ),
		)
	);
	register_post_type( 'program',
		array(
			'labels' => array(
				'name' => __( 'Program' ),
				'singular_name' => __( 'Program' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'thumbnail','tags' ),
		)
	);
	register_post_type( 'yayasan',
		array(
			'labels' => array(
				'name' => __( 'Yayasan' ),
				'singular_name' => __( 'Yayasan' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'title', 'editor', 'thumbnail','tags' ),
		)
	);
}*/
function insert_attachment($file_id,$post_id,$featuredImage) {
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php');
        $attach_id = media_handle_upload( $file_id, $post_id );
        if (is_int($attach_id)&&($featuredImage)) update_post_meta($post_id,'_thumbnail_id',$attach_id);
        return $attach_id;
    }
 
function fix_title($content,$limit) {
  $excerpt = explode(' ', $content, $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt);
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function get_all_thumbnails() {
    global $post;
    $args = array(
    'order'          => 'ASC',
    'orderby'        => 'menu_order',
    'post_type'      => 'attachment',
    'post_parent'    => $post->ID,
    'post_mime_type' => 'image',
    'post_status'    => null,
    'numberposts'    => -1,
    );
    $attachments = get_posts($args);
    $i = 0;
        if ($attachments) {
            foreach ($attachments as $attachment) {
            echo wp_get_attachment_link($attachment->ID, 'medium', false, false);
            $i = $i + 1;
            }
        }
    if ($i != 0) echo '<div style="clear: both;"><small>' . $i . ' pictures</small></div>';
 
}
//function language
load_theme_textdomain( 'ayopeduli lang', TEMPLATEPATH.'/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH."/languages/$locale.php";
if ( is_readable($locale_file) )
	require_once($locale_file);
//ganti logo
function custom_login_logo() {
 echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/logo-login.png) 50% 50% no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');
?>