<?php
class kidsworld_Love {

	function __construct() {
		add_action( 'wp_ajax_kidsworld_love', array( &$this, 'ajax' ) );
		add_action( 'wp_ajax_nopriv_kidsworld_love', array( &$this, 'ajax' ) );
		add_action( 'wp_ajax_kidsworld_love_randomize', array( &$this, 'randomize' ) );
		add_action( 'wp_ajax_nopriv_kidsworld_love_randomize', array( &$this, 'randomize' ) );
	}

	public static function ajax( $post_id ) {

		if ( isset( $_POST['post_id'] ) ) {
			echo self::love( intval($_POST['post_id']), 'update' );
		}
		else {
			echo self::love( intval($_POST['post_id']), 'get' );
		}

		exit;
	}
	
	public static function randomize( ){
		
		$kidsworld_post_type = htmlspecialchars(stripslashes($_POST['post_type']));
		
		$kidsworld_array_posts = get_posts(array( 
			'posts_per_page' 	=> -1,
			'post_type' 		=> $kidsworld_post_type ? $kidsworld_post_type : false,
		));

		if( is_array( $kidsworld_array_posts ) ){
			foreach( $kidsworld_array_posts as $post ){
				$kidsworld_love_count = rand( 10, 100 );	// Random number of loves [min:10, max:100]
				update_post_meta( $post->ID, 'kidsworld-post-love', $kidsworld_love_count );
			}
			
			_e( 'Love randomized',  'kids-world' );
		}

		exit;
	}

	public static function love( $post_id, $action = 'get' ) {
		if ( ! is_numeric( $post_id ) ) return;

		switch ( $action ) {

		case 'get':
			$kidsworld_love_count = get_post_meta( $post_id, 'kidsworld-post-love', true );
			if ( !$kidsworld_love_count ) {
				$kidsworld_love_count = 0;
				add_post_meta( $post_id, 'kidsworld-post-love', $kidsworld_love_count, true );
			}

			return $kidsworld_love_count;
			break;

		case 'update':
			$kidsworld_love_count = get_post_meta( $post_id, 'kidsworld-post-love', true );
			if ( isset( $_COOKIE['kidsworld-post-love-'. $post_id] ) ) return $kidsworld_love_count;

			$kidsworld_love_count++;
			update_post_meta( $post_id, 'kidsworld-post-love', $kidsworld_love_count );
			setcookie( 'kidsworld-post-love-'. $post_id, $post_id, time()*20, '/' );

			return $kidsworld_love_count;
			break;

		}
	}

	public static function get() {
		global $post;

		$output = self::love( $post->ID );
		$class = '';
		if ( isset( $_COOKIE['kidsworld-post-love-'. $post->ID] ) ) {
			$class = 'loved';
		}

		return '<a href="#" class="kidsworld-love '. $class .'" data-id="'. $post->ID .'"><span><i class="fa fa-heart-o"></i><i class="fa fa-heart"></i></span><span class="label">'. $output .'</span></a>';	
	}

}

new kidsworld_Love();

function kidsworld_love( $return = '' ) {
	return kidsworld_Love::get();
}