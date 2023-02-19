<?php
include_model('app');
use appModel as app;
class appController {

	public static function index(){
		$settings = app::fetchSettings();
		$GLOBALS['lang']['minutes'] = $settings[1]['value'];
		language::fetch_language();

		$footdata['JSinit'] = '<script>clickNoticeMsg = "'.$GLOBALS['lang']['not']['click_notice'].'";updateNoticeMsg = "'.$GLOBALS['lang']['not']['update_notice'].'";homeInit();</script>';

		$monitor_lock = 0;
		$ipdata = app::fetchIpdata();
		if(!$ipdata){
			$data['ipdata_api_key'] = '';
		}else{
			foreach($ipdata as $row){
				$monitor_lock = ($row['apikey'] == '')? 1 : 0;
				$data['ipdata_api_key'] = $row['apikey'];
			}
		}

		$cloudflare = app::fetchCloudflare('first', 1);
		if(!$cloudflare){
			$data['cloudflare_api'] = '';
			$data['cloudflare_zone_id'] = '';
			$data['cloudflare_dns_name'] = '';
			$data['cloudflare_email_address'] = '';
		}else{
			foreach($cloudflare as $row){
				$monitor_lock = ($row['global_api_key'] == '' || $row['zone_id'] == '' || $row['dns_name'] == '' || $row['email_add'] == '')? 1 : 0;
				$data['cloudflare_api'] = $row['global_api_key'];
				$data['cloudflare_zone_id'] = $row['zone_id'];
				$data['cloudflare_dns_name'] = $row['dns_name'];
				$data['cloudflare_email_address'] = $row['email_add'];
			}
		}
		
		$data['languages'] = array('EN', 'FR', 'GE', 'IT', 'RU', 'SP', 'TR');
		$data['pagination'] = app::fetchCloudflare('all', 1);
		
		$data['monitor_lock'] = (!$ipdata || !$cloudflare || $monitor_lock == 1)? ' disabled' : '';

		$data['record_num'] = 1;
		$data['ip_address'] = $settings[0]['value'];
		$data['minutes'] = $settings[1]['value'];
		$data['set_language'] = $settings[2]['value'];
		$data['record_count'] = app::fetch_dns_count();

		view::build('head').
		view::build('app', $data).
		view::build('foot', $footdata);
	}

	public static function help(){
		language::fetch_language();
		view::build('help');
	}

	public static function change_language(){
		if(isset($_POST['language'])){
			$white_list = array('EN', 'FR', 'GE', 'IT', 'RU', 'SP', 'TR');
			$language = preg_replace("/[^A-Z]/", "", $_POST['language']);
			if(in_array($language, $white_list)){
				app::change_language($language);
			}
		}
	}

	public static function save_settings(){
		if(isset($_POST['ipdata_api_key']) && isset($_POST['cloudflare_id']) && isset($_POST['cloudflare_global_api_key']) && isset($_POST['cloudflare_zone_id']) && isset($_POST['cloudflare_dns_name']) && isset($_POST['cloudflare_email_add']) && isset($_POST['settings_current_ip']) && isset($_POST['settings_minutes'])){
			$ipdata_api_key = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['ipdata_api_key']);
			$cloudflare_id = preg_replace("/[^0-9]/", "", $_POST['cloudflare_id']);
			$cloudflare_global_api_key = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['cloudflare_global_api_key']);
			$cloudflare_zone_id = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['cloudflare_zone_id']);
			$cloudflare_dns_name = preg_replace("/[^a-zA-Z0-9.]/", "", $_POST['cloudflare_dns_name']);
			$cloudflare_email_add = preg_replace("/[^a-zA-Z0-9.@]/", "", $_POST['cloudflare_email_add']);
			$settings_current_ip = preg_replace("/[^0-9.]/", "", $_POST['settings_current_ip']);
			$settings_minutes = preg_replace("/[^0-9]/", "", $_POST['settings_minutes']);
			
			echo app::save_settings($ipdata_api_key, $cloudflare_id, $cloudflare_global_api_key, $cloudflare_zone_id, $cloudflare_dns_name, $cloudflare_email_add, $settings_current_ip, $settings_minutes);
		}else{
			return 'error';
		}
	}
		
	public static function record_plus(){
		if(isset($_POST['cloudflare_id']) && isset($_POST['cloudflare_global_api_key']) && isset($_POST['cloudflare_zone_id']) && isset($_POST['cloudflare_dns_name']) && isset($_POST['cloudflare_email_add'])){
			$cloudflare_id = preg_replace("/[^0-9]/", "", $_POST['cloudflare_id']);
			$cloudflare_global_api_key = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['cloudflare_global_api_key']);
			$cloudflare_zone_id = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['cloudflare_zone_id']);
			$cloudflare_dns_name = preg_replace("/[^a-zA-Z0-9.]/", "", $_POST['cloudflare_dns_name']);
			$cloudflare_email_add = preg_replace("/[^a-zA-Z0-9.@]/", "", $_POST['cloudflare_email_add']);
			
			$record_check = ($cloudflare_id == 1)? 1 : 0;
			
			app::update_cloudflare($cloudflare_id, $cloudflare_global_api_key, $cloudflare_zone_id, $cloudflare_dns_name, $cloudflare_email_add, $record_check);

			language::fetch_language();
			$data['record_new'] = true;
			$data['record_num'] = app::fetch_dns_count() + 1;
			$data['record_count'] = app::fetch_dns_count();
			$data['cloudflare_api'] = $cloudflare_global_api_key;
			$data['cloudflare_zone_id'] = $cloudflare_zone_id;
			$data['cloudflare_dns_name'] = '';
			$data['cloudflare_email_address'] = $cloudflare_email_add;
			$data['pagination'] = app::fetchCloudflare('all', 1);
			$pagination = app::fetchCloudflare('all', 1);
			for($i = 0; $i < count($pagination); $i++){
				$last_id = $pagination[$i]['id'];
			}
			$data['new_id'] = $last_id + 1;
			
			view::build('cfblock', $data);
		}else{
			echo 'post error';
		}
	}

	public static function change_record(){
		if(isset($_POST['cloudflare_id'])){
			$cloudflare_id = preg_replace("/[^0-9]/", "", $_POST['cloudflare_id']);
			language::fetch_language();
			$data['record_num'] = $cloudflare_id;
			$data['record_count'] = app::fetch_dns_count();
			
			$cloudflare = app::fetchCloudflare('single', $cloudflare_id);
			if(!$cloudflare){
				$data['cloudflare_api'] = '';
				$data['cloudflare_zone_id'] = '';
				$data['cloudflare_dns_name'] = '';
				$data['cloudflare_email_address'] = '';
			}else{
				foreach($cloudflare as $row){
					$data['cloudflare_api'] = $row['global_api_key'];
					$data['cloudflare_zone_id'] = $row['zone_id'];
					$data['cloudflare_dns_name'] = $row['dns_name'];
					$data['cloudflare_email_address'] = $row['email_add'];
				}
			}
			$data['pagination'] = app::fetchCloudflare('all', 1);

			view::build('cfblock', $data);
		}
	}

	public static function delete_record(){
		if(isset($_POST['cloudflare_id'])){
			$cloudflare_id = preg_replace("/[^0-9]/", "", $_POST['cloudflare_id']);
			app::delete_record($cloudflare_id);

			language::fetch_language();
			$data['record_count'] = app::fetch_dns_count();
			
			$cloudflare = app::fetchCloudflare('first', 1);
			$data['record_num'] = ($cloudflare)? $cloudflare[0] : 1;;
			if(!$cloudflare){
				$data['cloudflare_api'] = '';
				$data['cloudflare_zone_id'] = '';
				$data['cloudflare_dns_name'] = '';
				$data['cloudflare_email_address'] = '';
			}else{
				foreach($cloudflare as $row){
					$data['cloudflare_api'] = $row['global_api_key'];
					$data['cloudflare_zone_id'] = $row['zone_id'];
					$data['cloudflare_dns_name'] = $row['dns_name'];
					$data['cloudflare_email_address'] = $row['email_add'];
				}
			}
			$data['pagination'] = app::fetchCloudflare('all', 1);

			view::build('cfblock', $data);
		}
	}

	public static function check_dns_duplicate(){
		if(isset($_POST['cloudflare_zone_id']) && isset($_POST['cloudflare_dns_name'])){
			$zone_id = preg_replace("/[^a-zA-Z0-9]/", "", $_POST['cloudflare_zone_id']);
			$dns_name = preg_replace("/[^a-zA-Z0-9.]/", "", $_POST['cloudflare_dns_name']);
			return app::check_dns_duplicate($zone_id, $dns_name);
		}else{
			return 'error';
		}
	}
	
	public static function start_monitor(){
		$data_exists = app::data_exists();
		$settings = app::fetchSettings();
		$GLOBALS['lang']['monitor']['ip_address'] = $settings[0]['value'];
		$GLOBALS['lang']['monitor']['seconds'] = $settings[1]['value'] * 60;
		language::fetch_language();

		if($data_exists === 0){
			$data['error'] = $GLOBALS['lang']['monitor']['err_one'];
		}
		elseif($data_exists === 1){
			$data['error'] = $GLOBALS['lang']['monitor']['err_two'];
		}
		elseif($data_exists === 2){
			$data['error'] = $GLOBALS['lang']['monitor']['err_three'];
		}
		else{
			$ip_address = $settings[0]['value'];
			
			$data['timestamp'] = $GLOBALS['lang']['monitor']['last_checked'].date("d M Y").' at '.date("H:i:s");

			if($data_exists === 3){
				$data['msg_one'] = $GLOBALS['lang']['monitor']['msg_one_a'];
			}
			else{
				$data['msg_one'] = $GLOBALS['lang']['monitor']['msg_one_b'];
			}
			
			if($data_exists !== 4){
				$cloudFlareCheck = app::checkCloudFlare();
				if($cloudFlareCheck === 0){
					$data['msg_two'] = $GLOBALS['lang']['monitor']['msg_two_a'];
				}
				elseif($cloudFlareCheck === 1){
					$data['msg_two'] = $GLOBALS['lang']['monitor']['msg_two_b'];
				}
				else{
					$data['msg_two'] = $GLOBALS['lang']['monitor']['msg_two_c'];
				}
			}else{
				$data['msg_two'] = $GLOBALS['lang']['monitor']['msg_two_d'];
			}
		}
		view::build('monitor', $data);
	}

	public static function reset_ip_address(){
		echo app::fetch_ip_address();
	}

	public static function fetch_timer(){
		$settings = app::fetchSettings();
		$ip_address = $settings[0]['value'];
		echo $settings[1]['value'];
	}
}