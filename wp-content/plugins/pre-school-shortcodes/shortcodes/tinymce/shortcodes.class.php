<?php

// load wordpress
require_once('get_wp.php');

class swmsc_shortcodes
{
	var	$conf;
	var	$popup;
	var	$params;
	var	$shortcode;
	var $cparams;
	var $cshortcode;
	var $popup_title;
	var $no_preview;
	var $has_child;
	var	$output;
	var	$errors;

	// --------------------------------------------------------------------------

	function __construct( $popup ) {
		
		if( file_exists( dirname(__FILE__) . '/config.php' ) )
		{
			$this->conf = dirname(__FILE__) . '/config.php';
			$this->popup = $popup;
			
			$this->formate_shortcode();
		}
		else
		{
			$this->append_error('Config file does not exist');
		}
	}
	
	// --------------------------------------------------------------------------
	
	function formate_shortcode() 
	{
		
		// get config file
		require_once( $this->conf );
		
		if( isset( $swmsc_shortcodes[$this->popup]['child_shortcode'] ) )
			$this->has_child = true;
		
		if( isset( $swmsc_shortcodes ) && is_array( $swmsc_shortcodes ) ) {
			
			// get shortcode config stuff
			$this->params = $swmsc_shortcodes[$this->popup]['params'];
			$this->shortcode = $swmsc_shortcodes[$this->popup]['shortcode'];
			$this->popup_title = $swmsc_shortcodes[$this->popup]['popup_title'];
			
			// adds stuff for js use			
			$this->append_output( "\n" . '<div id="_swmsc_shortcode" class="hidden">' . $this->shortcode . '</div>' );
			$this->append_output( "\n" . '<div id="_swmsc_popup" class="hidden">' . $this->popup . '</div>' );
			
			if( isset( $swmsc_shortcodes[$this->popup]['no_preview'] ) && $swmsc_shortcodes[$this->popup]['no_preview'] ) {
				
				//$this->append_output( "\n" . '<div id="_swmsc_preview" class="hidden">false</div>' );
				$this->no_preview = true;		
			}
			
			// filters and excutes params
			foreach( $this->params as $pkey => $param ) {
				
				// prefix the fields names and ids with swmsc_
				$pkey = 'swmsc_' . $pkey;

				if(!isset($param['std'])) {
					$param['std'] = '';
				}

				if(!isset($param['description'])) {
					$param['description'] = '';
				}
				
				// popup form row start
				$row_start  = '<tbody class="'.$param['type'].'">' . "\n";
				$row_start .= '<tr class="form-row">' . "\n";
				$row_start .= '<td class="label">' . $param['heading'] . ':</td>' . "\n";
				$row_start .= '<td class="field">' . "\n";
				
				// popup form row end
				$row_end	= '<span class="swmsc-form-desc">' . $param['description'] . '</span>' . "\n";
				$row_end   .= '</td>' . "\n";
				$row_end   .= '</tr>' . "\n";					
				$row_end   .= '</tbody>' . "\n";
				
				switch( $param['type'] ) {
					
					case 'textfield' :
						
						// prepare
						$output  = $row_start;
						$output .= '<input type="text" class="swmsc-form-text swmsc-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'colorpicker' :
						
						// prepare
						$output  = $row_start;
						$output .= '<input type="text" class="swmsc-form-text swmsc-input wp-color-picker-field" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;

					case 'attach_image' :

						// prepare
						$output  = $row_start;
						$output .= '<div class="swmsc-upload-container">';
						$output .= '<img src="" alt="Image" class="uploaded-image" />';
						$output .= '<input type="hidden" class="swmsc-form-text swmsc-form-upload swmsc-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= '<a href="' . $pkey . '" class="swmsc-upload-button" data-upid="1"><i class="fa fa-arrow-up" ></i>Upload</a>';
						$output .= '</div>';
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'iconpicker' :

						// prepare
						$output  = $row_start;

						$output .= '<div class="fonticon">';
						foreach( $param['value'] as $value => $option ) {
							$output .= '<i class="fa ' . $value . '" data-icon="' . $value . '"></i>';
						}
						$output .= '</div>';

						if(!isset($param['std'])) {
							$param['std'] = '';
						}

						$output .= '<input type="hidden" class="swmsc-form-text swmsc-input" name="' . $pkey . '" id="' . $pkey . '" value="' . $param['std'] . '" />' . "\n";
						$output .= $row_end;

						// append
						$this->append_output( $output );

						break;

					case 'textarea_html' :
					case 'textarea' :
						
						// prepare
						$output  = $row_start;
						$output .= '<textarea rows="5" cols="60" name="' . $pkey . '" id="' . $pkey . '" class="swmsc-form-textarea swmsc-input">' . $param['std'] . '</textarea>' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'dropdown' :
						
						// prepare
						$output  = $row_start;
						$output .= '<select name="' . $pkey . '" id="' . $pkey . '" class="swmsc-form-select swmsc-input">' . "\n";
						
						foreach( $param['value'] as $option => $value ) {
							
							$output .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
						}
						
						$output .= '</select>' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'checkbox' :
						
						// prepare
						$output  = $row_start;
						$output .= '<label for="' . $pkey . '" class="swmsc-form-checkbox">' . "\n";
						$output .= '<input type="checkbox" class="swmsc-input" name="' . $pkey . '" id="' . $pkey . '" ' . ( $param['std'] ? 'checked' : '' ) . ' />' . "\n";
						$output .= ' ' . $param['checkbox_text'] . '</label>' . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
						
					case 'infotext' :
						
						// prepare
						$output  = $row_start;
						$output .= $param['std'] . "\n";
						$output .= $row_end;
						
						// append
						$this->append_output( $output );
						
						break;
				}
			}
			
			// checks if has a child shortcode
			if( isset( $swmsc_shortcodes[$this->popup]['child_shortcode'] ) ) {
				
				// set child shortcode
				$this->cparams = $swmsc_shortcodes[$this->popup]['child_shortcode']['params'];
				$this->cshortcode = $swmsc_shortcodes[$this->popup]['child_shortcode']['shortcode'];
			
				// popup parent form row start
				$prow_start  = '<tbody>' . "\n";
				$prow_start .= '<tr class="form-row has-child">' . "\n";
				$prow_start .= '<td>';
				$prow_start .= '<div class="child-clone-rows">' . "\n";
				
				// for js use
				$prow_start .= '<div id="_swmsc_cshortcode" class="hidden">' . $this->cshortcode . '</div>' . "\n";
				
				// start the default row
				$prow_start .= '<div class="child-clone-row">' . "\n";
				$prow_start .= '<ul class="child-clone-row-form">' . "\n";
				
				// add $prow_start to output
				$this->append_output( $prow_start );
				
				foreach( $this->cparams as $cpkey => $cparam ) {
				
					// prefix the fields names and ids with swmsc_
					$cpkey = 'swmsc_' . $cpkey;

					if(!isset($cparam['std'])) {
						$cparam['std'] = '';
					}

					if(!isset($cparam['description'])) {
						$cparam['description'] = '';
					}
					
					// popup form row start
					$crow_start  = '<li class="child-clone-row-form-row">' . "\n";
					$crow_start .= '<div class="child-clone-row-label">' . "\n";
					$crow_start .= '<label>' . $cparam['heading'] . ':</label>' . "\n";
					$crow_start .= '</div>' . "\n";
					$crow_start .= '<div class="child-clone-row-field">' . "\n";
					
					// popup form row end
					$crow_end	  = '<span class="child-clone-row-desc">' . $cparam['description'] . '</span>' . "\n";
					$crow_end   .= '</div>' . "\n";
					$crow_end   .= '</li>' . "\n";
					
					switch( $cparam['type'] ) { 
					
						case 'textfield' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<input type="text" class="swmsc-form-text swmsc-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;

						case 'colorpicker' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<input type="text" class="swmsc-form-text swmsc-cinput wp-color-picker-field" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;

						case 'attach_image' :

							if(!isset($cparam['std'])) {
								$cparam['std'] = '';
							}

							// prepare
							$coutput  = $crow_start;
							$coutput .= '<div class="swmsc-upload-container">';
							$coutput .= '<img src="" alt="Image" class="uploaded-image" />';
							$coutput .= '<input type="hidden" class="swmsc-form-text swmsc-form-upload swmsc-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$coutput .= '<a href="' . $cpkey . '" class="swmsc-upload-button" data-upid="1">Upload</a>';
							$coutput .= '</div>';
							$coutput .= $crow_end;

							// append
							$this->append_output( $coutput );

							break;

						case 'iconpicker' :

							// prepare
							$coutput  = $crow_start;

							$coutput .= '<div class="fonticon">';
							foreach( $cparam['value'] as $value => $option ) {
								$coutput .= '<i class="fa ' . $value . '" data-icon="' . $value . '"></i>';
							}
							$coutput .= '</div>';

							$coutput .= '<input type="hidden" class="swmsc-form-text swmsc-cinput" name="' . $cpkey . '" id="' . $cpkey . '" value="' . $cparam['std'] . '" />' . "\n";
							$coutput .= $crow_end;

							// append
							$this->append_output( $coutput );

							break;
							
						case 'textarea_html' :
						case 'textarea' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<textarea rows="5" cols="60" name="' . $cpkey . '" id="' . $cpkey . '" class="swmsc-form-textarea swmsc-cinput">' . $cparam['std'] . '</textarea>' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'dropdown' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<select name="' . $cpkey . '" id="' . $cpkey . '" class="swmsc-form-select swmsc-cinput">' . "\n";
							
							foreach( $cparam['value'] as $option => $value )
							{
								$coutput .= '<option value="' . $value . '">' . $option . '</option>' . "\n";
							}
							
							$coutput .= '</select>' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
						case 'checkbox' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= '<label for="' . $cpkey . '" class="swmsc-form-checkbox">' . "\n";
							$coutput .= '<input type="checkbox" class="swmsc-cinput" name="' . $cpkey . '" id="' . $cpkey . '" ' . ( $cparam['std'] ? 'checked' : '' ) . ' />' . "\n";
							$coutput .= ' ' . $cparam['checkbox_text'] . '</label>' . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
							
							case 'infotext' :
							
							// prepare
							$coutput  = $crow_start;
							$coutput .= $cparam['std'] . "\n";
							$coutput .= $crow_end;
							
							// append
							$this->append_output( $coutput );
							
							break;
					}
				}
				
				// popup parent form row end
				$prow_end    = '</ul>' . "\n";		// end .child-clone-row-form
				$prow_end   .= '<a href="#" class="child-clone-row-remove"><i class="fa fa-times"></i> Remove</a>' . "\n";
				$prow_end   .= '<div class="clear"></div></div>' . "\n";		// end .child-clone-row				
				
				$prow_end   .= '</div>' . "\n";		// end .child-clone-rows
				$prow_end   .= '<a href="#" id="form-child-add" class="button-secondary"><i class="fa fa-plus"></i> ' . $swmsc_shortcodes[$this->popup]['child_shortcode']['clone_button'] . '</a>' . '</td>' . "\n";
				$prow_end   .= '</tr>' . "\n";					
				$prow_end   .= '</tbody>' . "\n";
				
				// add $prow_end to output
				$this->append_output( $prow_end );
			}			
		}
	}
	
	// --------------------------------------------------------------------------
	
	function append_output( $output ) {
		
		$this->output = $this->output . "\n" . $output;		
	}
	
	// --------------------------------------------------------------------------
	
	function reset_output( $output ) {
		
		$this->output = '';
	}
	
	// --------------------------------------------------------------------------
	
	function append_error( $error ) {
		
		$this->errors = $this->errors . "\n" . $error;
	}
}

?>