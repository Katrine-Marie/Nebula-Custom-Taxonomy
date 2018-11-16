<?php
/*
Plugin Name: Nebula Custom Taxonomy
Description: Plugin for creating a custom taxonomy (Volume)
Version: 0.2.0
Author: Katrine-Marie Burmeister
Author URI: https://jordstudio.dk
*/

class CustomTaxonomy {
	private $labels;

	function __construct($labels){
		$this->labels = $labels;
		add_action('init', array($this,'create_taxonomy'));
	}

	function create_taxonomy() {

		register_taxonomy('volumes',array('post'), array(
			'hierarchical' => true,
			'labels' => $this->labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'vol' ),
		));

	}

}

$labels = array(
	'name' => _x( 'Volumes', 'taxonomy general name' ),
	'singular_name' => _x( 'Volume', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Volumes' ),
	'all_items' => __( 'All Volumes' ),
	'edit_item' => __( 'Edit Volume' ),
	'update_item' => __( 'Update Volume' ),
	'add_new_item' => __( 'Add New Volume' ),
	'new_item_name' => __( 'New Volume Name' ),
	'menu_name' => __( 'Volumes' ),
);

$taxonomy = new CustomTaxonomy($labels);
