<?php 

	class SocialButtonsView {

		public function render() {
			?>
			<div class="social-buttons d-flex justify-content-sm-end">
				<?php if(!empty($this->instagramLink)): ?>
					<?php $this->showIcon($this->instagramLink, 'instagram'); ?>
				<?php endif; ?>
				<?php if(!empty($this->vkLink)): ?>
					<?php $this->showIcon($this->vkLink, 'vk'); ?>
				<?php endif; ?>
				<?php if(!empty($this->facebookLink)): ?>
					<?php $this->showIcon($this->facebookLink, 'facebook'); ?>
				<?php endif; ?>
				<?php if(!empty($this->twitterLink)): ?>
					<?php $this->showIcon($this->twitterLink, 'twitter'); ?>
				<?php endif; ?>
			</div>
			<?php
		}

		private function showIcon($link, $type) {
			?>
			<a class="social-link" href="<?php echo $link; ?>" target="_blank"><?php echo $this->setIcon($type); ?></a>
			<?php
		}

		public function setIcon($linkType) {
			return '<i class="fa fa-lg fa-' . $linkType . '" aria-hidden="true"></i>';
		}
	}