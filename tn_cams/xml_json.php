<?php
	$doc = new DOMDocument();
	$doc->load('TDOTCameraGeorss.xml');
	$entries = $doc->documentElement->getElementsByTagName('entry');
	$cameras = array();
	for($i=0;$i < $entries->length; $i++) {
		$entry = $entries->item($i);
		$camera = array();
		foreach(array('s'=>'summary','m'=>'marker','u'=>'imageurl') as $abbr=>$property)
			$camera[$abbr] = $entry->getElementsByTagName($property)->item(0)->firstChild->wholeText;
		list($camera['lat'], $camera['long']) = explode(' ', $camera['m']);
		unset($camera['marker']);
		$cameras[] = $camera;
	}
	echo json_encode($cameras);
?>
