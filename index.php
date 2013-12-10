<?php 
/*



Plugin Name: Endless Posts Navigation



Plugin URI: http://www.websitedesignwebsitedevelopment.com/wordpress/plugins/endless-posts-navigation



Description: Endless Posts Navigation is a great plugin to show your posts/pages in alphabetical order. It is compatible with custom taxonomies too.



Version: 1.0



Author: Fahad Mahmood 



Author URI: http://www.androidbubbles.com



License: GPL3



*/ 


        
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        
	
	include('functions.php');
        
        


	



	function epn_menu()
	{



		 add_options_page('Endless Posts Navigation', 'Endless Posts Navigation', 'update_core', 'endless_posts_navigation', 'endless_posts_navigation');



	}

	function endless_posts_navigation() 

	{ 



		if ( !current_user_can( 'update_core' ) )  {



			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );



		}


		include('epn_settings.php');	

		

			



	}	



	

    function register_epn_scripts() {
            
			plugins_url('style.css', __FILE__);
			
			wp_enqueue_script(
				'epn-script',
				plugins_url('functions.js', __FILE__),
				array( 'jquery' )
			);

            wp_register_style('epn-styles', plugins_url('style.css', __FILE__));
			
			
			wp_enqueue_style( 'epn-styles' );
 
        }
	
        add_action( 'admin_enqueue_scripts', 'register_epn_scripts' );
		add_action( 'wp_enqueue_scripts', 'register_epn_scripts' );
	
	
	if(is_admin()){
		add_action( 'admin_menu', 'epn_menu' );	
	}
	