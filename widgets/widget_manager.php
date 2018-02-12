<?php

	class NNWidgetManager {

		public static function registerWidget() {
			add_action("widgets_init", function () {
				$nmWidgetList = array();

				foreach ($nmWidgetList as $nmWidget) {
					register_widget($nmWidget);
				}
			});
		}
	}