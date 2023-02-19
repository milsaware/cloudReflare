<?php
	echo '
		<img src="/assets/images/cloudflare_logo.png" id="cloudflare_logo">
		<input type="text" class="form_input" id="cloudflare_global_api_key" placeholder="'.$GLOBALS['lang']['cloudflare_global_api_key'].'" value="'.$cloudflare_api.'">
		<input type="text" class="form_input" id="cloudflare_zone_id" placeholder="'.$GLOBALS['lang']['cloudflare_zone_id'].'" value="'.$cloudflare_zone_id.'">
		<input type="text" class="form_input" id="cloudflare_dns_name" placeholder="'.$GLOBALS['lang']['cloudflare_dns_name'].'" value="'.$cloudflare_dns_name.'">
		<input type="email" class="form_input" id="cloudflare_email_address" placeholder="'.$GLOBALS['lang']['cloudflare_email_address'].'" value="'.$cloudflare_email_address.'">
			
		<select id="a_record_select">
	';

	if($record_count > 0){
		for($i = 0; $i < $record_count; $i++){
			$page = $i + 1;
			$selected = (($record_num == $pagination[$i]['id']) or ($record_num == $page) or ($cloudflare_api == '' && $i + 1 == $record_count))? ' selected' : '';
			echo '<option value="'.$pagination[$i]['id'].'"'.$selected.'>'.$page.'</option>';
		}
		if(isset($record_new)){
			$new_page = $page + 1;
			echo '<option value="'.$new_id.'" selected>'.$new_page.'</option>';
		}
	}else{
		echo '<option value="1" selected>1</option>';
	}
	echo '</select>';

	if($record_count > 0){
		echo '<button id="delete_record">'.$GLOBALS['lang']['delete_record'].'</button>';
	}

	echo '<button id="record_plus">'.$GLOBALS['lang']['add_another_record'].'</button>';