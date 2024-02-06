<?php
/**
* @when before_wp_load
*/
function import_post_command( ) {
  $path = '/var/www/html/kartik/filesexport/wordpresssite.wordpress.2024-02-06.000.xml';
  $author = 'create';
  $output = WP_CLI::runcommand("import $path --authors=create",array('return'=>'all'));
  if($output){
    WP_CLI::success('imported files successfully');
  }else{
    WP_CLI::error('Failed to import files');
  }
}
WP_CLI::add_command( 'run', 'import_post_command');

// wp --require=import-books-post.php run