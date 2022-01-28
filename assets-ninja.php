<?php

/*
  Plugin Name: Assets Ninja
  Plugin URI: https://wealcoder.com
  version: 1.0
  Text Domain: assets_ninja
  Domain Path: /languages
   
*/

class Assets_ninja{

  public function __construct()
  {
    add_action('admin_init', array($this,'assets_textdomain_loade'));
  }

  public function assets_textdomain_loade()
  {
    load_plugin_textdomain('assets_textdomain', false, plugin_dir_url(__FILE__), '/language');
  }


}

 new Assets_ninja;
























?>