<?php
/*
* Name: Setting Page
* Author: Renz Ramos
*/
class setting_page {
	private $setting_title = 'Basic Setting';

	function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_setting_menu' ) );
	}

	function admin_setting_menu() {
		add_menu_page( $this->setting_title, $this->setting_title, 'manage_options', 'basic-setting', array( $this, 'admin_setting_page'), 'dashicons-admin-generic',2);
	}

	function admin_setting_page() {
		?>
		<div class="wrap">
			<h2><?php echo $this->setting_title; ?></h2>
			<small>Developed by Renz Ramos</small>
		</div>
		<?php
	}
}

new setting_page;

?>