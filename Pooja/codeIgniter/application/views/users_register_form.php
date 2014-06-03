	<div id="content">	
		<h2><?php echo $title ?></h2>
		<?php if ( $this->session->flashdata( 'message' ) ) : ?>
		<p><?php echo $this->session->flashdata( 'message' ); ?></p>
		<?php endif; ?>

		<?php echo form_open( '' ); ?>
			<?php echo form_fieldset( 'User Registration Form' ); ?>

			<div class="textfield">
				<?php echo form_label( 'Username', 'username' ); ?>
				<?php echo form_error( 'username' ); ?>
				<?php echo form_input( 'username' ); ?>
			</div>
			<div style="clear:both;">&nbsp;</div>
			<div class="textfield">
				<?php echo form_label( 'Password', 'password' ); ?>
				<?php echo form_error( 'password' ); ?>
				<?php echo form_password( 'password' ); ?>
			</div>
			<div style="clear:both;">&nbsp;</div>
			<div class="textfield">
				<?php echo form_label( 'Password Confirm', 'password_confirm' ); ?>
				<?php echo form_error( 'password_confirm' ); ?>
				<?php echo form_password( 'password_confirm' ); ?>
			</div>
			<div style="clear:both;">&nbsp;</div>
			<div class="textfield">
				<?php echo form_label( 'Name', 'name' ); ?>
				<?php echo form_error( 'name' ); ?>
				<?php echo form_input( 'name' ); ?>
			</div>
			<div style="clear:both;">&nbsp;</div>
			<div class="textfield">
				<?php echo form_label( 'Email', 'email' ); ?>
				<?php echo form_error( 'email' ); ?>
				<?php echo form_input( 'email' ); ?>
			</div>
			<div style="clear:both;">&nbsp;</div>
			<div class="buttons">
				<?php echo form_submit( 'submit', 'Submit' ); ?>
			</div>
			<div style="clear:both;">&nbsp;</div>
			<?php echo form_fieldset_close(); ?>
		<?php echo form_close(); ?>
	</div>
