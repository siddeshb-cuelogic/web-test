<div class="content">
<?php print_r($this->session->all_userdata()); ?>
	<h2>Welcome Back, <?php echo $this->session->userdata('user_name'); ?>! <?php echo anchor('user/logout', 'Logout'); ?></h2>
     <p>You have successfully logged in</p>
	
</div><!--<div class="content">-->