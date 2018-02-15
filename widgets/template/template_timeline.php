<?php
	
	class TimelineView {

		public function render() {
			$instance = $this->instance;
			$timelineCount = isset( $instance[ 'timelineCount' ] ) ? $instance[ 'timelineCount' ] : 0;

			$timelineTexts = isset ( $instance['timelineTexts'] ) ? $instance['timelineTexts'] : array();
			$timelineTitles = isset ( $instance['timelineTitles'] ) ? $instance['timelineTitles'] : array();

			if($timelineCount == 0) {
				return;
			}
			?>
			
			<div class="timeline">
			<?php for($i = 0; $i < $timelineCount; $i++) : ?>
				<div class="timeline-item">
					<div class="timeline-item-body <?php if($i % 2 != 0) { echo "flipped"; } ?>">
						<div class="timeline-item-block">
							<h3><?php echo $timelineTitles[$i]; ?></h3>
							<div class="timeline-body-text">
								<?php echo $timelineTexts[$i]; ?>
							</div><!-- .timeline-body-text -->
						</div><!-- .timeline-item-block -->
					</div><!-- .timeline-item-body -->
					<div class="line"></div>
					<div class="circle"></div>
				</div><!-- .timeline-item -->
			<?php endfor; ?>
			</div><!-- .timeline -->
			<?php
		}
	}