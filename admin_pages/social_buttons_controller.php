<?php

	class SocialButtonsController {

		public static function show() {
			?>
			<div class="wrap">
				<h2><?php echo get_admin_page_title() ?></h2>

				<form method="POST" action="options.php">
					<?php wp_nonce_field('update-options'); ?>
					<table class="form-table">
						<tr valign="top">
							<th scope="row">
								<label for="ns_instagram_link">Инстаграм</label>
							</th>
							<td>
								<input class="regular-text" type="text" id="ns_instagram_link" name="ns_instagram_link" value="<?php echo get_option('ns_instagram_link'); ?>" />
							</td>
						</tr>

						<tr valign="top">
							<th scope="row">
								<label for="ns_vk_link">VK</label>
							</th>
							<td>
								<input class="regular-text" type="text" id="ns_vk_link" name="ns_vk_link" value="<?php echo get_option('ns_vk_link'); ?>" />
							</td>
						</tr>

						<tr valign="top">
							<th scope="row">
								<label for="ns_facebook_link">Facebook</label>
							</th>
							<td>
								<input class="regular-text" type="text" id="ns_facebook_link" name="ns_facebook_link" value="<?php echo get_option('ns_facebook_link'); ?>" />
							</td>
						</tr>

						<tr valign="top">
							<th scope="row">
								<label for="ns_twitter_link">Twitter</label>
							</th>
							<td>
								<input class="regular-text" type="text" id="ns_twitter_link" name="ns_twitter_link" value="<?php echo get_option('ns_twitter_link'); ?>" />
							</td>
						</tr>

					</table>

					<input type="hidden" name="action" value="update" />
					<input type="hidden" name="page_options" value="ns_instagram_link,ns_vk_link,ns_facebook_link,ns_twitter_link" />

					<?php submit_button(); ?>
			</div>
			<?php
		}
	}