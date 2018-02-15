<?php

	class NSTimelineWidget extends WP_Widget {

		public function __construct() {
			parent::__construct("ns_timeline_widget", "Таймлайн",
				array("description" => "Виджет, который отображает этапы"));
		}


		public function widget($args, $instance) {
			require_once(dirname(__FILE__) . "/template/template_timeline.php");

			$view = new TimelineView();
			$view->instance = $instance;
			$view->render();
		}

		public function form( $instance ) {

			wp_enqueue_script( 'ns-timeline-settings' ); 

			$timelineCount = isset( $instance[ 'timelineCount' ] ) ? $instance[ 'timelineCount' ] : 0;
			$timelineTexts = isset ( $instance['timelineTexts'] ) ? $instance['timelineTexts'] : array();
			$timelineTitles = isset ( $instance['timelineTitles'] ) ? $instance['timelineTitles'] : array();

			?>
			<input type="hidden" class="widget-option-name" value="<?php echo $this->get_field_name(""); ?>">
			<input class="widefat timeline-count" type="hidden" name="<?php echo $this->get_field_name('timelineCount'); ?>" type="number" value="<?php echo esc_attr( $timelineCount ); ?>" />
			<div class="timeline-settings">
			<?php for($counter = 0; $counter < $timelineCount; $counter++): ?>
				<div class="card" id="<?php echo $counter; ?>">
					<a class="delete-timeline-item" href="#" style="float: right; margin-top: 1em;">Удалить</a><h2>Элемент <?php echo ($counter + 1); ?></h2>
					<p>
						<label>Заголовок:</label>
						<input class="widefat element-title" name="<?php echo $this->get_field_name('timelineTitles'). "[". $counter ."]"; ?>" type="text" value="<?php echo esc_attr( $timelineTitles[$counter] ); ?>" />
					</p>
					<p>
						<label>Текст:</label>
						<textarea class="widefat element-text" rows="15" name="<?php echo $this->get_field_name('timelineTexts'). "[". $counter ."]"; ?>"><?php echo esc_attr( $timelineTexts[$counter] ); ?></textarea>
					</p>
				</div>
			<?php endfor; ?>
			</div>
			<p>
				<button class="add-timeline-item button button-primary">Добавить элемент</button>
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();

			$instance['timelineCount'] = (is_numeric( $new_instance['timelineCount'] ) ) ? $new_instance['timelineCount'] : 0;

			$instance['timelineTexts'] = array();

			if ( isset ( $new_instance['timelineTexts'] ) ) {
				foreach ( $new_instance['timelineTexts'] as $value ) {
					$instance['timelineTexts'][] = $value;
				}
			}

			$instance['timelineTitles'] = array();

			if ( isset ( $new_instance['timelineTitles'] ) ) {
				foreach ( $new_instance['timelineTitles'] as $value ) {
					$instance['timelineTitles'][] = $value;
				}
			}

			return $instance;
		}

	} 