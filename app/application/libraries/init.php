<?php 
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED);
session_start();

$url = 'http://192.168.12.10:8082/ws/live2.php';
$token = $_SESSION['token'];

function runWS($data, $type='json') { 
	global $url;

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_POST, 1);
	$headers = array();
	if ($type == 'xml') 
		$headers[] = 'Content-Type: application/xml'; 
	else 
		$headers[] = 'Content-Type: application/json';

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	if ($data) { 
		if ($type == 'xml') { 
		/* contoh xml: <?xml version="1.0"?><data><act>GetToken</act><username>agus</username><password>abcdef</password></data> */ 
			$data = stringXML($data); 
		}
		else { 
			/* contoh json: {"act":"GetToken","username":"agus","password":"abcdef"} */ 
			$data = json_encode($data); 
		}

		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); 
	}
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	$result = curl_exec($ch); curl_close($ch); 

	return $result; 
}
function stringXML($data) { 
	$xml = new SimpleXMLElement('<?xml version="1.0"?><data></data>'); 
	array_to_xml($data, $xml); 
	return $xml->asXML(); 
}
function array_to_xml( $data, &$xml_data ) { 
	foreach( $data as $key => $value ) { 
		if( is_array($value) ) { 
			$subnode = $xml_data->addChild($key); 
			array_to_xml($value, $subnode); 
		} else { 
				// $xml_data->addChild("$key",htmlspecialchars("$value")); 
			$xml_data->addChild("$key",$value); 
		} 
	} 
}
function intoTables($rows) { 
	$i=0; $str = '<table class="data_grid">';
	foreach ($rows as $row) { 
		if (!$i) { 
			$str .= '<tr>'; $str .= '<th>No</th>'; 
			foreach(array_keys($row) as $k=>$v){
				$str .= '<th>'; $str .= $v; $str .= '</th>';
			} 
			$str .= '</tr>'; 
		} 
		$str .= '<tr>'; $i++; $style=''; 
		foreach($row as $k=>$v){ 
			if (strtolower($k) == 'soft_delete' && $v == '1') { 
				$style='style="text-decoration:line-through"'; 
			} 
		} 
		$str .= "<td $style >$i.</td>"; 
		foreach($row as $k=>$v){ 
			$str .= "<td $style>"; if (!is_array($v)) $str .= $v; $str .= '&nbsp;</td>'; 
		} 
		$str .= '</tr>'; 
	} 
	$str .= '</table>'; 
	return $str; 
}
?>