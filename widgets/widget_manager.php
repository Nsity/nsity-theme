<?php

	require_once(dirname( __FILE__ ) . "/widget_timeline.php"); // временная шкала

	class NSWidgetManager {

		public static function registerWidget() {
			add_action("widgets_init", function () {
				$nmWidgetList = array(
					"NSTimelineWidget",
				);

				foreach ($nmWidgetList as $nmWidget) {
					register_widget($nmWidget);
				}
			});
		}
	}