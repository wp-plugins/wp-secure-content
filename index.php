<?php 
/*



Plugin Name: WP Secure Content



Plugin URI: http://www.websitedesignwebsitedevelopment.com/wordpress/plugins/wp-sc



Description: WP Secure Content is a great plugin to secure your posts/pages and WooCommerce products content. It is simple to use and easy to understand for customization.



Version: 1.0



Author: Fahad Mahmood 



Author URI: http://www.androidbubbles.com



License: GPL3



*/ 


        
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        

	global $premium_link;
	
	$rendered = FALSE;
	
	$premium_link = 'http://shop.androidbubbles.com/product/wp-secure-content-pro';
	

	
	$ap_data = get_plugin_data(__FILE__);
	
	
	
	include('inc/functions.php');
        
	

	add_action( 'admin_enqueue_scripts', 'register_sc_scripts' );
	add_action( 'wp_enqueue_scripts', 'register_sc_scripts' );
	

	
	if(is_admin()){
		add_action( 'admin_menu', 'wpsc_menu' );	
		//add_action( 'wp_ajax_sc_tax_types', 'wpsc_tax_types_callback' );
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'wpsc_plugin_links' );	
		
	}else{
		
	
		
		
	}


	