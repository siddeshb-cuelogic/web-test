	<div id="content">	
		<h2><?php echo $title ?></h2>
		<?php if ( $this->session->flashdata( 'list_message' ) ) : ?>
		<p><?php echo $this->session->flashdata( 'list_message' ); ?></p>
		<?php endif; ?>

		<table>
			<thead>
			<tr>
				<th>Name</th>
				<th>Username</th>
			</tr>
			</thead>
			<tbody>
				<?php
					foreach($list as $item) {
						echo "<tr><td>".$item->name."</td>";
						echo "<td>".$item->username."</td></tr>";
					}
				?>
			</tbody>
		</table>
		<div style="clear:both;">&nbsp;</div>
		<a href="index">Home</a>
		<div style="clear:both;">&nbsp;</div>
		<a href="logout">Logout</a>
	</div>
