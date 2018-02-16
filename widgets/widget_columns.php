<?php

	class NSColumnsWidget extends WP_Widget {

		public function __construct() {
			parent::__construct("ns_columns_widget", "Колонки",
				array("description" => "Виджет, который отображает колонки"));
		}


		public function widget($args, $instance) {
			require_once(dirname(__FILE__) . "/template/template_columns.php");

			$view = new ColumnsView();
			$view->instance = $instance;
			$view->render();
		}

		public function form( $instance ) {

			require_once(dirname(__FILE__) . "/../helpers/helper_svg_mapper.php");
			$mapper = SvgMapper::MAPPER;

			wp_enqueue_script( 'ns-columns-settings' ); 
			$columnsArgs = array('images' => $mapper);
			wp_localize_script( 'ns-columns-settings', 'columnsArgs', $columnsArgs );

			$columnCount = isset( $instance[ 'columnCount' ] ) ? $instance[ 'columnCount' ] : 0;

			$columnTexts = isset ( $instance['columnTexts'] ) ? $instance['columnTexts'] : array();
			$columnTitles = isset ( $instance['columnTitles'] ) ? $instance['columnTitles'] : array();
			$columnImages = isset ( $instance['columnImages'] ) ? $instance['columnImages'] : array();

			?>
			<input type="hidden" class="widget-option-name" value="<?php echo $this->get_field_name(""); ?>">
			<input class="widefat column-count" type="hidden" name="<?php echo $this->get_field_name('columnCount'); ?>" type="number" value="<?php echo esc_attr( $columnCount ); ?>" />
			<div class="column-settings">
				<?php for($counter = 0; $counter < $columnCount; $counter++): ?>
				<div class="card" id="<?php echo $counter; ?>">
					<a class="delete-column-item" href="#" style="float: right; margin-top: 1em;">Удалить</a><h2>Элемент <?php echo ($counter + 1); ?></h2>
					<p>
						<label>Заголовок:</label>
						<input class="widefat element-title" name="<?php echo $this->get_field_name('columnTitles'). "[". $counter ."]"; ?>" type="text" value="<?php echo esc_attr( $columnTitles[$counter] ); ?>" />
					</p>
					<p>
						<label>Текст:</label>
						<textarea class="widefat element-text" rows="15" name="<?php echo $this->get_field_name('columnTexts'). "[". $counter ."]"; ?>"><?php echo esc_attr( $columnTexts[$counter] ); ?></textarea>
					</p>
					<p>
						<label>Иконка: 
							<select class='widefat element-img' name="<?php echo $this->get_field_name('columnImages'). "[". $counter ."]"; ?>" type="text">
								<option value="" <?php echo ($columnImages[$counter] == "") ? ' selected' : ''; ?>></option>
			            <?php 
			            	foreach($mapper as $key => $value) {

								$option = '<option value="' . $key . '"';

								if($key == $columnImages[$counter]) {
									$option .= " selected";
								}

								$option .= '>';
								$option .= $value;
								
								$option .= '</option>';
								echo $option;
							}
						?>
			        		</select>                
			      		</label>
					</p>
				</div>
				<?php endfor; ?>
			</div>
			<p>
				<button class="add-column-item button button-primary">Добавить элемент</button>
			</p>
			<?php
		}

		public function update( $new_instance, $old_instance ) {
			$instance = array();

			$instance['columnCount'] = (is_numeric( $new_instance['columnCount'] ) ) ? $new_instance['columnCount'] : 0;

			$instance['columnTexts'] = array();

			if ( isset ( $new_instance['columnTexts'] ) ) {
				foreach ( $new_instance['columnTexts'] as $value ) {
					$instance['columnTexts'][] = $value;
				}
			}

			$instance['columnTitles'] = array();

			if ( isset ( $new_instance['columnTitles'] ) ) {
				foreach ( $new_instance['columnTitles'] as $value ) {
					$instance['columnTitles'][] = $value;
				}
			}

			$instance['columnImages'] = array();

			if ( isset ( $new_instance['columnImages'] ) ) {
				foreach ( $new_instance['columnImages'] as $value ) {
					$instance['columnImages'][] = $value;
				}
			}

			return $instance;
		}

	} 