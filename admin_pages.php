<?php

	require_once(dirname(__FILE__) . "/admin_pages/social_buttons_controller.php");

	add_action('admin_menu', function() {
		add_menu_page( 'Настройка социальных сетей', 'Социальные сети', 'manage_options', 'ns-social-options', array('SocialButtonsController', 'show'), 'dashicons-admin-links', 50 ); 
	} );