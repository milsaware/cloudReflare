<div align="center">
	<p class="monitor_msg_block"><?php echo $timestamp;?></p>
	<?php if(isset($error)){?>
		<p class="monitor_msg_block"><?php echo $error;?></p>
	<?php }else{?>
		<p class="monitor_msg_block"><?php echo $msg_one;?></p>
		<p class="monitor_msg_block"><?php echo $msg_two;?></p>
		<p class="monitor_msg_block"><?php echo $GLOBALS['lang']['monitor']['check_msg'];?></p>
	<?php }?>
	<button id="go_back"><?php echo $GLOBALS['lang']['monitor']['go_back'];?></button>
</div>