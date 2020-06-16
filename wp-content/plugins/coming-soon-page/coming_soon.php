<?php
/**
 * Plugin Name: Coming soon and Maintenance mode WpDevArt
 * Plugin URI: https://wpdevart.com/wordpress-coming-soon-plugin/
 * Author URI: https://wpdevart.com
 * Description: Coming soon and Maintenance mode plugin is awesome tool to show your users that you are working on your website to make it better. Our coming soon plugin is the best way to create better coming soon page.  
 * Version: 3.1.8
 * Author: wpdevart
 * License: GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
 
     // main Class
class coming_soon_main{
	// required variables
	
	private $coming_soon_plugin_url;
	
	private $coming_soon_plugin_path;
	
	private $coming_soon_version;
	
	public $coming_soon_options;
	
    /*############  Construct function  ################*/
	
	function __construct(){
		//Create variables for the class
		$this->coming_soon_plugin_url  = trailingslashit( plugins_url('', __FILE__ ) );
		$this->coming_soon_plugin_path = trailingslashit( plugin_dir_path( __FILE__ ) );
		$this->coming_soon_version     = 1.0;		
		$this->call_base_filters();		//Function for the main filters (hooks)
		$this->install_databese();		//Database function
		$this->create_admin_menu();		//Function for creating the admin menu
		$this->coming_soon_front_end(); //Function responsible for front-end
		
	}

    /*############  Admin menu function  ################*/
	
	public function create_admin_menu(){
		//
		define("wpdevart_comingsoon_support_url","https://wordpress.org/support/plugin/coming-soon-page");
		// Registration of file that is responsible for admin menu
		require_once($this->coming_soon_plugin_path.'includes/admin_menu.php');
		// Creation of admin menu object type 
		$coming_soon_admin_menu = new coming_soon_admin_menu(array('menu_name' => 'Coming Soon','databese_parametrs'=>$this->coming_soon_options));
		//Hook that should connect admin menu with class
		add_action('admin_menu', array($coming_soon_admin_menu,'create_menu'));
		
	}

    /*############  Install database function  ################*/	
	
	public function install_databese(){
		//registration of file that is responsible for database
		require_once($this->coming_soon_plugin_path.'includes/install_database.php');
		//Creation of database object type 
		$coming_install_database = new install_database();
		//Creation of database
		$this->coming_soon_options = $coming_install_database->installed_options;
		
	}
	
    /*############  Front-end function  ################*/	
	
	public function coming_soon_front_end(){
		//Registration of file that is responsible for front-end part
		require_once($this->coming_soon_plugin_path.'includes/front_end.php');
		//Creation of front-end object type 
		$coming_soon_front_end = new coming_soon_front_end(array('menu_name' => 'Coming Soon Page','databese_parametrs'=>$this->coming_soon_options));
		//hook that connect frontend with class
		add_action( 'template_redirect', array($coming_soon_front_end,'create_fornt_end') );
	}
	
    /*############  Register Requeried scripts function  ################*/	
	
	public function registr_requeried_scripts(){
		//Registration of plugin necessary scripts and styles 
		wp_register_script('coming-soon-script',$this->coming_soon_plugin_url.'includes/javascript/front_end_js.js');
		wp_register_script('angularejs',$this->coming_soon_plugin_url.'includes/javascript/angular.min.js');
		wp_register_script('coming-soon-script-admin',$this->coming_soon_plugin_url.'includes/javascript/admin_coming_soon.js');
		wp_register_style('jquery-ui-style',$this->coming_soon_plugin_url.'includes/style/jquery-ui-style.css');
		wp_register_style('coming-soon-admin-style',$this->coming_soon_plugin_url.'includes/style/admin-style.css');
		wp_register_style('coming-soon-style',$this->coming_soon_plugin_url.'includes/style/style.css');
		
	}
	
    /*############  Call base filters function  ################*/

	public function call_base_filters(){		
		add_action( 'init',  array($this,'registr_requeried_scripts') );
		//for_upgrade
		add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), array($this,'plugin_activate_sublink') );
	}

    /*############  Sublink activate function  ################*/	
	
	public function plugin_activate_sublink($links){
		$plugin_submenu_added_link=array();		
		 $added_link = array(
		 '<a target="_blank" style="color: rgba(10, 154, 62, 1); font-weight: bold; font-size: 13px;" href="http://wpdevart.com/wordpress-coming-soon-plugin">Upgrade to Pro</a>',
		 );
		$plugin_submenu_added_link=array_merge( $plugin_submenu_added_link, $added_link );
		$plugin_submenu_added_link=array_merge( $plugin_submenu_added_link, $links );
		return $plugin_submenu_added_link;
	}
}
$cooming_soon = new coming_soon_main(); // main object creation part 

?>