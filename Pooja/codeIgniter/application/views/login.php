<div id="content">	
	<h2><?php echo $title ?></h2>
	<?php if ( $this->session->flashdata( 'message' ) ) : ?>
	<p><?php echo $this->session->flashdata( 'message' ); ?></p>
	<?php endif; ?>
	<div class="signin_form">
	 <?php echo form_open("user/login"); ?>
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
		<div class="buttons">
			<?php echo form_submit( 'submit', 'Sign In' ); ?>
		</div>
	 <?php echo form_close(); ?>
	</div><!--<div class="signin_form">-->
	<div class="signup_links">
		<p>New User?? <a href="user/register">Sign Up</a> here. </p>
	</div>
</div>
