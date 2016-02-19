<?php
require_once(realpath(dirname(__FILE__) . "/../../includes/common_func.php"));
// this is the script used to convert UCSC track settings to GIVe track settings format (json_encode)
if($_REQUEST['track'] && $_REQUEST['db']) {
	// load the track to see if it's json format
	$mysqli = connectCPB($_REQUEST['db']);
	$sqlstmt = "SELECT * FROM trackDb WHERE tableName = ?";
	$stmt = $mysqli->prepare($sqlstmt);
	$stmt->bind_param('s', $_REQUEST['track']);
	$stmt->execute();
	$tracks = $stmt->get_result();
	// check whether settings is json
	while($itor = $tracks->fetch_assoc()) {
		json_decode($itor['settings']);
		if(json_last_error() !== JSON_ERROR_NONE) {
			// is not json, convert
			echo $itor['settings'];
			$settingsObj = [];
			$items = explode("\n", $itor['settings']);
			foreach($items as $setting) {
				$kvpair = preg_split("/\s+/", trim($setting), 2);
				if($kvpair[0]) {
					$settingsObj[$kvpair[0]] = $kvpair[1];
				}
			}
			$settingsJSON = json_encode($settingsObj, JSON_FORCE_OBJECT);
			$updateSqlStmt = "UPDATE trackDb SET settings = ? WHERE tableName = ?";
			$updateStmt = $mysqli->prepare($updateSqlStmt);
			$updateStmt->bind_param('ss', $settingsJSON, $itor['tableName']);
			$updateStmt->execute();
			echo '\n\nCONVERTED:\n';
			echo $settingsJSON;
		}
	}
	$tracks->free();
	$mysqli->close();
}
?>
