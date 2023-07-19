<?php
class appModel{
	public static function fetchIpdata(){
		$data = array();
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT apikey
			FROM ipdata
			LIMIT 1
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while ($row = $result->fetchArray(SQLITE3_ASSOC)){
				$data[] = array(
					'apikey' => $row['apikey']
				);
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		return $data;
	}

	public static function fetchCloudflare($type, $id){
		$data = array();
		$select = ($type == 'single' || $type == 'first')? 'id, global_api_key, zone_id, dns_name, email_add' : 'id';
		$clause = ($type == 'single')? 'WHERE id = :id LIMIT 1' : (($type == 'first')? 'LIMIT 1' : '');
		$offset = $id - 1;
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT '.$select.'
			FROM cloudflare
			'.$clause.'
		';

		if($query = $db->prepare($query)){
			if($type != 'first'){
				$query->bindValue(':id', $id, SQLITE3_INTEGER);
			}
			$result = $query->execute();

			while ($row = $result->fetchArray(SQLITE3_ASSOC)){
				if($type == 'single' || $type == 'first'){
					$data[] = array(
						'id' => $row['id'],
						'global_api_key' => $row['global_api_key'],
						'zone_id' => $row['zone_id'],
						'dns_name' => $row['dns_name'],
						'email_add' => $row['email_add']
					);
				}else{
					$data[] = array(
						'id' => $row['id']
					);
				}
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		return $data;
	}

	public static function fetchSettings(){
		$data = array();
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT value
			FROM settings
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while ($row = $result->fetchArray(SQLITE3_ASSOC)){
				$data[] = array(
					'value' => $row['value']
				);
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		return $data;
	}

	public static function save_settings($ipdata_api_key, $cloudflare_id, $cloudflare_global_api_key, $cloudflare_zone_id, $cloudflare_dns_name, $cloudflare_email_add, $settings_current_ip, $settings_minutes){
		$ipdata_check = 0;
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT apikey
			FROM ipdata
			LIMIT 1
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while($row = $result->fetchArray(SQLITE3_ASSOC)){
				$ipdata_check = 1;
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READWRITE);
		$query = ($ipdata_check == 1)? 'UPDATE ipdata SET apikey = :ipdata_apikey' : 'INSERT INTO ipdata (apikey) VALUES (:ipdata_apikey)';

		if($query = $db->prepare($query)){
			$query->bindValue(':ipdata_apikey', $ipdata_api_key, SQLITE3_TEXT);
			$result = $query->execute();
			$result->finalize();
			$query->close();
		}else{
			$db->close();
			return 'error';
		}

		$query_one = 'UPDATE settings SET value = :settings_current_ip WHERE key = "curr_ip"';
		$query_two = 'UPDATE settings SET value = :settings_minutes WHERE key = "mins"';

		if($query_one = $db->prepare($query_one)){
			$query_one->bindValue(':settings_current_ip', $settings_current_ip, SQLITE3_TEXT);
			$result = $query_one->execute();
			$result->finalize();
			$query_one->close();
		}else{
			$db->close();
			return 'error';
		}

		if($query_two = $db->prepare($query_two)){
			$query_two->bindValue(':settings_minutes', $settings_minutes, SQLITE3_INTEGER);
			$result = $query_two->execute();
			$result->finalize();
			$query_two->close();
		}else{
			$db->close();
			return 'error';
		}
		$db->close();
		
		appModel::update_cloudflare($cloudflare_id, $cloudflare_global_api_key, $cloudflare_zone_id, $cloudflare_dns_name, $cloudflare_email_add);

	}

	public static function update_cloudflare($id, $global_api_key, $zone_id, $dns_name, $email_add){
		$record_check = 0;
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT id
			FROM cloudflare
			WHERE id = '.$id.'
			LIMIT 1
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while($row = $result->fetchArray(SQLITE3_ASSOC)){
				$record_check = 1;
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READWRITE);
		$query = ($record_check == 1)? 'UPDATE cloudflare SET global_api_key = :global_api_key, zone_id = :zone_id, dns_name = :dns_name, email_add = :email_add WHERE id = :id' : 'INSERT INTO cloudflare ( id, global_api_key, zone_id, dns_name, email_add) VALUES (:id, :global_api_key, :zone_id, :dns_name, :email_add)';

		if($query = $db->prepare($query)){
			$query->bindValue(':id', $id, SQLITE3_INTEGER);
			$query->bindValue(':global_api_key', $global_api_key, SQLITE3_TEXT);
			$query->bindValue(':zone_id', $zone_id, SQLITE3_TEXT);
			$query->bindValue(':dns_name', $dns_name, SQLITE3_TEXT);
			$query->bindValue(':email_add', $email_add, SQLITE3_TEXT);
			$result = $query->execute();
			$result->finalize();
			$query->close();
			$db->close();

			return 'success';
		}else{
			$db->close();
			return 'error';
		}
	}

	public static function fetch_dns_count(){
		$count = 0;
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT COUNT(id) as count
			FROM cloudflare
		';

		if($query = $db->prepare($query)){
			$i = 0;
			$result = $query->execute();

			while($row = $result->fetchArray(SQLITE3_ASSOC)){
				$count = $row['count'];
			}

			$result->finalize();
			$query->close();
		}
		
		return $count;
	}

	public static function fetch_dns_last_id(){
		$id = 0;
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT id
			FROM cloudflare
			ORDER BY id DESC
			LIMIT 1
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while ($row = $result->fetchArray(SQLITE3_ASSOC)){
				$id = $row['id'];
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		return $id;
	}

	public static function delete_record($cloudflare_id){
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READWRITE);
		$query = '
			DELETE
			FROM cloudflare
			WHERE id = :id
		';

		if($query = $db->prepare($query)){
			$query->bindValue(':id', $cloudflare_id, SQLITE3_INTEGER);
			$result = $query->execute();
			$result->finalize();
			$query->close();
		}
		
		$db->close();
	}

	public static function data_exists(){
		$check = 0;
		$ipdataAPIkey = 0;
		$ipdata_check = 0;
		$ip_address = '';
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT apikey
			FROM ipdata
			LIMIT 1
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while($row = $result->fetchArray(SQLITE3_ASSOC)){
				$ipdataAPIkey = $row['apikey'];
				$ipdata_check = 1;
			}

			$result->finalize();
			$query->close();
		}

		if($ipdata_check == 1){
			$query = '
				SELECT value
				FROM settings
				WHERE key = "curr_ip"
				LIMIT 1
			';

			if($query = $db->prepare($query)){
				$result = $query->execute();

				while($row = $result->fetchArray(SQLITE3_ASSOC)){
					$ip_address = $row['value'];
				}

				$result->finalize();
				$query->close();
			}

			$query = '
				SELECT id, global_api_key, zone_id, dns_name, email_add
				FROM cloudflare
				LIMIT 1
			';

			if($query = $db->prepare($query)){
				$result = $query->execute();

				while($row = $result->fetchArray(SQLITE3_ASSOC)){
					if($row['id'] == '' || $row['global_api_key'] == '' || $row['zone_id'] == '' || $row['dns_name'] == '' || $row['email_add'] == ''){
						$check = 1;
					}else{
						$check = 4;
					}
				}

				$result->finalize();
				$query->close();
			}
		}else{
			return 0;
		}

		$db->close();

		if(preg_replace("/[^0-9.]/", "", $ip_address) === '' && $ipdataAPIkey !== 0){
			$check = appModel::set_ip_address($ipdataAPIkey);
		}elseif(preg_replace("/[^0-9.]/", "", $ip_address) !== '' && $ipdataAPIkey !== 0){
			$check = appModel::check_ip_address($ipdataAPIkey, $ip_address);
		}

		return $check;
	}
	
	public static function checkCloudFlare(){
		$check = 0;
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT global_api_key, zone_id, dns_name, email_add
			FROM cloudflare
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while ($row = $result->fetchArray(SQLITE3_ASSOC)){
				$zone_id = $row['zone_id'];
				$apiKey = $row['global_api_key'];
				$email = $row['email_add'];
				$dns_name = $row['dns_name'];

				$url = 'https://api.cloudflare.com/client/v4/zones/'.$zone_id.'/dns_records';

				$curl = curl_init($url);
				curl_setopt($curl, CURLOPT_URL, $url);
				curl_setopt($curl, CURLOPT_HTTPHEADER, [
					'X-Auth-Key: '.$apiKey,
					'X-Auth-Email: '.$email
				]);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
				$data = curl_exec($curl);

				curl_close($curl);
				
				$d = json_decode($data, true);
					
				if($d['success'] == false){
					return 0;
				}else{
					$name_check = 0;
					for($i = 0; $i < count($d['result']); $i++){
						if($d['result'][$i]['name'] == $dns_name && $d['result'][$i]['type'] == 'A'){
							$newurl = 'https://api.cloudflare.com/client/v4/zones/'.$zone_id.'/dns_records/'.$d['result'][$i]['id'];
							$data = array(
								'type' => $d['result'][$i]['type'],
								'name' => $d['result'][$i]['name'],
								'content' => appModel::fetch_ip_address(),
								'ttl' => $d['result'][$i]['ttl'],
								'proxied' => $d['result'][$i]['proxied']
							);
							$data_json = json_encode($data);
							
							$curl_up = curl_init($newurl);
							curl_setopt($curl_up, CURLOPT_URL, $newurl);
							curl_setopt($curl_up, CURLOPT_HTTPHEADER, [
								'X-Auth-Key: '.$apiKey,
								'X-Auth-Email: '.$email,
								'Content-Type: application/json',
								'Content-Length: ' . strlen($data_json)
							]);
							curl_setopt($curl_up, CURLOPT_CUSTOMREQUEST, "PUT");
							curl_setopt($curl_up, CURLOPT_POSTFIELDS, $data_json);
							curl_setopt($curl_up, CURLOPT_RETURNTRANSFER, true);
							curl_setopt($curl_up, CURLOPT_SSL_VERIFYHOST, false);
							curl_setopt($curl_up, CURLOPT_SSL_VERIFYPEER, false);
							curl_exec($curl_up);

							curl_close($curl_up);
							$name_check = 1;
							$check = 2;
						}
					}

					if($name_check == 0){
						return 1;
					}
				}
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		return $check;
	}
	
	public static function fetch_ip_address(){
		$ip = '';
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT value
			FROM settings
			WHERE key = "curr_ip"
			LIMIT 1
		';

		if($query = $db->prepare($query)){
			$result = $query->execute();

			while ($row = $result->fetchArray(SQLITE3_ASSOC)){
				$ip = $row['value'];
			}

			$result->finalize();
			$query->close();
		}
		$db->close();

		return $ip;
	}

	public static function check_ip_address($ipdataAPIkey, $ip_address){
		$url = 'https://api.ipdata.co?api-key='.$ipdataAPIkey;

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$resp = curl_exec($curl);
		$data = json_decode($resp, true);
		curl_close($curl);
		if(!isset($data['ip'])){
			return 2;
		}else{
			if($data['ip'] == $ip_address){
				return 4;
			}else{
				return appModel::set_ip_address($ipdataAPIkey, $data['ip']);
			}
		}
	}

	public static function set_ip_address($ipdataAPIkey, $new_ip = 0){
		if($new_ip == 0){
			$url = 'https://api.ipdata.co?api-key='.$ipdataAPIkey;

			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

			curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

			$resp = curl_exec($curl);
			$data = json_decode($resp, true);
			curl_close($curl);
			if(!isset($data['ip'])){
				return 2;
			}else{
				$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READWRITE);
				$query = 'UPDATE settings SET value = :value WHERE key = "curr_ip"';

				if($query = $db->prepare($query)){
					$query->bindValue(':value', $data['ip'], SQLITE3_TEXT);
					$result = $query->execute();
					$result->finalize();
					$query->close();
				}
				$db->close();
				return 3;
			}
		}else{
			$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READWRITE);
			$query = 'UPDATE settings SET value = :value WHERE key = "curr_ip"';

			if($query = $db->prepare($query)){
				$query->bindValue(':value', $new_ip, SQLITE3_TEXT);
				$result = $query->execute();
				$result->finalize();
				$query->close();
			}
			$db->close();
			return 3;
		}
	}

	public static function change_language($language){
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READWRITE);
		$query = 'UPDATE settings SET value = :value WHERE key = "lang"';

		if($query = $db->prepare($query)){
			$query->bindValue(':value', $language, SQLITE3_TEXT);
			$result = $query->execute();
			$result->finalize();
			$query->close();
		}
		$db->close();
	}
}
