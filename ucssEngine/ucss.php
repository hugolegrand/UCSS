<?php
/**
* The Ucss is the starting point for generating 
* @class Ucss
*
*/
require_once('parserClass/ucssParser.class.php');

class Ucss {

	private $settings;

	public function __construct($settings){
		$this->settings = $settings;
	}

	public function build($html){
		
	}

	public function buildFromFiles($html, $ucss){
		
	}
	
	private function render($html, $ucss, $settings){
		
	}



}






















// Initialize the Browscap object. Browscap allows us to know which browser is using the user
$bc = new Browscap('render/cache');

// Get the name of the browser and the version
$current_browser = $bc->getBrowser();
$browserName = $current_browser->Browser;
$browserMajorVer = $current_browser->MajorVer;
$browserMinorVer = $current_browser->MinorVer;

// Initialize the corresponding class. Fallback with latest version of Chrome
if (file_exists($browserName . '.class.php')){
	require($browserName . '.class.php');

	if(class_exists($browserName . '_' . $browserMajorVer .'_' . $browserMinorVer)){
		$class = $browserName . '_' . $browserMajorVer .'_' . $browserMinorVer;
		$pc = new $class();
	}
	elseif (class_exists($browserName . '_' . $browserMajorVer )) {
	 	$class = $browserName . '_' . $browserMajorVer;
		$pc = new $class();
	 } 
	else {
		$class = $browserName;
		$pc = new $class();
	}
}
/*else { //TODO fallback if browser not supported
	require('Chrome.class.php');
	$pc = new $CHROMELASTVERSION();
}*/

// The $pc variable is now loaded with the appropriate adaptater configuration
$parser = new UcssParser($pc, 'render/test.ucss');
$parser->parse();




?>