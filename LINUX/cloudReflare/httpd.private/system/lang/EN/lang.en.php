<?php
//splashscreen
$GLOBALS['lang']['splash']['created_by'] = 'Created By';

//notifications
$GLOBALS['lang']['not']['click_notice'] = 'Click anywhere on the page to close';
$GLOBALS['lang']['not']['update_notice'] = 'Records updated successfully';

//home page
$GLOBALS['lang']['ipdata_api_key'] = 'ipdata API key';
$GLOBALS['lang']['cloudflare_global_api_key'] = 'CloudFlare global API key';
$GLOBALS['lang']['cloudflare_zone_id'] = 'CloudFlare zone ID';
$GLOBALS['lang']['cloudflare_dns_name'] = 'CloudFlare DNS A name';
$GLOBALS['lang']['cloudflare_email_address'] = 'CloudFlare email address';
$GLOBALS['lang']['delete_record'] = 'Delete record';
$GLOBALS['lang']['add_another_record'] = 'Add another record';
$GLOBALS['lang']['current_ipv4_address'] = 'Current IPv4 address';
if(isset($GLOBALS['lang']['minutes'])){
	$GLOBALS['lang']['minute_check_message'] = '<span class="minute_span">Check every </span><input type="number" class="form_input" id="minutes" value="'.$GLOBALS['lang']['minutes'].'" min="1"><span class="minute_span"> minute<span id="minute_s"></span></span>';
}
$GLOBALS['lang']['save_settings'] = 'Save settings';
$GLOBALS['lang']['begin_monitoring'] = 'Begin monitoring';

//help page
$GLOBALS['lang']['help']['para_one'] = 'In order to use this software, you will need an <strong>ipData</strong> account.';
$GLOBALS['lang']['help']['li_a_one'] = 'To begin, go to <a href="https://ipdata.co/" target="_blank">ipdata.co</a>.';
$GLOBALS['lang']['help']['li_a_two'] = 'Click <strong>Sign Up For Free</strong> in the top right hand corner.';
$GLOBALS['lang']['help']['li_a_three'] = 'On the following screen, add in your <strong>email address</strong> and <strong>password</strong>.';
$GLOBALS['lang']['help']['li_a_four'] = '<strong>Verify</strong> your email address.';
$GLOBALS['lang']['help']['li_a_five'] = '<strong>Sign in</strong>to your ipdata account.';
$GLOBALS['lang']['help']['li_a_six'] = 'In the menu on the left hand side of the dashboard, click <strong>API Settings</strong>.';
$GLOBALS['lang']['help']['li_a_seven'] = 'On the following page, your <strong>API key</strong> will be displayed; enter that in the <strong>ipdata API key</strong> input.';
$GLOBALS['lang']['help']['li_b_one'] = 'Sign in to your <strong>CloudFlare</strong> account.';
$GLOBALS['lang']['help']['li_b_two'] = 'Select the <strong>domain</strong> you wish to work on.';
$GLOBALS['lang']['help']['li_b_three'] = 'In <strong>Quick actions</strong> on the right of the <strong>Overview</strong> screen, scroll down to <strong>API</strong>. Your <strong>Zone ID</strong> will be listed there. Copy that into the <strong>CloudFlare zone ID</strong> input field.';
$GLOBALS['lang']['help']['li_b_four'] = 'Back on <strong>CloudFlare</strong>, click <strong>Get your API token</strong>.';
$GLOBALS['lang']['help']['li_b_five'] = 'On the following page, click the <strong>view</strong> button for <strong>Global API Key</strong>. Copy the key into the <strong>CloudFlare global API key</strong> input.';
$GLOBALS['lang']['help']['li_b_six'] = 'Next, go to your <strong>DNS records</strong> and copy the <strong>name</strong> field of your <strong>A record</strong> to the <strong>CloudFlare DNS Name</strong> input.';
$GLOBALS['lang']['help']['li_b_seven'] = 'Finally add in the <strong>email address</strong> associated with the <strong>CloudFlare account</strong>.';
$GLOBALS['lang']['help']['li_b_eight'] = 'If you want to add <strong>multiple records</strong>, click on <strong>Add another record</strong> and <strong>repeat</strong> the above steps for <strong>each</strong> record.';
$GLOBALS['lang']['help']['para_two'] = 'Include your <strong>current IP address</strong>. This is <strong>optional</strong>, you could leave it <strong>blank</strong> and let it be filled in when you begin monitoring.';
$GLOBALS['lang']['help']['para_three'] = 'Set the <strong>number of minutes between checks</strong>. The default is 10 minutes, the <strong>minimum</strong> requirement is 1 minute.';
$GLOBALS['lang']['help']['para_four'] = 'Click <strong>Save settings</strong>. Once <strong>saved</strong>, you should be able to click on <strong>Begin monitoring</strong>';

//monitor
$GLOBALS['lang']['monitor']['err_one'] = 'An error occurred. Your ipData API key has not been set. Go back and try again';
$GLOBALS['lang']['monitor']['err_two'] = 'An error occurred. There are either no cloudFlare records or the record provided is not complete';
$GLOBALS['lang']['monitor']['err_three'] = 'An error occurred. The API key provided for ipData is likely incorrect. Could not fetch your current IP address';
$GLOBALS['lang']['monitor']['last_checked'] = 'Last checked: ';
if(isset($GLOBALS['lang']['monitor']['ip_address'])){
	$GLOBALS['lang']['monitor']['msg_one_a'] = 'your IP address has been set to '.$GLOBALS['lang']['monitor']['ip_address'];
	$GLOBALS['lang']['monitor']['msg_one_b'] = 'your IP address is '.$GLOBALS['lang']['monitor']['ip_address'];
}
$GLOBALS['lang']['monitor']['msg_two_a'] = 'An error occurred. One or more of your cloudflare records is wrong. Please go back and check again';
$GLOBALS['lang']['monitor']['msg_two_b'] = 'An error occurred. One or more of your cloudflare name(s) don&rsquo;t exist. Please go back and check again';
$GLOBALS['lang']['monitor']['msg_two_c'] = 'cloudFlare name(s) found<p class="monitor_msg_block">cloudFlare record(s) updated</p>';
$GLOBALS['lang']['monitor']['msg_two_d'] = 'No update necessary';
if(isset($GLOBALS['lang']['monitor']['seconds'])){
	$GLOBALS['lang']['monitor']['check_msg'] = 'Will check again in <span id="seconds">'.$GLOBALS['lang']['monitor']['seconds'].'</span> second<span id="monitor_seconds_s">s</span>';
}
$GLOBALS['lang']['monitor']['go_back'] = 'Go back';