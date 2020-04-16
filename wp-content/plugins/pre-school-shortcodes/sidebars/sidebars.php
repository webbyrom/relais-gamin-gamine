<?php
class swmsc_sidebar_generator {
	
	public function __construct() {
		add_action('init',array(&$this,'init'));
		add_action('admin_menu',array(&$this,'swmsc_admin_menu'));
		add_action('admin_print_scripts', array(&$this,'swmsc_admin_print_scripts'));
			
		//edit posts/pages
		//add_action('edit_form_advanced', array(&$this, 'swmsc_edit_form')); //WP 5.0 Update
		add_action('edit_page_form', array(&$this, 'swmsc_edit_form'));
		add_action( 'add_meta_boxes', array(&$this, 'add_page_sidebar_meta_box' ) ); //WP 5.0 Update
		
		//save posts/pages
		add_action('edit_post', array(&$this, 'swmsc_save_form'));
		add_action('publish_post', array(&$this, 'swmsc_save_form'));
		add_action('save_post', array(&$this, 'swmsc_save_form'));
		add_action('edit_page_form', array(&$this, 'swmsc_save_form'));
	}

	//WP 5.0 Update
	function add_page_sidebar_meta_box( $post_type ) {
		add_meta_box( 'simplepagesidebarsdiv', esc_html__( 'Sidebar', 'npo-sites-shortcodes' ), array( &$this, 'swmsc_edit_form' ), $post_type, 'side', 'default' );
	}
	
	function init(){
		
		// Register AJAX hooks
		if (current_user_can('manage_options')){	
			add_action('wp_ajax_swmsc_add_sidebar', array(&$this,'swmsc_add_sidebar') );
			add_action('wp_ajax_swmsc_remove_sidebar', array(&$this,'swmsc_remove_sidebar') );
		}

		//go through each sidebar and register it
	    $swmsc_sidebars = self::get_sidebars();
	    $swmsc_multiple_sidebar_id = 100;	    

	    if(is_array($swmsc_sidebars)){
			foreach($swmsc_sidebars as $sidebar){
				$swmsc_sidebar_class = self::name_to_class($sidebar);

				$swmsc_register_sidebar_array = array(
					'name'=>$sidebar,
					'id'=>'dynamicsidebar-'.$swmsc_multiple_sidebar_id					
		    	);

		    	$swmsc_multiple_sidebar_after_before_elements = self::swmsc_multiple_sidebar_after_before();

		    	$swmsc_register_sidebar_array_total = array_merge($swmsc_register_sidebar_array,$swmsc_multiple_sidebar_after_before_elements);

				register_sidebar($swmsc_register_sidebar_array_total);

		    	$swmsc_multiple_sidebar_id++;
			}
		}
	}

	function swmsc_multiple_sidebar_after_before(){
		
		$swmsc_multiple_sidebar_after_before = array(
			'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="swmsc_widget_box"><div class="swmsc_widget_content">',
			'after_widget'  => '<div class="clear"></div></div></div></div>',
			'before_title'  => '<h3 class="widgettitle swmsc_widget_title">',
			'after_title'   => '</h3>'
		);
		
		return apply_filters( 'swmsc_multiple_sidebar_after_before', $swmsc_multiple_sidebar_after_before );

	}
		
	function swmsc_admin_print_scripts(){
		wp_print_scripts( array( 'sack' ));
		?>
			<script>
				function swmsc_add_sidebar( sidebar_name )
				{					
					var swmsc_sack = new sack("<?php echo esc_url(site_url()); ?>/wp-admin/admin-ajax.php" );    
				
				  	swmsc_sack.execute = 1;
				  	swmsc_sack.method = 'POST';
				  	swmsc_sack.setVar( "action", "swmsc_add_sidebar" );
				  	swmsc_sack.setVar( "sidebar_name", sidebar_name );
				  	swmsc_sack.encVar( "cookie", document.cookie, false );
				  	swmsc_sack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	swmsc_sack.runAJAX();
					return true;
				}
				
				function swmsc_remove_sidebar( sidebar_name,num )
				{					
					var swmsc_sack = new sack("<?php echo esc_url(site_url()); ?>/wp-admin/admin-ajax.php" );    
				
				  	swmsc_sack.execute = 1;
				  	swmsc_sack.method = 'POST';
				  	swmsc_sack.setVar( "action", "swmsc_remove_sidebar" );
				  	swmsc_sack.setVar( "sidebar_name", sidebar_name );
				  	swmsc_sack.setVar( "row_number", num );
				  	swmsc_sack.encVar( "cookie", document.cookie, false );
				  	swmsc_sack.onError = function() { alert('Ajax error. Cannot add sidebar' )};
				  	swmsc_sack.runAJAX();					
					return true;
				}
			</script>
		<?php
	}
	
	function swmsc_add_sidebar(){
		$swmsc_sidebars = self::get_sidebars();
		$swmsc_sidebar_name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$swmsc_sidebar_id = self::name_to_class($swmsc_sidebar_name);
		if(isset($swmsc_sidebars[$swmsc_sidebar_id])){
			die("alert('Sidebar already exists, please use a different name.')");
		}
		
		$swmsc_sidebars[$swmsc_sidebar_id] = $swmsc_sidebar_name;
		self::update_sidebars($swmsc_sidebars);
		
		$swmsc_add_sidebar_js = "
			var tbl = document.getElementById('sbg_table');
			var lastRow = tbl.rows.length;
			// if there's no header row in the table, then iteration = lastRow + 1
			var iteration = lastRow;
			var row = tbl.insertRow(lastRow);
			
			// left cell
			var cellLeft = row.insertCell(0);
			var textNode = document.createTextNode('$swmsc_sidebar_name');
			cellLeft.appendChild(textNode);
			
			//middle cell
			var cellLeft = row.insertCell(1);
			var textNode = document.createTextNode('$swmsc_sidebar_id');
			cellLeft.appendChild(textNode);
			
			//var cellLeft = row.insertCell(2);
			//var textNode = document.createTextNode('[<a href=\'javascript:void(0);\' onclick=\'return swmsc_remove_sidebar_link($swmsc_sidebar_name);\'>Remove</a>]');
			//cellLeft.appendChild(textNode)
			
			var cellLeft = row.insertCell(2);
			removeLink = document.createElement('a');
      		linkText = document.createTextNode('remove');
			removeLink.setAttribute('onclick', 'swmsc_remove_sidebar_link(\'$swmsc_sidebar_name\')');
			removeLink.setAttribute('href', 'javascript:void(0)');
        
      		removeLink.appendChild(linkText);
      		cellLeft.appendChild(removeLink);			
		";
		
		die( "$swmsc_add_sidebar_js");
	}
	
	function swmsc_remove_sidebar(){
		$swmsc_sidebars = self::get_sidebars();
		$swmsc_sidebar_name = str_replace(array("\n","\r","\t"),'',$_POST['sidebar_name']);
		$swmsc_sidebar_id = self::name_to_class($swmsc_sidebar_name);
		if(!isset($swmsc_sidebars[$swmsc_sidebar_id])){
			die("alert('Sidebar does not exist.')");
		}
		$swmsc_sidebar_row_number = $_POST['row_number'];
		unset($swmsc_sidebars[$swmsc_sidebar_id]);
		self::update_sidebars($swmsc_sidebars);
		$swmsc_remove_sidebar_js = "
			var tbl = document.getElementById('sbg_table');
			tbl.deleteRow($swmsc_sidebar_row_number)
		";
		die($swmsc_remove_sidebar_js);
	}
	
	function swmsc_admin_menu(){
		add_theme_page('Sidebars', esc_html__('Multiple Sidebars', 'pre-school-shortcodes'), 'manage_options', 'multiple_sidebars', array('swmsc_sidebar_generator','swmsc_admin_page'));		
}
	
	public static function swmsc_admin_page(){
		?>
		<script>
			function swmsc_remove_sidebar_link(name,num){
				answer = confirm("Are you sure you want to remove " + name + "?\nThis will remove any widgets you have assigned to this sidebar.");
				if(answer){
					//alert('AJAX REMOVE');
					swmsc_remove_sidebar(name,num);
				}else{
					return false;
				}
			}
			function swmsc_add_sidebar_link(){
				var swmsc_sidebar_name = prompt("Sidebar Name:","");
				//alert(swmsc_sidebar_name);
				swmsc_add_sidebar(swmsc_sidebar_name);
			}
		</script>
		<div class="wrap">
			<h2>Multiple Sidebars</h2>
			<br />
			<table class="widefat page" id="sbg_table" style="width:600px;">
				<tr>
					<th>Sidebar Name</th>
					<th>CSS class</th>
					<th>Remove</th>
				</tr>
				<?php
				$swmsc_sidebars = self::get_sidebars();
				//$swmsc_sidebars = array('bob','john','mike','asdf');
				if(is_array($swmsc_sidebars) && !empty($swmsc_sidebars)){
					$swmsc_sidebar_counter=0;
					foreach($swmsc_sidebars as $sidebar){
						$swmsc_sidebar_alt = ($swmsc_sidebar_counter%2 == 0 ? 'alternate' : '');
				?>
				<tr class="<?php echo esc_attr($swmsc_sidebar_alt);?>">
					<td><?php echo esc_html($sidebar); ?></td>
					<td><?php echo esc_html(self::name_to_class($sidebar)); ?></td>
					<td><a href="javascript:void(0);" onclick="return swmsc_remove_sidebar_link('<?php echo esc_attr($sidebar); ?>',<?php echo $swmsc_sidebar_counter+1; ?>);" title="Remove this sidebar"><?php echo esc_html__('remove', 'pre-school-shortcodes'); ?></a></td>
				</tr>
				<?php
						$swmsc_sidebar_counter++;
					}
				}else{
					?>
					<tr>
						<td colspan="3"><?php esc_html_e('No Sidebars defined', 'pre-school-shortcodes') ?></td>
					</tr>
					<?php
				}
				?>
			</table><br /><br />
            <div class="swmsc_add_sidebar">
				<a href="javascript:void(0);" onclick="return swmsc_add_sidebar_link()" title="Add a sidebar" class="button-primary"><?php esc_html_e('+ Add Sidebar', 'pre-school-shortcodes') ?></a>

			</div>
			
		</div>
		<?php
	}
	
	/*for saving the pages/post */
	public static function swmsc_save_form($post_id){
		if (isset($_POST['sbg_edit'])) { 
			$swmsc_sidebar_is_saving = $_POST['sbg_edit'];
			if(!empty($swmsc_sidebar_is_saving)){
				delete_post_meta($post_id, 'sbg_selected_sidebar');
				delete_post_meta($post_id, 'sbg_selected_sidebar_replacement');
				add_post_meta($post_id, 'sbg_selected_sidebar', $_POST['swmsc_sidebar_generator']);
				add_post_meta($post_id, 'sbg_selected_sidebar_replacement', $_POST['swmsc_sidebar_generator_replacement']);
			}
		}

	}
	
	public static function swmsc_edit_form(){
	    global $post;
	    $post_id = $post;
	    if (is_object($post_id)) {
	    	$post_id = $post_id->ID;
	    }
	    $swmsc_selected_sidebar = get_post_meta($post_id, 'sbg_selected_sidebar', true);
	    if(!is_array($swmsc_selected_sidebar)){
	    	$swmsc_tmp_sidebar = $swmsc_selected_sidebar; 
	    	$swmsc_selected_sidebar = array(); 
	    	$swmsc_selected_sidebar[0] = $swmsc_tmp_sidebar;
	    }
	    $swmsc_selected_sidebar_replacement = get_post_meta($post_id, 'sbg_selected_sidebar_replacement', true);
		if(!is_array($swmsc_selected_sidebar_replacement)){
	    	$swmsc_tmp_sidebar = $swmsc_selected_sidebar_replacement; 
	    	$swmsc_selected_sidebar_replacement = array(); 
	    	$swmsc_selected_sidebar_replacement[0] = $swmsc_tmp_sidebar;
	    }

	    //WP 5.0 Update (removed title)
		?>
	 
	<div id='sbg-sortables' class='meta-box-sortables'>
		<div id="sbg_box" class="postbox " >
			<div class="inside">
				<div class="sbg_container">
					<input name="sbg_edit" type="hidden" value="sbg_edit" />
					
					<p><?php esc_html_e('Please select the sidebar you would like to display on this page. Default sidebar is "Blog Sidebar". Note: You must first create the sidebar under Appearance > Multiple Sidebars.', 'pre-school-shortcodes') ?></p>
					<ul>
					<?php 
					global $wp_registered_sidebars;
					//var_dump($wp_registered_sidebars);		
						for($i=0;$i<1;$i++){ ?>
							<li>
							<select name="swmsc_sidebar_generator[<?php echo $i?>]" style="display: none;">
								<option value="0"<?php if($swmsc_selected_sidebar[$i] == ''){ echo " selected";} ?>>Default Sidebar</option>
							<?php
							$swmsc_sidebars = $wp_registered_sidebars;// swmsc_sidebar_generator::get_sidebars();
							if(is_array($swmsc_sidebars) && !empty($swmsc_sidebars)){
								foreach($swmsc_sidebars as $sidebar){

									$swmsc_get_sidebar_name = esc_attr($sidebar['name']);

									if($swmsc_selected_sidebar[$i] == $swmsc_get_sidebar_name){
										echo "<option value='{$swmsc_get_sidebar_name}' selected>{$swmsc_get_sidebar_name}</option>\n";
									}else{
										echo "<option value='{$swmsc_get_sidebar_name}'>{$swmsc_get_sidebar_name}</option>\n";
									}
								}
							}
							?>
							</select>
							<select name="swmsc_sidebar_generator_replacement[<?php echo $i?>]">
								<option value="0"<?php if($swmsc_selected_sidebar_replacement[$i] == ''){ echo " selected";} ?>><?php esc_html_e('Default Sidebar', 'pre-school-shortcodes') ?></option>
							<?php
							
							$swmsc_sidebar_replacements = $wp_registered_sidebars;//swmsc_sidebar_generator::get_sidebars();
							if(is_array($swmsc_sidebar_replacements) && !empty($swmsc_sidebar_replacements)){
								foreach($swmsc_sidebar_replacements as $sidebar){

									$swmsc_get_sidebar_name = esc_attr($sidebar['name']);
									
									if($swmsc_selected_sidebar_replacement[$i] == $swmsc_get_sidebar_name){
										echo "<option value='{$swmsc_get_sidebar_name}' selected>{$swmsc_get_sidebar_name}</option>\n";
									}else{
										echo "<option value='{$swmsc_get_sidebar_name}'>{$swmsc_get_sidebar_name}</option>\n";
									}
								}
							}
							?>
							</select> 
							
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>

		<?php
	}
	
	/* called by the action get_sidebar. this is what places this into the theme */
	public static function get_sidebar($name="0"){
		if(!is_singular()){
			if($name != "0"){
				dynamic_sidebar($name);
			}else{
				dynamic_sidebar();
			}
			return;//dont do anything
		}
		global $wp_query;
		$post = $wp_query->get_queried_object();
		$swmsc_selected_sidebar = get_post_meta($post->ID, 'sbg_selected_sidebar', true);
		$swmsc_selected_sidebar_replacement = get_post_meta($post->ID, 'sbg_selected_sidebar_replacement', true);
		$swmsc_did_sidebar = false;
		//this page uses a generated sidebar
		if($swmsc_selected_sidebar != '' && $swmsc_selected_sidebar != "0"){
			echo "";
			if(is_array($swmsc_selected_sidebar) && !empty($swmsc_selected_sidebar)){
				for($i=0;$i<sizeof($swmsc_selected_sidebar);$i++){					
					
					if($name == "0" && $swmsc_selected_sidebar[$i] == "0" &&  $swmsc_selected_sidebar_replacement[$i] == "0"){
						//echo "\n\n<!-- [called $name selected {$swmsc_selected_sidebar[$i]} replacement {$swmsc_selected_sidebar_replacement[$i]}] -->";
						dynamic_sidebar('blog-sidebar');//default behavior #########custom changes#########
						$swmsc_did_sidebar = true;
						break;
					}elseif($name == "0" && $swmsc_selected_sidebar[$i] == "0"){
						//we are replacing the default sidebar with something
						//echo "\n\n<!-- [called $name selected {$swmsc_selected_sidebar[$i]} replacement {$swmsc_selected_sidebar_replacement[$i]}] -->";
						dynamic_sidebar($swmsc_selected_sidebar_replacement[$i]);//default behavior
						$swmsc_did_sidebar = true;
						break;
					}elseif($swmsc_selected_sidebar[$i] == $name){
						//we are replacing this $name
						//echo "\n\n<!-- [called $name selected {$swmsc_selected_sidebar[$i]} replacement {$swmsc_selected_sidebar_replacement[$i]}] -->";
						$swmsc_did_sidebar = true;
						dynamic_sidebar($swmsc_selected_sidebar_replacement[$i]);//default behavior
						break;
					}
					//echo "<!-- called=$name selected={$swmsc_selected_sidebar[$i]} replacement={$swmsc_selected_sidebar_replacement[$i]} -->\n";
				}
			}
			if($swmsc_did_sidebar == true){
				echo "";
				return;
			}
			//go through without finding any replacements, lets just send them what they asked for
			if($name != "0"){
				dynamic_sidebar($name);
			}else{
				dynamic_sidebar();
			}
			echo "";
			return;			
		}else{
			if($name != "0"){
				dynamic_sidebar($name);
			}else{
				dynamic_sidebar();
			}
		}
	}
	
	/* replaces array of sidebar names*/
	public static function update_sidebars($sidebar_array){
		$swmsc_sidebars = update_option('sbg_sidebars',$sidebar_array);
	}	
	
	/* gets the generated sidebars */
	public static function get_sidebars(){
		$swmsc_sidebars = get_option('sbg_sidebars');
		return $swmsc_sidebars;
	}
	public static function name_to_class($name){
		$class = str_replace(array(' ',',','.','"',"'",'/',"\\",'+','=',')','(','*','&','^','%','$','#','@','!','~','`','<','>','?','[',']','{','}','|',':',),'',$name);
		return $class;
	}
	
}

new swmsc_sidebar_generator();

function swmsc_generated_dynamic_sidebar($id='0'){
	swmsc_sidebar_generator::get_sidebar($id);	
	return true;
}