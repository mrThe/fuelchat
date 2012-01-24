<h2>Listing Chats</h2>
<br>
<table class="zebra-striped">
	<thead>
		<tr>
			<th width="10%">User</th>
			<th>Message</th>
		</tr>
	</thead>
	<tbody id='messages'>
<?php foreach ($chats as $chat): ?>		<tr>

			<td><?php echo $chat->user; ?></td>
			<td><?php echo $chat->message; ?></td>

		</tr>
<?php endforeach; ?>
	</tbody>
</table>


	
<script>
var lastMessage=<?php echo $lastmessage; ?>; //global
var ROOT_PATH="<?php echo $path; ?>"; //globalpath
setInterval('updateChat()', 10000);
</script>
				
<span>
   <?php echo Form::input('user', 'Username', array('style' => 'width:10%')); ?>
   <?php echo Form::input('message', 'Message', array('style' => 'width:70%')); ?>

   <?php echo Form::button('addmessage', 'Add Message!', array('class' => 'btn success', 'style' => 'width:15%', 'onclick' => 'sendMessage()')); ?>
</span>
 
</p>
