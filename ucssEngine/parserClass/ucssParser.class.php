<?php

/*
******Syntaxe************
The ucss is based on the css language. So, the selectors are working in the same than css3.0. The ucss language adds some new tricks. A lot of those tricks are inspired by the sass langage.

The $ sign is the sign for the variables
	$var -> a variable of any types 
	$$var -> a variable which is defined in php with an array of key-value

The @ sign corresponds to part of unrendered ucss code
	@var {} -> a mixin : a mixin is a set of css key-value which doesn't belong to any element but which can be reused in your 
	@var ($var, $var2, ...) {}  -> a mixin which accepts a set of paramaters. Parameters are not needed. If they're not present, they'll be replaced by ''

Slectors can be nested in that way
	div .







******Fonctionnement*****




*/

class UcssParser {

	private $ucss;
	private $pc;
	private $lineBuffer;
	private $listOfDomain;
	private $listOfVar;
	private $listOfMixins;
	
	public function __construct($pc , $pathToFile){
		$this->ucss       = fopen($pathToFile, 'r');
		$this->pc         = $pc;
		$this->lineBuffer = new LineBuffer();
		$listOfMixins     = array();
		$listOfVar        = array();
		$listOfDomain     = array();
	}
	public function __destruct() {
		fclose($this->ucss);
	}
	public function parse($html, $ucss, $settings){
		
		
	

		

	}
}

class Domain {
	private $arrayOfKeyValue; //List of the CSS KeyValue couple associated with this domain
	private $nestedDomains; //List of the domain nested in the current domain
	private $selector; //Selectors applying to the domain

	public function __construct($selector) {
		$this->arrayOfKeyValue = array();
		$this->nestedDomain = array();
	}

	public function addKeyValue($KeyValue){
		array_push($this->arrayOfKeyValue, $KeyValue);
	}

	public function addNestedDomain($addedSelector) {
		$newNestedDomain = new Domain($this->selector . $addedSelector);
		array_push($this->nestedDomains, $newNestedDomain);
	}

	public function render($lineBuffer){
		$lineBuffer->addLine($this->selector . '  {');
		foreach ($this->arrayOfKeyValue as $key) {
			$lineBuffer->addLine($key->render());
		}
		$lineBuffer->addLine('}');
		foreach ($nestedDomains as $domain) {
			$lineBuffer = $domain->render($lineBuffer);
		}
		return $lineBuffer;
		
	}
}

class Mixin {
	private $arrayOfKeyValue;

}

class KeyValue{
    private $key;
    private $value;

    public function __construct($key, $value){
    	$this->key = $key;
    	$this->value = $value;
    }

    public function render(){
    	return $this->key . ':' . $this->value . ';';
    }
}



class LineBuffer{
	private $arrayOfLine;

	public function __construct(){
		$this->arrayOfLine = array();
		
	}
	public function addLine($content){
		array_push($this->arrayOfLine, $content);
	}
	public function render(){
		foreach ($this->arrayOfLine as $line) {
			echo $line . "</n>";
		}
	}
}


?>