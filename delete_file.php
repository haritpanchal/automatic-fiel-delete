<?php 

wp_enqueue_script( 'custom-js' , get_template_directory_uri().'/assets/js/custom.js', array('jquery') , false , true );
wp_localize_script( 'custom-js', 'delete_file', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

add_action( 'wp_ajax_nopriv_delete_action', 'delete_callback' );
add_action( 'wp_ajax_delete_action', 'delete_callback' );

function delete_callback(){
	$file_name = $_POST['file_name'];
	$path = wp_get_upload_dir();
	$file = $path['path'].'/'.$file_name;
	if(file_exists($file)){
		wp_delete_file( $file );
		$arr = array('status'=>1,'msg'=>'file Deleted successfully');
	}
	else{
		$arr = array('status'=>0,'msg'=>'file Deleted fail');
	}
	wp_send_json( $arr );
	die();
}

?>