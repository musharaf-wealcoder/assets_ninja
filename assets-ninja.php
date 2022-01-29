<?php

/*
  Plugin Name: Assets Ninja
  Plugin URI: https://wealcoder.com
  version: 1.0
  Text Domain: assets_ninja
  Domain Path: /languages
   
*/

define('ASSETS_DIR', plugin_dir_url(__FILE__). "assets/");


class Assets_ninja{
  
  private $version;

  public function __construct()
  {
    $this->version = time();
    add_action('plugin_loaded', array($this,'assets_textdomain_loade'));
    add_action('wp_enqueue_scripts', array($this, 'assets_ninja_assets_enqueue'));
    add_action('admin_enqueue_scripts', array($this, 'assets_ninja_admin_assets_enqueue'));
  }

  public function assets_textdomain_loade()
  {
    load_plugin_textdomain('assets_textdomain', false, plugin_dir_url(__FILE__), '/language');
  }

  public function assets_ninja_assets_enqueue()
  {
    wp_enqueue_script('assets_ninja_main_js', ASSETS_DIR.'public/js/main.js', array('jquery','assets_ninja_another_js'), $this->version, true);
    wp_enqueue_script('assets_ninja_another_js', ASSETS_DIR.'public/js/another.js', array('jquery'), $this->version, true);
    
  
  
    $user_data = array(
        'name' => 'musharaf',
        'url' => 'musharaf.com'
    );


    wp_localize_script('assets_ninja_another_js', 'user_information', $user_data);
  
  }

  public function assets_ninja_admin_assets_enqueue($screen)
  {

    $_screen = get_current_screen($screen);


   if('edit.php' == $screen && 'page' == $_screen->post_type){
      wp_enqueue_script('admin_main_js', ASSETS_DIR.'admin/js/main.js', array('jquery'), $this->version, true);
   }
  }


  

}

 new Assets_ninja;


























?>