<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       johnlazaro.com
 * @since      1.0.0
 *
 * @package    Source_Insights
 * @subpackage Source_Insights/admin/partials
 */

?>

<br><br>

<div class="souins-wrapper">

	<form method="post" id="form-source-new-post">

		<?php wp_nonce_field( 'souins_source_form_nonce', 'souins_source_form_nonce_new_post' ); ?>

		<input type="hidden" name="souins_source_form_action" value="souins_source_form_action_new_post">
		<input type="text" name="source" class="source" autocomplete="off" required>

		<br>
		
		<button type="submit">Submit</button>
		
	</form>

</div>