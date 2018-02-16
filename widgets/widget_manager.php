<?php

	require_once(dirname( __FILE__ ) . "/widget_timeline.php"); // временная шкала
	require_once(dirname( __FILE__ ) . "/widget_columns.php"); // колонки

	class NSWidgetManager {

		public static function registerWidget() {
			add_action("widgets_init", function () {
				$nmWidgetList = array(
					"NSTimelineWidget",
					"NSColumnsWidget",
				);

				foreach ($nmWidgetList as $nmWidget) {
					register_widget($nmWidget);
				}
			});
		}
	}