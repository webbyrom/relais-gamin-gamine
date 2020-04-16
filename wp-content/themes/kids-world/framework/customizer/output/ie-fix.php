<?php

//IF IE 9
if (stripos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9')) {

}

//IF IE 10
if (stripos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10')) {

}

//IF IE 11
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7.0; rv:11.0') !== false) {        
	echo 'ul.kidsworld_top_nav > li > a > span {-moz-transition-property:none;-webkit-transition-property:none;-o-transition-property:none;transition-property:none;}'; 
}

if (stripos($_SERVER['HTTP_USER_AGENT'], 'EDGE')) { 
	echo 'ul.kidsworld_top_nav > li > a > span {-moz-transition-property:none;-webkit-transition-property:none;-o-transition-property:none;transition-property:none;}'; 
}

//All IE
if (stripos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) {
	echo 'ul.kidsworld_top_nav > li > a > span {-moz-transition-property:none;-webkit-transition-property:none;-o-transition-property:none;transition-property:none;}'; 
}


?>