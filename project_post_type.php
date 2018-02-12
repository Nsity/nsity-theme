<?php

	add_action('init', 'register_post_types');
	
	function register_post_types() {
		register_post_type('project', array(
			'labels' => array(
				'name'               => 'Проекты', 
				'singular_name'      => 'Проект',
				'add_new'            => 'Добавить новый', 
				'add_new_item'       => 'Добавление нового проекта', 
				'edit_item'          => 'Редактирование проекта',
				'new_item'           => 'Новый проект',
				'view_item'          => 'Посмотреть проект',
				'search_items'       => 'Найти проект', 
				'not_found'          => 'Проектов не найдено', 
				'not_found_in_trash' => 'В корзине проектов не найдено', 
				'parent_item_colon'  => '', 
				'menu_name'          => 'Проекты', // название меню
			),
			'public'              => true,
			'show_ui'             => true,
			'menu_icon'           => 'dashicons-category', 
			'hierarchical'        => false,
			'supports'            => array( 'title', 'editor', 'author', "revisions", 'thumbnail' ), 
			'taxonomies'          => array(),
			'has_archive'         => false,
		) );
	}

	