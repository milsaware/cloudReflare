<?php //check_ip();?>
<select id="language_select">
	<?php foreach($languages as $language){
		$lang_selected = ($language == $set_language)? ' selected' : '';
		echo '<option value="'.$language.'"'.$lang_selected.'>'.$language.'</option>';
	}?>
</select>
<img src="/assets/images/question.png" id="question_img">
<div id="container">
	<div id="home_page">
		<div class="form_block">
			<img src="/assets/images/ipdata_logo.png" id="ipdata_logo">
			<input type="text" class="form_input" id="ipdata_api_key" placeholder="<?php echo $GLOBALS['lang']['ipdata_api_key'];?>" value="<?php echo $ipdata_api_key;?>">
		</div>

		<div class="form_block" id="cf_block">
			<?php view::build('cfblock', $data);?>
		</div>

		<div class="form_block">
			<img src="/assets/images/settings_icon.png" id="cloudflare_logo">
			<input type="text" class="form_input" id="ip_address" placeholder="<?php echo $GLOBALS['lang']['current_ipv4_address'];?>" value="<?php echo $ip_address;?>">
			<?php echo $GLOBALS['lang']['minute_check_message'];?>
		</div>

		<button id="save_settings" class="submit_btn"><?php echo $GLOBALS['lang']['save_settings'];?></button>
		<button id="start_monitor" class="submit_btn"<?php echo $monitor_lock;?>><?php echo $GLOBALS['lang']['begin_monitoring'];?></button>
	</div>
</div>