<?php

	class ColumnsView {

		public function render() {
			$instance = $this->instance;
			$columnCount = isset( $instance[ 'columnCount' ] ) ? $instance[ 'columnCount' ] : 0;

			$columnTexts = isset ( $instance['columnTexts'] ) ? $instance['columnTexts'] : array();
			$columnTitles = isset ( $instance['columnTitles'] ) ? $instance['columnTitles'] : array();
			$columnImages = isset ( $instance['columnImages'] ) ? $instance['columnImages'] : array();

			if($columnCount == 0) {
				return;
			}
			?>
			<div class="row">
			<?php for($i = 0; $i < $columnCount; $i++ ): ?>
				<div class="col-12 col-lg-4">
					<div class="column-item">
					<?php if(!empty($columnImages[$i])): ?>
						<img src="<?php echo get_template_directory_uri() . "/images/" . $columnImages[$i]; ?>" alt="icon">
					<?php endif; ?>
						<div class="column-item-body">
							<h3><?php echo $columnTitles[$i]; ?></h3>
							<div class="description"><?php echo wpautop( $columnTexts[$i] ); ?></div>
						</div><!-- .column-item-body -->
					</div><!-- .column-item -->
				</div><!-- .col-12 -->
			<?php endfor; ?>
			</div><!-- .row -->
			<?php
		}
	}
