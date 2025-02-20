<?php

class SIMPNO_Admin_Settings {
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
	}

	public function add_settings_page() {
		add_options_page(
			'Simple Notify Settings',
			'Simple Notify Settings',
			'manage_options',
			'simple-notify-settings',
			array( $this, 'settings_page_content' ),
		);
	}

	public function register_settings() {
		register_setting(
			'simple-notify-options',
			'simpno_enable_emails_new_user_register',
			array( $this, 'sanitize_notification_enable_emails' )
		);

		register_setting(
			'simple-notify-options',
			'simpno_email_template_new_user_register',
			array( $this, 'sanitize_notification_email_template' )
		);

		register_setting(
			'simple-notify-options',
			'simpno_enable_emails_new_post_publish',
			array( $this, 'sanitize_notification_enable_emails' )
		);

		register_setting(
			'simple-notify-options',
			'simpno_email_template_new_post_publish',
			array( $this, 'sanitize_notification_email_template' )
		);
	}

	// Sanitization callback for enabling email settings
	public function sanitize_notification_enable_emails( $input ) {
		// Ensure the input is a boolean value (1 or 0)
		return ( $input == 1 ) ? 1 : 0;
	}

	// Sanitization callback for email template settings
	public function sanitize_notification_email_template( $input ) {
		// Sanitize as a string, stripping tags for security
		return sanitize_text_field( $input );
	}

	public function settings_page_content() {
		?>
		<div class="wrap">
			<h1>Simple Notify Settings</h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( 'simple-notify-options' );
				do_settings_sections( 'simple-notify-settings' );
				?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Enable New User Register Notifications</th>
						<td>
							<input type="checkbox" name="simpno_enable_emails_new_user_register" value="1"
								<?php checked( 1, get_option( 'simpno_enable_emails_new_user_register' ), true ); ?> />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Email Template</th>
						<td>
							<textarea name="simpno_email_template_new_user_register" rows="10" cols="50"
								class="large-text"><?php echo esc_textarea( get_option( 'simpno_email_template_new_user_register' ) ); ?></textarea>
						</td>
					</tr>
				</table>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Enable Post Publish Email Notifications</th>
						<td>
							<input type="checkbox" name="simpno_enable_emails_new_post_publish" value="1"
								<?php checked( 1, get_option( 'simpno_enable_emails_new_post_publish' ), true ); ?> />
						</td>
					</tr>
					<tr valign="top">
						<th scope="row">Email Template</th>
						<td>
							<textarea name="simpno_email_template_new_post_publish" rows="10" cols="50"
								class="large-text"><?php echo esc_textarea( get_option( 'simpno_email_template_new_post_publish' ) ); ?></textarea>
						</td>
					</tr>
				</table>
				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}