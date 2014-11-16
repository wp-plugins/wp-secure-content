<?php



	

	//FOR QUICK DEBUGGING

	



	if(!function_exists('pre')){
	function pre($data){



			echo '<pre>';



			print_r($data);



			echo '</pre>';	



		}	 



	}





	function wpsc_menu()
	{



		 add_options_page('WP SC', 'WP SC', 'update_core', 'wp_sc', 'wp_sc');



	}

	function wp_sc(){ 



		if ( !current_user_can( 'update_core' ) )  {



			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );



		}



		global $wpdb; 

		

		

	}	



	
	

	function wpsc_plugin_links($links) { 
		global $premium_link;
		
		
		array_unshift($links, $premium_link); 
		return $links; 
	}
	
	function register_sc_scripts() {
		
		
		
		wp_enqueue_script(
			'wpsc-scripts',
			plugins_url('js/scripts.js', dirname(__FILE__)),
			array('jquery')
		);	
		
		
	
		wp_register_style('wpsc-style', plugins_url('css/style.css', dirname(__FILE__)));
		
		
		wp_enqueue_style( 'wpsc-style' );
		
	
	}
		
	if(!function_exists('wp_secure_content')){
	function wp_secure_content(){
?>
		<script type="text/javascript" language="javascript">		

		jQuery(document).ready(function($){
			
			function md(e) 
			{ 
			  try { if (event.button==2||event.button==3) return false; }  
			  catch (e) { if (e.which == 3) return false; } 
			}
			document.oncontextmenu = function() { return false; }
			document.ondragstart   = function() { return false; }
			document.onmousedown   = md;
			
			wpsc_methods.disable_copy(document.body);
			document.body.onkeypress = wpsc_methods.disableEnterKey; //this disable Ctrl+A select action for firefox specially
			//chrome + mac
			$(document).keydown(function(event) {
			if(event.which == 17) return false; //chrome ctrl key
			if(event.which == 157) return false; //mac command key
			if(event.ctrlKey) return false; //random
			//event.preventDefault();
			//return false;
			});	
			setTimeout(function(){
				console.clear();
			}, 3000);
		});
		</script>
<?php		
		}
	}
	add_action( 'wp_footer', 'wp_secure_content' );	
?>