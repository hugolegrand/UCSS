<?php
if (!isset($_COOKIE['mdp']) || $_COOKIE['mdp'] !="dellingergigi08" ){
    echo "loading failed: you killed kenny";
    exit;
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>TestPage</title>
        <link rel="stylesheet" href="testfile/bootstrap.min.css">
        <script src="testfile/jquery.js"></script>
        <script src="testfile/ace.js" type="text/javascript" charset="utf-8"></script>
        <script src="testfile/script.js"></script>
        <script src="testfile/mode-html.js"></script>
        <script src="testfile/mode-css.js"></script>
        <script src="testfile/mode-css.js"></script>
    </head>

    <body style="padding-top: 40px">

		<div class="topbar">
			<div class="topbar-inner">
				<div class="container">
					<a  class="brand">TestBox</a>
					<ul class="nav">
						<li class="active"><a id="render">Render</a></li>
						<li class=""><a id="test">Test</a></li>
					</ul>
				</div>
			</div>
		</div>

        <div  id="renderBody" class="container" >
        	<div class="row" style="height:370px;">
        		<div class="span8">
        			<h1>HTML</h1>
        			<div id="htmleditor" style="height: 300px; width: 400px">some text</div>	
        		</div>
        		<div class="span8">
        			<h1>UCSS</h1>
        			<div id="ucsseditor" style="height: 300px; width: 400px">some text</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="span16">
                    <div class="well">
                        <a class="btn small primary" id="renderButton">Render</a>
                        <a class="btn small"         id="saveButton">Save</a>
                        <input class="large"         id="nameSave" name="xlInput3" size="30" type="text">
                        <a class="btn small primary" id="loadButton">Load</a>
                        <a class="btn small"         id="removeButton">Remove</a>
                        <select name="stackedSelect" id="selectLoad">

                        </select>

                    </div>      
                </div>
        	</div>

        </div>

    	<div id="testBody" style="display: none;">
    		hello
    	</div>

    
    </body>
   
</html>
