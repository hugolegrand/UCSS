<?php

/* Copyright (c) 2012 Dellinger Hugo-Alexandre
All rights reserved.

Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
* Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
* Neither the name of the copyright holder nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.*/

/***********UCSS**************
Ucss is an acronym for Unified Cascading Style Sheet. The target of the project is to allow web developers to design one stylesheet for all majors browser
without worrying if that fucking ie6 will render it correctly. It includes a php renderer and a client side jquery library wich will allows you
*/

////////Checking if an ucss stylesheet is present









require 'browScap.class.php';
require 'ucssParser.class.php';



$CHROMELASTVERSION = Chrome_16;

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