<?php
$user = get_userdata( get_current_user_id() );
?>
<h2 class="options-heading"><span><?php _e( 'Need help with your WordPress site?', 'image-sizes' ); ?></span></h2>
<div id="wpp-contact-wrap">
	<div class="img-center">
		<img class="help-img" src="<?php echo plugins_url( 'assets/img/need-help.png', WPPIS );?>" >
	</div>
	<p class="description"><?php _e( 'We can help! Just drop us a message, we\'ll get back to you shortly..', 'image-sizes' ); ?></p>
	<form action="" method="post" id="wpp-contact">
		<?php wp_nonce_field( 'need-help', '_wpp_nonce' ); ?>
		<input type="hidden" name="action" value="wpp-need-help">
		<input type="hidden" name="referer-site" value="<?php echo get_bloginfo( 'url' ); ?>">
		<p>
			<label for="your-name"><?php _e( 'Your Name', 'image-sizes' ); ?></label>
			<input  name="your-name" id="your-name" type="text" value="<?php echo $user->display_name; ?>" placeholder="<?php _e( 'Type your name', 'image-sizes' ); ?>">
		</p>
		<p>
			<label for="email"><?php _e( 'Email', 'image-sizes' ); ?></label>
			<input  name="email" id="email" type="email" value="<?php echo $user->user_email; ?>" placeholder="<?php _e( 'Input a valid email', 'image-sizes' ); ?>" required>
		</p>
		<p>
			<label for="url"><?php _e( 'Site URL', 'image-sizes' ); ?></label>
			<input  name="url" id="url" type="url" placeholder="<?php _e( 'Your site url', 'image-sizes' ); ?>" >
		</p>
		<p>
			<label for="subject"><?php _e( 'Subject', 'image-sizes' ); ?></label>
			<input  name="subject" id="subject" type="text" placeholder="<?php _e( 'What do you need help with?', 'image-sizes' ); ?>">
		</p>
		<p>
			<label for="message"><?php _e( 'Description', 'image-sizes' ); ?></label>
			<textarea name="message" id="message" placeholder="<?php _e( 'Please elaborate..', 'image-sizes' ); ?>"></textarea>
		</p>
		<p>
			<div class="wpp-success" style="display: none;"><?php _e( 'Message Sent!', 'image-sizes' ); ?></div>
			<input class="button-primary" type="submit" value="<?php _e( 'Send Message', 'image-sizes' ); ?>">
		</p>
	</form>
</div>