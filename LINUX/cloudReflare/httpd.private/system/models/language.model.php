<?php
class languageModel{
	public static function fetch_language(){
		$data = array();
		$db = new SQLite3(SYS.'db'.DS.'app.db', SQLITE3_OPEN_READONLY);
		$query = '
			SELECT value
			FROM settings
			WHERE key = "lang"
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
}